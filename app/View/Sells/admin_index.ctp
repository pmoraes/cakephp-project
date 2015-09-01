<ol class="breadcrumb bc-3">
	<li>
		<a href="index.html"><i class="entypo-home"></i>Home</a>
	</li>
	<li>
		<a href="forms-main.html">Forms</a>
	</li>
	<li class="active">
		<strong>Basic Elements</strong>
	</li>
</ol>

<h2>Lista de Vendas</h2>

<br />

<?php if($this->Session->check('Message.error')): ?>
	<div class="alert alert-danger"><?php echo $this->Session->flash('Message.error');?></div>
<?php elseif($this->Session->check('Message.flash')): ?>
	<div class="alert alert-success"><?php echo $this->Session->flash();?></div>
<?php endif;?>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Cliente</th>
			<th>Total</th>
			<th>Data</th>
			<th>Forma de Pagamento</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sells as $key => $sell) :?>
		<tr>
			<td><?php echo $sell['Sell']['id']?></td>
			<td><?php echo $sell['Client']['first_name'] . " " . $sell['Client']['last_name']?></td>
			<td>R$ <?php echo number_format($sell['Sell']['total'],2,',','.')?></td>
			<td><?php echo date('d-m-Y H:i:s',strtotime($sell['Sell']['created']));?></td>
			<td>Cartão de Crédito</td>
			<td>
				<?php 
					switch ($sell['Sell']['status_sell_id']) {
						case '1':
							$class  = "danger"; 
							$status = $sell['StatusSell']['name'];
							break;
						case '2':
							$class  = "warning"; 
							$status = $sell['StatusSell']['name'];
							break;
						case '3':
							$class  = "success"; 
							$status = $sell['StatusSell']['name'];
							break;
					}
				?>
				<div class="label label-<?php echo $class;?>"><?php echo $status;?></div>
			</td>
			<td>
				<?php echo $this->Html->link('<i class="entypo-pencil"></i> Editar', 
					array(
						'controller' => 'sells', 
						'action' => 'admin_edit', 
						$sell['Sell']['id']
					),
					array(
						'class' => 'btn btn-default btn-sm btn-icon icon-left',
						'escape' => false
					)
				);?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Cliente</th>
			<th>Total</th>
			<th>Data</th>
			<th>Forma de Pagamento</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</tfoot>
</table>

<?php echo $this->Html->css('../js/datatables/responsive/css/datatables.responsive');?>


<?php $files = array(
	'jquery.dataTables.min',
	'datatables/jquery.dataTables.columnFilter', 
	'datatables/lodash.min', 
	'datatables/responsive/js/datatables.responsive', 
	'datatables/TableTools.min', 
	'dataTables.bootstrap', 
	);
?>
<?php echo $this->Html->script($files, array('block' => 'scriptBottom'));?>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		var table = $("#table-1").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-6 col-left'l><'col-xs-6 col-right'<'export-data'T>f>r>t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
			"oTableTools": {
			}
		});
	});
</script>