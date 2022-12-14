<?php ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name') ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="<?php echo get_bloginfo('template_url') . '/js/jquery.js' ?>"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_url') . '/js/slick.js' ?>"></script>
    <?php wp_head(); ?>
</head>
<body class="flex fdc">
<header class="header">
    <div class="wrapper">
        <div class="header__container flex jcsb aic">
            <div class="logo">
                <h3><a href="http://wordpress-mytheme">Главная страница</a></h3>
            </div>
            <nav class="nav flex">
                <a href="#">Главная</a>
                <a href="#">Курсы</a>
                <a href="#">Мастер классы</a>
                <a href="#">Заказать</a>
            </nav>
            <div class="user__links flex">
                <a href="#">Регистрация</a>
                <a href="#">Вход</a>
            </div>
        </div>
    </div>
</header>
