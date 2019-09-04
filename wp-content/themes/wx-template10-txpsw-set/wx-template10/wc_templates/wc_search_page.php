<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
global $usces;
?>


  <?php //¢§breadcrumbs¢§ ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //¢¥breadcrumbs¢¥ ?>

  <?php //¢§main¢§ ?>
  <div id="main">
  <section id="main-archive">
        <?php if(have_posts()): have_posts(); the_post(); ?>
          <h1 class="title"><span><?php the_title();?></span></h1>

          <?php //¢§post¢§ ?>
          <div class="post" id="<?php echo $post->post_name; ?>">

                    <?php //¢§entry¢§ ?>
                    <div class="entry">
		
                      <?php $uscpaged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1; ?>
                        <script type="text/javascript">
                          function usces_nextpage() {
                            document.getElementById('usces_paged').value = <?php echo ($uscpaged + 1); ?>;
                            document.searchindetail.submit();
                          }
                          function usces_prepage() {
                            document.getElementById('usces_paged').value = <?php echo ($uscpaged - 1); ?>;
                            document.searchindetail.submit();
                          }
                          function newsubmit() {
                            document.getElementById('usces_paged').value = 1;
                          }
                        </script>

                          <?php //¢§searchbox¢§ ?>
                          <div id="searchbox">

                            <?php //******* part of result ************** ?>
                            <?php
                              usces_remove_filter();
                                if (isset($_REQUEST['usces_search'])) :
                                  $catresult = usces_search_categories(); 
                                  $search_query = array('category__and' => $catresult, 'posts_per_page' => 12, 'paged' => $uscpaged);
                                  $search_query = apply_filters('usces_filter_search_query', $search_query);
                                  $my_query = new WP_Query( $search_query );
                            ?>

                              <div class="title"><?php _e('Search results', 'usces'); ?><?php echo number_format($my_query->found_posts); ?><?php _e('cases', 'usces'); ?></div>
                                <?php if ($my_query->have_posts()) : ?>	
                                  <div class="navigation clearfix">
                                    <?php if( $uscpaged > 1 ) : ?>
                                      <a style="float:left; cursor:pointer;" onclick="usces_prepage();"><?php _e('&laquo; Previous article', 'usces'); ?></a>
                                    <?php endif; ?>
                                    <?php if( $uscpaged < $my_query->max_num_pages ) : ?>
                                      <a style="float:right; cursor:pointer;" onclick="usces_nextpage();"><?php _e('Next article &raquo;', 'usces'); ?></a>
                                    <?php endif; ?>
                                  </div>

                                  <?php if( $search_result = apply_filters('usces_filter_search_result', NULL, $my_query)) : ?>
                                    <?php echo $search_result; ?>
                                  <?php else : ?>
	
                                    <?php //¢§searchitems¢§ ?>
                                    <div class="searchitems">
         <div id="item-category">
          <div class="item-category-in">
                                     <?php while ($my_query->have_posts()) : $my_query->the_post(); usces_the_item(); ?>

              <div class="item-box">
                <div class="item-box-in">
                  <p class="intersection-img item-img">
                    <?php if(!usces_have_zaiko_anyone()){ ?>
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



                                      <?php endwhile;?>
</div>
</div>
                                    </div>
                                    <?php //¢¥searchitems¢¥ ?>

                                <?php endif; ?>

                                <div class="navigation clearfix">
                                  <?php if( $uscpaged > 1 ) : ?>
                                    <a style="float:left; cursor:pointer;" onclick="usces_prepage();"><?php _e('&laquo; Previous article', 'usces'); ?></a>
                                  <?php endif; ?>
                                  <?php if( $uscpaged < $my_query->max_num_pages ) : ?>
                                    <a style="float:right; cursor:pointer;" onclick="usces_nextpage();"><?php _e('Next article &raquo;', 'usces'); ?></a>
                                  <?php endif; ?>
                                </div>

                                <?php else : ?>
                                  <div class="searchitems"><p><?php _e('The article was not found.', 'usces'); ?></p></div>
                                <?php endif; ?>

                            <?php endif; wp_reset_query(); ?>
                            <?php //******* End Result ************** ?>

                            <?php //******* Start Form ************** ?>
                            <form name="searchindetail" action="<?php echo USCES_CART_URL . $usces->delim; ?>page=search_item" method="post">
                              <div class="field">
                                <label class="outlabel"><?php _e('Categories: AND Search', 'usces'); ?></label><?php echo usces_categories_checkbox('return'); ?>
                              </div>
                              <input name="usces_search_button" class="usces_search_button" type="submit" value="<?php _e('Search', 'usces'); ?>" onclick="newsubmit()" />
                              <input name="paged" id="usces_paged" type="hidden" value="<?php esc_attr_e( $uscpaged ); ?>" />
                              <input name="usces_search" type="hidden" />
                              <?php do_action('usces_action_search_item_inform'); ?>
                            </form>
                            <?php //******* End Form ************** ?>

                          </div>
                          <?php //¢¥searchbox¢¥ ?>
                    </div>
                    <?php //¢¥entry¢¥ ?>

          </div>
          <?php //¢¥post¢¥ ?>

	<?php endif; ?>

  </section>
  </div>
  <?php //¢¥main¢¥ ?>

<?php get_sidebar( 'other' ); ?>
<?php get_footer(); ?>