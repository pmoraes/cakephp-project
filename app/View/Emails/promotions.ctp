<p>Parabéns, Você acabou de ganhar um código promocional!</p>

<p>Este código é valido para qualquer compra no nosso site, ele tem um desconto de <b><?php echo $discount?>%</b> </p>

<p>Este código tem a válidade até <b><?php echo date('d-m-Y', strtotime($validate));?></b></p>

<p><b>Código:</b> <i><?php echo $code; ?></i></p>

<p>Para acessar nosso site: <?php $route = Router::url('/', true); ?>
	<a href="<?php echo $route;?>">Nosso Site</a>
</p>