<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<h1><?php echo 'Browse all collections'; ?></h1>

<div class="browse-collections">
	<?php if ($total_results > 0): ?>
	<div class="browse-collections-header hidden-xs">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-2">
				<?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array('')); ?>
			</div>
			<div class="col-sm-3">
				<?php echo browse_sort_links(array('Creator'=>'Dublin Core,Contributor'), array('')); ?>
			</div>
			<div class="col-sm-4">
                        Description
			</div>
		</div>
	</div>

	<!-- Image Grid -->
	<div class="row" id="grid">
		<?php foreach (loop('collections') as $collection): ?>
		<div class="col-md-4 col-xs-6 item-thumb">
			<?php if ($collectionImage = record_image('collection', 'square_thumbnail', array('class' => 'img-responsive'))): ?>
			<?php echo link_to_items_browse($collectionImage . '<div class="caption"><h5>' . metadata('collection', array('Dublin Core', 'Title')) . '</h5></div>', array('collection' => metadata($collection, 'id')), array('class' => 'thumbnail')); ?>
			<?php endif; ?>
			<?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php else : ?>
	<p><?php echo 'No collections added, yet.'; ?></p>
	<?php endif; ?>
</div>
<?php echo pagination_links(); ?>        

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
