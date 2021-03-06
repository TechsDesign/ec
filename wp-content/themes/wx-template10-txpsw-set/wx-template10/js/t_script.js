//***▼loading
jQuery(function($){
  $('#loading').css({'opacity':'0.9'});
    $(window).on('load', function(){
      $('#loading p').fadeOut();
        setTimeout(function(){ 
          $('#loading').fadeOut();
        },300);
    });
});
//***▲loading

//***▼header height
jQuery(function($){
  $(window).on('load resize',function(){
    var TXSPHEIGHT = $('#header-sp').outerHeight();
      if($(window).width() < 1200){
        $('#wrapper,#main-nav-hidden').css({'padding-top':TXSPHEIGHT});
      }else{
        $('#wrapper,#main-nav-hidden').css({'padding-top':'0'});
      }
  });
});
//***▲header height

//***▼scroll to top
jQuery(function($){
   $('a[href^="#"]').click(function() {
	  var speed = 600;
	  var href= $(this).attr("href");
	  var target = $(href == "#" || href == "" ? 'html' : href);
	  var position = target.offset().top-100;
	  $('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
   });
   var TXSCROLL_top = $('#top-scroll'); TXSCROLL_top.hide();
   var TXSCROLL_PC_top = $('.pc-browser'); TXSCROLL_PC_top.hide();
   var TXSCROLL_SP_top = $('.sp-browser'); TXSCROLL_SP_top.hide();
     $(window).on('load', function(){ TXSCROLL_SP_top.fadeIn(); });
     $(window).scroll(function(){
       if($(this).scrollTop() > 200){
         TXSCROLL_top.fadeIn();
         TXSCROLL_PC_top.fadeIn();
       }else{
         TXSCROLL_top.fadeOut();
         TXSCROLL_PC_top.fadeOut();
       }
     });
         TXSCROLL_top.click(function(){
           $('body,html').animate({ scrollTop: 0 }, 500, 'swing');
           return false;
         });

     /*** header scroll***/
     var TXFIXATION_set = $('#header-scroll'),
         TXFIXATION_down = TXFIXATION_set.offset().top+1,
         TXFIXATION_up = TXFIXATION_set.offset().top+1,
         TXFIXATION_height = TXFIXATION_set.height()+80;
         TXFIXATION_set.css({'top':-TXFIXATION_height+'px'});
           $(window).on('load scroll resize',function(){
             if($(window).width() > 1200){
               var TXFIXATION_zero = $(this).scrollTop();
                 if(TXFIXATION_zero >= TXFIXATION_down){
                   $('#header-scroll').addClass('fixation-scroll').stop().animate({'top' : '0'}, 200);
                 }else if(TXFIXATION_zero <= TXFIXATION_up){
                   TXFIXATION_set.stop().animate({'top' : -TXFIXATION_height+'px'}, 0, function(){
                     $('#header-scroll').removeClass('fixation-scroll');
                   });
                 }
             }else if($(window).width() < 1200){
               $('#header-scroll').removeClass('fixation-scroll');
             }
           });
});
//***▲scroll to top

//***▼main menu
jQuery(function($){
  if($('#main-nav').length){
    $(window).on('load resize',function(){
      $('#main-nav ul.parent li').hover(function(){
        if($(window).width() > 1200){
          $('ul:not(:animated)', this).css({
            left:($(this).outerWidth() - $('ul.sub-menu',this).outerWidth()) / 2
          }).slideDown(300);
        }
      },function(){
        if($(window).width() > 1200){
          $('ul.sub-menu',this).slideUp(200);
        }
      });

      if($('#main-nav ul.parent > .current-menu-item').length){
        $('li.borderslide span').css({width: $('#main-nav .current-menu-item').outerWidth(), left: $('#main-nav .current-menu-item').position().left});
          $('#main-nav ul.parent > li:not(li.borderslide)').hover(function(){
            if($(window).width() > 1200){
              $('li.borderslide span').stop().animate({
                width: $(this).outerWidth(), left: $(this).position().left
              },300);
            }
          },function(){
            if($(window).width() > 1200){
              $('li.borderslide span').stop().animate({
                width: $('#main-nav .current-menu-item').outerWidth(), left: $('#main-nav .current-menu-item').position().left
              },300);
            }
          });
      }else if($('#main-nav ul.sub-menu .current-menu-item').length || !$('#main-nav ul.parent > .current-menu-item').length){
        $('li.borderslide span').css({width: '0', left: '0', display:'none'});
          $('#main-nav ul.parent > li:not(li.borderslide)').hover(function(){
            if($(window).width() > 1200){
              $('li.borderslide span').stop().css({'display':'inline'}).animate({
                width: $(this).outerWidth(), left: $(this).position().left
              },300);
            }
          },function(){
            if($(window).width() > 1200){
              $('li.borderslide span').stop().animate({
                width: '0', left: '0'
              },300,function(){
                  $(this).hide();
              });
            }
          });
      }
    });

  }

    var TXSMENU_header_sp = $('#header-sp'),
        TXSMENU_but1 = $('#s-main'),
        TXSMENU_menu1 = $('#main-nav-hidden'),
        TXSMENU_nav1 = $('#sp-main-nav'),
        TXSMENU_menu2 = $('#sub-nav-hidden').html();

              $(window).on('load resize', function(){
                if($(window).width() < 1200){
                  TXSMENU_but1.removeClass('none');
                  TXSMENU_menu1.addClass('none');
                }else{
                  TXSMENU_but1.addClass('none');
                  TXSMENU_menu1.removeClass('none').removeAttr('style');
                  TXSMENU_but1.removeClass('s-main-slide');
                  TXSMENU_nav1.removeClass('menu-open');
                }
              });

           TXSMENU_nav1.hide();
           $(window).on('load',function(){
           TXSMENU_nav1.show();
             TXSMENU_but1.on('click',(function(){
                $(this).toggleClass('s-main-slide');
                  if(TXSMENU_menu1.css('display') == 'none'){
                    TXSMENU_nav1.addClass('menu-open');
                    TXSMENU_menu1.slideDown('500').css({'opacity':'1','filter':'alpha(opacity=100)'});
                  }else{
                    TXSMENU_nav1.removeClass('menu-open');
                    TXSMENU_menu1.slideUp('500');
                  }
              }));
           });

              $(window).on('load resize',function(){
                if($(window).width() < 1200){
                  if(!($('#sp-sub-body').length)){
                    $('body').prepend('<div id="nav-slide"></div><div id="s-sub"><span class="arrow1"></span><span class="arrow2"></span></div><div id="sp-sub-body"></div>');
                    $('#sp-sub-body').append(TXSMENU_menu2);
                      var TXSMENU_slide2 = $('#nav-slide'),
                          TXSMENU_but2 = $('#s-sub'),
                          TXSMENU_left2 = parseInt(TXSMENU_but2.css('left')),
                          TXSMENU_body2 = $('#sp-sub-body'),
                          TXSMENU_width2 = TXSMENU_body2.outerWidth();
                            TXSMENU_but2.on('click', function(){
                              if($(this).hasClass('s-sub-close')){
                                $(this).removeClass('s-sub-close').removeAttr('style');
                                    TXSMENU_but2.css({'margin-top': (TXSMENU_header_sp.outerHeight() - TXSMENU_but1.outerHeight()) / 2});
                                TXSMENU_slide2.stop().animate({'opacity':'0','filter':'alpha(opacity=0)'},500,function(){
                                  TXSMENU_slide2.removeAttr('style');
                                });
                                TXSMENU_body2.stop().animate({left: - TXSMENU_width2},300);
                                $('body').removeAttr('style');
                                $('#wrapper').off('.noScroll');
                              }else{
                                if(TXSMENU_menu1.css('display') !== 'none'){
                                  TXSMENU_nav1.removeClass('menu-open');
                                  TXSMENU_menu1.slideUp('500');
                                }
                                $(this).addClass('s-sub-close').css({position:'fixed'}).stop().animate({left:TXSMENU_width2 + TXSMENU_left2},300);
                                TXSMENU_slide2.css({display:'block',opacity:'0'}).stop().animate({opacity:'1'},500);
                                TXSMENU_body2.stop().animate({left:'0'},300);
                                $('body').css({position:'fixed'});
                                $('#wrapper').on('touchmove.noScroll', function(e){
                                  e.preventDefault();
                                });
                              }
                            });
                  }
                }else{
                  $('#s-sub,#nav-slide,#sp-sub-body').remove();
                  $('body').removeAttr('style');
                }
              });

              $(window).on('load resize',function(){
                  if($(window).width() < 1200){
                    $('#s-main,#s-sub').css({'margin-top': (TXSMENU_header_sp.outerHeight() - TXSMENU_but1.outerHeight()) / 2});
                  }else{
                    $('#s-main,#s-sub').css({'margin-top':'0'});
                  }
              });
});
//***▲main menu

//***▼ie .png&background
jQuery(function($){
  if( navigator.userAgent.indexOf("MSIE") != -1 ){
    $('img').each(function(){
      if($(this).attr('src').indexOf('.png') != -1){
        $(this).css({'filter':'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' + jQuery(this).attr('src') + '", sizingMethod="scale");'});
      }
    });
  }
});
//***▲ie.png

//***▼img fadin&out
jQuery(function($){
  $('.transmission-img').fadeTo(10,0.5);
    $('.intersection-img').hover(function(){ 
      $(this).fadeTo(200,0.5);
    },
    function(){
      $(this).fadeTo(100,1);
    });
});
//***▲img fadin&out

//***▼search window
jQuery(function($){
  var TXSEARCH_text = 'Keyword';
  var TXSEARCH_key = null;
  var TXSEARCH_url = location.href;
      TXSEARCH_href = TXSEARCH_url.split("?");

    $('#search input[value=""],.ucart_search_body input[value=""]').val(TXSEARCH_text).css({'color':'#cdcdcd'});
      $('#search input#s,.ucart_search_body input#s').focus(function(){
        if(this.value == TXSEARCH_text){ $(this).val('').css({'color':'#686868'}); }
      });
      $('#search input#s,.ucart_search_body input#s').blur(function(){
        if(this.value == ''){ $(this).val(TXSEARCH_text).css({'color':'#cdcdcd'}); }
          if(this.value != TXSEARCH_text){ $(this).css({'color':'#686868'}); }
      });
      $('#search input#searchsubmit,.ucart_search_body input#searchsubmit').click(function(){
        $('input[value="TXSEARCH_text"]').val('');
      });

        if(TXSEARCH_href.length > 1){
          var TXSEARCH_parameter = TXSEARCH_href[1].split("&");
          var TXSEARCH_parameter_array = [];
            for(i = 0; i < TXSEARCH_parameter.length; i++){
              var neet = TXSEARCH_parameter[i].split("=");
                TXSEARCH_parameter_array.push(neet[0]);
                TXSEARCH_parameter_array[neet[0]] = neet[1];
            }
          TXSEARCH_key = decodeURIComponent(TXSEARCH_parameter_array["s"]);
          TXSEARCH_key2 = decodeURIComponent(TXSEARCH_parameter_array["itemsearch"]);

          if(TXSEARCH_key2 == 'item_post'){
            if(TXSEARCH_key !== 'undefined'){
              $('.ucart_search_body input[value=""]').val(TXSEARCH_key).css({'color':'#686868'});
            }
          }
        }
});
//***▲search window

//***▼single sns
jQuery(function($){
 if($('#single-sns').length){
  $('#single-sns').hide();
    $(window).on('load scroll',function(){
      if($(window).scrollTop() + $(window).outerHeight() > $('#single-sns').offset().top){
        setTimeout(function(){
          $('#single-sns').fadeIn(2000);
        },500);
      }
    });
}
});
//***▲single sns

//***▼itemcontact
jQuery(function($){
   $('span.item-name :text,span.item-id :text,span.item-url :text').css({background:'#f0f0f0', border:'#fff 2px solid', color:'#000'}).attr('readOnly', true);
});
//***▲itemcontact

//***▼item page
jQuery(function($){
$('.quantity-but input.skuquantity').attr('readonly' ,true);
  $('input.item-plus').click(function(){
    var TXITEMSPLUS_restriction = $('input#restriction').val();
    var TXITEMSPLUS_skuquantity = parseInt($(this).prev('input.skuquantity').val());
      if(!TXITEMSPLUS_skuquantity || TXITEMSPLUS_skuquantity == '' || TXITEMSPLUS_skuquantity == 'NaN'){
        TXITEMSPLUS_skuquantity = 0;
      }
        if(TXITEMSPLUS_restriction != '' && TXITEMSPLUS_restriction != '0'){
          if(TXITEMSPLUS_skuquantity < TXITEMSPLUS_restriction){
            $(this).prev('input.skuquantity').val(TXITEMSPLUS_skuquantity + 1);
          }
        }else{
          $(this).prev('input.skuquantity').val(TXITEMSPLUS_skuquantity + 1);
        }
  });

  $('input.item-minus').click(function(){
    var TXITEMSMINUS_skuquantity = parseInt($(this).next('input.skuquantity').val());
      if(TXITEMSMINUS_skuquantity == 'NaN'){
        TXITEMSMINUS_skuquantity = 0;
      }
        if(TXITEMSMINUS_skuquantity > 0){
            $(this).next('input.skuquantity').val(TXITEMSMINUS_skuquantity - 1);
        }
  });
});

jQuery(function($){
   $('.sku-option-open p.open').click(function(){
     $(this).next('.sku-inside').stop(true, true).slideToggle();
     $(this).toggleClass('slide-open');
   });
});
//***▲other script