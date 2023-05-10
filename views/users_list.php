<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();
$this->title = "Lista de usuarios";

?>



<h1 class="display-3 text-center m-lg-5">Lista de usuarios</h1>
<div class="row">
    <div class="col-md-10">
    </div>
    <a class="btn btn-success my-3" href="/users/create" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Criar</a>
</div>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Tipo</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($model as $user):
    ?>
        <tr>
            <td><?= $user->firstname . " " . $user->lastname ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->type === 1 ? "Admin" : "Comum" ?></td>
            <td><a class="btn btn-primary" href="/profile/<?= $user->id ?>" role="button">Detalhe</a></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>