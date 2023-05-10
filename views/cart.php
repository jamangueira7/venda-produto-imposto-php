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
        <th scope="col"></th>
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
        if (!is_int($key)){
            continue;
        }
        $img = $product['image'] ?? "default.jpg";
        ?>
        <tr>
            <td><img src="<?= "/img/". $img; ?>" class="img-cart card-img-top" alt="..."></td>
            <td><?= $product["name"] ?></td>
            <td><?= $product["quantity"] ?></td>
            <td>R$<?= number_format($product["price"], 2, ',', '.') ?></td>
            <td>R$<?= number_format($product["price_quantity"], 2, ',', '.') ?></td>
            <td><?= $product["tax"] ?>%</td>
            <td>R$<?= number_format($product["tax_value"], 2, ',', '.') ?></td>
            <td>R$<?= number_format($product["price_tax"], 2, ',', '.') ?></td>
            <td><a href="/cartdelete/<?= $product["id"] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
        <td></td>
        <td class="text-success">R$<?= number_format($products['total'], 2, ',', '.') ?></td>
        <td></td>
    </tr>
    </tbody>
</table>


<div class="row mx-md-n5">
    <a href="/cartdelete" class="btn btn-danger btn-lg col px-md-5 mx-2">Apagar carrinho</a>
    <a href="/buy" class="btn btn-success btn-lg col px-md-5">Finalizar compra</a>
</div>
