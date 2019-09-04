<?php
/*-------------- Can not delete / edit ---------------------------------------------

Plugin Name: TX Price Search for Welcart
Plugin URI: https://templx.com/
Description: It is only for this plugin: Welcart e-Commerce.
Author: TEMPLX
Author URI: https://templx.com/
License: GPLv2 or later

///////////////////////////////////////////////////////////////////
Copyright is still in TEMPLX even after purchase.
We will prohibit change / deletion of copyright owner and URL etc.
///////////////////////////////////////////////////////////////////

--------------- Can not delete / edit --------------------------------------------- */

    define('TXPSW_VERSION', '1.0');
    define('TXPSW_PLUGIN_DIR', plugin_dir_path(__FILE__));
    define('TXPSW_PLUGIN_URL', plugin_dir_url(__FILE__));

// ----- TXPSW Update
    function txpsw_update_setting(){
        update_option('TXPSW_VERSION', '1.1');
        $txpsw_plugin_options = get_option('txpsw_add_page_update');
            $txpsw_add_array = array(
                                     'txpsw_form_any'=>'',
                                     'txpsw_front_css'=>'',
                                     'txpsw_form_title'=>'',
                                     'txpsw_price_form_title'=>'',
                                     'txpsw_templx_display'=>'',
                                     'txpsw_form1'=>'',
                                     'txpsw_form2'=>'',
                                     'txpsw_form3'=>'',
                                     'txpsw_form4'=>'',
                                     'txpsw_form5'=>'',
                                     'txpsw_form6'=>'',
                                     'txpsw_form7'=>'',
                                     'txpsw_form8'=>'',
                                     'txpsw_form9'=>'',
                                     'txpsw_form10'=>'',
                                     'txpsw_form11'=>'',
                                     'txpsw_form12'=>'',
                                     'txpsw_form13'=>'',
                                     'txpsw_form14'=>'',
                                     'txpsw_form15'=>'',
                                     'txpsw_form16'=>'',
                                     'txpsw_form17'=>''
            );

                    if(!$txpsw_plugin_options){
                        update_option('txpsw_add_page_update', $txpsw_add_array);
                    }

    }
    register_activation_hook(__FILE__, 'txpsw_update_setting');
// ----- TXPSW Update

// ----- Read File
    $txpsw_languages = basename(dirname(__FILE__));
    $txpsw_template_data = wp_get_theme();
    $txpsw_template_author = $txpsw_template_data->get('Author');
        define('TXPSW_TEMPLATE_AUTHOR', $txpsw_template_author);
        load_plugin_textdomain('txpsw', false, $txpsw_languages. '/languages');
            require_once(TXPSW_PLUGIN_DIR. 'functions/txpsw_admin.php');
            require_once(TXPSW_PLUGIN_DIR. 'functions/txpsw_widget_function.php');
            require_once(TXPSW_PLUGIN_DIR. 'functions/txpsw_widget.php');
                if(TXPSW_TEMPLATE_AUTHOR !== 'TEMPLX'){
                    require_once(TXPSW_PLUGIN_DIR. 'functions/txpsw_front.php');
                    require_once(TXPSW_PLUGIN_DIR. 'functions/txpsw_function.php');
                }elseif(TXPSW_TEMPLATE_AUTHOR === 'TEMPLX'){
                   require_once(TXPSW_PLUGIN_DIR. 'functions/templx/txpsw_templx_front.php');
                    require_once(TXPSW_PLUGIN_DIR. 'functions/templx/txpsw_templx_function.php');
                }
// ----- Read File

// ----- Widget Registration
    function txpsw_widget_registration(){
	register_widget('TXPSW_widget');
    }
    add_action('widgets_init', 'txpsw_widget_registration');
// ----- Widget Registration
?>