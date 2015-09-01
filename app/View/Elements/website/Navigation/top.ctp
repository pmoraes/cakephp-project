<div class="col-sm-8 col-xs-12">
    <div class="header-links">
        <ul class="nav navbar-nav pull-left">
            <li>
                <?php echo $this->Html->link(
                    '<i class="fa fa-home" title="Inicio"></i>
                    <span class="hidden-sm hidden-xs">Inicio</span>',
                   '/',
                    array('escape' => false)
                );
                ?>
            </li>
            <li>
                <?php echo $this->Html->link(
                    '<i class="fa fa-heart" title="Lista de Desejos"></i>
                        <span class="hidden-sm hidden-xs">
                            Lista de Desejos
                        </span>
                    ',
                    '/lista-de-desejos',
                    array('escape' => false)
                );
                ?>
            </li>
            <li>
                <?php echo $this->Html->link(
                    '<i class="fa fa-user" title="Meus Pedidos"></i>
                        <span class="hidden-sm hidden-xs">
                            Minha conta
                        </span>
                    ',
                    '/minha-conta',
                    array('escape' => false)
                );
                ?>
            </li>
            <li>
                <?php echo $this->Html->link(
                    '<i class="fa fa-shopping-cart" title="Carrinho de Compra"></i>
                        <span class="hidden-sm hidden-xs">
                            Carrinho de Compra
                        </span>
                    ',
                    '/carrinho-de-compra',
                    array('escape' => false)
                );
                ?>
            </li>
            <li>
                <?php echo $this->Html->link(
                    '<i class="fa fa-unlock" title="Cadastre-se"></i>
                        <span class="hidden-sm hidden-xs">
                            Cadastre-se
                        </span>
                    ',
                    '/cadastro-de-clientes',
                    array('escape' => false)
                );
                ?>
            </li>
            <li>
                <?php if(!$this->Session->check("Auth.User")):?>
                    <?php echo $this->Html->link(
                        '<i class="fa fa-lock" title="Login"></i>
                            <span class="hidden-sm hidden-xs">
                                Login
                            </span>
                        ',
                        '/login',
                        array('escape' => false)
                    );
                    ?>
                <?php endif;?>
            </li>
            <?php if($this->Session->check("Auth.User")):?>
                <li>
                    <?php echo $this->Html->link(
                        '<i class="fa fa-lock" title="Logout"></i>
                            <span class="hidden-sm hidden-xs">
                                Logout
                            </span>
                        ',
                        '/logout',
                        array('escape' => false)
                    );
                    ?>
                </li>
            <?php endif;?>
        </ul>
    </div>
</div>