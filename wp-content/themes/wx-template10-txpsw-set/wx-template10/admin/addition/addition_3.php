<?php
/**
 * @package TEMPLX TEMPLATE
 */
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>テンプレート｜設定3&nbsp;&nbsp;(Page)</h2>
<form method="post" action="">

<div style="font-weight:bold;font-size:16px;margin-top:30px;">トップページ新着情報</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">新着情報</th>
<td style="height:100px;vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p><label>表示する
<?php
$pntx_off_path1 = apply_filters('tx_off_option1', array('postnew1',));
foreach($pntx_off_path1 as $pntx_off_get1){echo '<input type="checkbox" name="tx_off_option1" value="'.esc_attr($pntx_off_get1).'"';
if(!empty($tx_template_addition3['tx_off_option1']) == $pntx_off_get1){ 
echo ' checked="checked"';
} echo ' />'; }
?></label></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;タイトルを入力</span><input type="text" name="tx_posth3_option" value="<?php if(!empty($tx_template_addition3['tx_posth3_option'])){ echo esc_attr($tx_template_addition3['tx_posth3_option']);} ?>" size="50" /></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;表示する数を入力</span><input type="text" name="tx_quantitypost_option" value="<?php if(!empty($tx_template_addition3['tx_quantitypost_option'])){ echo esc_attr($tx_template_addition3['tx_quantitypost_option']);} ?>" size="1" /></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;表示したいカテゴリを選択</span>
<select name="tx_catid_option">
<?php
$top_post_cat1_id = get_category_by_slug('item');
$top_post_cat1 = get_terms('category', 'hide_empty=0&exclude_tree='.$top_post_cat1_id->term_id.'&orderby=id&order=ASC');
foreach($top_post_cat1 as $top_post_cat1_in){
echo '<option value="'.$top_post_cat1_in->term_id.'"';
if(isset($tx_template_addition3['tx_catid_option'])){ if($tx_template_addition3['tx_catid_option'] == esc_attr($top_post_cat1_in->term_id)) echo ' selected="selected"'; }
echo '>'.esc_attr($top_post_cat1_in->name).'&nbsp;&nbsp;('.$top_post_cat1_in->count.')</option>';
}
?>
</select>
</p>
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">トップページ新着商品</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">新着商品</th>
<td style="height:100px;vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p><label>表示する
<?php
$pntx_off_path2 = apply_filters('tx_off_option2', array('postnew2',));
foreach($pntx_off_path2 as $pntx_off_get2){echo '<input type="checkbox" name="tx_off_option2" value="'.esc_attr($pntx_off_get2).'"';
if(!empty($tx_template_addition3['tx_off_option2']) == $pntx_off_get2){ 
echo ' checked="checked"';
} echo ' />'; }
?></label></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;タイトルを入力</span><input type="text" name="tx_posth3_option2" value="<?php if(!empty($tx_template_addition3['tx_posth3_option2'])){ echo esc_attr($tx_template_addition3['tx_posth3_option2']);} ?>" size="50" /></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;表示する数を入力</span><input type="text" name="tx_quantitypost_option2" value="<?php if(!empty($tx_template_addition3['tx_quantitypost_option2'])){ echo esc_attr($tx_template_addition3['tx_quantitypost_option2']);} ?>" size="1" /></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;表示したいカテゴリを選択</span>
<select name="tx_catid_option2">
<?php
$top_post_cat2_id = get_category_by_slug('item');
$top_post_cat2 = get_terms('category', 'hide_empty=0&child_of='.$top_post_cat2_id->term_id.'&orderby=id&order=ASC');
echo '<option value="'.$top_post_cat2_id->term_id.'"';
if(isset($tx_template_addition3['tx_catid_option2'])){ if($tx_template_addition3['tx_catid_option2'] == $top_post_cat2_id->term_id) echo ' selected="selected"'; }
echo '>'.$top_post_cat2_id->name.'&nbsp;&nbsp;('.$top_post_cat2_id->category_count.')</option>';
foreach($top_post_cat2 as $top_post_cat2_in){
echo '<option value="'.$top_post_cat2_in->term_id.'"';
if(isset($tx_template_addition3['tx_catid_option2'])){ if($tx_template_addition3['tx_catid_option2'] == esc_attr($top_post_cat2_in->term_id)) echo ' selected="selected"'; }
echo '>'.esc_attr($top_post_cat2_in->name).'&nbsp;&nbsp;('.$top_post_cat2_in->count.')</option>';
}
?>
</select>
</p>
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">商品ページ(おススメ商品)</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">おススメ商品</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p><label>表示する
<?php
$recommended_path = apply_filters('tx_recommended_option', array('recommended',));
foreach($recommended_path as $recommended_get){echo '<input type="checkbox" name="tx_recommended_option" value="'.esc_attr($recommended_get).'"';
if(!empty($tx_template_addition3['tx_recommended_option']) == $recommended_get){ 
echo ' checked="checked"';
} echo ' />'; }
?></label></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;タイトルを入力</span><input type="text" name="tx_recommended_title_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_title_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_title_option']);} ?>" size="50" /></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;並び順を選択</span>
<select name="tx_recommended_select_option">
<?php
echo '<option value="entry"';
if(isset($tx_template_addition3['tx_recommended_select_option'])){ if($tx_template_addition3['tx_recommended_select_option'] == 'entry') echo ' selected="selected"'; }
echo '>デフォルト</option>';
echo '<option value="rand"';
if(isset($tx_template_addition3['tx_recommended_select_option'])){ if($tx_template_addition3['tx_recommended_select_option'] == 'rand') echo ' selected="selected"'; }
echo '>ランダム</option>';
?>
</select>
</p>

