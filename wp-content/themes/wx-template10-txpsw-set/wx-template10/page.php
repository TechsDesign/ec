<?php
/*
 * This template "TEMPLX" has created for wordpress.
 * @package WordPress
 */
get_header(); ?>

<?php if(is_home() || is_front_page()){ ?>
  <div id="top-main">
    <?php //▼top_item▼ ?>
    <?php tx_toppage_newitem(); ?>
    <?php //▲top_item▲ ?>

    <?php tx_index_free2(); ?>

    <?php //▼top_post▼ ?>
    <?php tx_toppage_newpost(); ?>
    <?php //▲top_post▲ ?>

    <?php tx_index_free3(); ?>

    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
      <div id="ps-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; else: ?>
          <p><?php printf(__('Sorry, no such page.')); ?></p>
    <?php endif; ?>

  </div>
<?php }else{ ?>

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
        <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
          <h1 class="title"><span><?php the_title();?></span></h1>
            <div class="content">
              <?php
                $tx_page_thumbnail = get_the_post_thumbnail($post->ID, 'full', array('class' => 'tx_thumnail'));
                  if(has_post_thumbnail()){
                    echo '<div id="txsingle-thumbnail"><div id="txsingle-thumbnail-in">'.$tx_page_thumbnail.'</div></div>';
                  }
              ?>
              <div id="ps-content">
                <?php the_content(); ?>
              </div>
            </div>
        <?php endwhile; else: ?>
          <p><?php printf(__('Sorry, no such page.')); ?></p>
        <?php endif; ?>

      </section>
    </div>
  </div>
  <?php //▲main▲ ?>

<?php } ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>