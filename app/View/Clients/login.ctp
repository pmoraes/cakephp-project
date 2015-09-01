<!-- Main Container Starts -->
	<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li>
				<?php echo $this->Html->link('Home', '/')?>
			</li>
			<li class="active">Login</li>
		</ol>
	<!-- Breadcrumb Ends -->

	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Faça seu login ou crie sua conta
		</h2>
	<!-- Main Heading Ends -->
	<!-- Login Form Section Starts -->
		<section class="login-area">
			<div class="row">
				<div class="col-sm-6">
				<!-- Login Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<?php if($this->Session->check('Message.resetPassword')): ?>
				        		<div class="alert alert-warning" role="alert"><?php echo $this->Session->flash('resetPassword');?></div>
				    		<?php endif;?>	
							<h3 class="panel-title">Login</h3>
						</div>

						<div class="panel-body">
						<!-- Login Form Starts -->
							<?php echo $this->Form->create('Client', array('class' => 'form-horizontal', 'role' => 'form'))?>
								<div class="form-group">
									<div class="col-sm-12">
										<?php echo $this->Form->text('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<?php echo $this->Form->text('password', array('class' => 'form-control', 'placeholder' => 'Senha', 'type' => 'password'));?>
									</div>
								</div>
								<?php echo $this->Form->button('Login', array('class' => 'btn btn-warning'));?>
								
							<?php echo $this->Form->end();?>
						<!-- Login Form Ends -->
						</div>
					</div>
				<!-- Login Panel Ends -->

					<?php if($this->Session->check('Message.login')): ?>
						<div class="alert alert-danger" role="alert"><?php echo $this->Session->flash('login');?></div>
					<?php endif;?>
				</div>
				<div class="col-sm-6">
				<!-- Account Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Esqueceu Sua Senha?
							</h3>
						</div>
						<div class="panel-body">
							<!-- Login Form Starts -->
							<?php echo $this->Form->create('Client', array('action' => 'changePassword', 'class' => 'form-horizontal', 'role' => 'form'))?>
							<div class="form-group">
								<div class="col-sm-12">
									<?php echo $this->Form->text('email', array('class' => 'form-control', 'placeholder' => 'Email', 'type' => 'search'));?>
								</div>
							</div>
							<?php echo $this->Form->button('Esqueci a senha', array('class' => 'btn btn-warning'));?>
								
							<?php echo $this->Form->end();?>
							<!-- Login Form Ends -->
						</div>

					</div>
					<?php if($this->Session->check('Message.changePassword-error')): ?>
				        <div class="alert alert-danger"><?php echo $this->Session->flash('changePassword-error');?></div>
				    <?php elseif($this->Session->check('Message.changePassword-success')): ?>
				        <div class="alert alert-warning" role="alert"><?php echo $this->Session->flash('changePassword-success');?></div>
				    <?php endif;?>
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Crie sua conta
							</h3>
						</div>
						<div class="panel-body">
							<p>
								Cadastre-se e efetue suas compras, e receba promoções exclusivas da casa do vinho.
							</p>
							<?php echo $this->Html->link('Cadastre-se', array('controller' => 'clients', 'action' => 'add'), array('class' => 'btn btn-warning'))?>
						</div>
					</div>
				<!-- Account Panel Ends -->
				</div>
			</div>
		</section>
	<!-- Login Form Section Ends -->
	</div>
<!-- Main Container Ends -->