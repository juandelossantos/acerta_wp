<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="contenido margen-abajo">
		<div id="main" class="site-main" role="main">
		
				
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		<div class="menu-productos-derecha"><!-- inicio menu que debe ser un side bar -->
      <h3 class="tit3">Buscar Productos:</h3>
      <hr>
      <?php include('menu-lat.php') ?>
    </div>
		<div class="contiene-articulo">
		<?php  
		/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;
		?>	

		</div>	
		<div class="navega-articulos">	
		<?php
		
		// Previous/next post navigation.
		the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Siguiente', 'acerta' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Siguiente entrada:', 'acerta' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Anterior', 'acerta' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Entrada anterior:', 'acerta' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );	
		?>

		</div>
		<?php
		// End the loop.
		endwhile;
		?>
		
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		</div><!-- .site-main -->


<?php get_footer(); ?>




