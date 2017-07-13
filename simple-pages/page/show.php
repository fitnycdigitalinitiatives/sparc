<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div class="row" id="primary">
  <div class="col-sm-8">
    <h1 class="page-header"><?php echo metadata('simple_pages_page', 'title'); ?></h1>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    ?>
  </div>
  <div class="col-sm-3 col-sm-offset-1">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Links</div>
      <!-- List group -->
      <ul class="list-group">
        <a href="https://www.fitnyc.edu/library/sparc/index.php" class="list-group-item">SPARC Homepage</a>
        <a href="http://blog.fitnyc.edu/materialmode/" class="list-group-item">Material Mode: SPARC's Blog</a>
        <a href="https://atom-sparc.fitnyc.edu/" class="list-group-item">SPARC Connect</a>
      </ul>
    </div>
  </div>
</div>

<?php echo foot(); ?>
