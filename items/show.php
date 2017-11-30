<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
	<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    <div class="row">
        <div class="col-sm-12">
			<!-- Fire OpenSeadragon Separately from other plugins for placement -->
			<?php echo $this->openseadragon($item); ?>
        </div>
	</div>
  <div class="row">
    <div class="col-sm-12 download">
      <?php echo public_domain_download($item); ?>
    </div>
  </div>
	<div class="row">
		<div class="col-sm-6 palette">
			<?php if (metadata('item', array('Item Type Metadata', 'Color Data'))): ?>
				<?php echo palette('item'); ?>
			<?php endif; ?>
		</div>
		<div class="col-sm-6">
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_sharing_toolbox"></div>
    </div>
	</div>
	<div class="row" id="meta-related">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Item Information</h4>
				</div>
				<div class="panel-body">
          <dl class="metalist">
  					<?php echo all_element_texts('item'); ?>
  					<!-- If the item belongs to a collection, the following creates a link to that collection. -->
  					<?php if (metadata('item', 'Collection Name')): ?>
  						<div id="collection" class="element">
  							<dt><?php echo __('Collection'); ?></dt>
  							<dd class="element-text"><?php echo link_to_items_browse(metadata('item', 'Collection Name'), array('collection' => metadata(get_collection_for_item(), 'id'))); ?></dd>
  						</div>
  					<?php endif; ?>

  					<!-- The following prints a citation for this item. -->
  					<div id="item-citation" class="element">
  						<dt><?php echo __('Citation'); ?></dt>
  						<dd class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></dd>
  					</div>
          </dl>
				</div>
			</div>
		</div>
		<!-- Related Items sidebar -->
		<?php echo related_items($item); ?>
	</div>
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<?php echo foot(array('bodyclass' => 'items show')); ?>
