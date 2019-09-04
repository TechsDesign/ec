<?php
/*
 * The name of the template is described in a css file.
 * @package WordPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1, user-scalable=no">
<?php tx_head_description();?>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
<?php wp_head(); ?>
</head>
<body>

  <?php //▼error▼ ?>
  <div id="wrap-error">
    <div id="wrap-error-in">
      <p class="error-404">Error 404 - Not Found</p>
      <p class="error-link"><a href="<?php echo get_option('home');?>" title="HOME">HOME</a></p>
    </div>
  </div>
  <?php //▲error▲ ?>

</body>
</html>