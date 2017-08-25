<?php
$pageTitle = __('Site Error');
echo head(array('title'=>$pageTitle,'bodyclass' => 'error'));
?>
<div class="row">
  <div class="col-sm-4 col-xs-6">
    <h1>Oh Dear...</h1>
    <p class="lead">We're not quite sure how to put this, but it seems that our website isn't exactly functioning correctly at the moment. This is so embarassing.</p>
    <p class="lead">If this problem persists, please <a href="mailto:fitlibsparc@fitnyc.edu">contact us</a> immediately and we'll see what we can to do to sort it all out.</p>
  </div>
</div>
<?php echo foot(); ?>
