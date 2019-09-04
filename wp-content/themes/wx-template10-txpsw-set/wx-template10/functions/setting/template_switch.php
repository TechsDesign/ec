<?php
  /*** cookie save ***/
    $tx_cookie_change = '';
      if(isset($_GET['change'])){
        $tx_cookie_change = $_GET['change'];
          if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
            setcookie('change', $tx_cookie_change, time()+6 * 3600, '/', '', 1, true);
          }else{
            setcookie('change', $tx_cookie_change, time()+6 * 3600, '/', '', 0, true);
          }
            if($tx_cookie_change != 'pc'){
              if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                setcookie('change', 'pc', time()-31536001, '/', '', 1, true);
              }else{
                setcookie('change', 'pc', time()-31536001, '/', '', 0, true);
              }
            }
      }
  /*** cookie save ***/

  /*** class ***/
    class tx_field_set{

      private $tx_ua;
      private $tx_url;
      private $tx_sp;
      private $tx_change;

        function __construct(){
          $this->tx_ua = $_SERVER['HTTP_USER_AGENT'];
          $this->tx_url = $_SERVER['REQUEST_URI'];
          $this->tx_sp = '';
          $this->tx_change = '';
        }

             function tx_url_decision(){
               return $this->tx_url;
             }

             function tx_sp_decision(){
               if((strpos($this->tx_ua,'iPhone') !== false) ||
                  (strpos($this->tx_ua,'iPad') !== false) ||
                  (strpos($this->tx_ua,'Android') !== false) ||
                  (strpos($this->tx_ua,'Android') !== false) && (strpos($this->tx_ua,'Mobile') !== false)
                 ){
                   $this->tx_sp = 'on';
                  }
                    return $this->tx_sp;
             }

             function tx_change_decision(){
               if(isset($_GET['change'])){
                 $this->tx_change = $_GET['change'];
               }else{
                 $this->tx_change = isset($_COOKIE['change']);
               }
                    return $this->tx_change;
             }
    }
  /*** class ***/

  /*** pc&sp switch ***/
    function tx_display_switch(){
      $tx_template_add1 = get_option('tx_template_update1');
        if($tx_template_add1['tx_switch_option'] == 'switch_on'){
          $tx_field = new tx_field_set();
          $tx_cookie_url = $tx_field->tx_url_decision();
          $tx_sp_switch = $tx_field->tx_sp_decision();
          $tx_change_url = $tx_field->tx_change_decision();
            if(strpos($tx_cookie_url, '?') === false){
              $tx_cookie_url_pc = $tx_cookie_url.'?change=pc';
              $tx_cookie_url_sp = $tx_cookie_url.'?change=sp';
            }elseif(strpos($tx_cookie_url, '?change=') !== false){
              $tx_cookie_url_pc = trim($tx_cookie_url, '?change=sp').'?change=pc';
              $tx_cookie_url_sp = trim($tx_cookie_url, '?change=sp').'?change=sp';
            }elseif(strpos($tx_cookie_url, '?') !== false){
              if(strpos($tx_cookie_url, '&change=') !== false){
                $tx_cookie_url_pc = trim($tx_cookie_url, 'change=sp').'change=pc';
                $tx_cookie_url_sp = trim($tx_cookie_url, 'change=sp').'change=sp';
              }else{
                $tx_cookie_url_pc = trim($tx_cookie_url, '?change=sp').'&change=pc';
                $tx_cookie_url_sp = trim($tx_cookie_url, '?change=sp').'&change=sp';
              }
            }
            if($tx_sp_switch){
              if($tx_change_url != 'pc'){
                echo '<div id="pc-browser"><p><a href="'.esc_url($tx_cookie_url_pc).'">パソコン表示</a></p></div>';
              }else{
                echo '<div id="sp-browser"><p><a href="'.esc_url($tx_cookie_url_sp).'">スマートフォン表示</a></p></div>';
              }
            }
        }
    }
  /*** pc&sp switch ***/

  /*** viewport switch ***/
    function tx_viewport_switch(){
     $tx_template_add1 = get_option('tx_template_update1');
       if($tx_template_add1['tx_switch_option'] == 'switch_on'){
         $tx_field = new tx_field_set();
         $tx_sp_switch = $tx_field->tx_sp_decision();
         $tx_change_url = $tx_field->tx_change_decision();
           if($tx_sp_switch){
             if($tx_change_url != 'pc'){
               echo '<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1.5, initial-scale=1, user-scalable=yes, target-densitydpi=medium-dpi" />'."\n";
             }else{
               echo '<meta name="viewport" content="width=1200px">'."\n";
             }
           }else{
             echo '<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1.5, initial-scale=1, user-scalable=yes, target-densitydpi=medium-dpi" />'."\n";
           }
       }else{
             echo '<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1.5, initial-scale=1, user-scalable=yes, target-densitydpi=medium-dpi" />'."\n";
       }
    }
    add_action('wp_head', 'tx_viewport_switch', -999);
  /*** viewport switch ***/

  /*** css switch ***/
    function tx_ecqueue_switch(){
      $tx_template_add1 = get_option('tx_template_update1');
      $tx_field = new tx_field_set();
      $tx_sp_switch = $tx_field->tx_sp_decision();
      $tx_change_url = $tx_field->tx_change_decision();
        if(!is_admin()){
          wp_enqueue_script('jquery');
          //wp_enqueue_style('dashicons');
          wp_enqueue_style('wp-dashicons', get_template_directory_uri().'/font/wp-dashicons/dashicons.min.css', array(), NULL, 'all');
            if($tx_sp_switch){
              if($tx_change_url != 'pc'){
                wp_enqueue_style('style-all', get_template_directory_uri().'/css/style-all.css', array(), NULL, 'all');
                wp_enqueue_script('t_script', get_template_directory_uri().'/js/t_script.js', array(), NULL, true);
                  if(is_home() || is_front_page()){
                    wp_enqueue_style('style-top', get_template_directory_uri().'/css/style-top.css', array(), NULL, 'all');
                    wp_enqueue_script('t_mainimg_script', get_template_directory_uri().'/js/t_mainimg_script.js', array(), NULL, true);
                    wp_enqueue_script('t_post_script', get_template_directory_uri().'/js/t_post_script.js', array(), NULL, true);
                  }else{
                    wp_enqueue_style('style-page', get_template_directory_uri().'/css/style-page.css', array(), NULL, 'all');
                  }
                  if(is_page('usces-cart') || is_page('usces-member') || isset($_GET['page']) && ($_GET['page'] == 'search_item')){
                    wp_enqueue_style('ucart-style', get_template_directory_uri().'/css/style-usces.css', array(), NULL, 'all');
                  }
              }else{
                if($tx_template_add1['tx_switch_option'] == 'switch_on'){
                  wp_enqueue_style('style-all', get_template_directory_uri().'/switch/style-all.css', array(), NULL, 'all');
                  wp_enqueue_script('t_script', get_template_directory_uri().'/switch/t_script.js', array(), NULL, true);
                    if(is_home() || is_front_page()){
                      wp_enqueue_style('style-top', get_template_directory_uri().'/switch/style-top.css', array(), NULL, 'all');
                      wp_enqueue_script('t_mainimg_script', get_template_directory_uri().'/switch/t_mainimg_script.js', array(), NULL, true);
                    wp_enqueue_script('t_post_script', get_template_directory_uri().'/switch/t_post_script.js', array(), NULL, true);
                    }else{
                      wp_enqueue_style('style-page', get_template_directory_uri().'/switch/style-page.css', array(), NULL, 'all');
                    }
                    if(is_page('usces-cart') || is_page('usces-member') || isset($_GET['page']) && ($_GET['page'] == 'search_item')){
                      wp_enqueue_style('ucart-style', get_template_directory_uri().'/switch/style-usces.css', array(), NULL, 'all');
                    }
                }else{
                  wp_enqueue_style('style-all', get_template_directory_uri().'/css/style-all.css', array(), NULL, 'all');
                  wp_enqueue_script('t_script', get_template_directory_uri().'/js/t_script.js', array(), NULL, true);
                    if(is_home() || is_front_page()){
                      wp_enqueue_style('style-top', get_template_directory_uri().'/css/style-top.css', array(), NULL, 'all');
                      wp_enqueue_script('t_mainimg_script', get_template_directory_uri().'/js/t_mainimg_script.js', array(), NULL, true);
                      wp_enqueue_script('t_post_script', get_template_directory_uri().'/js/t_post_script.js', array(), NULL, true);
                    }else{
                      wp_enqueue_style('style-page', get_template_directory_uri().'/css/style-page.css', array(), NULL, 'all');
                    }
                    if(is_page('usces-cart') || is_page('usces-member') || isset($_GET['page']) && ($_GET['page'] == 'search_item')){
                      wp_enqueue_style('ucart-style', get_template_directory_uri().'/css/style-usces.css', array(), NULL, 'all');
                    }
                }
              }
            }else{
              wp_enqueue_style('style-all', get_template_directory_uri().'/css/style-all.css', array(), NULL, 'all');
              wp_enqueue_script('t_script', get_template_directory_uri().'/js/t_script.js', array(), NULL, true);
                if(is_home() || is_front_page()){
                  wp_enqueue_style('style-top', get_template_directory_uri().'/css/style-top.css', array(), NULL, 'all');
                  wp_enqueue_script('t_mainimg_script', get_template_directory_uri().'/js/t_mainimg_script.js', array(), NULL, true);
                  wp_enqueue_script('t_post_script', get_template_directory_uri().'/js/t_post_script.js', array(), NULL, true);
                }else{
                  wp_enqueue_style('style-page', get_template_directory_uri().'/css/style-page.css', array(), NULL, 'all');
                }
                if(is_page('usces-cart') || is_page('usces-member') || isset($_GET['page']) && ($_GET['page'] == 'search_item')){
                  wp_enqueue_style('ucart-style', get_template_directory_uri().'/css/style-usces.css', array(), NULL, 'all');
                }
            }
        }
    }
    add_action('wp_enqueue_scripts', 'tx_ecqueue_switch');
  /*** css switch ***/
?>