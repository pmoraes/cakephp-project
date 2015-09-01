<li>
	<a href="#">
		<i class="glyphicon glyphicon-envelope"></i>
		<span>Contatos</span>
	</a>
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
					'Listar',
					array('controller' => 'contacts', 'action' => 'index'),
					array('escape' => false)
				);
			?>
		</li>

	</ul>
</li>