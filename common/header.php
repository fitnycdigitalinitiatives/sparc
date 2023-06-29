<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HN7LCC8ZDL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-HN7LCC8ZDL');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo social_tags(@$bodyclass); ?>

    <!-- Will build the page <title> -->
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title>
        <?php echo implode(' &middot; ', $titleParts); ?>
    </title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Icon -->
    <link rel="icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon">
    <!-- Need to add custom and third-party CSS files? Include them here -->
    <script src="https://kit.fontawesome.com/1ddf8635da.js" crossorigin="anonymous"></script>
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic');
    queue_css_url('//stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css');
    queue_css_file('style');
    echo head_css();
    ?>

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
<header role="banner">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo link_to_home_page('<img src="' . img('sparc_digital_header.png') . '" srcset="' . img('sparc_digital_header.png') . ' 1x, ' . img('sparc_digital_header_retina.png') . ' 2x" alt="SPARC Digital">', array('class' => 'navbar-brand')); ?>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php echo public_nav_main_bootstrap(); ?>
                <?php echo search_form(array('show_advanced' => false, 'form_attributes' => array('class' => 'navbar-form navbar-right', 'role' => 'search'))); ?>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

</header>
<main id="content" role="main">
    <div class="container">
        <?php fire_plugin_hook('public_content_top', array('view' => $this)); ?>