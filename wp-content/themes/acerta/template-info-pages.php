<?php
/**
* template-info-pages.php
*
* Template Name: Información estática
*/
?>

<?php get_header(); ?>

  <div class="contenido margen-abajo" role="main">
    <?php while( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- header del Artículo -->
        <header class="entry-header"> <?php
          // Si la entrada tiene imagen (thumbnail) y si no esta protegida
          // por contraseña, entonces muestre la imagen
          if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
          <?php endif; ?>
          
          
          
      
        </header><!-- fin del header de un articulo -->
        <?php 
          if( is_page( 'Nosotros' ) ) {
            $imagen = get_option( 'acerta_nosotros_img' );
            echo '<img src="'.$imagen.'" alt="Imagen" class="img-top"';
          } else if ( is_page( 'Servicio' ) ){
            $imagen = get_option( 'acerta_servicios_img' );
            echo '<img src="'.$imagen.'" alt="Imagen" class="img-top"';
          }
        ?>
        
        <!-- contenido del articulo -->
        <div>
          <h1 class="tit1">
            <?php the_title(); ?>
          </h1>

          <?php the_content(); ?>
          <?php wp_link_pages(); ?>
        
        <div class="edita">
          <?php
            if ( is_user_logged_in() ) {
              echo '<p>';
              edit_post_link( __( 'Edit',  'alpha' ), '<span class="meta-edit">', '</span>' );
              echo '</p>';
            }
          ?>
        </div>
        </div><!-- fin contenido del articulo -->
        <!-- footer de la entrada -->
        
      </article>

      
      
    <?php endwhile; ?>
  </div><!-- fin de main-content -->

<?php get_footer(); ?>