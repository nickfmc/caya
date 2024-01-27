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
$id = 'c-workshop-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-workshop-grid';
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
    'post_type'      => 'workshop_type',
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
        <div class="c-workshop-card">
            <div class="c-workshop-card-inner">
                <div class="c-workshop-card-img">
                    <?php the_post_thumbnail('large');?>
                </div>
                <div class="c-workshop-card-content">
                    <?php echo '<h4>'. get_the_title() .'</h4>'; ?>
                    <?php if( get_field('speaker', get_the_ID()) ) { echo '<h6>Speakers:</h6><p>' . get_field('speaker', get_the_ID()) . '</p>'; }?>
                    <h6>When:</h6>
                    <?php if( get_field('when', get_the_ID()) ) { echo '<p>' . get_field('when', get_the_ID()) . '</p>'; }else {
                        echo '<p>' . get_field('month', get_the_ID()) . ', exact dates/time TBD</p>';
                    }?>
                    <h6>Where:</h6>
                    <?php if( get_field('location', get_the_ID()) ) { echo '<p>' . get_field('location', get_the_ID()) . '</p>'; }?>
                    <h6>Cost:</h6>
                    <?php if( get_field('cost', get_the_ID()) ) { echo '<p>' . get_field('cost', get_the_ID()) . '</p>'; }?>
                    <div class="c-btn-primary mt-8 mb-0"><a href="#">Register</a></div>
                </div>
                
            </div>

        </div>
    <?php }
} else {
    echo "<h3>There currently aren't any scheduled workshops, please check back soon. </h3>";
    // No posts found
}

// Restore original Post Data
wp_reset_postdata();
?>

</div>
