<?php
/**
 * @package TEMPLX TEMPLATE
 */
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>テンプレート｜設定7&nbsp;&nbsp;(Sort)</h2>

<div style="font-weight:bold;font-size:16px;margin:30px 0 20px;">商品UPDATE</div>
<style>
input.sortupdate-submit {font-size:15px;height:40px;line-height:40px;padding:0 30px;background:#c1c1c1;border-style:none;font-weight:bold;cursor:pointer;outline:none;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;}
input.sortupdate-submit:hover {background:#5a5a5a;color:#fff;}
</style>
<script>
jQuery(function($){
<?php if($tx_update_propriety == 'undertake'){ ?>
$('#sortupdate').animate({width:'40px'},1000);
<?php }elseif($tx_update_propriety == 'error'){ ?>
$('#sortupdate').animate({width:'40px',color:'red'},1000);
<?php } ?>
});
</script>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">UPDATE</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 10px 10px;">
<p style="width:50px;line-height:40px;float:left;text-align:center;font-weight:bold;"><?php echo $tx_update_text; ?></p>
<p>
<form action="" method="post">
<input type="hidden" name="tx_sort_itemupdate" value="tx_template_sort_update" />
<input type="submit" class="sortupdate-submit" value="UPDATE" />
</form>
</p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
<p>商品(価格や在庫)の登録、変更など行った場合は<b>UPDATE</b>を実行してください。</p><p style="color:#d30000;">※UPDATEには時間がかかる事があります。</p>
</td>
</tr>
</table>

<form method="post" action="">

<div style="font-weight:bold;font-size:16px;margin-top:30px;">並び替え(ソート)</div>
<table class="form-table" style="border: solid #dbdbdb 1px;background:#eeeeee;margin:10px 0px;">
<tr valign="top">
<th scope="row" style="vertical-align:middle;padding-left:10px;font-weight:bold;font-size:12px;">並び替え設定(ソート設定)</th>
<td style="vertical-align:middle;background:#f6f6f6;padding:20px 0px 20px 10px;">
<p>
<label><?php
$tx_new_item = apply_filters('tx_subnewitem_option', array('newitem',));
foreach($tx_new_item as $tx_new_get){ echo "<input type='checkbox' name='tx_subnewitem_option' value='".esc_attr($tx_new_get)."'";
if($tx_template_addition5['tx_subnewitem_option'] === $tx_new_get){ echo " checked='checked'";
}
echo ' />';
} 
?>
<span style="margin-left:8px;">新着順に並び替えを表示</span></label></p>
<p>
<label><?php
$tx_priceup_item = apply_filters('tx_priceupitem_option', array( 'priceup',));
foreach($tx_priceup_item as $tx_priceup_get){ echo "<input type='checkbox' name='tx_priceupitem_option' value='".esc_attr($tx_priceup_get)."'";
if($tx_template_addition5['tx_priceupitem_option'] === $tx_priceup_get){ echo " checked='checked'";
}
echo ' />';
} 
?>
<span style="margin-left:8px;">価格順に並び替え(昇順)を表示</span></label></p>
<p>
<label><?php
$tx_pricedown_item = apply_filters('tx_pricedownitem_option', array('pricedown',));
foreach($tx_pricedown_item as $tx_pricedown_get){ echo "<input type='checkbox' name='tx_pricedownitem_option' value='".esc_attr($tx_pricedown_get)."'";
if($tx_template_addition5['tx_pricedownitem_option'] === $tx_pricedown_get){ echo " checked='checked'";
}
echo ' />';
} 
?>
<span style="margin-left:8px;">価格順に並び替え(降順)を表示</span></label></p>
<p>
<label><?php
$tx_stockup_item = apply_filters('tx_stockupitem_option', array('stockup',));
foreach($tx_stockup_item as $tx_stockup_get){ echo "<input type='checkbox' name='tx_stockupitem_option' value='".esc_attr($tx_stockup_get)."'";
if($tx_template_addition5['tx_stockupitem_option'] === $tx_stockup_get){ echo " checked='checked'";
}
echo ' />';
} 
?>
<span style="margin-left:8px;">在庫順に並び替え(昇順)を表示</span></label></p>
<p>
<label><?php
$tx_stockdown_item = apply_filters('tx_stockdownitem_option', array('stockdown',));
foreach($tx_stockdown_item as $tx_stockdown_get){ echo "<input type='checkbox' name='tx_stockdownitem_option' value='".esc_attr($tx_stockdown_get)."'";
if($tx_template_addition5['tx_stockdownitem_option'] === $tx_stockdown_get){ echo " checked='checked'";
}
echo ' />';
} 
?>
<span style="margin-left:8px;">在庫順に並び替え(降順)を表示</span></label></p>
<p style="margin-bottom:5px;">
<label><?php
$tx_abcde_item = apply_filters('tx_abcdeitem_option', array('titleup',));
foreach($tx_abcde_item as $tx_abcde_get){ echo "<input type='checkbox' name='tx_abcdeitem_option' value='".esc_attr($tx_abcde_get)."'";
if($tx_template_addition5['tx_abcdeitem_option'] === $tx_abcde_get){ echo " checked='checked'";
}
echo ' />';
} 
?>
<span style="margin-left:8px;">タイトル順に並び替えを表示</span></label></p>
</td>
</tr>
<tr valign="top">
<th></th>
<td>
<p style="color:#d30000;">※初期の並び順は新着順になります。</p>
</td>
</tr>
</table>

<?php wp_nonce_field('tx_template_addition5_page'); ?>
<input type="hidden" name="tx_submit" value="tx_submit_addition5" />
<p class="submit">
<input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>