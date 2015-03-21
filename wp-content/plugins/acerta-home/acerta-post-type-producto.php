<?php

// Creación de los tipos de entradas especificas para auth_cookie_expiration

class Acerta_Productos_Post_Type {
  public function __construct() {
    $this->register_post_type();
    $this->metaboxes();
  }

  public function register_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'Productos',
        'singular_name' => 'Producto',
        'add_new' => 'Agregar nuevo Producto',
        'add_new_item' => 'Agregar nuevo Producto',
        'edit_item' => 'Editar Item',
        'add_new_item' => 'Agregar nuevo Producto',
        'view_item' => 'Ver Producto',
        'search_items' => 'Buscar Productos',
        'not_found' => 'Productos no encontrados',
        'not_found_in_trash' => 'Productos no encontrados en la papelera'
      ),
      'query_var' => 'prod',
      'rewrite' => array(
        'slug' => 'producto',
      ),
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-archive',
      'supports' => array(
        'title',
        'thumbnail',
        'editor'
      ),
      'taxonomies' => array('category', 'post_tag')
    );
    register_post_type( 'acerta_producto', $args);
  }
  // se agregan los campos necesarios para personalizar la entrada
  public function metaboxes(){
    add_action('add_meta_boxes', function(){
      add_meta_box('acerta_producto_ref', 'Referencia del Producto', 'producto_ref', 'acerta_producto');
    });

    function producto_ref($post){
      $ref = get_post_meta($post->ID, 'acerta_producto_ref', true);
      ?>
      <p>
        <label for="acerta_producto_ref">Referencia: </label>
        <input type="text" class="widefat" name="acerta_producto_ref" id="acerta_producto_ref" value="<?php echo esc_attr($ref); ?>">
      </p>
      <?php
    }
    // metabox para la especificaciones
    add_action('add_meta_boxes', function(){
      add_meta_box('acerta_producto_esp', 'Especificaciones del Producto', 'producto_esp', 'acerta_producto');
    });

    function producto_esp($post){
      $desc = get_post_meta($post->ID, 'acerta_producto_esp', true);
      ?>
      <p>
        <label for="acerta_producto_esp">Especificaciones: </label>
        <textarea class="widefat" name="acerta_producto_esp" id="acerta_producto_esp" rows="6"><?php echo strip_tags($desc, '<ul><li>'); ?></textarea>
      </p>
      <?php
    }

    // metabox para el fabricante
    add_action('add_meta_boxes', function(){
      add_meta_box('acerta_producto_fab', 'Fabricante del Producto', 'producto_fab', 'acerta_producto');
    });

    function producto_fab($post){
      $fab = get_post_meta($post->ID, 'acerta_producto_fab', true);
      ?>
      <p>
      <?php 
        if(!isset($fab) || $fab === "0"){
          echo "Seleccione un fabricante de la lista";
          } else {
            $id_fab = esc_attr($fab);
            echo "fabricante seleccionado: ". get_the_title( $id_fab );
            } 
      ?>
      </p>
          
      <p> 
        <?php $loop = new WP_Query( array( 'post_type' => 'acerta_fabricante', 'posts_per_page' => 10 ) ); ?>
        <select name="acerta_producto_fab" class ="widefat">
          <option value="<?php echo $id_fab ?>"><?php echo get_the_title( $id_fab ) ?></option>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); 
            $id = get_the_ID();
          ?>

          <?php the_title( '<option value="'.$id.'">' . get_the_title( $id ).'</option>');?> 
          <?php endwhile; ?>
        </select>
      </p>
      <?php
    }

    // metabox para la url del manual u hoja de información.
    add_action('add_meta_boxes', function(){
      add_meta_box('acerta_producto_pdf', 'PDF del producto', 'producto_pdf', 'acerta_producto');
    });

    function producto_pdf($post){
      $pdf = get_post_meta($post->ID, 'acerta_producto_pdf', true);
      ?>
      <p>
        <label for="acerta_producto_pdf">Enlace web (URL) al archivo PDF del manual del producto: </label>
        <input type="text" class="widefat" name="acerta_producto_pdf" id="acerta_producto_pdf" value="<?php echo esc_url($pdf); ?>">
      </p>
      <p>
        <?php if(isset($pdf)){
          echo '<a href="'.esc_url($pdf).'" target="_blank">Ver Manual Actual</a>';
          } ?>
      </p>
      <?php
    }

    // metabox para la url del video en youtube.
    add_action('add_meta_boxes', function(){
      add_meta_box('acerta_producto_media', 'Video Youtube del producto', 'producto_media', 'acerta_producto');
    });

    function producto_media($post){
      $media = get_post_meta($post->ID, 'acerta_producto_media', true);
      ?>
      <p>
        <label for="acerta_producto_media">Enlace web (URL) al video en Youtube del producto: </label>
        <input type="text" class="widefat" name="acerta_producto_media" id="acerta_producto_media" value="<?php echo esc_url($media); ?>">
      </p>
      <p>
        <?php if(!empty($media)){
          echo '<a href="'.esc_url($media).'" target="_blank">Ver Video Actual</a>';
          $cod_video = substr($media, 16);
          echo "<br>".$cod_video; ?>
            <iframe width="622" height="350" src="http://www.youtube.com/embed/<?php echo $cod_video; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
          <?php
          } else {
              echo "variable vacia";
            }
        ?>
      </p>
      <?php
    }


    // GUARDAR CAMBIOS
    add_action('save_post', function($id){
      if( isset($_POST['acerta_producto_ref']) ){
        update_post_meta(
          $id,
          'acerta_producto_ref',
          strip_tags($_POST['acerta_producto_ref'])
        );
      }
    });
    add_action('save_post', function($id){
      if( isset($_POST['acerta_producto_esp']) ){
        update_post_meta(
          $id,
          'acerta_producto_esp',
          strip_tags($_POST['acerta_producto_esp'], '<ul><li>')
        );
      }
    });
    add_action('save_post', function($id){
      if( isset($_POST['acerta_producto_fab']) ){
        update_post_meta(
          $id,
          'acerta_producto_fab',
          strip_tags($_POST['acerta_producto_fab'])
        );
      }
    });
    add_action('save_post', function($id){
      if( isset($_POST['acerta_producto_pdf']) ){
        update_post_meta(
          $id,
          'acerta_producto_pdf',
          strip_tags($_POST['acerta_producto_pdf'])
        );
      }
    });
    add_action('save_post', function($id){
      if( isset($_POST['acerta_producto_media']) ){
        update_post_meta(
          $id,
          'acerta_producto_media',
          strip_tags($_POST['acerta_producto_media'])
        );
      }
    });
  }
}



add_action('init', function(){
  new Acerta_Productos_Post_Type();
}
)

?>