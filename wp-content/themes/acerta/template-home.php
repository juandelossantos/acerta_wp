<?php
/*
Template Name: Acerta-home
*/
get_header('home');



?>
<?php while ( have_posts() ) : the_post(); ?>
        

<div class="contenedor">
    
    <div class="contiene-slider">
      <div id="slides">
      
        <ul class="slides-container">
          <li>
            <img src="<?php echo IMAGES . '/bg1.jpg'?>" width="1024" height="682" alt="Acerta">
            <div class="container medio">
              <h1><?php echo get_option('acerta_home_frase1'); ?></h1>
            </div>
          </li>
          <li>
            <img src="<?php echo IMAGES . '/bg2.jpg'?>" width="1024" height="682" alt="Acerta">
            <div class="container arriba">
              <h1><?php echo get_option('acerta_home_frase2'); ?></h1>
            </div>
          </li>
          <li>
            <img src="<?php echo IMAGES . '/bg3.jpg'?>" width="1024" height="683" alt="Acerta">
            <div class="container abajo">
              <h1><?php echo get_option('acerta_home_frase3'); ?></h1>
            </div>
          </li>
          <li>
            <img src="<?php echo IMAGES . '/bg4.jpg'?>" width="1024" height="685" alt="careta">
            <div class="container medio">
              <h1><?php echo get_option('acerta_home_frase4'); ?></h1>
            </div>
          </li>
          <li>
            <img src="<?php echo IMAGES . '/bg5.jpg'?>" width="1024" height="685" alt="Acerta">
            <div class="container arriba">
              <h1><?php echo get_option('acerta_home_frase5'); ?></h1>
            </div>
          </li>
          <li>
            <img src="<?php echo IMAGES . '/bg6.jpg'?>" width="1024" height="685" alt="Acerta">
            <div class="container abajo">
              <h1><?php echo get_option('acerta_home_frase6'); ?></h1>
            </div>
          </li>
        </ul>
        <nav class="slides-navigation">
          <a href="#" class="next">
            <i class="fa fa-chevron-circle-right fa-3x"></i>
          </a>
          <a href="#" class="prev">
            <i class="fa fa-chevron-circle-left fa-3x"></i>
          </a>
        </nav>
      </div>
    </div>

    <!--Fin del slider -->

    <header class="clearfix">
      <div class="logo"><img src="<?php echo IMAGES .'/logoAcerta.png'?>" alt=""></div>
      <nav class="general-nav" rel="navigation">
        <div class="responsive-menu-button"><i class="fa fa-bars"></i></div>
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'home-menu',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
          </nav>
    </header>
    <div class="contenido">
      <?php  the_content(); ?>
      <div class="menu-flotante">
        <div class="menu-metal" id="menu-metal">
          <div>
            <div class="ico-metal">
              <i class="fa fa-cogs"></i>
            </div>
            <?php
              // Get the ID of a given category
              $category_metal = get_category_by_slug('sol_metal');
              $category_metal_id = $category_metal ->term_id;

              // Get the URL of this category
              $category_metal_link = get_category_link( $category_metal_id );
              $category_metal_name = get_cat_name( $category_metal_id );
            ?>
            <div class="tit-menu-metal"><?php echo $category_metal_name; ?></div>
          </div>
          <div class="sub-menu-metal">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'sub-menu-metal-home',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
          </div>
        </div>
        
        <div class="menu-ambiental" id="menu-ambiental">
          <div>
            <div class="ico-ambiental">
              <i class="fa fa-leaf"></i>
            </div>
            <?php
              // Get the ID of a given category
              $category_ambiental = get_category_by_slug('sol_ambiental');
              $category_ambiental_id = $category_ambiental ->term_id;

              // Get the URL of this category
              $category_ambiental_link = get_category_link( $category_ambiental_id );
              $category_ambiental_name = get_cat_name( $category_ambiental_id );
            ?>
            <div class="tit-menu-ambiental"><?php echo $category_ambiental_name; ?></div>
          </div>
          <div class="sub-menu-ambiental">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'sub-menu-ambiental-home',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
          </div>
        </div>
        <div class="menu-industrial" id="menu-industrial">
          <div>
            <div class="ico-industrial">
              <i class="fa fa-rocket"></i>
            </div>
            <?php
              // Get the ID of a given category
              $category_industrial = get_category_by_slug('sol_industrial');
              $category_industrial_id = $category_industrial ->term_id;

              // Get the URL of this category
              $category_industrial_link = get_category_link( $category_industrial_id );
              $category_industrial_name = get_cat_name( $category_industrial_id );
            ?>
            <div class="tit-menu-industrial"><?php echo $category_industrial_name; ?></div>
          </div>
          <div class="sub-menu-industrial">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'sub-menu-industrial-home',
                  // 'menu_class' => 'general-nav'
                )
              );
            ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
    
<?php
get_footer('home');
?>