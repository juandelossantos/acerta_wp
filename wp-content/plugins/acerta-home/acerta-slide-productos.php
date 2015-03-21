<?php
function acerta_slider_productos_menu(){
  add_options_page( 'Slider Categoria Productos', 'Slider Categoria Productos', 'read', 'ops_acerta_slider_productos', 'acerta_slider_productos_admin_fn_print' );
}

add_action('admin_init','acerta_slider_productos_register_settings');

function acerta_slider_productos_register_settings(){
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_grande_img1', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_peq_img1', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_palabra1_img1', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_palabra2_img1', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_grande_img2', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_peq_img2', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_palabra1_img2', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_palabra2_img2', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_grande_img3', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_peq_img3', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_palabra1_img3', 'esc_attr' );
  register_setting( 'acerta_slider_productos_group_admin', 'acerta_palabra2_img3', 'esc_attr' );
  
  
}
add_action( 'admin_menu', 'acerta_slider_productos_menu');


function acerta_slider_productos_admin_fn_print()
{
    ?>
    <div class="wrap">
        <h2>Acerta Home</h2>
        
        <hr>
        <form method="post" action="options.php">
            <?php settings_fields( 'acerta_slider_productos_group_admin' ); ?>
            <?php do_settings_sections( 'acerta_slider_productos_group_admin' ); ?>
            <h3>Ajustes para el Slider de la categoría general de productos</h3>
            <hr>
            <h3>Imágenes del slide No 1:</h3>
            <ol>
              <li>Suba las imagénes que desea utilizar utilizando la opción medios.</li>
              <li>Copie la url designada para cada imagen en los campos correspondientes</li>
            </ol>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Imagen No. 1 (Grande):</th>
                <td><input type="text" name="acerta_grande_img1" size="90" value="<?php echo get_option('acerta_grande_img1'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen No. 1 (Pequeña):</th>
                <td><input type="text" name="acerta_peq_img1" size="90" value="<?php echo get_option('acerta_peq_img1'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 1 del Slide No. 1:</th>
                <td><input type="text" name="acerta_palabra1_img1" size="90" value="<?php echo get_option('acerta_palabra1_img1'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 2 del Slide No. 1:</th>
                <td><input type="text" name="acerta_palabra2_img1" size="90" value="<?php echo get_option('acerta_palabra2_img1'); ?>" /></td>
                </tr>
            </table>

            <hr>
            <h3>Imágenes del slide No 2:</h3>
            <ol>
              <li>Suba las imagénes que desea utilizar utilizando la opción medios.</li>
              <li>Copie la url designada para cada imagen en los campos correspondientes</li>
            </ol>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Imagen No. 2 (Grande):</th>
                <td><input type="text" name="acerta_grande_img2" size="90" value="<?php echo get_option('acerta_grande_img2'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen No. 2 (Pequeña):</th>
                <td><input type="text" name="acerta_peq_img2" size="90" value="<?php echo get_option('acerta_peq_img2'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 1 del Slide No. 2:</th>
                <td><input type="text" name="acerta_palabra1_img2" size="90" value="<?php echo get_option('acerta_palabra1_img2'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 2 del Slide No. 2:</th>
                <td><input type="text" name="acerta_palabra2_img2" size="90" value="<?php echo get_option('acerta_palabra2_img2'); ?>" /></td>
                </tr>
            </table>

            <hr>
            <h3>Imágenes del slide No 3:</h3>
            <ol>
              <li>Suba las imagénes que desea utilizar utilizando la opción medios.</li>
              <li>Copie la url designada para cada imagen en los campos correspondientes</li>
            </ol>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Imagen No. 3 (Grande):</th>
                <td><input type="text" name="acerta_grande_img3" size="90" value="<?php echo get_option('acerta_grande_img3'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen No. 3 (Pequeña):</th>
                <td><input type="text" name="acerta_peq_img3" size="90" value="<?php echo get_option('acerta_peq_img3'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 1 del Slide No. 3:</th>
                <td><input type="text" name="acerta_palabra1_img3" size="90" value="<?php echo get_option('acerta_palabra1_img3'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 2 del Slide No. 3:</th>
                <td><input type="text" name="acerta_palabra2_img3" size="90" value="<?php echo get_option('acerta_palabra2_img3'); ?>" /></td>
                </tr>
            </table>
                 
            <?php submit_button(); ?>
        </form>
    </div>
    <?php   
}
?>