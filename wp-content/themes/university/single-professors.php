<?php
/**
 * The template for displaying all single programs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header();

/* Start the Loop */
while (have_posts()):
    the_post();
    ?>

    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <h1><?php the_title(); ?></h1>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; // End of the loop.

get_footer();