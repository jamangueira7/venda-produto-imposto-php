<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();
$this->title = "Lista de typos de produto";
?>


<h1 class="display-3 text-center m-lg-5">Tipos de produtos</h1>
<div class="row">
    <div class="col-md-10">
    </div>
    <a class="btn btn-success my-3" href="/types/create" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Criar</a>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Porcentagem</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($types as $type):
    ?>
        <tr>
            <td><?php echo $type->name ?></td>
            <td><?php echo $type->tax ?> %</td>
            <td><a class="btn btn-primary" href="<?php echo $type->id ?>" role="button">Detalhe</a></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>