<?php
/*
Template Name: Betby Sport
*/
get_header();

?>


<!-- Start Main Body Area -->
    <!-- the-page -->

<div class="wrapper" id="wrapper-index">

        <div class="container-fullwidth " id="content-fullwidth" tabindex="-1">

                <main class="site-main" id="main">
                        <!-- Start Betby Sportsbook -->
                        <?php do_shortcode('[do_betby]'); ?>
                </main><!-- #main -->

        </div>
</div>

<?php get_footer(); ?>
