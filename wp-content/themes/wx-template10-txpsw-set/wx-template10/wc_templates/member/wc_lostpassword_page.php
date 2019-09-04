<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

  <?php //▼breadcrumbs▼ ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //▲breadcrumbs▲ ?>

  <?php //▼main▼ ?>
  <div id="main">
    <div id="usces-page">
      <section id="usces-page-in">
        <?php if (have_posts()) : usces_remove_filter(); ?>
          <h1 class="title"><span><?php _e('The new password acquisition', 'usces'); ?></span></h1>

            <?php //▼Welcart Default▼ ?>
            <div class="post" id="wc_<?php usces_page_name(); ?>">

              <div id="memberpages">
                <div class="whitebox">

                  <div class="header_explanation">
                    <?php do_action('usces_action_newpass_page_header'); ?>
                  </div>

                  <div class="error_message"><?php usces_error_message(); ?></div>

                    <div class="loginbox">
                      <div class="loginbox-in">
                        <form name="loginform" id="loginform" action="<?php usces_url('member'); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
                          <p>
                            <label><span class="left"><?php _e('e-mail adress', 'usces'); ?></span>
                            <input type="text" name="loginmail" id="loginmail" class="loginmail" value="" size="20" placeholder="メールアドレスを入力" /></label>
                          </p>
                          <p class="text"><?php _e('Change your password by following the instruction in this mail.', 'usces'); ?></p>
                          <p class="submit member-submit">
                            <input type="submit" name="lostpassword" id="member_login" value="<?php _e('Obtain new password', 'usces'); ?>" />
                          </p>
                          <?php do_action('usces_action_newpass_page_inform'); ?>
                        </form>

                          <p class="nav">
                            <?php if ( ! usces_is_login() ) : ?>
                              <a href="<?php usces_url('login'); ?>" title="<?php _e('Log-in', 'usces'); ?>"><?php _e('Log-in', 'usces'); ?></a>
                            <?php endif; ?>
                          </p>
                      </div>
                    </div><!-- end of loginbox -->

                    <div class="footer_explanation">
                      <?php do_action('usces_action_newpass_page_footer'); ?>
                    </div>

                </div><!-- end of whitebox -->
              </div><!-- end of memberpages -->

              <script type="text/javascript">
                try{document.getElementById('loginmail').focus();}catch(e){}
              </script>

            </div><!-- end of post -->
            <?php //▲Welcart Default▲ ?>

        <?php else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

      </section>
    </div>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar( 'other' ); ?>
<?php get_footer(); ?>