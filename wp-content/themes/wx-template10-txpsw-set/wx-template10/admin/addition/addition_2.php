<?php
/**
 * @package TEMPLX TEMPLATE
 */
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>テンプレート｜設定2&nbsp;&nbsp;(Free)</h2>

<form method="post" action="">

<div style="font-weight:bold;font-size:16px;margin-top:30px;">ヘッダースペース</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">ヘッダースペース</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p><textarea type="text" name="tx_toplink_option" rows="5" cols="100"><?php if(!empty($tx_template_addition2['tx_toplink_option'])){ echo esc_attr($tx_template_addition2['tx_toplink_option']);} ?></textarea></p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
<p>レイアウトが崩れない程度に指定する事をお勧めします。</p>
<p style="color:#d30000;">※phpの記述はできませんがjsの記述は可能です。</p>
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">フッタースペース</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">フッタースペース</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p><textarea type="text" name="tx_footer_option" rows="12" cols="100"><?php if(!empty($tx_template_addition2['tx_footer_option'])){ echo esc_attr($tx_template_addition2['tx_footer_option']);} ?></textarea></p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
<p>レイアウトが崩れない程度に指定する事をお勧めします。</p>
<p style="color:#d30000;">※phpの記述はできませんがjsの記述は可能です。</p>
</td>
</tr>
</table>

<div style="font-weight:bold;font-size:16px;margin-top:30px;">各フリースペース</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">フリースペース1</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<textarea type="text" name="tx_textarea1_option" rows="8" cols="100"><?php if(!empty($tx_template_addition2['tx_textarea1_option'])){ echo esc_attr($tx_template_addition2['tx_textarea1_option']);} ?></textarea>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
ウィジェットに表示されるフリースペースです。<br />htmlタグも記述可能です。
<p style="color:#d30000;">※phpの記述はできませんがjsの記述は可能です。</p>
</td>
</tr>
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">フリースペース2</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<textarea type="text" name="tx_textarea2_option" rows="12" cols="100"><?php if(!empty($tx_template_addition2['tx_textarea2_option'])){ echo esc_attr($tx_template_addition2['tx_textarea2_option']);} ?></textarea>
</td>
</tr>
<tr valign="top">
<th style="height:80px;"></th>
<td>
トップページのコンテンツに表示されるフリースペースです。<br />htmlタグの記述可能です。
<p style="color:#d30000;">※phpの記述はできませんがjsの記述は可能です。</p>
</td>
</tr>

<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">フリースペース3</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<textarea type="text" name="tx_textarea3_option" rows="12" cols="100"><?php if(!empty($tx_template_addition2['tx_textarea3_option'])){ echo esc_attr($tx_template_addition2['tx_textarea3_option']);} ?></textarea>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
トップページのコンテンツに表示されるフリースペースです。<br />htmlタグの記述可能です。
<p style="color:#d30000;">※phpの記述はできませんがjsの記述は可能です。</p>
</td>
</tr>
</table>

<?php wp_nonce_field('tx_template_addition2_page'); ?>
<input type="hidden" name="tx_submit" value="tx_submit_addition2" />
<p class="submit">
<input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>