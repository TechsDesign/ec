<?php
// ----- Plugin
 if(!function_exists('is_plugin_active')){
  require_once(ABSPATH . 'wp-admin/includes/plugin.php');
 }
// Plugin

// ----- Setting
 require_once(get_template_directory().'/functions/setting/template_switch.php');
 require_once(get_template_directory().'/functions/setting/template_sns.php');
 require_once(get_template_directory().'/functions/setting/template_setting.php');
 require_once(get_template_directory().'/functions/setting/template_sort.php');
 require_once(get_template_directory().'/functions/setting/template_tag.php');
 require_once(get_template_directory().'/functions/setting/template_seo.php');
 require_once(get_template_directory().'/functions/setting/template_color.php');
 require_once(get_template_directory().'/functions/setting/template_usces_widget.php');
 require_once(get_template_directory().'/functions/setting/template_update.php');
// Setting

// ----- Template Support
 function tx_template_setup(){
   add_theme_support('automatic-feed-links');
   add_theme_support('title-tag');
   add_theme_support('menus');
   add_theme_support('post-thumbnails');
   add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption',));
   add_theme_support('post-formats', array('aside','image','video','quote','link','gallery','status','audio','chat',));
 }
 add_action('after_setup_theme', 'tx_template_setup');
// Template Support

// ----- Search
 function tx_search_form($tx_form){
   $tx_img_path = (get_bloginfo('template_directory').'/images/search-but.png');
   $tx_form = '<div id="search"><div id="search-in"><form method="get" id="searchform" action="'.home_url( '/' ).'" >
               <label class="screen-reader-text" for="s">'.__('').'</label>
               <input type="text" value="'.get_search_query().'" name="s" id="s" />
               <button type="submit" id="searchsubmit" value="Search" class="intersection-img"><span class="dashicons dashicons-search"></span></button>
               </form></div></div>';
   return $tx_form;
 }
 add_filter('get_search_form', 'tx_search_form');
// Search

// ----- Widget
 if(function_exists('register_sidebar'))
   register_sidebar(array(
     'name' => __('ウィジェット'),
     'id' => 'one',
     'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-body">',
     'after_widget' => '</div></aside>',
     'before_title' => '<h2><span>',
     'after_title' => '</span></h2>',
   ));
// Widget

// ----- Pagination
 function tx_navigation(){
   global $wp_rewrite, $wp_query, $paged;
     $paginate_base = get_pagenum_link(1);
       if(($wp_query->max_num_pages) > 1):
         if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
           $paginate_format = '';
              $paginate_base = add_query_arg('paged', '%#%');
         }else{
           $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/').user_trailingslashit('page/%#%/', 'paged');
           $paginate_base .= '%_%';
         }
         $result = paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 5,
                'current' => ($paged ? $paged : 1),
         ));
         echo '<div class="pagenavi"><div class="page-numb">'."\n".$result."\n</div></div>\n";
         endif;
      }
// Pagination

