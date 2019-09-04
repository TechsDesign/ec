<?php
/*
 * The name of the template is described in a css file.
 * @package WordPress
 */
?>

<?php //▼side▼ ?>
<div id="widget-area">
<?php tx_index_free1(); ?>
<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('one')): endif; ?>
</div>
<?php //▲side▲ ?>