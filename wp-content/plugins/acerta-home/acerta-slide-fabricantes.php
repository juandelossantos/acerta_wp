<?php
function acerta_slider_fabricantes_menu(){
  add_options_page( 'Slider Categoria Fabricantes', 'Slider Categoria Fabricantes', 'read', 'ops_acerta_slider_fabricantes', 'acerta_slider_fabricantes_admin_fn_print' );
}

add_action('admin_init','acerta_slider_fabricantes_register_settings');

function acerta_slider_fabricantes_register_settings(){
  register_setting( 'acerta_slider_fabricantes_group_admin', 'grande_img1_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'peq_img1_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'palabra1_img1_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'palabra2_img1_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'grande_img2_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'peq_img2_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'palabra1_img2_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'palabra2_img2_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'grande_img3_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'peq_img3_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'palabra1_img3_fab', 'esc_attr' );
  register_setting( 'acerta_slider_fabricantes_group_admin', 'palabra2_img3_fab', 'esc_attr' );
  
  
}
add_action( 'admin_menu', 'acerta_slider_fabricantes_menu');


function acerta_slider_fabricantes_admin_fn_print()
{
    ?>
    <div class="wrap">
        <h2>Acerta Home</h2>
        
        <hr>
        <form method="post" action="options.php">
            <?php settings_fields( 'acerta_slider_fabricantes_group_admin' ); ?>
            <?php do_settings_sections( 'acerta_slider_fabricantes_group_admin' ); ?>
            <h3>Ajustes para el Slider de la categoría general de fabricantes</h3>
            <hr>
            <h3>Imágenes del slide No 1:</h3>
            <ol>
              <li>Suba las imagénes que desea utilizar utilizando la opción medios.</li>
              <li>Copie la url designada para cada imagen en los campos correspondientes</li>
            </ol>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Imagen No. 1 (Grande):</th>
                <td><input type="text" name="grande_img1_fab" size="90" value="<?php echo get_option('grande_img1_fab'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen No. 1 (Pequeña):</th>
                <td><input type="text" name="peq_img1_fab" size="90" value="<?php echo get_option('peq_img1_fab'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 1 del Slide No. 1:</th>
                <td><input type="text" name="palabra1_img1_fab" size="90" value="<?php echo get_option('palabra1_img1_fab'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 2 del Slide No. 1:</th>
                <td><input type="text" name="palabra2_img1_fab" size="90" value="<?php echo get_option('palabra2_img1_fab'); ?>" /></td>
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
                <td><input type="text" name="grande_img2_fab" size="90" value="<?php echo get_option('grande_img2_fab'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen No. 2 (Pequeña):</th>
                <td><input type="text" name="peq_img2_fab" size="90" value="<?php echo get_option('peq_img2_fab'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 1 del Slide No. 2:</th>
                <td><input type="text" name="palabra1_img2_fab" size="90" value="<?php echo get_option('palabra1_img2_fab'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 2 del Slide No. 2:</th>
                <td><input type="text" name="palabra2_img2_fab" size="90" value="<?php echo get_option('palabra2_img2_fab'); ?>" /></td>
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
                <td><input type="text" name="grande_img3_fab" size="90" value="<?php echo get_option('grande_img3_fab'); ?>" /></td>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Imagen No. 3 (Pequeña):</th>
                <td><input type="text" name="peq_img3_fab" size="90" value="<?php echo get_option('peq_img3_fab'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 1 del Slide No. 3:</th>
                <td><input type="text" name="palabra1_img3_fab" size="90" value="<?php echo get_option('palabra1_img3_fab'); ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Palabra 2 del Slide No. 3:</th>
                <td><input type="text" name="palabra2_img3_fab" size="90" value="<?php echo get_option('palabra2_img3_fab'); ?>" /></td>
                </tr>
            </table>
                 
            <?php submit_button(); ?>
        </form>
    </div>
    <?php   
}
?>