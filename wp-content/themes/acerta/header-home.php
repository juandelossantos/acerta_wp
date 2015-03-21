<?php
/**
* header-home.php
*
* La cabecera general de la plantilla.
*
*/
?>
<?php
  // se asigna a una variable la ruta del favicon.
  $favicon = IMAGES . '/icons/favicon.png'; 

  // se asigna a una variable la ruta de icono para móviles por defecto.
  $touch_icon = IMAGES . 'icons/apple-touch-icon-152x152-precomposed.png';
?>

<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes();?> class="ie8"> <![endif]-->
<!--[if IE]><!--> <html <?php language_attributes();?>> <!--<![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  

  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicon and Apple icons -->
  <link rel="shortcut icon" href="<?php echo $favicon; ?>">
  <link rel="apple-touch-icon-precomposed" sizes="152X152" href="<?php echo $touch_icon; ?>">
  <link rel="stylesheet" href="<?php echo STYLES . '/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo STYLES . '/styles.css'; ?>">
  <!--[if IE]>
  <link rel="stylesheet" type="text/css" href="<?php echo STYLES . '/ie.css'; ?>" />
  <![endif]-->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo STYLES . '/superslides.css'; ?>">
  <script src="<?php echo SCRIPTS. '/modernizer.js';?>"></script>

  <?php wp_head(); ?>
</head>
<body>