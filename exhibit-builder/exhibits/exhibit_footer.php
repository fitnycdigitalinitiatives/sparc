      </div>
    </main>
    <footer role="contentinfo">
      <nav class="navbar navbar-inverse navbar-static-bottom">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub-navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, null, array('class' => 'navbar-brand')); ?>
          </div>
          <div id="sub-navbar" class="navbar-collapse collapse">
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
  </body>
  </html>
