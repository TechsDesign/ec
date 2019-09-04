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
          <h1 class="title"><span><?php _e('Error', 'usces'); ?></span></h1>
            <?php //¢§Welcart Default¢§ ?>
            <div class="post" id="wc_<?php usces_page_name(); ?>">
              <div id="error-page">
                <h2>ERROR</h2>
                  <div class="post-error">
                    <!-- <p><?php _e('Your order has not been completed', 'usces'); ?></p>
                    <p>(error <?php esc_html_e( urldecode($_REQUEST['acting_return']) ); ?>)</p> -->
                    <?php uesces_get_error_settlement(); ?>
                  </div><!-- end of post -->
              </div><!-- end of error-page -->

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