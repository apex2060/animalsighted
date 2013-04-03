<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
<?php
if(user('auth')==1){
	$admin='<td><btn class="btn delete btn-error">Delete</button></td>';
}
?>
<div class="row-fluid">
	<div class="span3">
		<?php include('mvc/view/partials/sidebar.php'); ?>
		<?php include('mvc/view/partials/category_sidebar.php'); ?>
	</div><!--/span-->
	<div class="span9">
		<div class="hero-unit">
			<h1>Animals</h1>
		</div>
		<div id="notifications"></div>
		<table class="table table-striped well">
			<thead>
				<tr>
					<td>Category</td>
					<td>Animal</td>
				</tr>
			</thead>
			<?php
				$animal_list = animal_list('c.category');
				$ct=count($animal_list);
				for($i=0; $i<$ct; $i++){
					echo '
						<tr data-animal_id="'.$animal_list[$i]['animal_id'].'">
							<td class="category"><a href="?animal=category&category_id='.$animal_list[$i]['category_id'].'">'.$animal_list[$i]['category'].'</a></td>
							<td class="name"><a href="?animal=details&animal_id='.$animal_list[$i]['animal_id'].'">'.$animal_list[$i]['name'].'</a></td>
							'.$admin.'
						</tr>
					';
				}
			?>
		</table>
	</div><!--/span-->
</div><!--/row-->
<script>
$('.delete').click(function(){
	var row = $(this).closest('tr');
	var animal_id = $(row).data('animal_id');
	var animal = $(this).closest('tr').children('.name').text();
	if(confirm('Are you sure you want to delete the: '+animal)){
		$.post( 'mvc/model/api/animal/delete_animal.php', {'animal_id': animal_id}, function(data) { 
			iAlert('notifications', data['status'], data['message']);
			if(data['status']=='success'){
				$(row).remove();
			}
		}, 'JSON');
	}
});
</script>
<?php include('mvc/view/partials/footer.php'); ?>