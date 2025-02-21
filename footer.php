<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">

                <?php

                if (is_active_sidebar('constra_footer_left')) {
                    dynamic_sidebar('constra_footer_left');
                }

                if (is_active_sidebar('constra_footer_middle')) {
                    dynamic_sidebar('constra_footer_middle');
                }

                if (is_active_sidebar('constra_footer_right')) {
                    dynamic_sidebar('constra_footer_right');
                }
                ?>


            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright-info">
                        <span>Copyright &copy; <script>
                                document.write(new Date().getFullYear())
                            </script>, Designed &amp; Developed by <a href="https://themefisher.com">Themefisher</a></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer-menu text-center text-md-right">
                        <ul class="list-unstyled">
                            <li><a href="about.html">About</a></li>
                            <li><a href="team.html">Our people</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="news-left-sidebar.html">Blog</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- Row end -->

            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                </button>
            </div>

        </div><!-- Container end -->
    </div><!-- Copyright end -->
</footer><!-- Footer end -->

<?php wp_footer(); ?>

</div><!-- Body inner end -->
</body>

</html>