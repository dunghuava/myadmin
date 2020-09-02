<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjwJQRCuf970OLe6UuBiMvg_DyYW2PL6Y&callback=initMap&libraries=drawing,places"></script>

<script>
// The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
// to the base of the flagpole.
var beaches   = <?php echo json_encode($project_locate) ?>;

// console.log(beaches.length);
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: { lat: 10.762622, lng: 106.660172 }
  });
  setMarkers(map);
}
// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.

// const beaches = []

// for (let i = 0; i < beaches.length; i++) {

// console.log(beaches[i]['title']);
// }

// $.each(list_locate, function (i, elem) {
//   beaches[] = [
//     [elem['title'], elem['lat'], elem['lng'], i+1],
//   ];
// });


function setMarkers(map) {
  // Adds markers to the map.
  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.
  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  const image = {
    url:
    "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  const shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: "poly"
  };

  for (var i = 0; i < beaches.length; i++) {
    console.log(i);
    // const beach = beaches[i];
    new google.maps.Marker({
      position: { lat: Number(beaches[i]['lat']), lng: Number(beaches[i]['lng']) },
      map: map,
      icon: '',

      shape: shape,
      title: beaches[i]['title'],
      zIndex: i+1
    });
  }
}
</script>