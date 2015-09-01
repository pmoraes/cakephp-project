<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Casa do Vinho</title>
    
    <!-- Bootstrap Core CSS -->
    <?php echo $this->Html->css('bootstrap.min');?>
    
    <!-- Google Web Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
    <!-- CSS Files -->
    <?php echo $this->Html->css('font-icons/font-awesome/css/font-awesome.min');?>
    <?php echo $this->Html->css('style');?>
    <?php echo $this->Html->css('responsive');?>
    <?php echo $this->Html->script('jquery-1.11.1.min');?>
    
    <!--[if lt IE 9]>
        <script src="js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Header Section Starts -->
        <?php echo $this->element('website/Navigation/header')?>
    <!-- Header Section Ends -->
        <?php echo $this->fetch('content');?>
    <!-- Footer Section Starts -->
        <?php echo $this->element('website/footer');?>
    <!-- Footer Section Ends -->
    <!-- JavaScript Files -->
    <?php echo $this->Html->script('jquery-migrate-1.2.1.min');?>
    <?php echo $this->Html->script('bootstrap.min');?>
    <?php echo $this->Html->script('bootstrap-hover-dropdown.min');?>
    <?php echo $this->Html->script('jquery.magnific-popup.min');?>
    <?php echo $this->Html->script('custom');?>
    <?php echo $this->Html->script('jquery.mask.min');?>
    <script type="text/javascript">var baseUrl = '<?php echo $this->Html->url("/"); ?>';</script>

    <?php echo $this->Html->script('common');?>
</body>
</html>