$.fn.WBSimpleSlider = function(options) {
  return $(this).each(function() {
    options = $.extend({
      activeClass: 'active',
      slidesSelector: "article",
      startDuration: 10000,
      duration: 10000
    }, options);

    var $slider = $(this),
      $slides = $slider.find(options.slidesSelector),
      totalImages = ($slides.length),
      currentPos = 0,
      $navigation = $slider.find('.-slider-users--navigation'),
      $navigateBackward = $navigation.find('.left'),
      $navigateForward = $navigation.find('.right'),

      getNextIndex = function(to) {
        if ((to > 0) && ((currentPos + 3) >= totalImages)) return 0;
        else if ((to < 0) && ((currentPos - 2) < 0)) return totalImages - 3;
        else return currentPos + to;
      },

      slide = function(direction) {
        var nextPos = getNextIndex(direction);

        $slides.removeClass(options.activeClass);
        $slides.eq(nextPos).addClass(options.activeClass).addClass('first');
        $slides.eq((nextPos + 1)).addClass(options.activeClass);
        $slides.eq((nextPos + 2)).addClass(options.activeClass);

        currentPos = nextPos;
      };

    if ($slider.data('initialized')) return;
    $slider.data('initialized', true);

    $navigateForward.unbind('click.stepForward').bind('click.stepForward',function(){
      slide(1);
    });

    $navigateBackward.unbind('click.stepBackward').bind('click.stepBackward',function(){
      slide(-1);
    });
  });
};

$('.-slider-users').WBSimpleSlider();