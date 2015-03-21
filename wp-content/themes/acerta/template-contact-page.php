<?php 
/*
* template-contact-page.php
*
* Template Name: template para la página de contacto.
*/ ?>
<?php get_header(); ?>
<?php while( have_posts() ) : the_post(); ?>
<div class="contenedor">
    
    <div class="contenido">
      <div class="contacto">
      <div class="contiene-contacto">
        <div class="contiene-section">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
          
        </div>
    </div>
    </div>
    
    <div class="mapa-home">
        <iframe width='100%' height='720px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/juandelossantos.jd27h1d7/attribution,zoompan,geocoder,share.html?access_token=pk.eyJ1IjoianVhbmRlbG9zc2FudG9zIiwiYSI6Im9KZ1I2MHcifQ.pM-VepKt5o3L9KdeH_YdGw'></iframe>
      </div>
    <div class="datos">
      <h2>Teléfonos</h2>
      <div class="info-contacto clearfix">
        <div class="info-ciudad">
          <h4 class="rojo">Bogotá D.C.</h4>
            <i class="fa fa-phone fa-2x rojo"></i>&nbsp; 57 1 257 5000<br>
            <i class="fa fa-fax fa-2x rojo"></i>&nbsp; 57 1 256 7026<br><br>
          <h3 class="rojo">Paloquemao</h3>
            <i class="fa fa-phone fa-2x rojo"></i>&nbsp; 57 1 257 5000<br>
        </div>
        <div class="info-ciudad">
          <h4 class="rojo">Medellín</h4>
            <i class="fa fa-mobile fa-2x rojo"></i>&nbsp; 314 861 5904<br>
            <i class="fa fa-mobile fa-2x rojo"></i>&nbsp; 310 428 3044
        </div>
        <div class="info-ciudad">
          <h4 class="rojo">CALI</h4>
            <i class="fa fa-mobile fa-2x rojo"></i>&nbsp; 318 343 9282<br>
            <i class="fa fa-mobile fa-2x rojo"></i>&nbsp; 310 263 0874
        </div>
        <div class="info-ciudad">
          <h4 class="rojo">Eje Cafetero</h4>
            <i class="fa fa-mobile fa-2x rojo"></i>&nbsp; 314 861 5904<br><br>
        </div>
        <div class="info-ciudad">
          <h4 class="rojo">Zona Caribe</h4>
            <i class="fa fa-mobile fa-2x rojo"></i>&nbsp; 318 343 9400<br><br>
        </div>
      </div>
      

    </div>
    </div>
  <?php endwhile; ?>
  <?php get_footer(); ?>
  </div>