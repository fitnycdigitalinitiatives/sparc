<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

    <h1><?php echo 'Browse all items'; ?></h1>
	<div class="row">
		<div class="col-md-4">
			<?php echo public_nav_items_bootstrap(); ?>  
		</div>
		<div class="col-md-4">
			<div class="dropdown">
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

    <div class="browse-items">
        <?php if ($total_results > 0): ?>
			<!-- Image Grid -->
			<div class="row" id="grid">
				<?php foreach (loop('items') as $item): ?>
					<div class="item">
						<div class="col-lg-3 col-md-4 col-xs-6 thumb">
							<?php if (metadata('item', 'has thumbnail')): ?>
								<?php echo link_to_item(item_image('square_thumbnail', array('class' => 'img-responsive')), array('class' => 'thumbnail')); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
        <?php else : ?>
            <p><?php echo 'No items added, yet.'; ?></p>
        <?php endif; ?>
    </div>
    <?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
