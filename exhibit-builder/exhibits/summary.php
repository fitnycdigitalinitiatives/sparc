<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

  <div class="row">
		<div class="col-sm-7">
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
			<?php $firstPage = $exhibit->getFirstTopPage();; ?>
		</div>
		<div class="col-sm-5 exhibition-thumb">
			<?php if ($item = get_exhibit_item ($exhibit)): ?>
				<?php echo exhibit_builder_link_to_exhibit($exhibit, mdid_thumbnail_tag($item, 'img-responsive'), array('class' => 'thumbnail'), $firstPage); ?>
			<?php endif; ?>
		</div>
	</div>
  <div class="row exhibit-nav">
		<div class="col-xs-12">
      <?php echo exhibit_builder_link_to_exhibit($exhibit, '<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>', array('type' => 'button', 'class' => 'btn btn-default btn-lg btn-round next', 'role' => 'button'), $firstPage); ?>
    </div>
  </div>

<?php echo common('exhibit_footer', array('exhibit' => $exhibit, 'exhibit_page' => null), 'exhibit-builder/exhibits'); ?>
