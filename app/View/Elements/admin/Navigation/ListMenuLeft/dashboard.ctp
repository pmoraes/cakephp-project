<li class="active">
	<?php 
		echo $this->Html->link(
			'Dashboard' . $this->Html->tag('i','',array('class' => 'entypo-gauge')),
			array('controller' => 'homes', 'action' => 'index'),
			array('escape' => false)
		);
	?>
</li>