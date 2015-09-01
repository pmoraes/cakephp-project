<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>Casa do Vinho | Login</title>
		<?php
			echo $this->Html->css('../js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min');  
			echo $this->Html->css('font-icons/entypo/css/entypo');
			echo $this->Html->css('http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic');
			echo $this->Html->css('neon');
			echo $this->Html->css('custom');
			echo $this->Html->script('jquery-1.10.2.min');
		?>
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">

<div class="login-container">
	
	<?php echo $this->fetch('content'); ?>

</div>
	<?php 
		echo $this->Html->script('gsap/main-gsap');
		echo $this->Html->script('jquery-ui/js/jquery-ui-1.10.3.minimal.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('joinable');
		echo $this->Html->script('resizeable');
		echo $this->Html->script('neon-api');
		echo $this->Html->script('jquery.validate.min');
		echo $this->Html->script('neon-login');
		echo $this->Html->script('neon-custom');
		echo $this->Html->script('neon-demo');
	?>
</body>
</html>