<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Fechar</span>
                </button>
                <h4 class="modal-title">
                    Lista de Desejo
                </h4>
            </div>
            <div class="modal-body">
                Tem certeza que deseja deletar o produto da sua lista de desejo?
            </div>
            <div class="modal-footer">
				<?php
					echo $this->Form->postLink(
						'Confirma',
						'/lista-de-desejo/item/delete',
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
			<li class="active">Lista de Desejos</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Lista de Desejo
		</h2>
		<?php if($this->Session->check('Message.wishListSuccess')): ?>
			<div class="alert alert-warning" role="alert"><?php echo $this->Session->flash('wishListSuccess');?></div>
		<?php elseif ($this->Session->check('Message.wishListError')) :?>
			<div class="alert alert-danger" role="alert"><?php echo $this->Session->flash('wishListError');?></div>
		<?php endif; ?>
	<!-- Main Heading Ends -->
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
							Valor
						</td>
						<td class="text-center">
							Disponível
						</td>
						<td class="text-center">
							Ações
						</td>
					</tr>
				</thead>
				<tbody>
					<?php $total = 0;?>
					<?php foreach ($client['Product'] as $key => $product): ?>
						<?php $total += $product['price']; ?>
						<tr>
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
								<?php echo $this->Html->link($product['name'],'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['slug']);
								?>
							</td>							
							<td class="text-center">
								<?php echo $product['SubCategory']['name'];?>
							</td>
							<td class="text-center">
								R$ <?php echo number_format($product['price'],2,',','.');?>
							</td>
							<td class="text-center">
								<?php if ($product['availability']): ?>
									<strong class="label label-success">Disponível</strong>
								<?php else: ?>
									<strong class="label label-danger">Indisponível</strong>
								<?php endif; ?>
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
											'data-action' => Router::url() . '/item/delete/' . $product['ClientProduct']['id'],
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
					  <td colspan="4" class="text-right">
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