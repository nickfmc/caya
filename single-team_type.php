<?php get_header(); ?>

<div class="o-layout-row">
  <main class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
  <section class="editor-content  clearfix">  
    <div class="alignfull c-team-hero"></div>
    <div class="o-wrapper-wide pt-12">
      <div class="c-team-member-bio">
        <div class="c-team-member-bio-img"><?php the_post_thumbnail('large');?></div>
        <div class="c-team-member-bio-details">
          <div>
            <h1><?php the_title();?><?php if( get_field('pronouns') ) { echo '<span> (' . get_field('pronouns') . ')</span>'; }?></h1>
            <?php if( get_field('co-founder') ) { echo '<h5>Co-founder</h5>'; }?>
            <h4><?php
                $terms = get_the_terms( get_the_ID(), 'areaofpractice_tax' );
                if ( $terms && ! is_wp_error( $terms ) ) :
                  foreach ( $terms as $term ) {
                    echo esc_html( $term->name ) . '<br>';
                  }
                endif;
                ?></h4>
                
             
            <?php if( have_rows('services') ): ?>
                  <h5>Services:</h5>
                  <ul>
                 <?php while( have_rows('services') ): the_row(); ?>
                <li>
                <?php echo get_sub_field('service'); ?>
                </li>
                <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            
            <?php if( have_rows('availability') ): ?>
                  <h5>Availability:</h5>
                  <ul>
                 <?php while( have_rows('availability') ): the_row(); ?>
                <li>
                <?php echo get_sub_field('day_&_time'); ?>
                </li>
                <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php if( have_rows('areas_of_practice') ): ?>
                  <h5>Areas of Practice:</h5>
                  <ul>
                 <?php while( have_rows('areas_of_practice') ): the_row(); ?>
                <li>
                <?php echo get_sub_field('area'); ?>
                </li>
                <?php endwhile; ?>
                </ul>
                <?php endif; ?>
          </div>

              <div class="c-btn-primary">
                <?php if( get_field('janeapp_url') ) { echo '<div class="c-btn-primary"><a target="_blank" href="' . get_field('janeapp_url') . '">Book with '. get_the_title().' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5H8.2c-1.12 0-1.68 0-2.108.218a1.999 1.999 0 0 0-.874.874C5 6.52 5 7.08 5 8.2v7.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h7.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.987.218-2.105V14m1-5V4m0 0h-5m5 0l-7 7"/></svg></a></div>'; }?>
              </div>

        </div>
      </div>
    </div>
    
  <div class="c-team-bio-full">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- /article-header -->
        <article <?php post_class(); ?> role="article">
        <h2>A Bit About Me</h2>
          <?php the_content(); ?>


        </article>
      <?php endwhile; ?>

      <?php if( have_rows('education') ): ?>
      <h5 class="mt-8">Education & Certifications</h5>
       <?php while( have_rows('education') ): the_row(); ?>
      <div class="c-staff-education-item">
       <?php echo get_sub_field('education_highlight'); ?>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
  
      <?php else : ?>
        <?php get_template_part( 'template-part/post/not-found' ); ?>
      <?php endif; ?>
  </div>

</section>
<div class="gb-shape gb-shape-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 194.3" preserveAspectRatio="none"><path d="M1200 133.3l-50 8.9c-50 8.6-150 26.9-250 31.1-100 4.2-200-4.2-300-26.7S400 89.2 300 62.2C200 35.8 100 17.5 50 8.9L0 0v194.3h1200v-61z"></path></svg></div>




  <?php
$term = get_term_by('name', 'Registered Clinical Counsellor', 'areaofpractice_tax');
$term_ids = array($term->term_id);

$child_terms = get_terms(array(
    'taxonomy' => 'areaofpractice_tax',
    'child_of' => $term->term_id,
    'hide_empty' => false,
));

foreach ($child_terms as $child_term) {
    $term_ids[] = $child_term->term_id;
}

if (has_term($term_ids, 'areaofpractice_tax')): ?>


  <!-- Check if the post has the term 'Registered Clinical Counsellor' in the 'areaofpractice_tax' taxonomy -->
<div class="c-team-cta">
  <div class="o-wrapper-wide">
  <h2>Book an Appointment</h2>
  <p class="has-large-font-size">Finding the right fit is important. All of our counsellors offer an initial free 15-minute consultation. Click below to book today!</p>
  <div class="c-btn-primary">
                <?php if( get_field('janeapp_url') ) { echo '<div class="c-btn-primary c-btn-primary-inverse"><a target="_blank" href="' . get_field('janeapp_url') . '">Book with '. get_the_title().' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5H8.2c-1.12 0-1.68 0-2.108.218a1.999 1.999 0 0 0-.874.874C5 6.52 5 7.08 5 8.2v7.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h7.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.987.218-2.105V14m1-5V4m0 0h-5m5 0l-7 7"/></svg></a></div>'; }?>
              </div>
  </div>
  
