<?php
/** @var $model app\models\User */

use app\core\form\Form;

$form = new Form();
?>

    <h1>Login</h1>

<?php $form = Form::begin('', 'post') ?>

    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>

    <button type="submit" class="btn btn-success">Logar</button>
<?php Form::end() ?>