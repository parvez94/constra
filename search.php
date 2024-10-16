<?php get_header(); ?>

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <?php
                if (have_posts()) {
                ?>
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'constra'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h1>
                    </header>
                <?php

                    while (have_posts()) {
                        the_post();

                        get_template_part('template-parts/content', 'search');
                    }
                } else {
                    get_template_part('template-parts/content-none');
                }

                ?>

                <?php constra_pagination(); ?>

            </div><!-- Content Col end -->

            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->

<?php get_footer(); ?>