<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();

$this->title = "Criar produto";
?>

<h1 class="display-3 text-center m-lg-5">Register</h1>

<?php $form = Form::begin('', 'post') ?>

            <?php echo $form->field($model, 'name') ?>
            <?php echo $form->field($model, 'description') ?>
            <?php echo $form->field($model, 'price') ?>
            <div class="form-group">
                <label for="product_type_id">Tipo</label>
                <select class="form-control" id="product_type_id" name="product_type_id">

                    <?php foreach ($types as $type): ?>
                        <option value="<?php echo $type->id ?>">
                            <?php echo $type->name ?>
                        </option>
                    <?php endforeach; ?>

                </select>

            </div>

    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>