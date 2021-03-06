<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */
get_header();
?>

<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option('site_layout'); ?>">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_description('<h1 class="page-title">', '</h1>');
//                /the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </header><!-- .page-header -->

            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('content-films', get_post_format());
                ?>

                <div class="entry-content">
                    <?php
                    echo "Countries: " . $post->country;
                    ?>
                </div>

                <div class="entry-content">
                    <?php
                    echo "Genres: " . $post->genres;
                    ?>
                </div>

                <div class="entry-content">
                    <?php
                    echo "Ticket Price: " . $post->ticket_price;
                    ?>
                </div>

                <div class="entry-content">
                    <?php
                    echo "Release Date: " . $post->release_date;
                    ?>
                </div>

                <hr class="section-divider">
            <?php endwhile; ?>

            <?php unite_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part('content', 'none'); ?>

        <?php endif; ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
