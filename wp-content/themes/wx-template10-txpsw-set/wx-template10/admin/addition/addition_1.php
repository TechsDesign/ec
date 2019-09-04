<?php
/**
 * @package TEMPLX TEMPLATE
 */
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>テンプレート｜設定1&nbsp;&nbsp;(All)</h2>
<form method="post" action="">

<div style="font-weight:bold;font-size:16px;margin-top:30px;">ロゴ</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">ロゴ</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p><input type="text" name="tx_imglogo_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_imglogo_option'])){ echo esc_attr($tx_template_addition1['tx_imglogo_option']);} ?>" />
<input type="hidden" name="tx_logo1_option" value="<?php if(!empty($tx_template_addition1['tx_logo1_option'])){ echo esc_attr($tx_template_addition1['tx_logo1_option']);} ?>" />
<input type="button" name="logo-up" class="img-select-button" value="SELECT" />
<input type="button" name="logodelete" class="img-delete-button" value="delete" />
</p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
<span style="color:#d30000;">※ロゴのサイズはテンプレート内の/imagesでご確認ください。</span>
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">キーワード・コピーライト</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">header内、キーワード</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<input type="text" name="tx_key_option" value="<?php if(!empty($tx_template_addition1['tx_key_option'])){ echo esc_attr($tx_template_addition1['tx_key_option']);} ?>" size="50" />
</td>
</tr>
<tr valign="top">
<th style="height:60px;"></th>
<td>
head内に出力されるキーワードを入力してください。<br />
※例）wordpress,テンプレート,制作 
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">head内、著作権名</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<input type="text" name="tx_copy_option" value="<?php if(!empty($tx_template_addition1['tx_copy_option'])){ echo esc_attr($tx_template_addition1['tx_copy_option']);} ?>" />
</td>
</tr>
<tr valign="top">
<th></th>
<td>
head内に出力される[meta name="author"]とfooterに出力されるコピーライトを入力してください。<br />
Copyright &copy; 20xx <font color="#d30000">ここに表示されます</font> .All right reserved.<br />
</td>
</tr>
<tr valign="top">
<th></th>
<td>
&lt;title&gt;と&lt;h1&gt;タグは[一般設定]のサイトのタイトル、&lt;meta name="description" 〜 は[一般設定]のキャッチフレーズです。
</td>
</tr>
</table>

