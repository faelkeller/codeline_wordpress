<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */
get_header();
?>
<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option('site_layout'); ?>">
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content-films', 'single'); ?>
        <?php endwhile; // end of the loop. ?>


        <?php
        $terms = get_the_terms($post->ID, 'country');
        ?>

        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
            <div class="entry-content">
                Country:
                <?php foreach ($terms as $term): ?>
                    <?php echo $term->name . "; "; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> 

        <?php
        $terms = get_the_terms($post->ID, 'genres');
        ?>

        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
            <div class="entry-content">
                Genres:
                <?php foreach ($terms as $term): ?>
                    <?php echo $term->name . "; "; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> 

        <div class="entry-content">
            <?php
            echo "Ticket Price: " . get_post_meta($post->ID, "ticket_price", true);
            ?>
        </div>

        <div class="entry-content">
            <?php
            echo "Release Date: " . get_post_meta($post->ID, "release_date", true);
            ?>
        </div>
        
        <hr class="section-divider">
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>