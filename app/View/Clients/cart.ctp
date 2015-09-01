	<div class="modal fade" id="delete">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">
	                    <span aria-hidden="true">&times;</span>
	                    <span class="sr-only">Fechar</span>
	                </button>
	                <h4 class="modal-title">
	                    Carrinho de Compra
	                </h4>
	            </div>
	            <div class="modal-body">
	                Tem certeza que deseja deletar o produto do seu carrinho de compra?
	            </div>
	            <div class="modal-footer">
					<?php
						echo $this->Form->postLink(
							'Confirma',
							'/carrinho-de-compra/item/delete',
							array('class' => 'btn btn-warning'),
							false
						);
					?>
				</div><!-- /.modal-footer -->	
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Main Container Starts -->
		<div id="main-container" class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li>
					<?php echo $this->Html->link("Home", '/')?>
				</li>
				<li class="active">Carrinho de Compra</li>
			</ol>
		<!-- Breadcrumb Ends -->
		<!-- Main Heading Starts -->
			<h2 class="main-heading text-center">
				Carrinho de Compra
			</h2>
		<!-- Main Heading Ends -->
		<?php if($this->Session->check('Message.cartSuccess')): ?>
			<div class="alert alert-warning" role="alert"><?php echo $this->Session->flash('cartSuccess');?></div>
		<?php elseif ($this->Session->check('Message.cartError')) :?>
			<div class="alert alert-danger" role="alert"><?php echo $this->Session->flash('cartError');?></div>
		<?php endif; ?>
		<!-- Shopping Cart Table Starts -->
			<div class="table-responsive shopping-cart-table">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td class="text-center">
								Imagem
							</td>
							<td class="text-center">
								Nome
							</td>							
							<td class="text-center">
								Categoria
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
							<td class="text-center">
								Ações
							</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$total = 0;
							foreach ($products as $key => $product): 
								$totalItem = 0;
								$totalItem = ($product['Product']['price'] * $product['length']);
								$total += $totalItem;
						?>
							<tr>
								<td class="text-center">
									<?php 
										echo $this->Html->link(
											$this->Html->image('../uploads/products/image/smallMedium.'. $product['AttachmentImage']['filename'], 
											array('alt' => 'Product Name', 'title' => 'Product Name', 'class' => 'img-thumbnail')),
											'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['Product']['slug'],
											array('escape' => false)
										);
									?>
								</td>
								<td class="text-center">
									<?php echo $this->Html->link($product['Product']['name'],'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['Product']['slug']);
									?>
								</td>							
								<td class="text-center">
									<?php echo $product['SubCategory']['name'];?>
								</td>
								<td class="text-center">
									<?php echo $product['length'];?>
								</td>
								<td class="text-center">
									R$ <?php echo number_format($product['Product']['price'],2,',','.');?>
								</td>

								<td class="text-center">
									R$ <?php echo number_format($totalItem,2,',','.');?>
								</td>
								
								<td class="text-center">
									
									<?php 
										echo $this->Html->link(
											$this->Html->tag('i','', array('class' => 'fa fa-times-circle')),
											'#',
											array(
												'class' => 'btn btn-default tool-tip',
												'data-toggle' => 'modal',
												'data-target' => '#confirmDelete',
												'title' => 'Remover',
												'data-action' => Router::url() . '/item/delete/' . $product['Product']['id'],
												'escape' => false
											)
										);
									?>
								</td>
							</tr>
	                    <?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
						  <td colspan="5" class="text-right">
							<strong>Total:</strong>
						  </td>
						  <td colspan="2" class="text-left">
							R$ <?php echo number_format($total,2,',','.');?>
						  </td>
						</tr>
					</tfoot>
				</table>				
			</div>
		<!-- Shopping Cart Table Ends -->
		<!-- Shipping Section Starts -->
			<section class="registration-area">
				<div class="row">
				<!-- Shipping & Shipment Block Starts -->
					<div class="col-sm-6">
						<!-- Conditions Panel Starts -->
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">
									Terms &amp; Conditions
								</h3>
							</div>
							<div class="panel-body">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>								
							</div>
						</div>
					<!-- Conditions Panel Ends -->
					</div>
				<!-- Shipping & Shipment Block Ends -->
				<!-- Discount & Conditions Blocks Starts -->
					<div class="col-sm-6">				
					<!-- Total Panel Starts -->
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">
									Total
								</h3>
							</div>
							<div class="panel-body">
								<dl class="dl-horizontal">
									<dd> 
									</dd>
									<dt>Sub-Total:</dt>
									<dd>R$
										<?php 
											echo number_format($total,2,',','.');
										?>
									</dd>
									<dt>Total:</dt>
									<dd>R$
									<?php 
										$total = number_format(($total + str_replace(",", '.', $this->Session->read('Shipping.value'))),2,',','.');
										echo $total;
									?>
									</dd>
								</dl>
								<hr />
								<dl class="dl-horizontal total">
									<dt>Total :</dt>
									<dd>R$<?php echo $total;?></dd>
								</dl>
								<hr />
								<div class="text-uppercase clearfix">
									<?php echo $this->Html->link(
										'
											<span class="hidden-xs">Continue Comprando</span>
											<span class="visible-xs">Continue</span>
										',
										'/',
										array(
											'class' => 'btn btn-default pull-left',
											'escape' => false
										)
									);
									?>
									<?php 
										if (CakeSession::read('Cart')) {
											echo $this->Html->link('Comprar','/finalizar-compra' ,array('class' => 'btn btn-default pull-right'));
										}
									?>
							</div>
						</div>
					</div>
				<!-- Total Panel Ends -->
				</div>
			<!-- Discount & Conditions Blocks Ends -->
			</div>
		</section>
	<!-- Shipping Section Ends -->
	</div>
<!-- Main Container Ends -->

<script type="text/javascript">
$(document).ready(function() {
	$("td.text-center a.btn").on("click", function () {
	    var action = $(this).attr('data-action');
	    $("form").attr('action',action);
	    $('#delete').modal('show');
	});
});
</script>