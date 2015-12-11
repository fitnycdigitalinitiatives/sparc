<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
</div>
<div class="container-fluid">
	<h1><?php echo metadata('exhibit_page', 'title'); ?></h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-1" id="exhibit-blocks">
		<?php exhibit_builder_render_exhibit_page(); ?>
		</div>

		<div class="col-sm-2">
			<nav id="exhibit-pages">
				<h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
				<?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
			</nav>
		</div>
	</div>
	<nav class="text-center">
		<ul class="pagination">
			<?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
			<li id="exhibit-nav-prev">
			<?php echo $prevLink; ?>
			</li>
			<?php endif; ?>
			<?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
			<li id="exhibit-nav-next">
			<?php echo $nextLink; ?>
			</li>
			<?php endif; ?>
			<li class="active" id="exhibit-nav-up">
			<?php echo exhibit_builder_page_trail(); ?>
			</li>
		</ul>
	</nav>
<?php echo foot(); ?>
