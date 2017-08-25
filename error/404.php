<?php
$pageTitle = __('404 Page Not Found');
echo head(array('title'=>$pageTitle,'bodyclass' => 'error'));
?>
<div class="row">
  <div class="col-sm-4 col-xs-6">
    <h1>Oh Dear...</h1>
    <p class="lead">We're not quite sure how to break this to you, but it seems you've run into one of those pesky 404 errors. The page you are looking for doesn't actually exist.</p>
    <p class="lead">If you continue to run into this sort of problem, please <a href="mailto:fitlibsparc@fitnyc.edu">contact us</a> immediately and we'll see what we can to do to sort it all out.</p>
  </div>
</div>
<?php echo foot(); ?>
