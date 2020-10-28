<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

  <?php exhibit_builder_render_exhibit_page(); ?>
  <div class="row exhibit-nav">
    <div class="col-xs-12">
          <?php if ($prevLink = exhibit_builder_link_to_previous_page('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span>', array('type' => 'button', 'class' => 'btn btn-default btn-lg btn-round previous'))): ?>
            <?php echo $prevLink; ?>
          <?php else: ?>
            <?php echo exhibit_builder_link_to_exhibit(null, '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span>', array('type' => 'button', 'class' => 'btn btn-default btn-lg btn-round previous')); ?>
          <?php endif; ?>
          <?php if ($nextLink = exhibit_builder_link_to_next_page('<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span>', array('type' => 'button', 'class' => 'btn btn-default btn-lg btn-round next'))): ?>
            <?php echo $nextLink; ?>
          <?php endif; ?>
    </div>
  </div>

<?php echo common('exhibit_footer', array('exhibit' => $exhibit, 'exhibit_page' => $exhibit_page, 'bodyclass' => 'exhibits show'), 'exhibit-builder/exhibits'); ?>
