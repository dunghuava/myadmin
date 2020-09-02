<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjwJQRCuf970OLe6UuBiMvg_DyYW2PL6Y&callback=initMap&libraries=drawing,places"></script>

<script>
  var locations   = <?php echo json_encode($project_locate) ?>;
  function initMap(){
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(locations[0].lat, locations[0].lng),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
          icon:'upload/marker.png',
          map: map
        });
        google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
          return function() {
            var content='<div class="row"><div class="col-md-6><img src="upload/images/'+locations[i].img+'"/></div><div class="col-md-6"><p><b>'+locations[i].title+'</b></p><p>Giá: '+locations[i].price+'</p></div></div>';
            infowindow.setContent(content);
            infowindow.open(map, marker);
          }
        })(marker, i));
        google.maps.event.addListener(marker, 'mouseout', function() {
            infowindow.close();
        });
      }
  }
</script>