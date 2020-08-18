<!-- google map -->
<div id="googleMap" class="map-area" style="width:100%;height:360px;">
<script>
        var lat = <?=$duan['project_lat']!='' ? $duan['project_lat']:0?>;
        var lng  = <?=$duan['project_lng']!='' ? $duan['project_lng']:0?>;
        function initMap() {
            var myLatLng = {lat: lat, lng: lng};
            var map = new google.maps.Map(document.getElementById('googleMap'), {
                zoom: 15,
                center: myLatLng,
                icon:false,
            });
            var contentString='<h4><?=$duan['project_title']?></h4><p><?=substr($duan[0]['project_introduce'],0,150)?>...</p>';
            const infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon:false,
                title: '<?=$duan['project_title']?>',
            });
            infowindow.open(map, marker);
            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }
    </script>
</div>
<!-- google map -->