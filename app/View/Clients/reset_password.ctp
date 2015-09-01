<!-- Main Container Starts -->
	<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li>
				<?php echo $this->Html->link('Home', '/')?>
			</li>
			<li class="active">Alterar Senha</li>
		</ol>
	<!-- Breadcrumb Ends -->

	<!-- Login Form Section Starts -->
		<section class="login-area">
			<div class="row">
				<div class="col-sm-6">
				    <?php if($this->Session->check('Message.error')): ?>
				        <div class="alert alert-danger"><?php echo $this->Session->flash('error');?></div>
				    <?php elseif($this->Session->check('Message.flash')): ?>
				        <div class="alert alert-warning" role="alert"><?php echo $this->Session->flash();?></div>
				    <?php endif;?>
				<!-- Login Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">Alterar senha</h3>
						</div>

						<?php if($this->Session->check('Message.login')): ?>
							<h4><?php echo $this->Session->flash('login');?></h4>
						<?php endif;?>	
						<div class="panel-body">
						<!-- Login Form Starts -->
							<?php echo $this->Form->create('Client', array('class' => 'form-horizontal', 'role' => 'form'))?>
								<div class="form-group">
									<div class="col-sm-12">
										<?php echo $this->Form->text('password', array('class' => 'form-control', 'placeholder' => 'Antiga Senha', 'type' => 'password'));?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<?php echo $this->Form->text('newPassword', array('class' => 'form-control', 'placeholder' => 'Nova Senha', 'type' => 'password'));?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<?php echo $this->Form->text('confirmNewPassword', array('class' => 'form-control', 'placeholder' => 'Confirmar Nova Senha', 'type' => 'password'));?>
									</div>
								</div>
								<?php echo $this->Form->button('Alterar', array('class' => 'btn btn-warning'));?>
								
							<?php echo $this->Form->end();?>
						<!-- Login Form Ends -->
						</div>
					</div>
				<!-- Login Panel Ends -->
				</div>
			</div>
		</section>
	<!-- Login Form Section Ends -->
	</div>
<!-- Main Container Ends -->