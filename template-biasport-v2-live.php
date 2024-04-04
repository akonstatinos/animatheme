<?php
/*
Template Name: BIA Sport V2 Live
*/
get_header();

?>


<!-- Start Main Body Area -->
    <!-- the-page -->
              
<div class="wrapper" id="wrapper-index">

	<div class="container-fullwidth " id="content-fullwidth" tabindex="-1">

		<main class="site-main" id="main">
			<!-- Start BIA Sportsbook -->
			<?php do_shortcode('[do_biasport_v2 page="live"]'); ?>
		</main><!-- #main -->

	</div>
</div>

<?php get_footer(); ?>
