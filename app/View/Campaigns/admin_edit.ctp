<?php echo $this->Html->css('../js/select2/select2-bootstrap');?>
<?php echo $this->Html->css('../js/select2/select2');?>
<?php echo $this->Html->css('../js/selectboxit/jquery.selectBoxIt');?>


<ol class="breadcrumb bc-3">
	<li>
		<a href="index.html"><i class="entypo-home"></i>Home</a>
	</li>
	<li class="active">
		<strong>Basic Elements</strong>
	</li>
</ol>
			
<h2>Edição de Campanhas</h2>

<br/>
<div class="row">
	<div class="col-md-12">
		
		<?php if($this->Session->check('Message.error')):?>
			<span id="status" style="display:none;">error</span>
			<span id="msg" style="display:none;"><?php echo $this->Session->flash('error');?></span>
		<?php elseif($this->Session->check('Message.flash')): ?>
			<span id="status" style="display:none;">success</span>
			<span id="msg" style="display:none;"><?php echo $this->Session->flash();?></span>
		<?php endif;?>
		
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Informações da Campanha
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('Campaign', array('class' => 'form-horizontal form-groups-bordered','type' => 'file'));?>
					<?php echo $this->Form->hidden('id');?>
					<?php echo $this->Form->hidden('slug');?>
					<div class="form-group <?php echo $this->Form->error('Campaign.name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Nome</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('name', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Campaign.name')): ?>
								<span class="has-error"><?php echo $this->Form->error('Campaign.name')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group <?php echo $this->Form->error('Campaign.title') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Título</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('title', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Campaign.title')): ?>
								<span class="has-error"><?php echo $this->Form->error('Campaign.title')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Campaign.discount') ? 'has-error' : ''?>">
						<label for="field-3" class="col-sm-3 control-label">Desconto</label>
						<div class="col-sm-5">
							<?php echo $this->Form->text('discount', array('class' => 'form-control', 'type' => 'number'));?>
							<?php if ($this->Form->error('Campaign.discount')): ?>
								<span class="has-error"><?php echo $this->Form->error('Campaign.discount')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Produtos Relacionados</label>
						<div class="col-sm-5">
							<?php 
								echo $this->Form->select('Product', $products, array('label' => false, 'multiple' => true, 'class' => 'select2')) 
							?>
							<?php if ($this->Form->error('Product')): ?>
								<span class="has-error"><?php echo $this->Form->error('Product')?></span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Imagem</label>
						<div class="col-sm-5">
							<?php echo $this->Form->text('image', array('class' => 'form-control file2 inline btn btn-primary', 'type' => 'file', 'data-label' => "<i class='glyphicon glyphicon-file'></i> Imagem"));?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Campaign.description') ? 'has-error' : ''?>">
						<label for="field-2" class="col-sm-3 control-label">Descrição</label>
						<div class="col-sm-5">
							<?php echo $this->Form->textarea('description', array('class' => 'form-control autogrow'));?>
							<?php if ($this->Form->error('Campaign.description')): ?>
								<span class="has-error"><?php echo $this->Form->error('Campaign.description')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<div class="checkbox">
								<label>
									<?php echo $this->Form->checkbox('active', array('checked' => 'checked'));?>
									Ativo
								</label>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<?php echo $this->Form->button('Salvar',array('type' => 'submit', 'type' => 'submit', 'class' => 'btn btn-success'));?>
							<?php echo $this->Form->button('Limpar',array('type' => 'submit', 'type' => 'reset', 'class' => 'btn btn-danger'));?>
						</div>
					</div>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->script('toastr',array('block' => 'scriptBottom'));?>
<?php echo $this->Html->script('select2/select2.min',array('block' => 'scriptBottom'));?>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{	
		var status = $('#status').html();
		var msg = $('#msg').html();

		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-full-width",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		if (status == 'error') {
			toastr.error(msg, "Atenção", opts);
		} else if(status == 'success') {
			toastr.success(msg, "Atenção!", opts);
		}
	});
</script>
