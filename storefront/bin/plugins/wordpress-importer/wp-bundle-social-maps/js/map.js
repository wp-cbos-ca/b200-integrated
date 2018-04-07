var map;
var bounds = new google.maps.LatLngBounds();

function initialize() {
	if ( typeof center !== 'undefined' ) {
			var latlng = new google.maps.LatLng(center.lat, center.lng);
			var mapOptions = {
			zoom: zoom,
			center: latlng
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var marker = new google.maps.Marker({
			position: latlng,
			title: title,
			map: map
		});
		var infowindow = new google.maps.InfoWindow();
		mapAddListener( marker, infowindow, latlng );
	}
}

function mapAddListener( marker, infowindow, center ) {
	  google.maps.event.addListener( marker, 'click', function() {
			infowindow.setContent( contentString );
			infowindow.open( map, marker );
	  });  
}
google.maps.event.addDomListener(window, 'load', initialize);