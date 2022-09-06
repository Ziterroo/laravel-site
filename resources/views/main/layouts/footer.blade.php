<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="col-md-3 footer-links">
                <h4>Other pages and things</h4>
                <a href="#">Design a creative Blog</a>
                <a href="#">Design a iPad Website</a>
                <a href="#">Single Page sales portfolio </a>
                <a href="#">Flat product website in Photoshop</a>
                <a href="#">Design a creative Blog</a>
                <a href="#">Design a iPad Website</a>
                <a href="#">Single Page sales portfolio </a>
                <a href="#">Flat product website</a>
            </div>
            <div class="col-md-3 footer-links span_66">
                <a href="#">Flat product website in Photoshop</a>
                <a href="#">Design a creative Blog</a>
                <a href="#">Design a iPad Website </a>
            </div>
            <div class="col-md-3 footer-links">
                <h4>Relevant Articles</h4>
                <a href="#">Design a creative Blog</a>
                <a href="#">Design a iPad Website</a>
                <a href="#">Single Page sales portfolio </a>
                <a href="#">Flat product website</a>
                <a href="#">Design a creative Blog</a>
            </div>
            <div class="col-md-3 footer-links">
                <h4>Other pages and things</h4>
                <a href="#">Blaz Robar</a>
                <a href="#">Nick Toranto</a>
                <a href="#">Joisp Kelava</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyrights">
                <p>Konstructs © {{ date('Y') }} All rights reserved | Template by <a href="http://w3layouts.com"> W3layouts</a></p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/assets/main/js/main.js') }}"></script>
<script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<!-- script for menu -->
<script>
    $("span.menu").click(function () {
        $(".list-nav").slideToggle("slow", function () {
            // Animation complete.
        });
    });
</script>
<!-- script for menu -->
<script>
    $('.pages a').each(function () {
        let location = window.location.protocol + '//' + window.location.hostname + window.location.pathname;
        let link = this.href;
        if (link === location) {
            $(this).toggleClass('active');
        }
    });
</script>
</body>
</html>
