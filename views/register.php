<h1>Register</h1>

<form action="" method="post">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input
        type="text"
        class="form-control<?= $model->hasError('firstname') ? ' is-invalid' : ''?>
        name="firstname"
        value="<?= $model->firstname ?>">
        <div class="invalid-feedback">
            <?= $model->getFirstError('firstname') ?>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea name="body" class="form-control" ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>