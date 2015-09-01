<?php
	echo $this->Html->css('slider');
	echo $this->Html->script('bootstrap-slider');
?>
<!-- Sidebar Starts -->
	<div class="col-md-3">
	<!-- Shopping Options Starts -->
		<h3 class="side-heading">Busca avançada</h3>
		<div class="list-group">
			<div class="list-group-item">
				Opções
			</div>
			<?php echo $this->Form->create(Inflector::singularize($controller), array('action' => $action))?>
			<?php echo $this->Form->hidden('parameter', array('default' => $parameter));?>
				<div class="list-group-item">
					<div class="filter-group">
						<label class="checkbox">
							<?php echo $this->Form->text('promotion', array('type' => 'checkbox', 'label' => false))?>
							Promoção
						</label>
						<label class="checkbox">
							<?php echo $this->Form->text('highlight', array('type' => 'checkbox', 'label' => false))?>
							Destaques
						</label>
						<label class="checkbox">
							<?php echo $this->Form->text('availability', array('type' => 'checkbox', 'label' => false))?>
							Disponiveis
						</label>
					</div>
					R$ &nbsp
					<?php echo $this->Form->text('value', 
							array(
								'style' => 'width: 170px; margin-bottom: 2px;', 
								'label' => false,
								'data-slider-min' => '0',
								'data-slider-max' => $total,
								'data-slider-step' => '5',
								'data-slider-value' => '[0,' . $total .']',
								'id' => 'slider'
							)
						)
					?>
				</div>	
				<div class="list-group-item">
					<?php echo $this->Form->button('Filtrar', array('class' => 'btn btn-warning', 'type' => 'submit'));?>
				</div>
			<?php $this->Form->end();?>
		</div>
	<!-- Shopping Options Ends -->
	</div>
<!-- Sidebar Ends -->
<script type="text/javascript">
	$(document).ready(function() {
		$this = $('#slider');
		$this.slider()
		$('.slider').css('margin-bottom', '2px');
		$('.slider').css('margin-left', '10px');
	});
</script>