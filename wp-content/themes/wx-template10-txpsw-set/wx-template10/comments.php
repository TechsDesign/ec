<?php
/*
 * The name of the template is described in a css file.
 * @package WordPress
 */
   if(post_password_required()){ ?>
     <p><?php _e('This post is password protected. Enter the password to view comments.'); ?></p> 
       <?php
         return;
   }
?>
      <?php if(have_comments()){ ?>
        <div class="comment-box">
          <div class="content">
            <div class="content-in">
              <div class="content-box">
                <div id="comment-title"><p><?php comments_number(__('No Comments'), __('1 Comment'), __('%件のコメント'));?></p></div>
                  <ul class="commentlist">
	            <?php wp_list_comments();?>
                  </ul>
                  <?php if(get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
	            <div class="navigation">
	              <div class="alignleft"><?php previous_comments_link() ?></div>
	                <div class="alignright"><?php next_comments_link() ?></div>
	            </div>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>

      <?php if(!comments_open()){ ?>
        <p class="nocomments"><?php printf(__('Comments are closed.')); ?></p>
      <?php
        }
      }
      ?>

      <?php if(comments_open()){ ?>
        <section class="respond">
          <div class="content">
            <div class="content-in">
              <div class="content-box">
                <div id="comment-title"><p><?php comment_form_title( __('Leave a Comment'), __('Leave a Comment') ); ?></p></div>
      <?php } ?>
      <?php comment_form(); ?>
      <?php if(comments_open()){ ?>
              </div>
            </div>
          </div>
        </section>
      <?php } ?>