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
			
<h2>Edição de Configuração</h2>

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
					Informações da Configuração
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('Config', array('class' => 'form-horizontal form-groups-bordered'));?>
					<div class="form-group <?php echo $this->Form->error('Config.goal') ? 'has-error' : ''?>">
						<label for="field-3" class="col-sm-3 control-label">Meta Mensal</label>
						<div class="col-sm-5">
							<?php echo $this->Form->text('goal', array('class' => 'form-control', 'type' => 'number'));?>
							<?php if ($this->Form->error('Config.goal')): ?>
								<span class="has-error"><?php echo $this->Form->error('Config.goal')?></span>	
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