<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="page-header">
				<h1><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<?php exhibit_builder_render_exhibit_page(); ?>

		<div class="col-sm-2">
			<div class="panel panel-default" id="exhibit-pages">
				<div class="panel-heading">
					<h4>Sections</h4>
				</div>
				<div class="list-group">
					<?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
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
