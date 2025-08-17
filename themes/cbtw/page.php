<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

?>


	<div id="page-detail">
		<?php the_content();?>
	</div>

<?php
endwhile; // End of the loop.

get_footer();
