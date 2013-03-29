<?php
if($_GET['animal']=='add'){
	if($_POST['submit'])
		$result=animal_sighting($form);
	if($result['status']=='success')
		include('mvc/view/animal/sighting_added.php');
	else
		include('mvc/view/animal/sighting_add.php');
}else if($_GET['animal']=='details'){
	include('mvc/view/animal/details.php');
}else if($_GET['animal']=='list'){
	include('mvc/view/animal/list.php');
}else if($_GET['animal']=='category'){
	include('mvc/view/animal/category.php');
}
?>