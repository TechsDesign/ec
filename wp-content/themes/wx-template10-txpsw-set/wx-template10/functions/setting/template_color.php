<?php
  /*** css color ***/
    function tx_color(){
      echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/color/style-color.php" id="style-color-css" media="all" />'."\n";
    }
    add_action('wp_head', 'tx_color', 5);

  /*** admin color ***/
    function tx_colorpicker_script(){
        if(isset($_GET['page']) && ($_GET['page'] == 'addition_4')){
          wp_enqueue_script('wp-color-picker');
          wp_enqueue_script('add-colorpicker', get_template_directory_uri().'/functions/setting/js/add-colorpicker.js', array('wp-color-picker'), false, true);
        }
    }
    add_action('admin_print_scripts', 'tx_colorpicker_script');

    function tx_colorpicker_styles() {
        if(isset($_GET['page']) && ($_GET['page'] == 'addition_4')){
          wp_enqueue_style('wp-color-picker');
        }
    }
    add_action('admin_print_styles', 'tx_colorpicker_styles');
  /*** admin color ***/
?>