<div class="addition-tab2">
<ul class="addition-tab-in">
<li id="li-tab1">
<label><?php
$tx_recommended_item_path = apply_filters('tx_recommended_or_option', array('itemid',));
foreach($tx_recommended_item_path as $tx_recommended_item_get){
echo '<input type="radio" name="tx_recommended_or_option" id="recommended-change" value="'.esc_attr($tx_recommended_item_get).'"';
if(isset($tx_template_addition3['tx_recommended_or_option']) && $tx_template_addition3['tx_recommended_or_option'] == 'itemid'){ echo ' checked="checked"';}
echo ' />';
}
?>
POST&nbsp;ID</label></li>
<li id="li-tab2">
<label><?php
$tx_recommended_cat_path = apply_filters('tx_recommended_or_option', array('itemcatid',));
foreach($tx_recommended_cat_path as $tx_recommended_cat_get){
echo '<input type="radio" name="tx_recommended_or_option" value="'.esc_attr($tx_recommended_cat_get).'"';
if(isset($tx_template_addition3['tx_recommended_or_option']) && $tx_template_addition3['tx_recommended_or_option'] == 'itemcatid'){ echo ' checked="checked"';}
echo ' />';
}
?>
CATEGORY</label></li>
</ul>

<div id="addition-tab-content1" class="addition-tab-content">
<div class="addition-tab-content-in">
<p style="width:100%;padding-top:5px;"><b>・POST&nbsp;ID&nbsp;-----</b></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;表示したい商品を入力</span><br />
[1]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage1_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage1_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage1_option']);} ?>" size="8" />
[2]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage2_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage2_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage2_option']);} ?>" size="8" />
[3]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage3_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage3_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage3_option']);} ?>" size="8" />
[4]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage4_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage4_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage4_option']);} ?>" size="8" /><br />
[5]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage5_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage5_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage5_option']);} ?>" size="8" />
[6]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage6_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage6_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage6_option']);} ?>" size="8" />
[7]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage7_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage7_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage7_option']);} ?>" size="8" />
[8]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_itempage8_option" value="<?php if(!empty($tx_template_addition3['tx_recommended_itempage8_option'])){ echo esc_attr($tx_template_addition3['tx_recommended_itempage8_option']);} ?>" size="8" />
</p>
</div>
</div>

