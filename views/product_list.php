<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();
$this->title = "Lista de produtos";

?>


<h1 class="display-3 text-center m-lg-5">Tipos de produtos</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Tipo</th>
        <th scope="col">Preço</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($products as $product):
    ?>
        <tr>
            <td><?php echo $product->name ?></td>
            <td><?php echo $types->findOne(["id" => $product->product_type_id])->name ?></td>
            <td><?php echo $product->price ?></td>
            <td><a class="btn btn-primary" href="<?php echo $product->id ?>" role="button">Detalhe</a></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>