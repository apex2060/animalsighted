<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li class="nav-header">Animal Categories</li>
		<?php 
			$categories = category_list();
			$ct=count($categories);
			for($i=0; $i<$ct; $i++){
				echo '<li class="'.active('category_id='.$categories[$i]['category_id']).'"><a href="?animal=category&category_id='.$categories[$i]['category_id'].'">'.$categories[$i]['category'].'</a></li>'."\n";
			}
		?>
	</ul>
</div>