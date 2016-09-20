<?php
    $pageTitle = __('Search Results');
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>
    <h1><?php echo $pageTitle; ?> <?php echo search_filters(); ?> <span class="badge"><?php echo $total_results; ?></span></h1>
    <div class="search-results">
	<?php if ($total_results): ?>
        <table id="search-results">
            <div class="row">
				<div class="col-sm-6">
					<?php echo public_nav_items_bootstrap(); ?>
				</div>
			</div>

			<hr>
            <!-- Image Grid -->
			<div class="row" id="grid">
                <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                <?php foreach (loop('search_texts') as $searchText): ?>
                <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <?php $recordType = $searchText['record_type']; ?>
                <?php set_current_record($recordType, $record); ?>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 item-thumb <?php echo strtolower($filter->filter($recordType)); ?>">
                  <?php if ($recordType == 'Item'): ?>
                    <?php echo link_to($record, 'show', mdid_thumbnail_tag($record, 'img-responsive') . '<div class="caption"><h5>' . metadata($record, array('Dublin Core', 'Title')) . '</h5></div>', array('class' => 'thumbnail')); ?>
                  <?php elseif ($recordType == 'Exhibit'): ?>
                  <?php endif; ?>

                </div>
                <?php endforeach; ?>
            </div>
        </table>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Your query returned no results.');?></p>
    <?php endif; ?>
	</div>
<?php echo foot(); ?>
