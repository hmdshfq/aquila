<?php 
/**
 * Header template
 * 
 * @package Aquila
 */
?>

<!DOCTYPE html>
<!-- Add language attributes automatically -->
<html lang="<?php language_attributes(  )?>">

<head>
    <!-- Add charset automatically -->
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adds user-defined and WordPress stylesheets -->
    <?php wp_head() ?>
</head>
<!-- Add custom and WordPress classes on body tag -->

<body <?php body_class() ?>>
    <!-- Add custom code as soon as the body tag opens -->
    <?php 
    if(function_exists('wp_body_open')){
        wp_body_open();
    }
    ?>
    <div id="page" class="site">
        <header id="masthead" class="site-header" role="banner">
            <?php get_template_part('template-parts/header/nav'); ?>
        </header>
        <div id="content" class="site-content">