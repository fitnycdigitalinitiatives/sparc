<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        $titleParts[] = metadata('exhibit', 'title');
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_file('lib/bootstrap.min');
        queue_css_file('style');
		queue_css_file('exhibit-cover');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5661dc9df1aebb59" async="async"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('class' => 'exhibits summary')); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
	<div class="site-wrapper">

		<div class="site-wrapper-inner">

			<div class="cover-container">

				<div class="masthead clearfix">
					<header role="banner">
						<!-- Fixed navbar -->
						<nav class="navbar navbar-default navbar-static-top">
							<div class="container">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="/">SPARC</a>
								</div>
								<div id="navbar" class="navbar-collapse collapse">
									<?php echo public_nav_main_bootstrap(); ?>
									<form class="navbar-form navbar-right" role="search" action="<?php echo public_url(''); ?>search">
										<?php echo search_form(array('show_advanced' => false)); ?>
									</form>
								</div><!--/.nav-collapse -->
							</div>
						</nav>					
					</header>
				</div>

				<div class="inner cover">
					<main id="content" role="main">
						<div class="container">
							<div class="row">
								<div class="col-sm-7">
									<h1><?php echo metadata('exhibit', 'title'); ?></h1>
									<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
										<div class="exhibit-description">
											<?php echo $exhibitDescription; ?>
										</div>
									<?php endif; ?>

									<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
										<div class="exhibit-credits">
											<h3><?php echo __('Credits'); ?></h3>
											<p><?php echo $exhibitCredits; ?></p>
										</div>
									<?php endif; ?>
								</div>
								<div class="col-sm-5">
									<?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail', array('class' => 'img-responsive'))): ?>
										<?php $firstPage = getFirstTopPage(); ?>
										<?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage . '<div class="caption"><h5>' . metadata('exhibit', 'title') . '</h5></div>', array('class' => 'thumbnail'), $firstPage); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</main>
				</div>

				<div class="mastfoot">
					<footer role="contentinfo">
						<nav class="navbar navbar-inverse navbar-static-bottom">
							<div class="container">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub-navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<?php echo exhibit_builder_link_to_exhibit($exhibit, null, array('class' => 'navbar-brand')); ?>
								</div>
								<div id="sub-navbar" class="navbar-collapse collapse">
									<?php echo exhibit_builder_page_tree($exhibit); ?>									
								</div><!--/.nav-collapse -->
							</div>
						</nav>	
						<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
					</footer>
				</div>

			</div>

		</div>

	</div>
</body>
</html>
