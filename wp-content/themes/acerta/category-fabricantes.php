<?php
/**
* category-fabricantes.php
*
* Plantilla de la pagina de entradas por categoria.
*/
?>

<?php get_header('producto'); ?>
<?php
  $obj = get_post_type_object('acerta_fabricante' ); 
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
          <img src="<?php echo get_option('grande_img1_fab'); ?>" alt="Soluciones Metalmecánicas">
          <div class="ei-title">
            <h2><?php echo get_option('palabra1_img1_fab'); ?></h2>
            <h3><?php echo get_option('palabra2_img1_fab'); ?></h3>
          </div>
        </li>
        <li>
          <img src="<?php echo get_option('grande_img2_fab'); ?>" alt="Soluciones Ambientales">
          <div class="ei-title">
            <h2><?php echo get_option('palabra1_img2_fab'); ?></h2>
            <h3><?php echo get_option('palabra2_img2_fab'); ?></h3>
          </div>
        </li>
        <li>
          <img src="<?php echo get_option('grande_img3_fab'); ?>" alt="Soluciones Industriales">
          <div class="ei-title">
            <h2><?php echo get_option('palabra1_img3_fab'); ?></h2>
            <h3><?php echo get_option('palabra1_img3_fab'); ?></h3>
          </div>
        </li>
      </ul>
      <ul class="ei-slider-thumbs">
        <li class="ei-slider-element">Current</li>
        <li>
          <a href="#">Slide 1</a>
          <img src="<?php echo get_option('peq_img1_fab'); ?>" alt="Soluciones Metalmecánicas Miniatura">
        </li>
        <li>
          <a href="#">Slide 2</a>
          <img src="<?php echo get_option('peq_img2_fab'); ?>" alt="Soluciones Ambientales Miniatura">
        </li>
        <li>
          <a href="#">Slide 3</a>
          <img src="<?php echo get_option('peq_img3_fab'); ?>" alt="Soluciones Industriales Miniatura">
        </li>
      </ul>
    </div>
  </div><!-- fin slider productos -->
  <h1 class="tit1">Distribuciones</h1>
  <p>Somos Distribuidores de las mejores marcas en el mercado:</p>
  <?php $type = 'acerta_fabricante';
    $args=array(
      'post_type' => $type,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'ignore_sticky_posts'=> 1,
      'category__in' => array( $cat_number )
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    $sol_ambiental = array();
    $sol_industrial = array();
    $sol_metal = array();
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); 
        $cat_list = get_the_terms($post->ID, 'category');
        $cat_slug = array();
        $cat_obj_id = array();
        foreach ($cat_list as $term) {
          $cat_slug[] = $term->slug;
          $cat_obj_id[] = $term->object_id;
        }
        //$clase_cara_b = '';
        if ($cat_slug[1] === 'sol_ambiental') {
          $sol_ambiental[] = $cat_obj_id[1];
        }
        if ($cat_slug[1] === 'sol_industrial') {
          $sol_industrial[] = $cat_obj_id[1];
        }
        if ($cat_slug[1] === 'sol_metal') {
          $sol_metal[] = $cat_obj_id[1];
        }
      endwhile;
    }
    wp_reset_query();  // Restore global post data stomped by the_post().
  ?>
    <div class="distribuciones"><!-- Inicio distribuciones -->
      <div class="contiene-marcas" id="contiene-marcas">
        <ul>
          <?php
            foreach($sol_metal as $id) {
              echo '<li><a href="'.get_the_permalink($id).'" alt="'.get_the_title($id).'">'.get_the_post_thumbnail($id).'<h4>'.get_the_title($id).'</h4></a></li>';
            }
          ?>
        </ul>
        <ul>
          <?php
            foreach($sol_ambiental as $id) {
              echo '<li><a href="'.get_the_permalink($id).'" alt="'.get_the_title($id).'">'.get_the_post_thumbnail($id).'<h4>'.get_the_title($id).'</h4></a></li>';
            }
          ?>
        </ul>
        <ul>
          <?php
            foreach($sol_industrial as $id) {
              echo '<li><a href="'.get_the_permalink($id).'" alt="'.get_the_title($id).'">'.get_the_post_thumbnail($id).'<h4>'.get_the_title($id).'</h4></a></li>';
            }
          ?>
        </ul>  
        <nav>
          <a href="#">Metalmecánica</a>
          <a href="#">Ambiental</a>
          <a href="#">Industrial</a>
        </nav>
      </div>
      </div><!-- FIN distribuciones -->
      </div>  
  </div><!-- fin de main-content -->
<?php get_footer('producto'); ?>
