<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
<div class="row-fluid">
	<div class="span3">
		<?php include('mvc/view/partials/sidebar.php'); ?>
	</div><!--/span-->
	<div class="span9">
		<div class="hero-unit">
			<h1>Login!</h1>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<h2>Account Information</h2>
				<form class="form-horizontal" method="post" action="?account=login">
					<div class="control-group">
						<label class="control-label" for="username">Username</label>
						<div class="controls">
							<input type="text" id="username" name="username" placeholder="Username">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" id="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<a class="btn" href="?account=signup">Signup</a>
							<input type="submit" class="btn" id="submit" name="submit" value="Login">
						</div>
					</div>
				</form>
			</div><!--/span-->
		</div><!--/row-->
	</div><!--/span-->
</div><!--/row-->
<?php include('mvc/view/partials/footer.php'); ?>