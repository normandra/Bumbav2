<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Login</title>

	<!-- css -->
	<link href="css/base.min.css" rel="stylesheet">

	<!-- favicon -->
	<!-- ... -->

	<!-- ie -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body class="avoid-fout">
	<div class="avoid-fout-indicator avoid-fout-indicator-fixed">
		<div class="progress-circular progress-circular-alt progress-circular-center">
			<div class="progress-circular-wrapper">
				<div class="progress-circular-inner">
					<div class="progress-circular-left">
						<div class="progress-circular-spinner"></div>
					</div>
					<div class="progress-circular-gap"></div>
					<div class="progress-circular-right">
						<div class="progress-circular-spinner"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header class="header">
		<span class="header-logo">Bumba</span>
	</header>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
					<section class="content-inner">
						<div class="card-wrap">
							<div class="card">
								<div class="card-main">
									<div class="card-header">
										<div class="card-inner">
											<h1 class="card-heading">Login</h1>
										</div>
									</div>
									<div class="card-inner">
										<p class="text-center">
											<span class="avatar avatar-inline avatar-lg">
												<img alt="Login" src="images/users/avatar-001.jpg">
											</span>
										</p>
										<form class="form" action="login.php" method="post">
											<div class="form-group form-group-label">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<label class="floating-label" for="login-username">Username</label>
														<input class="form-control" id="login-username" type="text" name="username">
													</div>
												</div>
											</div>
											<div class="form-group form-group-label">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<label class="floating-label" for="login-password">Password</label>
														<input class="form-control" id="login-password" type="password" name="password">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<button class="btn btn-block btn-blue waves-button waves-effect waves-light" type="submit">Sign In</button>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<div class="checkbox checkbox-adv">
															<label for="login-remember">
																<input class="access-hide" id="login-remember" name="login-remember" type="checkbox">Stay signed in
															</label>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix">
							<p class="margin-no-top pull-left"><a href="javascript:void(0)">Need help?</a></p>
							<p class="margin-no-top pull-right"><a href="javascript:void(0)">Create an account</a></p>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p>Bumba</p>
		</div>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/base.min.js"></script>
</body>
</html>

<?php 
session_start(); 
?>

<?php
// Error reporting:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
?>

<?php
$username = $_POST["username"]; 
$password = md5($_POST["password"]); 

$abfrage = "SELECT user_username, user_password FROM users WHERE user_username LIKE '$username' LIMIT 1"; 
$ergebnis = mysql_query($abfrage); 
$row = mysql_fetch_object($ergebnis);

if($row->user_password == $password) 
    { 
    $_SESSION["username"] = $username; 
    header("Location: index.php");
    } 
else 
    { 
    echo "Benutzername und/oder Passwort waren falsch. <a href=\"login.php\">Login</a>";
    }

?>