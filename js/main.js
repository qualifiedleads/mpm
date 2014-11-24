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

if($('#map-container').length) {
  var city = geoip_city(),
      country = geoip_country_name();
  myplace = "" == city ? country : city + ", " + country;
  var Sex = {
    map: null,
    mapContainer: document.getElementById("map-container"),
    numMarkers: 12,
    markers: [],
    visibleInfoWindow: null,
    init: function () {
      Sex.map = new google.maps.Map(Sex.mapContainer, {
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: !0,
        disableDoubleClickZoom: !0,
        overviewMapControl: !1,
        zoomControl: !1,
        streetViewControl: !1,
        mapTypeControl: !1,
        scrollwheel: !1
      });
      geocoder = new google.maps.Geocoder;
      Sex.geoLocate();
      window.setTimeout(function () {
        Sex.generateRandomMarkers(Sex.map.getCenter())
      }, 2E3)
    },
    geoLocate: function () {
      geocoder.geocode({
        address: myplace,
        partialmatch: !0
      }, Sex.geocodeResult)
    },
    geocodeResult: function (b, a) {
      "OK" == a && 0 < b.length ? (Sex.map.fitBounds(b[0].geometry.viewport), Sex.map.setZoom(12), lng = Sex.map.getCenter().lng()) : alert("Sorry but we can't find your location")
    },
    generateRandomMarkers: function (b) {
      Sex.clearMarkers();
      for (var a = 0; a < Sex.numMarkers; a++) {
        var c = Math.random(),
          d = Math.random(),
          c = c * (0 == 1E6 * c % 2 ? 1 : -1),
          d = d * (0 == 1E6 * d % 2 ? 1 : -1),
          c = new google.maps.LatLng(b.lat() + 0.08 * c + 0.052, b.lng() + 0.2 * d + 0.08),
          c = new google.maps.Marker({
            map: Sex.map,
            title: datass.net[a].name + ", " + datass.net[a].age,
            position: c,
            icon: datass.net[a].pin,
            draggable: !1
          });
        Sex.markers.push(c);
        d = new google.maps.InfoWindow({
          content: "" + ('<div class="mavatar"><a href="go.php" target="_blank"><img class="photo" src="' + datass.net[a].avatar + '" /></a><div class="minfo"><span class="mname">' + datass.net[a].name + '</span> <span class="mage">Age: ' + datass.net[a].age + '</span><div class="status"><img src="js/vendor/maplander/images/online-status.gif" /><a href="go.php" class="viewprofile" target="_blank">View Profile</a></div></div></div>'),
          size: new google.maps.Size(50, 400)
        });
        google.maps.event.addListener(c, "click", Sex.openInfoWindow(d, c))
      }
    },
    openInfoWindow: function (b, a) {
      return function () {
        Sex.visibleInfoWindow && Sex.visibleInfoWindow.close();
        b.open(Sex.map, a);
        Sex.visibleInfoWindow = b
      }
    },
    generateTriggerCallback: function (b, a) {
      return function () {
        google.maps.event.trigger(b, a)
      }
    },
    clearMarkers: function () {
      for (var b = 0, a; a = Sex.markers[b]; b++) a.setVisible(!1)
    }
  };
  new google.maps.event.addDomListener(window, "load", Sex.init, Sex);
}