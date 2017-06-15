<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="row results">
  <div class="col-xs-9">
    <h4>Showing <?php echo $total_results; ?> exhibit total</h4>
  </div>
  <div class="col-xs-12">
    <?php /* Drop-down sort isn't needed at the moment
  	<div class="row">
  		<div class="col-sm-12">
  			<div class="dropdown pull-right">
  				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  							Sort by:
  					<span class="caret"></span>
  				</button>
  				<?php
  							$sortLinks[__('Title')] = 'Dublin Core,Title';
  							$sortLinks[__('Creator')] = 'Dublin Core,Creator';
  							$sortLinks[__('Date Added')] = 'added';
  							?>
  				<?php echo browse_sort_links_bootstrap($sortLinks); ?>
  			</div>
  		</div>
  	</div>
  	*/ ?>
  </div>
</div>

<div class="browse-exhibits">
	<?php if ($total_results > 0): ?>

	<!-- Image Grid -->
	<div class="row" id="grid">
		<?php foreach (loop('exhibit') as $exhibit): ?>
		<div class="col-md-3 col-sm-4 col-xs-6 item-thumb">
			<?php if ($item = get_exhibit_item ($exhibit)): ?>
				<?php echo exhibit_builder_link_to_exhibit($exhibit, mdid_thumbnail_tag($item, 'img-responsive') . '<div class="caption"><h5>' . metadata('exhibit', 'title') . '</h5></div>', array('class' => 'thumbnail')); ?>
			<?php else: ?>
				<?php echo exhibit_builder_link_to_exhibit($exhibit, '<div class="thumbnail-container"><img src="' . img('fallback-image.png') . '" /><div class="thumbnail-container"><div class="caption"><h5>' . metadata('exhibit', 'title') . '</h5></div>', array('class' => 'thumbnail')); ?>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php echo pagination_links(); ?>

	<?php else : ?>
	<p><?php echo 'No exhibits added, yet.'; ?></p>
	<?php endif; ?>
</div>

<?php echo foot(); ?>
