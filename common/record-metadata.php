<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element row">
		<div class="col-sm-2">
        <h4><?php echo html_escape(__($elementName)); ?>:</h4>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<?php foreach ($elementInfo['texts'] as $text): ?>
					<div class="element-text col-md-12"><?php echo $text; ?></div>
				<?php endforeach; ?>
			</div>
		</div>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
