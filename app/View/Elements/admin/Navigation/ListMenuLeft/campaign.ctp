<li>
	<a href="#">
		<i class="glyphicon glyphicon-tag"></i>
		<span>Campanhas</span>
	</a>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Cadastrar',
					array('controller' => 'campaigns', 'action' => 'add'),
					array('escape' => false)
				);
			?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
					'Listar',
					array('controller' => 'campaigns', 'action' => 'index'),
					array('escape' => false)
				);
			?>
		</li>

	</ul>
</li>