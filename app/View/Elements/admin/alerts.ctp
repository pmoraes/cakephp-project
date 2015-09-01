<div class="row">
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $clients; ?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $clients;?></div>
			<h3>Clientes Registrados</h3>
			<p>clientes ativos.</p>
		</div>
		
	</div>

	<div class="col-sm-3">
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num"><?php echo number_format($totalSold['total'], 2, '.', ''); ?></div>
			
			<h3>Valor Total</h3>
			<p>valor total de produtos vendidos.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $messages;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $messages;?></div>
			
			<h3>Novas Menssagens</h3>
			<p>Quantidade de Menssagens não lidas.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-plum">
			<div class="icon"><i class="entypo-paper-plane"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $openSell?>" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $openSell?></div>
			<h3>Pedidos</h3>
			<p>Quantidade de venda sem movimentação ainda.</p>
		</div>
		
	</div>
</div>