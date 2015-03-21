<?php
/**
*
* footer-home.php
*
* El footer de la plantilla home
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
      if($('.sub-menu-ambiental').css('display')=='block'){
        $('.sub-menu-ambiental').slideToggle('fast');
      }
      if($('.sub-menu-industrial').css('display')=='block'){
        $('.sub-menu-industrial').slideToggle('fast');
      }

    });
    $('#menu-ambiental').click(function() {
      $('.sub-menu-ambiental').slideToggle('fast');
      if($('.sub-menu-metal').css('display')=='block'){
        $('.sub-menu-metal').slideToggle('fast');
      }
      if($('.sub-menu-industrial').css('display')=='block'){
        $('.sub-menu-industrial').slideToggle('fast');
      }

    });
    $('#menu-industrial').click(function() {
      $('.sub-menu-industrial').slideToggle('fast');
      if($('.sub-menu-ambiental').css('display')=='block'){
        $('.sub-menu-ambiental').slideToggle('fast');
      }
      if($('.sub-menu-metal').css('display')=='block'){
        $('.sub-menu-metal').slideToggle('fast');
      }

    });

  </script>
  <script>
    $('.responsive-menu-button').click(function(){
      $('.menu-home-menu-container').slideToggle('fast');
    });
  </script>
  <?php wp_footer(); ?>
</body>
</html>
