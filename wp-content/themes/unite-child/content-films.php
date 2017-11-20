<?php
/**
 * @package unite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">        
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    </header><!-- .entry-header -->
    
    <?php 
        $terms = get_the_terms($post->ID, 'country'); 
    ?>
    
    <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <div class="entry-content">
            Country:
            <?php foreach ($terms as $term): ?>
                <?php echo $term->name."; "; ?>
            <?php endforeach;?>
        </div>
    <?php endif; ?> 
    
    <?php 
        $terms = get_the_terms($post->ID, 'genres'); 
    ?>
    
    <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <div class="entry-content">
            Genres:
            <?php foreach ($terms as $term): ?>
                <?php echo $term->name."; "; ?>
            <?php endforeach;?>
        </div>
    <?php endif; ?> 
    
    <div class="entry-content">
        <?php 
            echo "Ticket Price: ".get_post_meta($post->ID, "ticket_price", true);
        ?>
    </div>
    
    <div class="entry-content">
        <?php 
            echo "Release Date: ".get_post_meta($post->ID, "release_date", true);
        ?>
    </div>
    
    <hr class="section-divider">
</article><!-- #post-## -->
