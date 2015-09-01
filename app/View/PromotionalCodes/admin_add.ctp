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
			
<h2>Cadastro de Código Promocional</h2>

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
					Informações da Código
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('PromotionalCode', array('class' => 'form-horizontal form-groups-bordered','type' => 'file'));?>
					<div class="form-group <?php echo $this->Form->error('PromotionalCode.name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Nome</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('name', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('PromotionalCode.name')): ?>
								<span class="has-error"><?php echo $this->Form->error('PromotionalCode.name')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group <?php echo $this->Form->error('PromotionalCode.discount') ? 'has-error' : ''?>">
						<label for="field-3" class="col-sm-3 control-label">Desconto %</label>
						<div class="col-sm-5">
							<?php echo $this->Form->text('discount', array('class' => 'form-control', 'type' => 'number'));?>
							<?php if ($this->Form->error('PromotionalCode.discount')): ?>
								<span class="has-error"><?php echo $this->Form->error('PromotionalCode.discount')?></span>
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Clientes Relacionados</label>
						<div class="col-sm-5">
							<?php 
								echo $this->Form->select('Client', $clients, array('label' => false, 'multiple' => true, 'class' => 'select2')) 
							?>
							<?php if ($this->Form->error('Client')): ?>
								<span class="has-error"><?php echo $this->Form->error('Client')?></span>
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Valido até:</label>
						<div class="col-sm-3">
							<div class="input-group">
								<?php echo $this->Form->text('validate', array('class' => 'form-control datepicker', 'data-date-format' => 'yyyy-mm-dd'))?>
								<?php if ($this->Form->error('validate')): ?>
									<span class="has-error"><?php echo $this->Form->error('validate')?></span>
								<?php endif; ?>
								<div class="input-group-addon">
									<a href="javascript:;"><i class="entypo-calendar"></i></a>
								</div>
							</div>
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
<?php echo $this->Html->script('bootstrap-datepicker',array('block' => 'scriptBottom'));?>


<script type="text/javascript">
	jQuery(document).ready(function($)
	{	
		$('#PromotionalCodeValidate').datepicker();
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