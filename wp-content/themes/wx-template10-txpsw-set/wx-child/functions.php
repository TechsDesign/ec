<?php
/*
 * The name of the template is described in a css file.
 * @author TEMPLX [TEMPLATE XCEPT]
 * https://templx.com/
 */
?>
<?php
// ----- File(.css/.js) Read
  function tx_ecqueue_theme_child(){

    ///// Please add it when you use the original file. オリジナルのファイルを使用する場合は書き足してください。/////

    //*** Child style sheet read ***//
    wp_enqueue_style('style-child', get_stylesheet_directory_uri().'/css/style-child.css', array(), NULL, 'all');
    //wp_enqueue_style('STYLE_NAME', get_stylesheet_directory_uri().'/css/STYLE_NAME.css', array(), NULL, 'all');

    //*** Child style sheet read ***//
    //wp_enqueue_script('SCRIPT_NAME', get_stylesheet_directory_uri().'/js/SCRIPT_NAME.js', array(), NULL, true);

  }
  add_action('wp_enqueue_scripts', 'tx_ecqueue_theme_child'); 
// File(.css/.js) Read


// ----- File(.php) Read
  ///// Please add it when you use the original file. オリジナルのファイルを使用する場合は書き足してください。/////

  //require_once(get_stylesheet_directory_uri().'/functions/PHP_NAME.php');

// File(.php) Read
?>