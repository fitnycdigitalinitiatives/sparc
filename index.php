<?php echo head(array('bodyid'=>'home')); ?>

<div class="jumbotron">
	<h1><?php echo '<img src="' . img('sparc_digital.png') . '" srcset="' . img('sparc_digital.png') . ' 1x, ' . img('sparc_digital_retina.png') . ' 2x" alt="SPARC Digital" id="logo">'; ?></h1>
	<h2>The digital collections of the FIT Library's Special Collections and College Archives</h2>
	<!-- Search -->
	<!-- Get filter for plugin use -->
	<?php $url = apply_filters('search_form_default_action', url('search')); ?>
	<form id="search-form" name="search-form" role="search" action="<?php echo $url; ?>" method="get">
		<div class="input-group input-group-md">
			<input type="text" name="query" id="query" value="" class="form-control" placeholder="Search the collection" aria-label="Search">
			<span class="input-group-btn">
				<button class="btn btn-default" name="submit_search" id="submit_search" type="submit" value="Search"><span class="glyphicon glyphicon-search" aria-label="search"></span><span class="sr-only">Search</span></button>
			</span>
		</div>
	</form>
</div>

<?php echo foot(); ?>
