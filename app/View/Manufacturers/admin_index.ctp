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

<h2>Lista de Fornecedores</h2>

<br />

<?php if($this->Session->check('Message.error')):?>
	<div class="alert alert-danger"><?php echo $this->Session->flash('error');?></div>
<?php elseif($this->Session->check('Message.flash')): ?>
	<div class="alert alert-success"><?php echo $this->Session->flash();?></div>
<?php endif;?>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Razão Social</th>
			<th>Nome Fantasia</th>
			<th>CNPJ</th>
			<th>Telefone 1</th>
			<th>Endereço</th>
			<th>Cidade</th>
			<th>Ativo</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($manufacturers as $key => $manufacturer) : ?>
		<tr>
			<td><?php echo $manufacturer['Manufacturer']['id']?></td>
			<td><?php echo $manufacturer['Manufacturer']['social_reason']?></td>
			<td><?php echo $manufacturer['Manufacturer']['fantasy_name']?></td>
			<td><?php echo $manufacturer['Manufacturer']['cnpj']?></td>
			<td><?php echo $manufacturer['Manufacturer']['first_phone']?></td>
			<td><?php echo $manufacturer['Manufacturer']['address']?></td>
			<td><?php echo $manufacturer['City']['name']?></td>
			<td>
				<?php if ($manufacturer['Manufacturer']['active']) :?>
					<?php 
						$class  = "success"; 
						$status = "ativo";
					?>	
				<?php else: ?>
					<?php 
						$class  = "danger"; 
						$status = "inativo";
					?>	
				<?php endif; ?>
				<div class="label label-<?php echo $class;?>"><?php echo $status;?></div>
			</td>
			<td>
				<?php echo $this->Html->link('<i class="entypo-pencil"></i> Editar', 
					array(
						'controller' => 'manufacturers', 
						'action' => 'admin_edit', 
						$manufacturer['Manufacturer']['id']
					),
					array(
						'class' => 'btn btn-default btn-sm btn-icon icon-left',
						'escape' => false
					)
				);?>

				<?php echo $this->Form->postLink('<i class="entypo-cancel"></i> Deletar', 
					array(
						'controller' => 'manufacturers', 
						'action' => 'admin_delete', 
						$manufacturer['Manufacturer']['id']
					),
					array(
						'class' => 'btn btn-danger btn-sm btn-icon icon-left',
						'escape' => false
					),
					"Deseja realmente deletar esse fornecedor?"
				);?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Razão Social</th>
			<th>Nome Fantasia</th>
			<th>CNPJ</th>
			<th>Telefone</th>
			<th>Endereço</th>
			<th>Cidade</th>
			<th>Ativo</th>
			<th>Ações</th>
		</tr>
	</tfoot>
</table>

<?php echo $this->Html->css('../js/datatables/responsive/css/datatables.responsive');?>
<?php echo $this->Html->css('../js/select2/select2-bootstrap');?>
<?php echo $this->Html->css('../js/select2/select2');?>

<?php $files = array(
	'jquery.dataTables.min', 
	'datatables/jquery.dataTables.columnFilter', 
	'datatables/lodash.min', 
	'datatables/responsive/js/datatables.responsive', 
	'select2/select2.min', 
	'datatables/TableTools.min', 
	'dataTables.bootstrap', 
	'select2_locale_pt-BR'); 
?>

<?php echo $this->Html->script($files, array('block' => 'scriptBottom')) ?>

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