<div id="addition-tab-content2" class="addition-tab-content">
<div class="addition-tab-content-in">
<p style="width:100%;padding-top:5px;"><b>・CATEGORY&nbsp;-----</b></p>
<p><span style="vertical-align:middle;margin-right:5px;">■&nbsp;表示したいカテゴリを選択</span><br />
<select name="tx_recommended_itempage_cat_option">
<?php
$itempage_recommended_cat_id = get_category_by_slug('item');
$itempage_recommended_cat = get_terms('category', 'hide_empty=0&child_of='.$itempage_recommended_cat_id->term_id.'&orderby=id&order=ASC');
echo '<option value="'.$itempage_recommended_cat_id->term_id.'"';
if(isset($tx_template_addition3['tx_recommended_itempage_cat_option'])){ if($tx_template_addition3['tx_recommended_itempage_cat_option'] == $itempage_recommended_cat_id->term_id) echo ' selected="selected"'; }
echo '>'.$itempage_recommended_cat_id->name.'&nbsp;&nbsp;('.$itempage_recommended_cat_id->category_count.')</option>';
foreach($itempage_recommended_cat as $itempage_recommended_cat_in){
echo '<option value="'.$itempage_recommended_cat_in->term_id.'"';
if(isset($tx_template_addition3['tx_recommended_itempage_cat_option'])){ if($tx_template_addition3['tx_recommended_itempage_cat_option'] == esc_attr($itempage_recommended_cat_in->term_id)) echo ' selected="selected"'; }
echo '>'.esc_attr($itempage_recommended_cat_in->name).'&nbsp;&nbsp;('.$itempage_recommended_cat_in->count.')</option>';
}
?>
</select>
</p>
</div>
</div>

</div>

</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
各商品登録ページの設定が優先されます。
</td>
</tr>

