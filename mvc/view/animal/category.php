<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
<?php $category_details = category_details($url['category_id']);?>
		<div class="row-fluid">
			<div class="span3">
				<?php include('mvc/view/partials/sidebar.php'); ?>
				<?php include('mvc/view/partials/category_sidebar.php'); ?>
			</div><!--/span-->
			<div class="span9">
				<div class="hero-unit">
					<h1><?php echo $category_details['category']; ?></h1>
				</div>
				<?php 
					$animals = animal_list(false, $url['category_id']);
					$ct=count($animals);

					echo '<div class="row-fluid">'."\n";
					for($i=0; $i<$ct; $i++){
						if(($i+1)%4==0){
							echo '</div><div class="row-fluid">'."\n";
						}
						echo 	'<div class="span4">'."\n";
						echo	'	<h2 class="text-center"><a href="?animal=details&animal_id='.$animals[$i]['animal_id'].'">'.$animals[$i]['name'].'</a></h2>'."\n";
						if(strlen($animals[$i]['src'])>0)
						echo	'	<img class="img-polaroid" src="'.$animals[$i]['src'].'"><br>'."\n";
						else if($animals[$i]['lat'])
						echo	'	<img class="img-polaroid" src="'.map($animals[$i]['lat'], $animals[$i]['lng']).'"><br>'."\n";
						echo	'	<p>'.$animals[$i]['about'].'</p>'."\n";
						echo	'</div><!--/span-->'."\n";
					}
					echo '</div>'."\n";
				?>
			</div><!--/span-->
		</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>