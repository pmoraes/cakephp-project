<div class="col-md-3">
    <div id="cart" class="btn-group btn-block">
        <button type="button" data-toggle="dropdown" class="btn btn-block btn-lg dropdown-toggle">
            <i class="fa fa-shopping-cart"></i>
            <span id="cart-total">
                <?php 
                    $products = $this->Session->read('Cart');
                    $total = 0;
                    $items = 0;
                    $test = 0;
                    if ($products) {
                        foreach ($products as $key => $product) {
                            $items += $product['length'];
                            $total += ($product['Product']['price'] * $product['length']);
                        }
                    }
                ?>
                <label id="item"><?php echo $items?></label> item(s) - R$ <label id="totalItem"><?php echo number_format($total,2,',','.')?></label>
            </span>
            <i class="fa fa-caret-down"></i>
        </button>
        <ul class="dropdown-menu pull-right">
            <li>
                <table id="products" class="table table-striped hcart">
                    <tbody>
                        <?php if ($products) :?>
                            <?php $total = 0;?>
                            <?php foreach ($products as $key => $product): ?>
                                <?php $total += ($product['length'] * $product['Product']['price']) ?>
                                <tr id="<?php echo $product['Product']['id']?>">
                                    <td class='text-left'>
                                        <?php echo $this->Html->link($product['Product']['name'],'/produtos/' . $product['SubCategory']['slug'] . '/' . $product['Product']['slug'])?>
                                    </td>
                                    <td class='text-right'>x <?php echo $product['length']?></td>
                                    <td class='text-right'>R$ <?php echo number_format($product['Product']['price'],2,',','.')?></td>
                                    <td class='text-center'></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </li>
            <li>
                <table class="table table-bordered total">
                    <tbody>
                        <tr>
                            <td class="text-right"><strong>Sub-Total</strong></td>
                            <td class="text-left">R$ <span id="subtotal"> <?php echo number_format($total,2,',','.')?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-left">R$ <span id="total"> <?php echo number_format($total,2,',','.')?></td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-right btn-block1">
                    <?php echo $this->Html->link('Ver Carrinho', '/carrinho-de-compra')?>
                </p>
            </li>
        </ul>
    </div>
</div>