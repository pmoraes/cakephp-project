<header id="header-area">
    <!-- Header Top Starts -->
    <div class="header-top">
        <div class="container">
            <!-- Header Links Starts -->
                <?php echo $this->element('website/Navigation/top');?>
            <!-- Header Links Ends -->
        </div>
    </div>
    <!-- Header Top Ends -->
<!-- Starts -->
    <div class="container">
    <!-- Main Header Starts -->
        <div class="main-header">
            <div class="row">
            <!-- Logo Starts -->
                <div class="col-md-6">
                    <div id="logo">
                        <?php echo 
                            $this->Html->link(
                                $this->Html->image('logo.png', 
                                    array(
                                        'title' => 'Spice Shopps', 
                                        'alt' => 'Spice Shoppe', 
                                        'class' => 'img-responsive'
                                    )
                                ),
                               '/',
                                array('escape' => false));
                        ?>
                    
                    </div>
                </div>
            <!-- Logo Starts -->
            <!-- Search Starts -->
                <?php echo $this->element('website/search')?>
            <!-- Search Ends -->
            <!-- Shopping Cart Starts -->
                <?php echo $this->element('website/cart')?>
            <!-- Shopping Cart Ends -->
            </div>
        </div>
    <!-- Main Header Ends -->
    <!-- Main Menu Starts -->
        <nav id="main-menu" class="navbar" role="navigation">
        <!-- Nav Header Starts -->
            <div class="navbar-header">
                <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        <!-- Nav Header Ends -->
        <!-- Navbar Cat collapse Starts -->
            <?php echo $this->requestAction(
                    array('controller' => 'categories', 'action' => 'menu'),
                    array('return')
                );
            ?>
        <!-- Navbar Cat collapse Ends -->
        </nav>
    <!-- Main Menu Ends -->
    </div>
<!-- Ends -->
</header>