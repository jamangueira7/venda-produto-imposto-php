<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();

$this->title = "Detalhe do produto";
?>

<h1 class="display-3 text-center m-lg-5">Detalhe do produto</h1>

<?php $form = Form::begin('', 'post', ['enctype'=>"multipart/form-data"]) ?>

            <?php echo $form->field($model, 'name') ?>
            <?php echo $form->field($model, 'description') ?>
            <?php echo $form->field($model, 'price') ?>
            <?php echo $form->field($model, 'image')->fileField() ?>
            <input type="hidden" id="image_hidden" name="image_hidden" value="<?php echo $model->image ?>" />

            <div class="form-group">
                <label for="product_type_id">Tipo</label>

                <select class="form-control" id="product_type_id" name="product_type_id">

                    <?php foreach ($types as $type): ?>
                        <option <?php
                            echo $type->id === $model->product_type_id ? 'selected' : ""
                            ?>
                            value="<?php echo $type->id ?>"
                        >
                            <?php echo $type->name ?>
                        </option>
                    <?php endforeach; ?>

                </select>

            </div>

    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>