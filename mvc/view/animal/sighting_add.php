<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
<div class="row-fluid">
	<div class="span3">
		<?php include('mvc/view/partials/sidebar.php'); ?>
	</div><!--/span-->
	<div class="span9">
		<div class="hero-unit">
			<h1>Report a sighting!</h1>
			<br>
			<!-- <div id="map" style="text-align:center;"></div> -->
		</div>
		<div class="row-fluid">
			<div class="span12">
				<form action="?animal=add" method="post" class="form-horizontal">
					<input type="hidden" id="lat" name="lat">
					<input type="hidden" id="lng" name="lng">
					<?php drawError('geo'); ?>
					<h2>Animal Information</h2>
					<div class="control-group">
						<label class="control-label" for="category_id">category</label>
						<div class="controls">
							<select id="category_id" name="category_id">
								<option value="">Select A Category</option>
							</select>
							<?php drawError('category_id'); ?>
						</div>
						<div class="controls">
							<input type="text" id="category" name="category" placeholder="Add New" value="<?php echo $form['category']; ?>">
							<?php drawError('category'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="animal_id">Name</label>
						<div class="controls">
							<select id="animal_id" name="animal_id">
								<option value="">Select An Animal</option>
							</select>
							<?php drawError('animal_id'); ?>
						</div>
						<div class="controls">
							<input type="text" id="name" name="name" placeholder="Add New" value="<?php echo $form['name']; ?>">
							<?php drawError('name'); ?>
						</div>
					</div>
<!-- 					<div class="control-group">
						<label class="control-label" for="img">Add Picture</label>
						<div class="controls">
							<input type="file" id="img" name="img">
							<?php drawError('img'); ?>
						</div>
					</div> -->
					<div class="control-group">
						<label class="control-label" for="note">Note</label>
						<div class="controls">
							<textarea id="note" name="note"><?php echo $form['note']; ?></textarea>
							<?php drawError('note'); ?>
						</div>
					</div>
					<input type="submit" class="btn" id="submit" name="submit" value="Add Sighting">
				</form>
			</div><!--/span-->
		</div><!--/row-->
	</div><!--/span-->
</div><!--/row-->

<?php include_once('mvc/view/partials/scripts.php'); ?>
<script src="/js/validation.js"></script>
<script>
	$("input,select,textarea").not("[type=submit], [type=hidden]").jqBootstrapValidation();
	navigator.geolocation.getCurrentPosition(function(position){
		var lat = position.coords.latitude;
		var lng = position.coords.longitude;
		console.log(lat, lng);
		$('#lat').val(lat);
		$('#lng').val(lng);
		// var src='http://maps.googleapis.com/maps/api/staticmap?center='+lat+','+lng+'&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C'+lat+','+lng+'&sensor=false';
		// $('#map').html('<img src="'+src+'">');
	});

	// get list of categories
	$.getJSON('mvc/model/json_categories.php', function(data) {
		for(var i=0; i<data.length; i++){
			$('#category_id').append('<option value="'+data[i]['category_id']+'">'+data[i]['category']+'</option>');
		}
	});

	$('#category_id').on('change', function(){
		var categoryId = $(this).val();
		$.getJSON('mvc/model/json_animals.php?categoryId='+categoryId, function(data) {
			for(var i=0; i<data.length; i++){
				$('#animal_id').append('<option value="'+data[i]['animal_id']+'">'+data[i]['name']+'</option>');
			}
		});
	});
</script>
<?php include('mvc/view/partials/footer.php'); ?>
<?php $_SESSION['ERROR']=[]; ?>