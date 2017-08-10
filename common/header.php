<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo social_tags(@$bodyclass); ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Icon -->
    <link rel="icon" href="https://www.fitnyc.edu/images/display/buttons/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://www.fitnyc.edu/images/display/buttons/favicon.ico" type="image/x-icon">
    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_url('//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic');
        queue_css_file('lib/bootstrap.min');
        queue_css_file('style');
        queue_css_file('fonts/font-awesome/css/font-awesome.min');
        echo head_css();
    ?>


    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type='text/javascript'>
    jQuery(function ($) {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	</script>
  <script type='text/javascript'>
    jQuery(function ($) {
	  $('[data-toggle="popover"]').popover({
    container: 'body'
    })
	})
	</script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner">
	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo link_to_home_page('<img src="' . img('sparc_digital_header.png') . '" alt="SPARC Digital">', array('class' => 'navbar-brand')); ?>
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
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
