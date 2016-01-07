<?php echo head(array('bodyid'=>'home')); ?>

<div class="jumbotron">
	<h1>SPARC Digital</h1>
	<h2>The digital collections of the FIT Library's Special Collections and College Archives</h2>
	<!-- Search -->
	<form role="search" action="/search">
		<div class="input-group input-group-lg">
			<input type="text" name="query" id="query" value="" class="form-control" placeholder="Search the collection">        
			<span class="input-group-btn">
				<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-label="search"></span></button>
			</span>
		</div>
	</form>
</div>

<?php echo foot(); ?>
