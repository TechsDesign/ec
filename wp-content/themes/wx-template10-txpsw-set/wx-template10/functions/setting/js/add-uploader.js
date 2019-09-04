jQuery(document).ready(function($){

  $(window).on('load', function(){
    $('#admin-loading').fadeOut();
  });

 if($('.addition-tab2 input:radio[name=tx_mainimg_option]:checked').val() !== 'header' && $('.addition-tab2 input:radio[name=tx_mainimg_option]:checked').val() !== 'slider'){
   $('.addition-tab2 input#still-img').prop("checked",true);
 }

 if($('.addition-tab2 input:radio[name=tx_recommended_or_option]:checked').val() !== 'itemid' && $('.addition-tab2 input:radio[name=tx_recommended_or_option]:checked').val() !== 'itemcatid'){
   $('.addition-tab2 input#recommended-change').prop("checked",true);
 }

 $('.addition-tab2 input[type=radio]').on('change',function() {
  $('.addition-tab2 #addition-tab-content1,.addition-tab2 #addition-tab-content2').removeClass('hiding');
   $('.addition-tab2 li#li-tab1,.addition-tab2 li#li-tab2').removeClass('conceal');

    if($('.addition-tab2 input:radio[name=tx_recommended_or_option]:checked').val() == 'itemid'){
       $('.addition-tab2 #addition-tab-content2').addClass('hiding');
       $('.addition-tab2 li#li-tab1').addClass('conceal');
    }else if($('.addition-tab2 input:radio[name=tx_recommended_or_option]:checked').val() == 'itemcatid'){
             $('.addition-tab2 #addition-tab-content1').addClass('hiding');
             $('.addition-tab2 li#li-tab2').addClass('conceal');
    }
    if($('.addition-tab2 input:radio[name=tx_mainimg_option]:checked').val() == 'header'){
       $('.addition-tab2 #addition-tab-content2').addClass('hiding');
       $('.addition-tab2 li#li-tab1').addClass('conceal');
    }else if($('.addition-tab2 input:radio[name=tx_mainimg_option]:checked').val() == 'slider'){
             $('.addition-tab2 #addition-tab-content1').addClass('hiding');
             $('.addition-tab2 li#li-tab2').addClass('conceal');
    }
 }).trigger('change');

  var tx_image_up1;
   var tx_image_up2;
    var tx_image_up3;
     var tx_image_up4;
      var tx_image_up5;
       var tx_image_up6;

        var tx_menu_up1;
         var tx_menu_up2;
          var tx_menu_up3;
           var tx_menu_up4;
            var tx_menu_up5;
             var tx_menu_up6;
              var tx_logo_up;

             $('input:button[name=logo-up]').click(function(e){
               e.preventDefault();
                if(tx_logo_up){ tx_logo_up.open(); return; }
                  tx_logo_up = wp.media({ title:'LOGO', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_logo_up.on('select', function(){
                      var images = tx_logo_up.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imglogo_option],input:hidden[name=tx_logo1_option]').val('');
                          $('input:text[name=tx_imglogo_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_logo1_option]').val(file.id);
                        });
                    });
                    tx_logo_up.open();
                });

             $('input:button[name=images-up1]').click(function(e){
               e.preventDefault();
                if(tx_image_up1){ tx_image_up1.open(); return; }
                  tx_image_up1 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_image_up1.on('select', function(){
                      var images = tx_image_up1.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_mainimg_url1_option],input:hidden[name=tx_img1_option]').val('');
                          $('input:text[name=tx_mainimg_url1_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_img1_option]').val(file.id);
                        });
                    });
                    tx_image_up1.open();
                });

             $('input:button[name=images-up2]').click(function(e){
               e.preventDefault();
                if(tx_image_up2){ tx_image_up2.open(); return; }
                  tx_image_up2 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_image_up2.on('select', function(){
                      var images = tx_image_up2.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_mainimg_url2_option],input:hidden[name=tx_img2_option]').val('');
                          $('input:text[name=tx_mainimg_url2_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_img2_option]').val(file.id);
                        });
                    });
                    tx_image_up2.open();
                });

             $('input:button[name=images-up3]').click(function(e){
               e.preventDefault();
                if(tx_image_up3){ tx_image_up3.open(); return; }
                  tx_image_up3 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_image_up3.on('select', function(){
                      var images = tx_image_up3.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_mainimg_url3_option],input:hidden[name=tx_img3_option]').val('');
                          $('input:text[name=tx_mainimg_url3_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_img3_option]').val(file.id);
                        });
                    });
                    tx_image_up3.open();
                });

             $('input:button[name=images-up4]').click(function(e){
               e.preventDefault();
                if(tx_image_up4){ tx_image_up4.open(); return; }
                  tx_image_up4 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_image_up4.on('select', function(){
                      var images = tx_image_up4.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_mainimg_url4_option],input:hidden[name=tx_img10_option]').val('');
                          $('input:text[name=tx_mainimg_url4_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_img10_option]').val(file.id);
                        });
                    });
                    tx_image_up4.open();
                });

             $('input:button[name=images-up5]').click(function(e){
               e.preventDefault();
                if(tx_image_up5){ tx_image_up5.open(); return; }
                  tx_image_up5 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_image_up5.on('select', function(){
                      var images = tx_image_up5.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_mainimg_url5_option],input:hidden[name=tx_img11_option]').val('');
                          $('input:text[name=tx_mainimg_url5_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_img11_option]').val(file.id);
                        });
                    });
                    tx_image_up5.open();
                });

             $('input:button[name=images-up6]').click(function(e){
               e.preventDefault();
                if(tx_image_up6){ tx_image_up6.open(); return; }
                  tx_image_up6 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_image_up6.on('select', function(){
                      var images = tx_image_up6.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_mainimg_url6_option],input:hidden[name=tx_img6_option]').val('');
                          $('input:text[name=tx_mainimg_url6_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_img6_option]').val(file.id);
                        });
                    });
                    tx_image_up6.open();
                });

             $('input:button[name=images-menu-up1]').click(function(e){
               e.preventDefault();
                if(tx_menu_up1){ tx_menu_up1.open(); return; }
                  tx_menu_up1 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_menu_up1.on('select', function(){
                      var images = tx_menu_up1.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imgmenu_url1_option],input:hidden[name=tx_imgmenu_id1_option]').val('');
                          $('input:text[name=tx_imgmenu_url1_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_imgmenu_id1_option]').val(file.id);
                        });
                    });
                    tx_menu_up1.open();
                });

             $('input:button[name=images-menu-up2]').click(function(e){
               e.preventDefault();
                if(tx_menu_up2){ tx_menu_up2.open(); return; }
                  tx_menu_up2 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_menu_up2.on('select', function(){
                      var images = tx_menu_up2.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imgmenu_url2_option],input:hidden[name=tx_imgmenu_id2_option]').val('');
                          $('input:text[name=tx_imgmenu_url2_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_imgmenu_id2_option]').val(file.id);
                        });
                    });
                    tx_menu_up2.open();
                });

             $('input:button[name=images-menu-up3]').click(function(e){
               e.preventDefault();
                if(tx_menu_up3){ tx_menu_up3.open(); return; }
                  tx_menu_up3 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_menu_up3.on('select', function(){
                      var images = tx_menu_up3.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imgmenu_url3_option],input:hidden[name=tx_imgmenu_id3_option]').val('');
                          $('input:text[name=tx_imgmenu_url3_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_imgmenu_id3_option]').val(file.id);
                        });
                    });
                    tx_menu_up3.open();
                });

             $('input:button[name=images-menu-up4]').click(function(e){
               e.preventDefault();
                if(tx_menu_up4){ tx_menu_up4.open(); return; }
                  tx_menu_up4 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_menu_up4.on('select', function(){
                      var images = tx_menu_up4.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imgmenu_url4_option],input:hidden[name=tx_imgmenu_id4_option]').val('');
                          $('input:text[name=tx_imgmenu_url4_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_imgmenu_id4_option]').val(file.id);
                        });
                    });
                    tx_menu_up4.open();
                });

             $('input:button[name=images-menu-up5]').click(function(e){
               e.preventDefault();
                if(tx_menu_up5){ tx_menu_up5.open(); return; }
                  tx_menu_up5 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_menu_up5.on('select', function(){
                      var images = tx_menu_up5.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imgmenu_url5_option],input:hidden[name=tx_imgmenu_id5_option]').val('');
                          $('input:text[name=tx_imgmenu_url5_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_imgmenu_id5_option]').val(file.id);
                        });
                    });
                    tx_menu_up5.open();
                });

             $('input:button[name=images-menu-up6]').click(function(e){
               e.preventDefault();
                if(tx_menu_up6){ tx_menu_up6.open(); return; }
                  tx_menu_up6 = wp.media({ title:'images', library:{type:'image'}, button:{text:'UP'}, multiple:false });
                    tx_menu_up6.on('select', function(){
                      var images = tx_menu_up6.state().get('selection');
                        images.each(function(file){
                          $('input:text[name=tx_imgmenu_url6_option],input:hidden[name=tx_imgmenu_id6_option]').val('');
                          $('input:text[name=tx_imgmenu_url6_option]').val(file.toJSON().url);
                          $('input:hidden[name=tx_imgmenu_id6_option]').val(file.id);
                        });
                    });
                    tx_menu_up6.open();
                });

                  $('input:button[name=logodelete]').click(function() {
                    $('input:text[name=tx_imglogo_option],input:hidden[name=tx_logo1_option]').val('');
                  });
                  $('input:button[name=imgdelete1]').click(function() {
                    $('input:text[name=tx_mainimg_url1_option],input:hidden[name=tx_img1_option]').val('');
                  });
                  $('input:button[name=imgdelete2]').click(function() {
                    $('input:text[name=tx_mainimg_url2_option],input:hidden[name=tx_img2_option]').val('');
                  });
                  $('input:button[name=imgdelete3]').click(function() {
                    $('input:text[name=tx_mainimg_url3_option],input:hidden[name=tx_img3_option]').val('');
                  });
                  $('input:button[name=imgdelete4]').click(function() {
                    $('input:text[name=tx_mainimg_url4_option],input:hidden[name=tx_img10_option]').val('');
                  });
                  $('input:button[name=imgdelete5]').click(function() {
                    $('input:text[name=tx_mainimg_url5_option],input:hidden[name=tx_img11_option]').val('');
                  });
                  $('input:button[name=imgdelete6]').click(function() {
                    $('input:text[name=tx_mainimg_url6_option],input:hidden[name=tx_img6_option]').val('');
                  });
                  $('input:button[name=menudelete1]').click(function() {
                    $('input:text[name=tx_imgmenu_url1_option],input:hidden[name=tx_imgmenu_id1_option]').val('');
                  });
                  $('input:button[name=menudelete2]').click(function() {
                    $('input:text[name=tx_imgmenu_url2_option],input:hidden[name=tx_imgmenu_id2_option]').val('');
                  });
                  $('input:button[name=menudelete3]').click(function() {
                    $('input:text[name=tx_imgmenu_url3_option],input:hidden[name=tx_imgmenu_id3_option]').val('');
                  });
                  $('input:button[name=menudelete4]').click(function() {
                    $('input:text[name=tx_imgmenu_url4_option],input:hidden[name=tx_imgmenu_id4_option]').val('');
                  });
                  $('input:button[name=menudelete5]').click(function() {
                    $('input:text[name=tx_imgmenu_url5_option],input:hidden[name=tx_imgmenu_id5_option]').val('');
                  });
                  $('input:button[name=menudelete6]').click(function() {
                    $('input:text[name=tx_imgmenu_url6_option],input:hidden[name=tx_imgmenu_id6_option]').val('');
                  });

  $('#img-expansion > div').css('display', 'none');
    $('#img-expansion > span').each(function(i){
       $(this).click(function(){
         $('#img-expansion > div').eq(i).fadeToggle(500);
         $('#img-expansion > span').eq(i).css('display', 'none');
       });
    });

  $('input:text[name=tx_quantitypost_option2]').change(function(){
    var new_post_val = $('input:text[name=tx_quantitypost_option2]').val();
      if(new_post_val < 3){
        $(this).val('3');
        alert('「新着商品」の数を3以上で指定してください。');
      }
  });

  $('input:text[name=tx_quantitypost_option],input:text[name=tx_quantitypost_option2]').change(function(){
      $(this).val($(this).val().replace(/[^0-9]/g,''));
  });

});