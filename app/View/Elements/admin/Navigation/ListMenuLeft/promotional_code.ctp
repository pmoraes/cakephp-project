<li>
	<a href="#">
		<i class="glyphicon glyphicon-tag"></i>
		<span>Código Promocional</span>
	</a>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Cadastrar',
					array('controller' => 'promotionalCodes', 'action' => 'add'),
					array('escape' => false)
				);
			?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
					'Listar',
					array('controller' => 'promotionalCodes', 'action' => 'index'),
					array('escape' => false)
				);
			?>
		</li>

	</ul>
</li>