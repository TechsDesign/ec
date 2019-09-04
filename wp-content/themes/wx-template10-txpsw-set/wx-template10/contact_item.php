<?php
/*
Template Name: contact-item
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

          <?php
            if(isset($_GET['contact_item_url'])){
              $tx_item_url = esc_url($_GET['contact_item_url']);
                 echo '<div id="item-contact-return"><p><span><a href="'.$tx_item_url.'">'.__("Back", "usces").'</a></span></p></div>';
            }
         ?>

            <?php //▼contact-form▼ ?>
            <div id="contact-form">
              <?php
                if(!empty($tx_template_addition3['tx_con4_option'])){
                  echo do_shortcode( '[contact-form-7 id="'.esc_attr($tx_template_addition3['tx_con4_option']).'" "商品コンタクト"]' );
                }
              ?>
            </div>
            <?php //▲contact-form▲ ?>
          </div>
      </section>
    </div>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>