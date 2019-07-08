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
    <link rel="icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon">
    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_url('//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic');
        queue_css_file('lib/bootstrap.min');
        queue_css_file('style-4');
        queue_css_file('fonts/font-awesome/css/font-awesome.min');
        echo head_css();
    ?>


    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('lib/typeahead/typeahead.bundle.min');
        echo head_js();
    ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-107096384-1', 'auto');
      ga('send', 'pageview');

    </script>
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
  <script>
  jQuery(document).ready(function($){
    // constructs the suggestion engine
    // /terms?terms.fl=tag&terms.limit=-1&omitHeader=true&indent=true&wt=json&json.nl=arrntv
    var tags = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('tag'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '<?php echo src('autocomplete_tags_counts_07-08-2019', 'javascripts/lib/typeahead', 'json'); ?>'
    });

    $('.form-group #query').typeahead({
    hint: false,
    highlight: true,
    minLength: 1
    },
    {
    name: 'tags',
    display: 'tag',
    source: tags,
    limit: 7,
    templates: {
      suggestion: function(data){
            return '<div><span class="badge tag-count pull-right">' + data.count + '</span>' + data.tag + '</div>';
      }
    }
  }).bind('typeahead:select', function(ev, data) {
      var search_url = '/solr-search?q=&facet=tag%3A%22' + encodeURIComponent(data.tag) + '%22';
      window.location.href = search_url;
    });
  });
  </script>

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
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
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
