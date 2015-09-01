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
					<li class="active"><?php echo $product['Product']['name']?></li>
				</ol>
			<!-- Breadcrumb Ends -->
			<!-- Product Info Starts -->
				<div class="row product-info">
				<!-- Left Starts -->
					<div class="col-sm-5 images-block">
						<p>
							<?php echo $this->Html->image('../uploads/products/image/big.'.$product['AttachmentImage']['filename'], 
                                    array(
                                        'alt' => $product['Product']['name'], 
                                        'class' => 'img-responsive thumbnail'
                                    )
                                )
                            ?>
						</p>
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-7 product-details">
					<!-- Product Name Starts -->
						<h2><?php echo $product['Product']['name']?></h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer">
							<li>
								<span>Categoria:</span> <?php echo $product['SubCategory']['name'];?>
							</li>
							<li>
								<span>Disponibilidade:</span> 
								<?php if ($product['Product']['availability']): ?>
									<strong class="label label-success">Disponível</strong>
								<?php else: ?>
									<strong class="label label-danger">Indisponível</strong>
								<?php endif; ?>
							</li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div class="price">
							<span class="price-head">Preço:</span>
							<span class="price-new">R$ <?php echo number_format($product['Product']['price'],2,',','.')?></span> 
						</div>
					<!-- Price Ends -->
						<hr />
					<!-- Available Options Starts -->
						<div class="options">
							<div class="form-group">
								<label class="control-label text-uppercase" for="input-quantity">Quantidade:</label>
								<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
							</div>
							<div class="cart-button button-group">
								<button type="button" title="Lista de Desejo" data-button='wishlist' class="btn btn-wishlist" id="wishlist"  data-id="<?php echo $product['Product']['id'];?>">
									<i class="fa fa-heart"></i>
								</button>
								<?php if ($product['Product']['availability']): ?>
									<button type="button" title="Carrinho de Compras" data-button='cart' class="btn btn-wishlist btn-cart" data-id="<?php echo $product['Product']['id'];?>">
										<i class="fa fa-shopping-cart"></i> 
									</button>
								<?php endif; ?>
								
							</div>
						</div>
					<!-- Available Options Ends -->
						<hr />
					</div>
				<!-- Right Ends -->
				</div>
			<!-- product Info Ends -->
			<!-- Product Description Starts -->
				<div class="product-info-box">
					<h4 class="heading">Description</h4>
					<div class="content panel-smart">
						<p>
							<?php echo $product['Product']['description'];?>
						</p>
					</div>
				</div>
			<!-- Product Description Ends -->
			<!-- Related Products Starts -->
				<div class="product-info-box">
					<h4 class="heading">Produtos Relacionados</h4>
				<!-- Products Row Starts -->
					<div class="row">
					<!-- Relations Products -->
						<?php foreach ($product['ProductRelation'] as $key => $product): ?>
							
							<div class="col-md-4 col-sm-6">
								<div class="product-col">
									<div class="image">
										<?php echo $this->Html->image('../uploads/products/image/medium.'.$product['AttachmentImage']['filename'], 
			                                    array(
			                                        'alt' => $product['Product']['name'], 
			                                        'class' => 'img-responsive'
			                                    )
			                                )
			                            ?>
									</div>
									<div class="caption">
										<h4>
			                                <?php echo $this->Html->link(
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
			                                <span class="price-new">R$<?php echo number_format($product['Product']['price'],2,',','.');?></span> 
			                                <?php if ($product['Product']['old_price']): ?>
			                                    <span class="price-old">R$<?php echo number_format($product['Product']['old_price'],2,',','.')?></span>
			                                <?php endif; ?>
			                            </div>
										<div class="cart-button button-group">
											<button type="button" title="Wishlist" class="btn btn-wishlist" data-id="<?php echo $product['Product']['id'];?>">
												<i class="fa fa-heart"></i>
											</button>
											<?php if ($product['Product']['availability']): ?>
												<button type="button" class="btn btn-cart">
													<i class="fa fa-shopping-cart"></i> 
												</button>
											<?php endif; ?>									
										</div>
									</div>
								</div>
							</div>

						<?php endforeach; ?>
					<!-- Relations Products -->
					</div>
				<!-- Products Row Ens -->
				</div>
			<!-- Related Products Ends -->
			</div>
		<!-- Primary Content Ends -->
	</div>
<!-- Main Container Ends -->