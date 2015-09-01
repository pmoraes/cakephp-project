<li>
	<a href="#">
		<i class="glyphicon glyphicon-usd"></i>
		<span>Vendas</span>
	</a>
	<ul>
		<li>
			<a href="#">
				<i class="entypo-flow-line"></i>
				<span>Vendas</span>
			</a>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
							'Listar',
							array('controller' => 'sells', 'action' => 'index')
						);
					?>
				</li>
			</ul>
		</li>
		<!-- Status Requests -->
		<li>
			<a href="#">
				<i class="entypo-flow-line"></i>
				<span>Status Venda</span>
			</a>
			<ul>
				<li class="active">
					<?php 
						echo $this->Html->link(
							$this->Html->tag('span', 'Cadastrar'),
							array('controller' => 'statusSells', 'action' => 'add'),
							array('escape' => false)
						);
					?>
			
				</li>
				<li>
					<?php 
						echo $this->Html->link(
							$this->Html->tag('span', 'Listar'),
							array('controller' => 'statusSells', 'action' => 'index'),
							array('escape' => false)
						);
					?>
				</li>
			</ul>
		</li>
	</ul>
</li>