<div id="admin-mainimg2">
<div id="admin-loading"><p>&nbsp;</p></div>
<div style="font-weight:bold;font-size:16px;margin-top:30px;">メイン画像</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">メイン画像</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<div class="addition-tab2">
<ul class="addition-tab-in">
<li id="li-tab1">
<label for="still-img"><?php
$htx_mainimg_path = apply_filters('tx_mainimg_option', array('header',));
foreach($htx_mainimg_path as $htx_mainimg_get){
echo '<input type="radio" name="tx_mainimg_option" id="still-img" value="'.esc_attr($htx_mainimg_get).'"';
if(isset($tx_template_addition1['tx_mainimg_option']) && $tx_template_addition1['tx_mainimg_option'] == 'header'){ echo ' checked="checked"';}
echo ' />';
}
?>
Still(静止画像)</label></li>
<li id="li-tab2">
<label for="slide-img"><?php
$stx_mainimg_path = apply_filters('tx_mainimg_option', array('slider',));
foreach($stx_mainimg_path as $stx_mainimg_get){
echo '<input type="radio" name="tx_mainimg_option" id="slide-img" value="'.esc_attr($stx_mainimg_get).'"';
if(isset($tx_template_addition1['tx_mainimg_option']) && $tx_template_addition1['tx_mainimg_option'] == 'slider'){ echo ' checked="checked"';}
echo ' />';
}
?>
Slide(スライド画像)</label></li>
</ul>
<div id="addition-tab-content1" class="addition-tab-content">
<div class="addition-tab-content-in">
<p style="margin:3px 0px;">
<input type="text" name="tx_mainimg_url6_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_mainimg_url6_option'])){ echo esc_attr($tx_template_addition1['tx_mainimg_url6_option']);} ?>" />
<input type="hidden" name="tx_img6_option" value="<?php if(!empty($tx_template_addition1['tx_img6_option'])){ echo esc_attr($tx_template_addition1['tx_img6_option']);} ?>" />
<input type="button" name="images-up6" class="img-select-button" value="SELECT" />
<input type="button" name="imgdelete6" class="img-delete-button" value="delete" />
</p>
<p style="width:100%;margin:5px 0px 0px;"><span style="vertical-align:middle;margin-right:5px;font-weight:bold;">LINK</span><input type="text" name="tx_imglink5_option" value="<?php if(!empty($tx_template_addition1['tx_imglink5_option'])){ echo esc_attr($tx_template_addition1['tx_imglink5_option']);} ?>" size="50" /><span style="margin-left:5px;font-weight:bold;">※&nbsp;http://&nbsp;から入力</span></p>
<p style="margin-top:20px;"><span style="color:#d30000;">※メイン画像のサイズはテンプレート内の/imagesでご確認ください。</span></p>
</div>
</div>
<div id="addition-tab-content2" class="addition-tab-content">
<div class="addition-tab-content-in">
<p style="margin:3px 0px;">
<span style="vertical-align:middle;font-size:15px;color:red;font-weight:bold;margin-right:10px;">[1]</span>
<input type="text" name="tx_mainimg_url1_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_mainimg_url1_option'])){ echo esc_attr($tx_template_addition1['tx_mainimg_url1_option']);} ?>" />
<input type="hidden" name="tx_img1_option" value="<?php if(!empty($tx_template_addition1['tx_img1_option'])){ echo esc_attr($tx_template_addition1['tx_img1_option']);} ?>" />
<input type="button" name="images-up1" class="img-select-button" value="SELECT" />
<input type="button" name="imgdelete1" class="img-delete-button" value="delete" />
</p>
<p style="width:100%;margin:5px 0 20px;"><span style="vertical-align:middle;margin-right:5px;font-weight:bold;">LINK</span><input type="text" name="tx_imglink1_option" value="<?php if(!empty($tx_template_addition1['tx_imglink1_option'])){ echo esc_attr($tx_template_addition1['tx_imglink1_option']);} ?>" size="50" /><span style="margin-left:5px;font-weight:bold;">※&nbsp;http://&nbsp;から入力</span></p>
<p style="margin:3px 0px;">
<span style="vertical-align:middle;font-size:15px;color:red;font-weight:bold;margin-right:10px;">[2]</span>
<input type="text" name="tx_mainimg_url2_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_mainimg_url2_option'])){ echo esc_attr($tx_template_addition1['tx_mainimg_url2_option']);} ?>" />
<input type="hidden" name="tx_img2_option" value="<?php if(!empty($tx_template_addition1['tx_img2_option'])){ echo esc_attr($tx_template_addition1['tx_img2_option']);} ?>" />
<input type="button" name="images-up2" class="img-select-button" value="SELECT" />
<input type="button" name="imgdelete2" class="img-delete-button" value="delete" />
</p>
<p style="width:100%;margin:5px 0 20px;"><span style="vertical-align:middle;margin-right:5px;font-weight:bold;">LINK</span><input type="text" name="tx_imglink2_option" value="<?php if(!empty($tx_template_addition1['tx_imglink2_option'])){ echo esc_attr($tx_template_addition1['tx_imglink2_option']);} ?>" size="50" /><span style="margin-left:5px;font-weight:bold;">※&nbsp;http://&nbsp;から入力</span></p>
<p style="margin:3px 0px;">
<span style="vertical-align:middle;font-size:15px;color:red;font-weight:bold;margin-right:10px;">[3]</span>
<input type="text" name="tx_mainimg_url3_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_mainimg_url3_option'])){ echo esc_attr($tx_template_addition1['tx_mainimg_url3_option']);} ?>" />
<input type="hidden" name="tx_img3_option" value="<?php if(!empty($tx_template_addition1['tx_img3_option'])){ echo esc_attr($tx_template_addition1['tx_img3_option']);} ?>" />
<input type="button" name="images-up3" class="img-select-button" value="SELECT" />
<input type="button" name="imgdelete3" class="img-delete-button" value="delete" />
</p>
<p style="width:100%;margin:5px 0 20px;"><span style="vertical-align:middle;margin-right:5px;font-weight:bold;">LINK</span><input type="text" name="tx_imglink3_option" value="<?php if(!empty($tx_template_addition1['tx_imglink3_option'])){ echo esc_attr($tx_template_addition1['tx_imglink3_option']);} ?>" size="50" /><span style="margin-left:5px;font-weight:bold;">※&nbsp;http://&nbsp;から入力</span></p>
<div id="img-expansion">
<span style="float:left;width:100%;"><em style="font-style:inherit;margin-bottom:10px;cursor:pointer;height:24px;padding:6px 10px 0px;background:#fff;float:left;text-align:center;font-weight:bold;border: solid #d5d5d5 1px;">画像&nbsp;[4]&nbsp;を表示</em></span>
<div>
<p style="margin:3px 0px;">
<span style="vertical-align:middle;font-size:15px;color:red;font-weight:bold;margin-right:10px;">[4]</span>
<input type="text" name="tx_mainimg_url4_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_mainimg_url4_option'])){ echo esc_attr($tx_template_addition1['tx_mainimg_url4_option']);} ?>" />
<input type="hidden" name="tx_img10_option" value="<?php if(!empty($tx_template_addition1['tx_img10_option'])){ echo esc_attr($tx_template_addition1['tx_img10_option']);} ?>" />
<input type="button" name="images-up4" class="img-select-button" value="SELECT" />
<input type="button" name="imgdelete4" class="img-delete-button" value="delete" />
</p>
<p style="width:100%;margin:5px 0 20px;"><span style="vertical-align:middle;margin-right:5px;font-weight:bold;">LINK</span><input type="text" name="tx_imglink10_option" value="<?php if(!empty($tx_template_addition1['tx_imglink10_option'])){ echo esc_attr($tx_template_addition1['tx_imglink10_option']);} ?>" size="50" /><span style="margin-left:5px;font-weight:bold;">※&nbsp;http://&nbsp;から入力</span></p>
</div>
<span style="float:left;width:100%;"><em style="font-style:inherit;cursor:pointer;height:24px;padding:6px 10px 0px;background:#fff;float:left;text-align:center;font-weight:bold;border: solid #d5d5d5 1px;">画像&nbsp;[5]&nbsp;を表示</em></span>
<div>
<p style="margin:3px 0px;">
<span style="vertical-align:middle;font-size:15px;color:red;font-weight:bold;margin-right:10px;">[5]</span>
<input type="text" name="tx_mainimg_url5_option" class="images-img-up" value="<?php if(!empty($tx_template_addition1['tx_mainimg_url5_option'])){ echo esc_attr($tx_template_addition1['tx_mainimg_url5_option']);} ?>" />
<input type="hidden" name="tx_img11_option" value="<?php if(!empty($tx_template_addition1['tx_img11_option'])){ echo esc_attr($tx_template_addition1['tx_img11_option']);} ?>" />
<input type="button" name="images-up5" class="img-select-button" value="SELECT" />
<input type="button" name="imgdelete5" class="img-delete-button" value="delete" />
</p>
<p style="width:100%;margin:5px 0 0;"><span style="vertical-align:middle;margin-right:5px;font-weight:bold;">LINK</span><input type="text" name="tx_imglink11_option" value="<?php if(!empty($tx_template_addition1['tx_imglink11_option'])){ echo esc_attr($tx_template_addition1['tx_imglink11_option']);} ?>" size="50" /><span style="margin-left:5px;font-weight:bold;">※&nbsp;http://&nbsp;から入力</span></p>
</div>
</div>
<p style="width:100%;float:left;margin-top:20px;"><span style="color:#d30000;">※メイン画像のサイズはテンプレート内の/imagesでご確認ください。</span></p>
</div>
</div>
</div>
</td>
</tr>
</table>
</div>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">PC-SP&nbsp;切り替えボタン</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">切り替えボタン</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><span style="line-height:36px;">&nbsp;切り替えボタンを表示&nbsp;⇒&nbsp;
<?php
$tx_switch_on_path = apply_filters('tx_switch_option', array('switch_on',));
foreach($tx_switch_on_path as $tx_switch_on_get){ echo '<input type="checkbox" name="tx_switch_option" value="'.esc_attr($tx_switch_on_get).'"';
if(!empty($tx_template_addition1['tx_switch_option']) == $tx_switch_on_get){
echo ' checked="checked"';
} echo ' />'; }
?>
</span></label>
</p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
スマートフォンで閲覧時に表示される「PC-SP切り替えボタン」 の表示/非表示設定です。
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">SNSボタン、SNS連携</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">Twitter</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/twitter.png" width="36" height="36" alt="twitter" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_twitter_path = apply_filters('tx_twitter_option', array('twitter',));
foreach($tx_twitter_path as $tx_twitter_get){ echo '<input type="checkbox" name="tx_twitter_option" value="'.esc_attr($tx_twitter_get).'"';
if(!empty($tx_template_addition1['tx_twitter_option']) == $tx_twitter_get){
echo ' checked="checked"';
} echo ' />'; }
?>
</span></label>
<span style="vertical-align:middle;margin-left:10px;font-weight:bold;">・・・・・&nbsp;表示する場合、Twitterアカウント名を入力してください。</span>
</p>
<p style="margin-bottom:0px;">「アカウント名」&nbsp;https&#058;&#047;&#047;twitter.com&#047;<input type="text" name="tx_tw_option" value="<?php if(!empty($tx_template_addition1['tx_tw_option'])){ echo esc_attr($tx_template_addition1['tx_tw_option']);} ?>" /><br />
<span style="color:#d30000;">※https&#058;&#047;&#047;twitter.com&#047;より後ろを入力してください。</span><br />
<span style="color:#d30000;">※アカウント名はtwitter cardでも使用します。</span>
</p>
</td>
</tr>
<tr valign="top">
<th style="height:5px;"></th>
<td>
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">Facebook</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/facebook.png" width="36" height="36" alt="Facebook" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_facebook_path = apply_filters('tx_facebook_option', array('facebook',));
foreach($tx_facebook_path as $tx_facebook_get){ echo '<input type="checkbox" name="tx_facebook_option" value="'.esc_attr($tx_facebook_get).'"';
if(!empty($tx_template_addition1['tx_facebook_option']) == $tx_facebook_get){
echo ' checked="checked"';
} echo ' />'; }
?>
</span></label>
<span style="vertical-align:middle;margin-left:10px;font-weight:bold;">・・・・・&nbsp;表示する場合、Facebookアカウント名を入力してください。</span>
</p>
<p style="margin-bottom:30px;">「アカウント名」&nbsp;https&#058;&#047;&#047;www.facebook.com&#047;<input type="text" name="tx_fa_option" value="<?php if(!empty($tx_template_addition1['tx_fa_option'])){ echo esc_attr($tx_template_addition1['tx_fa_option']);} ?>" /><br />
<span style="color:#d30000;">※https&#058;&#047;&#047;www.facebook.com&#047;より後ろを入力してください。</span>
</p>
<p>「AdminID」&nbsp;<input type="text" name="tx_fb_admin_option" value="<?php if(!empty($tx_template_addition1['tx_fb_admin_option'])){ echo esc_attr($tx_template_addition1['tx_fb_admin_option']);} ?>" /></p>
<p>「AppID」&nbsp;<input type="text" name="tx_fb_app_option" value="<?php if(!empty($tx_template_addition1['tx_fb_app_option'])){ echo esc_attr($tx_template_addition1['tx_fb_app_option']);} ?>" /></p>
<p style="color:#d30000;">※ogpで使用します。「AdminID」「AppID」どちらか入力。</p>
</td>
</tr>
<tr valign="top">
<th style="height:5px;"></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">Instagram</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/instagram.png" width="36" height="36" alt="instagram" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_instagram_path = apply_filters('tx_instagram_option', array('instagram',));
foreach($tx_instagram_path as $tx_instagram_get){ echo '<input type="checkbox" name="tx_instagram_option" value="'.esc_attr($tx_instagram_get).'"';
if(!empty($tx_template_addition1['tx_instagram_option']) == $tx_instagram_get){
echo ' checked="checked"';
} echo ' />'; }
?>
</span></label>
<span style="vertical-align:middle;margin-left:10px;font-weight:bold;">・・・・・&nbsp;表示する場合、Instagramアカウント名を入力してください。</span>
</p>
<p style="margin-bottom:0px;">「アカウント名」&nbsp;https&#058;&#047;&#047;www.instagram.com&#047;<input type="text" name="tx_insta_option" value="<?php if(!empty($tx_template_addition1['tx_insta_option'])){ echo esc_attr($tx_template_addition1['tx_insta_option']);} ?>" /><br />
<span style="color:#d30000;">※https&#058;&#047;&#047;www.instagram.com&#047;より後ろを入力してください。</span>
</p>
</td>
</tr>
<tr valign="top">
<th style="height:5px;"></th>
<td>
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">Google+1</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/google-plus.png" width="36" height="36" alt="google+1" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_google_plus_img_path = apply_filters('tx_google_plus_img_option', array('google_plus_img',));
foreach($tx_google_plus_img_path as $tx_google_plus_img_get){ echo '<input type="checkbox" name="tx_google_plus_img_option" value="'.esc_attr($tx_google_plus_img_get).'"';
if(!empty($tx_template_addition1['tx_google_plus_img_option']) == $tx_google_plus_img_get){
echo ' checked="checked"';
} echo ' />'; }
?>
</span></label>
<span style="vertical-align:middle;margin-left:10px;font-weight:bold;">・・・・・&nbsp;表示する場合、https&#058;&#047;&#047;plus.google.com&#047;から後ろを入力してください。</span>
</p>
<p style="margin-bottom:0px;">https&#058;&#047;&#047;plus.google.com&#047;<input type="text" name="tx_google_plus_1_option" value="<?php if(!empty($tx_template_addition1['tx_google_plus_1_option'])){ echo esc_attr($tx_template_addition1['tx_google_plus_1_option']);} ?>" /><br />
<span style="color:#d30000;">※https&#058;&#047;&#047;plus.google.com&#047;より後ろを入力してください。</span></p>
</td>
</tr>
<tr valign="top">
<th style="height:5px;"></th>
<td>

