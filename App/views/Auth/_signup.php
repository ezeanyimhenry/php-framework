<?php
use Framework\Helpers\Utility;

?>
<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
	<!-- All Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="<?= WEBSITE_AUTHOR ?>">
	<meta name="robots" content="">
	<meta name="keywords" content="<?= WEBSITE_KEYWORDS ?>">
	<meta name="description" content="<?= WEBSITE_DESCRIPTION ?>">
	<meta property="og:title" content="<?= WEBSITE_NAME . '-' . WEBSITE_DESCRIPTION ?>">
	<meta property="og:description" content="<?= WEBSITE_DESCRIPTION ?>">
	<meta property="og:image" content="Public/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">

	<!-- Page Title Here -->
	<title>Register -
		<?= WEBSITE_NAME ?>
	</title>



	<link href="Public/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
	<div class="authincation h-100">
		<div class="container-fluid h-100">
			<div class="row h-100">
				<div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Sign up your account</h3>
							<p>Sign in to your account to start using
								<?= WEBSITE_NAME ?>
							</p>
						</div>
						<?php

						if (isset($_SESSION['error'])) {
							Utility::displayAlert('error');
						}

						if (isset($_SESSION['success'])) {
							Utility::displayAlert('success');
						}
						?>
						<form action="/register" method="POST">
							<div class="mb-4">
								<label class="mb-1 text-dark">Firstname</label>
								<input type="text" class="form-control form-control" placeholder="Enter Firstname"
									id="firstname" name="firstname">
							</div>
							<div class="mb-4">
								<?php
								if (isset($_SESSION['firstname-error'])) {
									Utility::displayAlert('error','firstname-error');
								}
								?>
							</div>
							<div class="mb-4">
								<label class="mb-1 text-dark">Lastname</label>
								<input type="text" class="form-control form-control" placeholder="Enter Lastname"
									id="lastname" name="lastname">
							</div>
							<div class="mb-4">
								<?php
								if (isset($_SESSION['lastname-error'])) {
									Utility::displayAlert('error','lastname-error');
								}
								?>
							</div>
							<div class="mb-4">
								<label class="mb-1 text-dark">Username</label>
								<input type="text" class="form-control form-control" placeholder="Enter Username"
									id="username" name="username">
							</div>
							<div class="mb-4">
								<?php
								if (isset($_SESSION['username-error'])) {
									Utility::displayAlert('error','username-error');
								}
								?>
							</div>
							<div class="mb-4">
								<label class="mb-1 text-dark">Email</label>
								<input type="email" class="form-control form-control" placeholder="Enter Email"
									id="email" name="email">
							</div>
							<div class="mb-4">
								<?php
								if (isset($_SESSION['email-error'])) {
									Utility::displayAlert('error','email-error');
								}
								?>
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Password</label>
								<input type="password" id="dlab-password" class="form-control form-control"
									placeholder="Enter Password" name="password">
								<span class="show-pass eye">

									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>

								</span>
							</div>
							<div class="mb-4">
								<?php
								if (isset($_SESSION['password-error'])) {
									Utility::displayAlert('error','password-error');
								}
								?>
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Confirm Password</label>
								<input type="password" id="dlab-password" class="form-control form-control"
									placeholder="Re-Enter Password" name="confirm_password">
								<span class="show-pass eye">

									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>

								</span>
							</div>
							<div class="mb-4">
								<?php
								if (isset($_SESSION['confirm_password-error'])) {
									Utility::displayAlert('error','confirm_password-error');
								}
								?>
							</div>
							<div class="form-row d-flex justify-content-between mt-4 mb-2">
								<div class="mb-4">
									<div class="form-check custom-checkbox mb-3">
										<input type="checkbox" class="form-check-input" id="customCheckBox1"
											required="">
										<label class="form-check-label mt-1" for="customCheckBox1">I agree to the <a
												href="#">Terms and Conditions</a></label>
									</div>
								</div>
								<div class="mb-4">
									<a href="/signin" class="btn-link text-primary">Sign in</a>
								</div>
							</div>
							<div class="text-center mb-4">
								<button type="submit" name="register" class="btn btn-primary btn-block">Sign Up</button>
							</div>
							<h6 class="login-title"><span>Or continue with</span></h6>

							<div class="mb-3">
								<ul class="d-flex align-self-center justify-content-center">
									<li><a target="_blank" href="https://www.facebook.com/"
											class="fab fa-facebook-f btn-facebook"></a></li>
									<li><a target="_blank" href="https://www.google.com/"
											class="fab fa-google-plus-g btn-google-plus mx-2"></a></li>
									<li><a target="_blank" href="https://www.linkedin.com/"
											class="fab fa-linkedin-in btn-linkedin me-2"></a></li>
									<li><a target="_blank" href="https://twitter.com/"
											class="fab fa-twitter btn-twitter"></a></li>
								</ul>
							</div>
							<p class="text-center">Already registered?
								<a class="btn-link text-primary" href="/signup">Sign In</a>
							</p>
						</form>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="pages-left h-100">
						<div class="login-content">
							<a href="/"><img src="Public/images/logo-full.png" class="mb-3" alt=""></a>

							<p>Your true value is determined by how much more you give in value than you take in
								payment. ...</p>
						</div>
						<div class="login-media text-center">
							<img src="Public/images/login.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--**********************************
	Scripts
***********************************-->
	<!-- Required vendors -->
	<script src="Public/vendor/global/global.min.js"></script>
	<script src="Public/js/custom.min.js"></script>
	<script src="Public/js/dlabnav-init.js"></script>
</body>

</html>