// ----- Breadcrumb
 function tx_breadcrumbs(){
   global $wp_query;
     if(!is_home() || !is_front_page()){
       echo '<p><a href="'.get_option('home').'">HOME</a></p>';
        if(is_category()){
          $cat_queried = get_queried_object();
            if($cat_queried->parent != 0){
              $cat_title = array_reverse(get_ancestors($cat_queried->cat_ID, 'category'));
                foreach($cat_title as $cat_titles){
                  echo '<p>&nbsp;&raquo;&nbsp;<a href="'.get_category_link($cat_titles).'">'.get_cat_name($cat_titles).'</a></p>';
                }
            }
          echo '<p>&nbsp;&raquo;&nbsp;<a href="'.get_category_link($cat_queried->cat_ID).'">'.$cat_queried->name.'</a></p>';
        }elseif(is_archive() && !is_category()){
          if(is_author()){
            echo '<p>&nbsp;&raquo;&nbsp;'.get_the_author().'</p>';
          }
          if(is_day()){
            echo '<p>&nbsp;&raquo;&nbsp;'.get_the_time(__('Y年Fj日')).'</p>';
          }
          if(is_month()){
            echo '<p>&nbsp;&raquo;&nbsp;'.get_the_time(__('Y年F')).'</p>';
          }
          if(is_year()){
            echo '<p>&nbsp;&raquo;&nbsp;'.get_the_time(__('Y年')).'</p>';
          }
          if(is_tag()){
            echo '<p>&nbsp;&raquo;&nbsp;'.single_tag_title('' , false).'</p>';
          }
        }elseif(is_post_type_archive()){
        /*** custom post ***/
        /*** custom post ***/
        }elseif(is_attachment()){
          echo '<p>&nbsp;&raquo;&nbsp;'.get_the_title().'</p>';
        }elseif(is_search()){
          echo '<p>&nbsp;&raquo;&nbsp;'.__('Search').'</p>';
        }elseif(is_404()){
          echo '<p>&nbsp;&raquo;&nbsp;404 Not Found</p>';
        }elseif(is_single()){
          $single_the_cat = get_the_category();
          $single_the_cat_id = get_cat_ID($single_the_cat[0]->cat_name);
            foreach($single_the_cat as $single_the_cats){
              if($single_the_cats->parent == 0){ 
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.get_category_link($single_the_cats->cat_ID).'">'.$single_the_cats->cat_name.'</a></p>';
              }
              if($single_the_cats->parent){
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.get_category_link($single_the_cats->cat_ID).'">'.$single_the_cats->cat_name.'</a></p>';
              }
                }
            echo '<p>&nbsp;&raquo;&nbsp;'.the_title('','', false).'</p>';
        }elseif(is_page()){
          $post = $wp_query->get_queried_object();
            if($post->post_parent == 0){
              if(isset($_GET['page']) && $_GET['page'] == 'search_item'){
              /*** usces search item ***/
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'.__('Items','usces').__('An article category keyword search','usces').'</a></p>';
              /*** usces search item ***/
              }elseif(isset($_GET['page']) && $_GET['page'] == 'newmember'){
              /*** usces newmember page ***/
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'.__('Membership Registration','usces').'</a></p>';
              /*** usces newmember page ***/
              }elseif(isset($_GET['page']) && $_GET['page'] == 'login'){
              /*** usces login page ***/
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'.__('Log-in','usces').'</a></p>';
              /*** usces login page ***/
              }elseif(isset($_GET['page']) && $_GET['page'] == 'lostmemberpassword'){
              /*** usces lostmemberpassword page ***/
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'.__('The new password acquisition','usces').'</a></p>';
              /*** usces lostmemberpassword page ***/
              }elseif(isset($_GET['uscesmode']) && $_GET['uscesmode'] == 'changepassword'){
              /*** usces changepassword page ***/
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'.__('Change password','usces').'</a></p>';
              /*** usces changepassword page ***/
              }else{
                echo '<p>&nbsp;&raquo;&nbsp;<a href="'.get_permalink().'">'.the_title('','', false).'</a></p>';
              }
            }else{
              $title = the_title('','', false);
              $ancestors = array_reverse(get_post_ancestors($post->ID));
                 array_push($ancestors, $post->ID);
                   foreach($ancestors as $ancestor){
                     if($ancestor != end($ancestors)){
                       echo '<p>&nbsp;&raquo;&nbsp;<a href="'.get_permalink($ancestor).'">'.strip_tags(apply_filters('single_post_title', get_the_title( $ancestor))).'</a></p>';
                     }else{
                       echo '<p>&nbsp;&raquo;&nbsp;'.strip_tags(apply_filters('single_post_title', get_the_title($ancestor))).'</p>';
                     }
                   }
            }
        }
     }
 }

 function tx_breadcrumbs_sort($breadcrumbs_sort_category){
   sort($breadcrumbs_sort_category);
   return $breadcrumbs_sort_category;
 }
 add_filter('get_the_categories', 'tx_breadcrumbs_sort');

// Breadcrumb

// ----- Attachment Page
 function tx_attachment_redirect(){
   global $wp_query;
     if(is_attachment()){
       $wp_query->set_404();
       status_header(404);
     }
 }
 add_action('template_redirect', 'tx_attachment_redirect');
// Attachment Page

// ----- Usces Plugin
if(!defined('USCES_VERSION')) return;

/***********************************************************
* SSL welcart_default functions.php
***********************************************************/
if( $usces->options['use_ssl'] ){
	add_action('init', 'usces_ob_start');
	function usces_ob_start(){
		global $usces;
		if( $usces->use_ssl && ($usces->is_cart_or_member_page($_SERVER['REQUEST_URI']) || $usces->is_inquiry_page($_SERVER['REQUEST_URI'])) )
			ob_start('usces_ob_callback');
	}
	if ( ! function_exists( 'usces_ob_callback' ) ) {
		function usces_ob_callback($buffer){
			global $usces;
			$pattern = array(
				'|(<[^<]*)href=\"'.get_option('siteurl').'([^>]*)\.css([^>]*>)|', 
				'|(<[^<]*)src=\"'.get_option('siteurl').'([^>]*>)|'
			);
			$replacement = array(
				'${1}href="'.USCES_SSL_URL_ADMIN.'${2}.css${3}', 
				'${1}src="'.USCES_SSL_URL_ADMIN.'${2}'
			);
			$buffer = preg_replace($pattern, $replacement, $buffer);
			return $buffer;
		}
	}
}
/***********************************************************
* 共有SSL
***********************************************************/
 function tx_share_ssl($notuse){
   if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
     return $_SERVER['HTTP_X_FORWARDED_FOR'];
   }
     return $_SERVER['REMOTE_ADDR'];
 }
 add_filter('usces_sessid_force', 'tx_share_ssl');
// Usces Plugin
?>