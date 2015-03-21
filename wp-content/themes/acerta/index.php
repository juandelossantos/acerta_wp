<?php
/**
* index.php
*
* El archivo principal de la plantilla.
*/
?>
<?php get_header(); ?>

  <div class="main-content col-md-8">
    <?php // el bucle de wordpress para cargar caontenido (Worpress loop) ?>
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; ?>
    <?php alpha_paging_nav(); ?>
    <?php else: ?>
        <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
  </div><!-- fin de main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>