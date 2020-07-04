<div class="wrapper">
	<!-- header -->
	<header>
		<!-- navigation -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= base_url() ?>home/index"><img class="img-responsive" src="<?= base_url() ?>img/logo.png" alt="Logo" /></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?= base_url() ?>home/formlogin">Login</a></li>
						<li><a href="<?= base_url() ?>home/about">About</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<div class="banner">
		<div class="container">
			<div class="login-area">
				<h3>Form Login</h3>
				<form role="form" action="<?= base_url() ?>admin/login" method="POST">
					<div class="form-group">
						<input type="text" name="user_name" class="form-control" placeholder="Username" autofocus autocomplete="off">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<br>
					<button type="submit" class="btn btn-default">Login</button>
				</form>
			</div>
		</div>
	</div>
	<!-- banner end -->
	<!-- footer -->
	<footer class="ffoot">
		<div class="container">
			<p class="copy-right">Halaman Ini modifikasi dari template Bloger yang di Desain oleh : <a href="https://www.indiowebsolution.in/portfolio.html">IndioWeb</a> &copy; 2014</p>
		</div>
	</footer>

</div>