<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

	<h1><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h1>
	
	<div class="row">
		<div class="col-sm-9">
		<?php exhibit_builder_render_exhibit_page(); ?>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Related Items</h4>
				</div>
				<?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
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
