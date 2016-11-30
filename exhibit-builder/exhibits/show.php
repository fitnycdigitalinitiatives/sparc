<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

  <?php exhibit_builder_render_exhibit_page(); ?>
  
<?php echo common('exhibit_footer', array(), 'exhibit-builder/exhibits'); ?>
