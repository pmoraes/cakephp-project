<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>Casa do Vinho | Admin</title>

	<?php echo $this->Html->css('../js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min');?>
	<?php echo $this->Html->css('font-icons/entypo/css/entypo');?>
	<?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic');?>
	<?php echo $this->Html->css('neon');?>
	<?php echo $this->Html->css('custom');?>
	<?php echo $this->Html->script('jquery-1.10.2.min');?>
	
</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container">	
	<div class="sidebar-menu">
		<?php echo $this->element('admin/Navigation/left');?>		
	</div>	
	<div class="main-content">
		
		<?php echo $this->element('admin/logout');?>
	
		<hr />

		<?php echo $this->fetch('content');?>

		<?php echo $this->element('admin/footer');?>

	</div>
	
<?php echo $this->Html->script('gsap/main-gsap');?>
<?php echo $this->Html->script('jquery-ui/js/jquery-ui-1.10.3.minimal.min');?>
<?php echo $this->Html->script('bootstrap-admin.min');?>
<?php echo $this->Html->script('joinable');?>
<?php echo $this->Html->script('resizeable');?>
<?php echo $this->Html->script('neon-api');?>
<?php echo $this->Html->script('jquery.sparkline.min');?>
<?php echo $this->Html->script('raphael-min');?>
<?php echo $this->Html->script('toastr');?>
<?php echo $this->Html->script('neon-chat');?>
<?php echo $this->Html->script('neon-custom');?>
<?php echo $this->Html->script('neon-demo');?>
<?php echo $this->Html->script('jquery.peity.min');?>
<?php echo $this->Html->script('neon-charts');?>
<?php echo $this->fetch('scriptBottom');?>

</body>
</html>
