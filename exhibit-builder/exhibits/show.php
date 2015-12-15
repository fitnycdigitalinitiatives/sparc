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
        $titleParts[] = metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title');
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
<body class="exhibits show">
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
	<div class="site-wrapper">

		<div class="site-wrapper-inner">

			<div class="cover-container">

				<div class="masthead clearfix">
					<nav class="navbar navbar-default navbar-fixed-top">
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
					</div>

					<div class="inner cover">
						<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
						<div class="row">
							<div class="col-sm-9" id="exhibit-blocks">
								<?php exhibit_builder_render_exhibit_page(); ?>
							</div>

							<div class="col-sm-3">
								<div class="row">
									<div class="col-sm-9">
										<nav id="exhibit-pages">
											<h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
											<?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
										</nav>
									</div>
								</div>
							</div>
						</div>
						<nav class="text-center">
							<ul class="pagination">
								<?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
								<li>
									<?php echo $prevLink; ?>
								</li>
								<?php endif; ?>
								<li class="active">
									<?php echo exhibit_builder_page_trail(); ?>
								</li>
								<?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
								<li>
									<?php echo $nextLink; ?>
								</li>
								<?php endif; ?>			
							</ul>
						</nav>
					</div>

					<div class="mastfoot">
						<footer role="contentinfo">
        <hr>
        <div class="container">
            <p class="text-center">
                <?php echo __('Copyright &copy; ') . date('Y') . ' ' . link_to_home_page() . ', All Rights Reserved.'; ?><br>
                <?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?>
            </p>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
					</div>

				</div>

			</div>

		</div>
</body>
</html>
