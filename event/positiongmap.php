<?php

?>
<script id="maps">
//get lat/long
var latitude = parseFloat("<?php echo $lat; ?>"+0);
var longitude = parseFloat("<?php echo $lon; ?>"+0);
var marker,map;
var point = {lat:latitude ,lng:longitude};

function setPoint(newlat,newlng){
  point = {lat: newlat,lng:newlng};
}
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
        center: point
    });

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: point,
        title: ""
    });
    marker.addListener('click', toggleBounce);
    marker.addListener('drag',setFormLatLng);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
 function setFormLatLng(){
  $("#lat").val(marker.position.lat());
  $("#lng").val(marker.position.lng());
 }
 function setMapCenter(lat,lng){
   var center = new google.maps.LatLng(lat, lng);
   map.panTo(center);
 }
 function moveMarkerToCenter(){
   marker.setPosition( new google.maps.LatLng( map.getCenter().lat(), map.getCenter().lng() ) );
 }


</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsdxMxOvyYQfWbIiNtJJTRHtoM54ZlW5g&callback=initMap">
</script>
