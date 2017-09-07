<?php
    $pageTitle = __('Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

  <div class="row results">
    <?php if ($isfb = item_search_filters_bootstrap()): ?>
      <div class="col-xs-8">
        <h4>Showing <?php echo $total_results; ?> results for <em><?php echo $isfb; ?></em></h4>
      </div>
      <div class="col-xs-4">
        <div id="sort_button" class="dropdown pull-right">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sort by:
            <span class="caret"></span>
          </button>
          <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            $sortLinks[__('Date')] = 'Dublin Core,Date';
            $sortLinks[__('Date Added')] = 'added';
            ?>
          <?php echo browse_sort_links_bootstrap($sortLinks); ?>
        </div>
      </div>
    <?php else: ?>
      <div class="col-sm-4 col-xs-8">
        <h4>Showing <?php echo $total_results; ?> items total</h4>
      </div>
      <div class="col-sm-4 hidden-xs">
      </div>
      <div class="col-xs-4">
        <div id="sort_button" class="dropdown pull-right">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sort by:
            <span class="caret"></span>
          </button>
          <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            $sortLinks[__('Date')] = 'Dublin Core,Date';
            $sortLinks[__('Date Added')] = 'added';
            ?>
          <?php echo browse_sort_links_bootstrap($sortLinks); ?>
        </div>
        <div id="color_button" class="dropdown pull-right visible-xs-block">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Color Family <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" id="color_board">
            <li><?php echo basic_color_board(); ?></li>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  </div>


	<div class="browse-items">
	<?php if ($total_results > 0): ?>

		<!-- Image Grid -->
		<div class="row" id="grid">
			<?php foreach (loop('items') as $item): ?>
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 item-thumb">
				<?php echo link_to_item(mdid_thumbnail_tag($item, 'img-responsive') . '<div class="caption"><h5>' . metadata('item', array('Dublin Core', 'Title')) . '</h5></div>', array('class' => 'thumbnail')); ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php echo pagination_links(); ?>
	<?php else : ?>
		<p>Your search returned no results. Please try another keyword. Or try our <a href="/items/search">Advanced Search</a>.</p>
	<?php endif; ?>
	</div>

	<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
