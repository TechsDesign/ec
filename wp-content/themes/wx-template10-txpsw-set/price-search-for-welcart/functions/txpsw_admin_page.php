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
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
        <h2><?php _e('TX Price Search for Welcart','txpsw'); ?></h2>
            <div id="txpsw-admin">

                <?php if(defined('USCES_VERSION')){?>
                          <script>
                              jQuery(function($){
                                   var txpsw_ok = '<?php _e('It was updated.','txpsw'); ?>';
                                   var txpsw_error = '<?php _e('It was not updated.','txpsw'); ?>';
                                       <?php if($txpsw_update_propriety == 'completion'){ ?>
                                                 $('#txpsw-update-button').html('<p>' + txpsw_ok + '</p>');
                                       <?php }elseif($txpsw_update_propriety == 'error'){ ?>
                                                 $('#txpsw-update-button').html('<p>' + txpsw_error + '</p>');
                                       <?php } ?>
                              });
                          </script>
                                    <div id="txpsw-update">
                                        <div id="txpsw-update-button">
                                                <form action="" method="post">
                                                    <input type="hidden" name="txpsw_prices_update" value="txpsw_add_prices_update" />
                                                    <input type="submit" class="txpsw_prices_submit" value="UPDATE" />
                                                </form>
                                            </div>
                                        <div id="txpsw-update-text">
                                            <p><?php _e('Please change the theme, change the plugin, register / change item price etc. Please execute UPDATE.','txpsw'); ?></p>
                                            <p><?php _e('It may take time to update.','txpsw'); ?></p>
                                        </div>
                                    </div>

                <?php } ?>

                    <form method="post" action="">
                        <div id="txpsw-admin-title">
                            <p class="title"><?php _e('Please input a title.','txpsw'); ?></p>
                                <input type="text" name="txpsw_form_title" value="<?php if(!empty($txpsw_options['txpsw_form_title'])){ echo esc_attr($txpsw_options['txpsw_form_title']); } ?>" />
                            <p class="note"><?php _e('*Leave blank if not required','txpsw'); ?></p>
                        </div>

                        <div id="txpsw-admin-input-text">
                            <p class="title"><?php _e('Please input a price to narrow it down.','txpsw'); ?></p>
                                <p><label>[1]</label>
                                    <input type="number" name="txpsw_form1" value="<?php if(!empty($txpsw_options['txpsw_form1'])){ echo esc_attr($txpsw_options['txpsw_form1']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form2" value="<?php if(!empty($txpsw_options['txpsw_form2'])){ echo esc_attr($txpsw_options['txpsw_form2']); } ?>" />
                                </p>
                                <p><label>[2]</label>
                                    <input type="number" name="txpsw_form3" value="<?php if(!empty($txpsw_options['txpsw_form3'])){ echo esc_attr($txpsw_options['txpsw_form3']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form4" value="<?php if(!empty($txpsw_options['txpsw_form4'])){ echo esc_attr($txpsw_options['txpsw_form4']); } ?>" />
                                </p>
                                <p><label>[3]</label>
                                    <input type="number" name="txpsw_form5" value="<?php if(!empty($txpsw_options['txpsw_form5'])){ echo esc_attr($txpsw_options['txpsw_form5']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form6" value="<?php if(!empty($txpsw_options['txpsw_form6'])){ echo esc_attr($txpsw_options['txpsw_form6']); } ?>" />
                                </p>
                                <p><label>[4]</label>
                                    <input type="number" name="txpsw_form7" value="<?php if(!empty($txpsw_options['txpsw_form7'])){ echo esc_attr($txpsw_options['txpsw_form7']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form8" value="<?php if(!empty($txpsw_options['txpsw_form8'])){ echo esc_attr($txpsw_options['txpsw_form8']); } ?>" />
                                </p>
                                <p><label>[5]</label>
                                    <input type="number" name="txpsw_form9" value="<?php if(!empty($txpsw_options['txpsw_form9'])){ echo esc_attr($txpsw_options['txpsw_form9']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form10" value="<?php if(!empty($txpsw_options['txpsw_form10'])){ echo esc_attr($txpsw_options['txpsw_form10']); } ?>" />
                                </p>
                                <p><label>[6]</label>
                                    <input type="number" name="txpsw_form11" value="<?php if(!empty($txpsw_options['txpsw_form11'])){ echo esc_attr($txpsw_options['txpsw_form11']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form12" value="<?php if(!empty($txpsw_options['txpsw_form12'])){ echo esc_attr($txpsw_options['txpsw_form12']); } ?>" />
                                </p>
                                <p><label>[7]</label>
                                    <input type="number" name="txpsw_form13" value="<?php if(!empty($txpsw_options['txpsw_form13'])){ echo esc_attr($txpsw_options['txpsw_form13']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form14" value="<?php if(!empty($txpsw_options['txpsw_form14'])){ echo esc_attr($txpsw_options['txpsw_form14']); } ?>" />
                                </p>
                                <p><label>[8]</label>
                                    <input type="number" name="txpsw_form15" value="<?php if(!empty($txpsw_options['txpsw_form15'])){ echo esc_attr($txpsw_options['txpsw_form15']); } ?>" /><span>&#045;</span>
                                    <input type="number" name="txpsw_form16" value="<?php if(!empty($txpsw_options['txpsw_form16'])){ echo esc_attr($txpsw_options['txpsw_form16']); } ?>" />
                                </p>
                                <p><label>[9]</label>
                                    <input type="number" name="txpsw_form17" value="<?php if(!empty($txpsw_options['txpsw_form17'])){ echo esc_attr($txpsw_options['txpsw_form17']); } ?>" />&nbsp;<?php _e('or more','txpsw'); ?>
                                </p>
                            <p class="note"><?php _e('*Leave blank if not required','txpsw'); ?></p>
                        </div>

                        <div id="txpsw-admin-input-css-check">
                            <p class="title"><?php _e('Do not use CSS on front page.','txpsw'); ?></p>
                            <p>
                                <label>
                                    <input name="txpsw_front_css" type="checkbox" value="txpsw_css_check" <?php if(isset($txpsw_options['txpsw_form_any']) && $txpsw_options['txpsw_front_css'] === 'txpsw_css_check'){ echo 'checked="checked"'; } ?> />&nbsp;&nbsp;<?php _e('Do not use CSS','txpsw'); ?>
                                </label>
                            </p>
                        </div>

                        <div id="txpsw-admin-input-form-check">
                            <p class="title"><?php _e('Display forms that end users can search','txpsw'); ?></p>
                            <p class="form">
                                <label>
                                    <input name="txpsw_form_any" type="checkbox" value="txpsw_check" <?php if(isset($txpsw_options['txpsw_form_any']) && $txpsw_options['txpsw_form_any'] === 'txpsw_check'){ echo 'checked="checked"'; } ?> />&nbsp;&nbsp;<?php _e('Indicate','txpsw'); ?>
                                </label>
                            </p>
                            <p><label><?php _e('Text','txpsw'); ?></label>
                                <input type="text" name="txpsw_price_form_title" value="<?php if(!empty($txpsw_options['txpsw_price_form_title'])){ echo esc_attr($txpsw_options['txpsw_price_form_title']); } ?>" />
                            </p>
                            <p class="note"><?php _e('*Leave blank if not required','txpsw'); ?></p>
                        </div>

                        <?php if(TXPSW_TEMPLATE_AUTHOR === 'TEMPLX'){ ?>
                        <div id="txpsw-admin-templx-display">
                            <p class="title"><?php _e('Display on the sort button(TEMPLX only)','txpsw'); ?></p>
                            <p class="form">
                                <label>
                                    <input name="txpsw_templx_display" type="checkbox" value="txpsw_display_check" <?php if(isset($txpsw_options['txpsw_templx_display']) && $txpsw_options['txpsw_templx_display'] === 'txpsw_display_check'){ echo 'checked="checked"'; } ?> />&nbsp;&nbsp;<?php _e('Indicate','txpsw'); ?>
                                </label>
                            </p>
                        </div>
                        <?php } ?>

                        <div id="txpsw-admin-description">
                            <p class="title"><?php _e('Use short code','txpsw'); ?></p>
                            <p><?php _e('When you write a short code in a fixed page, posting page, php file [TX Price Search for Welcart] is displayed.','txpsw'); ?></p>

                                <div class="txpsw-admin-description-box">
                                    <p class="txpsw-admin-description-box-title"><?php _e('When used in fixed page and posting page','txpsw'); ?></p>
                                    <p><?php _e('Use the title entered in [TX Price Search for Welcart]','txpsw'); ?><br /><span>&#091;txpsw_shortcode&#093;</span></p>
                                    <p><?php _e('Change title with short code','txpsw'); ?><br /><span>&#091;txpsw_shortcode title&#061;&quot;TITLE&quot;&#093;</span></p>
                                </div>

                                <div class="txpsw-admin-description-box">
                                    <p class="txpsw-admin-description-box-title"><?php _e('When writing in php file','txpsw'); ?></p>
                                    <p><?php _e('Use the title entered in [TX Price Search for Welcart]','txpsw'); ?><br /><span>&lt;&#063;php&nbsp;echo&nbsp;do_shortcode&#040;&#039;&#091;txpsw_shortcode&#093;&#039;&#041;&#059;&nbsp;&#063;&gt;</span></p>
                                    <p><?php _e('Change title with short code','txpsw'); ?><br /><span>&lt;&#063;php&nbsp;echo&nbsp;do_shortcode&#040;&#039;&#091;txpsw_shortcode&nbsp;title&#061;&quot;TITLE&quot;&#093;&#039;&#041;&#059;&nbsp;&#063;&gt;</span></p>
                                </div>

                        </div>
                        <div class="clear"></div>

                        <?php wp_nonce_field('txpsw_add_field'); ?>
                            <p class="submit">
                                <input type="hidden" name="txpsw_submit" value="txpsw_add_page" />
                                <input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" />
                            </p>
                    </form>
            </div>
</div>