<footer id="footer-area">
<!-- Footer Links Starts -->
    <div class="footer-links">
    <!-- Container Starts -->
        <div class="container">
            <!-- Information Links Starts -->
                <div class="col-md-2 col-sm-6">
                    <h5>Informações</h5>
                    <ul>
                        <li>
                            <?php echo $this->Html->link('Contato', '/contato');?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Sobre Nós', '/sobre-nos');?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Política e Privacidade', '/politica-e-privacidade');?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Termos e Condições', '/termos');?>
                        </li>
                    </ul>
                </div>
            <!-- Information Links Ends -->
            <!-- Contact Us Starts -->
                <div class="col-md-4 col-sm-12 last">
                    <h5>Contate nos</h5>
                    <ul>
                        <li>Casa do Vinho</li>
                        <li>
                            Avenida Bento Gonçalves, 4232
                        </li>
                        <li>
                            Pelotas - Brasil
                        </li>
                        <li>
                            Email: <a href="#">casadovinho@gmail.com</a>
                        </li>                               
                    </ul>
                    <h4 class="lead">
                        Tel: <span>(53) 3227-1255</span>
                    </h4>
                </div>
            <!-- Contact Us Ends -->
        </div>
    <!-- Container Ends -->
    </div>
<!-- Footer Links Ends -->
<!-- Copyright Area Starts -->
    <div class="copyright">
    <!-- Container Starts -->
        <div class="container">
        <!-- Starts -->
            <p class="pull-left">
                &nbsp; 2014 Casa do Vinho. Todos os direitos reservador a casa do vinho
            </p>
        <!-- Ends -->
        <!-- Payment Gateway Links Starts -->
            <ul class="pull-right list-inline">
                <li style="padding-right:55px">
                    <?php echo $this->Html->image('payment-icon/pagseguro.jpg', array('alt' => 'PaymentGateway'));?>
                </li>
            </ul>
        <!-- Payment Gateway Links Ends -->
        </div>
    <!-- Container Ends -->
    </div>
<!-- Copyright Area Ends -->
</footer>