<?php
/** @var $model app\core\Model */

use app\core\form\Form;

$form = new Form();

$this->title = "Bem vindo a loja!";

?>

<h1 class="display-3 text-center m-lg-5">Produtos</h1>

<div class="row">
    <?php
    foreach ($products as $product):
    ?>
    <div class="card mx-2 my-2" style="width: 22rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $product->name ?></h5>
            <p class="card-text"><?php echo $product->description ?></p>
            <p class="font-weight-bold">R$ <?php echo $product->price ?> </p>
            <?php $form = Form::begin('cart', 'post') ?>

                <?php echo $form->field($model, 'quantity', 'min="1" max="10"')->numberField() ?>
                 <input type="hidden" id="product_id" name="product_id" value="<?php echo $product->id ?>" />
                 <button class="btn btn-success">
                     <i class="fa fa-cart-plus" aria-hidden="true"> Add</i>
                 </button>
            <?php Form::end() ?>
        </div>
    </div>

<?php
endforeach;
?>
</div>