<?php echo $this->Html->css('../js/select2/select2-bootstrap');?>
<?php echo $this->Html->css('../js/select2/select2');?>
<?php echo $this->Html->css('../js/selectboxit/jquery.selectBoxIt');?>


<ol class="breadcrumb bc-3">
	<li>
		<a href="index.html"><i class="entypo-home"></i>Home</a>
	</li>
	<li class="active">
		<strong>Basic Elements</strong>
	</li>
</ol>
			
<h2>Edição de Produtos</h2>

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
					Informações do Produto
				</div>
			</div>
			
			<div class="panel-body">
				<?php echo $this->Form->create('Product', array('class' => 'form-horizontal form-groups-bordered','type' => 'file'));?>
					<?php echo $this->Form->hidden('id');?>
					<?php echo $this->Form->hidden('slug');?>
					<div class="form-group <?php echo $this->Form->error('Product.name') ? 'has-error' : ''?>">
						<label for="field-1" class="col-sm-3 control-label">Nome</label>	
						<div class="col-sm-5">
							<?php echo $this->Form->text('name', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Product.name')): ?>
								<span class="has-error"><?php echo $this->Form->error('Product.name')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group <?php echo $this->Form->error('Product.name') ? 'has-error' : ''?>">
						<label for="field-2" class="col-sm-3 control-label">Descrição</label>
						<div class="col-sm-5">
							<?php echo $this->Form->textarea('description', array('class' => 'form-control autogrow'));?>
							<?php if ($this->Form->error('Product.description')): ?>
								<span class="has-error"><?php echo $this->Form->error('Product.description')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group <?php echo $this->Form->error('Product.price') ? 'has-error' : ''?>">
						<label for="field-3" class="col-sm-3 control-label">Preço</label>
						<div class="col-sm-5">
							<?php echo $this->Form->text('price', array('class' => 'form-control'));?>
							<?php if ($this->Form->error('Product.price')): ?>
								<span class="has-error"><?php echo $this->Form->error('Product.price')?></span>	
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Imagem</label>
						<div class="col-sm-5">
							<?php echo $this->Form->text('image', array('class' => 'form-control file2 inline btn btn-primary', 'type' => 'file', 'data-label' => "<i class='glyphicon glyphicon-file'></i> Imagem"));?>
						</div>
					</div>

					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Fornecedor</label>
						<div class="col-sm-5">
							<?php echo $this->Form->input('manufacturer_id', array('class' => 'form-control','options' => $manufacturers, 'label' => false));?>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Produtos Relacionados</label>
						<div class="col-sm-5">
							<?php 
								echo $this->Form->select('ProductRelation', $products, array('label' => false, 'multiple' => true, 'class' => 'select2')) 
							?>
							<?php if ($this->Form->error('ProductRelation')): ?>
								<span class="has-error"><?php echo $this->Form->error('ProductRelation')?></span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Categoria</label>
						<div class="col-sm-5">
							<?php echo $this->Form->input('category_id', array('class' => 'form-control','options' => $categories, 'label' => false));?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Sub Categoria</label>
						<div class="col-sm-5">
							<?php $subCategories = ""; echo $this->Form->input('sub_category_id', array('class' => 'form-control','options' => $subCategories, 'label' => false));?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<div class="checkbox">
								<label>
									<?php echo $this->Form->checkbox('promotion');?>
									Promoção
								</label>
							</div>

							<div class="checkbox">
								<label>
									<?php echo $this->Form->checkbox('highlight');?>
									Destaque
								</label>
							</div>

							<div class="checkbox">
								<label>
									<?php echo $this->Form->checkbox('availability', array('checked' => 'checked'));?>
									Disponibilidade
								</label>
							</div>
							
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

<?php echo $this->Html->script('toastr',array('block' => 'scriptBottom'));?>
<?php echo $this->Html->script('select2/select2.min',array('block' => 'scriptBottom'));?>

<script type="text/javascript">
    $(document).ready(function(){
        returnSubCategories();
    });
</script>

<script type="text/javascript">
    var baseURL = '<?php echo $this->Html->url('/'); ?>'
    $('#ProductCategoryId').change(function (e) {
        var url = 'subCategories/getSubCategories/' + $('#ProductCategoryId').val() + '.json';
        $.ajax({
            url: baseURL + url,
            dataType: 'json',
            success: function(data){
                var options = "";
                for(var i = 0; i < data.length; i++){
                    options += '<option value="' + data[i].SubCategory.id + '">' + data[i].SubCategory.name + '</option>';
                }
            	$("#ProductSubCategoryId").html(options);
            }
        })    
    });

    function returnSubCategories(){
        var baseURL = '<?php echo $this->Html->url('/'); ?>'
        var selected = <?php echo $this->data['SubCategory']['id'];?>;
        var url = 'subCategories/getSubCategories/' + $('#ProductCategoryId').val() + '.json';
        $.ajax({
            url: baseURL + url,
            dataType: 'json',
            success: function(data){
                var options = "";
                for(var i = 0; i < data.length; i++){
                	if (selected == data[i].SubCategory.id) {
                		options += '<option value="' + data[i].SubCategory.id + '" selected=selected>' + data[i].SubCategory.name + '</option>';
                		continue;
                	}
                    options += '<option value="' + data[i].SubCategory.id + '">' + data[i].SubCategory.name + '</option>';
                }
                $("#ProductSubCategoryId").html(options);
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