<!DOCTYPE HTML>
<html>
<head>
	<title>PHP Proof</title>
	<style>
	.code{
		border:1px dotted #F70; 
		margin:0 0 100px 0; 
		width:600px; 
		padding:15px; 
		word-wrap: break-word;
	}
	</style>
</head>
<body>
	<header style="border-bottom: 2px dashed #006;">
		<h1>PHP Proofs</h1>
		<h2>Team 4</h2>
		<p>Ryan Quinlan, MJ LaFond, Matt Spencer, Simon Bundala, Jaqueline Forman, Clifford Solomon, Ryan Grimmett</p>
	</header>
	<section>
		<?php
			/**********************************GET ALL PROOFS****************************************/
		if ($handle = opendir('phpproof')) {
			$proofs=array();
			while (false !== ($entry = readdir($handle))) {
				if(substr($entry, -4, 4)=='.php'){
					array_push($proofs, $entry);
				}
			}
		    closedir($handle);
		}
		sort($proofs);
		foreach($proofs as $proof){
			$title=ucwords(implode(' ', explode('_', substr($proof, 0, -4))));
			echo '<h3><a href="phpproof/'.$proof.'">'.$title.'</a></h3>';
			$highlighted = highlight_file('phpproof/'.$proof, true);

			echo '<div class="code">'.$highlighted.'</div>';
		}
			/****************************** END GET ALL PROOFS*************************************/
		?>
	</section>
</body>
</html>