</div>
<?php endif; ?>


<?php
$term = get_term_by('name', 'Registered Dietitian', 'areaofpractice_tax');
$term_ids = array($term->term_id);

$child_terms = get_terms(array(
    'taxonomy' => 'areaofpractice_tax',
    'child_of' => $term->term_id,
    'hide_empty' => false,
));

foreach ($child_terms as $child_term) {
    $term_ids[] = $child_term->term_id;
}

if (has_term($term_ids, 'areaofpractice_tax')): ?>
<div class="c-team-cta">
  <div class="o-wrapper-wide">
  <h2>Book an Appointment</h2>
  <p class="has-large-font-size">Finding the right fit is important. All of our dietitians offer an initial free 15-minute consultation. Click below to book today!</p>
  <div class="c-btn-primary">
                <?php if( get_field('janeapp_url') ) { echo '<div class="c-btn-primary c-btn-primary-inverse"><a target="_blank" href="' . get_field('janeapp_url') . '">Book with '. get_the_title().' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5H8.2c-1.12 0-1.68 0-2.108.218a1.999 1.999 0 0 0-.874.874C5 6.52 5 7.08 5 8.2v7.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h7.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.987.218-2.105V14m1-5V4m0 0h-5m5 0l-7 7"/></svg></a></div>'; }?>
              </div>
  </div>
  
</div>
<?php endif; ?>


<?php
$terms_to_check = array('Registered Massage Therapist', 'Body Worker');
$term_ids = array();

foreach ($terms_to_check as $term_name) {
    $term = get_term_by('name', $term_name, 'areaofpractice_tax');
    if ($term) {
        $term_ids[] = $term->term_id;

        $child_terms = get_terms(array(
            'taxonomy' => 'areaofpractice_tax',
            'child_of' => $term->term_id,
            'hide_empty' => false,
        ));

        foreach ($child_terms as $child_term) {
            $term_ids[] = $child_term->term_id;
        }
    }
}

if (has_term($term_ids, 'areaofpractice_tax')): ?>
<div class="c-team-cta">
  <div class="o-wrapper-wide">
  <h2>Book an Appointment</h2>
  <p class="has-large-font-size">Click below to book massage therapy in Vancouver today!</p>
  <div class="c-btn-primary">
                <?php if( get_field('janeapp_url') ) { echo '<div class="c-btn-primary c-btn-primary-inverse"><a target="_blank" href="' . get_field('janeapp_url') . '">Book with '. get_the_title().' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5H8.2c-1.12 0-1.68 0-2.108.218a1.999 1.999 0 0 0-.874.874C5 6.52 5 7.08 5 8.2v7.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h7.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.987.218-2.105V14m1-5V4m0 0h-5m5 0l-7 7"/></svg></a></div>'; }?>
              </div>
  </div>
  
</div>
<?php endif; ?>

<?php
$terms_to_check = array('Registered Physiotherapist', 'Pelvic Health Physiotherapist');
$term_ids = array();

foreach ($terms_to_check as $term_name) {
    $term = get_term_by('name', $term_name, 'areaofpractice_tax');
    if ($term) {
        $term_ids[] = $term->term_id;

        $child_terms = get_terms(array(
            'taxonomy' => 'areaofpractice_tax',
            'child_of' => $term->term_id,
            'hide_empty' => false,
        ));

        foreach ($child_terms as $child_term) {
            $term_ids[] = $child_term->term_id;
        }
    }
}

if (has_term($term_ids, 'areaofpractice_tax')): ?>
<div class="c-team-cta">
  <div class="o-wrapper-wide">
  <h2>Book an Appointment</h2>
  <p class="has-large-font-size">Click below to book physiotherapy in Vancouver today!</p>
  <div class="c-btn-primary">
                <?php if( get_field('janeapp_url') ) { echo '<div class="c-btn-primary c-btn-primary-inverse"><a target="_blank" href="' . get_field('janeapp_url') . '">Book with '. get_the_title().' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5H8.2c-1.12 0-1.68 0-2.108.218a1.999 1.999 0 0 0-.874.874C5 6.52 5 7.08 5 8.2v7.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h7.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.987.218-2.105V14m1-5V4m0 0h-5m5 0l-7 7"/></svg></a></div>'; }?>
              </div>
  </div>
  
</div>
<?php endif; ?>




  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>
