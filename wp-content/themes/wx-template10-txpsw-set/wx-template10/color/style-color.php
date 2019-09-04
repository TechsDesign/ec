<?php
$tx_load_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once($tx_load_path[0].'wp-load.php');
header('Content-Type:text/css; charset=utf-8');
$tx_template_add4 = get_option('tx_template_update4');
$tx_field = new tx_field_set();
$tx_sp_switch = $tx_field->tx_sp_decision();
$tx_change_url = $tx_field->tx_change_decision();
?>
@charset "UTF-8";

<?php //**************** main color ****************// ?>

<?php //▼background rgb▼// ?>
#top-space,
#info-confirm table#confirm_table tr.ttl td,
#info-confirm table#confirm_table td.ttl {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
  $tx_color_code = esc_attr($tx_template_add4['tx_color1_option']);
  $tx_color_code = preg_replace('/#/', '', $tx_color_code);
  $tx_color_rgb['red'] = hexdec(substr($tx_color_code, 0, 2));
  $tx_color_rgb['green'] = hexdec(substr($tx_color_code, 2, 2));
  $tx_color_rgb['blue'] = hexdec(substr($tx_color_code, 4, 2));
    echo 'background-color:rgba('.$tx_color_rgb['red'].','.$tx_color_rgb['green'].','.$tx_color_rgb['blue'].',0.6);'."\n";
}else{
  echo 'background-color:rgba(73,54,43,0.7);'."\n";
}
?>
}
#main-nav li.borderslide span {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
  $tx_color_code = esc_attr($tx_template_add4['tx_color1_option']);
  $tx_color_code = preg_replace('/#/', '', $tx_color_code);
  $tx_color_rgb['red'] = hexdec(substr($tx_color_code, 0, 2));
  $tx_color_rgb['green'] = hexdec(substr($tx_color_code, 2, 2));
  $tx_color_rgb['blue'] = hexdec(substr($tx_color_code, 4, 2));
    echo 'background-color:rgba('.$tx_color_rgb['red'].','.$tx_color_rgb['green'].','.$tx_color_rgb['blue'].',0.6);'."\n";
}else{
  echo 'background-color:rgba(73,54,43,0.5);'."\n";
}
?>
}
<?php //▲background rgb▲// ?>

<?php //▼background▼// ?>
#footer-in,
#main-nav,
#main-nav ul.sub-menu li,
.txpost-advanced,
#widget-area h2,
#main h1.title,
#main h2.title,
.ucart_login_body .login-member a:hover::after,
.ucart_login_body p.submit:hover::after,
.category-sort p.sort-but a,
p.form-submit input:hover,
#line a,
#google-plus a,
#pocket a,
#hatena-book a,
#facebook-like a,
#twitter-tweet a,
.ucart_search_body #searchsubmit:hover,
.category-sort p.sort-but-on a:hover::after,
.item-sku-inside .sku-cart-but .quantity-but p.quant input.item-minus,
.item-sku-inside .sku-cart-but .quantity-but p.quant input.item-plus,
.item-sku-inside .sku-cart-but .quantity-but p.button:hover::after,
#contact-form input[type="submit"]:hover,
.completion-link p a:hover,
.completion-link div a:hover,
.member_submenu .edit_member a:hover::after,
.member_submenu .logout_member a:hover::after,
#usces-page-in p.member-submit:hover::after,
#usces-page #inside-cart .send input:hover,
#usces-page #delivery-info .send input:hover,
#usces-page #info-confirm .send input:hover,
#usces-page #customer-info .send input:hover,
#cart_completion .send a:hover,
.usccart_navi li.usccart_cart,
.usccart_navi li.usccart_customer,
.usccart_navi li.usccart_confirm,
.usccart_navi li.usccart_delivery,
#searchbox input.usces_search_button:hover,
#memberpages #memberinfo #history_head th,
#memberinfo h3,
#top-scroll-in,
#main-nav-hidden {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'background:'.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'background:#49362b;'."\n";
}
?>
}
.wideimg-but p,
#main-img .prevslide,
#main-img .nextslide {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'background-color:'.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'background-color:#49362b;'."\n";
}
?>
}
<?php //▲background▲// ?>

