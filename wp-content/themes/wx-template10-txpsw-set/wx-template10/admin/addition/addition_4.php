<?php
/**
 * @package TEMPLX TEMPLATE
 */
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>テンプレート｜設定4&nbsp;&nbsp;(Color1)</h2>
<form method="post" action="">

<div id="admin-mainimg1">
<div id="admin-loading"><p>&nbsp;</p></div>
<div style="font-weight:bold;font-size:16px;margin-top:30px;">カラー設定1</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">カラー設定1</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 10px;">
<div id="color-tab"><p class="select">全体</p><p>ヘッダー</p><p>フッター</p><div id="color-reset">リセット</div><div id="submit-on1">↓保存してください</div></div>
<div id="color-select" class="color-form">

<?php //all▼ ?>
<div class="color-in">
<p><span class="c-w">○&nbsp;メインカラー</span><input type="text" name="tx_color1_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color1_option'])){ echo esc_attr($tx_template_addition4['tx_color1_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストカラー</span><input type="text" name="tx_color2_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color2_option'])){ echo esc_attr($tx_template_addition4['tx_color2_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストリンクカラー</span><input type="text" name="tx_color3_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color3_option'])){ echo esc_attr($tx_template_addition4['tx_color3_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストリンクカラー(hover)</span><input type="text" name="tx_color4_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color4_option'])){ echo esc_attr($tx_template_addition4['tx_color4_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;背景</span><input type="text" name="tx_color5_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color5_option'])){ echo esc_attr($tx_template_addition4['tx_color5_option']);} ?>" /></p>
</div>
<?php //all▲ ?>

<?php //header▼ ?>
<div class="color-hide color-in">
<p><span class="c-w">○&nbsp;テキストカラー</span><input type="text" name="tx_color7_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color7_option'])){ echo esc_attr($tx_template_addition4['tx_color7_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストリンクカラー</span><input type="text" name="tx_color8_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color8_option'])){ echo esc_attr($tx_template_addition4['tx_color8_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストリンクカラー(hover)</span><input type="text" name="tx_color9_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color9_option'])){ echo esc_attr($tx_template_addition4['tx_color9_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;ボーダーカラー</span><input type="text" name="tx_color10_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color10_option'])){ echo esc_attr($tx_template_addition4['tx_color10_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;ボーダーカラー(slide)</span><input type="text" name="tx_color11_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color11_option'])){ echo esc_attr($tx_template_addition4['tx_color11_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;メニューカラー(スマートフォン)</span><input type="text" name="tx_color16_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color16_option'])){ echo esc_attr($tx_template_addition4['tx_color16_option']);} ?>" /></p>
</div>
<?php //header▲ ?>

<?php //footer▼ ?>
<div class="color-hide color-in">
<p><span class="c-w">○&nbsp;テキストカラー</span><input type="text" name="tx_color12_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color12_option'])){ echo esc_attr($tx_template_addition4['tx_color12_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストリンクカラー</span><input type="text" name="tx_color13_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color13_option'])){ echo esc_attr($tx_template_addition4['tx_color13_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;テキストリンクカラー(hover)</span><input type="text" name="tx_color14_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color14_option'])){ echo esc_attr($tx_template_addition4['tx_color14_option']);} ?>" /></p>
<p><span class="c-w">○&nbsp;SNSボタン</span><input type="text" name="tx_color15_option" class="colorpicker" value="<?php if(!empty($tx_template_addition4['tx_color15_option'])){ echo esc_attr($tx_template_addition4['tx_color15_option']);} ?>" /></p>
</div>
<?php //footer▲ ?>

</div>
</td>
</tr>
</table>
</div>

<?php wp_nonce_field('tx_template_addition4_page'); ?>
<input type="hidden" name="tx_submit" value="tx_submit_addition4" />
<div id="submit-on2">↓保存してください</div>
<div id="color-submit" class="submit"><input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" /></div>

<div id="reset-box-in">
<p>リセットした場合、復元できませんがよろしいですか？<br />※このページの全てのカラーが削除されます。</p>
<p id="color-reset-ok">リセット</p>
<p id="color-reset-close">キャンセル</p>
</div>
</form>
</div>