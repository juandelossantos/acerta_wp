<?php
/**
* functions.php
*
* Definiciones y funciones del tema
*/

/**
*-------------------------------------------------------------------------------
* 1.0 - Definición de constantes.
*-------------------------------------------------------------------------------
*/

define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/img' );
define( 'SCRIPTS', THEMEROOT . '/js');
define( 'FRAMEWORK', get_template_directory() . '/framework' );
define( 'STYLES', THEMEROOT . '/css');

/**
*-------------------------------------------------------------------------------
* 2.0 - configuración del tema por defecto y distintas características.
*-------------------------------------------------------------------------------
*/

if ( ! function_exists( 'alpha_setup' ) ) {
  function alpha_setup() {
    // habilitar el tema para traducción.
    $lang_dir = THEMEROOT . '/languages';
    load_theme_textdomain( 'alpha', $lang_dir );

    // agregar soporte para distinos formatos de entradas.
    add_theme_support( 'post_formats',
      array(
        'gallery',
        'link',
        'image',
        'quote',
        'video',
        'audio'
        )
    );

    // agregar soporte para que los enlaces feed sean automáticos.
    add_theme_support( 'automatic-feed-links' );

    // agregar soporte para las imagenes relativas a las entradas (thumbnails).
    add_theme_support( 'post-thumbnails' );

    // registro de menus de navegación incluyendo la posibilidad de ser traducidos.
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Menu', 'alpha'),
        'home-menu' => __( 'Home Menu', 'alpha'),
        'sub-menu-metal-home' => __('Sub Menu Metal Home', 'alpha' ),
        'sub-menu-ambiental-home' => __('Sub Menu Ambiental Home', 'alpha' ),
        'sub-menu-industrial-home' => __('Sub Menu Industrial Home', 'alpha' )  
      )
    );

  }

  add_action('after_setup_theme', 'alpha_setup' );
}

/**
*-------------------------------------------------------------------------------
* 3.0 - Muestra la metainformación de una entrada específica.
*-------------------------------------------------------------------------------
*/

if( ! function_exists( 'alpha_post_meta' ) ) {
  function alpha_post_meta() {
    echo '<ul class="list-inline entry-meta">';

    if( get_post_type() === 'post') {
      // si es una entrada tipo Sticky (importante) marcarlo.
      if ( is_sticky() ) {
        echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'alpha' ) . ' </li>';
      }

      //  se trae el autor de la entrada.
      printf(
        '<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
        esc_url(get_author_posts_url( get_the_author_meta( 'ID') ) ),
        get_the_author()
      );

      // se trae la fecha de la entrada.
      echo '<li class="meta-date"> ' . get_the_date() . '</li>';

      // se traen las categorias.
      $category_list = get_the_category_list( ', ' );
      if ( $category_list ) {
        echo '<li class="meta-categories"> ' . $category_list . '</li>';
      }

      // se traen las etiquetas (Tags).
      $tags_list = get_the_tag_list( '', ', ' );
      if ( $tags_list ) {
        echo '<li class="meta-tags"> ' . $tags_list . '</li>';
      }

      // enlace a comentarios.
      if ( comments_open() ){
        echo '<li>';
        echo '<span class="meta-reply">';
        comments_popup_link( __('leave a comment', 'alpha '), __( 'One comment so far', 'alpha' ), __( 'View all % comments', 'alpha' ) );
        echo '</span>';
        echo'</li>';
      }

      // Enlace para poder editar.
      if ( is_user_logged_in() ) {
        echo '<li>';
        edit_post_link( __( 'Edit',  'alpha' ), '<span class="meta-edit">', '</span>' );
        echo '</li>';
      }

    }
  }
}

/**
*-------------------------------------------------------------------------------
* 4.0 - Mostrar navegación para entradas siguientes y anteriores.
*-------------------------------------------------------------------------------
*/

if(! function_exists( 'alpha_paging_nav' ) ) {
  function alpha_paging_nav() { ?>
    <ul>
      <?php 
        if( get_previous_posts_link() ) : ?>
        <li class="next">
          <?php previous_posts_link( __( 'Newer Posts &rarr;', 'alpha' ) ); ?>
        </li>
        <?php endif;
      ?>
      <?php 
        if( get_next_posts_link() ) : ?>
        <li class="next">
          <?php next_posts_link( __( '&larr; Older Posts', 'alpha' ) ); ?>
        </li>
        <?php endif;
      ?>
    </ul> <?php

  }
}
/**
*-------------------------------------------------------------------------------
* 5.0 - Registro del area de Widgets (sidebar).
*-------------------------------------------------------------------------------
*/
if( ! function_exists( ' alpha_widget_init() ') ) {
  function alpha_widget_init() {
    if (function_exists( 'register_sidebar') ) {
      register_sidebar(
        array(
          'name' => __('Main Widget Area', 'alpha'),
          'id' => 'sidebar-1',
          'description' => __( 'Appears on posts and pages.', 'alpha'),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget' => '</div> <!-- FIN del Widget -->',
          'before_title' => '<h5 class="widget-title">',
          'after_title' => '</h5>',
        )
      );

      register_sidebar(
        array(
          'name' => __('Footer Widget Area', 'alpha'),
          'id' => 'sidebar-2',
          'description' => __( 'Appears on the footer.', 'alpha'),
          'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
          'after_widget' => '</div> <!-- FIN del Widget -->',
          'before_title' => '<h5 class="widget-title">',
          'after_title' => '</h5>',
        )
      );
    }
  }

  add_action( 'widgets_init', 'alpha_widget_init' );
}

/**
*-------------------------------------------------------------------------------
* 6.0 - Función para inlcuir todas las páginas en la búsqueda
*-------------------------------------------------------------------------------
*/
function filter_search($query) {
  if ($query->is_search) {
    $query->set('post_type', array('post', 'pages', 'acerta_producto', 'acerta_fabricante'));
  };

    return $query;
};
add_filter('pre_get_posts', 'filter_search');

/**
*-------------------------------------------------------------------------------
* 7.0 - Función para personalizar clase del formulario de contacto
*-------------------------------------------------------------------------------
*/
add_filter( 'wpcf7_form_class_attr', 'your_custom_form_class_attr' );

function your_custom_form_class_attr( $class ) {
  $class .= ' contacto-home';
  return $class;
}

/**
*-------------------------------------------------------------------------------
* 8.0 - Shortcodes para ir a la página de contacto y productos
*-------------------------------------------------------------------------------
*/

function shortcode_contact_link() {
global $wpdb;
$contacto_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'contacto'");
$contact_link = '<p><a class="boton-grande" href="'.get_post_permalink($contacto_id).'">Contáctenos</a></p>';
return $contact_link;

}

add_shortcode('boton_contactenos', 'shortcode_contact_link');

function shortcode_products_link() {
  $cat_prod = get_category_by_slug('productos');
  $cat_prod_id = $cat_prod->term_id;
  $products_link = '<p><a class="boton-grande" href="'.get_category_link($cat_prod_id).'">Ver Productos</a></p>';
  return $products_link;
}

add_shortcode( 'boton_productos', 'shortcode_products_link' );












?>