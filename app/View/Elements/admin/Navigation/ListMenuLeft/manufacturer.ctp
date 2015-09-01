<li>
	<a href="#">
		<i class="glyphicon glyphicon-shopping-cart"></i>
		<span>Fabricantes</span>
	</a>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Cadastrar',
					array('controller' => 'manufacturers', 'action' => 'add'),
					array('escape' => false)
				);
			?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
					'Listar',
					array('controller' => 'manufacturers', 'action' => 'index'),
					array('escape' => false)
				);
			?>
		</li>

	</ul>
</li>