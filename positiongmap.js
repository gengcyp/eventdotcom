var marker;

var point = {lat:13.7454143 ,lng:100.4436804};

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
    	zoom: 10,
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
	console.log(marker.position.lat()+","+marker.position.lng());
 }

// function setMarker(){
//     var lati="<?php echo getLat() ?>";
//     var long="<?php echo getLong() ?>";
//     var point = {lat: lati, lng: long};
//     marker.setCenter(point);
// }

function setFormLatLng(){
	$("#lat").val(marker.position.lat());
	$("#lng").val(marker.position.lng());
}


