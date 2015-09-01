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
					<li class="active">Busca Avançada</li>
				</ol>
			<!-- Breadcrumb Ends -->
			<!-- Main Heading Starts -->
				<h2 class="main-heading2">
					Resultados
				</h2>
			<!-- Main Heading Ends -->
			
			<?php if (!$products): ?>
				<h4>Nenhum produto encontrado nesta busca!</h4>
			<?php else: ?>
				<!-- Product Grid Display Starts -->
					<div class="row">
					<!-- Product Starts -->
						<?php foreach ($products as $key => $product): ?>
							<div class="col-md-3 col-sm-6">
								<div class="product-col">
									<div class="image">
										<?php echo $this->Html->image('../uploads/products/image/medium.' . $product['AttachmentImage']['filename']);?>
									</div>
									<div class="caption">
										<h4>
											<?php echo 
												$this->Html->link(
													$product['Product']['name'],
													'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['Product']['slug']
												);
											?>
										</h4>
										<div class="description">
											<?php 
			                                    echo substr($product['Product']['description'], 0, 75) . '...';
			                                ?>
										</div>
										<div class="price">
			                                <span class="price-new">
			                                	R$<?php echo number_format($product['Product']['price'],2,',','.');?>
			                                </span>
			                                <?php if ($product['Product']['old_price']): ?>
			                                	<span class="price-old">R$<?php echo number_format($product['Product']['old_price'],2,',','.');?></span> 
			                                <?php endif; ?>
			                            </div>
			                            <div class="cart-button button-group">
			                                <button type="button" title="Lista de Desejo" data-button='wishlist' class="btn btn-wishlist" data-id="<?php echo $product['Product']['id'];?>">
			                                    <i class="fa fa-heart"></i>
			                                </button>
			                                <?php if ($product['Product']['availability']): ?>
			                                    <button type="button" title="Carrinho de Compras" data-button='cart' class="btn btn-wishlist btn-cart" data-id="<?php echo $product['Product']['id'];?>">
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
		</div>
	</div>
<!-- Main Container Ends -->