<?php
// Plugin Name: Administración de la plantilla de Acerta
// Plugin URI: http://localhost
// Description: Plugin para personalizar frases del Home
// Version: 1.0
// Author: David Emilio Sierra Puentes
// Author URI: http://localhost

// Opciones del menu para configuración básica de la plantilla
function acerta_home_menu(){
  add_options_page( 'Página Principal Acerta', 'Página Principal Acerta', 'read', 'ops_acerta_home', 'acerta_home_admin_fn_print' );
}

add_action('admin_init','acerta_home_register_settings');

function acerta_home_register_settings(){
  register_setting( 'acerta_home_group_admin', 'acerta_home_frase1', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_home_frase2', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_home_frase3', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_home_frase4', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_home_frase5', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_home_frase6', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_nosotros_img', 'esc_attr' );
  register_setting( 'acerta_home_group_admin', 'acerta_servicios_img', 'esc_attr' );
  
}
add_action( 'admin_menu', 'acerta_home_menu');


function acerta_home_admin_fn_print()
{
    ?>
    <div class="wrap">
        <h2>Acerta Home</h2>
        <hr>
        <form method="post" action="options.php">
            <?php settings_fields( 'acerta_home_group_admin' ); ?>
            <?php do_settings_sections( 'acerta_home_group_admin' ); ?>
            <h3>Administración de las frases de la página principal de Acerta</h3>
            <p>Para actualizar las frases de la página principal que se encuentran dentro del Slider, edite el campo de texto de la frase que desea modificar.</p>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Frase 1:</th>
                <td><input type="text" name="acerta_home_frase1" size="90" value="<?php echo get_option('acerta_home_frase1'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Frase 2:</th>
                <td><input type="text" name="acerta_home_frase2" size="90" value="<?php echo get_option('acerta_home_frase2'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Frase 3:</th>
                <td><input type="text" name="acerta_home_frase3" size="90" value="<?php echo get_option('acerta_home_frase3'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Frase 4:</th>
                <td><input type="text" name="acerta_home_frase4" size="90" value="<?php echo get_option('acerta_home_frase4'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Frase 5:</th>
                <td><input type="text" name="acerta_home_frase5" size="90" value="<?php echo get_option('acerta_home_frase5'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Frase 6:</th>
                <td><input type="text" name="acerta_home_frase6" size="90" value="<?php echo get_option('acerta_home_frase6'); ?>" /></td>
                </tr>
            </table>
            <hr>
            <h3>Administración de las imagenes para la página Nosotros y la página Servicios</h3>
            <p>Para actualizar las imagenes:</p>
            <ol>
              <li>Suba las imagénes que desea utilizar utilizando la opción medios.</li>
              <li>Copie la url designada para cada imagen en los campos correspondientes</li>
            </ol>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Imagen página Nosotros:</th>
                <td><input type="text" name="acerta_nosotros_img" size="90" value="<?php echo get_option('acerta_nosotros_img'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen página Servicios:</th>
                <td><input type="text" name="acerta_servicios_img" size="90" value="<?php echo get_option('acerta_servicios_img'); ?>" /></td>
                </tr>
            </table>   
            <?php submit_button(); ?>
        </form>
    </div>
    <?php   
}
?>
<?php
    // Creación de tipos de publicaciones especificas para acerta.
    include('acerta-post-type-producto.php');
    include('acerta-post-type-fabricante.php'); 
    include('acerta-slide-productos.php');
    include('acerta-slide-fabricantes.php');
?>