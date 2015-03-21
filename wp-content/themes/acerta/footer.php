<?php
/**
*
* footer.php
*
* El footer de la plantilla general
**/
?>



  <!-- FOOTER -->

  <footer>
    &copy; <?php echo date( 'Y' ); ?> &nbsp;&nbsp; Bogotá D.C. - Colombia. &nbsp; | &nbsp;&nbsp;   <i class="fa fa-phone"></i>&nbsp; 57 1 2575000  &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;<i class="fa fa-map-marker"></i>&nbsp; Cra 53 No. 103 B - 39. &nbsp; | &nbsp; <i class="fa fa-map-marker"></i> Showroom: Calle 18 No 22 - 12 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;<i class="fa fa-paper-plane"></i>&nbsp;&nbsp;<a href="mailto:info@acerta.com.co">info@acerta.com.co</a>
      <img class="iso" src="<?php echo IMAGES. '/bereau-veritas.png';?>" alt="">
  </footer>
  </div>

  <script src="<?php echo SCRIPTS. '/jquery-1.11.1.min.js';?>"></script>
  <script src="<?php echo SCRIPTS. '/jquery.easing.1.3.js';?>"></script>
  <script src="<?php echo SCRIPTS. '/jquery.animate-enhanced.min.js';?>"></script>
  <script src="<?php echo SCRIPTS. '/jquery.superslides.js';?>"></script>
  <script src="<?php echo SCRIPTS. '/application.js';?>"></script>
  <script>
    $('#menu-metal').click(function() {
      $('.sub-menu-metal').slideToggle('fast');
        return false;
    });
    $('#menu-ambiental').click(function() {
      $('.sub-menu-ambiental').slideToggle('fast');
        return false;
    });
    $('#menu-industrial').click(function() {
      $('.sub-menu-industrial').slideToggle('fast');
        return false;
    });
    // control de pestañas de info producto
    $('#btn-menu-metal').click(function() {
      $('.submenu-metal').slideToggle('fast');
        return false;
    });
    $('#btn-menu-ambiental').click(function() {
      $('.submenu-ambiental').slideToggle('fast');
        return false;
    });
    $('#btn-menu-industrial').click(function() {
      $('.submenu-industrial').slideToggle('fast');
        return false;
    });
    $('#info').click(function() {
      $('#info').css('background-color','#aa0024');
      $('#media').css('background-color','rgba(170, 0, 36, 0.7)');
      $('#similar').css('background-color','rgba(170, 0, 36, 0.7)');
      $('#detalle-info').css({
        'opacity': '1',
        'z-index': '12',
      });
      $('#detalle-media').css({
        'opacity': '0',
        'z-index': '11'
      });
      $('#detalle-similar').css({
        'opacity': '0',
        'z-index': '11'});
    });
    $('#media').click(function() {
      $('#info').css('background-color','rgba(170, 0, 36, 0.7)');
      $('#media').css('background-color','#aa0024');
      $('#similar').css('background-color','rgba(170, 0, 36, 0.7)');
      $('#detalle-info').css({
        'opacity': '0',
        'z-index': '11'
      });
      $('#detalle-media').css({
        'opacity': '1',
        'z-index': '12'
      });
      $('#detalle-similar').css({
        'opacity': '0',
        'z-index': '11'
      });
    });
    $('#similar').click(function() {
      $('#info').css('background-color','rgba(170, 0, 36, 0.7)');
      $('#media').css('background-color','rgba(170, 0, 36, 0.7)');
      $('#similar').css('background-color','#aa0024');
      $('#detalle-info').css({
        'opacity': '0',
        'z-index': '11'
      });
      $('#detalle-media').css({
        'opacity': '0',
        'z-index': '11'
      });
      $('#detalle-similar').css({
        'opacity': '1',
        'z-index': '12'
      });
    });
    // fin de control de pestañas de info producto
  </script>
  <script>
    $('.responsive-menu-button').click(function(){
      $('.menu-main-menu-container').slideToggle('fast');
      $('.internal-nav').toggleClass('internal-nav-sombra');
    });
  </script>
  <?php wp_footer(); ?>
</div><!-- fin div contenedor -->
</body>
</html>
