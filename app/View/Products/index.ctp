<!-- Main Container Starts -->
	<div id="main-container" class="container">
		<div class="row">
		<!-- Primary Content Starts -->
			<div class="col-md-9">
			<!-- Breadcrumb Starts -->
				<ol class="breadcrumb">
					<li>
						<?php echo $this->Html->link('Home', '/')?>
					</li>
					<li class="active"><?php  echo $products['SubCategory']['name'];?></li>
				</ol>
			<!-- Breadcrumb Ends -->
			<!-- Main Heading Starts -->
				<h2 class="main-heading2">
					<?php echo $products['SubCategory']['name'];?>
				</h2>
			<!-- Main Heading Ends -->
			
			<?php $total = 0;?>
			<?php if (!$products['Product']): ?>
				<h4>Nenhum produto encontrado nesta categoria!</h4>
			<?php else: ?>
				<!-- Product Grid Display Starts -->
					<div class="row">
					<!-- Product Starts -->
						<?php foreach ($products['Product'] as $key => $product): ?>
							<?php if ($total < $product['price']) :?>
								<?php $total = $product['price'];?>
							<?php endif;?>
							<div class="col-md-4 col-sm-6">
								<div class="product-col">
									<div class="image">
										<?php echo $this->Html->image('../uploads/products/image/medium.' . $product['AttachmentImage']['filename']);?>
									</div>
									<div class="caption">
										<h4>
											<?php echo 
												$this->Html->link(
													$product['name'],
													'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['slug']
												);
											?>
										</h4>
										<div class="description">
											<?php 
			                                    echo substr($product['description'], 0, 75) . '...';
			                                ?>
										</div>
										<div class="price">
			                                <span class="price-new">
			                                	R$<?php echo number_format($product['price'],2,',','.');?>
			                                </span>
			                                <?php if ($product['old_price']): ?>
			                                	<span class="price-old">R$<?php echo number_format($product['old_price'],2,',','.');?></span> 
			                                <?php endif; ?>
			                            </div>
			                            <div class="cart-button button-group">
			                                <button type="button" title="Lista de Desejo" data-button='wishlist' class="btn btn-wishlist" data-id="<?php echo $product['id'];?>">
			                                    <i class="fa fa-heart"></i>
			                                </button>
			                                <?php if ($product['availability']): ?>
			                                    <button type="button" title="Carrinho de Compras" data-button='cart' class="btn btn-wishlist btn-cart" data-id="<?php echo $product['id'];?>">
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
				<!-- Product Grid Display Ends -->
			<?php endif; ?>
			</div>
		<!-- Primary Content Ends -->
		<?php echo $this->element('website/advancedSearch', 
				array(
					'total' => $total, 
					'controller' => 'products',
					'action' => 'advancedSearch',
					'parameter' => $products['SubCategory']['slug']
				)
			);
		?>
		</div>
	</div>
<!-- Main Container Ends -->