<div id="main-container" class="container">
	<ol class="breadcrumb">
		<li><?php echo $this->Html->link("Home", '/')?></li>
		<li class="active">Finalizar Compra</li>
	</ol>

	<h2 class="main-heading text-center">Finalizar Compra</h2>

	<div class="table-responsive shopping-cart-table">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td class="text-center">
						Imagem
					</td>
					<td class="text-center">
						Nome
					</td>							
					<td class="text-center">
						Categoria
					</td>
					<td class="text-center">
						Quantidade
					</td>
					<td class="text-center">
						Valor Unitário
					</td>
					<td class="text-center">
						Valor Total
					</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$total = 0;
					foreach ($products as $key => $product): 
						$totalItem = 0;
						$totalItem = ($product['Product']['price'] * $product['length']);
						$total += $totalItem;
				?>
					<tr>
						<td class="text-center">
							<?php 
								echo $this->Html->link(
									$this->Html->image('../uploads/products/image/smallMedium.'. $product['AttachmentImage']['filename'], 
									array('alt' => 'Product Name', 'title' => 'Product Name', 'class' => 'img-thumbnail')),
									'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['Product']['slug'],
									array('escape' => false)
								);
							?>
						</td>
						<td class="text-center">
							<?php echo $this->Html->link($product['Product']['name'],'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['Product']['slug']);
							?>
						</td>							
						<td class="text-center">
							<?php echo $product['SubCategory']['name'];?>
						</td>
						<td class="text-center">
							<?php echo $product['length'];?>
						</td>
						<td class="text-center">
							R$ <?php echo number_format($product['Product']['price'],2,',','.');?>
						</td>

						<td class="text-center">
							R$ <?php echo number_format($totalItem,2,',','.');?>
						</td>
					</tr>
                <?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
				  <td colspan="5" class="text-right">
					<strong>Total:</strong>
				  </td>
				  <td colspan="2" class="text-left">
					R$ <?php echo number_format($total,2,',','.');?>
				  </td>
				</tr>
			</tfoot>
		</table>				
	</div>

	<section class="registration-area">
		<div class="row">

			<div class="col-sm-6">
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">
							Endereço de Entrega
						</h3>
					</div>
					<div class="panel-body">
						<p>
							<b>Cidade:</b> <?php echo CakeSession::read('Auth.User.City.name');?> <br/>
							<b>Bairro:</b> <?php echo CakeSession::read('Auth.User.neighborhood');?> <br/>
							<b>Endereço:</b> <?php echo CakeSession::read('Auth.User.address');?>, <?php echo CakeSession::read('Auth.User.number');?> <br/>
							<b>Complemento:</b> <?php echo CakeSession::read('Auth.User.complement');?> <br/>
							<b>CEP:</b> <?php echo CakeSession::read('Auth.User.cep');?> 
						</p>
					</div>
				</div>
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">
							Tipo Frete
						</h3>
					</div>
					<div class="panel-body">
					<!-- Form Starts -->
						<form class="form-inline">
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label style="padding-left:0px">
											
											<input name="service" checked="checked" type="radio" value="40010"/> Sedex
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label style="padding-left:0px">
											<input name="service" type="radio" value="41106"/> PAC
										</label>
									</div>
								</div>
							</div>
						</form>
					<!-- Form Ends -->
					</div>
					<br/>
				</div>	
			</div>

			<div class="col-sm-6">
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">
							Cupom Promocional
						</h3>
					</div>
					<div class="panel-body">
					<!-- Form Starts -->
						<?php echo $this->Form->create('PromotionalCode', array('action' => 'check', 'class' => 'form-horizontal', 'role' => 'form'));?>
							<div class="form-group">
								<label for="inputCouponCode" class="col-sm-4 control-label">Cupom Promocional: </label>
								<div class="col-sm-8">
									<?php echo $this->Form->text('code', array('class' => 'form-control', 'placeholder' => 'Cupom Promocional'));?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<?php echo $this->Form->button('Ativar Cupom', array('class' => 'btn btn-default', 'type' => 'submit'));?>
								</div>
							</div>
						<?php echo $this->Form->end();?>
					<!-- Form Ends -->
					</div>
					<?php if($this->Session->check('Message.code-success')): ?>
						<div class="alert alert-warning" role="alert"><?php echo $this->Session->flash('code-success');?></div>
					<?php elseif ($this->Session->check('Message.code-error')) :?>
						<div class="alert alert-danger" role="alert"><?php echo $this->Session->flash('code-error');?></div>
					<?php endif; ?>
				</div>
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">
							Total
						</h3>
					</div>
					<div class="panel-body">
						<dl class="dl-horizontal">
							<dt>Desconto:</dt>
							<dd>
								<span id="discount">
									<?php 
										$discount = CakeSession::read('PromotionalCode.PromotionalCode.discount');
										echo $discount ?: 0;
									?>
								</span>
								 %
							</dd>
							<dt>Sub-Total:</dt>
							<dd>R$
								<span id="total">
									<?php 
										echo number_format($total,2,',','.');
									?>
								</span>
							</dd>
							<dt>Frete:</dt>
							<dd>R$ <span id="shipping"><?php echo $this->Session->read('Shipping.value') ?: '0,00' ; ?></span></dd>
							<dt>Total:</dt>
							<dd>R$
								<span class="totalJs">
									<?php 
										$total = number_format(($subTotal + str_replace(",", '.', $this->Session->read('Shipping.value'))),2,',','.');
										echo $total;
									?>
								</span>
							</dd>
						</dl>
						<hr />
						<dl class="dl-horizontal total">
							<dt>Total :</dt>
							<dd>R$ 
								<span class="totalJs">
									<?php echo $total;?>
								</span>
							</dd>
						</dl>	
						<hr/>
						<div class="text-uppercase clearfix">
							<?php echo $this->Html->link('Finalizar Venda', 
							 	array('controller' => 'sells', 'action' => 'confirmSell'),
							 	array('class' => 'btn btn-success pull-right', 'type' => 'submit')
							 	);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	$(document).ready(function(){
		var element = $('input:radio[name=service]');
		element.click(function() {
			getValue();
			calculateTotal();
		});

		getValue();
		calculateTotal();
	});

	function getValue() {
		var value = $('input:radio[name=service]:checked').val();
		var baseURL = '<?php echo $this->Html->url("/"); ?>';
    	var url = 'sells/checkCep/';
		$.ajax({
			type: 'POST',
			url: baseUrl + url,
			data: {service: value},
			async:false,
			success: function(data) {
				data = data.replace("\"", "");
				data = data.replace("\"", "");
				$('#shipping').html(data);
			}
		});
	}

	function calculateTotal() {
		var shipping = 0; 
		var discount = 0;
		var total = 0;

		shipping = parseFloat($('#shipping').html().replace(',', '.'));
		discount = parseInt($('#discount').html());
		total = parseFloat($('#total').html().replace(',', '.'));
		total = (total - (total * (discount / 100)) + shipping);
		
		$('.totalJs').html(total.toFixed(2));
	}
</script>