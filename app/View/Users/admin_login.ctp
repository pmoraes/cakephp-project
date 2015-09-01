<div class="login-form">
		<div class="login-content">

			<?php echo $this->Form->create('User', array('class' => 'smart-form client-form')); ?>
				<div class="form-group">					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						<?php echo $this->Form->text('username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						<?php echo $this->Form->text('password', array('type' => 'password', 'class' => 'form-control', 'placeholder' =>  'Password')); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo $this->Form->button(
							'Login In' . $this->Html->tag('i','', array('class' => 'entypo-login')),
							array('type' => 'submit', 'class' => 'btn btn-primary btn-block btn-login'),
							array('escape' => false)
						); 
					?>
				</div>
				<span id="error"></span>
			<?php echo $this->Form->end()?>
			<?php echo $this->Session->flash();?>
			<div class="login-bottom-links">
				
				<?php echo $this->Html->link('Esqueceu sua senha?', array('controller' => 'users', 'action' => 'resetPassword'), array('class' => 'link')); ?>
				
			</div>
	</div>
</div>
