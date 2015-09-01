<!-- Main Container Starts -->
	<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li>
				<?php echo $this->Html->link('Home', '/')?>
			</li>
			<li class="active">Cadastro de Usuário</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Cadastro <br />
			<span>Crie sua conta</span>
		</h2>
	<!-- Main Heading Ends -->
	<!-- Registration Section Starts -->
		<section class="registration-area">
			<?php if($this->Session->check('Message.error')): ?>
		        <div class="alert alert-danger"><?php echo $this->Session->flash('error');?></div>
		    <?php elseif($this->Session->check('Message.flash')): ?>
		        <div class="alert alert-warning" role="alert"><?php echo $this->Session->flash();?></div>
		    <?php endif;?>
			<div class="row">
				<div class="col-sm-6">
				<!-- Registration Block Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">Informações Pessoais</h3>
						</div>
						<div class="panel-body">
						<!-- Registration Form Starts -->
							<?php echo $this->Form->create('Client', array('class' => 'form-horizontal', 'role' => 'form'))?>
							<!-- Personal Information Starts -->
								 <div class="form-group <?php echo $this->Form->error('Client.first_name') ? 'has-error has-feedback' : ''?>">
	                                <label for="first_name" class="col-sm-3 control-label">
	                                    Nome
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('first_name', array('class' => 'form-control', 'placeholder' => 'Nome'))?>
	                                    <?php if ($this->Form->error('Client.first_name')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.first_name')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group <?php echo $this->Form->error('Client.last_name') ? 'has-error has-feedback' : ''?>">
	                                <label for="last_name" class="col-sm-3 control-label">
	                                    Sobrenome
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('last_name', array('class' => 'form-control', 'placeholder' => 'Sobrenome'))?>
	                                    <?php if ($this->Form->error('Client.last_name')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.last_name')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group <?php echo $this->Form->error('Client.email') ? 'has-error has-feedback' : ''?>">
	                                <label for="email" class="col-sm-3 control-label">
	                                    Email
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('email', array('class' => 'form-control', 'placeholder' => 'Email'))?>
	                                    <?php if ($this->Form->error('Client.email')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.email')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>

								<div class="form-group <?php echo $this->Form->error('Client.first_contact') ? 'has-error has-feedback' : ''?>">
	                                <label for="first_contact" class="col-sm-3 control-label">
	                                    Contato 1
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('first_contact', array('class' => 'form-control', 'placeholder' => 'Contato 1'))?>
	                                    <?php if ($this->Form->error('Client.first_contact')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.first_contact')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>

	                            <div class="form-group <?php echo $this->Form->error('Client.last_contact') ? 'has-error has-feedback' : ''?>">
	                                <label for="last_contact" class="col-sm-3 control-label">
	                                    Contato 2
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('last_contact', array('class' => 'form-control', 'placeholder' => 'Contato 2'))?>
	                                    <?php if ($this->Form->error('Client.last_contact')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.last_contact')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>

							<!-- Personal Information Ends -->
								<h3 class="panel-heading inner">
									Endereço de Entrega
								</h3>
							<!-- Delivery Information Starts -->
								<div class="form-group <?php echo $this->Form->error('Client.address') ? 'has-error has-feedback' : ''?>">
	                                <label for="address" class="col-sm-3 control-label">
	                                    Endereço
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('address', array('class' => 'form-control', 'placeholder' => 'Endereço'))?>
	                                    <?php if ($this->Form->error('Client.address')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.address')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group <?php echo $this->Form->error('Client.neighborhood') ? 'has-error has-feedback' : ''?>">
	                                <label for="neighborhood" class="col-sm-3 control-label">
	                                    Bairro
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('neighborhood', array('class' => 'form-control', 'placeholder' => 'Bairro'))?>
	                                    <?php if ($this->Form->error('Client.neighborhood')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.neighborhood')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group <?php echo $this->Form->error('Client.number') ? 'has-error has-feedback' : ''?>">
	                                <label for="number" class="col-sm-3 control-label">
	                                    Número
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('number', array('class' => 'form-control', 'placeholder' => 'Número'))?>
	                                    <?php if ($this->Form->error('Client.number')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.number')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group <?php echo $this->Form->error('Client.complement') ? 'has-error has-feedback' : ''?>">
	                                <label for="complement" class="col-sm-3 control-label">
	                                    Complemento
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('complement', array('class' => 'form-control', 'placeholder' => 'Complemento'))?>
	                                    <?php if ($this->Form->error('Client.complement')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.complement')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group <?php echo $this->Form->error('Client.cep') ? 'has-error has-feedback' : ''?>">
	                                <label for="cep" class="col-sm-3 control-label">
	                                    CEP
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('cep', array('class' => 'form-control', 'placeholder' => 'CEP'))?>
	                                    <?php if ($this->Form->error('Client.cep')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.cep')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>
								
								<div class="form-group">
									<label for="inputCity" class="col-sm-3 control-label">Estado:</label>
									<div class="col-sm-9">
										<?php echo $this->Form->input('state_id', array('class' => 'form-control', 'options' => $states, 'label' => false)); ?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputCountry" class="col-sm-3 control-label">Cidade:</label>
									<div class="col-sm-9">
										<?php echo $this->Form->input('city_id', array('class' => 'form-control', 'label' => false)); ?>
										<span class="has-error"><?php echo $this->Form->error('Client.city_id')?></span>	
									</div>
								</div>

							<!-- Delivery Information Ends -->
								<h3 class="panel-heading inner">
									Senha
								</h3>
							<!-- Password Area Starts -->
								<div class="form-group <?php echo $this->Form->error('Client.password') ? 'has-error has-feedback' : ''?>">
	                                <label for="password" class="col-sm-3 control-label">
	                                    Senha
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('password', array('class' => 'form-control', 'placeholder' => 'Senha', 'type' => 'password'))?>
	                                    <?php if ($this->Form->error('Client.password')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.password')?></span>  
	                                    <?php endif; ?>
	                                        <span id="error"></span>  
	                                </div>
	                            </div>

								<div class="form-group <?php echo $this->Form->error('Client.confirmPassword') ? 'has-error has-feedback' : ''?>">
	                                <label for="confirmPassword" class="col-sm-3 control-label">
	                                    Confirmar Senha
	                                </label>
	                                <div class="col-sm-9">
	                                    <?php echo $this->Form->text('confirmPassword', array('class' => 'form-control', 'placeholder' => 'Confirmar Senha', 'type' => 'password'))?>
	                                    <?php if ($this->Form->error('Client.confirmPassword')): ?>
	                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	                                        <span class="control-label"><?php echo $this->Form->error('Client.confirmPassword')?></span>  
	                                    <?php endif; ?>
	                                </div>
	                            </div>

								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<div class="checkbox">
											<label>
												<?php echo $this->Form->text('news', array('type' => 'checkbox'));?>
												Notícias
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<div class="checkbox">
											<label>
												<?php echo $this->Form->text('term', array('type' => 'checkbox', 'checked' => 'checked','label' => array('text' => 'Notícias')));?>
												Aceito e concordo com os termos
											</label>
										</div>
									</div>
									<span class="control-label"><?php echo $this->Form->error('Client.term')?></span>  
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<?php echo $this->Form->button('Salvar', array('class' => 'btn btn-warning', 'type' => 'submit'))?>
									</div>
								</div>
							<!-- Password Area Ends -->
							<?php echo $this->Form->end();?>
						<!-- Registration Form Starts -->
						</div>							
					</div>
				<!-- Registration Block Ends -->
				</div>
				<div class="col-sm-6">
				<!-- Conditions Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Condições
							</h3>
						</div>
						<div class="panel-body">
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including  versions of Lorem Ipsum.
							</p>
							<ol>
							  <li>Lorem ipsum dolor sit amet</li>
							  <li>Consectetur adipiscing elit</li>
							  <li>Integer molestie lorem at massa</li>
							  <li>Facilisis in pretium nisl aliquet</li>
							  <li>Nulla volutpat aliquam velit</li>
							  <li>Faucibus porta lacus fringilla vel</li>
							  <li>Aenean sit amet erat nunc</li>
							  <li>Eget porttitor lorem</li>
							</ol>
							<p>
								HTML Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. 
							</p>
							<p>
								Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. 
							</p>
							<p>
								Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. 
							</p>
							<p>
								Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst. 
							</p>
						</div>
					</div>
				<!-- Conditions Panel Ends -->
				</div>
			</div>
		</section>
	<!-- Registration Section Ends -->
	</div>
<!-- Main Container Ends -->

<script type="text/javascript">
 $(document).ready(function() {
	var words = <?php echo "['" . implode("','",$words) . "']";?>;

    $('#ClientAddForm').submit(function() {
        var password = $('#ClientPassword').val();

        if (words.indexOf(password) > -1) {
        	$('#error').html("Senha muito fraca!");
        	return false;
        }

        var pattern = /(?=.*[@#$%])/;

        if (!pattern.test(password)) {
        	$('#error').html("Senha deve conter caracter especial!");
        	return false;
        }

        return true;
    });

 });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        returnStates();
    });

    var baseURL = '<?php echo $this->Html->url("/"); ?>';
    $('#ClientStateId').change(function (e) {
        var url = 'Cities/getCitiesByState/' + $('#ClientStateId').val() + '.json';

        $.ajax({
            url: baseURL + url,
            dataType: 'json',
            success: function(data){
                var options = "";
                for(var i = 0; i < data.length; i++){
                    options += '<option value="' + data[i].City.id + '">' + data[i].City.name + '</option>';
                }
            	$("#ClientCityId").html(options);
            }
        })    
    });

    function returnStates(){
        var baseURL = '<?php echo $this->Html->url("/"); ?>';
        var url = 'Cities/getCitiesByState/' + $('#ClientStateId').val() + '.json';
        $.ajax({
            url: baseURL + url,
            dataType: 'json',
            success: function(data){
                var options = "";
                for(var i = 0; i < data.length; i++){
                    options += '<option value="' + data[i].City.id + '">' + data[i].City.name + '</option>';
                }
            	$("#ClientCityId").html(options);
            }
        });    
    }
</script>