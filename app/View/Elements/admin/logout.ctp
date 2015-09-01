<div class="row">	
	<div class="col-md-6 col-sm-8 clearfix"></div>
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		<ul class="list-inline links-list pull-right">
			<li>
				<?php echo $this->Html->link('Log Out' . $this->Html->tag('i','',array('class' => 'entypo-logout right')), 
					array('controller' => 'users', 'action' => 'logout'),
					array('escape' => false));
				?>
			</li>
		</ul>
	</div>
</div>