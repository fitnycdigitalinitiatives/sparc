<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
      <?php if (($setName == "Dublin Core") and (($elementName == "Subject") or ($elementName == "Creator") or ($elementName == "Is Part Of") or ($elementName == "Contributor") or ($elementName == "Source") or ($elementName == "Medium") or ($elementName == "Spatial Coverage") or ($elementName == "Temporal Coverage"))): ?>
        <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <h3><?php echo html_escape(__($elementName)); ?></h3>
            <?php foreach ($elementInfo['texts'] as $text): ?>
                <div class="element-text"><?php echo tag_search ($text); ?></div>
            <?php endforeach; ?>
        </div><!-- end element -->
      <?php else: ?>
        <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <h3><?php echo html_escape(__($elementName)); ?></h3>
            <?php foreach ($elementInfo['texts'] as $text): ?>
                <div class="element-text"><?php echo $text; ?></div>
            <?php endforeach; ?>
        </div><!-- end element -->
      <?php endif; ?>
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
