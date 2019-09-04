<?php
/**
 * e-SCOTT Smart
 * Version: 1.0.0
 * Author: Collne Inc.
 */
class ESCOTT_SETTLEMENT extends ESCOTT_MAIN
{
	/**
	 * Instance of this class.
	 */
	protected static $instance = null;

	public function __construct() {

		$this->acting_name = 'e-SCOTT';
		$this->acting_formal_name = 'e-SCOTT Smart';

		$this->acting_card = 'escott_card';
		$this->acting_conv = 'escott_conv';
		$this->acting_atodene = '';

		$this->acting_flg_card = 'acting_escott_card';
		$this->acting_flg_conv = 'acting_escott_conv';
		$this->acting_flg_atodene = '';

		$this->pay_method = array(
			'acting_escott_card',
			'acting_escott_conv',
		);
		$this->merchantfree3 = 'wc1collne';
		$this->quick_key_pre = 'escott';

		parent::__construct( 'escott' );

		$this->initialize_data();
	}

	/**
	 * Return an instance of this class.
	 */
	public static function get_instance() {
		if( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Initialize
	 */
	public function initialize_data() {

		$options = get_option( 'usces' );
		if( !isset( $options['acting_settings'] ) || !isset( $options['acting_settings']['escott'] ) ) {
			$options['acting_settings']['escott']['merchant_id'] = ( isset( $options['acting_settings']['escott']['merchant_id'] ) ) ? $options['acting_settings']['escott']['merchant_id'] : '';
			$options['acting_settings']['escott']['merchant_pass'] = ( isset( $options['acting_settings']['escott']['merchant_pass'] ) ) ? $options['acting_settings']['escott']['merchant_pass'] : '';
			$options['acting_settings']['escott']['tenant_id'] = ( isset( $options['acting_settings']['escott']['tenant_id'] ) ) ? $options['acting_settings']['escott']['tenant_id'] : '0001';
			$options['acting_settings']['escott']['ope'] = ( isset( $options['acting_settings']['escott']['ope'] ) ) ? $options['acting_settings']['escott']['ope'] : 'test';
			$options['acting_settings']['escott']['card_activate'] = ( isset( $options['acting_settings']['escott']['card_activate'] ) ) ? $options['acting_settings']['escott']['card_activate'] : 'off';
			$options['acting_settings']['escott']['seccd'] = ( isset( $options['acting_settings']['escott']['seccd'] ) ) ? $options['acting_settings']['escott']['seccd'] : 'on';
			$options['acting_settings']['escott']['token_code'] = ( isset( $options['acting_settings']['escott']['token_code'] ) ) ? $options['acting_settings']['escott']['token_code'] : '';
			$options['acting_settings']['escott']['quickpay'] = ( isset( $options['acting_settings']['escott']['quickpay'] ) ) ? $options['acting_settings']['escott']['quickpay'] : 'off';
			$options['acting_settings']['escott']['chooseable_quickpay'] = ( isset( $options['acting_settings']['escott']['chooseable_quickpay'] ) ) ? $options['acting_settings']['escott']['chooseable_quickpay'] : 'on';
			$options['acting_settings']['escott']['operateid'] = ( isset( $options['acting_settings']['escott']['operateid'] ) ) ? $options['acting_settings']['escott']['operateid'] : '1Gathering';
			$options['acting_settings']['escott']['howtopay'] = ( isset( $options['acting_settings']['escott']['howtopay'] ) ) ? $options['acting_settings']['escott']['howtopay'] : '1';
			$options['acting_settings']['escott']['conv_activate'] = ( isset( $options['acting_settings']['escott']['conv_activate'] ) ) ? $options['acting_settings']['escott']['conv_activate'] : 'off';
			$options['acting_settings']['escott']['conv_limit'] = ( !empty( $options['acting_settings']['escott']['conv_limit'] ) ) ? $options['acting_settings']['escott']['conv_limit'] : '7';
			$options['acting_settings']['escott']['conv_fee_type'] = ( isset( $options['acting_settings']['escott']['conv_fee_type'] ) ) ? $options['acting_settings']['escott']['conv_fee_type'] : '';
			$options['acting_settings']['escott']['conv_fee'] = ( isset( $options['acting_settings']['escott']['conv_fee'] ) ) ? $options['acting_settings']['escott']['conv_fee'] : '';
			$options['acting_settings']['escott']['conv_fee_limit_amount'] = ( isset( $options['acting_settings']['escott']['conv_fee_limit_amount'] ) ) ? $options['acting_settings']['escott']['conv_fee_limit_amount'] : '';
			$options['acting_settings']['escott']['conv_fee_first_amount'] = ( isset( $options['acting_settings']['escott']['conv_fee_first_amount'] ) ) ? $options['acting_settings']['escott']['conv_fee_first_amount'] : '';
			$options['acting_settings']['escott']['conv_fee_first_fee'] = ( isset( $options['acting_settings']['escott']['conv_fee_first_fee'] ) ) ? $options['acting_settings']['escott']['conv_fee_first_fee'] : '';
			$options['acting_settings']['escott']['conv_fee_amounts'] = ( isset( $options['acting_settings']['escott']['conv_fee_amounts'] ) ) ? $options['acting_settings']['escott']['conv_fee_amounts'] : array();
			$options['acting_settings']['escott']['conv_fee_fees'] = ( isset( $options['acting_settings']['escott']['conv_fee_fees'] ) ) ? $options['acting_settings']['escott']['conv_fee_fees'] : array();
			$options['acting_settings']['escott']['conv_fee_end_fee'] = ( isset( $options['acting_settings']['escott']['conv_fee_end_fee'] ) ) ? $options['acting_settings']['escott']['conv_fee_end_fee'] : '';
			$options['acting_settings']['escott']['atodene_activate'] = 'off';
			$options['acting_settings']['escott']['activate'] = ( isset( $options['acting_settings']['escott']['activate'] ) ) ? $options['acting_settings']['escott']['activate'] : 'off';
			$options['acting_settings']['escott']['sec3d_activate'] = ( isset( $options['acting_settings']['escott']['sec3d_activate'] ) ) ? $options['acting_settings']['escott']['sec3d_activate'] : 'off';
			$options['acting_settings']['escott']['sec3d_encKey'] = ( isset( $options['acting_settings']['escott']['sec3d_encKey'] ) ) ? $options['acting_settings']['escott']['sec3d_encKey'] : '';
			$options['acting_settings']['escott']['sec3d_iv'] = ( isset( $options['acting_settings']['escott']['sec3d_iv'] ) ) ? $options['acting_settings']['escott']['sec3d_iv'] : '';
			update_option( 'usces', $options );
		}

		$available_settlement = get_option( 'usces_available_settlement' );
		if( !in_array( 'escott', $available_settlement ) ) {
			$available_settlement['escott'] = 'e-SCOTT Smart';
			update_option( 'usces_available_settlement', $available_settlement );
		}

		$noreceipt_status = get_option( 'usces_noreceipt_status' );
		if( !in_array( 'acting_escott_conv', $noreceipt_status ) ) {
			$noreceipt_status[] = 'acting_escott_conv';
			update_option( 'usces_noreceipt_status', $noreceipt_status );
		}

		$this->unavailable_method = array( 'acting_welcart_card', 'acting_zeus_card', 'acting_zeus_conv', 'acting_sbps_card' );
	}

	/**
	 * @fook   admin_print_footer_scripts
	 * @param  -
	 * @return -
	 * @echo   js
	 */
	public function admin_scripts() {

		$admin_page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : '';
		switch( $admin_page ):
		case 'usces_settlement':
			$settlement_selected = get_option( 'usces_settlement_selected' );
			if( in_array( $this->paymod_id, (array)$settlement_selected ) ):
				$acting_opts = $this->get_acting_settings();
				if( !isset( $acting_opts['sec3d_activate'] ) ){
					$acting_opts['sec3d_activate'] = 'off';
				}
?>
<script type="text/javascript">
jQuery( document ).ready( function( $ ) {
	var card_activate = "<?php echo $acting_opts['card_activate']; ?>";
	var conv_activate = "<?php echo $acting_opts['conv_activate']; ?>";
	var sec3d_activate = "<?php echo $acting_opts['sec3d_activate']; ?>";

	if( "on" == card_activate || "token" == card_activate ) {
		$( ".card_escott" ).css( "display", "" );
		$( ".card_token_code_escott" ).css( "display", "" );
		$( ".card_howtopay_escott" ).css( "display", "" );
		var quickpay_escott = "<?php echo $acting_opts['quickpay']; ?>";
		if( "on" == quickpay_escott ) {
			$( ".card_chooseable_quickpay_escott" ).css( "display", "" );
		} else {
			$( ".card_chooseable_quickpay_escott" ).css( "display", "none" );
		}
	} else if( "link" == card_activate ) {
		$( ".card_escott" ).css( "display", "" );
		$( ".card_token_code_escott" ).css( "display", "none" );
		$( ".card_howtopay_escott" ).css( "display", "none" );
		var quickpay_escott = "<?php echo $acting_opts['quickpay']; ?>";
		if( "on" == quickpay_escott ) {
			$( ".card_chooseable_quickpay_escott" ).css( "display", "" );
		} else {
			$( ".card_chooseable_quickpay_escott" ).css( "display", "none" );
		}
	} else {
		$( ".card_escott" ).css( "display", "none" );
		$( ".card_token_code_escott" ).css( "display", "none" );
		$( ".card_howtopay_escott" ).css( "display", "none" );
		$( ".card_chooseable_quickpay_escott" ).css( "display", "none" );
	}

	if( "on" == sec3d_activate ) {
		$( ".card_sec3d_escott" ).css( "display", "" );
	} else {
		$( ".card_sec3d_escott" ).css( "display", "none" );
	}

	if( "on" == conv_activate ) {
		$( ".conv_escott" ).css( "display", "" );
	} else {
		$( ".conv_escott" ).css( "display", "none" );
	}

	$( document ).on( "change", ".card_activate_escott", function() {
		if( "on" == $( this ).val() || "token" == $( this ).val() ) {
			$( ".card_escott" ).css( "display", "" );
			$( ".card_token_code_escott" ).css( "display", "" );
			$( ".card_howtopay_escott" ).css( "display", "" );
		} else if( "link" == $( this ).val() ) {
			$( ".card_escott" ).css( "display", "" );
			$( ".card_token_code_escott" ).css( "display", "none" );
			$( ".card_howtopay_escott" ).css( "display", "none" );
		} else {
			$( ".card_escott" ).css( "display", "none" );
			$( ".card_token_code_escott" ).css( "display", "none" );
			$( ".card_howtopay_escott" ).css( "display", "none" );
			$( ".card_chooseable_quickpay_escott" ).css( "display", "none" );
		}
		if( "off" == $( ".sec3d_activate_escott:checked" ).val() ) {
			$( ".card_sec3d_escott" ).css( "display", "none" );
		}
	});

	$( document ).on( "change", ".sec3d_activate_escott", function() {
		if( "on" == $( this ).val() ) {
			$( ".card_sec3d_escott" ).css( "display", "" );
		} else {
			$( ".card_sec3d_escott" ).css( "display", "none" );
		}
	});

	$( document ).on( "change", ".quickpay_escott", function() {
		if( "on" == $( this ).val() ) {
			$( ".card_chooseable_quickpay_escott" ).css( "display", "" );
		} else {
			$( ".card_chooseable_quickpay_escott" ).css( "display", "none" );
		}
	});

	$( document ).on( "change", ".conv_activate_escott", function() {
		if( "on" == $( this ).val() ) {
			$( ".conv_escott" ).css( "display", "" );
		} else {
			$( ".conv_escott" ).css( "display", "none" );
		}
	});

	adminSettlementEScott = {
		openFee : function( mode ) {
			$( "#fee_change_field" ).html( "" );
			$( "#fee_fix" ).val( $( "#"+mode+"_fee" ).val() );
			$( "#fee_limit_amount_fix" ).val( $( "#"+mode+"_fee_limit_amount_fix" ).val() );
			$( "#fee_first_amount" ).val( $( "#"+mode+"_fee_first_amount" ).val() );
			$( "#fee_first_fee" ).val( $( "#"+mode+"_fee_first_fee" ).val() );
			$( "#fee_limit_amount_change" ).val( $( "#"+mode+"_fee_limit_amount_change" ).val() );
			var fee_amounts = new Array();
			var fee_fees = new Array();
			if( 0 < $( "#"+mode+"_fee_amounts" ).val().length ) {
				fee_amounts = $( "#"+mode+"_fee_amounts" ).val().split( "|" );
			}
			if( 0 < $( "#"+mode+"_fee_fees" ).val().length ) {
				fee_fees = $( "#"+mode+"_fee_fees" ).val().split( "|" );
			}
			if( 0 < fee_amounts.length ) {
				var amount = parseInt( $( "#fee_first_amount" ).val() ) + 1;
				for( var i = 0; i < fee_amounts.length; i++ ) {
					html = '<tr id="row_'+i+'"><td class="cod_f"><span id="amount_'+i+'">'+amount+'</span></td><td class="cod_m"><?php _e( ' - ', 'usces' ); ?></td><td class="cod_e"><input name="fee_amounts['+i+']" type="text" class="short_str num" value="'+fee_amounts[i]+'" /></td><td class="cod_cod"><input name="fee_fees['+i+']" type="text" class="short_str num" value="'+fee_fees[i]+'" /></td></tr>';
					$( "#fee_change_field" ).append( html );
					amount = parseInt( fee_amounts[i] ) + 1;
				}
				$( "#end_amount" ).html( amount );
			} else {
				$( "#end_amount" ).html( parseInt( $( "#"+mode+"_fee_first_amount" ).val() ) + 1 );
			}
			$( "#fee_end_fee" ).val( $( "#"+mode+"_fee_end_fee" ).val() );

			var fee_type = $( "#"+mode+"_fee_type" ).val();
			if( "change" == fee_type ) {
				$( "#fee_type_change" ).prop( "checked", true );
				$( "#escott_fee_fix_table" ).css( "display", "none" );
				$( "#escott_fee_change_table" ).css( "display", "" );
			} else {
				$( "#fee_type_fix" ).prop( "checked", true );
				$( "#escott_fee_fix_table" ).css( "display", "" );
				$( "#escott_fee_change_table" ).css( "display", "none" );
			}
		},

		updateFee : function( mode ) {
			var fee_type = $( "input[name='fee_type']:checked" ).val();
			$( "#"+mode+"_fee_type" ).val( fee_type );
			$( "#"+mode+"_fee" ).val( $( "#fee_fix" ).val() );
			$( "#"+mode+"_fee_limit_amount_"+fee_type ).val( $( "#fee_limit_amount_"+fee_type ).val() );
			$( "#"+mode+"_fee_first_amount" ).val( $( "#fee_first_amount" ).val() );
			$( "#"+mode+"_fee_first_fee" ).val( $( "#fee_first_fee" ).val() );
			var fee_amounts = "";
			var fee_fees = "";
			var sp = "";
			var fee_amounts_length = $( "input[name^='fee_amounts']" ).length;
			for( var i = 0; i < fee_amounts_length; i++ ) {
				fee_amounts += sp + $( "input[name='fee_amounts\["+i+"\]']" ).val();
				fee_fees += sp + $( "input[name='fee_fees\["+i+"\]']" ).val();
				sp = "|";
			}
			$( "#"+mode+"_fee_amounts" ).val( fee_amounts );
			$( "#"+mode+"_fee_fees" ).val( fee_fees );
			$( "#"+mode+"_fee_end_fee" ).val( $( "#fee_end_fee" ).val() );
		},

		setFeeType : function( mode, closed ) {
			var fee_type = $( "input[name='fee_type']:checked" ).val();
			if( "change" == fee_type ) {
				$( "#"+mode+"_fee_type_field" ).html( "<?php _e( 'Variable', 'usces' ); ?>" );
				if( !closed ) {
					$( "#escott_fee_fix_table" ).css( "display", "none" );
					$( "#escott_fee_change_table" ).css( "display", "" );
				}
			} else if( "fix" == fee_type ) {
				$( "#"+mode+"_fee_type_field" ).html( "<?php _e( 'Fixation', 'usces' ); ?>" );
				if( !closed ) {
					$( "#escott_fee_fix_table" ).css( "display", "" );
					$( "#escott_fee_change_table" ).css( "display", "none" );
				}
			}
		}
	};

	$( "#escott_fee_dialog" ).dialog({
		autoOpen: false,
		height: 500,
		width: 450,
		modal: true,
		open: function() {
			adminSettlementEScott.openFee( $( "#escott_fee_mode" ).val() );
		},
		buttons: {
			"<?php _e( 'Settings' ); ?>": function() {
				adminSettlementEScott.updateFee( $( "#escott_fee_mode" ).val() );
			},
			"<?php _e( 'Close' ); ?>": function() {
				$( this ).dialog( 'close' );
			}
		},
		close: function() {
			adminSettlementEScott.setFeeType( $( "#escott_fee_mode" ).val(), true );
		}
	});

	$( document ).on( "click", "#conv_fee_setting", function() {
		$( "#escott_fee_mode" ).val( "conv" );
		$( "#escott_fee_dialog" ).dialog( "option", "title", "<?php _e( 'Online storage agency settlement fee setting', 'usces' ); ?>" );
		$( "#escott_fee_dialog" ).dialog( "open" );
	});

	$( document ).on( "click", ".fee_type", function() {
		if( "change" == $( this ).val() ) {
			$( "#escott_fee_fix_table" ).css( "display", "none" );
			$( "#escott_fee_change_table" ).css( "display", "" );
		} else {
			$( "#escott_fee_fix_table" ).css( "display", "" );
			$( "#escott_fee_change_table" ).css( "display", "none" );
		}
	});

	$( document ).on( "change", "input[name='fee_first_amount']", function() {
		var rows = $( "input[name^='fee_amounts']" );
		var first_amount = $( "input[name='fee_first_amount']" );
		if( 0 == rows.length && $( first_amount ).val() != '' ) {
			$( "#end_amount" ).html( parseInt( $( first_amount ).val() ) + 1 );
		} else if( 0 < rows.length && $( first_amount ).val() != '' ) {
			$( '#amount_0' ).html( parseInt( $( first_amount ).val() ) + 1 );
		}
	});

	$( document ).on( "change", "#fee_limit_amount_change", function() {
		if( "change" == $( "input[name='fee_type']:checked" ).val() ) {
			var amount = parseInt( $( "#end_amount" ).html() );
			var limit = parseInt( $( "#fee_limit_amount_change" ).val() );
			if( amount >= limit ) {
				alert( "<?php _e( 'A value of the amount of upper limit is dirty.', 'usces' ); ?>"+amount+' : '+limit );
			}
		}
	});

	$( document ).on( "change", "input[name^='fee_amounts']", function() {
		var rows = $( "input[name^='fee_amounts']" );
		var cnt = $( rows ).length;
		var end_amount = $( "#end_amount" );
		var id = $( rows ).index( this );
		if( id >= cnt - 1 ) {
			$( end_amount ).html( parseInt( $( rows ).eq( id ).val() ) + 1 );
		} else if( id < cnt - 1 ) {
			$( "#amount_"+( id+1 ) ).html( parseInt( $( rows ).eq( id ).val() ) + 1 );
		}
	});

	$( document ).on( "click", "#fee_add_row", function() {
		var rows = $( "input[name^='fee_amounts']" );
		$( rows ).unbind( "change" );
		var first_amount = $( "input[name='fee_first_amount']" );
		var first_fee = $( "input[name='fee_first_fee']" );
		var end_amount = $( "#end_amount" );
		var enf_fee = $( "input[name='fee_end_fee']" );
		if( 0 == rows.length ) {
			amount = ( $( first_amount ).val() == '' ) ? '' : parseInt( $( first_amount ).val() ) + 1;
		} else if( 0 < rows.length ) {
			amount = ( $( rows ).eq( rows.length-1 ).val() == '' ) ? '' : parseInt( $( rows ).eq( rows.length-1 ).val() ) + 1;
		}
		html = '<tr id="row_'+rows.length+'"><td class="cod_f"><span id="amount_'+rows.length+'">'+amount+'</span></td><td class="cod_m"><?php _e( ' - ', 'usces' ); ?></td><td class="cod_e"><input name="fee_amounts['+rows.length+']" type="text" class="short_str num" /></td><td class="cod_cod"><input name="fee_fees['+rows.length+']" type="text" class="short_str num" /></td></tr>';
		$( "#fee_change_field" ).append( html );
		rows = $( "input[name^='fee_amounts']" );
		$( rows ).bind( "change", function() {
			var cnt = $( rows ).length - 1;
			var id = $( rows ).index( this );
			if( id >= cnt ) {
				$( end_amount ).html( parseInt( $( rows ).eq( id ).val() ) + 1 );
			} else if( id < cnt ) {
				$( "#amount_"+( id+1 ) ).html( parseInt( $( rows ).eq( id ).val() ) + 1 );
			}
		});
	});

	$( document ).on( "click", "#fee_del_row", function() {
		var rows = $( "input[name^='fee_amounts']" );
		var first_amount = $( "input[name='fee_first_amount']" );
		var end_amount = $( "#end_amount" );
		var del_id = rows.length - 1;
		if( 0 < rows.length ) {
			$( "#row_"+del_id ).remove();
		}
		rows = $( "input[name^='fee_amounts']" );
		if( 0 == rows.length && $( first_amount ).val() != "" ) {
			$( end_amount ).html( parseInt( $( first_amount ).val() ) + 1 );
		} else if( 0 < rows.length && $( rows ).eq( rows.length-1 ).val() != "" ) {
			$( end_amount ).html( parseInt( $( rows ).eq( rows.length-1 ).val() ) + 1 );
		}
	});

	adminSettlementEScott.setFeeType( "conv", false );
});
</script>
<?php
			endif;
			break;
		endswitch;
	}

	/**
	 * 決済オプション登録・更新
	 * @fook   usces_action_admin_settlement_update
	 * @param  -
	 * @return -
	 */
	public function settlement_update() {
		global $usces;

		if( $this->paymod_id != $_POST['acting'] ) {
			return;
		}

		$this->error_mes = '';
		$options = get_option( 'usces' );
		$payment_method = usces_get_system_option( 'usces_payment_method', 'settlement' );

		unset( $options['acting_settings']['escott'] );
		$options['acting_settings']['escott']['merchant_id'] = ( isset( $_POST['merchant_id'] ) ) ? trim( $_POST['merchant_id'] ) : '';
		$options['acting_settings']['escott']['merchant_pass'] = ( isset( $_POST['merchant_pass'] ) ) ? trim( $_POST['merchant_pass'] ) : '';
		$options['acting_settings']['escott']['tenant_id'] = ( isset( $_POST['tenant_id'] ) ) ? trim( $_POST['tenant_id'] ) : '';
		$options['acting_settings']['escott']['ope'] = ( isset( $_POST['ope'] ) ) ? $_POST['ope'] : '';
		$options['acting_settings']['escott']['card_activate'] = ( isset( $_POST['card_activate'] ) ) ? $_POST['card_activate'] : 'off';
		$options['acting_settings']['escott']['seccd'] = ( isset( $_POST['seccd'] ) ) ? $_POST['seccd'] : 'on';
		$options['acting_settings']['escott']['token_code'] = ( isset( $_POST['token_code'] ) ) ? trim( $_POST['token_code'] ) : '';
		$options['acting_settings']['escott']['quickpay'] = ( isset( $_POST['quickpay'] ) ) ? $_POST['quickpay'] : '';
		$options['acting_settings']['escott']['chooseable_quickpay'] = ( isset( $_POST['chooseable_quickpay'] ) ) ? $_POST['chooseable_quickpay'] : 'on';
		$options['acting_settings']['escott']['operateid'] = ( isset( $_POST['operateid'] ) ) ? $_POST['operateid'] : '1Gathering';
		$options['acting_settings']['escott']['howtopay'] = ( isset( $_POST['howtopay'] ) ) ? $_POST['howtopay'] : '';
		$options['acting_settings']['escott']['conv_activate'] = ( isset( $_POST['conv_activate'] ) ) ? $_POST['conv_activate'] : 'off';
		$options['acting_settings']['escott']['conv_limit'] = ( !empty( $_POST['conv_limit'] ) ) ? $_POST['conv_limit'] : '7';
		$options['acting_settings']['escott']['conv_fee_type'] = ( isset( $_POST['conv_fee_type'] ) ) ? $_POST['conv_fee_type'] : '';
		$options['acting_settings']['escott']['conv_fee'] = ( isset( $_POST['conv_fee'] ) ) ? $_POST['conv_fee'] : '';
		$options['acting_settings']['escott']['conv_fee_limit_amount'] = ( isset( $_POST['conv_fee_limit_amount_'.$options['acting_settings']['escott']['conv_fee_type']] ) ) ? $_POST['conv_fee_limit_amount_'.$options['acting_settings']['escott']['conv_fee_type']] : '';
		$options['acting_settings']['escott']['conv_fee_first_amount'] = ( isset( $_POST['conv_fee_first_amount'] ) ) ? $_POST['conv_fee_first_amount'] : '';
		$options['acting_settings']['escott']['conv_fee_first_fee'] = ( isset( $_POST['conv_fee_first_fee'] ) ) ? $_POST['conv_fee_first_fee'] : '';
		$options['acting_settings']['escott']['conv_fee_amounts'] = ( isset( $_POST['conv_fee_amounts'] ) ) ? explode( '|', $_POST['conv_fee_amounts'] ) : array();
		$options['acting_settings']['escott']['conv_fee_fees'] = ( isset( $_POST['conv_fee_fees'] ) ) ? explode( '|', $_POST['conv_fee_fees'] ) : array();
		$options['acting_settings']['escott']['conv_fee_end_fee'] = ( isset( $_POST['conv_fee_end_fee'] ) ) ? $_POST['conv_fee_end_fee'] : '';
		$options['acting_settings']['escott']['sec3d_activate'] = ( isset( $_POST['sec3d_activate'] ) ) ? $_POST['sec3d_activate'] : 'off';
		$options['acting_settings']['escott']['sec3d_encKey'] = ( isset( $_POST['sec3d_encKey'] ) ) ? trim($_POST['sec3d_encKey']) : '';
		$options['acting_settings']['escott']['sec3d_iv'] = ( isset( $_POST['sec3d_iv'] ) ) ? trim($_POST['sec3d_iv']) : '';

		if( 'on' == $options['acting_settings']['escott']['card_activate'] || 'on' == $options['acting_settings']['escott']['conv_activate'] ) {
			$unavailable_activate = false;
			foreach( $payment_method as $settlement => $payment ) {
				if( in_array( $settlement, $this->unavailable_method ) && 'activate' == $payment['use'] ) {
					$unavailable_activate = true;
					break;
				}
			}
			if( $unavailable_activate ) {
				$this->error_mes .= __( '* Settlement that can not be used together is activated.', 'usces' ).'<br />';
			} else {
				if( WCUtils::is_blank( $_POST['merchant_id'] ) ) {
					$this->error_mes .= __( '* Please enter the Merchant ID.', 'usces' ).'<br />';
				}
				if( WCUtils::is_blank( $_POST['merchant_pass'] ) ) {
					$this->error_mes .= __( '* Please enter the Merchant Password.', 'usces' ).'<br />';
				}
				if( WCUtils::is_blank( $_POST['tenant_id'] ) ) {
					$this->error_mes .= __( '* Please enter the Tenant ID.', 'usces' ).'<br />';
				}
				if( WCUtils::is_blank( $_POST['ope'] ) ) {
					$this->error_mes .= __( '* Please select the operating environment.', 'usces' ).'<br />';
				}
				if( WCUtils::is_blank( $_POST['operateid'] ) ) {
					$this->error_mes .= __( '* Please select the processing classification.', 'usces' ).'<br />';
				}
				if( 'on' == $options['acting_settings']['escott']['card_activate'] ) {
					if( WCUtils::is_blank( $_POST['token_code'] ) ) {
						$this->error_mes .= __( '* Please enter the Token auth code.', 'usces' ).'<br />';
					}
				}
				if( 'on' == $options['acting_settings']['welcart']['sec3d_activate'] ) {
					if( isset($_POST['sec3d_encKey']) && WCUtils::is_blank( $_POST['sec3d_encKey'] ) ) {
						$this->error_mes .= __( '* Please enter the 3D Secure Encryption Key.', 'usces' ).'<br />';
					}
					if( isset($_POST['sec3d_iv']) && WCUtils::is_blank( $_POST['sec3d_iv'] ) ) {
						$this->error_mes .= __( '* Please enter the 3D Secure Initialization Vector.', 'usces' ).'<br />';
					}
				}
			}
		}

		if( '' == $this->error_mes ) {
			$usces->action_status = 'success';
			$usces->action_message = __( 'Options are updated.', 'usces' );
			if( 'on' == $options['acting_settings']['escott']['card_activate'] || 'on' == $options['acting_settings']['escott']['conv_activate'] ) {
				$options['acting_settings']['escott']['activate'] = 'on';
				if( 'public' == $options['acting_settings']['escott']['ope'] ) {
					$options['acting_settings']['escott']['send_url'] = 'https://www.e-scott.jp/online/aut/OAUT002.do';
					$options['acting_settings']['escott']['send_url_member'] = 'https://www.e-scott.jp/online/crp/OCRP005.do';
					$options['acting_settings']['escott']['send_url_conv'] = 'https://www.e-scott.jp/online/cnv/OCNV005.do';
					$options['acting_settings']['escott']['redirect_url_conv'] = 'https://link.kessai.info/JLP/JLPcon';
					$options['acting_settings']['escott']['api_token'] = 'https://www.e-scott.jp/euser/stn/CdGetJavaScript.do';
					$options['acting_settings']['escott']['send_url_token'] = 'https://www.e-scott.jp/online/atn/OATN005.do';
					$options['acting_settings']['escott']['send_url_3dsecure'] = 'https://www.e-scott.jp/online/tds/OTDS010.do';
				} else {
					$options['acting_settings']['escott']['send_url'] = 'https://www.test.e-scott.jp/online/aut/OAUT002.do';
					$options['acting_settings']['escott']['send_url_member'] = 'https://www.test.e-scott.jp/online/crp/OCRP005.do';
					$options['acting_settings']['escott']['send_url_conv'] = 'https://www.test.e-scott.jp/online/cnv/OCNV005.do';
					$options['acting_settings']['escott']['redirect_url_conv'] = 'https://link.kessai.info/JLPCT/JLPcon';
					$options['acting_settings']['escott']['api_token'] = 'https://www.test.e-scott.jp/euser/stn/CdGetJavaScript.do';
					$options['acting_settings']['escott']['send_url_token'] = 'https://www.test.e-scott.jp/online/atn/OATN005.do';
					$options['acting_settings']['escott']['send_url_3dsecure'] = 'https://www.test.e-scott.jp/online/tds/OTDS010.do';
					$options['acting_settings']['escott']['tenant_id'] = '0001';
				}
				$toactive = array();
				if( 'on' == $options['acting_settings']['escott']['card_activate'] ) {
					if( !empty( $options['acting_settings']['escott']['token_code'] ) ) {
						$options['acting_settings']['escott']['card_activate'] = 'token';
					}
				}
				if( 'on' == $options['acting_settings']['escott']['card_activate'] || 'token' == $options['acting_settings']['escott']['card_activate'] ) {
					$usces->payment_structure['acting_escott_card'] = __( 'Credit card transaction (e-SCOTT)', 'usces' );
					foreach( $payment_method as $settlement => $payment ) {
						if( 'acting_escott_card' == $settlement && 'deactivate' == $payment['use'] ) {
							$toactive[] = $payment['name'];
						}
					}
				} else {
					unset( $usces->payment_structure['acting_escott_card'] );
				}
				if( 'on' == $options['acting_settings']['escott']['conv_activate'] ) {
					$usces->payment_structure['acting_escott_conv'] = __( 'Online storage agency (e-SCOTT)', 'usces' );
					foreach( $payment_method as $settlement => $payment ) {
						if( 'acting_escott_conv' == $settlement && 'deactivate' == $payment['use'] ) {
							$toactive[] = $payment['name'];
						}
					}
				} else {
					unset( $usces->payment_structure['acting_escott_conv'] );
				}
				usces_admin_orderlist_show_wc_trans_id();
				if( 0 < count( $toactive ) ) {
					$usces->action_message .= __( "Please update the payment method to \"Activate\". <a href=\"admin.php?page=usces_initial#payment_method_setting\">General Setting > Payment Methods</a>", 'usces' );
				}
			} else {
				$options['acting_settings']['escott']['activate'] = 'off';
				unset( $usces->payment_structure['acting_escott_card'] );
				unset( $usces->payment_structure['acting_escott_conv'] );
			}
			$deactivate = array();
			foreach( $payment_method as $settlement => $payment ) {
				if( !array_key_exists( $settlement, $usces->payment_structure ) ) {
					if( 'deactivate' != $payment['use'] ) {
						$payment['use'] = 'deactivate';
						$deactivate[] = $payment['name'];
						usces_update_system_option( 'usces_payment_method', $payment['id'], $payment );
					}
				}
			}
			if( 0 < count( $deactivate ) ) {
				$deactivate_message = sprintf( __( "\"Deactivate\" %s of payment method.", 'usces' ), implode( ',', $deactivate ) );
				$usces->action_message .= $deactivate_message;
			}
		} else {
			$usces->action_status = 'error';
			$usces->action_message = __( 'Data have deficiency.', 'usces' );
			$options['acting_settings']['escott']['activate'] = 'off';
			unset( $usces->payment_structure['acting_escott_card'] );
			unset( $usces->payment_structure['acting_escott_conv'] );
			$deactivate = array();
			foreach( $payment_method as $settlement => $payment ) {
				if( in_array( $settlement, $this->pay_method ) ) {
					if( 'deactivate' != $payment['use'] ) {
						$payment['use'] = 'deactivate';
						$deactivate[] = $payment['name'];
						usces_update_system_option( 'usces_payment_method', $payment['id'], $payment );
					}
				}
			}
			if( 0 < count( $deactivate ) ) {
				$deactivate_message = sprintf( __( "\"Deactivate\" %s of payment method.", 'usces' ), implode( ',', $deactivate ) );
				$usces->action_message .= $deactivate_message.__( "Please complete the setup and update the payment method to \"Activate\".", 'usces' );
			}
		}
		ksort( $usces->payment_structure );
		update_option( 'usces', $options );
		update_option( 'usces_payment_structure', $usces->payment_structure );
	}

	/**
	 * クレジット決済設定画面フォーム
	 * @fook   usces_action_settlement_tab_body
	 * @param  -
	 * @return -
	 * @echo   html
	 */
	public function settlement_tab_body() {

		$acting_opts = $this->get_acting_settings();
		if( !isset( $acting_opts['sec3d_activate'] ) ){
			$acting_opts['sec3d_activate'] = 'off';
		}
		if( !isset( $acting_opts['sec3d_encKey'] ) ){
			$acting_opts['sec3d_encKey'] = '';
		}
		if( !isset( $acting_opts['sec3d_iv'] ) ){
			$acting_opts['sec3d_iv'] = '';
		}
		$settlement_selected = get_option( 'usces_settlement_selected' );
		if( in_array( $this->paymod_id, (array)$settlement_selected ) ):
?>
	<div id="uscestabs_escott">
	<div class="settlement_service"><span class="service_title"><?php _e( $this->acting_formal_name, 'usces' ); ?></span></div>
	<?php if( isset( $_POST['acting'] ) && $this->paymod_id == $_POST['acting'] ): ?>
		<?php if( '' != $this->error_mes ): ?>
		<div class="error_message"><?php echo $this->error_mes; ?></div>
		<?php elseif( isset( $acting_opts['activate'] ) && 'on' == $acting_opts['activate'] ): ?>
		<div class="message"><?php _e( 'Test thoroughly before use.', 'usces' ); ?></div>
		<?php endif; ?>
	<?php endif; ?>
	<form action="" method="post" name="escott_form" id="escott_form">
		<table class="settle_table">
			<tr>
				<th><a class="explanation-label" id="label_ex_merchant_id_escott"><?php _e( 'Merchant ID', 'usces' );//マーチャントID ?></a></th>
				<td><input name="merchant_id" type="text" id="merchant_id_escott" value="<?php echo $acting_opts['merchant_id']; ?>" size="20" /></td>
			</tr>
			<tr id="ex_merchant_id_escott" class="explanation"><td colspan="2"><?php _e( 'Merchant ID (single-byte numbers only) issued from e-SCOTT.', 'usces' ); ?></td></tr>
			<tr>
				<th><a class="explanation-label" id="label_ex_merchant_pass_escott"><?php _e( 'Merchant Password', 'usces' );//マーチャントパスワード ?></a></th>
				<td><input name="merchant_pass" type="text" id="merchant_pass_escott" value="<?php echo $acting_opts['merchant_pass']; ?>" size="20" /></td>
			</tr>
			<tr id="ex_merchant_pass_escott" class="explanation"><td colspan="2"><?php _e( 'Merchant Password (single-byte alphanumeric characters only) issued from e-SCOTT.', 'usces' ); ?></td></tr>
			<tr>
				<th><a class="explanation-label" id="label_ex_tenant_id_escott"><?php _e( 'Tenant ID', 'usces' );//店舗コード ?></a></th>
				<td><input name="tenant_id" type="text" id="tenant_id_escott" value="<?php echo $acting_opts['tenant_id']; ?>" size="20" /></td>
			</tr>
			<tr id="ex_tenant_id_escott" class="explanation"><td colspan="2"><?php _e( 'Tenant ID issued from e-SCOTT.<br />If you have only one shop to contract, enter 0001.', 'usces' ); ?></td></tr>
			<tr>
				<th><a class="explanation-label" id="label_ex_ope_escott"><?php _e( 'Operation Environment', 'usces' );//動作環境 ?></a></th>
				<td><label><input name="ope" type="radio" id="ope_escott_1" value="test"<?php if( $acting_opts['ope'] == 'test' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Testing environment', 'usces' ); ?></span></label><br />
					<label><input name="ope" type="radio" id="ope_escott_2" value="public"<?php if( $acting_opts['ope'] == 'public' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Production environment', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr id="ex_ope_escott" class="explanation"><td colspan="2"><?php _e( 'Switch the operating environment.', 'usces' ); ?></td></tr>
		</table>
		<table class="settle_table">
			<tr>
				<th><?php _e( 'Credit card settlement', 'usces' );//クレジットカード決済 ?></th>
				<td><label><input name="card_activate" type="radio" class="card_activate_escott" id="card_activate_escott_1" value="on"<?php if( $acting_opts['card_activate'] == 'on' || $acting_opts['card_activate'] == 'token' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Use with non-passage type', 'usces' ); ?></span></label><br />
					<label><input name="card_activate" type="radio" class="card_activate_escott" id="card_activate_escott_0" value="off"<?php if( $acting_opts['card_activate'] == 'off' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Do not Use', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr class="card_escott">
				<th><a class="explanation-label" id="label_ex_sec3d_activate"><?php _e( '3D Secure', 'usces' );//3Dセキュア ?></a></th>
				<td><label><input name="sec3d_activate" type="radio" class="sec3d_activate_escott" id="sec3d_activate_1" value="on"<?php if( $acting_opts['sec3d_activate'] == 'on' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Use', 'usces' ); ?></span></label><br />
					<label><input name="sec3d_activate" type="radio" class="sec3d_activate_escott" id="sec3d_activate_0" value="off"<?php if( $acting_opts['sec3d_activate'] == 'off' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Do not Use', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr id="ex_sec3d_activate" class="explanation card_escott"><td colspan="2"><?php _e( "3D secure authentication at the time of payment. If you want to use it, you need to apply to Sony Payment Service Co., Ltd.", 'usces' ); ?></td></tr>
			<tr class="card_sec3d_escott card_escott">
				<th><a class="explanation-label" id="label_ex_sec3d_encKey"><?php _e( 'Encryption Key', 'usces' );//3Dセキュア 暗号化キー ?></a></th>
				<td><input name="sec3d_encKey" type="text" id="sec3d_encKey" value="<?php echo $acting_opts['sec3d_encKey']; ?>" size="36" maxlength="32" /></td>
			</tr>
			<tr id="ex_sec3d_encKey" class="explanation card_sec3d_escott card_escott"><td colspan="2"><?php _e( "3D secure encryption key (single-byte alphanumeric characters only) issued by e-SCOTT.", 'usces' ); ?></td></tr>
			<tr class="card_sec3d_escott card_escott">
				<th><a class="explanation-label" id="label_ex_sec3d_iv"><?php _e( 'Initialization Vector', 'usces' );//3Dセキュア 初期化ベクトル ?></a></th>
				<td><input name="sec3d_iv" type="text" id="sec3d_iv" value="<?php echo $acting_opts['sec3d_iv']; ?>" size="36" maxlength="32" /></td>
			</tr>
			<tr id="ex_sec3d_iv" class="explanation card_sec3d_escott card_escott"><td colspan="2"><?php _e( "3D secure initialization vector (single-byte alphanumeric characters only) issued by e-SCOTT.", 'usces' ); ?></td></tr>
			<tr class="card_escott">
				<th><a class="explanation-label" id="label_ex_seccd_escott"><?php _e( 'Security code <br /> (authentication assist)', 'usces' );//セキュリティコード ?></a></th>
				<td><label><input name="seccd" type="radio" id="seccd_escott_1" value="on"<?php if( $acting_opts['seccd'] == 'on' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Use', 'usces' ); ?></span></label><br />
					<label><input name="seccd" type="radio" id="seccd_escott_0" value="off"<?php if( $acting_opts['seccd'] == 'off' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Do not Use', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr id="ex_seccd_escott" class="explanation card_escott"><td colspan="2"><?php _e( "Use 'Security code' of authentication assist matching. If you decide not to use, please also set 'Do not verify matching' on the e-SCOTT management screen.", 'usces' ); ?></td></tr>
			<tr class="card_token_code_escott">
				<th><a class="explanation-label" id="label_ex_token_code_escott"><?php _e( 'Token auth code', 'usces' );//トークン決済認証コード ?></a></th>
				<td><input name="token_code" type="text" id="token_code_escott" value="<?php echo $acting_opts['token_code']; ?>" size="36" maxlength="32" /></td>
			</tr>
			<tr id="ex_token_code_escott" class="explanation card_token_code_escott"><td colspan="2"><?php _e( "Token auth code (single-byte alphanumeric characters only) issued from e-SCOTT.", 'usces' ); ?></td></tr>
			<tr class="card_escott">
				<th><a class="explanation-label" id="label_ex_quickpay_escott"><?php _e( 'Quick payment', 'usces' );//クイック決済 ?></a></th>
				<td><label><input name="quickpay" type="radio" class="quickpay_escott" id="quickpay_escott_1" value="on"<?php if( $acting_opts['quickpay'] == 'on' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Use', 'usces' ); ?></span></label><br />
					<label><input name="quickpay" type="radio" class="quickpay_escott" id="quickpay_escott_0" value="off"<?php if( $acting_opts['quickpay'] == 'off' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Do not Use', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr id="ex_quickpay_escott" class="explanation card_escott"><td colspan="2"><?php _e( "Members can pay with saved card. Card number will be registered in e-SCOTT Smart system.", 'usces' ); ?></td></tr>
			<tr class="card_chooseable_quickpay_escott">
				<th><a class="explanation-label" id="label_ex_chooseable_quickpay_escott"><?php _e( 'Register credit card', 'usces' );//クレジットカードの登録 ?></a></th>
				<td><label><input name="chooseable_quickpay" type="radio" class="chooseable_quickpay_escott" id="chooseable_quickpay_escott_1" value="on"<?php if( $acting_opts['chooseable_quickpay'] == 'on' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Member chooses', 'usces' ); ?></span></label><br />
					<label><input name="chooseable_quickpay" type="radio" class="chooseable_quickpay_escott" id="chooseable_quickpay_escott_0" value="off"<?php if( $acting_opts['chooseable_quickpay'] == 'off' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Always register', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr id="ex_chooseable_quickpay_escott" class="explanation card_chooseable_quickpay_escott"><td colspan="2"><?php _e( "In case of 'Always register', 'Register and purchase credit card' will not be displayed when purchasing with credit card.", 'usces' ); ?></td></tr>
			<tr class="card_escott">
				<th><a class="explanation-label" id="label_ex_operateid_escott"><?php _e( 'Processing classification', 'usces' );//処理区分 ?></a></th>
				<td><label><input name="operateid" type="radio" id="operateid_escott_1" value="1Auth"<?php if( $acting_opts['operateid'] == '1Auth' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Credit', 'usces' );//与信 ?></span></label><br />
					<label><input name="operateid" type="radio" id="operateid_escott_2" value="1Gathering"<?php if( $acting_opts['operateid'] == '1Gathering' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Credit sales', 'usces' );//与信売上計上 ?></span></label>
				</td>
			</tr>
			<tr id="ex_operateid_escott" class="explanation card_escott"><td colspan="2"><?php _e( "In case of 'Credit' setting, it need to change to 'Sales recorded' manually in later. In case of 'Credit sales recorded' setting, sales will be recorded at the time of purchase.", 'usces' ); ?></td></tr>
			<tr class="card_howtopay_escott">
				<th><?php _e( 'Number of payments', 'usces' );//支払回数 ?></th>
				<td><label><input name="howtopay" type="radio" id="howtopay_escott_1" value="1"<?php if( $acting_opts['howtopay'] == '1' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Lump-sum payment only', 'usces' );//一括払いのみ ?></span></label><br />
					<label><input name="howtopay" type="radio" id="howtopay_escott_2" value="2"<?php if( $acting_opts['howtopay'] == '2' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Activate installment payment', 'usces' );//分割払いを有効にする ?></span></label><br />
					<label><input name="howtopay" type="radio" id="howtopay_escott_3" value="3"<?php if( $acting_opts['howtopay'] == '3' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Activate installment payments and bonus payments', 'usces' );//分割払いとボーナス払いを有効にする ?></span></label>
				</td>
			</tr>
		</table>
		<table class="settle_table">
			<tr>
				<th><?php _e( 'Online storage agency', 'usces' );//オンライン収納代行 ?></th>
				<td><label><input name="conv_activate" type="radio" class="conv_activate_escott" id="conv_activate_escott_1" value="on"<?php if( $acting_opts['conv_activate'] == 'on' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Use', 'usces' ); ?></span></label><br />
					<label><input name="conv_activate" type="radio" class="conv_activate_escott" id="conv_activate_escott_0" value="off"<?php if( $acting_opts['conv_activate'] == 'off' ) echo ' checked="checked"'; ?> /><span><?php _e( 'Do not Use', 'usces' ); ?></span></label>
				</td>
			</tr>
			<tr class="conv_escott">
				<th><?php _e( 'Payment due days', 'usces' );//支払期限日数 ?></th>
				<td><input name="conv_limit" type="text" id="conv_limit" value="<?php echo $acting_opts['conv_limit']; ?>" size="5" /><?php _e( 'days', 'usces' ); ?></td>
			</tr>
			<tr class="conv_escott">
				<th><a class="explanation-label" id="label_ex_conv_fee_escott"><?php _e( 'Fee', 'usces' );//手数料 ?></a></th>
				<td><span id="conv_fee_type_field" class="fee_type_field"><?php echo $this->get_fee_name( $acting_opts['conv_fee_type'] ); ?></span><input type="button" class="button" value="<?php _e( 'Detailed setting', 'usces' ); ?>" id="conv_fee_setting" /></td>
			</tr>
			<tr id="ex_conv_fee_escott" class="explanation conv_escott"><td colspan="2"><?php _e( 'Set the online storage agency commission and settlement upper limit. Leave it blank if you do not need it.', 'usces' ); ?></td></tr>
		</table>
		<input type="hidden" name="acting" value="escott" />
		<input type="hidden" name="conv_fee_type" id="conv_fee_type" value="<?php echo $acting_opts['conv_fee_type']; ?>" />
		<input type="hidden" name="conv_fee" id="conv_fee" value="<?php echo $acting_opts['conv_fee']; ?>" />
		<input type="hidden" name="conv_fee_limit_amount_fix" id="conv_fee_limit_amount_fix" value="<?php echo $acting_opts['conv_fee_limit_amount']; ?>" />
		<input type="hidden" name="conv_fee_first_amount" id="conv_fee_first_amount" value="<?php echo $acting_opts['conv_fee_first_amount']; ?>" />
		<input type="hidden" name="conv_fee_first_fee" id="conv_fee_first_fee" value="<?php echo $acting_opts['conv_fee_first_fee']; ?>" />
		<input type="hidden" name="conv_fee_limit_amount_change" id="conv_fee_limit_amount_change" value="<?php echo $acting_opts['conv_fee_limit_amount']; ?>" />
		<input type="hidden" name="conv_fee_amounts" id="conv_fee_amounts" value="<?php echo implode( '|', $acting_opts['conv_fee_amounts'] ); ?>" />
		<input type="hidden" name="conv_fee_fees" id="conv_fee_fees" value="<?php echo implode( '|', $acting_opts['conv_fee_fees'] ); ?>" />
		<input type="hidden" name="conv_fee_end_fee" id="conv_fee_end_fee" value="<?php echo $acting_opts['conv_fee_end_fee']; ?>" />
		<input name="usces_option_update" type="submit" class="button button-primary" value="<?php _e( 'Update e-SCOTT settings', 'usces' ); ?>" />
		<?php wp_nonce_field( 'admin_settlement', 'wc_nonce' ); ?>
	</form>
	<div class="settle_exp">
		<p><strong><?php _e( $this->acting_formal_name, 'usces' ); ?></strong></p>
		<a href="https://www.sonypaymentservices.jp/intro/" target="_blank"><?php _e( 'Details of e-SCOTT Smart is here >>', 'usces' ); ?></a>
		<p>&nbsp;</p>
		<p><?php echo __( "This settlement is an 'Non-passage type' settlement system.", 'usces' ); ?><br />
			<?php echo __( "'Non-passage type' is a settlement system that completes with shop site only, without transitioning to the page of the settlement company.", 'usces' ); ?><br />
			<?php echo __( "Stylish with unified design is possible. However, because we will handle the card number, dedicated SSL is required.", 'usces' ); ?></p>
		<p><?php echo __( "In both types, the entered card number will be sent to the e-SCOTT Smart system, so it will not be saved in Welcart.", 'usces' ); ?></p>
		<p><?php echo __( "In addition, in the production environment, it is SSL communication with only an authorized SSL certificate, so it is necessary to be careful.", 'usces' ); ?></p>
		<p><?php echo __( "The Welcart member account used in the test environment may not be available in the production environment.", 'usces' ); ?><br />
			<?php echo __( "Please make another member registration in the test environment and production environment, or delete the member used in the test environment once and register again in the production environment.", 'usces' ); ?></p>
	</div>
	</div><!--uscestabs_escott-->

	<div id="escott_fee_dialog" class="cod_dialog">
		<fieldset>
		<table id="escott_fee_type_table" class="cod_type_table">
			<tr>
				<th><?php _e( 'Type of the fee', 'usces' ); ?></th>
				<td class="radio"><input name="fee_type" type="radio" id="fee_type_fix" class="fee_type" value="fix" /></td><td><label for="fee_type_fix"><?php _e( 'Fixation', 'usces' ); ?></label></td>
				<td class="radio"><input name="fee_type" type="radio" id="fee_type_change" class="fee_type" value="change" /></td><td><label for="fee_type_change"><?php _e( 'Variable', 'usces' ); ?></label></td>
			</tr>
		</table>
		<table id="escott_fee_fix_table" class="cod_fix_table">
			<tr>
				<th><?php _e( 'Fee', 'usces' ); ?></th>
				<td><input name="fee" type="text" id="fee_fix" class="short_str num" /><?php usces_crcode(); ?></td>
			</tr>
			<tr>
				<th><?php _e( 'Upper limit', 'usces' ); ?></th>
				<td><input name="fee_limit_amount_fix" type="text" id="fee_limit_amount_fix" class="short_str num" /><?php usces_crcode(); ?></td>
			</tr>
		</table>
		<div id="escott_fee_change_table" class="cod_change_table">
		<input type="button" class="button" id="fee_add_row" value="<?php _e( 'Add row', 'usces' ); ?>" />
		<input type="button" class="button" id="fee_del_row" value="<?php _e( 'Delete row', 'usces' ); ?>" />
		<table>
			<thead>
				<tr>
					<th colspan="3"><?php _e( 'A purchase amount', 'usces' ); ?>(<?php usces_crcode(); ?>)</th>
					<th><?php _e( 'Fee', 'usces' ); ?>(<?php usces_crcode(); ?>)</th>
				</tr>
				<tr>
					<td class="cod_f">0</td>
					<td class="cod_m"><?php _e( ' - ', 'usces' ); ?></td>
					<td class="cod_e"><input name="fee_first_amount" id="fee_first_amount" type="text" class="short_str num" /></td>
					<td class="cod_cod"><input name="fee_first_fee" id="fee_first_fee" type="text" class="short_str num" /></td>
				</tr>
			</thead>
			<tbody id="fee_change_field"></tbody>
			<tfoot>
				<tr>
					<td class="cod_f"><span id="end_amount"></span></td>
					<td class="cod_m"><?php _e( ' - ', 'usces' ); ?></td>
					<td class="cod_e"><input name="fee_limit_amount_change" type="text" id="fee_limit_amount_change" class="short_str num" /></td>
					<td class="cod_cod"><input name="fee_end_fee" type="text" id="fee_end_fee" class="short_str num" /></td>
				</tr>
			</tfoot>
		</table>
		</div>
		</fieldset>
		<input type="hidden" id="escott_fee_mode">
	</div><!--escott_fee_dialog-->
<?php
		endif;
	}

	/**
	 * 受注編集画面に表示する決済情報の値整形
	 * @fook   usces_filter_settle_info_field_value
	 * @param  $value $key $acting
	 * @return string $value
	 */
	public function settlement_info_field_value( $value, $key, $acting ) {

		if( 'escott_card' != $acting && 'escott_conv' != $acting ) {
			return $value;
		}

		switch( $key ) {
		case 'acting':
			switch( $value ) {
			case 'escott_card':
				$value = __( 'e-SCOTT - Credit card transaction', 'usces' );
				break;
			case 'escott_conv':
				$value = __( 'e-SCOTT - Online storage agency', 'usces' );
				break;
			}
			break;
		}

		$value = parent::settlement_info_field_value( $value, $key, $acting );

		return $value;
	}
}
