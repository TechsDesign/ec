<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

  <?php //¢§breadcrumbs¢§ ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //¢¥breadcrumbs¢¥ ?>

  <?php //¢§main¢§ ?>
  <div id="main">
    <div id="usces-page">
      <section id="usces-page-in">
        <?php if (have_posts()) : usces_remove_filter(); ?>
          <h1 class="title"><span><?php _e('Completion', 'usces'); ?></span></h1>
            <?php //¢§Welcart Default¢§ ?>
            <div class="post" id="wc_<?php usces_page_name(); ?>">
              <div id="cart_completion">

                <div class="header_explanation">
                  <?php do_action('usces_action_cartcompletion_page_header', $usces_entries, $usces_carts); ?>
                </div><!-- header_explanation -->

                <div class="completion-text">
                  <h3><?php _e('It has been sent succesfully.', 'usces'); ?></h3>
                    <p><?php _e('Thank you for shopping.', 'usces'); ?><br /><?php _e("If you have any questions, please contact us by 'Contact'.", 'usces'); ?></p>
                </div>

                <?php usces_completion_settlement(); ?>

                <?php do_action('usces_action_cartcompletion_page_body', $usces_entries, $usces_carts); ?>

                <div class="footer_explanation">
                  <?php do_action('usces_action_cartcompletion_page_footer', $usces_entries, $usces_carts); ?>
                </div><!-- footer_explanation -->

	<div class="send"><a href="<?php echo home_url(); ?>" class="back_to_top_button"><?php _e('Back to the top page.', 'usces'); ?></a></div>
<!--	<form action="<?php echo home_url(); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
	<div class="send"><input name="top" class="back_to_top_button" type="submit" value="<?php _e('Back to the top page.', 'usces'); ?>" /></div>
	<?php //do_action('usces_action_cartcompletion_page_inform'); ?>
	</form>
-->

                <?php echo apply_filters('usces_filter_conversion_tracking', NULL, $usces_entries, $usces_carts); ?>

              </div><!-- end of cart_completion -->

            </div><!-- end of post -->
            <?php //¢¥Welcart Default¢¥ ?>

        <?php else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

      </section>
    </div>
  </div>
  <?php //¢¥main¢¥ ?>

<?php get_sidebar( 'cartmember' ); ?>
<?php get_footer(); ?>