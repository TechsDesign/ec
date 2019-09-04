jQuery(function($){
  var options = {
                  defaultColor: false,
                  change: function(event, ui){},
                  clear: function() {},
                  hide: true,
                  palettes: true
                };
  $('.colorpicker').wpColorPicker(options);

  $('#color-tab p').click(function(){
    var color_content = $('#color-tab p').index(this);
      $('.color-in').css('display','none');
      $('#color-select .color-in').eq(color_content).css('display','block');
      $('#color-tab p').removeClass('select');
      $(this).addClass('select');
  });

  $(window).on('load', function(){
    $('#admin-loading,#admin-loading2').fadeOut();
  });

  $('#color-reset').click(function(){
    $('body').append('<div id="reset-box"></div>');
    $('#reset-box').css({'opacity':'0.5','filter':'alpha(opacity=50)','background':'#000'}).fadeTo(100, 0.5);
    $('#reset-box-in').fadeIn(100).css({'box-shadow':'0 0 40px #000','-webkit-box-shadow':'0 0 40px #000','-moz-box-shadow':'0 0 40px #000'});
  });

  $('#color-reset-close').click(function(){
    location.reload();
  });

  $(window).on('resize', function(){
    $('#reset-box-in').css({
                            top: ($(window).height() - $('#reset-box-in').outerHeight()) / 2,
                            left: ($(window).width() - $('#reset-box-in').outerWidth()) / 2
                          });
  });
  $(window).resize();

  $('#color-reset-ok').click(function(){
    $('.color-form input[type="text"]').val('');
    $('.wp-picker-container a.wp-color-result').removeAttr('style');
      $('#reset-box, #reset-box-in').fadeOut(100, function(){
        $('#reset-box').remove();
      });
    $('#submit-on1,#submit-on2').fadeIn(100);
  });
});