</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">特定商取引法表示ページ設定</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<p>※下記項目以外にWelcart Shop→基本設定の一部分も表示されます。</p>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">社名</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<input type="text" name="tx_com1_option" value="<?php if(!empty($tx_template_addition3['tx_com1_option'])){ echo esc_attr($tx_template_addition3['tx_com1_option']);} ?>" size="30" />
</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
会社概要のページで表示される社名を入力してください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">販売責任者</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<input type="text" name="tx_com2_option" value="<?php if(!empty($tx_template_addition3['tx_com2_option'])){ echo esc_attr($tx_template_addition3['tx_com2_option']);} ?>" size="30" />
</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
会社概要のページで表示される販売責任者を入力してください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">本社所在地</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p><span style="margin-right:10px;">郵便番号</span><input type="text" name="tx_com3_option" value="<?php if(!empty($tx_template_addition3['tx_com3_option'])){ echo esc_attr($tx_template_addition3['tx_com3_option']);} ?>" size="20" /></p>
<p><span style="margin-right:10px;">住所</span><input type="text" name="tx_com4_option" value="<?php if(!empty($tx_template_addition3['tx_com4_option'])){ echo esc_attr($tx_template_addition3['tx_com4_option']);} ?>" size="56" /></p>
</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
会社概要のページで表示される本社所在地を入力してください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">設立</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<input type="text" name="tx_com5_option" value="<?php if(!empty($tx_template_addition3['tx_com5_option'])){ echo esc_attr($tx_template_addition3['tx_com5_option']);} ?>" size="30" />
</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
会社概要のページで表示される設立を入力してください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">電話番号</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<input type="text" name="tx_com6_option" value="<?php if(!empty($tx_template_addition3['tx_com6_option'])){ echo esc_attr($tx_template_addition3['tx_com6_option']);} ?>" size="30" />
</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
会社概要のページで表示される電話番号を入力してください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">事業内容</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<textarea type="text" name="tx_com7_option" rows="5" cols="100"><?php if(!empty($tx_template_addition3['tx_com7_option'])){ echo esc_attr($tx_template_addition3['tx_com7_option']);} ?></textarea>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
会社概要のページで表示される事業内容を入力してください。
<br />改行する場合<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;br /&gt;</span>または<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;p&gt;ここにテキスト&lt;/p&gt;</span>をご使用ください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">その他[1]</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
タイトル：<br />
<input style="margin-bottom:10px;" type="text" name="tx_com8_option" value="<?php if(!empty($tx_template_addition3['tx_com8_option'])){ echo esc_attr($tx_template_addition3['tx_com8_option']);} ?>" size="30" />
<br />内容：<br /><textarea type="text" name="tx_com9_option" rows="5" cols="100">
<?php if(!empty($tx_template_addition3['tx_com9_option'])){ echo esc_attr($tx_template_addition3['tx_com9_option']);} ?>
</textarea>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
改行する場合<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;br /&gt;</span>または<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;p&gt;ここにテキスト&lt;/p&gt;</span>をご使用ください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">その他[2]</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
タイトル：<br />
<input style="margin-bottom:10px;" type="text" name="tx_com10_option" value="<?php if(!empty($tx_template_addition3['tx_com10_option'])){ echo esc_attr($tx_template_addition3['tx_com10_option']);} ?>" size="30" />
<br />内容：<br /><textarea type="text" name="tx_com11_option" rows="5" cols="100">
<?php if(!empty($tx_template_addition3['tx_com11_option'])){ echo esc_attr($tx_template_addition3['tx_com11_option']);} ?>
</textarea>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
改行する場合<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;br /&gt;</span>または<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;p&gt;ここにテキスト&lt;/p&gt;</span>をご使用ください。
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">その他[3]</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
タイトル：<br />
<input style="margin-bottom:10px;" type="text" name="tx_com12_option" value="<?php if(!empty($tx_template_addition3['tx_com12_option'])){ echo esc_attr($tx_template_addition3['tx_com12_option']);} ?>" size="30" />
<br />内容：<br /><textarea type="text" name="tx_com13_option" rows="5" cols="100">
<?php if(!empty($tx_template_addition3['tx_com13_option'])){ echo esc_attr($tx_template_addition3['tx_com13_option']);} ?>
</textarea>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
改行する場合<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;br /&gt;</span>または<span style="color:#d30000;margin:0px 3px;font-weight:bold;">&lt;p&gt;ここにテキスト&lt;/p&gt;</span>をご使用ください。
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">商品コンタクト</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">商品コンタクト</th>
<td style="height:100px;vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p>
<span style="width:100%;float:left;padding-bottom:20px;"><label>商品コンタクトを使用&nbsp;⇒&nbsp;
<?php
$tx_contactitem_path = apply_filters('tx_contact_item_option', array('contactitem',));
foreach($tx_contactitem_path as $tx_contactitem_get){ echo '<input type="checkbox" name="tx_contact_item_option" value="'.esc_attr($tx_contactitem_get).'"';
if(!empty($tx_template_addition3['tx_contact_item_option']) == $tx_contactitem_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label></span>
</p>
<p>
<span style="font-size:14px;font-weight:bold;vertical-align:middle;margin-right:5px;">商品コンタクトページ</span>
<span style="vertical-align:middle;margin-right:10px;">
<select name="tx_con3_option">
<option value=""<?php if(isset($tx_template_addition3['tx_con3_option'])){ if($tx_template_addition3['tx_con3_option'] == '') echo ' selected="selected"';}?>>▼ページを選択▼</option>
<?php
$tx_pages_query1 = get_pages(array('sort_order' => 'ASC','sort_column' => 'ID','offset' => 0,'post_type' => 'page','post_status' => 'publish'));
if($tx_pages_query1){
foreach($tx_pages_query1 as $tx_pages_in1){
$tx_pages_id1 = $tx_pages_in1->ID;
$tx_pages_title1 = $tx_pages_in1->post_title;
echo '<option value="'.$tx_pages_id1.'"';
if(isset($tx_template_addition3['tx_con3_option'])){ if($tx_template_addition3['tx_con3_option'] == $tx_pages_id1) echo ' selected="selected"'; }
echo '>'.$tx_pages_title1.'</option>';
}}else{
echo 'ページがありません。';
}
?>
</select>
</span>
</p>
<p>
<span style="font-size:14px;font-weight:bold;vertical-align:middle;margin-right:5px;">Contact-Form-7</span>
<span style="vertical-align:middle;margin-right:10px;">
<select name="tx_con4_option">
<option value=""<?php if(isset($tx_template_addition3['tx_con4_option'])){ if($tx_template_addition3['tx_con4_option'] == '') echo ' selected="selected"';}?>>▼フォームを選択▼</option>
<?php
$tx_contact_query = new WP_Query(array('orderby' => 'ID', 'order' => 'ASC', 'posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form'));
if($tx_contact_query->have_posts()) :
while($tx_contact_query->have_posts()) : $tx_contact_query->the_post();
$tx_contact_id = get_the_ID();
$tx_contact_title = get_the_title();
echo '<option value="'.$tx_contact_id.'"';
if(isset($tx_template_addition3['tx_con4_option'])){ if($tx_template_addition3['tx_con4_option'] == $tx_contact_id) echo ' selected="selected"'; }
echo '>'.$tx_contact_title.'</option>';
endwhile;
wp_reset_postdata();
?>
</select>
<?php
else:
echo 'フォームがありません。';
endif;
?>
</span>
</p>
</td>
</tr>
<tr valign="top">
<th style="height:30px;"></th>
<td>
contact-form-7.3.0以降(最新)のプラグインをご使用下さい。
</td>
</tr>
</table>




<div style="font-weight:bold;font-size:16px;margin-top:30px;">投稿ページのSNSボタン設定</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:30px;">Tweetボタン</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:15px 0px 15px 10px;">
<p style="margin-bottom:0px;">
<label>Tweetボタンを表示&nbsp;⇒&nbsp;
<?php
$tx_tweet_path = apply_filters('tx_tweet_option', array('tweet',));
foreach($tx_tweet_path as $tx_tweet_get){ echo '<input type="checkbox" name="tx_tweet_option" value="'.esc_attr($tx_tweet_get).'"';
if(!empty($tx_template_addition3['tx_tweet_option']) == $tx_tweet_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label>
</p>
</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:30px;">Like[いいね]ボタン</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:15px 0px 15px 10px;">
<p style="margin-bottom:0px;">
<label>Sharerボタン(シェアボタン)を表示&nbsp;⇒&nbsp;
<?php
$tx_like_path = apply_filters('tx_like_option', array('like',));
foreach($tx_like_path as $tx_like_get){ echo '<input type="checkbox" name="tx_like_option" value="'.esc_attr($tx_like_get).'"';
if(!empty($tx_template_addition3['tx_like_option']) == $tx_like_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label>
</p>
</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:30px;">Hatenaブックマーク</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:15px 0px 15px 10px;">
<p style="margin-bottom:0px;">
<label>Hatenaブックマークを表示&nbsp;⇒&nbsp;
<?php
$tx_hatena_path = apply_filters('tx_hatena_option', array('hatena',));
foreach($tx_hatena_path as $tx_hatena_get){ echo '<input type="checkbox" name="tx_hatena_option" value="'.esc_attr($tx_hatena_get).'"';
if(!empty($tx_template_addition3['tx_hatena_option']) == $tx_hatena_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label>
</p>
</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:30px;">Pocket</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:15px 0px 15px 10px;">
<p style="margin-bottom:0px;">
<label>Pocketを表示&nbsp;⇒&nbsp;
<?php
$tx_pocket_path = apply_filters('tx_pocket_option', array('pocket',));
foreach($tx_pocket_path as $tx_pocket_get){ echo '<input type="checkbox" name="tx_pocket_option" value="'.esc_attr($tx_pocket_get).'"';
if(!empty($tx_template_addition3['tx_pocket_option']) == $tx_pocket_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label>
</p>
</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:30px;">Google+1</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:15px 0px 15px 10px;">
<p style="margin-bottom:0px;">
<label>Google+1を表示&nbsp;⇒&nbsp;
<?php
$tx_google_plus_path = apply_filters('tx_google_plus_option', array('google_plus',));
foreach($tx_google_plus_path as $tx_google_plus_get){ echo '<input type="checkbox" name="tx_google_plus_option" value="'.esc_attr($tx_google_plus_get).'"';
if(!empty($tx_template_addition3['tx_google_plus_option']) == $tx_google_plus_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label>
</p>
</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:30px;">LINE</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p style="margin-bottom:0px;">
<label>LINEを表示&nbsp;⇒&nbsp;
<?php
$tx_line_path = apply_filters('tx_line_option', array('line',));
foreach($tx_line_path as $tx_line_get){ echo '<input type="checkbox" name="tx_line_option" value="'.esc_attr($tx_line_get).'"';
if(!empty($tx_template_addition3['tx_line_option']) == $tx_line_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</label>
</p>
</td>
</tr>

</table>

<?php wp_nonce_field('tx_template_addition3_page'); ?>
<input type="hidden" name="tx_submit" value="tx_submit_addition3" />
<p class="submit">
<input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>