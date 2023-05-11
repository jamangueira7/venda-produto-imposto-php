<?php
use app\core\Application;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?php echo $this->title ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php if (Application::$app::isAdmin()): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/product/list">Produtos <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/types/list">Tipo produto <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/users/list">Usuarios <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/shopping/list">Compras <span class="sr-only"></span></a>
                </li>
            <?php endif; ?>
            <?php if (!Application::$app::isGuest()): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/myshopping">Minhas compras <span class="sr-only"></span></a>
                </li>
            <?php endif; ?>
        </ul>


            <ul class="navbar-nav  mx-5">
                <li class="nav-item active  mx-5">
                    <a class="nav-link" href="/cart">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </a>
                </li>
                <?php if (Application::$app::isGuest()): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/profile/<?php echo Application::$app->user->id?>">Bem vindo, <?php echo Application::$app->user->getDisplayName() ?></a>
                    </li>
                <?php endif; ?>
            </ul>

    </div>
</nav>

<div class="container">

    <?php
    $msg = Application::$app->session->getFlash('alert');

    if($msg):
    ?>
        <div class="alert alert-<?php echo $msg['type'] ?>">
            <?php echo $msg['msg'] ?>
        </div>
    <?php endif; ?>
    {{content}}
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>