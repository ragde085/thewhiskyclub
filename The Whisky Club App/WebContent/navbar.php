<?php
if (!securePage($_SERVER['PHP_SELF'])) {die();
}
?>
<div>
	<nav id="dasMenu" class="navbar navbar-collapse navbar-default navbar-inverse navbar-static-top offcanvas" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">The Whisky Club</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="site-navbar">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="pricesTable.php">Prices<span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<div class="navbar-right">
					<?php
					if (isUserLoggedIn()) {
						echo "
							<div class = 'btn-group navbar-btn'>
								<button type = 'button' class = 'btn btn-primary dropdown-toggle' data-toggle = 'dropdown'>
								<i class='fa fa-user fa-fw'></i>" . $loggedInUser -> displayname . "
								<span class = 'caret'></span>
								</button>
								<ul class = 'dropdown-menu' role = 'menu'>
									<li>
										<a href='/account.php'><i class='fa fa-pencil fa-fw'></i> Edit</a>
									</li>
									<li>
										<a href='#'><i class='fa fa-trash-o fa-fw'></i> Delete</a>
									</li>
									<li class='divider'></li>
									<li>
										<a id='logout' href='#'><i class='i'></i> Log Out</a>
									</li>
								</ul>
							</div>
							";
					} else {
						echo "<div ng-include src=\"'login.html'\"></div>";
					}
					?>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<script>
		$("#logout").click(function() {
			window.location.href = 'logout.php';
		});
	</script>
</div>
<!-- nav header -->
