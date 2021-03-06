<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

  <div class="row summary-text">
		<div class="col-sm-6">
			<h1><?php echo metadata('exhibit', 'title'); ?></h1>
			<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
				<div class="exhibit-description text-justify">
					<?php echo $exhibitDescription; ?>
				</div>
			<?php endif; ?>

			<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
				<div class="exhibit-credits">
					<h3><?php echo __('Credits'); ?></h3>
					<p><?php echo $exhibitCredits; ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
  <div class="row summary-nav">
		<div class="col-xs-12">
      <?php $firstPage = $exhibit->getFirstTopPage(); ?>
      <?php echo exhibit_builder_link_to_exhibit($exhibit, '<i class="fas fa-angle-right" aria-hidden="true"></i><span class="sr-only">Next</span>', array('type' => 'button', 'class' => 'btn btn-default btn-lg btn-round next', 'role' => 'button'), $firstPage); ?>
    </div>
  </div>

  <?php
    $slug = $exhibit->slug;
    $bg_image = $slug . '_exhibition.jpg';
    try {
        $bg_image_url = img($bg_image);
        $html = '<div id="exhibition_background" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(\'';
        $html .= $bg_image_url;
        $html .= '\');"></div>';
        echo $html;
    } catch (Exception $e) {
        echo '<div id="exhibition_background" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));"></div>';
    }
  ?>


<?php echo common('exhibit_footer', array('exhibit' => $exhibit, 'exhibit_page' => null), 'exhibit-builder/exhibits'); ?>
