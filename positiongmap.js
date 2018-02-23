var marker;
var bkk = {lat: 13.7244416, lng: 100.3529084};

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
    	zoom: 13,
        center: bkk
    });

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: bkk,
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
	// console.log(marker.position.lat()+","+marker.position.lng());
 }

function setFormLatLng(){
	$("#lat").val(marker.position.lat());
	$("#lng").val(marker.position.lng());
}

// function testNewPHP(){
// 	var lat = marker.position.lat();
// 	var lng = marker.position.lng();

// 	xmlhttp = new XMLHttpRequest();
// 	lat = "lat=" + encodeURIComponent(lat);
// 	lng = "lng=" + encodeURIComponent(lng);

// 	xmlhttp.open("POST","newevent.php", true);
// 	xmlhttp.onreadystatechange=function(){
//     	if (xmlhttp.readyState == 4){
//         	if(xmlhttp.status == 200){
//         	    alert (xmlhttp.responseText);
//         	}
//     	}
// 	};
// 	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// 	xmlhttp.send(lat);
// 	xmlhttp.send(lng);

// }
