<?php

// Creación de los tipos de entradas especificas para auth_cookie_expiration

class Acerta_Fabricantes_Post_Type {
  public function __construct() {
    $this->register_post_type();
    
  }

  public function register_post_type() {
    $args = array(
      'labels' => array(
        'name' => 'Fabricantes',
        'singular_name' => 'Fabricante',
        'add_new' => 'Agregar nuevo Fabricante',
        'add_new_item' => 'Agregar nuevo Fabricante',
        'edit_item' => 'Editar Item',
        'add_new_item' => 'Agregar nuevo Fabricante',
        'view_item' => 'Ver Fabricantes',
        'search_items' => 'Buscar Fabricantes',
        'not_found' => 'Fabricantes no encontrados',
        'not_found_in_trash' => 'Fabricantes no encontrados en la papelera'
      ),
      'query_var' => 'fab',
      'rewrite' => array(
        'slug' => 'fabricante',
      ),
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-exerpt-view',
      'supports' => array(
        'title',
        'thumbnail',
        'editor'
      ),
      'taxonomies' => array('category')
    );
    register_post_type( 'acerta_fabricante', $args);
  }
}



add_action('init', function(){
  new Acerta_Fabricantes_Post_Type();
}
)

?>