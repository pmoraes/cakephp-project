<li>
	<a href="#">
		<i class="entypo-flow-tree"></i>
		<span>Produtos</span>
	</a>
	<ul>
		<li>
			<a href="#">
				<i class="entypo-flow-line"></i>
				<span>Produtos</span>
			</a>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Cadastrar',
							array('controller' => 'products', 'action' => 'add')
						);
					?>
				</li>
				<li>
					<?php 
						echo $this->Html->link(
							'Listar',
							array('controller' => 'products', 'action' => 'index')
						);
					?>
				</li>
			</ul>
		</li>
		<!-- Categories -->
		<li>
			<a href="#">
				<i class="entypo-flow-line"></i>
				<span>Categorias</span>
			</a>
			<ul>
				<li class="active">
					<?php 
						echo $this->Html->link(
							$this->Html->tag('span', 'Cadastrar'),
							array('controller' => 'categories', 'action' => 'add'),
							array('escape' => false)
						);
					?>
			
				</li>
				<li>
					<?php 
						echo $this->Html->link(
							$this->Html->tag('span', 'Listar'),
							array('controller' => 'categories', 'action' => 'index'),
							array('escape' => false)
						);
					?>
				</li>
			</ul>
		</li>
		<!-- SubCategories -->
		<li>
			<a href="#">
				<i class="entypo-flow-line"></i>
				<span>Sub Categorias</span>
			</a>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Cadastrar',
							array('controller' => 'subCategories', 'action' => 'add'),
							array('escape' => false)
						);
					?>
				</li>
				<li>
					<?php 
						echo $this->Html->link(
							'Listar',
							array('controller' => 'subCategories', 'action' => 'index'),
							array('escape' => false)
						);
					?>
				</li>
			</ul>
		</li>
	</ul>
</li>