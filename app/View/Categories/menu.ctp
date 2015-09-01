<div class="collapse navbar-collapse navbar-cat-collapse">
    <ul class="nav navbar-nav">
    	<?php foreach ($categories as $key => $category): ?>
	        <li class="dropdown">
	            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
	                <?php echo $category['Category']['name'];?>
	            </a>
	            <ul class="dropdown-menu" role="menu">
	            	<?php foreach ($category['SubCategory'] as $key => $subCategory): ?>
	                	<li>
	                		<?php echo $this->Html->link(
	                			$subCategory['name'], 
	                			array('controller' => 'products', 'action' => 'index', $subCategory['slug']),
	                			array('tabindex' => '-1')
	                			);
	                		?>
	                	</li>
	            	<?php endforeach; ?>
	            </ul>
    		</li>
    	<?php endforeach; ?>
    </ul>
</div>