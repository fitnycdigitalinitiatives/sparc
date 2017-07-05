      </div>
    </main>
    <footer class="footer" role="contentinfo">
      <nav class="navbar navbar-inverse navbar-static-bottom">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sub-navbar" aria-expanded="true" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, null, array('class' => 'navbar-brand')); ?>
          </div>
          <div id="sub-navbar" class="navbar-collapse collapse in .visible-lg-block .visible-xs-block">
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
          </div><!--/.nav-collapse -->
          <!-- Just Prev, next, current pages -->
          <div id="sub-navbar" class="navbar-collapse collapse in .hidden-lg-block .hidden-xs-block">
            <?php if (!$exhibit_page): ?>
              <?php $firstPage = $exhibit->getFirstTopPage(); ?>
              <li role="presentation">
                <?php echo exhibit_builder_link_to_exhibit($exhibit, metadata($firstPage, 'title'), array(), $firstPage); ?>
              </li>
              <?php $nextLink = exhibit_builder_link_to_next_page(); ?>
              <li role="presentation">
                <?php echo @$prevLink; ?>
              </li>
              <p class="navbar-text"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></p>
            <?php else: ?>
              <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                <p class="navbar-text"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></p>
                <li role="presentation">
                  <?php echo $prevLink; ?>
                </li>
              <?php endif; ?>
              <li role="presentation" class="active">
                <?php echo exhibit_builder_link_to_exhibit($exhibit, metadata($exhibit_page, 'title'), array(), $exhibit_page); ?>
              </li>
              <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                <li role="presentation">
                  <?php echo $nextLink; ?>
                </li>
                <p class="navbar-text"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></p>
              <?php endif; ?>
            <?php endif; ?>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
  </body>
  </html>
