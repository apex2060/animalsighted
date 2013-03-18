<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
		<div class="row-fluid">
			<div class="span3">
				<?php include('mvc/view/partials/sidebar.php'); ?>
			</div><!--/span-->
			<div class="span9">
				<div class="hero-unit">
					<h1>ERROR!!!</h1>
					<h3>Sorry for the trouble!</h3>
					<p><?php drawError('message'); ?></p>
				</div>
			</div><!--/span-->
		</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>