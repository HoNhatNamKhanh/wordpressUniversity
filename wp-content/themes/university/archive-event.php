<?php
/*
Template Name: Event Page
*/

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_archive_title(); ?></h1>
        <div class="page-banner__intro">
            <p><?php the_archive_description(); ?></p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    // Thực hiện truy vấn WP_Query cho các bài viết loại 'event'
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 10, // Hiển thị 10 sự kiện mỗi trang
        'paged' => get_query_var('paged', 1), // Xử lý phân trang
        'order' => 'DESC',
        'orderby' => 'date'
    );
    $events_query = new WP_Query($args);

    if ($events_query->have_posts()) {
        while ($events_query->have_posts()) {
            $events_query->the_post(); ?>
    <div class="post-item">
        <h2 class="headline headline--medium headline--post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="metabox">
            <p>
                Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?>
                <?php
                        // Hiển thị danh sách các category nếu có
                        $categories = get_the_terms(get_the_ID(), 'event_category');
                        if ($categories && !is_wp_error($categories)) {
                            $categories_list = array();
                            foreach ($categories as $category) {
                                $categories_list[] = $category->name;
                            }
                            echo 'in ' . join(', ', $categories_list);
                        }
                        ?>
            </p>
        </div>

        <div class="generic-content">
            <?php the_excerpt(); ?>
            <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
        </div>
    </div>
    <?php }
    } else {
        echo '<p>No upcoming events found.</p>';
    }
    wp_reset_postdata(); // Reset post data sau khi truy vấn tùy chỉnh
    ?>

    <div class="pagination">
        <?php echo paginate_links(array(
            'total' => $events_query->max_num_pages
        )); ?>
    </div>
</div>

<?php get_footer(); ?>