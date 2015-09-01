<!-- Main Container Starts -->
	<div id="main-container" class="container">
		<div class="row">
		<!-- Primary Content Starts -->
			<div class="col-md-12">
			<!-- Breadcrumb Starts -->
				<ol class="breadcrumb">
					<li>
						<?php echo $this->Html->link('Home', '/')?>
					</li>
					<li class="active"><?php echo $campaign['Campaign']['name'];?></li>
				</ol>
			<!-- Breadcrumb Ends -->
			<!-- Main Heading Starts -->
				<h2 class="main-heading2">
					<?php echo $campaign['Campaign']['name'];?>
				</h2>
			<!-- Main Heading Ends -->
			<!-- Category Intro Content Starts -->
				<div class="row cat-intro">
					<div class="col-sm-3">
						<?php echo $this->Html->image('../uploads/campaigns/image/big.' . $campaign['AttachmentImage']['filename'], array('alt' => $campaign['Campaign']['title'], 'class' => 'img-responsive img-thumbnail'));?>
					</div>
					<div class="col-sm-9 cat-body">
						<p>
							<?php echo $campaign['Campaign']['description'];?>
						</p>
					</div>
				</div>
				<br/>
			<!-- Category Intro Content Ends -->
			
			<!-- Product Grid Display Starts -->
				<div class="row">
				<!-- Product Starts -->
					<?php $total = 0;?>
					<?php if (!$campaign['Product']): ?>
						<h4>Nenhum produto encontrado nesta categoria!</h4>
					<?php else: ?>
						<?php foreach ($campaign['Product'] as $key => $product) :?>
							<?php if ($total < $product['price']) :?>
								<?php $total = $product['price'];?>
							<?php endif;?>
							<div class="col-md-3 col-sm-6">
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
			                                	R$
			                                	<?php echo 
			                                		number_format($product['price'] - ($product['price'] * ($campaign['Campaign']['discount'] / 100)),2,',','.');
			                                	?>
			                                </span>
			                                <span class="price-old">R$<?php echo number_format($product['price'],2,',','.');?></span> 
			                            </div>
			                            <div class="cart-button button-group">
			                                <button type="button" title="Lista de Desejo" class="btn btn-wishlist" data-button='wishlist' data-id="<?php echo $product['id'];?>">
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
					<?php endif; ?>
				<!-- Product Ends -->
				</div>
			<!-- Product Grid Display Ends -->
			</div>
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->