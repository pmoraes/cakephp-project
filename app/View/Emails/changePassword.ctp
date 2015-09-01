<p>Olá, <?php echo ucfirst($user['Client']['first_name']);?></p>

Segue abaixo seu login e senha.

<p>
	<b>Email:</b> <?php echo $user['Client']['email']?>
</p>
<p>
	<b>Senha:</b> <?php echo $password;?>
</p>

<p>
Para trocar a senha gerada, por favor utilize esse link: 
<?php $route = Router::url('/clients/resetPassword/' . $hash, true); ?>
	<a href="<?php echo $route;?>">Alterar senha</a>
</p>