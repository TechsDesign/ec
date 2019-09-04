<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
global $usces;
$item_limited_amount = get_post_meta($post->ID, '_itemRestriction', true);
$item_individual_charging = get_post_meta($post->ID, '_itemIndividualSCharge', true);
$item_pointrate = usces_the_point_rate('return');
?>

  <?php //▼breadcrumbs▼ ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //▲breadcrumbs▲ ?>

  <?php //▼main▼ ?>
  <div id="main">
    <div id="main-single">
      <article id="main-single-in">
        <?php if(have_posts()): the_post(); ?>
          <h1 class="title"><span><?php the_title();?></span></h1>


            <?php //▼item post▼ ?>
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">

              <?php usces_remove_filter(); ?>
              <?php usces_the_item(); ?>

                <?php //▼itempage▼ ?>
                <div id="itempage">

      <?php //▼itempage-img▼ ?>
      <div id="itempage-img">
        <?php //▼item-mainimg▼ ?>
        <div id="item-mainimg">
        <?php if(!usces_have_zaiko_anyone()){ ?>
          <?php if(!usces_the_itemImageURL(0,'return')){ ?>
           <p class="soldout-p"><span class="soldout"><img src="<?php bloginfo('template_directory');?>/images/soldout.png" width="300" height="300" alt="<?php the_title();?>" /></span>
           <span class="item-img"><img src="<?php bloginfo('template_directory');?>/images/noimage1.jpg" width="380" height="380" alt="<?php the_title();?>" /></span></p>
          <?php }else{ ?>
           <p class="soldout-p"><span class="soldout"><img src="<?php bloginfo('template_directory');?>/images/soldout.png" width="300" height="300" alt="<?php the_title();?>" /></span>
           <span class="item-img"><?php usces_the_itemImage(0, 380, 380, $post); ?></span></p>
          <?php } ?>
        <?php }else{ ?>
          <?php if(!usces_the_itemImageURL(0,'return')){ ?>
            <p><span class="item-img"><img src="<?php bloginfo('template_directory');?>/images/noimage1.jpg" width="380" height="380" alt="<?php the_title();?>" /></span></p>
          <?php }else{ ?>
            <p><span class="item-img"><?php usces_the_itemImage(0, 380, 380, $post); ?></span></p>
          <?php } ?>
        <?php } ?>
        </div>
        <?php //▲item-mainimg▲ ?>

          <?php //▼item-subimg▼ ?>
          <div id="item-subimg">
          <?php if(!usces_have_zaiko_anyone()){ ?>
            <?php if(usces_the_itemImageURL(0,'return')){ ?>
              <p class="img0"><a rel="lightbox[txitemimg]" href="<?php usces_the_itemImageURL(0); ?>" class="intersection-img sub-soldout txmwitem"<?php echo apply_filters('usces_itemimg_anchor_rel', NULL); ?>><?php usces_the_itemImage(0, 100, 100, $post); ?></a></p>
            <?php } ?>
          <?php $tx_sub_imgid = usces_get_itemSubImageNums(); ?>
          <?php foreach($tx_sub_imgid as $tx_imgid ){ ?>
          <p class="img<?php echo $tx_imgid;?>">
          <a rel="lightbox[txitemimg]" href="<?php usces_the_itemImageURL($tx_imgid); ?>" class="intersection-img sub-soldout txmwitem"<?php echo apply_filters('usces_itemimg_anchor_rel', NULL); ?>>
          <?php usces_the_itemImage($tx_imgid, 100, 100, $post); ?></a>
          </p>
          <?php }}else{ ?>
            <?php if(usces_the_itemImageURL(0,'return')){ ?>
              <p class="img0"><a rel="lightbox[txitemimg]" href="<?php usces_the_itemImageURL(0); ?>" class="intersection-img txmwitem"<?php echo apply_filters('usces_itemimg_anchor_rel', NULL); ?>><?php usces_the_itemImage(0, 100, 100, $post); ?></a></p>
            <?php } ?>
          <?php $tx_sub_imgid = usces_get_itemSubImageNums(); ?>
          <?php foreach($tx_sub_imgid as $tx_imgid ){ ?>
          <p class="img<?php echo $tx_imgid;?>">
          <a rel="lightbox[txitemimg]" href="<?php usces_the_itemImageURL($tx_imgid); ?>" class="intersection-img txmwitem"<?php echo apply_filters('usces_itemimg_anchor_rel', NULL); ?>>
          <?php usces_the_itemImage($tx_imgid, 100, 100, $post); ?></a>
          </p>
          <?php }} ?>
          </div>
          <?php //▲item-subimg▲ ?>

       </div>
       <?php //▲itempage-img▲ ?>


     <?php //*-#*-#*-#*-#*▼ここからsku単体▼*-#*-#*-#*-#*// ?>
     <?php if(usces_sku_num() === 1) : usces_have_skus(); ?>

       <?php //▼itemsku-out▼ ?>
       <div class="itemsku-out">
         <?php //▼field-area▼ ?>
         <div class="field-area">
           <?php //▼item-op▼ ?>
           <div class="item-op">

               <?php $item_itemGpExp_display = usces_the_itemGpExp('return');
                 if($item_itemGpExp_display == true){ ?>
                   <?php //▼business-option▼ ?>
                     <div class="business-option">
                       <?php usces_the_itemGpExp();?>
                     </div>
                     <?php //▲business-option▲ ?>
               <?php } ?>

             <?php //▼item-op-sku▼ ?>
             <div class="item-op-sku">

              <ul class="io-bottom">
                <li><span class="left"><?php _e('item code', 'usces'); ?></span><?php usces_the_itemCode(); ?></li>
                <?php if( usces_the_itemCprice('return') > 0 ){ ?>
                <li><span class="left"><?php _e('List price', 'usces'); ?><?php usces_guid_tax(); ?></span><?php usces_the_itemCpriceCr();?></li>
                <?php } ?>
                <li><span class="left"><?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?></span><span class="price"><?php usces_the_itemPriceCr(); ?></span></li>
                <li><span class="left"><?php _e('stock status', 'usces'); ?></span><?php usces_the_itemZaikoStatus(); ?></li>
                <?php if(usces_the_itemSku('return')){ ?>
                <li class="io-other">[<span class="left"><?php echo _e('SKU name','usces'); ?>&nbsp;:&nbsp;</span><?php usces_the_itemSku(); ?>]</li>
                <?php } ?>
                <?php if(usces_the_itemSkuDisp('return')){ ?>
                <li class="io-other">[<span class="left"><?php _e('SKU code', 'usces'); ?>ID&nbsp;:&nbsp;</span><?php usces_the_itemSkuDisp(); ?>]</li>
                <?php } ?>
              </ul>

             <form action="<?php echo USCES_CART_URL; ?>" method="post">

       <?php if( $item_custom = usces_get_item_custom( $post->ID, 'list', 'return' ) ) : ?>
         <?php echo $item_custom; ?>
       <?php endif; ?>

               <?php if (usces_is_options()) : ?>
                 <?php //▼sku-inside▼ ?>
                 <div class="sku-inside">
                   <p><?php _e('Please appoint an option.', 'usces'); ?></p>
                     <?php while(usces_have_options()) : ?>
                       <ul class="item_option">
                         <li><?php usces_the_itemOptName(); ?></li>
                         <li><?php usces_the_itemOption(usces_getItemOptName(),''); ?></li>
                       </ul>
                     <?php endwhile; ?>
                 </div>
                 <?php //▲sku-inside▲ ?>
               <?php endif; ?>

       <?php //▼skuform▼ ?>
       <div class="skuform">
         <?php //▼skumulti▼ ?>
         <div class="skumulti">
           <?php if( !usces_have_zaiko() ) : ?>
           <?php //▼カートボタン(在庫なし)▼  ?>
             <?php //▼item-sku-inside▼  ?>
             <div class="item-sku-inside">
               <div class="sku-cart-but">
                 <div class="zaiko-none">
                   <?php _e('Sold Out', 'usces'); ?>
                 </div>
               </div>
             </div>
             <?php //▲item-sku-inside▲  ?>
           <?php //▲カートボタン(在庫なし)▲ ?>
           <?php else : ?>
           <?php //▼カートボタン(在庫あり)▼  ?>
             <?php //▼item-sku-inside▼  ?>
             <div class="item-sku-inside">
               <div class="sku-cart-but">
                 <div class="quantity-but">
                   <p class="quant"><span class="itemquant"><input type="button" value="-" class="item-minus" /><?php usces_the_itemQuant(); ?><input type="button" value="+" class="item-plus" /></span><span class="itemskuunit"><?php usces_the_itemSkuUnit(); ?></span></p>
                   <p class="button"><input name="restriction" type="hidden" id="restriction" value="<?php echo $usces->getItemRestriction($post->ID);?>" />
                      <?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?>
                      <?php usces_singleitem_error_message($post->ID, usces_the_itemSku('return')); ?></p>
                 </div>
               </div>
             </div>
             <?php //▲item-sku-inside▲  ?>
           <?php //▲カートボタン(在庫あり)▲ ?>
           <?php endif; ?>
         </div>
         <?php //▲skumulti▲ ?>
       </div>
       <?php //▲skuform▲ ?>

            </div>
            <?php //▲item-op-sku▲ ?>

     <?php echo apply_filters('single_item_single_sku_after_field', NULL); ?>
     <?php do_action('usces_action_single_item_inform'); ?>
     </form>
     <?php do_action('usces_action_single_item_outform'); ?>

         </div>
         <?php //▲item-op▲ ?>
         </div>
         <?php //▲field-area▲ ?>

       </div>
       <?php //▲itemsku-out▲ ?>
       <div class="clear"></div>

     <?php //*-#*-#*-#*-#*▼ここからsku複数▼*-#*-#*-#*-#*// ?>
     <?php elseif(usces_sku_num() > 1) : usces_have_skus(); ?>

       <?php //▼itemsku-out▼ ?>
       <div class="itemsku-out">
         <?php //▼field-area▼ ?>
         <div class="field-area">
           <?php //▼item-op▼ ?>
           <div class="item-op">
           <?php //▼item-op-multi▼ ?>
           <div class="item-op-multi">

     <form action="<?php echo USCES_CART_URL; ?>" method="post">
       <?php do { ?>

               <?php $item_itemGpExp_display = usces_the_itemGpExp('return');
                 if($item_itemGpExp_display == true){ ?>
                   <?php //▼business-option▼ ?>
                     <div class="business-option">
                       <?php usces_the_itemGpExp();?>
                     </div>
                   <?php //▲business-option▲ ?>
               <?php } ?>


             <?php //▼item-op-sku▼ ?>
             <div class="item-op-sku">

              <ul class="io-bottom">
                <li><span class="left"><?php _e('item code', 'usces'); ?></span><?php usces_the_itemCode(); ?></li>
                <?php if( usces_the_itemCprice('return') > 0 ){ ?>
                <li><span class="left"><?php _e('List price', 'usces'); ?><?php usces_guid_tax(); ?></span><?php usces_the_itemCpriceCr();?></li>
                <?php } ?>
                <li><span class="left"><?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?></span><span class="price"><?php usces_the_itemPriceCr(); ?></span></li>
                <li><span class="left"><?php _e('stock status', 'usces'); ?></span><?php usces_the_itemZaikoStatus(); ?></li>
                <?php if(usces_the_itemSku('return')){ ?>
                <li class="io-other">[<span class="left"><?php echo _e('SKU name','usces'); ?>&nbsp;:&nbsp;</span><?php usces_the_itemSku(); ?>]</li>
                <?php } ?>
                <?php if(usces_the_itemSkuDisp('return')){ ?>
                <li class="io-other">[<span class="left"><?php _e('SKU code', 'usces'); ?>&nbsp;:&nbsp;</span><?php usces_the_itemSkuDisp(); ?>]</li>
                <?php } ?>
              </ul>

               <?php if (usces_is_options()) : ?>
                 <?php //▼sku-option-open▼ ?>
                 <div class="sku-option-open">
                   <p class="open"><?php _e('options for items', 'usces'); ?></p>
                     <div class="sku-inside">
                       <div class="sku-option-in">
                         <p><?php _e('Please appoint an option.', 'usces'); ?></p>
                           <?php while(usces_have_options()) : ?>
                             <ul class="item_option">
                               <li><?php usces_the_itemOptName(); ?></li>
                               <li><?php usces_the_itemOption(usces_getItemOptName(),''); ?></li>
                             </ul>
                           <?php endwhile; ?>
                       </div>
                     </div>
                 </div>
                 <?php //▲sku-option-open▲ ?>
               <?php endif; ?>

       <?php //▼skuform▼ ?>
       <div class="skuform">
         <?php //▼skumulti▼ ?>
         <div class="skumulti">
           <?php if( !usces_have_zaiko() ) : ?>
           <?php //▼カートボタン(在庫なし)▼  ?>
             <?php //▼item-sku-inside▼  ?>
             <div class="item-sku-inside">
               <div class="sku-cart-but">
                 <div class="zaiko-none">
                   <?php _e('Sold Out', 'usces'); ?>
                 </div>
               </div>
             </div>
             <?php //▲item-sku-inside▲  ?>
           <?php //▲カートボタン(在庫なし)▲ ?>
           <?php else : ?>
           <?php //▼カートボタン(在庫あり)▼  ?>
             <?php //▼item-sku-inside▼  ?>
             <div class="item-sku-inside">
               <div class="sku-cart-but">
                 <div class="quantity-but">
                   <p class="quant"><span class="itemquant"><input type="button" value="-" class="item-minus" /><?php usces_the_itemQuant(); ?><input type="button" value="+" class="item-plus" /></span><span class="itemskuunit"><?php usces_the_itemSkuUnit(); ?></span></p>
                   <p class="button"><input name="restriction" type="hidden" id="restriction" value="<?php echo $usces->getItemRestriction($post->ID);?>" />
                      <?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?>
                      <?php usces_singleitem_error_message($post->ID, usces_the_itemSku('return')); ?></p>
                 </div>
               </div>
             </div>
             <?php //▲item-sku-inside▲  ?>
           <?php //▲カートボタン(在庫あり)▲ ?>
           <?php endif; ?>
         </div>
         <?php //▲skumulti▲ ?>
       </div>
       <?php //▲skuform▲ ?>

            </div>
            <?php //▲item-op-sku▲ ?>

        <?php } while (usces_have_skus()); ?>

       <?php echo apply_filters('single_item_multi_sku_after_field', NULL); ?>
       <?php do_action('usces_action_single_item_inform'); ?>
       </form>
       <?php do_action('usces_action_single_item_outform'); ?>

       <?php if( $item_custom = usces_get_item_custom( $post->ID, 'list', 'return' ) ) : ?>
         <?php echo $item_custom; ?>
       <?php endif; ?>

         </div>
         <?php //▲item-op-multi▲ ?>
         </div>
         <?php //▲item-op▲ ?>
         </div>
         <?php //▲field-area▲ ?>

       </div>
       <?php //▲itemsku-out▲ ?>
       <div class="clear"></div>

       <?php endif; ?>
       <?php //▲sku複数▲ ?>


         <?php //▼po-content▼ ?>
         <div class="po-content">
         <?php //▼po-content-in▼ ?>
         <div class="po-content-in">

         <?php //▼promotionsale-others▼ ?>
         <div class="promotionsale-others">

         <div class="promotionsale">
         <?php
         $item_pointrate = usces_the_point_rate('return');
         $item_itemGpExp_display = usces_the_itemGpExp('return');
         if($usces->options['display_mode'] == 'Promotionsale' || $item_itemGpExp_display == true || $item_pointrate > 0 || $usces->options['postage_privilege'] > 0){
         ?>
         <div class="item-special-benefits">---&nbsp;<?php _e('Special Benefits', 'usces'); ?>&nbsp;---</div>
         <?php } ?>
         <?php
         if(in_category($usces->options['campaign_category'])){
         if($usces->options['display_mode'] == 'Promotionsale'){
         if($usces->options['campaign_privilege'] == 'discount'){ }else{ if($item_pointrate <= 0){ }else{ ?>
         <p>・<?php _e('Acquired points', 'usces'); ?><span class="discount"><?php usces_the_point_rate(); _e('%', 'usces'); ?></span><?php _e(' * ', 'usces'); _e('[DESC]', 'usces'); _e('[DESC]', 'usces'); ?></p>
         <?php }} if($usces->options['campaign_privilege'] == 'discount'){ ?>
         <p>・<?php _e('Campaign target items', 'usces'); ?>
         <span class="discount"><?php echo esc_html($usces->options['privilege_discount']); _e('%', 'usces'); ?>&nbsp;<?php _e('Disnount', 'usces'); ?></span></p>
         <?php } if($usces->options['campaign_privilege'] == 'point'){ ?>
         <p>・<?php _e('Campaign target items', 'usces'); ?>
         <span class="discount"><?php _e('Points', 'usces'); echo esc_html($usces->options['privilege_point']); _e('times', 'usces'); ?></span></p>
         <?php }}else{ if($item_pointrate <= 0){ }else{ ?>
         <p>・<?php _e('Acquired points', 'usces'); ?><span class="discount"><?php usces_the_point_rate(); _e('%', 'usces'); ?></span></p>
         <?php }}}else{ if($item_pointrate <= 0){ }else{ ?>
         <p>・<?php _e('Acquired points', 'usces'); ?><span class="discount"><?php usces_the_point_rate(); _e('%', 'usces'); ?></span></p>
         <?php }} if($usces->options['postage_privilege'] > 0){ ?>
         <p>・<?php _e('Conditions for free shipping', 'usces'); ?>&nbsp;<span class="discount"><?php _e('￥', 'usces'); usces_the_postage_privilege(); ?></span><?php _e('Above', 'usces'); ?></p>
         <?php } ?>
         </div>

         <?php
         $item_shipment_display = usces_the_shipment_aim('return');
         if($item_individual_charging || $item_shipment_display || $item_limited_amount == true){?>
         <div class="item-op-sku-others-out">
         <div class="item-op-sku-others">
         <p class="item-sku-others">---&nbsp;<?php _e('Notes', 'usces'); ?>&nbsp;---</p>
         <?php if($item_individual_charging == true){ ?>
         <p>・<?php _e('Postage individual charging', 'usces'); ?>の為、同梱不可</p>
         <?php } ?>
         <?php if($item_shipment_display == true){ ?>
         <p>・<?php _e('estimated shipping date', 'usces'); ?>は<?php echo usces_the_shipment_aim(); ?></p>
         <?php } ?>
         <?php if($item_limited_amount == true){ ?>
         <p>・<?php _e('Limited amount for purchase', 'usces'); ?><span><?php echo $item_limited_amount;?></span><?php _e('maximum amount', 'usces'); ?></p>
         <?php } ?>
         </div>
         </div>
         <?php } ?>

       </div>
       <?php //▼promotionsale-others▼ ?>

       <?php tx_item_contact_form_but(); ?>
       <?php if(get_the_tags()){ ?>
       <div class="item-tags"><p><span><?php the_tags('', ', ', ''); ?></span></p></div>
       <?php } ?>

       </div>
       <?php //▲po-content-in▲ ?>

       <?php //▼item-content-inside▼ ?>
       <div class="item-content-inside">
       <h3><span><?php usces_the_itemName(); ?></span></h3>
       <div class="clear"></div>
       <?php the_content(); ?>
       </div>
       <?php //▲item-content-inside▲ ?>

              <?php //▼single sns▼ ?>
              <?php tx_single_sns_button();?>
              <?php //▲single sns▲ ?>

       </div>
       <?php //▼po-content▼ ?>

  </div>
  <?php //▲itempage▲ ?>

            </div>
            <?php //▲item post▲ ?>

<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php tx_itempage_recommended(); ?>
      </article>
    </div>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar( 'other' ); ?>
<?php get_footer(); ?>