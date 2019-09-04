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

// ----- Price Sort System
    function txpsw_forking_query($wp_query){
        if(TXPSW_TEMPLATE_AUTHOR !== 'TEMPLX'){
            $txpsw_options = get_option('txpsw_add_page_update');
            $txpsw_submit1 = isset($_GET['price_form1']) && esc_attr($_GET['price_form1']);
            $txpsw_submit2 = isset($_GET['price_form2']) && esc_attr($_GET['price_form2']);
            $txpsw_cat_item_slug = get_category_by_slug('item');
            $txpsw_cat_item_url = get_category_link($txpsw_cat_item_slug->term_id);
            $txpsw_cat_children = get_term_children($txpsw_cat_item_slug->term_id, 'category');

                if(is_admin() || !$wp_query->is_main_query()){
                    return;
                }

                if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                    // Item Search
                    $wp_query->set('orderby', 'ID');
                    $wp_query->set('meta_key', 'txpsw_db_prices');
                    $wp_query->set('order', 'DESC');
                        if(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form1'].'-'.$txpsw_options['txpsw_form2'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form1'], $txpsw_options['txpsw_form2']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form3'].'-'.$txpsw_options['txpsw_form4'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form3'], $txpsw_options['txpsw_form4']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form5'].'-'.$txpsw_options['txpsw_form6'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form5'], $txpsw_options['txpsw_form6']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form7'].'-'.$txpsw_options['txpsw_form8'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form7'], $txpsw_options['txpsw_form8']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form9'].'-'.$txpsw_options['txpsw_form10'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form9'], $txpsw_options['txpsw_form10']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form11'].'-'.$txpsw_options['txpsw_form12'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form11'], $txpsw_options['txpsw_form12']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form13'].'-'.$txpsw_options['txpsw_form14'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form13'], $txpsw_options['txpsw_form14']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form15'].'-'.$txpsw_options['txpsw_form16'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array($txpsw_options['txpsw_form15'], $txpsw_options['txpsw_form16']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $txpsw_options['txpsw_form17'])){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=> $txpsw_options['txpsw_form17'], 'compare'=>'>', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(!empty($txpsw_submit1) && empty($txpsw_submit2)){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>esc_attr($_GET['price_form1']), 'compare'=>'>=', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(empty($txpsw_submit1) && !empty($txpsw_submit2)){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>esc_attr($_GET['price_form2']), 'compare'=>'<=', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }elseif(!empty($txpsw_submit1) && !empty($txpsw_submit2)){
                            $txpsw_query = array(array('key'=>'txpsw_db_prices', 'value'=>array(esc_attr($_GET['price_form1']), esc_attr($_GET['price_form2'])), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                            $wp_query->set('meta_query', $txpsw_query);
                        }else{
                            $wp_query->set('orderby', 'ID');
                            $wp_query->set('order', 'DESC');
                        }
                        return;
                }

                if($wp_query->is_archive()){
                    $wp_query->set('orderby', 'ID');
                    $wp_query->set('order', 'DESC');
                    return;
                }

        }
    }
    add_action('pre_get_posts', 'txpsw_forking_query');
// ----- Price Sort System
?>