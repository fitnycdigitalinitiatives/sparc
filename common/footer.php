      </div>
      </main>
      <footer class="footer common" role="contentinfo">
        <div class="container">
          <div class="row">
            <div class="col-sm-6" id="copyright">
              <div class="row">
                <div class="col-xs-12">
                  <a href="https://www.fitnyc.edu">
                    <img src="<?php echo img('FITSUNY1_white.png'); ?>" alt="Fashion Institute of Technology - State University of New York">
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <p>©2017 Fashion Institute of Technology</br>All rights reserved.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6" id="social">
              <div class="row">
                <div class="col-xs-12">
                  <p>This site is an initiative of the FIT Library.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <ul class="list-inline">
                    <li><a href="https://www.fitnyc.edu/library/"><i class="fa fa-home fa-2x"></i><span class="sr-only">FIT Library Homepage</span></a></li>
                    <li><a href="https://www.facebook.com/FITLibrary"><i class="fa fa-facebook fa-2x"></i><span class="sr-only">FIT Library Facebook</span></a></li>
                    <li><a href="https://twitter.com/FITLibrary"><i class="fa fa-twitter fa-2x"></i><span class="sr-only">FIT Library Twitter</span></a></li>
                    <li><a href="http://pinterest.com/fitlibrary/"><i class="fa fa-pinterest-p fa-2x"></i><span class="sr-only">FIT Library Pinterest</span></a></li>
                    <li><a href="https://www.instagram.com/fitnyclibrary/"><i class="fa fa-instagram fa-2x"></i><span class="sr-only">FIT Library Instagram</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
      </footer>
      <!-- Javascript -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      <script src="<?php echo src('typeahead.bundle.min', 'javascripts/lib/typeahead', 'js'); ?>"></script>
      <?php if (@$bodyclass == 'items show'):  ?>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5661dc9df1aebb59"></script>

        <script src="https://cdn.jsdelivr.net/npm/openseadragon@2.4/build/openseadragon/openseadragon.min.js" integrity="sha384-BqvbWCNWGAf21sDh6X5DGseJPJ+iNSRIX/j6rxssCsNw1dbPRaX8TiA9gfy3Jd2F" crossorigin="anonymous"></script>
        <script src="<?php echo src('seadragon-view', 'javascripts', 'js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
        <script src="<?php echo src('download', 'javascripts', 'js'); ?>"></script>
      <?php endif; ?>
      <script src="<?php echo src('clamp.min', 'javascripts/lib/clamp', 'js'); ?>"></script>
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script type='text/javascript'>
        $(function() {
          $('[data-toggle="tooltip"]').tooltip()
        })
      </script>
      <script type='text/javascript'>
        $(function() {
          $('[data-toggle="popover"]').popover({
            container: 'body'
          })
        })
      </script>
      <?php echo $this->partial('common/typeahead-partial.phtml'); ?>
      <script type="text/javascript">
        $('.item-thumb .caption h5').each(function() {
          var currentCaption = $(this).get(0);
          $clamp(currentCaption, {
            clamp: 2,
            useNativeClamp: true
          });
        });
      </script>
      <?php echo head_js($includeDefaults = false); ?>
      </body>

      </html>