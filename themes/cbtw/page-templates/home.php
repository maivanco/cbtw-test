<?php
/** Template Name: CBTW Homagepage  */
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>


    <div id="page-detail">

        <?php get_template_part('components/banner', null, [
            'heading_class' => 'h1',
            'title' => 'Catchy Banner Headline',
            'description' => '[Short, compelling sub-headline or description for the banner.]',
            'button_text' => '[Banner CTA Button]',
            'button_url' => '#',
            'banner_border_radius' => false,
        ]); ?>


        <div class="container">
            <div class="page-wrapper bg-white border-radius">
                <?php the_content();?>

                <?php get_template_part('components/banner', null, [
                    'title' => '[Call to Action Headline]',
                    'description' => '[Brief description for the call to action]',
                    'button_text' => '[CTA Button Text]',
                    'button_url' => '#',
                    'banner_border_radius' => true,
                    'banner_size' => 'small',
                ]); ?>

            </div>
           
        </div>
    

       
    </div>

<?php
endwhile; // End of the loop.

get_footer();
