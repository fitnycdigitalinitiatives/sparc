<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <div class="form-group has-feedback">
        <?php echo $this->formText('query', $filters['query'], array('class'=>'form-control', 'placeholder'=>'Search the collection', 'aria-label' => 'Search')); ?>
        <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
    </div>
</form>
