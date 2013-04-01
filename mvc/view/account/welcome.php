<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
		<div class="row-fluid">
			<div class="span3">
				<?php include('mvc/view/partials/sidebar.php'); ?>
			</div><!--/span-->
			<div class="span9">
				<div class="hero-unit">
					<h1>Welcome <?php echo user('first_name').' '.user('last_name'); ?>!!!</h1>
					<p>We are glad you are here!</p>
					<p>If you are looking at an animal right now, <a href="?animal=add" class="btn btn-mini" title="Add a shighting">click here</a> to tell us now.</p>
					<p>If you want to manage your settings <a href="?account=manage" class="btn btn-mini" title="Manage settings">Click Here</a></p>
				</div>
			</div><!--/span-->
		</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>