</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">Hatenaブックマーク</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/hatena.png" width="36" height="36" alt="Hatena" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_hatena_img_path = apply_filters('tx_hatena_img_option', array('hatena_img',));
foreach($tx_hatena_img_path as $tx_hatena_img_get){ echo '<input type="checkbox" name="tx_hatena_img_option" value="'.esc_attr($tx_hatena_img_get).'"';
if(!empty($tx_template_addition1['tx_hatena_img_option']) == $tx_hatena_img_get){
echo ' checked="checked"';
} echo ' />'; }
?>
</span></label>
</p>
</td>
</tr>
<tr valign="top">
<th style="height:5px;"></th>
<td>
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">お問い合わせフォーム</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p>
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/mail.png" width="36" height="36" alt="contact" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_mail_path = apply_filters('tx_mail_option', array('contact',));
foreach($tx_mail_path as $tx_mail_get){ echo '<input type="checkbox" name="tx_mail_option" value="'.esc_attr($tx_mail_get).'"';
if(!empty($tx_template_addition1['tx_mail_option']) == $tx_mail_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</span></label>
</p>
<p>
<span style="font-size:14px;font-weight:bold;vertical-align:middle;margin-right:5px;">お問い合わせページ</span>
<span style="vertical-align:middle;margin-right:10px;">
<select name="tx_con1_option">
<option value=""<?php if(isset($tx_template_addition1['tx_con1_option'])){ if($tx_template_addition1['tx_con1_option'] == '') echo ' selected="selected"';}?>>▼ページを選択▼</option>
<?php
$tx_pages_query1 = get_pages(array('sort_order' => 'ASC','sort_column' => 'ID','offset' => 0,'post_type' => 'page','post_status' => 'publish'));
if($tx_pages_query1){
foreach($tx_pages_query1 as $tx_pages_in1){
$tx_pages_id1 = $tx_pages_in1->ID;
$tx_pages_title1 = $tx_pages_in1->post_title;
echo '<option value="'.$tx_pages_id1.'"';
if(isset($tx_template_addition1['tx_con1_option'])){ if($tx_template_addition1['tx_con1_option'] == $tx_pages_id1) echo ' selected="selected"'; }
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
<select name="tx_con2_option">
<option value=""<?php if(isset($tx_template_addition1['tx_con2_option'])){ if($tx_template_addition1['tx_con2_option'] == '') echo ' selected="selected"';}?>>▼フォームを選択▼</option>
<?php
$tx_contact_query = new WP_Query(array('orderby' => 'ID', 'order' => 'ASC', 'posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form'));
if($tx_contact_query->have_posts()) :
while($tx_contact_query->have_posts()) : $tx_contact_query->the_post();
$tx_contact_id = get_the_ID();
$tx_contact_title = get_the_title();
echo '<option value="'.$tx_contact_id.'"';
if(isset($tx_template_addition1['tx_con2_option'])){ if($tx_template_addition1['tx_con2_option'] == $tx_contact_id) echo ' selected="selected"'; }
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
<p style="color:#d30000;">※contact-form-7.3.0以降(最新)のプラグインをご使用下さい。</p>
</td>
</tr>
<tr valign="top">
<th style="height:5px;"></th>
<td></td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;height:50px;">RSS</th>
<td style="vertical-align:middle;background:#f6f6f6;">
<p style="margin-bottom:0px;">
<label><span style="height:36px;margin-right:5px;float:left;overflow:hidden;"><img src="<?php echo get_bloginfo('template_directory');?>/images/sns/rss.png" width="36" height="36" alt="rss" /></span>
<span style="line-height:36px;">&nbsp;を表示&nbsp;⇒&nbsp;
<?php
$tx_rss_path = apply_filters('tx_rss_option', array('rss',));
foreach($tx_rss_path as $tx_rss_get){ echo '<input type="checkbox" name="tx_rss_option" value="'.esc_attr($tx_rss_get).'"';
if(!empty($tx_template_addition1['tx_rss_option']) == $tx_rss_get){
echo ' checked="checked"';
} echo ' />'; } 
?>
</span></label>
</p>
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">Google Analytics</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">トラッキングコード</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p style="margin-bottom:0px;">
<span style="font-size:14px;font-weight:bold;vertical-align:middle;margin-right:5px;">トラッキングコード</span>
<span style="vertical-align:middle;margin-right:10px;"><input type="text" name="tx_google_option" value="<?php if(!empty($tx_template_addition1['tx_google_option'])){ echo esc_attr($tx_template_addition1['tx_google_option']);} ?>" size="40" /></span>
</p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
<p>
googleが無料で提供しているホームページのアクセス解析【Google Analytics】<br />
申し込み/利用開始は<a href="https://www.google.com/intl/ja_ALL/analytics/" target="_blank">Google Analytics</a>から可能です。
</p>
<p style="margin-bottom:0px;">
アカウントを開設しましたらトラッキングコードが発行されます。<br />
※例）<span style="font-size:17px;color:#d30000;font-weight:bold;margin:5px;">UA-xxxxxxxx-x</span><br />
UA-から全て入力してください。
</p>
</td>
</tr>
</table>


<?php wp_nonce_field('tx_template_addition1_page'); ?>
<input type="hidden" name="tx_submit" value="tx_submit_addition1" />
<p class="submit">
<input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>