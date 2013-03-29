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
			<h1><? echo $animal_details['name']; ?></h1>
			<h3><? echo $animal_details['category']; ?></h3>
			<div id="map_canvas" class="map well" style="height:300px;"></div>
		</div>
		<div class="row-fluid">
			<div id="about_div" class="span6 well">
				<h2>About</h2>
				<?php if(user('auth')==1){ ?>
					<textarea id="about_input" class="span12" style="height:250px;"><?php echo $animal_details['about']; ?></textarea>
					<button id="about_update" class="btn pull-right">Update</button>
				<?php } else { ?>
					<p><?php echo $animal_details['about']; ?></p>
				<?php } ?>
			</div>
			<div id="img_div" class="span6 well">
				<?php if(user('auth')==1){ ?>
					<img id="animal_pic" class="img-rounded" src="<?php echo $animal_details['src']; ?>">
					<hr>
					<input type="text" id="img_input" class="span12" placeholder="Image URL" value="<?php echo $animal_details['src']; ?>">
					<button id="img_update" class="btn pull-right">Update</button>
				<?php } else { ?>
					<img id="animal_pic" class="img-polaroid" src="<?php echo $animal_details['src']; ?>">
				<?php } ?>
			</div>
		</div>
	</div><!--/span-->
</div><!--/row-->

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/js/mapui/jquery.ui.map.min.js"></script>
<script>
var animal_id=<?php echo $url['animal_id']; ?>;

navigator.geolocation.getCurrentPosition(function(position){
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
	$('#map_canvas').gmap({ 'center':new google.maps.LatLng(lat,lng), 'callback': function() {
		$.getJSON( 'mvc/model/json_animal_map.php', 'animal_id='+animal_id, function(data) { 
			$.each( data, function(i, m) {
				var $marker = $('#map_canvas').gmap('addMarker', {'position': new google.maps.LatLng(m.lat, m.lng), 'bounds': true});
				$marker.click(function() {
					$('#map_canvas').gmap('openInfoWindow', {'content': '<p>'+m.note+'</p><h4>'+m.created_on+'</h4><h3>'+m.first_name+'</h3>'}, this);
				});
			});
		});
	}});
});

$('#about_update').click(function(){
	var about = $('#about_input').val();
	$.post( 'mvc/model/api/animal/update_about.php', {'animal_id': animal_id, 'about': about}, function(data) { 
		iAlert('about_div', data['status'], data['message']);
	}, 'JSON');
});
$('#img_input').on('change', function(){
	var src = $(this).val();
	$('#animal_pic').attr('src', src);
	$.post( 'mvc/model/api/animal/update_img.php', {'animal_id': animal_id, 'src': src}, function(data) { 
		iAlert('img_div', data['status'], data['message']);
	}, 'JSON');
});
</script>
<?php include('mvc/view/partials/footer.php'); ?>