<div class="section section-footer-dark padding-bottom-16">
    <div class="container margin-bottom">

      <div class="col lg-3 md-12 md-order-first">
        <img src="<?= base_url();?>/public/images/DigitalStory-ID_logo_white.png" alt="">
      </div>
      <div class="col lg-7 md-12 no-margin-bottom">
        <div class="container container-nested">
          <div class="col lg-4 md-12">
            <h4>Products</h4>
            <a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Features</a>
            <a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Pricing</a>
            <a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Technical Support</a>
          </div>
          <div class="col lg-4 md-12">
            <h4>Company</h4>
            <a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">About us</a>
            <a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Our team</a>
            <a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Career</a>
          </div>
          <div class="col lg-4 md-12 no-margin-bottom">
            <h4>Let&#x27;s connect</h4><a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Instagram</a><a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Facebook</a><a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Twitter</a><a id="Footer-Nav-Link" href="#" class="footer-nav-link on-dark">Youtube</a></div>
        </div>
      </div>

    </div>
    <div class="container">
      <div class="col lg-12 margin-bottom">
        <div class="hr"></div>
      </div>
    </div>
    <div class="container">
      <div class="col lg-6 no-margin-bottom md-12 md-order-last">
        <div class="low-text-contrast text-small flexh-space-between md-flex-vertical">
          <div class="md-order-last">©2019 DigitalStory. All rights reserved. </div><a href="#" class="footer-bottom-link">Privacy Policy</a><a href="#" class="footer-bottom-link">Term Of Service</a></div>
      </div>
      <div class="col lg-6 no-margin-bottom md-12">
        <div class="w100 text-align-right footer-bottom md-text-align-left margin-bottom">Jakarta, Indonesia</div>
      </div>
    </div>
  </div>
 
  
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="<?= base_url();?>/public/js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <script>
    var Webflow = Webflow || [];
    Webflow.push(function () {
      // DOMready has fired
      // May now use jQuery and Webflow api
// start everything
      var tabTimeout;
      clearTimeout(tabTimeout);
      tabLoop();
    // define loop - cycle through all tabs
    function tabLoop() {
        tabTimeout = setTimeout(function() {
            var $next = $('.c-tabslider1__tab-menu').children('.w--current:first').next();
            if($next.length) {
                $next.click();  // click resets timeout, so no need for interval
            } else {
                $('.c-tabslider1__tab-link:first').click();
            }
        }, 2000);  // 2 second tab loop
    }
    // reset timeout if a tab is clicked
    $('.c-tabslider1__tab-link').click(function() {
        clearTimeout(tabTimeout);
        tabLoop();
        });
    });
</script>
</body>
</html>