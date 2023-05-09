<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();

$this->title = "Carrinho de compras";

?>

<h1 class="display-5 text-left m-lg-5">Seus produtos</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Produto</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Preço unitario</th>
        <th scope="col">Preço somado</th>
        <th scope="col">Imposto</th>
        <th scope="col">Valor imposto</th>
        <th scope="col">Preço final</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $total_products = 0;
    foreach ($products as $key=>$product):
        $total_products += $product["price_tax"];
        ?>
        <tr>
            <td><?php echo $product["name"] ?></td>
            <td><?php echo $product["quantity"] ?></td>
            <td>R$<?php echo $product["price"] ?></td>
            <td>R$<?php echo $product["price_quantity"] ?></td>
            <td><?php echo $product["tax"] ?>%</td>
            <td>R$<?php echo $product["tax_value"] ?></td>
            <td>R$<?php echo $product["price_tax"] ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-success">R$<?php echo $total_products ?></td>
    </tr>
    </tbody>
</table>


<div class="row mx-md-n5">
    <a class="btn btn-danger btn-lg col px-md-5 mx-2">Apagar carrinho</a>
    <a class="btn btn-success btn-lg col px-md-5">Finalizar compra</a>
</div>
