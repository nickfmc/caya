  <div class="c-pre-footer">
    <div class="o-wrapper-wide">
    <p><a href="/services/medical-services/">Medical</a> | <a href="/services/counselling-services/">Counselling</a> | <a href="/services/dietitian-services/">Dietitian</a> | <a href="/services/physiotherapy-pelvic-floor/">Pelvic Floor Physiotherapy</a> | <a href="/services/physiotherapy-pelvic-floor/">Physiotherapy</a> | <a href="/services/massage-therapy/">Massage Therapy</a> </p>
<p class="c-pre-footer-tag">Healthcare for all women, all trans, and all non-binary individuals.</p>
    </div>
  </div>
  <footer class="o-section c-page-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="c-footer-main">
      <div class="o-wrapper-wide">
      <div class="grid-x">
          <div class="cell  medium-6 large-3 c-footer-cell-one">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
              <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php endif; ?>
          </div> 
          <div class="cell  medium-6 large-3 c-footer-cell-two">
          <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
            <?php dynamic_sidebar( 'footer-2' ); ?>
          <?php endif; ?>
          </div>
          <div class="cell  medium-6 large-3">
          <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
            <?php dynamic_sidebar( 'footer-3' ); ?>
          <?php endif; ?>
          </div>

          <div class="cell  medium-6 large-3">
          <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
            <?php dynamic_sidebar( 'footer-4' ); ?>
          <?php endif; ?>
          </div>
     
        </div>
        <!-- /.c-footer-widgets -->

      </div>
      <!-- /.o-wrapper-wide -->
    </div>
    <div class="c-footer-lower">
      <div class="o-wrapper-wide">
      &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
      </div>
    </div>
  </footer>
  <!-- /.c-page-footer -->

  <?php get_template_part( 'template-part/navigation/nav-modal' ); ?>

  <!-- all js scripts are loaded in lib/gdt-enqueues.php -->
  <?php wp_footer(); ?>

</body>
</html>
