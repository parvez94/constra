<?php
the_post();
get_header();
?>

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">

                <?php get_template_part('template-parts/content', 'page'); ?>

            </div><!-- Content Col end -->
            <div class="col-lg-4">

                <?php get_sidebar(); ?>
            </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Conatiner end -->
</section><!-- Main container end -->

<?php get_footer(); ?>