<?php
/**
* search.php
*
* Plantilla de la pagina de resultado de búsqueda.
*/
?>

<?php get_header('productos'); ?>
  <div class="contenido margen-abajo" role="main">
    <?php if ( have_posts() ) :  ?>
      <div>
        <h1 class="tit1">
          <?php
            printf( __( 'Resultados de búsqueda para:  %s', 'alpha' ), get_search_query() );
          ?>
        </h1>
        
      </div>
      <div class="contiene-productos">
        <div class="menu-productos">
          <?php include('menu-lat.php'); ?>
        </div>
        
      </div>
      <?php while( have_posts() ) : the_post(); ?>
        <?php get_template_part('content', get_post_format() ); ?>
      <?php endwhile; ?>

      <?php alpha_paging_nav(); ?>

    <?php else : ?>
      <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  

  </div><!-- fin de main-content -->
  
<?php get_footer('productos'); ?>
