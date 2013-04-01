<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="/"></a>
			<div class="nav-collapse collapse">
				<p class="navbar-text pull-right">
					<?php if($_SESSION['valid']){ ?>
						<a href="?account=manage" class="navbar-link"><?php echo user('first_name'); ?></a>
						| <a href="?account=logout" class="navbar-link">Logout</a>
					<?php }else{ ?>
						<a href="?account=login" class="navbar-link">Login</a>
					<?php } ?>
				</p>
				<ul class="nav">
					<li class="active"><a href="/">Home</a></li>
					<!-- <li><a href="?site=about">About</a></li>
					<li><a href="?site=contact">Contact</a></li> -->
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<?php drawError('site'); ?>
<div class="container-fluid">