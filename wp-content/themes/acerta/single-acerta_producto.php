<?php
/**
 * Template Name: acerta_producto
 */
?>

<?php get_header(); ?>

	<div class="contenido margen-abajo">
      <?php
	      global $post;
	      $categoria= get_the_category($post->ID);
	      $breadcumb = '';
	      foreach ($categoria as $cat ) {
	      	$nombre=$cat->name;
	      	$id = $cat->cat_ID;
	      	$title = $cat->object_id;
	      	$breadcumb .= '<a href="'.get_category_link($id).'"> '.$nombre.' </a> &gt';
          $cat_sup_id = $cat->category_parent;
          $cat_sup_data = get_category($cat_sup_id);

	      }
        $cat_sup_slug = $cat_sup_data->slug;

      ?>
      <h1 class="breadcumb">
      	<?php echo $breadcumb. ' ' . '<a href="'.get_the_permalink($title).'"> '.get_the_title( $title ).' </a>'; ?> </h1>
			<div class="contiene-productos">
				<div class="menu-productos"><!-- inicio menu que debe ser un side bar -->
          <?php include('menu-lat.php') ?>
        </div><!-- fin de menu que debe ser un side bar -->
				<div class="grid-productos">
					<div class="img-producto-grande">
						<?php echo get_the_post_thumbnail($post->ID); ?>
					</div>
					<div class="datos-producto">
						<?php
							$ref = get_post_meta($post->ID, 'acerta_producto_ref', true);
							$desc = get_post_meta($post->ID, 'acerta_producto_esp', true);
							$fab = get_post_meta($post->ID, 'acerta_producto_fab', true);
							$id_fab = esc_attr($fab);
							$pdf = get_post_meta($post->ID, 'acerta_producto_pdf', true);
							$media = get_post_meta($post->ID, 'acerta_producto_media', true);
							$cod_video = substr($media, 16);
						?>
						<h2><?php the_title(); ?></h2>
						<h3>Ref: <?php echo esc_attr($ref); ?></h3>
						<h4>Especificaciones</h4>
						
							<?php echo $desc; ?>
						
						<h4>Fabricante</h4>
						<?php $link_fab = get_post_permalink($id_fab);?>
						<p><a href="<?php echo $link_fab; ?>"><?php echo get_the_post_thumbnail($id_fab);?></a></p>
            <?php
              global $wpdb;
              $contacto_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'contacto'");
            ?>
						<a href="<?php echo get_post_permalink($contacto_id); ?>" class="boton-grande boton-grande-inverso">Solicitar Información</a>
					</div>
					<div class="detalles-producto">
						<div class="contiene-tabs">
							<div class="tab-detalles-producto" id="info">Info</div>
							<div class="tab-detalles-producto" id="media" >Video</div>
							<div class="tab-detalles-producto" id="similar">Similar</div>
						</div>
						<div class="contiene-detalles-producto" id="detalle-info">
							<h2><?php echo esc_attr($ref); ?></h2>

							<?php
								while ( have_posts() ): the_post();
									the_content();
								endwhile;
							?>

							<h3>Manual</h3>
							<p><i class="fa fa-file-pdf-o fa-2x"></i>
								<?php echo '<a href="'.esc_url($pdf).'" target="_blank">Brochure</a>'; ?>
							</p>
						</div>
						<div class="contiene-detalles-producto" id="detalle-media">
							<div class="contiene-media">
								<iframe width="622" height="350" src="http://www.youtube.com/embed/<?php echo $cod_video; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="contiene-detalles-producto" id="detalle-similar">




          <?php
          	$cat_number = $cat_sup_id;
  				?>
          <?php $type = 'acerta_producto';
            $args=array(
              'post_type' => $type,
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'ignore_sticky_posts'=> 1,
              'category__in' => array( $cat_number ),
              'post__not_in' => array($post->ID)
            );

            $my_query = null;
            $my_query = new WP_Query($args);

            if( $my_query->have_posts() ) {
              while ($my_query->have_posts()) : $my_query->the_post();
              $post_cat = get_the_category($post->ID);
                ?>
                <?php
                  $post_cat_slug = array();
                    foreach($post_cat as $cat){
                      $post_cat_slug[] = $cat->slug;
                    }

                    $clase_cara_b = '';
                for($i = 0; $i < count($post_cat); $i++) {
                  if ($post_cat_slug[$i] === 'sol_ambiental') {
                        $clase_cara_b = 'ambiental';
                      } else if($post_cat_slug[$i] === 'sol_industrial'){
                          $clase_cara_b = 'industrial';
                        } else if($post_cat_slug[$i] === 'sol_metal'){
                          $clase_cara_b = 'metal';
                        }
                }

                $ref_similar = get_post_meta($post->ID, 'acerta_producto_ref', true);
              $desc_similar = get_post_meta($post->ID, 'acerta_producto_esp', true);
              $fab_similar = get_post_meta($post->ID, 'acerta_producto_fab', true);
              $id_fab_similar = esc_attr($fab_similar);


                ?>

                <div class="contiene-producto" ontouchstart="this.classList.toggle('hover');">
                <div class="producto">

                <div class="producto cara-a">
                <a href="<?php get_post_permalink($post->ID); ?>">
                  <?php
                  echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-producto')); ?>
                </a>
                <div class="nombre-cara-a">
                  <?php the_title(); ?>
                </div>
                <div class="referencia">
                  REF: <?php echo esc_attr($ref_similar);?>
                </div>
              </div>
              <div class="producto cara-b cara-b-<?php echo $clase_cara_b ?>">
                <div class="marca-cara-b">
                  <div class="logo-marca">
                    <?php echo get_the_post_thumbnail($id_fab_similar);?>
                  </div>
                </div>
                <div class="nombre-cara-b">
                  <?php echo esc_attr($ref_similar);?>
                </div>
                <div class="info">
                  <h4>Especificaciones</h4>
                  <?php echo $desc_similar; ?>
                  <a href="<?php the_permalink() ?>" rel="bookmark" class="ver-producto">Leer más</a>
                </div>
              </div>

            </div>
            </div>

                <?php
              endwhile;
            }
            wp_reset_query();  // Restore global post data stomped by the_post().
          ?>















						</div><!--fin contiene productos similares -->
					</div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
				</div>
			</div>
    </div>

<?php get_footer(); ?>
