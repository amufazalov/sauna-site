<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $meta['title']; ?></title>

    <meta name="description" content="<?= $meta['description']; ?>"/>
    <meta name="keywords" content="<?= $meta['keywords']; ?>"/>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.cosmo.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <!-- Fancybox -->
    <link rel="stylesheet" href="/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Главная</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/book-it">Бронирование мест</a>
                </li>
                <li>
                    <a href="/about">О нас</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Image Background Page Header -->
<!-- Note: The background image is set within the business-casual.css file. -->
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="tagline">Банный комплекс "Усадьба"</h1>
            </div>
        </div>
    </div>
</header>


<?= $content; ?>


<!-- Footer -->
<footer>
    <div class="row">
        <div class="container">
            <p>Copyright &copy; Your Website 2016</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<?php
    foreach ($scripts as $script){
        echo $script;
    }
?>
</body>
</html>