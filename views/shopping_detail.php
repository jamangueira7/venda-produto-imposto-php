<?php
/** @var $model app\core\Model */
/** @var $product_sale app\core\Model */
/** @var $user app\core\Model */
/** @var $product app\core\Model */

use app\core\form\Form;

$form = new Form();

$this->title = "Detalhe da compra";
?>

<h1 class="display-3 text-center m-lg-5">Detalhe do compra</h1>

<div class="card">
    <h5 class="card-header"><?= $user->getFullNameById($model->user_id) ?></h5>
    <div class="card-body">
        <h5 class="card-title">Dados financeiros:</h5>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Valor total</th>
                <th scope="col">Valor total sem imposto</th>
                <th scope="col">Valor total do imposto</th>
                <th scope="col">Data da compra</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $model->amount ?></td>
                <td><?= $model->amount_without_tax ?></td>
                <td><?= $model->amount_with_tax ?></td>
                <td><?= $model->created_at ?></td>
            </tr>
            </tbody>
        </table>

        <h5 class="card-title">Produtos da compra:</h5>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
                <th scope="col">Imposto</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($product_sale as $p_sale):
            ?>
                <tr>
                    <td><?= $product->findOne(["id" => $p_sale->product_id])->name ?></td>
                    <td><?= $p_sale->product_quantity ?></td>
                    <td><?= $p_sale->price ?></td>
                    <td><?= $p_sale->tax ?></td>
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>

    </div>
</div>