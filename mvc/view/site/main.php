<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
		<div class="row-fluid">
			<div class="span3">
				<?php include('mvc/view/partials/sidebar.php'); ?>
				<?php include('mvc/view/partials/category_sidebar.php'); ?>
			</div><!--/span-->
			<div class="span9">
				<div class="hero-unit">
					<h1>Animal Sighted!</h1>
					<p>Find your favorite animals right here in yellowstone!  This is more than just an interactive guidebook, we make it possible for you to share your experiences with others.</p>
					<?php if(!user('user_id')) { ?>
						<p><a href="?account=signup" class="btn btn-primary btn-large">Signup Now! &raquo;</a></p>
					<?php } ?>
				</div>
				<?php 
					$animals = animal_list();
					$ct=count($animals);

					echo '<div class="row-fluid">'."\n";
					for($i=0; $i<$ct; $i++){
						if($i%3==0){
							echo '</div><div class="row-fluid">'."\n";
						}
						echo 	'<div class="span4">'."\n";
						echo	'	<h2 class="text-center"><a href="?animal=details&animal_id='.$animals[$i]['animal_id'].'">'.$animals[$i]['name'].'</a></h2>'."\n";
						if(strlen($animals[$i]['src'])>0)
						echo	'	<a href="?animal=details&animal_id='.$animals[$i]['animal_id'].'"><img class="img-polaroid" alt="'.$animals[$i]['name'].'" src="'.$animals[$i]['src'].'"></a><br>'."\n";
						else if($animals[$i]['lat'])
						echo	'	<a href="?animal=details&animal_id='.$animals[$i]['animal_id'].'"><img class="img-polaroid" alt="'.$animals[$i]['name'].'" src="'.map($animals[$i]['lat'], $animals[$i]['lng']).'"></a><br>'."\n";
						echo	'	<p>'.$animals[$i]['about'].'</p>'."\n";
						echo	'</div><!--/span-->'."\n";
					}
					echo '</div>'."\n";
				?>
			</div><!--/span-->
		</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>