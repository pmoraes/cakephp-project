<!-- 3 Column Banners Starts -->
<div class="col3-banners">
    <div class="container">
        <ul class="row list-unstyled">
            <?php foreach ($campaigns as $key => $campaign):?>
                <li class="col-sm-4">
                    <?php echo 
                        $this->Html->link(
                            $this->Html->image('../uploads/campaigns/image/big.' . $campaign['AttachmentImage']['filename'], array('alt' => 'banners', 'class' => 'img-responsive')),
                            array('controller' => 'campaigns', 'action' => 'view', $campaign['Campaign']['slug']),
                            array('escape' => false)
                        ); 
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!-- 3 Column Banners Ends -->