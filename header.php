<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="profile"   href="http://gmpg.org/xfn/11">
    <link rel="pingback"  href="<?php bloginfo( 'pingback_url' ); ?>">  
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kristi:100,300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo \DVGROUP\Utils::image('favicon.ico'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<header id="header" class="site-header transition fw">
    <div class="container-fluid">
        <?php get_template_part('partials/global/navbar'); ?>
    </div>
</header>
<div class="site-content">