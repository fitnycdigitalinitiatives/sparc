<?php
if ($this->pageCount > 1):
    $getParams = $_GET;
?>
<nav class="text-center">
    <ul class="pagination">
        <?php if (($this->first != $this->current) && !(in_array($this->first, $this->pagesInRange))): ?>
        <!-- First page link -->
        <li class="pagination_first">
		<?php $getParams['page'] = $first; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('First'); ?></a>
        </li>
        <?php endif; ?>

        <?php if (isset($this->previous)): ?>
        <!-- Previous page link -->
        <li class="pagination_previous">
		<?php $getParams['page'] = $previous; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
        </li>
        <?php endif; ?>

        <!-- Numbered page links -->
        <?php foreach ($this->pagesInRange as $page): ?>
        <?php if ($page != $this->current): ?>
        <li class="pagination_range">
		<?php $getParams['page'] = $page; ?>
		<a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo $page; ?></a>
		</li>
        <?php else: ?>
        <li class="active">
		<?php $getParams['page'] = $page; ?>
		<a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo $page; ?><span class="sr-only">(current)</span></a>
		</li>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php if (isset($this->next)): ?>
        <!-- Next page link -->
        <li class="pagination_next">
		<?php $getParams['page'] = $next; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
        </li>
        <?php endif; ?>

        <?php if (($this->last != $this->current) && !(in_array($this->last, $this->pagesInRange))): ?>
        <!-- Last page link -->
        <li class="pagination_last">
		<?php $getParams['page'] = $last; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('Last'); ?></a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
<!-- Floating Arrows -->
<div class="row browse-nav">
    <div class="col-xs-12">
      <!-- Previous page link -->
      <?php if (isset($this->previous)): ?>
        <?php $getParams['page'] = $previous; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Previous" type="button" class="btn btn-default btn-lg btn-round previous"><i class="fas fa-angle-left" aria-hidden="true"></i><span class="sr-only">Previous</span></a>
      <?php endif; ?>

      <!-- Next page link -->
      <?php if (isset($this->next)): ?>
        <?php $getParams['page'] = $next; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Next" type="button" class="btn btn-default btn-lg btn-round next"><i class="fas fa-angle-right" aria-hidden="true"></i><span class="sr-only">Next</span></a>
      <?php endif; ?>
    </div>
</div>
<?php endif; ?>
