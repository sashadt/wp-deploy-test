<!-- footer html begins -->    
                    <footer class="footer-main">
                        <div class="footer-content">
                            <div class="row">
                                <div class="medium-6 columns">
                                    <!-- Copyright -->
                                    <?php echo do_shortcode( '[contentblock id=4]' ); ?> 
                                </div>
                                <div class="medium-6 columns">
                                    <!-- Footer Menu -->
                                    <?php echo do_shortcode( '[contentblock id=5]' ); ?> 
                                </div>                  
                            </div>
                        </div>
                    </footer>
                    <div id="contactModal" class="small reveal-modal" data-reveal>
                        <header class="modal-header">
                            <h3>Contact Us</h3>
                            <p class="lead">We'd love to get in touch. Leave your contact information and one of our representatives will contact you within 24 hours!</p>
                        </header>
                       <!--- <script src="//app-ab06.marketo.com/js/forms2/js/forms2.js"></script>
                        <form id="mktoForm_1102" class="modal-form"></form>
                        <script>MktoForms2.loadForm("//app-ab06.marketo.com", "661-RYF-836", 1102);</script> -->
                        <a class="close-reveal-modal">&#215;</a>
                    </div>
                    
                </div>
                <a class="exit-off-canvas"></a>
            </div>
        </div>
        <!-- Share this module-->
        <div id="ShareThisModule">
            <div class="share-icon show-for-large-up">
                <i class="fa fa-share-alt"></i>
                <b>SHARE</b>
            </div>
            <ul id="SharethisItems">
                <li><span class='st_facebook_custom' displayText='Facebook'><i class="fa fa-facebook"></i></span></li>
                <li><span class='st_twitter_custom' displayText='Tweet' st_via='GastricCancer' ><i class="fa fa-twitter"></i></span></li>
                <li><span class='st_linkedin_custom' displayText='LinkedIn' ><i class="fa fa-linkedin"></i></span></li>
                <li><span class='st_googleplus_custom' displayText='Email'><i class="fa fa-google-plus"></i></span></li>
            </ul>
        </div>
        <script type="text/javascript" src="/wp-content/themes/datatorrent/js/all.js"></script>
        <script type="text/javascript">$("#latest_events").find("li").css("float","left")</script>
        <?php wp_footer(); ?>
        <!-- Munchkin Code for Marketo begins-->
        <script type="text/javascript">
            (function() {
              var didInit = false;
              function initMunchkin() {
                if(didInit === false) {
                  didInit = true;
                  Munchkin.init('661-RYF-836');
                }
              }
              var s = document.createElement('script');
              s.type = 'text/javascript';
              s.async = true;
              s.src = '//munchkin.marketo.net/munchkin.js';
              s.onreadystatechange = function() {
                if (this.readyState == 'complete' || this.readyState == 'loaded') {
                  initMunchkin();
                }
              };
              s.onload = initMunchkin;
              document.getElementsByTagName('head')[0].appendChild(s);
            })();
        </script>
        <!-- Munchkin Code for Marketo ends -->
        <!-- Sharethis begin -->
            <script type="text/javascript">var switchTo5x=true;</script>
            <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">stLight.options({publisher: "4fdee5ba-c2d7-446c-8f7a-cf28f7fd1681", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        <!-- Sharethis ends -->
    </body>
</html>