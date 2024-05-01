</div>
<footer class="short" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h4>Information</h4>
                 <p><?= $aboutFooter ?><a href="<?= $aboutUrl ?>" class="btn-flat btn-xs">See more <i class="fa fa-arrow-right" /></a></p><hr class="light">
                <div class="row">
                    <div class="col-md-3">
                        <h5><?= $footerMenu[12]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[0]['menu_url'] ?>"><?= $footerMenu[0]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[1]['menu_url'] ?>"><?= $footerMenu[1]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[2]['menu_url'] ?>"><?= $footerMenu[2]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $footerMenu[13]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[3]['menu_url'] ?>"><?= $footerMenu[3]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[4]['menu_url'] ?>"><?= $footerMenu[4]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[5]['menu_url'] ?>"><?= $footerMenu[5]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $footerMenu[14]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[6]['menu_url'] ?>"><?= $footerMenu[6]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[7]['menu_url'] ?>"><?= $footerMenu[7]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[8]['menu_url'] ?>"><?= $footerMenu[8]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $footerMenu[15]['menu_name'] ?></h5>
                        <ul class="list icons list-unstyled">
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[9]['menu_url'] ?>"><?= $footerMenu[9]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[10]['menu_url'] ?>"><?= $footerMenu[10]['menu_name'] ?></a></li>
                            <li><i class="fa fa-caret-right"></i> <a href="<?= $footerMenu[11]['menu_url'] ?>"><?= $footerMenu[11]['menu_name'] ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>

             <div class="">
              <h5 class="short">CONTACT US</h5>
                 <span class="phone"><?= $phone ?></span>
                 <p class="short">Secondary phone number: <?= $phone2 ?></p>
                 <ul class="list icons list-unstyled push-top">
                     <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> <?= $contactAddress ?></li>
                     <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?= $contactEmail ?>"><?= $contactEmail ?> </a></li>
                 </ul>
                <div class="social-icons push-top">
                    <ul class="social-icons">
                        <li class="facebook"><a href="<?= $contactFacebook ?>" target="_blank" data-placement="bottom" data-tooltip title="Facebook">Facebook</a></li>
                        <li class="twitter"><a href="<?= $contactTwitter ?>" target="_blank" data-placement="bottom" data-tooltip title="Twitter">Twitter</a></li>
                        <li class="linkedin"><a href="<?= $contactLinkedin ?>" target="_blank" data-placement="bottom" data-tooltip title="Linkedin">Linkedin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <p>© Copyright <script>
                        document.write(new Date().getFullYear().toString())
                    </script> - MW Jewels .</p>
            </div>
        </div>
    </div>
</footer>   
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '517386205818335',
            xfbml: true,
            version: 'v6.0'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        let js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/vi_VN/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="public/vendor/jquery/jquery.js"></script>
<script src="public/vendor/jquery.appear/jquery.appear.js"></script>
<script src="public/vendor/jquery.easing/jquery.easing.js"></script>
<script src="public/vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="public/vendor/bootstrap/bootstrap.min.js"></script>
<script src="public/vendor/common/common.js"></script>
<script src="public/vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="public/vendor/jquery.stellar/jquery.stellar.js"></script>
<script src="public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="public/vendor/jquery.gmap/jquery.gmap.js"></script>
<script src="public/vendor/isotope/jquery.isotope.js"></script>
<script src="public/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="public/vendor/jflickrfeed/jflickrfeed.js"></script>
<script src="public/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="public/vendor/vide/vide.js"></script>
<script src="public/js/theme.min.js"></script>
<script src="public/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="public/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="public/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="public/js/views/view.home.js"></script>
<script src="public/js/custom.js"></script>
<script src="public/js/theme.init.js"></script>
<script src="public/js/comment/ajax.js"></script>
</body>

</html>