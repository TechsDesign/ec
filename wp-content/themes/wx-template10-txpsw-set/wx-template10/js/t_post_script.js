jQuery(function($){
  if($('.top-item-box')[0]){
  $(window).on('load resize', function() {
    $('#top-item-in').TXPOSTBOX_class({ TXPOSTBOX_x:0,TXPOSTBOX_y:5,TXPOSTBOX_box_class:'.top-item-box' });
  });
}

      $.fn.TXPOSTBOX_class = function(options){
        TXPOSTBOX = $(this);
        TXPOSTBOX_frame = $('#top-item');
        TXPOSTBOX_plug = $.extend({}, $.fn.TXPOSTBOX_class.first, options);
        TXPOSTBOX_measurement();
        TXPOSTBOX_class_app();
        TXPOSTBOX.width(TXPOSTBOX_width * TXPOSTBOX_out);
        TXPOSTBOX_frame.resize(function(){
          var TXPOSTBOX_resize_width;
          var TXPOSTBOX_calculation = TXPOSTBOX_frame.width() - TXPOSTBOX_plug.TXPOSTBOX_x * 2;
            if(TXPOSTBOX_calculation < TXPOSTBOX_width * TXPOSTBOX_out){
              TXPOSTBOX_measurement();
              TXPOSTBOX_resize_width = TXPOSTBOX_width * (TXPOSTBOX_out - 1);
            }else if(TXPOSTBOX_calculation > TXPOSTBOX_width * (TXPOSTBOX_out + 1)){
              TXPOSTBOX_measurement();
              TXPOSTBOX_resize_width = TXPOSTBOX_width * (TXPOSTBOX_out + 1);
            }
              if(TXPOSTBOX_resize_width){
                var TXPOSTBOX_cu = TXPOSTBOX.width();
                    TXPOSTBOX.width(TXPOSTBOX_width * TXPOSTBOX_out);
                    TXPOSTBOX_class_app();
              }
        });
        return this;
      }
      $.fn.TXPOSTBOX_class.first = { TXPOSTBOX_x:0, TXPOSTBOX_y:5, TXPOSTBOX_box_class:'.top-item-box' };
       var TXPOSTBOX, TXPOSTBOX_frame, TXPOSTBOX_out, TXPOSTBOX_plug = {}, TXPOSTBOX_width, TXPOSTBOX_array = [];
         if(!Array.prototype.indexOf){
           Array.prototype.indexOf = function(elt /*, from*/){
             var TXPOSTBOX_length = this.length >>> 0;
             var from = Number(arguments[1]) || 0;
                 from = (from < 0) ? Math.ceil(from) : Math.floor(from);
                   if(from < 0){
                     from += TXPOSTBOX_length;
                   }
                     for(; from < TXPOSTBOX_length; from++){
                       if(from in this && this[from] === elt){
                         return from;
                       }
                     }
                     return -1;
           };
         }
    function TXPOSTBOX_class_app(){
             TXPOSTBOX_build();
             TXPOSTBOX.children(TXPOSTBOX_plug.TXPOSTBOX_box_class).each(function(index) {
             TXPOSTBOX_assortment($(this));
             });
         var TXPOSTBOX_height = TXPOSTBOX_get_height(0, TXPOSTBOX_array.length);
             TXPOSTBOX.height(TXPOSTBOX_height.max + TXPOSTBOX_plug.TXPOSTBOX_y);
    }
    function TXPOSTBOX_measurement(){
             TXPOSTBOX_width = $(TXPOSTBOX_plug.TXPOSTBOX_box_class).outerWidth() + TXPOSTBOX_plug.TXPOSTBOX_x * 2;
             TXPOSTBOX_out = Math.floor((TXPOSTBOX_frame.width() - TXPOSTBOX_plug.TXPOSTBOX_x * 2) / TXPOSTBOX_width);
    }
    function TXPOSTBOX_build(){
             TXPOSTBOX_array = [];
               for(var i=0; i<TXPOSTBOX_out; i++){
                 TXPOSTBOX_build_array(i, 0, 1, -TXPOSTBOX_plug.TXPOSTBOX_y);
               }
    }
    function TXPOSTBOX_build_array(x, y, size, height){
       for(var i=0; i<size; i++){
         var TXPOSTBOX_lattice = [];
             TXPOSTBOX_lattice.x = x + i;
             TXPOSTBOX_lattice.size = size;
             TXPOSTBOX_lattice.TXPOSTBOX_last_y = y + height + TXPOSTBOX_plug.TXPOSTBOX_y*2;
             TXPOSTBOX_array.push(TXPOSTBOX_lattice);
       }
    }
    function TXPOSTBOX_erase(x, size){
       for(var i=0; i<size; i++){
         var index = TXPOSTBOX_index(x+i);
                     TXPOSTBOX_array.splice(index, 1);
       }
    }
    function TXPOSTBOX_index(x){
       for(var i=0; i<TXPOSTBOX_array.length; i++){
         var TXPOSTBOX_index_body = TXPOSTBOX_array[i];
            if(TXPOSTBOX_index_body.x == x){
              return i;
            }
       }
    }
    function TXPOSTBOX_get_height(x, size){
       var TXPOSTBOX_get_height_array = [];
       var TXPOSTBOX_mm = [];
         for(var i=0; i<size; i++){
           var TXPOSTBOX_index_out = TXPOSTBOX_index(x+i);
               TXPOSTBOX_mm.push(TXPOSTBOX_array[TXPOSTBOX_index_out].TXPOSTBOX_last_y);
         }
               TXPOSTBOX_get_height_array.min = Math.min.apply(Math, TXPOSTBOX_mm);
               TXPOSTBOX_get_height_array.max = Math.max.apply(Math, TXPOSTBOX_mm);
               TXPOSTBOX_get_height_array.x = TXPOSTBOX_mm.indexOf(TXPOSTBOX_get_height_array.min);
                 return TXPOSTBOX_get_height_array;
    }
    function TXPOSTBOX_place(){
       var TXPOSTBOX_post = [];
       var TXPOSTBOX_place_height = TXPOSTBOX_get_height(0, TXPOSTBOX_array.length);
           TXPOSTBOX_post.x = TXPOSTBOX_place_height.x;
           TXPOSTBOX_post.y = TXPOSTBOX_place_height.min;
             return TXPOSTBOX_post;
    }
    function TXPOSTBOX_assortment(TXPOSTBOX_lattice){
       if(!TXPOSTBOX_lattice.data('size') || TXPOSTBOX_lattice.data('size') < 0){
         TXPOSTBOX_lattice.data('size', 1);
       }
       var TXPOSTBOX_post = TXPOSTBOX_place();
       var TXPOSTBOX_fit_width = TXPOSTBOX_width * TXPOSTBOX_lattice.data('size') - (TXPOSTBOX_lattice.outerWidth() - TXPOSTBOX_lattice.width());
           TXPOSTBOX_lattice.css({ 'left':TXPOSTBOX_post.x * TXPOSTBOX_width, 'top':TXPOSTBOX_post.y, 'position':'absolute' });
       var TXPOSTBOX_fit_height = TXPOSTBOX_lattice.outerHeight();
           TXPOSTBOX_erase(TXPOSTBOX_post.x, TXPOSTBOX_lattice.data('size'));
           TXPOSTBOX_build_array(TXPOSTBOX_post.x, TXPOSTBOX_post.y, TXPOSTBOX_lattice.data('size'), TXPOSTBOX_fit_height);
    }

});
