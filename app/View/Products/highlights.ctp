<section class="products-list">         
    <div class="container">
        <!-- Heading Starts -->
        <h2 class="product-head">Produtos em Destaque</h2>
        <!-- Heading Ends -->

        <!-- Products Row Starts -->
        <div class="row">
            <!-- Product -->
            <?php foreach ($highlights as $key => $highlight):?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-col">
                        <div class="image">
                            <?php echo $this->Html->image('../uploads/products/image/medium.'.$highlight['AttachmentImage']['filename'], array('class' => 'img-responsive'))?>
                        </div>
                        <div class="caption">
                            <h4>
                                <?php echo $this->Html->link(
                                    $highlight['Product']['name'],
                                    '/produtos/' . $highlight['SubCategory']['slug'] . '/' . $highlight['Product']['slug']
                                    );
                                ?>
                            </h4>
                            <div class="description">
                                <?php 
                                    echo substr($highlight['Product']['description'], 0, 75) . '...';
                                ?>
                            </div>
                            <div class="price">
                                <span class="price-new">R$<?php echo number_format($highlight['Product']['price'],2,',','.')?></span> 
                                <?php if ($highlight['Product']['old_price']): ?>
                                    <span class="price-old">R$<?php echo number_format($highlight['Product']['old_price'],2,',','.')?></span>
                                <?php endif; ?>
                            </div>
                            <div class="cart-button button-group">
                                <button type="button" title="Lista de Desejo" data-button='wishlist' class="btn btn-wishlist" data-id="<?php echo $highlight['Product']['id'];?>">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <?php if ($highlight['Product']['availability']): ?>
                                    <button type="button" title="Carrinho de Compras" data-button='cart' data-id="<?php echo $highlight['Product']['id'];?>" class="btn btn-wishlist btn-cart">
                                        <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                <?php endif; ?>                                  
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <!-- Product -->
        </div>
    <!-- Products Row Ends -->
    </div>
</section>
