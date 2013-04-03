<?php include('mvc/view/partials/head.php'); ?>
<?php include('mvc/view/partials/header.php'); ?>
	<div class="row-fluid">
		<div class="span3">
			<?php include('mvc/view/partials/sidebar.php'); ?>
		</div><!--/span-->
		<div class="span9">
			<div class="hero-unit">
				<h1>Signup!</h1>
			</div>
			<div class="row-fluid">
				<div class="span12">
					
					<form action="?account=signup" method="post" class="form-horizontal">
						<h2>Account Information</h2>
						<div class="control-group">
							<label class="control-label" for="username">Username</label>
							<div class="controls">
								<input type="text" id="username" name="username" placeholder="Username" value="<?php echo $form['username']; ?>" required>
								<?php drawError('username'); ?>
								<?php drawError('site'); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<input type="password" id="password" name="password" placeholder="Password" required>
								<?php drawError('password'); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password2">Re-Type Password</label>
							<div class="controls">
								<input type="password" id="password2" name="password2" placeholder="Password" data-validation-match-match="password" required>
								<?php drawError('password2'); ?>
							</div>
						</div>

						
						<hr><h2>Personal Information</h2>
						<div class="control-group">
							<label class="control-label" for="first_name">First Name</label>
							<div class="controls">
								<input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $form['first_name']; ?>" required>
								<?php drawError('first_name'); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="last_name">Last Name</label>
							<div class="controls">
								<input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $form['last_name']; ?>" required>
								<?php drawError('last_name'); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="email">Email</label>
							<div class="controls">
								<input type="email" id="email" name="email" placeholder="Email" value="<?php echo $form['email']; ?>" required>
								<?php drawError('email'); ?>
							</div>
						</div>
						<input type="submit" class="btn" id="submit" name="submit" value="Create Account">
					</form>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/span-->
	</div><!--/row-->

	<?php include_once('mvc/view/partials/scripts.php'); ?>
	<script src="/js/validation.js"></script>
	<script>
		$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
	</script>
<?php include('mvc/view/partials/footer.php'); ?>