<?php

/**
 * blockname Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'c-news-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-news-grid';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}


?>

 
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  ">

<?php
// WP_Query arguments
$args = array(
    'post_type'      => 'news_type',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => -1, // Get all posts
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();?>
        <div class="c-news-card">
            <div class="c-news-card-image">
                <?php the_post_thumbnail('large');?>
            </div>
            <div class="c-news-card-content">
            <h2> <?php echo get_the_title();?> </h2>

                <p>
            <time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished"><?php the_time('M Y'); ?></time>
            <?php if( get_field('article_description', get_the_ID()) ) { echo  get_field('article_description', get_the_ID()); }?>
            </p> 
            <?php if( get_field('article_type', get_the_ID()) == "Article" ) { echo '<div class="c-btn-primary"><a target="_blank" href="' . get_field('url', get_the_ID()) . '">Read Article</a></div>'; }?>
            <?php if( get_field('article_type', get_the_ID()) == "Audio" ) {

$file = get_field('audio_file', get_the_ID());
if( $file ): ?>
 <audio controls>
  <source src="<?php echo $file['url']; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 

<?php endif; ?>
                 
                 <?php }?>

            <?php if( get_field('article_type', get_the_ID()) == "Video" ) { echo '<div class="c-btn-primary"><a target="_blank" href="' . get_field('url', get_the_ID()) . '">Watch Video</a></div>'; }?>

            

        
            </div>
            

        </div>
    <?php }
} else {
    // No posts found
}

// Restore original Post Data
wp_reset_postdata();
?>

</div>
