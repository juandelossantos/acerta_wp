<?php
/**
 * Template Name: acerta_fabricante
 */
?>

<?php get_header(); ?>

	<div class="contenido margen-abajo">
      <?php 
	      global $post;
	      $categoria= get_the_category($post->ID);
      ?>
      <h1 class="tit1">
      	<?php echo get_the_title(); ?> </h1>
			<div class="contiene-productos">
				<div class="menu-productos"><!-- inicio menu que debe ser un side bar -->
          <?php include('menu-lat.php') ?>
        </div><!-- fin de menu que debe ser un side bar -->
				<div class="grid-productos">
					<div class="img-fabricante">
						<?php echo get_the_post_thumbnail($post->ID); ?>
					</div>
					
						
						
						
						<p>
            <?php 
                while ( have_posts() ): the_post();
                  the_content(); 
                endwhile;
              ?> 

            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
						
					
					
					</div>
				</div>
			</div>
    </div>

<?php get_footer(); ?>
