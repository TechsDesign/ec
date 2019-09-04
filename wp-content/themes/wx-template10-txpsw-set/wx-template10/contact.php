<?php
/*
Template Name: contact
*/
/*
 * This template "TEMPLX" has created for wordpress.
 * @package WordPress
 */
get_header();
$tx_template_addition1 = get_option('tx_template_update1');
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
            <?php //▼contact-form▼ ?>
            <div id="contact-form">
              <?php
                if(!empty($tx_template_addition1['tx_con2_option'])){
                  echo do_shortcode( '[contact-form-7 id="'.esc_attr($tx_template_addition1['tx_con2_option']).'" "コンタクトフォーム 1"]' );
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