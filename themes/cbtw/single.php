<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

?>

	<div class="container">

		<?php get_template_part('partials/general/page-head'); ?>

		<div id="page-detail">
			<?php the_content();?>
		</div>
	</div>

<?php
endwhile; // End of the loop.

get_footer();