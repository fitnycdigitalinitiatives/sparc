<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

    <h1><?php echo 'Browse all items'; ?></h1>
    <?php echo public_nav_items_bootstrap(); ?>  
	<hr>

    <div class="browse-items">
        <?php if ($total_results > 0): ?>
        <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            ?>
			<!-- Image Grid -->
            <?php foreach (loop('items') as $item): ?>
            <div class="item">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
					<?php if (metadata('item', 'has thumbnail')): ?>
						<?php echo link_to_item(item_image('square_thumbnail', array('class' => 'img-responsive')), array('class' => 'thumbnail')); ?>
					<?php endif; ?>
				</div>
            </div>
            <?php endforeach; ?>
            <div id="outputs">
                <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
                <?php echo output_format_list(false); ?>
            </div>
        <?php else : ?>
            <p><?php echo 'No items added, yet.'; ?></p>
        <?php endif; ?>
    </div>
    <?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
