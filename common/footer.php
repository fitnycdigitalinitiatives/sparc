      </div>
    </main>
    <footer class="footer" role="contentinfo">
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
                  <p class="pull-right">This site is an initiative of the FIT Library.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <ul class="list-inline pull-right">
            				<li><a href="https://www.fitnyc.edu/library/"><i class="fa fa-home fa-2x"></i></a></li>
            				<li><a href="https://www.facebook.com/FITLibrary"><i class="fa fa-facebook fa-2x"></i></a></li>
            				<li><a href="https://twitter.com/FITLibrary"><i class="fa fa-twitter fa-2x"></i></a></li>
            				<li><a href="http://pinterest.com/fitlibrary/"><i class="fa fa-pinterest-p fa-2x"></i></a></li>
            				<li><a href="https://www.instagram.com/fitnyclibrary/"><i class="fa fa-instagram fa-2x"></i></a></li>
          			  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
    <?php if (@$bodyclass == 'items show'):  ?>
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5661dc9df1aebb59"></script>
    <?php endif; ?>
</body>
</html>
