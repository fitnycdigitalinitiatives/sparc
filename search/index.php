<?php
    $pageTitle = __('Search');
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>
  <div class="row results">
    <div class="col-sm-9">
      <h4 class="results"> Showing <?php echo $total_results; ?> results for <em><?php echo search_filters(); ?></em></span></h4>
    </div>
  </div>
  <div class="search-results">
  	<?php if ($total_results): ?>

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
              <?php $item = get_exhibit_item ($record); ?>
              <?php echo link_to($record, 'show', mdid_thumbnail_tag($item, 'img-responsive') . '<div class="caption"><h5>' . metadata($record, 'title') . '</h5></div>', array('class' => 'thumbnail')); ?>
            <?php elseif ($recordType == 'Collection'): ?>
              <?php $item = get_record('Item', array('collection' => metadata($record, 'id'))); ?>
              <?php echo link_to($record, 'show', mdid_thumbnail_tag($item, 'img-responsive') . '<div class="caption"><h5>' . metadata($record, array('Dublin Core', 'Title')) . '</h5></div>', array('class' => 'thumbnail')); ?>
            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
      <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Your query returned no results.');?></p>
    <?php endif; ?>
   </div>

<?php echo foot(); ?>
