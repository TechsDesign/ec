<?php
/*
 * This template "TEMPLX" has created for wordpress.
 * @package WordPress
 */
get_header();
global $usces;
?>

  <?php //▼breadcrumbs▼ ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //▲breadcrumbs▲ ?>

  <?php //▼main▼ ?>
  <div id="main">
  <section id="main-archive">
    <?php if(have_posts()): ?>
      <h2 class="title"><span><?php echo __('Search').':&nbsp;&nbsp;<b>'.$_GET['s']; ?></b></span></h2>
        <div id="item-category">
          <div class="item-category-in">
            <?php while(have_posts()) : the_post(); ?>
              <div class="item-box">
                <div class="item-box-in">
                  <p class="intersection-img item-img">
                    <?php if(!usces_have_zaiko_anyone($post->ID)){ ?>
                    <?php if(!usces_the_itemImageURL(0,'return')){ ?>
                      <a href="<?php the_permalink(); ?>"><span class="item-soldout"><img src="<?php bloginfo('template_directory');?>/images/soldout.png" width="140" height="140" alt="soldout" /></span><span class="item-thumbnail"><img src="<?php bloginfo('template_directory');?>/images/noimage1.jpg" width="170" height="170" alt="<?php echo $post->post_title;?>" /></span></a>
                    <?php }else{ ?>
                      <a href="<?php the_permalink(); ?>"><span class="item-soldout"><img src="<?php bloginfo('template_directory');?>/images/soldout.png" width="140" height="140" alt="<?php echo $post->post_title;?>" /></span><span class="item-thumbnail"><?php usces_the_itemImage($number = 0, $width = 170, $height = 170 ); ?></span></a>
                    <?php } ?>
                    <?php }else{ ?>
                    <?php if(!usces_the_itemImageURL(0,'return')){ ?>
                      <span class="item-thumbnail"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/noimage1.jpg" width="170" height="170" alt="<?php echo $post->post_title;?>" /></a></span>
                    <?php }else{ ?>
                      <span class="item-thumbnail"><a href="<?php the_permalink(); ?>"><?php usces_the_itemImage($number = 0, $width = 170, $height = 170 ); ?></a></span>
                    <?php } ?>
                    <?php } ?>
                  </p>
                  <p class="item-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo mb_strimwidth($post->post_title, 0, 50, "..."); ?></a></p>
                  <div class="item-box-bottom">
                    <p>
                    <?php
                      $tx_item_price_get = $usces->getItemPrice($post->ID);
                      sort($tx_item_price_get);
                        if(!usces_have_zaiko_anyone($post->ID)){
                          echo '<span class="soldout">Soldout</span>';
                        }else{
                          echo '<span class="price">'.usces_crform($tx_item_price_get[0], true, false, 'return').'</span>'.usces_guid_tax('return');
                        }
                    ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          </div>
        </div>
            <?php tx_navigation(); ?>
    <?php else : ?>

      <div class="search-error">
        <h2>ERROR</h2>
      </div>

    <?php endif; ?>

  </section>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>