<?php get_header(); ?>

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <?php

        if (have_posts()) {
          while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_format());
          }
        }

        ?>

        <!-- Pagination -->
        <?php constra_pagination(); ?>

      </div><!-- Content Col end -->

      <div class="col-lg-4">
        <?php get_sidebar(); ?>
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

<?php get_footer(); ?>