<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
		<div class="row-fluid">
			<div class="span3">
				<?php include('mvc/view/partials/sidebar.php'); ?>
			</div><!--/span-->
			<div class="span9">
				<div class="hero-unit">
					<h1>Welcome <?php echo $form['first_name'].' '.$form['last_name']; ?>!!!</h1>
					<p>We are glad you are here!</p>
				</div>
			</div><!--/span-->
		</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>