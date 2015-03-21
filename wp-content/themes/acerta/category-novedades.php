<?php
/**
* category-novedades.php
*
* Plantilla de la pagina de entradas por categoria novedaes que es el blog de la página.
*/
?>

<?php get_header(); ?>
<?php
  $cat = get_query_var('cat');
  $category = get_category($cat);
  $thisCat = get_category($category->term_id,false);
  $cat_number = $category->term_id;
  $cat_name = $category->name;
?>
  <div id="content" class="contenido margen-abajo">
    <h1 class="tit1"><?php echo $cat_name; ?></h1>
    <div class="menu-productos-derecha1"><!-- inicio menu que debe ser un side bar -->
          <h3 class="tit3">Buscar Productos:</h3>
          <hr>
          <?php include('menu-lat.php') ?>
        </div>
    <div class="contiene-productos">
        
        <div class="grid-productos">
        <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

  <?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

      <div class="item-novedades">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_excerpt(__('Continue reading »','example')); ?></div>
        <div class="enlace-item">
          <a href="<?php the_permalink(); ?>" class="boton-peq">Leer más</a>
        </div>
      </div><!-- /#post-<?php get_the_ID(); ?> -->

        <?php endwhile; ?>

    <div class="navigation">
      <?php alpha_paging_nav(); ?>
    </div><!-- /.navigation -->

  <?php else: ?>

    <div id="post-404" class="noposts">

        <p><?php _e('No encontramos lo que buscabas.','example'); ?></p>

      </div><!-- /#post-404 -->

  <?php endif; wp_reset_query(); ?>

  </div><!-- /#content -->
  <p>&nbsp;</p>
    <p>&nbsp;</p>
    
</div>
</div>
<?php get_footer(); ?>