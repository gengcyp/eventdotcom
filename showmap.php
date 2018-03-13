<script>
//get lat/long
var latitude = parseFloat("<?php echo $lat; ?>"+0);
var longitude = parseFloat("<?php echo $lon; ?>"+0);
//show or hide map
if ((latitude == 0) && (longitude==0)){
  $('#map').hide();
}
//init google map
function initMap() {
  var place = {lat: latitude, lng: longitude};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: place
  });
  var trafficLayer = new google.maps.TransitLayer();
  trafficLayer.setMap(map);
  var marker = new google.maps.Marker({
    position: place,
    map: map
  });
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Y0BtPqRLeQtOptrbHKdaLXTV64UPTuc&callback=initMap">
</script>
