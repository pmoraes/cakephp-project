<header class="logo-env">
	<div class="logo">
		<?php 
			echo $this->Html->link(
				$this->Html->image('logo.png', array('width' => 120)),
				array('controller' => 'homes', 'action' => 'index'),
				array('escape' => false)
			);
		?>
	</div>
	
</header>

<ul id="main-menu" class="">
	<?php echo $this->element('admin/Navigation/ListMenuLeft/dashboard');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/product');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/manufacturer');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/campaign');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/sells');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/contacts');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/promotional_code');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/sliders');?>
	<?php echo $this->element('admin/Navigation/ListMenuLeft/configs');?>
</ul>