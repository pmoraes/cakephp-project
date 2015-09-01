<li>
	<a href="#">
		<i class="glyphicon glyphicon-picture"></i>
		<span>Sliders</span>
	</a>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Cadastrar',
					array('controller' => 'sliders', 'action' => 'add'),
					array('escape' => false)
				);
			?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
					'Listar',
					array('controller' => 'sliders', 'action' => 'index'),
					array('escape' => false)
				);
			?>
		</li>

	</ul>
</li>