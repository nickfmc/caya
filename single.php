<?php get_header(); ?>

<div class="o-layout-row">
  <main id="main-content" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
  <section class="editor-content  clearfix">  
    <div class="o-wrapper-wide pt-12">
    <div class="c-single-premeta">
    <div><a href="/blog"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Pro 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc.--><path d="M12.7 244.7L1.4 256l11.3 11.3 168 168L192 446.6 214.6 424l-11.3-11.3L62.6 272 432 272l16 0 0-32-16 0L62.6 240 203.3 99.3 214.6 88 192 65.4 180.7 76.7l-168 168z"/></svg> Back to blog</a></div>

      <div><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Pro 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc.--><path d="M480 256A224 224 0 1 1 32 256a224 224 0 1 1 448 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM240 112V256c0 5.3 2.7 10.3 7.1 13.3l96 64c7.4 4.9 17.3 2.9 22.2-4.4s2.9-17.3-4.4-22.2L272 247.4V112c0-8.8-7.2-16-16-16s-16 7.2-16 16z"/></svg> <?php echo do_shortcode('[maw_reading_time postfix="min read"]'); ?></div>
    </div>
    </div>
    
  <div class="c-blog-single-inner">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <header class="c-article-header">
          <?php get_template_part( 'template-part/post/entry-meta' ); ?>
        </header>
        <!-- /article-header -->
        <article <?php post_class(); ?> role="article">
        <h1><?php the_title();?></h1>
          <?php the_content(); ?>

          <!-- AddToAny BEGIN -->
          <div class="c-social-share">
          <span>Share this post:</span>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            
            <div>
              <a class="a2a_button_facebook"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
                        <a class="a2a_button_x"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
              <a class="a2a_button_linkedin"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/></svg></a>
              <a class="a2a_button_email"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg></a>
              <script async src="https://static.addtoany.com/menu/page.js"></script>
            </div>

            </div>
           
          </div>
<!-- AddToAny END -->
        </article>
      <?php endwhile; ?>
        <?php get_template_part( 'template-part/post/post-nav' ); ?>
      <?php else : ?>
        <?php get_template_part( 'template-part/post/not-found' ); ?>
      <?php endif; ?>
  </div>
</section>
  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>
