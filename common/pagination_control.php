<?php if ($this->pageCount > 1): ?>
<nav>
    <ul class="pagination">
        <?php if ($this->first != $this->current): ?>
        <!-- First page link --> 
        <li class="pagination_first">
        <a href="<?php echo html_escape($this->url(array('page' => $this->first), null, $_GET)); ?>"><?php echo __('First'); ?></a>
        </li>
        <?php endif; ?>
        
        <?php if (isset($this->previous)): ?>
        <!-- Previous page link --> 
        <li class="pagination_previous">
        <a href="<?php echo html_escape($this->url(array('page' => $this->previous), null, $_GET)); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
        </li>
        <?php endif; ?>
        
        <!-- Numbered page links -->
        <?php foreach ($this->pagesInRange as $page): ?> 
        <?php if ($page != $this->current): ?>
        <li class="pagination_range"><a href="<?php echo html_escape($this->url(array('page' => $page), null, $_GET)); ?>"><?php echo $page; ?></a></li>
        <?php else: ?>
        <li class="active"><a href="<?php echo html_escape($this->url(array('page' => $page), null, $_GET)); ?>"><?php echo $page; ?><span class="sr-only">(current)</span></a></li>
        <?php endif; ?>
        <?php endforeach; ?>
        
        <?php if (isset($this->next)): ?> 
        <!-- Next page link -->
        <li class="pagination_next">
        <a href="<?php echo html_escape($this->url(array('page' => $this->next), null, $_GET)); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
        </li>
        <?php endif; ?>
        
        <?php if ($this->last != $this->current): ?>
        <!-- Last page link --> 
        <li class="pagination_last">
        <a href="<?php echo html_escape($this->url(array('page' => $this->last), null, $_GET)); ?>"><?php echo __('Last'); ?></a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
