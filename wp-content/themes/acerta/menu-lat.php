<?php 
            get_sidebar(); 
            // Get the ID of a given category
            $category_productos = get_category_by_slug('productos');
            $category_productos_id = $category_productos ->term_id;

              // Get the URL of this category
            $category_productos_link = get_category_link( $category_productos_id );
            $category_productos_name = get_cat_name( $category_productos_id );
            
            // Get the ID of a given category
            $category_metal = get_category_by_slug('sol_metal');
            $category_metal_id = $category_metal ->term_id;

              // Get the URL of this category
            $category_metal_link = get_category_link( $category_metal_id );
            $category_metal_name = get_cat_name( $category_metal_id );
            
          ?>
          <ul class="nav-productos">
            <li><a href="<?php echo $category_productos_link; ?>" class="boton-peq">Todos</a></li>
            <li>
              <a href="" class="boton-peq btn-metal" id="btn-menu-metal">Metalmecánica</a>
              
              <div class="submenu-metal">
                <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'sub-menu-metal-home',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
              </div>
            </li>
            <li>
              <a href="" class="boton-peq btn-ambiental" id="btn-menu-ambiental">Ambiental</a>
              <?php
              // Get the ID of a given category
              $category_ambiental = get_category_by_slug('sol_ambiental');
              $category_ambiental_id = $category_ambiental ->term_id;

              // Get the URL of this category
              $category_ambiental_link = get_category_link( $category_ambiental_id );
              $category_ambiental_name = get_cat_name( $category_ambiental_id );
            ?>
              <div class="submenu-ambiental">
                <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'sub-menu-ambiental-home',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
              </div>
            </li>
            <li>
              <a href="" class="boton-peq btn-industrial" id="btn-menu-industrial">Industrial</a>
              <?php
              // Get the ID of a given category
              $category_industrial = get_category_by_slug('sol_industrial');
              $category_industrial_id = $category_industrial ->term_id;

              // Get the URL of this category
              $category_industrial_link = get_category_link( $category_industrial_id );
              $category_industrial_name = get_cat_name( $category_industrial_id );
            ?>
              <div class="submenu-industrial">
                <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'sub-menu-industrial-home',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
              </div>
            </li>
          </ul>