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
  <?php
    the_archive_description('<div class="archive-description">', '</div>');
  ?>
  <section id="main-archive">
    <?php if(have_posts()) : ?>
      <?php if(is_category()){ ?>
        <h2 class="title"><span><?php printf(__('%s'), single_cat_title('', false)); ?></span></h2>
      <?php }elseif(is_tag()){ ?>
        <h2 class="title"><span><?php printf(__('%s'), single_tag_title('', false)); ?></span></h2>
      <?php }elseif(is_archive()){
              if(is_author()){
      ?>
        <h2 class="title"><span><?php echo get_the_author();?></span></h2>
      <?php }else{ ?>
        <?php the_archive_title('<h2 class="title"><span>', '</span></h2>'); ?>
      <?php }}elseif(isset($_GET['paged']) && !empty($_GET['paged'])){ ?>
        <h2 class="title"><span>ブログアーカイブ</span></h2>
      <?php } ?>

        <?php if(usces_is_item()){ //*** item category ***// ?>
          <?php if(!is_tag() && !is_author() && !is_day() && !is_month() && !is_year()){ ?>
            <div id="item-category">
              <?php tx_category_total_item(); //*** number of item ***// ?>
              <?php tx_sort_buttom(); //*** sort of item ***// ?>
              <?php tx_navigation(); ?>
              <?php tx_sort_rearrangement(); //*** item list ***// ?>
              <?php tx_navigation(); ?>
            </div>
          <?php }elseif(is_tag()){ //*** item tag ***// ?>
            <div id="item-category">
              <?php tx_sort_rearrangement(); //*** item list ***// ?>
              <?php tx_navigation(); ?>
            </div>
          <?php }else{ ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="content">
            <div class="content-in">
              <div class="content-box">
                <?php
                  $tx_postimg_noimg = (get_bloginfo('template_directory'). '/images/noimage3.jpg');
                  $tx_post_thumbnail = get_the_post_thumbnail($post->ID, array(250,250), array('class' => 'tx_thumnail'));
                  $tx_post_data = get_the_time('Y&#047;m&#047;d', $post->ID);
                    echo '<div class="content-left">';
                      if(has_post_thumbnail()){
                        echo '<p class="txcategory-thumbnail"><a href="'.get_permalink().'">'.$tx_post_thumbnail.'</a></p>';
                      }else{
                        echo '<p class="txcategory-noimage"><a href="'.get_permalink().'"><img src="'.$tx_postimg_noimg.'" width="250" height="180" alt="noimage" /></a></p>';
                      }
                ?>
                          </div>
                          <div class="content-right">
                            <div class="content-right-in">
                              <div class="tag-nav">
                                <?php $tx_posttags = get_the_tag_list('<p>', '</p><p>', '</p>'); if($tx_posttags){ echo '<div class="posttags">'.$tx_posttags.'</div>'; } ?>
                                <div class="navidate"><span><?php echo $tx_post_data;?></span></div>
                              </div>
                              <h2 id="post-<?php the_ID();?>" class="post-title"><span><a href="<?php the_permalink();?>"><?php the_title();?></a></span></h2>
                              <p class="archive-post-content"><?php $tx_post_contents = strip_tags($post->post_content); echo mb_strimwidth($tx_post_contents, 0, 200, '...'); ?></p>
                                 <div class="archive-date">
                                   <div class="archive-cat"><?php echo __('Categories').'：'; printf(__('%s'), get_the_category_list(', ')); ?></div>
                                   <div class="postdate">
                                   <?php
                                     if(comments_open()){
                                       edit_post_link(__('Edit Post'), '', ' | ');
                                       comments_popup_link(__('No Comments'), __('1 Comment'), __('%件のコメント'), '', __('Comments are closed.'));
                                     }else{
                                       edit_post_link(__('Edit Post'), '', '');
                                     }
                                   ?>
                                   </div>
                                 </div>
                            </div>
                          </div>
              </div>
            </div>
        </div>
        <?php endwhile; ?>

          <?php tx_navigation(); ?> 

          <?php } ?>

        <?php }else{ //*** post category ***// ?>

        <?php while (have_posts()) : the_post(); ?>
        <div class="content">
            <div class="content-in">
              <div class="content-box">
                <?php
                  $tx_postimg_noimg = (get_bloginfo('template_directory'). '/images/noimage3.jpg');
                  $tx_post_thumbnail = get_the_post_thumbnail($post->ID, array(250,250), array('class' => 'tx_thumnail'));
                  $tx_post_data = get_the_time('Y&#047;m&#047;d', $post->ID);
                    echo '<div class="content-left">';
                      if(has_post_thumbnail()){
                        echo '<p class="txcategory-thumbnail"><a href="'.get_permalink().'">'.$tx_post_thumbnail.'</a></p>';
                      }else{
                        echo '<p class="txcategory-noimage"><a href="'.get_permalink().'"><img src="'.$tx_postimg_noimg.'" width="250" height="180" alt="noimage" /></a></p>';
                      }
                ?>
                          </div>
                          <div class="content-right">
                            <div class="content-right-in">
                              <div class="tag-nav">
                                <?php $tx_posttags = get_the_tag_list('<p>', '</p><p>', '</p>'); if($tx_posttags){ echo '<div class="posttags">'.$tx_posttags.'</div>'; } ?>
                                <div class="navidate"><span><?php echo $tx_post_data;?></span></div>
                              </div>
                              <h2 id="post-<?php the_ID();?>" class="post-title"><span><a href="<?php the_permalink();?>"><?php the_title();?></a></span></h2>
                              <p class="archive-post-content"><?php $tx_post_contents = strip_tags($post->post_content); echo mb_strimwidth($tx_post_contents, 0, 200, '...'); ?></p>
                                 <div class="archive-date">
                                   <div class="archive-cat"><?php echo __('Categories').'：'; printf(__('%s'), get_the_category_list(', ')); ?></div>
                                   <div class="postdate">
                                   <?php
                                     if(comments_open()){
                                       edit_post_link(__('Edit Post'), '', ' | ');
                                       comments_popup_link(__('No Comments'), __('1 Comment'), __('%件のコメント'), '', __('Comments are closed.'));
                                     }else{
                                       edit_post_link(__('Edit Post'), '', '');
                                     }
                                   ?>
                                   </div>
                                 </div>
                            </div>
                          </div>
              </div>
            </div>
        </div>
        <?php endwhile; ?>

          <?php tx_navigation(); ?> 

      <?php } ?>

    <?php else :
      if(is_category()){
        printf('<h2 class="title"><span>'.__('No posts found.').'</span></h2>', single_cat_title('',false));
      }elseif(is_date()){
        echo('<h2 class="title"><span>'.__('No posts found.').'</span></h2>');
      }elseif(is_author()){
        $userdata = get_userdatabylogin(get_query_var('author_name'));
          printf('<h2 class="title"><span>'.__('No posts found.').'</span></h2>', $userdata->display_name);
      }else{
        echo('<h2 class="title"><span>'.__('No posts found.').'</span></h2>');
      }
    endif;
    ?>

  </section>
  </div>
  <?php //▲main▲ ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>