<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

  <div class="row summary-text">
		<div class="col-sm-12">
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
			<?php $firstPage = $exhibit->getFirstTopPage(); ?>
		</div>
	</div>
  <div class="row summary-nav">
		<div class="col-xs-12">
      <?php echo exhibit_builder_link_to_exhibit($exhibit, '<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>', array('type' => 'button', 'class' => 'btn btn-default btn-lg btn-round next', 'role' => 'button'), $firstPage); ?>
    </div>
  </div>
  <?php $bg_image = $exhibit->slug + '_exhibition.jpg'; ?>
  <div id="exhibition_background" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("<?php echo img($bg_image); ?>");"></div>


<?php echo common('exhibit_footer', array('exhibit' => $exhibit, 'exhibit_page' => null), 'exhibit-builder/exhibits'); ?>
