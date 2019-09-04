//***▼main img slide
jQuery(function($){
  var TXMAINIMGSCROLL_height = $('#main-still img').outerHeight();
        $(window).on('load scroll resize',function(){
          if($(window).width() < 1200){
            $('#main-img').css({'height':TXMAINIMGSCROLL_height});
          }
        });
  //***AutoPlay'yes'or'no'***/
    TXMAINIMG_auto = 'yes';
  //***Center image maximum width***/
    TXMAINIMG_width = 1600;
  //***Center image minimum width***/
    TXMAINIMG_least_w = 320;
  //***Center image vertical height***/
    TXMAINIMG_height = 450;
  //***SlideInterval***/
    TXMAINIMG_time = 9000;
  //***SlideSpeed***/
    TXMAINIMG_speed = 400;
  //***Main Element***/
    $TXMAINIMG = $('#main-img');
    $TXMAINIMG.css({'display':'none'});
    $(window).on('load', function(){
      $TXMAINIMG.css({'display':'inline'});
      $TXMAINIMG.find('img').css({'display':'block'});
        $TXMAINIMG.each(function(){
          var TXMAINIMG_this = $(this), TXMAINIMG_set_timer;
            TXMAINIMG_this.children('ul').wrapAll('<div class="main-img-in"><div class="main-img-box"></div><div class="prevslide"></div><div class="nextslide"></div></div>');
              var TXMAINIMG_in = TXMAINIMG_this.find('.main-img-in'),
                  TXMAINIMG_box = TXMAINIMG_this.find('.main-img-box'),
                  TXMAINIMG_prev = TXMAINIMG_this.find('.prevslide'),
                  TXMAINIMG_next = TXMAINIMG_this.find('.nextslide');
                  TXMAINIMG_np = TXMAINIMG_this.find('.nextslide,.prevslide');
                  TXMAINIMG_hover = TXMAINIMG_this.find('ul,.nextslide,.prevslide');
              var TXMAINIMG_pageing = $('<div class="wideimg-but"></div>');
                  TXMAINIMG_this.append(TXMAINIMG_pageing);
              var TXMAINIMG_li = TXMAINIMG_box.find('li'),
                  TXMAINIMG_child_a = TXMAINIMG_box.find('li').children('a'),
                  TXMAINIMG_count_li = TXMAINIMG_box.find('li').length;
                    TXMAINIMG_li.each(function(i){
                      $(this).css({width:(TXMAINIMG_width),height:(TXMAINIMG_height)});
                      TXMAINIMG_pageing.append('<p class="pn'+(i+1)+'">&nbsp;</p>');
                    });
              var TXMAINIMG_pageing_but = TXMAINIMG_this.find('.wideimg-but');
                    TXMAINIMG_start();
                      function TXMAINIMG_start(){
                        TXMAINIMG_w_width = $(window).width();
                        TXMAINIMG_list = TXMAINIMG_box.find('li');
                        TXMAINIMG_set = (TXMAINIMG_in,TXMAINIMG_box,TXMAINIMG_prev,TXMAINIMG_next,$TXMAINIMG);
                        TXMAINIMG_box_left = parseInt(TXMAINIMG_box.css('left'));
                        TXMAINIMG_img_width = TXMAINIMG_list.find('img').width();
                        TXMAINIMG_set_left = TXMAINIMG_box_left / TXMAINIMG_img_width;
                        TXMAINIMG_set_header_height = $('#header-box').height() + $('#main-nav').height();
                          if(TXMAINIMG_w_width < TXMAINIMG_width){
                            if(TXMAINIMG_w_width > TXMAINIMG_least_w){
                              TXMAINIMG_list.css({width:(TXMAINIMG_w_width)});
                                var TXMAINIMG_img_height = TXMAINIMG_list.find('img').height();
                                    TXMAINIMG_list.css({height:(TXMAINIMG_img_height)});
                                    TXMAINIMG_set.css({height:(TXMAINIMG_img_height) - TXMAINIMG_set_header_height});
                            }else if(TXMAINIMG_w_width <= TXMAINIMG_least_w){
                              TXMAINIMG_list.css({width:(TXMAINIMG_least_w)});
                                var TXMAINIMG_img_height = TXMAINIMG_list.find('img').height();
                                    TXMAINIMG_list.css({height:(TXMAINIMG_img_height)});
                                    TXMAINIMG_set.css({height:(TXMAINIMG_img_height) - TXMAINIMG_set_header_height});
                            }
                          }else if(TXMAINIMG_w_width >= TXMAINIMG_width){
                            TXMAINIMG_list.css({width:(TXMAINIMG_width),height:(TXMAINIMG_height)});
                            TXMAINIMG_set.css({height:(TXMAINIMG_height) - TXMAINIMG_set_header_height});
                          }
                        TXMAINIMG_set_width = TXMAINIMG_list.find('img').width();
                        TXMAINIMG_set_height = TXMAINIMG_list.find('img').height();
                        TXMAINIMG_box_width = (TXMAINIMG_set_width)*(TXMAINIMG_count_li);
                        TXMAINIMG_ul_length = TXMAINIMG_box.find('ul').length;
                          if(TXMAINIMG_ul_length == 1){
                            var TXMAINIMG_ul_clone = TXMAINIMG_box.children('ul');
                                TXMAINIMG_ul_clone.clone().prependTo(TXMAINIMG_box);
                                TXMAINIMG_ul_clone.clone().appendTo(TXMAINIMG_box);
                                TXMAINIMG_box.children('ul').eq('1').addClass('TXMAINIMG_li_child');
                            var TXMAINIMG_li_child = TXMAINIMG_box.find('.slide-main').children('li');
                                TXMAINIMG_li_child.eq('0').addClass('slide-main')
                                TXMAINIMG_li_count = TXMAINIMG_box.find('li').length;
                          }
                        TXMAINIMG_count_width = (TXMAINIMG_set_width)*(TXMAINIMG_li_count),
                        TXMAINIMG_center = ((TXMAINIMG_w_width)-(TXMAINIMG_set_width)) / 2;
                        TXMAINIMG_in.css({left:(TXMAINIMG_center),width:(TXMAINIMG_set_width),height:(TXMAINIMG_set_height)});
                        TXMAINIMG_prev.css({top:(TXMAINIMG_set_height - TXMAINIMG_prev.outerHeight() - TXMAINIMG_set_header_height) / 2});
                        TXMAINIMG_next.css({top:(TXMAINIMG_set_height - TXMAINIMG_prev.outerHeight() - TXMAINIMG_set_header_height) / 2});
                        TXMAINIMG_box.css({width:(TXMAINIMG_count_width),height:(TXMAINIMG_set_height)});
                        TXMAINIMG_box.children('ul').css({width:(TXMAINIMG_box_width),height:(TXMAINIMG_set_height)});
                        TXMAINIMG_next_reset = -(TXMAINIMG_box_width) * 2,
                        TXMAINIMG_prev_reset = -(TXMAINIMG_box_width) + (TXMAINIMG_set_width);
                        TXMAINIMG_width_left = TXMAINIMG_set_width * TXMAINIMG_set_left;
                        TXMAINIMG_box.css({left:(TXMAINIMG_width_left)});
                      }
                  TXMAINIMG_box.css({left:-(TXMAINIMG_box_width)});
              var TXMAINIMG_pageing_p = TXMAINIMG_pageing.children('p'),
                  TXMAINIMG_pageing_first = TXMAINIMG_pageing.children('p:first'),
                  TXMAINIMG_pageing_last = TXMAINIMG_pageing.children('p:last'),
                  TXMAINIMG_pageing_count = TXMAINIMG_pageing.children('p').length;
                    TXMAINIMG_pageing_p.css({opacity:'0.5'}).hover(function(){
                      $(this).stop().animate({opacity:'1'},300);
                    }, function(){
                      $(this).stop().animate({opacity:'0.5'},300);
                    });
                  TXMAINIMG_pageing_first.addClass('slidebut');
                    TXMAINIMG_pageing_p.click(function(){
                      if(TXMAINIMG_auto == 'yes'){
                        clearInterval(TXMAINIMG_set_timer);
                      }
                        var TXMAINIMG_pageing_this = TXMAINIMG_pageing_p.index(this),
                            TXMAINIMG_pageing_width = ((TXMAINIMG_set_width) * (TXMAINIMG_pageing_this)) + TXMAINIMG_box_width;
                            TXMAINIMG_box.stop().animate({left: -(TXMAINIMG_pageing_width)},TXMAINIMG_speed,'linear');
                            TXMAINIMG_pageing_p.removeClass('slidebut');
                            $(this).addClass('slidebut');
                            TXMAINIMG_active();
                              if(TXMAINIMG_auto == 'yes'){
                                TXMAINIMG_timer();
                            }
                    });
                        if(TXMAINIMG_auto == 'yes'){
                          TXMAINIMG_timer();
                        }
                          function TXMAINIMG_timer(){
                            TXMAINIMG_set_timer = setInterval(function(){
                              TXMAINIMG_next.click();
                            },TXMAINIMG_time);
                          }
                    TXMAINIMG_np.hide();
                      TXMAINIMG_hover.hover(function(){
                        TXMAINIMG_np.css({opacity:'0.5'});
                        TXMAINIMG_np.stop().fadeIn(300);
                      },function(){
                        TXMAINIMG_np.stop().fadeOut(300);
                      });
                    TXMAINIMG_next.click(function(){
                      TXMAINIMG_box.not(':animated').each(function(){
                        if(TXMAINIMG_auto == 'yes'){
                          clearInterval(TXMAINIMG_set_timer);
                        }
                          var TXMAINIMG_css_left = parseInt($(TXMAINIMG_box).css('left')),
                              TXMAINIMG_pageing_width = ((TXMAINIMG_css_left)-(TXMAINIMG_set_width));
                                TXMAINIMG_box.stop().animate({left:(TXMAINIMG_pageing_width)},TXMAINIMG_speed,'linear',function(){
                                  var TXMAINIMG_int_left = parseInt($(TXMAINIMG_box).css('left'));
                                    if(TXMAINIMG_int_left <= TXMAINIMG_next_reset){
                                      TXMAINIMG_box.css({left: -(TXMAINIMG_box_width)});
                                    }
                                });
                          var TXMAINIMG_pageing_active = TXMAINIMG_pageing.children('p.slidebut');
                            TXMAINIMG_pageing_active.each(function(){
                              var TXMAINIMG_pageing_index = TXMAINIMG_pageing_p.index(this),
                                  TXMAINIMG_pageing_index_count = TXMAINIMG_pageing_index + 1;
                                    if(TXMAINIMG_pageing_count == TXMAINIMG_pageing_index_count){
                                      TXMAINIMG_pageing_active.removeClass('slidebut');
                                      TXMAINIMG_pageing_first.addClass('slidebut');
                                    }else{
                                      TXMAINIMG_pageing_active.removeClass('slidebut').next().addClass('slidebut');
                                    }
                              });
                              TXMAINIMG_active();
                                if(TXMAINIMG_auto == 'yes'){
                                  TXMAINIMG_timer();
                                }
                      });
                    }).hover(function(){
                      $(this).stop().css({opacity:'1'});
                    }, function(){
                      $(this).stop().css({opacity:'0.5'});
                    });
                    TXMAINIMG_prev.click(function(){
                      TXMAINIMG_box.not(':animated').each(function(){
                        if(TXMAINIMG_auto == '1'){clearInterval(TXMAINIMG_set_timer);}
                          var TXMAINIMG_css_left = parseInt($(TXMAINIMG_box).css('left')),
                              TXMAINIMG_pageing_width = ((TXMAINIMG_css_left)+(TXMAINIMG_set_width));
                                TXMAINIMG_box.stop().animate({left:(TXMAINIMG_pageing_width)},TXMAINIMG_speed,'linear',function(){
                                  var TXMAINIMG_int_left = parseInt($(TXMAINIMG_box).css('left')),
                                      TXMAINIMG_int_left_prev = (TXMAINIMG_next_reset) + (TXMAINIMG_set_width);
                                        if(TXMAINIMG_int_left >= TXMAINIMG_prev_reset){
                                          TXMAINIMG_box.css({left: (TXMAINIMG_int_left_prev)});
                                        }
                                });
                          var TXMAINIMG_pageing_active = TXMAINIMG_pageing.children('p.slidebut');
                            TXMAINIMG_pageing_active.each(function(){
                              var TXMAINIMG_pageing_index = TXMAINIMG_pageing_p.index(this),
                                  TXMAINIMG_pageing_index_count = TXMAINIMG_pageing_index + 1;
                                    if(1 == TXMAINIMG_pageing_index_count){
                                      TXMAINIMG_pageing_active.removeClass('slidebut');
                                      TXMAINIMG_pageing_last.addClass('slidebut');
                                    }else{
                                      TXMAINIMG_pageing_active.removeClass('slidebut').prev().addClass('slidebut');
                                    }
                            });
                            TXMAINIMG_active();
                              if(TXMAINIMG_auto == 'yes'){
                                TXMAINIMG_timer();
                              }
                      });
                    }).hover(function(){
                      $(this).stop().css({opacity:'1'});
                    }, function(){
                      $(this).stop().css({opacity:'0.5'});
                    });
                      function TXMAINIMG_active(){
                        var TXMAINIMG_pageing_but_active = TXMAINIMG_pageing_but.find('p.slidebut');
                          TXMAINIMG_pageing_but_active.each(function(){
                            var TXMAINIMG_pageing_p_index = TXMAINIMG_pageing_p.index(this),
                                TXMAINIMG_set_li = TXMAINIMG_box.find('.slide-main').children('li');
                                TXMAINIMG_set_li.removeClass('slide-main').eq(TXMAINIMG_pageing_p_index).addClass('slide-main');
                          });
                      }
                        $(window).on('resize',function(){
                          if(TXMAINIMG_auto == 'yes'){
                            clearInterval(TXMAINIMG_set_timer);
                          }
                            TXMAINIMG_start();
                              if(TXMAINIMG_auto == 'yes'){
                                TXMAINIMG_timer();
                              }
                        }).resize();

                          var TXMAINIMG_flick = ('ontouchstart' in window);
                            TXMAINIMG_box.on({'touchstart mousedown': function(e){
                              if(TXMAINIMG_box.is(':animated')){
                                e.preventDefault();
                              }else{
                                if(TXMAINIMG_auto == 'yes'){
                                  clearInterval(TXMAINIMG_set_timer);
                                }
                                  e.preventDefault();
                                  this.pageX = (TXMAINIMG_flick ? event.changedTouches[0].pageX : e.pageX);
                                  this.leftBegin = parseInt($(this).css('left'));
                                  this.left = parseInt($(this).css('left'));
                                  this.touched = true;
                              }
                            },'touchmove mousemove': function(e){
                              if(!this.touched){
                                return;
                              }
                                e.preventDefault();
                                this.left = this.left - (this.pageX - (TXMAINIMG_flick ? event.changedTouches[0].pageX : e.pageX) );
                                this.pageX = (TXMAINIMG_flick ? event.changedTouches[0].pageX : e.pageX);
                                $(this).css({left:this.left});
                            },'touchend mouseup mouseout': function(e){
                              if(!this.touched){
                                return;
                              }
                                this.touched = false;
                                  var TXMAINIMG_flick_active = TXMAINIMG_pageing.children('p.slidebut'),
                                      TXMAINIMG_flick_width = parseInt(TXMAINIMG_li.css('width')),leftMax = -((TXMAINIMG_flick_width) * ((TXMAINIMG_count_li) - 1));
                                        if(((this.leftBegin) - 30) > this.left && (!((this.leftBegin) === (leftMax)))){
                                          $(this).stop().animate({left:((this.leftBegin)-(TXMAINIMG_flick_width))},TXMAINIMG_speed,'linear',function(){
                                            var TXMAINIMG_int_left = parseInt($(TXMAINIMG_box).css('left'));
                                              if(TXMAINIMG_int_left <= TXMAINIMG_next_reset){
                                                TXMAINIMG_box.css({left: -(TXMAINIMG_box_width)});
                                              }
                                          });
                                            TXMAINIMG_flick_active.each(function(){
                                              var TXMAINIMG_pageing_index = TXMAINIMG_pageing_p.index(this),
                                                  TXMAINIMG_pageing_index_count = TXMAINIMG_pageing_index + 1;
                                                    if(TXMAINIMG_pageing_count == TXMAINIMG_pageing_index_count){
                                                      TXMAINIMG_flick_active.removeClass('slidebut');
                                                      TXMAINIMG_pageing_first.addClass('slidebut');
                                                    }else{
                                                      TXMAINIMG_flick_active.removeClass('slidebut').next().addClass('slidebut');
                                                    }
                                            });
                                            TXMAINIMG_active();
                                        }else if(((this.leftBegin)+30) < this.left && (!((this.leftBegin) === 0))){
                                          $(this).stop().animate({left:((this.leftBegin)+(TXMAINIMG_flick_width))},TXMAINIMG_speed,'linear',function(){
                                            var TXMAINIMG_int_left = parseInt($(TXMAINIMG_box).css('left')),
                                                TXMAINIMG_int_left_prev = (TXMAINIMG_next_reset) + (TXMAINIMG_set_width);
                                                  if(TXMAINIMG_int_left >= TXMAINIMG_prev_reset){
                                                    TXMAINIMG_box.css({left: (TXMAINIMG_int_left_prev)});
                                                  }
                                          });
                                            TXMAINIMG_flick_active.each(function(){
                                              var TXMAINIMG_pageing_index = TXMAINIMG_pageing_p.index(this),
                                                  TXMAINIMG_pageing_index_count = TXMAINIMG_pageing_index + 1;
                                                    if(1 == TXMAINIMG_pageing_index_count){
                                                      TXMAINIMG_flick_active.removeClass('slidebut');
                                                      TXMAINIMG_pageing_last.addClass('slidebut');
                                                    }else{
                                                      TXMAINIMG_flick_active.removeClass('slidebut').prev().addClass('slidebut');
                                                    }
                                            });
                                            TXMAINIMG_active();
                                        }else{
                                          $(this).stop().animate({left:(this.leftBegin)},TXMAINIMG_speed,'linear');
                                        }
                                      TXMAINIMG_flick_b_left = this.leftBegin;
                                      TXMAINIMG_flick_t_left = this.left;
                                        TXMAINIMG_child_a.click(function(e){
                                          if(!(TXMAINIMG_flick_b_left == TXMAINIMG_flick_t_left)){
                                            e.preventDefault();
                                          }
                                        });
                                          if(TXMAINIMG_auto == 'yes'){
                                            TXMAINIMG_timer();
                                          }
                            }
                            });
                              setTimeout(function(){TXMAINIMG_start();},500);
        });
    });
});
//***▲main img slide