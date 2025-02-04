<?php
/*
Template Name: Program Page
*/

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>Explore our amazing programs!</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    // Query để lấy các bài viết loại 'program'
    $args = array(
        'post_type' => 'professors',
        'posts_per_page' => 10, // Hiển thị 10 chương trình mỗi trang
        'paged' => get_query_var('paged', 1), // Xử lý phân trang
        'order' => 'DESC',
        'orderby' => 'date'
    );
    $programs_query = new WP_Query($args);

    if ($programs_query->have_posts()) {
        while ($programs_query->have_posts()) {
            $programs_query->the_post(); ?>
            <div class="post-item">
                <h2 class="headline headline--medium headline--post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <div class="metabox">
                    <p>
                        Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?>
                    </p>
                </div>

                <div class="generic-content">
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
                </div>
            </div>
        <?php }
    } else {
        echo '<p>No programs found.</p>';
    }
    wp_reset_postdata(); // Reset post data sau khi truy vấn tùy chỉnh
    ?>

    <div class="pagination">
        <?php echo paginate_links(array(
            'total' => $programs_query->max_num_pages
        )); ?>
    </div>
</div>

<?php get_footer(); ?>