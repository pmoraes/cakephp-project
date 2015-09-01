<li>
	<a href="#">
		<i class="glyphicon glyphicon-cog	"></i>
		<span>Configuração</span>
	</a>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Cadastrar',
					array('controller' => 'configs', 'action' => 'add'),
					array('escape' => false)
				);
			?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
					'Listar',
					array('controller' => 'configs', 'action' => 'index'),
					array('escape' => false)
				);
			?>
		</li>

	</ul>
</li>