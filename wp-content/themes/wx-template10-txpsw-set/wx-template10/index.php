<?php
/*
 * This template "TEMPLX" has created for wordpress.
 * @package WordPress
 */
get_header(); ?>

    <div id="top-main">
    <?php //▼top_item▼ ?>
    <?php tx_toppage_newitem(); ?>
    <?php //▲top_item▲ ?>

    <?php tx_index_free2(); ?>

    <?php //▼top_post▼ ?>
    <?php tx_toppage_newpost(); ?>
    <?php //▲top_post▲ ?>

    <?php tx_index_free3(); ?>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>