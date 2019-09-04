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
          <h1 class="title"><span><?php _e('Change password', 'usces'); ?></span></h1>

            <?php //▼Welcart Default▼ ?>
            <div class="post" id="wc_<?php usces_page_name(); ?>">
              <div id="memberpages">

                <div class="header_explanation">
                  <?php do_action('usces_action_changepass_page_header'); ?>
                </div>

                <div class="error_message"><?php usces_error_message(); ?></div>

                  <div class="loginbox">
                    <div class="loginbox-in changepassword">
                      <form name="loginform" id="loginform" action="<?php usces_url('member'); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
                        <p>
                          <label><span class="left"><?php _e('password', 'usces'); ?></span>
                          <input type="password" name="loginpass1" id="loginpass1" class="loginpass" value="" size="20" placeholder="パスワードを入力" /></label>
                        </p>
                        <p>
                          <label><span class="left"><?php _e('Password (confirm)', 'usces'); ?></span>
                          <input type="password" name="loginpass2" id="loginpass2" class="loginpass" value="" size="20" placeholder="パスワード(確認)を入力" /></label>
                        </p>
                        <p class="submit member-submit">
                          <input type="submit" name="changepassword" id="member_login" value="<?php _e('Register', 'usces'); ?>" />
                        </p>
                        <?php do_action('usces_action_changepass_page_inform'); ?>
                      </form>
                    </div>
                  </div>

                  <div class="footer_explanation">
                    <?php do_action('usces_action_changepass_page_footer'); ?>
                  </div>

              </div><!-- end of memberpages -->

              <script type="text/javascript">
                try{document.getElementById('loginpass1').focus();}catch(e){}
              </script>

            </div><!-- end of post -->

        <?php else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

      </section>
    </div>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar( 'other' ); ?>
<?php get_footer(); ?>