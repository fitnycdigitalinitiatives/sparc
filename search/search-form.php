<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <div class="form-group has-feedback">
        <?php echo $this->formText('query', $filters['query'], array('class'=>'form-control', 'placeholder'=>'Search the collection', 'aria-label' => 'Search')); ?>
        <i class="fas fa-search form-control-feedback" aria-hidden="true"></i>
    </div>
</form>
