      </div>
    </main>
    <footer class="footer" role="contentinfo">
      <nav class="navbar navbar-inverse navbar-static-bottom">
        <div class="container">
          <!--Reverse Menu for bottom of screen -->
          <div id="sub-navbar" class="navbar-collapse collapse">
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
          </div><!--/.nav-collapse -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sub-navbar" aria-expanded="true" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, null, array('class' => 'navbar-brand')); ?>
          </div>
        </div>
      </nav>
      <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
  </body>
  </html>
