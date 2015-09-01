<ol class="breadcrumb bc-3">
	<li>
		<a href="index.html"><i class="entypo-home"></i>Home</a>
	</li>
	<li>
		<a href="forms-main.html">Forms</a>
	</li>
	<li class="active">
		<strong>Basic Elements</strong>
	</li>
</ol>
			
<h2>Cadastro de Fabricantes</h2>

<br/>

<div class="row">
	<div class="col-md-12">
		
		<?php if($this->Session->check('Message.error')):?>
			<span id="status" style="display:none;">error</span>
			<span id="msg" style="display:none;"><?php echo $this->Session->flash('error');?></span>
		<?php elseif($this->Session->check('Message.flash')): ?>
			<span id="status" style="display:none;">success</span>
			<span id="msg" style="display:none;"><?php echo $this->Session->flash();?></span>
		<?php endif;?>

		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Informações do Fabricante
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('Manufacturer', array('class' => 'form-horizontal form-groups-bordered'));?>
					<?php echo $this->Form->hidden('id')?>
					<div class="form-group <?php echo $this->Form->error('Manufacturer.social_reason') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Razão Social</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('social_reason', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Manufacturer.social_reason')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.social_reason')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.fantasy_name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Nome Fantasia</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('fantasy_name', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Manufacturer.fantasy_name')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.fantasy_name')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.first_phone') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Telefone 1</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('first_phone', array('class' => 'form-control', 'data-mask' => '(99)9999-9999'));?>
							<?php if ($this->Form->error('Manufacturer.first_phone')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.first_phone')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.second_phone') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Telefone 2</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('second_phone', array('class' => 'form-control', 'data-mask' => '(99)9999-9999'));?>
							<?php if ($this->Form->error('Manufacturer.second_phone')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.second_phone')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.second_phone') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Endereço</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('address', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Manufacturer.address')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.address')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.cnpj') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">CNPJ</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('cnpj', array('class' => 'form-control', 'data-mask' => '99.999.999/9999-99'));?>
							<?php if ($this->Form->error('Manufacturer.cnpj')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.cnpj')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.state_registration') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Inscrição Estadual</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('state_registration', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Manufacturer.state_registration')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.state_registration')?></span>	
							<?php endif; ?>
						</div>
					</div>


					<div class="form-group <?php echo $this->Form->error('Manufacturer.state_id') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Estado</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->input('state_id', array('class' => 'form-control','options' => $states, 'label' => false));?>
							<?php if ($this->Form->error('Manufacturer.state_id')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.state_id')?></span>	
							<?php endif; ?>
						</div>
					</div>

					<div class="form-group <?php echo $this->Form->error('Manufacturer.city_id') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Cidade</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->input('city_id', array('class' => 'form-control', 'label' => false));?>
							<?php if ($this->Form->error('Manufacturer.city_id')): ?>
								<span class="has-error"><?php echo $this->Form->error('Manufacturer.city_id')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<div class="checkbox">
								<label>
									<?php echo $this->Form->checkbox('active', array('checked' => 'checked'));?>
									Ativo
								</label>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<?php echo $this->Form->button('Salvar',array('type' => 'submit', 'type' => 'submit', 'class' => 'btn btn-success'));?>
							<?php echo $this->Form->button('Limpar',array('type' => 'submit', 'type' => 'reset', 'class' => 'btn btn-danger'));?>
						</div>
					</div>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        returnStates();
    });

    var baseURL = '<?php echo $this->Html->url("/"); ?>';
    $('#ManufacturerStateId').change(function (e) {
        var url = 'Cities/getCitiesByState/' + $('#ManufacturerStateId').val() + '.json';
        $.ajax({
            url: baseURL + url,
            dataType: 'json',
            success: function(data){
                var options = "";
                for(var i = 0; i < data.length; i++){
                    options += '<option value="' + data[i].City.id + '">' + data[i].City.name + '</option>';
                }
            	$("#ManufacturerCityId").html(options);
            }
        })    
    });

    function returnStates(){
        var baseURL = '<?php echo $this->Html->url("/"); ?>';
        var url = 'Cities/getCitiesByState/' + $('#ManufacturerStateId').val() + '.json';
        $.ajax({
            url: baseURL + url,
            dataType: 'json',
            success: function(data){
            	console.log(data);
                var options = "";
                for(var i = 0; i < data.length; i++){
                    options += '<option value="' + data[i].City.id + '">' + data[i].City.name + '</option>';
                }
            	$("#ManufacturerCityId").html(options);
            }
        });    
    }
</script>


<script type="text/javascript">
	jQuery(document).ready(function($)
	{	
		var status = $('#status').html();
		var msg = $('#msg').html();

		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-full-width",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		if (status == 'error') {
			toastr.error(msg, "Atenção", opts);
		} else if(status == 'success') {
			toastr.success(msg, "Atenção!", opts);
		}
	});
</script>

<?php echo $this->Html->script('jquery.inputmask.bundle.min');?>