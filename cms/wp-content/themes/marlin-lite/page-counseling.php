<?php
/*
Template Name:相談室
*/
?>
<?php get_header(); ?>

<div class="counseling_main">
	<div class="inquiry_faq">
		<h1 class="inquiry_faqtitle"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png" class="edu_line2"><?php the_title(); ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png" class="edu_line2"></h1>
    </div>
    <div>
    <?php 
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) : the_post(); 
                the_content();
            endwhile;
        endif;
    ?>
    </div>
</div>
	
<?php get_footer(); ?>