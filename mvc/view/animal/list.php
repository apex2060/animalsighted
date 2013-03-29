<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
<div class="row-fluid">
	<div class="span3">
		<?php include('mvc/view/partials/sidebar.php'); ?>
		<?php include('mvc/view/partials/category_sidebar.php'); ?>
	</div><!--/span-->
	<div class="span9">
		<div class="hero-unit">
			<h1>Animals</h1>
		</div>
		<table class="table table-striped">
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
						<tr>
							<td><a href="?animal=category&category_id='.$animal_list[$i]['category_id'].'">'.$animal_list[$i]['category'].'</a></td>
							<td><a href="?animal=details&animal_id='.$animal_list[$i]['animal_id'].'">'.$animal_list[$i]['name'].'</a></td>
						</tr>
					';
				}
			?>
		</table>
	</div><!--/span-->
</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>