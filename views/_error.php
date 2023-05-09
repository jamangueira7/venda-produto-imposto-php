<?php
/** @var $exception \Exception */
?>

<div class="centraliza">
    <div class="alert alert-danger" style="" role="alert">
        <h3><?php echo $exception->getCode() . " - " . $exception->getMessage() ?></h3>
    </div>
</div>

