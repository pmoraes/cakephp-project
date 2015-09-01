<!-- Main Container Starts -->
	<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li>
				<?php echo $this->Html->link("Home", '/')?>
			</li>
			<li class="active">Lista de Compras</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Lista de Compras
		</h2>
	<!-- Main Heading Ends -->
	<!-- Shopping Cart Table Starts -->
		<div class="table-responsive shopping-cart-table">
			<table class="table table-bordered">
				<thead>	
					<tr>
						<td class="text-center">
							Código
						</td>
						<td class="text-center">
							Imagem
						</td>
						<td class="text-center">
							Nome
						</td>
						<td class="text-center">
							Quantidade
						</td>
						<td class="text-center">
							Valor Unitário
						</td>
						<td class="text-center">
							Valor Total
						</td>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach ($sell['Product'] as $key => $products): ?>
						<?php foreach ($products as $key => $product): ?>
							<tr>
								<td class="text-center">
									<?php echo $product['id']; ?>
								</td>
								<td class="text-center">
									<?php 
										echo $this->Html->link(
											$this->Html->image('../uploads/products/imagem/smallMedium.'. $product['AttachmentImage']['filename'], 
											array('alt' => 'Product Name', 'title' => 'Product Name', 'class' => 'img-thumbnail')),
											'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['slug'],
											array('escape' => false)
										);
									?>
								</td>
								<td class="text-center">
									<?php echo $product['name']; ?>
								</td>							
								<td class="text-center">
									<?php echo $product['quantity']; ?>
								</td>
								<td class="text-center">
									R$ <?php echo number_format($product['price'],2,',','.');?>
								</td>
								<td class="text-center">
									R$ <?php echo number_format($product['quantity'] * $product['price'],2,',','.');?>
								</td>

							</tr>
						<?php endforeach; ?>
                    <?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td class="text-center">
							Código
						</td>
						<td class="text-center">
							Imagem
						</td>
						<td class="text-center">
							Nome
						</td>
						<td class="text-center">
							Quantidade
						</td>
						<td class="text-center">
							Valor Unitário
						</td>
						<td class="text-center">
							Valor Total
						</td>
					</tr>
				</tfoot>
			</table>				
		</div>
	<!-- Shopping Cart Table Ends -->
	</div>
<!-- Main Container Ends -->
