<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9" id="exhibit-blocks">
		<?php exhibit_builder_render_exhibit_page(); ?>
		</div>

		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-9">
					<nav id="exhibit-pages">
						<h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
						<?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<nav class="text-center">
		<ul class="pagination">
			<?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
			<li>
			<?php echo $prevLink; ?>
			</li>
			<?php endif; ?>
			<li class="active">
			<?php echo exhibit_builder_page_trail(); ?>
			</li>
			<?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
			<li>
			<?php echo $nextLink; ?>
			</li>
			<?php endif; ?>			
		</ul>
	</nav>
<?php echo foot(); ?>
