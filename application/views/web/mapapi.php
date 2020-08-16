<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<div style="width:100%;" id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&callback=initMap&libraries=&v=weekly" defer></script>
<script>
    // The following example creates complex markers to indicate project_locate near
    // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
    // to the base of the flagpole.

    function initMap() {
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: { lat: -33.9, lng: 151.2 }
    });
    setMarkers(map);
    }
    // Data for the markers consisting of a name, a LatLng and a zIndex for the
    // order in which these markers should display on top of each other.

    function setMarkers(map) {
    // Adds markers to the map.
    // Marker sizes are expressed as a Size of X,Y where the origin of the image
    // (0,0) is located in the top left of the image.
    // Origins, anchor positions and coordinates of the marker increase in the X
    // direction to the right and in the Y direction down.
    const image = {
        url:"<?=base_url('dist/marker.png')?>",
        // This marker is 20 pixels wide by 32 pixels high.
    };
    // Shapes define the clickable region of the icon. The type defines an HTML
    // <area> element 'poly' which traces out a polygon as a series of X,Y points.
    // The final coordinate closes the poly by connecting to the first coordinate.
    const shape = {
        coords: [1, 1, 1, 20, 18, 20, 18, 1],
        type: "poly"
    };

    for (let i = 0; i < project_locate.length; i++) {
        const project = project_locate[i];
        new google.maps.Marker({
        position: { lat: project[1], lng: project[2] },
        map,
        icon: image,

        shape: shape,
        title: project[0],
        zIndex: project[3]
        });
    }
    }
</script>