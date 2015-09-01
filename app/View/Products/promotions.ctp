<section class="products-list">         
    <div class="container">
    <!-- Heading Starts -->
        <h2 class="product-head">Produtos em Promoção</h2>
    <!-- Heading Ends -->
    <!-- Products Row Starts -->
        <div class="row">
        <!-- Product Starts -->
            <?php foreach ($promotions as $key => $promotion):?>
            <div class="col-md-3 col-sm-6">
                <div class="product-col">
                    <div class="image">
                        <?php echo $this->Html->image('../uploads/products/image/medium.'.$promotion['AttachmentImage']['filename'], 
                                array(
                                    'alt' => $promotion['Product']['name'], 
                                    'class' => 'img-responsive'
                                )
                            )
                        ?>
                    </div>
                    <div class="caption">
                        <h4>
                            <?php echo $this->Html->link(
                                $promotion['Product']['name'],
                                '/produtos/' . $promotion['SubCategory']['slug'] . '/' . $promotion['Product']['slug']
                                );
                            ?>
                        </h4>
                        <div class="description">
                            <?php 
                                echo substr($promotion['Product']['description'], 0, 75) . '...';
                            ?>
                        </div>
                        <div class="price">
                            <span class="price-new">R$<?php echo number_format($promotion['Product']['price'],2,',','.')?></span> 
                            <?php if ($promotion['Product']['old_price']): ?>
                                <span class="price-old">R$<?php echo $promotion['Product']['old_price']?></span>
                            <?php endif; ?>
                        </div>
                        <div class="cart-button button-group">
                            <button type="button" title="Lista de Desejo" data-button='wishlist' class="btn btn-wishlist" data-id="<?php echo $promotion['Product']['id'];?>">
                                <i class="fa fa-heart"></i>
                            </button>
                            <?php if ($promotion['Product']['availability']): ?>
                                <button type="button" title="Carrinho de Compras" data-button='cart' class="btn btn-wishlist btn-cart" data-id="<?php echo $promotion['Product']['id'];?>">
                                    <i class="fa fa-shopping-cart"></i> 
                                </button>
                            <?php endif; ?>                                  
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Product Ends -->
        </div>
    <!-- Products Row Ends -->
    </div>
</section>