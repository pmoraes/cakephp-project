<div class="login-form">
		<div class="login-content">

			<?php echo $this->Form->create('User', array('class' => 'smart-form client-form')); ?>
				<div class="form-group">					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						<?php echo $this->Form->text('email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
					</div>
				</div>
				
				
				<div class="form-group">
					<?php echo $this->Form->button('Enviar Senha',
							array('type' => 'submit', 'class' => 'btn btn-primary btn-block btn-login')
						); 
					?>
				</div>
			<?php echo $this->Form->end()?>
			<?php echo $this->Session->flash();?>
		<div class="login-bottom-links">
			<?php echo $this->Html->link('Lembrou sua senha?', array('controller' => 'users', 'action' => 'login'), array('class' => 'link')); ?>
		</div>
	</div>
</div>