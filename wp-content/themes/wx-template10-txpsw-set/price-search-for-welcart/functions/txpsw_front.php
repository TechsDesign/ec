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

// ----- Front Price Button
    function txpsw_front_code($atts){
        if(TXPSW_TEMPLATE_AUTHOR !== 'TEMPLX'){
            $txpsw_options = get_option('txpsw_add_page_update');
            $txpsw_cat_item_slug = get_category_by_slug('item');
            $txpsw_cat_item_url = get_category_link($txpsw_cat_item_slug->term_id);
            $txpsw_cat_children = get_term_children($txpsw_cat_item_slug->term_id, 'category');
            $txpsw_cat_id = get_query_var('cat');
            $txpsw_cat_url = get_category_link($txpsw_cat_id);

                if(!empty($txpsw_options['txpsw_form_title'])){
                    $txpsw_get_title = esc_attr($txpsw_options['txpsw_form_title']);
                }else{
                    $txpsw_get_title = '';
                }

            $txpsw_atts = shortcode_atts(array('title' => $txpsw_get_title), $atts);
            $txpsw_string_html = '';

                if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                    // Item Category true
                    $txpsw_query_string1 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form1']).'-'.esc_attr($txpsw_options['txpsw_form2'])), $txpsw_cat_url);
                    $txpsw_query_string2 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form3']).'-'.esc_attr($txpsw_options['txpsw_form4'])), $txpsw_cat_url);
                    $txpsw_query_string3 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form5']).'-'.esc_attr($txpsw_options['txpsw_form6'])), $txpsw_cat_url);
                    $txpsw_query_string4 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form7']).'-'.esc_attr($txpsw_options['txpsw_form8'])), $txpsw_cat_url);
                    $txpsw_query_string5 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form9']).'-'.esc_attr($txpsw_options['txpsw_form10'])), $txpsw_cat_url);
                    $txpsw_query_string6 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form11']).'-'.esc_attr($txpsw_options['txpsw_form12'])), $txpsw_cat_url);
                    $txpsw_query_string7 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form13']).'-'.esc_attr($txpsw_options['txpsw_form14'])), $txpsw_cat_url);
                    $txpsw_query_string8 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form15']).'-'.esc_attr($txpsw_options['txpsw_form16'])), $txpsw_cat_url);
                    $txpsw_query_string9 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form17'])), $txpsw_cat_url);
                }else{
                    // Item Category false
                    $txpsw_query_string1 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form1']).'-'.esc_attr($txpsw_options['txpsw_form2'])), $txpsw_cat_item_url);
                    $txpsw_query_string2 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form3']).'-'.esc_attr($txpsw_options['txpsw_form4'])), $txpsw_cat_item_url);
                    $txpsw_query_string3 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form5']).'-'.esc_attr($txpsw_options['txpsw_form6'])), $txpsw_cat_item_url);
                    $txpsw_query_string4 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form7']).'-'.esc_attr($txpsw_options['txpsw_form8'])), $txpsw_cat_item_url);
                    $txpsw_query_string5 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form9']).'-'.esc_attr($txpsw_options['txpsw_form10'])), $txpsw_cat_item_url);
                    $txpsw_query_string6 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form11']).'-'.esc_attr($txpsw_options['txpsw_form12'])), $txpsw_cat_item_url);
                    $txpsw_query_string7 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form13']).'-'.esc_attr($txpsw_options['txpsw_form14'])), $txpsw_cat_item_url);
                    $txpsw_query_string8 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form15']).'-'.esc_attr($txpsw_options['txpsw_form16'])), $txpsw_cat_item_url);
                    $txpsw_query_string9 = add_query_arg(array('price_search' => esc_attr($txpsw_options['txpsw_form17'])), $txpsw_cat_item_url);
                }

                    // Title
                    $txpsw_string_html .= '<div class="txpsw-title"><h2><span>'.$txpsw_atts['title'].'</span></h2></div>'."\n";

                        // Each Price Button
                        $txpsw_string_html .= '<div class="txpsw-wrap"><ul>'."\n";
                            if(!empty($txpsw_options['txpsw_form1']) && !empty($txpsw_options['txpsw_form2'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string1).'">'.esc_attr($txpsw_options['txpsw_form1']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form2']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form3']) && !empty($txpsw_options['txpsw_form4'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string2).'">'.esc_attr($txpsw_options['txpsw_form3']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form4']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form5']) && !empty($txpsw_options['txpsw_form6'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string3).'">'.esc_attr($txpsw_options['txpsw_form5']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form6']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form7']) && !empty($txpsw_options['txpsw_form8'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string4).'">'.esc_attr($txpsw_options['txpsw_form7']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form8']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form9']) && !empty($txpsw_options['txpsw_form10'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string5).'">'.esc_attr($txpsw_options['txpsw_form9']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form10']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form11']) && !empty($txpsw_options['txpsw_form12'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string6).'">'.esc_attr($txpsw_options['txpsw_form11']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form12']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form13']) && !empty($txpsw_options['txpsw_form14'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string7).'">'.esc_attr($txpsw_options['txpsw_form13']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form14']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form15']) && !empty($txpsw_options['txpsw_form16'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string8).'">'.esc_attr($txpsw_options['txpsw_form15']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($txpsw_options['txpsw_form16']).__('USD','txpsw').'</a></li>'."\n";
                            }
                            if(!empty($txpsw_options['txpsw_form17'])){
                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string9).'">'.esc_attr($txpsw_options['txpsw_form17']).__('USD','txpsw').'</a>&nbsp;'.__('or more','txpsw').'</li>'."\n";
                            }
                        $txpsw_string_html .= '</ul></div>'."\n";

                            // Price Form Button
                            if(!empty($txpsw_options['txpsw_form_any'])){
                                $txpsw_permalink = get_option('permalink_structure');

                                    if(isset($_GET['price_form1'])){
                                        $txpsw_price_any1 = esc_attr($_GET['price_form1']);
                                    }else{
                                        $txpsw_price_any1 = '';
                                    }
                                    if(isset($_GET['price_form2'])){
                                        $txpsw_price_any2 = esc_attr($_GET['price_form2']);
                                    }else{
                                        $txpsw_price_any2 = '';
                                    }

                                        $txpsw_string_html .= '<div class="txpsw-wrap-form">'."\n";

                                        if(!empty($txpsw_options['txpsw_price_form_title'])){
                                            $txpsw_string_html .= '<p class="title">'.esc_attr($txpsw_options['txpsw_price_form_title']).'</p>'."\n";
                                        }

                                            if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                                                $txpsw_string_html .= '<form action="'.esc_attr($_SERVER['REQUEST_URI']).'" method="get">'."\n";
                                            }else{
                                                $txpsw_string_html .= '<form action="'.$txpsw_cat_item_url.'" method="get">'."\n";
                                            }

                                                if(empty($txpsw_permalink)){
                                                    if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                                                        $txpsw_string_html .= '<input type="hidden" name="cat" value="'.$txpsw_cat_id.'" />'."\n";
                                                    }else{
                                                        $txpsw_string_html .= '<input type="hidden" name="cat" value="'.$txpsw_cat_item_slug->term_id.'" />'."\n";
                                                    }
                                                }
                                        $txpsw_string_html .= '<div class="txpsw-price-input">'."\n";
                                        $txpsw_string_html .= '<p><input type="number" class="price-input" name="price_form1" value="'.$txpsw_price_any1.'" /><span>&#045;</span>';
                                        $txpsw_string_html .= '<input type="number" class="price-input" name="price_form2" value="'.$txpsw_price_any2.'" /></p>'."\n";
                                        $txpsw_string_html .= '</div>'."\n";
                                        $txpsw_string_html .= '<input type="submit" class="txpsw_any_submit" value="'.__('Search','txpsw').'" />'."\n";
                                        $txpsw_string_html .= '</form>'."\n";
                                        $txpsw_string_html .= '</div>'."\n";
                            }

            $txpsw_string_html = apply_filters('txpsw_front_filter', $txpsw_string_html);
                return $txpsw_string_html;
        }
    }
    add_shortcode('txpsw_shortcode', 'txpsw_front_code');
// ----- Front Price Button

// ----- Read Css File
    function txpsw_css_style(){
        $txpsw_options = get_option('txpsw_add_page_update');
            if(empty($txpsw_options['txpsw_front_css'])){
                wp_enqueue_style('txpsw', TXPSW_PLUGIN_URL.'css/txpsw.css', array(), NULL, 'all');
            }
    }
    add_action('wp_enqueue_scripts', 'txpsw_css_style');
// ----- Read Css File
?>