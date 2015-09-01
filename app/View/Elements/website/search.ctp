<!-- Search Starts -->
<div class="col-md-3">
	<div id="search">
		<div class="input-group">
			<?php echo $this->Form->create('Product', array('action' => 'search','style' => 'display:inherit;'));?>
			<?php echo $this->Form->text('search', array('class' => 'form-control input-lg', 'placeholder' => 'Busca'));?>
			<span class="input-group-btn">
				<?php echo $this->Form->button(
						$this->Html->tag('i','',array('class' => 'fa fa-search')),
						array('class' => 'btn btn-lg', 'type' => 'submit'),
						array('escape' => false)
					);
				?>
			</span>
			<?php echo $this->Form->end();?>
		</div>
	</div>	
</div>
<!-- Search Ends -->