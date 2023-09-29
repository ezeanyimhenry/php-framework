<?php require_once('config.php'); ?>
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
	<meta property="og:title" content="Page not found! - <?= WEBSITE_NAME ?>">
	<meta property="og:description" content=" <?= WEBSITE_DESCRIPTION ?>">
	<meta property="og:image" content="Public/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="Public/images/favicon.png">

	<!-- Page Title Here -->
	<title>Page not found! - <?= WEBSITE_NAME ?></title>
	
	
	
     <link href="Public/css/style.css" rel="stylesheet">
    
</head>

<body class="vh-100">
   <div class="authincation h-100" style="background-image: url(Public/images/student-bg.jpg); background-repeat:no-repeat; background-size:cover;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-input-content  error-page">
						<h1 class="error-text text-primary">404</h1>
						<h4>The page you were looking for is not found!</h4>
						<p>You may have mistyped the address or the page may have moved.</p>
                        <a class="btn btn-primary" href="/">Back to Home</a>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
					<img  class="w-100 move-2" src="Public/images/error.png" alt="">
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