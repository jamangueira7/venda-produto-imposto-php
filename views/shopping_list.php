<?php
/** @var $model app\core\Model */
/** @var $user app\core\Model */

use app\core\form\Form;

$form = new Form();
$this->title = "Lista de compras";
?>

<h1 class="display-3 text-center m-lg-5">Lista de compras</h1>

<?php if (!$model) : echo "aqui"?>

<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Data</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($model as $sale):
            ?>
            <tr>
                <td><?= $user->getFullNameById($sale->user_id) ?></td>
                <td><?= $sale->amount ?></td>
                <td><?= $sale->created_at ?></td>
                <td><a class="btn btn-primary" href="/shopping/<?= $sale->id ?>" role="button">Detalhe</a></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
<?php endif; ?>
