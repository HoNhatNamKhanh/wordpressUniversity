<?php
/**
 * Template for displaying all single events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<?php
/* Start the Loop */
while (have_posts()):
    the_post(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p><?php the_excerpt(); ?> HAHAHA</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="event-details">
        <h2 class="headline headline--medium"><?php the_title(); ?></h2>

        <div class="event-meta">
            <p>
                Date: <?php echo get_post_meta(get_the_ID(), 'event_date', true); ?><br>
                Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?>
            </p>
        </div>

        <div class="event-content">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>