<?php 

class SellService
{

	public function calculateShipping(
		$service = "40010",
		$CEPdestination,
		$weight = "1",
		$height = '4',
		$width = '12',
		$length = '16',
		$value = '1.00'
		)
	{
	   
	    $parameter = array();

		$parameter['sCepOrigem'] = '96015140';
		$parameter['sCepDestino'] = $CEPdestination;
		$parameter['nVlPeso'] = $weight;
		$parameter['nCdFormato'] = '1';
		$parameter['nVlComprimento'] = $length;
		$parameter['nVlAltura'] = $height;
		$parameter['nVlLargura'] = $width;
		$parameter['nVlDiametro'] = "0";
		$parameter['sCdMaoPropria'] = 'n';
		$parameter['nVlValorDeclarado'] = $value;
		$parameter['sCdAvisoRecebimento'] = 'n';
		$parameter['StrRetorno'] = 'xml';
		$parameter['nCdServico'] = $service;

		$parameter = http_build_query($parameter);

		$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
		$curl = curl_init($url.'?'.$parameter);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($curl);
		$data = simplexml_load_string($data);
		
		foreach($data->cServico as $value) {
			if($value->Erro == 0) {
				$msg = $value->Valor .'';
			} else {
				$msg = $value->Erro . '';
			}
		}

		return $msg;
	}

	public function prepareSellsMonthToChart($sells) {
		$newSells = array();
		foreach ($sells as $key => $sell) {
			$newSells['Sell'][] = $sell;
		}
		
		if ($newSells) {
			foreach ($newSells['Sell'] as $key => $sell) {
				$newSells['Sell'][$key]['Sell']['created'] = date('M-Y', strtotime($sell['Sell']['created']));
			}
		}
		
		return json_encode($newSells);
	}

	public function prepareSellsWeekToChart($sells) {
		$newSells = array();
		foreach ($sells as $key => $sell) {
			$newSells['Sell'][] = $sell;
		}
		
		if ($newSells) {
			foreach ($newSells['Sell'] as $key => $sell) {
				$newSells['Sell'][$key]['Sell']['created'] = date('D', strtotime($sell['Sell']['created']));
			}
		}
		
		return json_encode($newSells);
	}

	public function checkout($cart) {
		$products = CakeSession::read('Cart');
		$shipping = CakeSession::read('Shipping');
		$promotionCode = CakeSession::read('PromotionalCode');
		$user = CakeSession::read('Auth.User');

		$i = 1;
		foreach ($products as $key => $product) {
			$price = number_format($product['Product']['price'], 2, '.', '');
			if ($promotionCode) {
				$discount = $promotionCode['PromotionalCode']['discount'];
				$price = ($price - ($price * ($discount / 100)));
			}
			$cart->adicionarItem($i, $product['Product']['name'], $price,'1000', $product['length']);
			$i++;
		}

		$cart->setContatosComprador($user['first_name'] . ' ' . $user['last_name'], $user['email'], substr($user['first_contact'], 0, 2), substr($user['first_contact'], 2) );

        $cart->setEnderecoComprador($user['cep'], $user['address'], $user['number'], $user['complement'], $user['neighborhood'], $user['City']['name'], 'RS');

        $cart->setTipoFrete($this->checkShipping($shipping));
        $value = str_replace(',', '.', $shipping['value']);
        $cart->setValorTotalFrete($value);

        $cart->setTipoPagamento('CREDIT_CARD');

        return $cart->finalizaCompra();

	}

	private function checkShipping($shipping) {
		if ($shipping) {
			if ($shipping['value'] == 41106) {
				return 'PAC';
			} else {
				return 'SEDEX';
			}
		}

		return 'SEDEX';
	}

	public function prepareToPersist() {
		$products = CakeSession::read('Cart');
		$user = CakeSession::read('Auth.User');
		$sell = array();

		$total = 0;
		$items = array();
		foreach ($products as $key => $product) {
			$items[] = $product['Product']['id'];
			$total += ($product['Product']['price'] * $product['length']);
		}

		$sell = array(
			'Sell' => array(
				'total' => $total,
				'client_id' => $user['id'],
				'form_payment_id' => 1,
				'status_sell_id' => 1
			),
			'Product' => array(
				'Product' => $items
			)
		);
		
		return $sell;
	}
}