<?php
/*
 * The name of the template is described in a css file.
 * @package WordPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php if(is_home() || is_front_page() || is_page()){ ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<?php }elseif(is_single()){ ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<?php }else{ ?>
<head>
<?php } ?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="author" content="<?php tx_head_author(); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory');?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head();?>
</head>
<body>

<div id="loading"><p>&nbsp;</p></div>
<?php if(is_home() || is_front_page()){ ?>
  <?php //▼wrapper▼ ?>
  <div id="wrapper">
<?php }else{ ?>
  <?php //▼wrapper▼ ?>
  <div id="wrapper" class="subpage">
<?php } ?>

    <?php //▼header-box▼ ?>
    <div id="header-box">
    <?php //▼header-scroll▼ ?>
    <div id="header-scroll">
      <?php //▼header▼ ?>
      <header class="site-header">
        <?php //▼header-in▼ ?>
        <div id="header-in">

          <div id="header-sp">
            <div id="header-sp-in">

              <?php //▼header sub nav button▼ ?>
              <div id="sp-sub-nav"></div>
              <?php //▲header sub nav button▲ ?>

              <?php //▼logo▼ ?>
                <?php tx_header_logo(); ?>
              <?php //▲logo▲ ?>

      <?php //▼sub nav▼ ?>
      <div id="sub-nav-hidden">
        <div id="sub-nav">
          <nav id="sub-nav-box">
            <ul>
              <?php
                if(defined('USCES_VERSION')){
                  if(usces_is_login()){
                    echo '<li class="sub-menu-mypage"><a href="'.USCES_MEMBER_URL.'">'.__('Membership information','usces').'</a></li>'."\n";
                    echo '<li class="sub-menu-logout">'.usces_loginout('return').'</li>'."\n";
                  }else{
                    echo '<li class="sub-menu-newmember"><a href="'.USCES_NEWMEMBER_URL.'">'.__('Membership Registration','usces').'</a></li>'."\n";
                    echo '<li class="sub-menu-login">'.usces_loginout('return').'</li>'."\n";
                  }
                  echo '<li class="sub-menu-cart"><a href="'.USCES_CART_URL.'">'.__('Cart','usces').'</a></li>'."\n";
                }
              ?>
              <?php if(has_nav_menu('sub_nav')){ ?>
                <?php wp_nav_menu(array('theme_location'=>'sub_nav','depth'=>'1','items_wrap' =>'%3$s')); ?>
              <?php } ?>
            </ul>
            <p class="member">
              <?php
                if(defined('USCES_VERSION')){
                  echo '<span class="name">'.usces_the_member_name('return').'さん</span>';
                    if(usces_is_login()){
                      if(usces_is_membersystem_point()){
                        echo '<span class="point">'.__('Points','usces').':'.usces_memberinfo('point','return').'</span>';
                      }
                    }
                }
              ?>
            </p>
          </nav>
        </div>
      </div>
      <?php //▲sub nav▲ ?>

              <?php //▼header main nav button▼ ?>
              <div id="sp-main-nav">
                <div id="s-main">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>
              <?php //▲header main nav button▲ ?>

            </div>
          </div>

        </div>
        <?php //▲header-in▲ ?>

      </header>
      <?php //▲header▲ ?>
    </div>
    <?php //▲header-scroll▲ ?>
    </div>
    <?php //▲header-box▲ ?>

              <?php //▼main nav▼ ?>
                <?php if(has_nav_menu('main_nav')){ ?>
                  <div id="main-nav-hidden">
                    <div id="main-nav">
                      <nav id="main-nav-box">
                        <?php wp_nav_menu(array('theme_location'=>'main_nav','menu_class'=>'parent','depth'=>'2','items_wrap' =>'<ul class="%2$s">%3$s<li class="borderslide"><span></span></li></ul>','link_before'=>'','link_after'=>'<span></span>')); ?>
                      </nav>
                    </div>
                  </div>
                <?php } ?>
              <?php //▲main nav▲ ?>

    <?php if(is_home() || is_front_page()){ ?>
    <?php //▼main img▼ ?>
      <?php tx_main_slider_header_image(); ?>
    <?php //▲main img▲ ?>
    <?php } ?>

    <?php //▼wrapper-in▼ ?>
    <div id="wrapper-in">
    <?php //▼wrap▼ ?>
    <div id="wrap">