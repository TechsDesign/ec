<?php
/*
 * The name of the template is described in a css file.
 * @package WordPress
 */
?>
  </div>
  <?php //▲wrap▲ ?>

                <div id="top-scroll">
                  <div id="top-scroll-in">
                    <a href="#wrapper"><img src="<?php bloginfo('template_directory');?>/images/scroll.png" alt="<?php bloginfo('name'); ?>" width="40" height="40" /></a>
                  </div>
                </div>

    <?php //▼footer▼ ?>
    <footer>
      <div id="footer-in">
        <div id="footer-body">
        <div id="footer-box">

          <div id="footer-top">
              <?php //▼main nav▼ ?>
                <?php if(has_nav_menu('footer_nav')){ ?>
                  <div id="footer-nav">
                    <nav id="footer-nav-box">
                      <?php wp_nav_menu(array('theme_location'=>'footer_nav','menu_class'=>'parent','depth'=>'1','items_wrap' =>'<ul class="%2$s">%3$s</ul>','link_before'=>'<span>','link_after'=>'</span>')); ?>
                    </nav>
                  </div>
                <?php } ?>
              <?php //▲main nav▲ ?>

              <?php //▼sns button▼ ?>
                <?php tx_sns_img_button(); ?>
              <?php //▲sns button▲ ?>
          </div>

          <?php //▼footer space▼ ?>
            <?php tx_footer_space(); ?>
          <?php //▲footer space▲ ?>

              <div id="footer-copy">
                <div id="copylight"><small>Copyright&copy;&nbsp;<?php print(date('Y'));?>&nbsp;<?php tx_head_author(); ?>&nbsp;All&nbsp;Rights&nbsp;Reserved.</small></div>
              </div>

              <div id="footer-title"><?php tx_custom_footer_title(); ?></div>

         <?php tx_display_switch(); ?>

        </div>
        </div>
      </div>
    </footer>
    <?php //▲footer▲ ?>

  </div>
  <?php //▲wrapper-in▲ ?>
  </div>
  <?php //▲wrapper▲ ?>

    <?php wp_footer(); ?>

</body>
</html>