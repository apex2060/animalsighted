<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
<?php $animal_details=animal_details($url['animal_id']); ?>
<div class="row-fluid">
	<div class="span3">
		<?php include('mvc/view/partials/sidebar.php'); ?>
		<?php include('mvc/view/partials/category_sidebar.php'); ?>
	</div><!--/span-->
	<div class="span9">
		<div class="hero-unit">
			<div id="map_canvas" class="map well" style="height:300px;"></div>
		</div>
		</div>
	</div><!--/span-->
</div><!--/row-->

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/js/mapui/jquery.ui.map.min.js"></script>
<script>

navigator.geolocation.getCurrentPosition(function(position){
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
	$('#map_canvas').gmap({ 'center':new google.maps.LatLng(lat,lng), 'callback': function() {
		$.getJSON( 'mvc/model/json_sighting_map.php', function(data) { 
			$.each( data, function(i, m) {
				var $marker = $('#map_canvas').gmap('addMarker', {'position': new google.maps.LatLng(m.lat, m.lng), 'bounds': true});
				$marker.click(function() {
					$('#map_canvas').gmap('openInfoWindow', {'content': '<h3>'+m.name+'</h3><h4>'+m.created_on+'</h4><p>'+m.first_name+'</p>'}, this);
				});
			});
		});
	}});
});

</script>
<?php include('mvc/view/partials/footer.php'); ?>