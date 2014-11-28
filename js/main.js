  /* jQuery Tiny Pub/Sub - v0.7 - 10/27/2011
   * http://benalman.com/
   * Copyright (c) 2011 "Cowboy" Ben Alman; Licensed MIT, GPL */

(function($) {

  var o = $({});

  $.subscribe = function() {
    o.on.apply(o, arguments);
  };

  $.unsubscribe = function() {
    o.off.apply(o, arguments);
  };

  $.publish = function() {
    o.trigger.apply(o, arguments);
  };

}(jQuery));

$(document).ready(function() {

  var owl = $(".-slider-users--slides-wrapper"),
      $nav = $('.-slider-users--navigation');

  owl.owlCarousel({
    itemsCustom : [
      [0, 3],
      [330, 4],
      [490, 7],
      [700, 9],
      [1000, 10],
      [1200, 12],
      [1400, 13],
      [1600, 15]
    ],
    navigation : false,
    pagination: false
  });

  $nav.find(".right").click(function(){
    owl.trigger('owl.next');
  });
  $nav.find(".left").click(function(){
    owl.trigger('owl.prev');
  });
});

if($('#map-container').length) {

  var city = null,
      country = null;

  $.ajax({
    url: '//freegeoip.net/json/',
    type: 'POST',
    dataType: 'jsonp',
    success: function(location) {
      city = location.city;
      country = location.country_name;

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
            google.maps.event.addListener(c, "click", Sex.openInfoWindow(d, c));

            if(a == (Sex.numMarkers-1)) $.publish('openTheWindow',{infoWindow:d,marker:c});
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

      $.subscribe('openTheWindow',function(name,publishedData){
        Sex.openInfoWindow(publishedData.infoWindow,publishedData.marker).call();
      })
    }
  });
}