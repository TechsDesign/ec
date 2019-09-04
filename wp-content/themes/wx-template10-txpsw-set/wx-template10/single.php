<?php
/*
 * This template "TEMPLX" has created for wordpress.
 * @package WordPress
 */
get_header(); ?>

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
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <h1 class="title"><span><?php the_title();?></span></h1>
            <div class="content">
              <?php
                $tx_post_thumbnail = get_the_post_thumbnail($post->ID, 'full', array('class' => 'tx_thumnail'));
                $tx_post_data = get_the_time('Y&#047;m&#047;d', $post->ID);
                $tx_posttags = get_the_tag_list('<p><span>&nbsp;</span>', '</p><p><span>&nbsp;</span>', '</p>');
                  if($tx_posttags){
                    echo '<div id="posttags-single">'.$tx_posttags.'</div>';
                  }
                  if(has_post_thumbnail()){
                    echo '<div id="txsingle-thumbnail"><div id="txsingle-thumbnail-in">'.$tx_post_thumbnail.'</div></div>';
                  }
                  echo '<div id="navidate-single">'.$tx_post_data.'</div>';
              ?>
              <div id="ps-content">
                <?php the_content(); ?>
              </div>
              <div id="single-author"><?php echo 'By&nbsp;'; the_author_posts_link(); ?></div>

              <?php //▼single sns▼ ?>
              <?php tx_single_sns_button();?>
              <?php //▲single sns▲ ?>

          </div>

          <?php endwhile; else: ?>
            <p><?php printf(__('Sorry, no such page.')); ?></p>
          <?php endif; ?>

      </article>
    </div>

        <div id="navi-out">
          <?php
            $tx_next_post = get_next_post(true);
            $tx_previous_post = get_previous_post(true);
              if(!empty($tx_next_post)){
                echo '<div id="navinext"><p class="navi">'.__('&laquo; Previous').'</p>'.get_next_post_link('<p class="title">%link</p>','%title', true, '').'</div>';
              }
              if(!empty($tx_previous_post)){
                echo '<div id="previous"><p class="navi">'.__('Next &raquo;').'</p>'.get_previous_post_link('<p class="title">%link</p>','%title', true, '').'</div>';
              }
          ?>
        </div>
               
                <?php //▼コメント欄、コメントフォームの表示コード▼ ?>
		<?php comments_template( '', true ); ?>
                <?php //▲不要な場合はコードを消去してください▲ ?>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>