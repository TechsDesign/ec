<?php
/*
Template Name: company
*/
/*
 * This template "TEMPLX" has created for wordpress.
 * @package WordPress
 */
get_header();
$tx_template_addition3 = get_option('tx_template_update3');
?>

  <?php //▼breadcrumbs▼ ?>
  <div class="breadcrumbs">
    <?php tx_breadcrumbs(); ?> 
  </div>
  <div class="clear"></div>
  <?php //▲breadcrumbs▲ ?>

  <?php //▼main▼ ?>
  <div id="main">
    <div id="main-page">
      <section id="main-page-in">
        <h1 class="title"><span><?php the_title();?></span></h1>
          <div class="content">
            <?php //▼company▼ ?>
            <div class="company">
              <table class="returned">
                 <tr>
                   <td>
                     <table class="returned-in">
                       <?php if(!empty($tx_template_addition3['tx_com1_option'])){ ;?>
                         <tr>
                           <td class="returned-left">社名</td>
                           <td class="returned-right"><?php echo esc_attr($tx_template_addition3['tx_com1_option']); ?></td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com2_option'])){ ;?>
                         <tr>
                           <td class="returned-left">代表者名</td>
                           <td class="returned-right"><?php echo esc_attr($tx_template_addition3['tx_com2_option']); ?></td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com3_option']) || !empty($tx_template_addition3['tx_com4_option'])){ ?>
                         <tr>
                           <td style="line-height:40px;" class="returned-left">住所</td>
                           <td class="returned-right">
                             <?php if(!empty($tx_template_addition3['tx_com3_option'])){ ?>
                               <p><?php echo esc_attr($tx_template_addition3['tx_com3_option']); ?></p>
                             <?php } ?>
                             <?php if(!empty($tx_template_addition3['tx_com4_option'])){ ?>
                               <p><?php echo esc_attr($tx_template_addition3['tx_com4_option']); ?></p>
                             <?php } ?>
                           </td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com5_option'])){ ;?>
                         <tr>
                           <td class="returned-left">設立</td>
                           <td class="returned-right"><?php echo esc_attr($tx_template_addition3['tx_com5_option']); ?></td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com6_option'])){ ;?>
                         <tr>
                           <td class="returned-left">電話番号</td>
                           <td class="returned-right"><?php echo esc_attr($tx_template_addition3['tx_com6_option']); ?></td>
                         </tr>
                       <?php } ?>
                         <tr>
                           <td class="returned-left">E-mail</td>
                           <td class="returned-right"><?php echo get_option('admin_email'); ?></td>
                         </tr>
                         <tr>
                           <td class="returned-left">URL</td>
                           <td class="returned-right"><a href="<?php bloginfo('url');?>"><?php bloginfo('url'); ?>/</a></td>
                         </tr>
                       <?php if(!empty($tx_template_addition3['tx_com7_option'])){ ;?>
                         <tr>
                           <td class="returned-left">事業内容</td>
                           <td class="returned-right"><?php echo $tx_template_addition3['tx_com7_option']; ?></td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com8_option']) && !empty($tx_template_addition3['tx_com9_option'])){ ;?>
                         <tr>
                           <td class="returned-left"><?php echo esc_attr($tx_template_addition3['tx_com8_option']); ?></td>
                           <td class="returned-right"><?php echo $tx_template_addition3['tx_com9_option']; ?></td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com10_option']) && !empty($tx_template_addition3['tx_com11_option'])){ ;?>
                         <tr>
                           <td class="returned-left"><?php echo esc_attr($tx_template_addition3['tx_com10_option']); ?></td>
                           <td class="returned-right"><?php echo $tx_template_addition3['tx_com11_option']; ?></td>
                         </tr>
                       <?php } ?>
                       <?php if(!empty($tx_template_addition3['tx_com12_option']) && !empty($tx_template_addition3['tx_com13_option'])){ ;?>
                         <tr>
                           <td class="returned-left"><?php echo esc_attr($tx_template_addition3['tx_com12_option']); ?></td>
                           <td class="returned-right"><?php echo $tx_template_addition3['tx_com13_option']; ?></td>
                         </tr>
                       <?php } ?>
                     </table>
                   </td>
                 </tr>
               </table>
             </div>
             <?php //▲company▲ ?>
           </div>
      </section>
    </div>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>