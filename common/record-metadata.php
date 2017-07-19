<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
      <?php if (($setName == "Dublin Core") and (($elementName == "Subject") or ($elementName == "Creator") or ($elementName == "Is Part Of") or ($elementName == "Contributor") or ($elementName == "Source") or ($elementName == "Format") or ($elementName == "Medium") or ($elementName == "Spatial Coverage") or ($elementName == "Temporal Coverage"))): ?>
        <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <dt><?php echo html_escape(__($elementName)); ?></dt>
            <dd class="element-text">
              <ul class="list-unstyled">
                <?php foreach ($elementInfo['texts'] as $text): ?>
                    <li><?php echo tag_search ($text); ?></li>
                <?php endforeach; ?>
              </ul>
            </dd>
        </div><!-- end element -->
      <?php else: ?>
        <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <dt><?php echo html_escape(__($elementName)); ?></dt>
            <dd class="element-text">
              <ul class="list-unstyled">
                <?php foreach ($elementInfo['texts'] as $text): ?>
                    <li><?php echo $text; ?></li>
                <?php endforeach; ?>
              </ul>
            </dd>
        </div><!-- end element -->
      <?php endif; ?>
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
