<?php echo $this->element('website/modal');?>

<?php echo $this->requestAction(
        array('controller' => 'sliders', 'action' => 'sliders'),
        array('return')
    );
?>

<!-- Campaigns Starts -->
<?php echo $this->requestAction(
        array('controller' => 'campaigns', 'action' => 'campaigns'),
        array('return')
    );
?>
<!-- Campaigns Ends -->

<!-- Latest Products Starts -->
<?php echo $this->requestAction(
        array('controller' => 'products', 'action' => 'highlights'),
        array('return')
    );
?>
<!-- Latest Products Ends -->

<!-- Specials Products Starts -->
<?php echo $this->requestAction(
        array('controller' => 'products', 'action' => 'promotions'),
        array('return')
    );
?>
<!-- Specials Products Ends -->