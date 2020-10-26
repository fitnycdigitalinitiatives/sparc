      </div>
    </main>
    <footer class="footer" role="contentinfo">
      <nav class="navbar navbar-inverse navbar-static-bottom">
        <div class="container">
          <div class="navbar-header">
            <div class="dropup hidden-lg" id="exhibit_toc">
              <button class="navbar-toggle visible-md-block visible-sm-block visible-xs-block" type="button" id="ExhibitTOC" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page, 'dropdown-menu'); ?>
            </div>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, null, array('class' => 'navbar-brand')); ?>
          </div>
          <div id="sub-navbar" class="visible-lg-block">
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page, 'nav navbar-nav'); ?>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="<?php echo src('typeahead.bundle.min', 'javascripts/lib/typeahead', 'js'); ?>"></script>
    <?php if (@$bodyclass == 'exhibits show'):  ?>

      <script src="https://cdn.jsdelivr.net/npm/openseadragon@2.4/build/openseadragon/openseadragon.min.js" integrity="sha384-BqvbWCNWGAf21sDh6X5DGseJPJ+iNSRIX/j6rxssCsNw1dbPRaX8TiA9gfy3Jd2F" crossorigin="anonymous"></script>
      <script src="<?php echo src('seadragon-view', 'javascripts', 'js'); ?>"></script>
    <?php endif; ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  	<script type='text/javascript'>
      $(function () {
    	  $('[data-toggle="tooltip"]').tooltip()
    	})
  	</script>
    <script type='text/javascript'>
      $(function () {
    	  $('[data-toggle="popover"]').popover({
        container: 'body'
        })
    	})
  	</script>
    <?php echo $this->partial('common/typeahead-partial.phtml'); ?>
    <?php echo head_js($includeDefaults = false); ?>
  </body>
  </html>
