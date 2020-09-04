<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjwJQRCuf970OLe6UuBiMvg_DyYW2PL6Y&callback=initMap&libraries=drawing,places"></script>

<script>
  var locations   = <?php echo json_encode($project_locate) ?>;
  var map = null;
  var marker = null;
  var infowindow = null;
  var cr_content=0;
  function initMap(){
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: new google.maps.LatLng(locations[0].lat, locations[0].lng),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      infowindow = new google.maps.InfoWindow();
      var i;
      for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
          icon:'upload/marker.png',
          map: map
        });
        google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
          return function() {
            var content='<div class="row" style="width:250px"><div class="col-md-12"><p><img src="'+locations[i].img+'"/></p></div><div class="col-md-12"><p><b>'+locations[i].title+'</b></p><p>Giá: '+locations[i].price+'</p></div></div>';
            cr_content=content;
            infowindow.setContent(content);
            infowindow.open(map, marker);
          }
        })(marker, i));
        google.maps.event.addListener(marker, 'mouseout', function() {
            infowindow.close();
        });
      }
  }
  var n_lat=0;
  var n_lng=0;
  $('.duan-item-h').hover(function () {
      // over
      var lat = $(this).attr('data-lat');
      var lng = $(this).attr('data-lng');
      n_lat=lat;n_lng=lng;
      var latLng = new google.maps.LatLng(lat,lng);
      map.setCenter(latLng);
      map.setZoom(13);
      marker.setPosition(new google.maps.LatLng(lat,lng));
      marker.setIcon('upload/marker_red.png');

    }, function () {
      // out
      map.setCenter(new google.maps.LatLng(n_lat,n_lng));
      map.setZoom(12);
      marker.setPosition(new google.maps.LatLng(1,1));
      marker.setIcon('upload/marker.png');
    }
  );
</script>