<?php
/**
* category.php
*
* Plantilla de la pagina de entradas por categoria.
*/
?>

<?php get_header('producto'); ?>
<?php 
  $obj = get_post_type_object('acerta_producto' );
  $cat = get_query_var('cat');
  $category = get_category($cat);
  $thisCat = get_category($category->term_id,false);
  $cat_number = $category->term_id;
  $cat_name = $category->name;
?>
<div class="contenido margen-abajo" role="main">
  <div class="contiene-slider-productos"><!-- slider productos -->
    <div id="ei-slider" class="ei-slider">
      <ul class="ei-slider-large">
        <li>
          <img src="<?php echo get_option('acerta_grande_img1'); ?>" alt="Soluciones Metalmecánicas">
          <div class="ei-title">
            <h2><?php echo get_option('acerta_palabra1_img1'); ?></h2>
            <h3><?php echo get_option('acerta_palabra2_img1'); ?></h3>
          </div>
        </li>
        <li>
          <img src="<?php echo get_option('acerta_grande_img2'); ?>" alt="Soluciones Ambientales">
          <div class="ei-title">
            <h2><?php echo get_option('acerta_palabra1_img2'); ?></h2>
            <h3><?php echo get_option('acerta_palabra2_img2'); ?></h3>
          </div>
        </li>
        <li>
          <img src="<?php echo get_option('acerta_grande_img3'); ?>" alt="Soluciones Industriales">
          <div class="ei-title">
            <h2><?php echo get_option('acerta_palabra1_img3'); ?></h2>
            <h3><?php echo get_option('acerta_palabra2_img3'); ?></h3>
          </div>
        </li>
      </ul>
      <ul class="ei-slider-thumbs">
        <li class="ei-slider-element">Current</li>
        <li>
          <a href="#">Slide 1</a>
          <img src="<?php echo get_option('acerta_peq_img1'); ?>" alt="Soluciones Metalmecánicas Miniatura">
        </li>
        <li>
          <a href="#">Slide 2</a>
          <img src="<?php echo get_option('acerta_peq_img2'); ?>" alt="Soluciones Ambientales Miniatura">
        </li>
        <li>
          <a href="#">Slide 3</a>
          <img src="<?php echo get_option('acerta_peq_img3'); ?>" alt="Soluciones Industriales Miniatura">
        </li>
      </ul>
    </div>
  </div><!-- fin slider productos -->
  <h1 class="tit1"><?php echo $cat_name; ?></h1>

  <div class="contiene-productos">
        <div class="menu-productos"><!-- inicio menu que debe ser un side bar -->
          <?php include('menu-lat.php') ?>
        </div><!-- fin de menu que debe ser un side bar -->
        <div class="grid-productos">
          <div class="contiene-grid">
           
            
          
          <?php $type = 'acerta_producto';
            $args=array(
              'post_type' => $type,
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'ignore_sticky_posts'=> 1,
              'category__in' => array( $cat_number )
            );

            $my_query = null;
            $my_query = new WP_Query($args);

            if( $my_query->have_posts() ) {
              while ($my_query->have_posts()) : $my_query->the_post(); 
                $ref = get_post_meta($post->ID, 'acerta_producto_ref', true);
                $desc = get_post_meta($post->ID, 'acerta_producto_esp', true);
                $fab = get_post_meta($post->ID, 'acerta_producto_fab', true);
                $id_fab = esc_attr($fab);
                $pdf = get_post_meta($post->ID, 'acerta_producto_pdf', true);
                $media = get_post_meta($post->ID, 'acerta_producto_media', true);
                $cod_video = substr($media, 16);
                $post_cat = get_the_category($post->ID); ?>
                <?php
                    //echo get_the_term_list( $post->ID, 'category', 'Categorias: ', ', ' );
                    
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
                ?>
                <div class="contiene-producto">
              <div class="producto">
                <div class="producto cara-a">
                <a href="verproducto.html">
                  <?php 
                  echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-producto')); ?>
                </a>
                <div class="nombre-cara-a">
                  <?php the_title(); ?>
                </div>
                <div class="referencia">
                  REF: <?php echo esc_attr($ref);?>
                </div>
              </div>
              <div class="producto cara-b cara-b-<?php echo $clase_cara_b ?>">
                <div class="marca-cara-b">
                  <div class="logo-marca">
                    <a href="<?php echo $link_fab; ?>"><?php echo get_the_post_thumbnail($id_fab);?></a>
                  </div>
                </div>
                <div class="nombre-cara-b">
                  <?php echo esc_attr($ref);?>
                </div>
                <div class="info">
                  <h4>Especificaciones</h4>
                  <p><?php echo esc_attr($desc); ?></p>
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
            
            
            
            
            
            
            
            
            
          </div>
        </div>
      </div>  
    
  </div><!-- fin de main-content -->
  

<?php get_footer('producto'); ?>
