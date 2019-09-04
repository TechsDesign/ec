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
    function txpsw_widget_forking_query($wp_query){
            $widget_instance = get_option('widget_txpsw-widget');
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
                    $wp_query->set('meta_key', 'widget_txpsw-widget');
                    $wp_query->set('order', 'DESC');
                        foreach($widget_instance as $instance){
                            if(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form1'].'-'.$instance['txpsw_widgrt_form2'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form1'], $instance['txpsw_widgrt_form2']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form3'].'-'.$instance['txpsw_widgrt_form4'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form3'], $instance['txpsw_widgrt_form4']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form5'].'-'.$instance['txpsw_widgrt_form6'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form5'], $instance['txpsw_widgrt_form6']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form7'].'-'.$instance['txpsw_widgrt_form8'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form7'], $instance['txpsw_widgrt_form8']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form9'].'-'.$instance['txpsw_widgrt_form10'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form9'], $instance['txpsw_widgrt_form10']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form11'].'-'.$instance['txpsw_widgrt_form12'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form11'], $instance['txpsw_widgrt_form12']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form13'].'-'.$instance['txpsw_widgrt_form14'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form13'], $instance['txpsw_widgrt_form14']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form15'].'-'.$instance['txpsw_widgrt_form16'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array($instance['txpsw_widgrt_form15'], $instance['txpsw_widgrt_form16']), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(isset($_GET['price_search']) && (esc_attr($_GET['price_search']) == $instance['txpsw_widgrt_form17'])){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=> $instance['txpsw_widgrt_form17'], 'compare'=>'>', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(!empty($txpsw_submit1) && empty($txpsw_submit2)){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>esc_attr($_GET['price_form1']), 'compare'=>'>=', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(empty($txpsw_submit1) && !empty($txpsw_submit2)){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>esc_attr($_GET['price_form2']), 'compare'=>'<=', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }elseif(!empty($txpsw_submit1) && !empty($txpsw_submit2)){
                                $txpsw_query = array(array('key'=>'widget_txpsw-widget', 'value'=>array(esc_attr($_GET['price_form1']), esc_attr($_GET['price_form2'])), 'compare'=>'BETWEEN', 'type'=>'NUMERIC'));
                                $wp_query->set('meta_query', $txpsw_query);
                            }else{
                                $wp_query->set('orderby', 'ID');
                                $wp_query->set('order', 'DESC');
                            }
                        }
                        return;
                }

    }
    add_action('pre_get_posts', 'txpsw_widget_forking_query');
// ----- Price Sort System
?>