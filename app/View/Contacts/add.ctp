<!-- Main Container Starts -->
    <div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
        <ol class="breadcrumb">
            <li>
                <?php echo $this->Html->link('Home', '/')?>
            </li>
            <li class="active">Contato</li>
        </ol>
    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
        <h2 class="main-heading text-center">
            Contate Nos
        </h2>
    <!-- Main Heading Ends -->
    <!-- Google Map Starts -->
        <div id="map-wrapper">
            <div id="map-block"></div>
        </div>
    <!-- Google Map Ends -->

    <?php if($this->Session->check('Message.error')): ?>
        <div class="alert alert-danger"><?php echo $this->Session->flash('error');?></div>
    <?php elseif($this->Session->check('Message.flash')): ?>
        <div class="alert alert-warning" role="alert"><?php echo $this->Session->flash();?></div>
    <?php endif;?>
    <!-- Starts -->
        <div class="row">
        <!-- Contact Details Starts -->
            <div class="col-sm-4">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nosso Contato</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled contact-details">
                            <li class="clearfix">
                                <i class="fa fa-home pull-left"></i>
                                <span class="pull-left">
                                    Casa do Vinho <br />
                                    Avenida Bento Gonçalves, 4232 <br />
                                    Pelotas - Brasil
                                </span>
                            </li>
                            <li class="clearfix">
                                <i class="fa fa-phone pull-left"></i>
                                <span class="pull-left">
                                    (53) 3227-1255
                                </span>
                            </li>
                            <li class="clearfix">
                                <i class="fa fa-envelope-o pull-left"></i>
                                <span class="pull-left">
                                    casadovinho@gmail.com <br />
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- Contact Details Ends -->
        <!-- Contact Form Starts -->
            <div class="col-sm-8">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Envie Nos um Email</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('Contact', array('class' => 'form-horizontal', 'role' => 'form'))?>
                            <div class="form-group <?php echo $this->Form->error('Contact.name') ? 'has-error has-feedback' : ''?>">
                                <label for="name" class="col-sm-2 control-label">
                                    Nome
                                </label>
                                <div class="col-sm-10">
                                    <?php echo $this->Form->text('name', array('class' => 'form-control', 'placeholder' => 'Nome'))?>
                                    <?php if ($this->Form->error('Contact.name')): ?>
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        <span class="control-label"><?php echo $this->Form->error('Contact.name')?></span>  
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo $this->Form->error('Contact.email') ? 'has-error has-feedback' : ''?>">
                                <label for="email" class="col-sm-2 control-label">
                                    Email
                                </label>
                                <div class="col-sm-10">
                                    <?php echo $this->Form->text('email', array('class' => 'form-control', 'placeholder' => 'Email'))?>
                                    <?php if ($this->Form->error('Contact.email')): ?>
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        <span class="control-label"><?php echo $this->Form->error('Contact.email')?></span>  
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo $this->Form->error('Contact.subject') ? 'has-error has-feedback' : ''?>">
                                <label for="subject" class="col-sm-2 control-label">
                                    Assunto
                                </label>
                                <div class="col-sm-10">
                                    <?php echo $this->Form->text('subject', array('class' => 'form-control', 'placeholder' => 'Assunto'))?>
                                    <?php if ($this->Form->error('Contact.subject')): ?>
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        <span class="control-label"><?php echo $this->Form->error('Contact.subject')?></span>  
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo $this->Form->error('Contact.message') ? 'has-error has-feedback' : ''?>">
                                <label for="message" class="col-sm-2 control-label">
                                    Menssagem
                                </label>
                                <div class="col-sm-10">
                                    <?php echo $this->Form->textarea('message', array('class' => 'form-control', 'rows' => '5', 'placeholder' => 'Menssagem'))?>
                                </div>
                                <span class="control-label"><?php echo $this->Form->error('Contact.message')?></span>  
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <?php echo $this->Form->button('Enviar', array('class' => 'btn btn-warning text-uppercase', 'type' => 'submit'));?>
                                </div>
                            </div>
                        <?php echo $this->Form->end();?>
                    </div>
                </div>
            </div>
        <!-- Contact Form Ends -->
        </div>
    <!-- Ends -->
    </div>
<!-- Main Container Ends -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<?php echo $this->Html->script('map');?>