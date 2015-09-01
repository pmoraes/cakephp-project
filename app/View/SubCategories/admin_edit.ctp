<ol class="breadcrumb bc-3">
	<li>
		<a href="index.html"><i class="entypo-home"></i>Home</a>
	</li>
	<li class="active">
		<strong>Basic Elements</strong>
	</li>
</ol>
			
<h2>Edição de SubCategorias</h2>

<br/>

<div class="row">
	<div class="col-md-12">
		
		<?php if($this->Session->check('Message.error')):?>
			<div class="alert alert-danger"><?php echo $this->Session->flash('error');?></div>
		<?php elseif($this->Session->check('Message.flash')): ?>
			<div class="alert alert-success"><?php echo $this->Session->flash();?></div>
		<?php endif;?>

		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Informações da SubCategoria
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('SubCategory', array('class' => 'form-horizontal form-groups-bordered'));?>
					<?php echo $this->Form->hidden('id'); ?>
					<?php echo $this->Form->hidden('slug');?>
					<div class="form-group <?php echo $this->Form->error('SubCategory.name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Nome</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('name', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('SubCategory.name')): ?>
								<span class="has-error"><?php echo $this->Form->error('SubCategory.name')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('SubCategory.name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Categoria</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->input('category_id', array('class' => 'form-control','options' => $categories, 'label' => false));?>
							<?php if ($this->Form->error('SubCategory.name')): ?>
								<span class="has-error"><?php echo $this->Form->error('SubCategory.name')?></span>	
							<?php endif; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<div class="checkbox">
								<label>
									<?php echo $this->Form->checkbox('active', array('checked' => $this->data['SubCategory']['active']));?>
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