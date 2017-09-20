<?php
if ($this->pageCount > 1):
    $getParams = $_GET;
?>
<div class="row exhibit-nav">
    <div class="col-xs-12">
      <!-- Previous page link -->
      <?php if (isset($this->previous)): ?>
        <?php $getParams['page'] = $previous; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Previous" type="button" class="btn btn-default btn-lg btn-round previous"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
      <?php endif; ?>

      <!-- Next page link -->
      <?php if (isset($this->next)): ?>
        <?php $getParams['page'] = $next; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Next" type="button" class="btn btn-default btn-lg btn-round next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
      <?php endif; ?>
    </div>
</div>
<?php endif; ?>
