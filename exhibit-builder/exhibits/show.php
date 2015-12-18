<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
	<div class="row">
		<div class="col-sm-11">
			<h1><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h1>
		</div>
		<div class="col-sm-1">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Sections<span class="caret"></span></button>
				<?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<?php exhibit_builder_render_exhibit_page(); ?>
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
