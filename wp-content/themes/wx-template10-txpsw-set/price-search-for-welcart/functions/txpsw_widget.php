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

// ----- Price Search Widget
    class TXPSW_widget extends WP_Widget{
        function __construct(){
            $widget_options = array(
                                    'classname'  => 'txpsw-widget',
                                    'description' => __('Filter by price','txpsw')
            );
            parent::__construct('txpsw-widget', __('Price Search For Welcart','txpsw'), $widget_options);
        }

        function widget($args, $instance){
            extract($args);
                $txpsw_options = get_option('txpsw_add_page_update');
                $txpsw_cat_item_slug = get_category_by_slug('item');
                $txpsw_cat_item_url = get_category_link($txpsw_cat_item_slug->term_id);
                $txpsw_cat_children = get_term_children($txpsw_cat_item_slug->term_id, 'category');
                $txpsw_cat_id = get_query_var('cat');
                $txpsw_cat_url = get_category_link($txpsw_cat_id);

                    if(!empty($instance['txpsw_widget_form_on'])){
                        $txpsw_widget_form_on_option = esc_attr($instance['txpsw_widget_form_on']);
                    }else{
                        $txpsw_widget_form_on_option = 'off';
                    }

                // Widget Start
                echo $args['before_widget'];

                        if($instance['txpsw_widget_form_on'] === 'on'){

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
                                    if(!empty($txpsw_options['txpsw_form_title'])){
                                        $txpsw_string_html .= $args['before_title'].esc_attr($txpsw_options['txpsw_form_title']).$args['after_title']."\n";
                                    }

                                        // Each Price Button
                                        $txpsw_string_html .= '<div class="txpsw-widget-wrap"><ul>'."\n";
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
                                                $txpsw_string_html .= '<li><a href="'.esc_url($txpsw_query_string9).'">'.esc_attr($txpsw_options['txpsw_form17']).__('USD','txpsw').'&nbsp;'.__('or more','txpsw').'</a></li>'."\n";
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

                                                        $txpsw_string_html .= '<div class="txpsw-widget-wrap-form">'."\n";

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

                                        $txpsw_string_html = apply_filters('txpsw_front_filter_widget_display', $txpsw_string_html);
                                            echo $txpsw_string_html;

                        }else{

                            $txpsw_widget_string_html = '';
                                if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                                    // Item Category true
                                    $txpsw_query_string1 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form1']).'-'.esc_attr($instance['txpsw_widgrt_form2'])), $txpsw_cat_url);
                                    $txpsw_query_string2 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form3']).'-'.esc_attr($instance['txpsw_widgrt_form4'])), $txpsw_cat_url);
                                    $txpsw_query_string3 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form5']).'-'.esc_attr($instance['txpsw_widgrt_form6'])), $txpsw_cat_url);
                                    $txpsw_query_string4 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form7']).'-'.esc_attr($instance['txpsw_widgrt_form8'])), $txpsw_cat_url);
                                    $txpsw_query_string5 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form9']).'-'.esc_attr($instance['txpsw_widgrt_form10'])), $txpsw_cat_url);
                                    $txpsw_query_string6 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form11']).'-'.esc_attr($instance['txpsw_widgrt_form12'])), $txpsw_cat_url);
                                    $txpsw_query_string7 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form13']).'-'.esc_attr($instance['txpsw_widgrt_form14'])), $txpsw_cat_url);
                                    $txpsw_query_string8 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form15']).'-'.esc_attr($instance['txpsw_widgrt_form16'])), $txpsw_cat_url);
                                    $txpsw_query_string9 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form17'])), $txpsw_cat_url);
                                }else{
                                    // Item Category false
                                    $txpsw_query_string1 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form1']).'-'.esc_attr($instance['txpsw_widgrt_form2'])), $txpsw_cat_item_url);
                                    $txpsw_query_string2 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form3']).'-'.esc_attr($instance['txpsw_widgrt_form4'])), $txpsw_cat_item_url);
                                    $txpsw_query_string3 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form5']).'-'.esc_attr($instance['txpsw_widgrt_form6'])), $txpsw_cat_item_url);
                                    $txpsw_query_string4 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form7']).'-'.esc_attr($instance['txpsw_widgrt_form8'])), $txpsw_cat_item_url);
                                    $txpsw_query_string5 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form9']).'-'.esc_attr($instance['txpsw_widgrt_form10'])), $txpsw_cat_item_url);
                                    $txpsw_query_string6 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form11']).'-'.esc_attr($instance['txpsw_widgrt_form12'])), $txpsw_cat_item_url);
                                    $txpsw_query_string7 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form13']).'-'.esc_attr($instance['txpsw_widgrt_form14'])), $txpsw_cat_item_url);
                                    $txpsw_query_string8 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form15']).'-'.esc_attr($instance['txpsw_widgrt_form16'])), $txpsw_cat_item_url);
                                    $txpsw_query_string9 = add_query_arg(array('price_search' => esc_attr($instance['txpsw_widgrt_form17'])), $txpsw_cat_item_url);
                                }

                                    if(!empty($instance['title'])){
                                        echo $args['before_title']. esc_attr($instance['title']) .$args['after_title'];
                                    }

                                        // Each Price Button
                                        $txpsw_widget_string_html .= '<div class="txpsw-widget-wrap"><ul>'."\n";
                                            if(!empty($instance['txpsw_widgrt_form1']) && !empty($instance['txpsw_widgrt_form2'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string1).'">'.esc_attr($instance['txpsw_widgrt_form1']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form2']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form3']) && !empty($instance['txpsw_widgrt_form4'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string2).'">'.esc_attr($instance['txpsw_widgrt_form3']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form4']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form5']) && !empty($instance['txpsw_widgrt_form6'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string3).'">'.esc_attr($instance['txpsw_widgrt_form5']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form6']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form7']) && !empty($instance['txpsw_widgrt_form8'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string4).'">'.esc_attr($instance['txpsw_widgrt_form7']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form8']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form9']) && !empty($instance['txpsw_widgrt_form10'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string5).'">'.esc_attr($instance['txpsw_widgrt_form9']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form10']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form11']) && !empty($instance['txpsw_widgrt_form12'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string6).'">'.esc_attr($instance['txpsw_widgrt_form11']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form12']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form13']) && !empty($instance['txpsw_widgrt_form14'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string7).'">'.esc_attr($instance['txpsw_widgrt_form13']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form14']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form15']) && !empty($instance['txpsw_widgrt_form16'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string8).'">'.esc_attr($instance['txpsw_widgrt_form15']).__('USD','txpsw').'<span>&#045;</span>'.esc_attr($instance['txpsw_widgrt_form16']).__('USD','txpsw').'</a></li>'."\n";
                                            }
                                            if(!empty($instance['txpsw_widgrt_form17'])){
                                                $txpsw_widget_string_html .= '<li><a href="'.esc_url($txpsw_query_string9).'">'.esc_attr($instance['txpsw_widgrt_form17']).__('USD','txpsw').'&nbsp;'.__('or more','txpsw').'</a></li>'."\n";
                                            }
                                        $txpsw_widget_string_html .= '</ul></div>'."\n";

                                            // Price Form Button
                                            if(!empty($instance['txpsw_widget_form_any'])){
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

                                                        $txpsw_widget_string_html .= '<div class="txpsw-widget-wrap-widget-form">'."\n";

                                                        if(!empty($instance['txpsw_widget_price_form_title'])){
                                                            $txpsw_widget_string_html .= '<p class="title">'.esc_attr($instance['txpsw_widget_price_form_title']).'</p>'."\n";
                                                        }

                                                            if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                                                                $txpsw_widget_string_html .= '<form action="'.esc_attr($_SERVER['REQUEST_URI']).'" method="get">'."\n";
                                                            }else{
                                                                $txpsw_widget_string_html .= '<form action="'.$txpsw_cat_item_url.'" method="get">'."\n";
                                                            }

                                                                if(empty($txpsw_permalink)){
                                                                    if(is_category($txpsw_cat_item_slug->term_id) || is_category($txpsw_cat_children)){
                                                                        $txpsw_widget_string_html .= '<input type="hidden" name="cat" value="'.$txpsw_cat_id.'" />'."\n";
                                                                    }else{
                                                                        $txpsw_widget_string_html .= '<input type="hidden" name="cat" value="'.$txpsw_cat_item_slug->term_id.'" />'."\n";
                                                                    }
                                                                }

                                                            $txpsw_widget_string_html .= '<div class="txpsw-widget-price-input">'."\n";
                                                            $txpsw_widget_string_html .= '<p><input type="number" class="widget-price-input" name="price_form1" value="'.$txpsw_price_any1.'" /><span>&#045;</span>';
                                                            $txpsw_widget_string_html .= '<input type="number" class="widget-price-input" name="price_form2" value="'.$txpsw_price_any2.'" /></p>'."\n";
                                                            $txpsw_widget_string_html .= '</div>'."\n";
                                                            $txpsw_widget_string_html .= '<input type="submit" class="txpsw_widget_any_submit" value="'.__('Search','txpsw').'" />'."\n";
                                                            $txpsw_widget_string_html .= '</form>'."\n";
                                                            $txpsw_widget_string_html .= '</div>'."\n";

                                                }

                                        $txpsw_widget_string_html = apply_filters('txpsw_widget_front_filter', $txpsw_widget_string_html);
                                            echo $txpsw_widget_string_html;

                        }

                echo $args['after_widget'];

        }

        function form($instance){
            if(!empty($instance['title'])){
                $title = esc_attr($instance['title']);
            }else{
                $title = '';
            }
            if(!empty($instance['txpsw_widget_form_any'])){
                $txpsw_widget_form_any_option = esc_attr($instance['txpsw_widget_form_any']);
            }else{
                $txpsw_widget_form_any_option = '';
            }
            if(!empty($instance['txpsw_widget_form_on'])){
                $txpsw_widget_form_on_option = esc_attr($instance['txpsw_widget_form_on']);
            }else{
                $txpsw_widget_form_on_option = '';
            }
            if(!empty($instance['txpsw_widget_price_form_title'])){
                $txpsw_widget_price_form_option = esc_attr($instance['txpsw_widget_price_form_title']);
            }else{
                $txpsw_widget_price_form_option = '';
            }
            if(!empty($instance['txpsw_widgrt_form1'])){
                $txpsw_widgrt_option1 = esc_attr($instance['txpsw_widgrt_form1']);
            }else{
                $txpsw_widgrt_option1 = '';
            }
            if(!empty($instance['txpsw_widgrt_form2'])){
                $txpsw_widgrt_option2 = esc_attr($instance['txpsw_widgrt_form2']);
            }else{
                $txpsw_widgrt_option2 = '';
            }
            if(!empty($instance['txpsw_widgrt_form3'])){
                $txpsw_widgrt_option3 = esc_attr($instance['txpsw_widgrt_form3']);
            }else{
                $txpsw_widgrt_option3 = '';
            }
            if(!empty($instance['txpsw_widgrt_form4'])){
                $txpsw_widgrt_option4 = esc_attr($instance['txpsw_widgrt_form4']);
            }else{
                $txpsw_widgrt_option4 = '';
            }
            if(!empty($instance['txpsw_widgrt_form5'])){
                $txpsw_widgrt_option5 = esc_attr($instance['txpsw_widgrt_form5']);
            }else{
                $txpsw_widgrt_option5 = '';
            }
            if(!empty($instance['txpsw_widgrt_form6'])){
                $txpsw_widgrt_option6 = esc_attr($instance['txpsw_widgrt_form6']);
            }else{
                $txpsw_widgrt_option6 = '';
            }
            if(!empty($instance['txpsw_widgrt_form7'])){
                $txpsw_widgrt_option7 = esc_attr($instance['txpsw_widgrt_form7']);
            }else{
                $txpsw_widgrt_option7 = '';
            }
            if(!empty($instance['txpsw_widgrt_form8'])){
                $txpsw_widgrt_option8 = esc_attr($instance['txpsw_widgrt_form8']);
            }else{
                $txpsw_widgrt_option8 = '';
            }
            if(!empty($instance['txpsw_widgrt_form9'])){
                $txpsw_widgrt_option9 = esc_attr($instance['txpsw_widgrt_form9']);
            }else{
                $txpsw_widgrt_option9 = '';
            }
            if(!empty($instance['txpsw_widgrt_form10'])){
                $txpsw_widgrt_option10 = esc_attr($instance['txpsw_widgrt_form10']);
            }else{
                $txpsw_widgrt_option10 = '';
            }
            if(!empty($instance['txpsw_widgrt_form11'])){
                $txpsw_widgrt_option11 = esc_attr($instance['txpsw_widgrt_form11']);
            }else{
                $txpsw_widgrt_option11 = '';
            }
            if(!empty($instance['txpsw_widgrt_form12'])){
                $txpsw_widgrt_option12 = esc_attr($instance['txpsw_widgrt_form12']);
            }else{
                $txpsw_widgrt_option12 = '';
            }
            if(!empty($instance['txpsw_widgrt_form13'])){
                $txpsw_widgrt_option13 = esc_attr($instance['txpsw_widgrt_form13']);
            }else{
                $txpsw_widgrt_option13 = '';
            }
            if(!empty($instance['txpsw_widgrt_form14'])){
                $txpsw_widgrt_option14 = esc_attr($instance['txpsw_widgrt_form14']);
            }else{
                $txpsw_widgrt_option14 = '';
            }
            if(!empty($instance['txpsw_widgrt_form15'])){
                $txpsw_widgrt_option15 = esc_attr($instance['txpsw_widgrt_form15']);
            }else{
                $txpsw_widgrt_option15 = '';
            }
            if(!empty($instance['txpsw_widgrt_form16'])){
                $txpsw_widgrt_option16 = esc_attr($instance['txpsw_widgrt_form16']);
            }else{
                $txpsw_widgrt_option16 = '';
            }
            if(!empty($instance['txpsw_widgrt_form17'])){
                $txpsw_widgrt_option17 = esc_attr($instance['txpsw_widgrt_form17']);
            }else{
                $txpsw_widgrt_option17 = '';
            }
?>

                    <div id="txpsw-admin-page-widget">

                        <div id="txpsw-admin-widget-onoff">
                            <p>
                                <label class="txpsw-admin-widget-onoff-title"><?php _e('Use the [TX Price Search for Welcart] setting','txpsw'); ?></label>
                                     <?php if(empty($txpsw_widget_form_on_option)){ ?>
                                          <label><input type="radio" class="txpsw-admin-widget-radio" name="<?php echo $this->get_field_name('txpsw_widget_form_on'); ?>" value="on" <?php if($txpsw_widget_form_on_option === 'on'){ echo ' checked="checked"';} ?> />ON</label>
                                          <label><input type="radio" class="txpsw-admin-widget-radio" name="<?php echo $this->get_field_name('txpsw_widget_form_on'); ?>" value="off" checked="checked" />OFF</label>
                                     <?php }else{ ?>
                                          <label><input type="radio" class="txpsw-admin-widget-radio" name="<?php echo $this->get_field_name('txpsw_widget_form_on'); ?>" value="on" <?php if($txpsw_widget_form_on_option === 'on'){ echo ' checked="checked"';} ?> />ON</label>
                                          <label><input type="radio" class="txpsw-admin-widget-radio" name="<?php echo $this->get_field_name('txpsw_widget_form_on'); ?>" value="off" <?php if($txpsw_widget_form_on_option === 'off'){ echo ' checked="checked"';} ?> />OFF</label>
                                     <?php } ?>
                            </p>
                        </div>

                        <div id="txpsw-admin-widget-title">
                            <p>
                                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Enter Title','txpsw'); ?></label>
                                <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
                            </p>
                        </div>

                        <div id="txpsw-admin-widget-input-text">
                            <label class="txpsw-admin-widget-input-text-title"><?php _e('Please input a price to narrow it down.','txpsw'); ?></label>
                                <p>
                                    <label>[1]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form1'); ?>" value="<?php echo $txpsw_widgrt_option1; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form2'); ?>" value="<?php echo $txpsw_widgrt_option2; ?>" />
                                </p>
                                <p>
                                    <label>[2]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form3'); ?>" value="<?php echo $txpsw_widgrt_option3; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form4'); ?>" value="<?php echo $txpsw_widgrt_option4; ?>" />
                                </p>
                                <p>
                                    <label>[3]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form5'); ?>" value="<?php echo $txpsw_widgrt_option5; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form6'); ?>" value="<?php echo $txpsw_widgrt_option6; ?>" />
                                </p>
                                <p>
                                    <label>[4]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form7'); ?>" value="<?php echo $txpsw_widgrt_option7; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form8'); ?>" value="<?php echo $txpsw_widgrt_option8; ?>" />
                                </p>
                                <p>
                                    <label>[5]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form9'); ?>" value="<?php echo $txpsw_widgrt_option9; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form10'); ?>" value="<?php echo $txpsw_widgrt_option10; ?>" />
                                </p>
                                <p>
                                    <label>[6]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form11'); ?>" value="<?php echo $txpsw_widgrt_option11; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form12'); ?>" value="<?php echo $txpsw_widgrt_option12; ?>" />
                                </p>
                                <p>
                                    <label>[7]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form13'); ?>" value="<?php echo $txpsw_widgrt_option13; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form14'); ?>" value="<?php echo $txpsw_widgrt_option14; ?>" />
                                </p>
                                <p>
                                    <label>[8]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form15'); ?>" value="<?php echo $txpsw_widgrt_option15; ?>" /><span>&#045;</span>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form16'); ?>" value="<?php echo $txpsw_widgrt_option16; ?>" />
                                </p>
                                <p>
                                    <label>[9]</label>
                                        <input type="number" name="<?php echo $this->get_field_name('txpsw_widgrt_form17'); ?>" value="<?php echo $txpsw_widgrt_option17; ?>" />&nbsp;<?php _e('or more','txpsw'); ?>
                                </p>
                        </div>

                        <div id="txpsw-admin-widget-input-check">
                            <p>
                                <label class="txpsw-admin-widget-input-check-title"><?php _e('Forms that end users can search','txpsw'); ?></label>
                                    <label><input type="checkbox" name="<?php echo $this->get_field_name('txpsw_widget_form_any'); ?>" value="txpsw_widget_check" <?php if($txpsw_widget_form_any_option === 'txpsw_widget_check'){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Indicate','txpsw'); ?></label>
                            </p>
                            <p class="form">
                                <label><?php _e('Text','txpsw'); ?></label>
                                   <input type="text" name="<?php echo $this->get_field_name('txpsw_widget_price_form_title'); ?>" value="<?php echo $txpsw_widget_price_form_option; ?>" />
                            </p>
                        </div>

                    </div>

<?php
        }

        function update($new_instance, $old_instance){				
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['txpsw_widget_form_any'] = sanitize_text_field($new_instance['txpsw_widget_form_any']);
            $instance['txpsw_widget_price_form_title'] = sanitize_text_field($new_instance['txpsw_widget_price_form_title']);
            $instance['txpsw_widget_form_on'] = sanitize_text_field($new_instance['txpsw_widget_form_on']);
            $instance['txpsw_widgrt_form1'] = sanitize_text_field($new_instance['txpsw_widgrt_form1']);
            $instance['txpsw_widgrt_form2'] = sanitize_text_field($new_instance['txpsw_widgrt_form2']);
            $instance['txpsw_widgrt_form3'] = sanitize_text_field($new_instance['txpsw_widgrt_form3']);
            $instance['txpsw_widgrt_form4'] = sanitize_text_field($new_instance['txpsw_widgrt_form4']);
            $instance['txpsw_widgrt_form5'] = sanitize_text_field($new_instance['txpsw_widgrt_form5']);
            $instance['txpsw_widgrt_form6'] = sanitize_text_field($new_instance['txpsw_widgrt_form6']);
            $instance['txpsw_widgrt_form7'] = sanitize_text_field($new_instance['txpsw_widgrt_form7']);
            $instance['txpsw_widgrt_form8'] = sanitize_text_field($new_instance['txpsw_widgrt_form8']);
            $instance['txpsw_widgrt_form9'] = sanitize_text_field($new_instance['txpsw_widgrt_form9']);
            $instance['txpsw_widgrt_form10'] = sanitize_text_field($new_instance['txpsw_widgrt_form10']);
            $instance['txpsw_widgrt_form11'] = sanitize_text_field($new_instance['txpsw_widgrt_form11']);
            $instance['txpsw_widgrt_form12'] = sanitize_text_field($new_instance['txpsw_widgrt_form12']);
            $instance['txpsw_widgrt_form13'] = sanitize_text_field($new_instance['txpsw_widgrt_form13']);
            $instance['txpsw_widgrt_form14'] = sanitize_text_field($new_instance['txpsw_widgrt_form14']);
            $instance['txpsw_widgrt_form15'] = sanitize_text_field($new_instance['txpsw_widgrt_form15']);
            $instance['txpsw_widgrt_form16'] = sanitize_text_field($new_instance['txpsw_widgrt_form16']);
            $instance['txpsw_widgrt_form17'] = sanitize_text_field($new_instance['txpsw_widgrt_form17']);
                return $instance;
        }

    }
// ----- Price Search Widget
?>