<?php //▼border▼// ?>
.ucart_search_body .search-select select,
.ucart_search_body #searchsubmit,
.ucart_login_body p.submit,
.ucart_login_body .login-member a,
.category-sort p.sort-but a,
.category-sort p.sort-but-on a,
.item-sku-inside .sku-cart-but .quantity-but p.quant span.itemquant,
.item-sku-inside .sku-cart-but .quantity-but p.button,
.po-content-in,
#contact-form input[type="submit"],
#navinext a,
#previous a,
p.form-submit input,
.pagenavi span.current,
.pagenavi .page-numbers:hover,
#line,
#google-plus,
#pocket,
#hatena-book,
#facebook-like,
#twitter-tweet,
.completion-link p a,
.completion-link div a,
.member_submenu .edit_member a,
.member_submenu .logout_member a,
#usces-page-in p.member-submit,
#usces-page #inside-cart .send input,
#usces-page #delivery-info .send input,
#usces-page #info-confirm .send input,
#usces-page #customer-info .send input,
#cart_completion .send a,
#usces-page-in .loginbox-in,
#searchbox fieldset,
#searchbox input.usces_search_button {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border:1px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border:1px solid #49362b;'."\n";
}
?>
}
#top-space-arrow p.arrow a:hover,
#comment-title p:before,
#item-recommended h2:before {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border:2px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border:2px solid #49362b;'."\n";
}
?>
}
#loading p {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border:6px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border:6px solid #49362b;'."\n";
}
?>
}
#top-item .top-item-box-in:hover,
#item-category .item-box-in:hover {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border:1px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
echo 'border-bottom:4px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border:1px solid #49362b;'."\n";
echo 'border-bottom:4px solid #49362b;'."\n";
}
?>
}
<?php //▲border▲// ?>

<?php //▼border-top▼// ?>
#single-sns,
.pagenavi {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border-top:1px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border-top:1px solid #49362b;'."\n";
}
?>
}
<?php //▲border-top▲// ?>

<?php //▼border-bottom▼// ?>
#comment-title,
#main-archive .content-in,
.pagenavi,
#item-recommended h2,
#single-sns {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border-bottom:1px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border-bottom:1px solid #49362b;'."\n";
}
?>
}
.item-op-multi .item-op-sku {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border-bottom:3px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border-bottom:3px solid #49362b;'."\n";
}
?>
}
<?php //▲border-bottom▲// ?>

<?php //▼color▼// ?>
#sub-nav li a:before,
#sub-nav p.member span.name:before,
#top-post1 .txpost-title a:before,
#comment-title p:before,
#widget-area ul.children li a:before,
#widget-area ul.sub-menu li a:before,
#widget-area ul li a:before,
.posttags a:before,
#posttags-single a:before,
#top-post1 .top-posttags p a:before,
.item-contact-but span:before,
.item-tags span:before,
#item-contact-return a:before,
#search-in #searchsubmit,
#top-space-arrow p.arrow a:hover,
#usces-page-in .loginbox-in p.nav a:before,
#memberpages .link a:before,
#item-recommended h2:before {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'color:#49362b;'."\n";
}
?>
}
.txpost-cat p a:hover,
.top-item-cat p a:hover {
<?php
if(!empty($tx_template_add4['tx_color9_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color9_option']).';'."\n";
}else{
echo 'color:#947c6e;'."\n";
}
?>
}
<?php //▲color▲// ?>

<?php //▼width:[1200px] or less.▼// ?>
<?php
  if($tx_sp_switch){
  if($tx_change_url != 'pc'){
?>

@media screen and (max-width:1200px) {
#s-sub span.arrow1::before,
#s-sub span.arrow2::before {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border-top:4px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
echo 'border-right:4px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border-top:4px solid #49362b;'."\n";
echo 'border-right:4px solid #49362b;'."\n";
}
?>
}
#s-main span,
#sp-sub-body {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'background:'.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'background:#49362b;'."\n";
}
?>
}

#itempage .skuform .skuquantity {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border:1px solid '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border:1px solid #49362b;';
}
?>
}
}
<?php } ?>
<?php } ?>
<?php //▲width:[1200px] or less.▲// ?>

<?php //**************** main color ****************// ?>


<?php //**************** all ****************// ?>
body {
<?php
if(!empty($tx_template_add4['tx_color2_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color2_option']).';'."\n";
}else{
echo 'color:#727272;'."\n";
}
?>
}

