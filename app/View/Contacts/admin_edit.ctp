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
			
<h2>Edição de Produtos</h2>

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
					Informações do Produto
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('Contact', array('class' => 'form-horizontal form-groups-bordered','type' => 'file'));?>
					<?php echo $this->Form->hidden('id');?>
					<div class="form-group <?php echo $this->Form->error('Contact.name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Nome</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('name', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Contact.name')): ?>
								<span class="has-error"><?php echo $this->Form->error('Contact.name')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Contact.email') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Email</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('email', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Contact.email')): ?>
								<span class="has-error"><?php echo $this->Form->error('Contact.email')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Contact.subject') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Assunto</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('subject', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Contact.subject')): ?>
								<span class="has-error"><?php echo $this->Form->error('Contact.subject')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group <?php echo $this->Form->error('Contact.message') ? 'has-error' : ''?>">
						<label for="field-2" class="col-sm-3 control-label">Menssagem</label>
						<div class="col-sm-5">
							<?php echo $this->Form->textarea('message', array('class' => 'form-control autogrow'));?>
							<?php if ($this->Form->error('Contact.message')): ?>
								<span class="has-error"><?php echo $this->Form->error('Contact.message')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Contact.response') ? 'has-error' : ''?>">
						<label for="field-2" class="col-sm-3 control-label">Resposta</label>
						<div class="col-sm-6">
							<?php echo $this->Form->textarea('response', array('class' => 'form-control ckeditor'));?>
							<?php if ($this->Form->error('Contact.response')): ?>
								<span class="has-error"><?php echo $this->Form->error('Contact.response')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<?php echo $this->Form->button('Enviar',array('type' => 'submit', 'type' => 'submit', 'class' => 'btn btn-success'));?>
							<?php echo $this->Form->button('Limpar',array('type' => 'submit', 'type' => 'reset', 'class' => 'btn btn-danger'));?>
						</div>
					</div>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->script('toastr',array('block' => 'scriptBottom'));?>
<?php echo $this->Html->script('ckeditor/ckeditor',array('block' => 'scriptBottom'));?>
<?php echo $this->Html->script('ckeditor/adapters/jquery',array('block' => 'scriptBottom'));?>

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