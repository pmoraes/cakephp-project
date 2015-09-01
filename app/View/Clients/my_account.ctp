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
							Data
						</td>							
						<td class="text-center">
							Valor
						</td>
						<td class="text-center">
							Status
						</td>
						<td class="text-center">
							Ações
						</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sells as $key => $sell): ?>
						<tr>
							<td class="text-center">
								<?php echo $sell['Sell']['id']; ?>
							</td>
							<td class="text-center">
								<?php echo $sell['Sell']['created']; ?>
							</td>							
							<td class="text-center">
								R$ <?php echo number_format($sell['Sell']['total'],2,',','.');?>
							</td>
							<td class="text-center">
								<?php echo $sell['StatusSell']['name'];?>
							</td>
							<td class="text-center">
								<?php echo $this->Html->link('Detalhes', array('controller' => 'clients' , 'action' => 'myAccountDetails', $sell['Sell']['id']));?>
							</td>

						</tr>
                    <?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td class="text-center">
							Código
						</td>
						<td class="text-center">
							Data
						</td>							
						<td class="text-center">
							Valor
						</td>
						<td class="text-center">
							Status
						</td>
						<td class="text-center">
							Ações
						</td>
					</tr>
				</tfoot>
			</table>				
		</div>
	<!-- Shopping Cart Table Ends -->
	</div>
<!-- Main Container Ends -->