a {
<?php
if(!empty($tx_template_add4['tx_color3_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color3_option']).';'."\n";
}else{
echo 'color:#727272;'."\n";
}
?>
}

a:hover,
a:active {
<?php
if(!empty($tx_template_add4['tx_color4_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color4_option']).';'."\n";
}else{
echo 'color:#947c6e;'."\n";
}
?>
}

body,
#wrapper-in,
#header-box,
.fixation-scroll {
<?php
if(!empty($tx_template_add4['tx_color5_option'])){
echo 'background:'.esc_attr($tx_template_add4['tx_color5_option']).';'."\n";
}else{
echo 'background:#fff;'."\n";
}
?>
}
<?php //**************** all ****************// ?>

<?php //**************** header ****************// ?>

#main-nav ul.parent li a,
#main-nav ul.sub-menu li a {
<?php
if(!empty($tx_template_add4['tx_color8_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color8_option']).';'."\n";
}else{
echo 'color:#fff;'."\n";
}
?>
}

#main-nav ul.parent li a:hover,
#main-nav ul.sub-menu li a:hover {
<?php
if(!empty($tx_template_add4['tx_color9_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color9_option']).';'."\n";
}else{
echo 'color:#947c6e;'."\n";
}
?>
}

#main-nav ul.sub-menu li {
<?php
if(!empty($tx_template_add4['tx_color11_option'])){
echo 'border-bottom:1px solid '.esc_attr($tx_template_add4['tx_color11_option']).';'."\n";
}else{
echo 'border-bottom:1px solid #fff;'."\n";
}
?>
}

#sub-nav p.member span.name {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
echo 'border-left:2px dashed '.esc_attr($tx_template_add4['tx_color1_option']).';'."\n";
}else{
echo 'border-left:2px dashed #49362b;'."\n";
}
?>
}

<?php //▼width:[1200px] or less.▼// ?>
<?php
  if($tx_sp_switch){
  if($tx_change_url != 'pc'){
?>
@media screen and (max-width:1200px) {
#main-nav li {
<?php
if(!empty($tx_template_add4['tx_color16_option'])){
echo 'background:'.esc_attr($tx_template_add4['tx_color16_option']).';'."\n";
}else{
echo 'background:#49362b;'."\n";
}
?>
}
#sub-nav-box li {
<?php
if(!empty($tx_template_add4['tx_color1_option'])){
  $tx_color_code = esc_attr($tx_template_add4['tx_color1_option']);
  $tx_color_code = preg_replace('/#/', '', $tx_color_code);
  $tx_color_rgb['red'] = hexdec(substr($tx_color_code, 0, 2));
  $tx_color_rgb['green'] = hexdec(substr($tx_color_code, 2, 2));
  $tx_color_rgb['blue'] = hexdec(substr($tx_color_code, 4, 2));
    echo 'background-color:rgba('.$tx_color_rgb['red'].','.$tx_color_rgb['green'].','.$tx_color_rgb['blue'].',0.6);'."\n";
}else{
  echo 'background-color:rgba(73,54,43,0.5);'."\n";
}
?>
}
}
<?php } ?>
<?php } ?>
<?php //▲width:[1200px] or less.▲// ?>

<?php //**************** header ****************// ?>

<?php //**************** footer ****************// ?>
#footer-in {
<?php
if(!empty($tx_template_add4['tx_color12_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color12_option']).';'."\n";
}else{
echo 'color:#fff;'."\n";
}
?>
}

#footer-nav-box li a:before,
#footer-in a {
<?php
if(!empty($tx_template_add4['tx_color13_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color13_option']).';'."\n";
}else{
echo 'color:#fff;'."\n";
}
?>
}

#footer-in a:hover {
<?php
if(!empty($tx_template_add4['tx_color14_option'])){
echo 'color:'.esc_attr($tx_template_add4['tx_color14_option']).';'."\n";
}else{
echo 'color:#947c6e;'."\n";
}
?>
}

#sns-but p {
<?php
if(!empty($tx_template_add4['tx_color15_option'])){
echo 'border:1px solid '.esc_attr($tx_template_add4['tx_color15_option']).';'."\n";
}
?>
}
<?php //**************** footer ****************// ?>