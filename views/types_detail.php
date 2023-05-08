<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();

$this->title = "Alterar tipo do produto";
?>

<h1 class="display-3 text-center m-lg-5">Alterar tipo do produto</h1>

<?php $form = Form::begin('', 'post') ?>

            <?php echo $form->field($model, 'name') ?>
            <?php echo $form->field($model, 'description') ?>
            <?php echo $form->field($model, 'tax') ?>

    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>