<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

  <?php //��breadcrumbs�� ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //��breadcrumbs�� ?>

  <?php //��main�� ?>
  <div id="main">
    <div id="usces-page">
      <section id="usces-page-in">
        <?php if (have_posts()) : usces_remove_filter(); ?>
          <h1 class="title"><span><?php _e('Cart', 'usces'); ?></span></h1>

            <?php //��Welcart Default�� ?>
            <div class="post" id="wc_<?php usces_page_name(); ?>">
              <div id="inside-cart">

                <div class="usccart_navi">
                  <ol class="ucart">
                    <li class="ucart usccart usccart_cart"><?php _e('1.Cart','usces'); ?></li>
                    <li class="ucart usccustomer"><?php _e('2.Customer Info','usces'); ?></li>
                    <li class="ucart uscdelivery"><?php _e('3.Deli. & Pay.','usces'); ?></li>
                    <li class="ucart uscconfirm"><?php _e('4.Confirm','usces'); ?></li>
                  </ol>
                </div>
	
                <div class="header_explanation">
                  <?php do_action('usces_action_cart_page_header'); ?>
                </div>
	
                <div class="error_message"><?php usces_error_message(); ?></div>

                <form action="<?php usces_url('cart'); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
                  <?php if( usces_is_cart() ) : ?>
                    <div id="cart">
                      <div class="upbutton"><?php _e('Press the `update` button when you change the amount of items.','usces'); ?><input name="upButton" type="submit" value="<?php _e('Quantity renewal','usces'); ?>" onclick="return uscesCart.upCart()" /></div>
                        <table cellspacing="0" id="cart_table">
                          <thead>
                            <tr>
                              <th scope="row" class="num">No.</th>
                              <th class="thumbnail"> </th>
                              <th><?php _e('item name','usces'); ?></th>
                              <th class="quantity"><?php _e('Unit price','usces'); ?></th>
                              <th class="quantity"><?php _e('Quantity','usces'); ?></th>
                              <th class="subtotal"><?php _e('Amount','usces'); ?><?php usces_guid_tax(); ?></th>
                              <th class="stock"><?php _e('stock status','usces'); ?></th>
                              <th class="action">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php usces_get_cart_rows(); ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="5" scope="row" class="aright total"><?php _e('total items','usces'); ?><?php usces_guid_tax(); ?></th>
                              <th class="aright price"><?php usces_crform(usces_total_price('return'), true, false); ?></th>
                              <th colspan="2">&nbsp;</th>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="currency_code"><?php _e('Currency','usces'); ?> : <?php usces_crcode(); ?></div>
                          <?php if( $usces_gp ) : ?>
                            <div class="usces-gp">
                              <img src="<?php bloginfo('template_directory'); ?>/images/gp.gif" alt="<?php _e('Business package discount','usces'); ?>" /><?php _e('The price with this mark applys to Business pack discount.','usces'); ?>
                            </div>
                          <?php endif; ?>
                    </div><!-- end of cart -->
                  <?php else : ?>
                    <div class="no_cart"><?php _e('There are no items in your cart.','usces'); ?></div>
                  <?php endif; ?>

                  <?php the_content();?>
	
                  <div class="send"><?php usces_get_cart_button(); ?></div>
                  <?php do_action('usces_action_cart_page_inform'); ?>
                </form>
	
                <div class="footer_explanation">
                  <?php do_action('usces_action_cart_page_footer'); ?>
                </div>

              </div><!-- end of inside-cart -->

            </div><!-- end of post -->
            <?php //��Welcart Default�� ?>

        <?php else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

      </section>
    </div>
  </div>
  <?php //��main�� ?>

<?php get_sidebar( 'cartmember' ); ?>
<?php get_footer(); ?>