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
    <link rel="shortcut icon" type="image/png" href="Public/images/favicon.png">

    <!-- Page Title Here -->
    <title>Forgot Password -
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
                            <h3 class="title">Forgot Password</h3>
                            <p>Confirm your email to reset your password</p>
                        </div>
                        <?php
                        // Check if an error message exists and display it
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                            // Clear the error message so it's not displayed again
                            unset($_SESSION['error']);
                        }

                        // Check if a success message exists and display it
                        if (isset($_SESSION['success'])) {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
                            // Clear the success message so it's not displayed again
                            unset($_SESSION['success']);
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label class="mb-1 text-dark">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control"
                                    placeholder="hello@example.com">
                            </div>
                                <div class="row">
                                    <button class="btn btn-secondary" type="button" id="send-token-button"
                                        onclick="sendPasswordToken()"><span>Send Code</span><span><img src="Public/icons/loading.gif" alt="Loading..." id="loading-spinner"
                                            style="display:none; max-height: 20px; "/></span>
                                        </button>
                                    <div id="countdown-timer" style="display:none;">
                                        Resend code in: <span id="countdown-minutes">02</span>:<span
                                            id="countdown-seconds">00</span>
                                    </div>
                                </div>
                            <div id="message"></div>
                            <div class="row" id="codefield" style="display: none;">
                                <div class="col-12 mb-4">
                                    <label class="mb-1 text-dark">Confirmation Code</label>
                                    <input type="text" id="token" name="token" class="form-control form-control"
                                        placeholder="Enter token sent to your email">
                                </div>
                                <button class="btn btn-primary" type="button" onclick="verifyPasswordToken()">
                                    Submit
                                </button>
                                <div id="verifymessage"></div>
                            </div>
                            <!-- <div class="text-center mb-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div> -->
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
                            <p class="text-center">Not registered?
                                <a class="btn-link text-primary" href="/signup">Register</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="pages-left h-100">
                        <div class="login-content">
                            <a href="index.html"><img src="Public/images/logo-full.png" class="mb-3" alt=""></a>

                            <p>Your true value is determined by how much more you give in value than you take in
                                payment. ...</p>
                        </div>
                        <div class="login-media text-center">
                            <img src="Public/images/login-1.png" class="w-50" alt="">
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

    <script>
        function sendPasswordToken() {
            $('#loading-spinner').css('display', 'inline');
            // Get the user's email from the input field
            var email = document.getElementById('email').value;

            $('#send-token-button').prop('disabled', true);


            // Update the countdown timer
            var countdownMinutes = 2; // 2 minutes
            var countdownSeconds = 0;

            function updateCountdown() {
                // Display the remaining time in the countdown elements
                $('#countdown-minutes').text(countdownMinutes.toString().padStart(2, '0'));
                $('#countdown-seconds').text(countdownSeconds.toString().padStart(2, '0'));

                // Update the countdown
                if (countdownMinutes === 0 && countdownSeconds === 0) {
                    // Countdown reached 0, re-enable the button
                    $('#send-token-button').prop('disabled', false);
                    $('#countdown-timer').hide(); // Hide the countdown timer
                } else {
                    // Continue counting down
                    if (countdownSeconds === 0) {
                        countdownMinutes--;
                        countdownSeconds = 59;
                    } else {
                        countdownSeconds--;
                    }
                    setTimeout(updateCountdown, 1000); // Update every 1 second
                }
            }



            // Make an AJAX request to your server to send the password reset token
            $.ajax({
                url: '/forgot-password/reset', // Adjust the URL
                method: 'POST',
                contentType: 'application/json',
                // data: { email: email },
                data: JSON.stringify({ email: email }),
                success: function (response) {
                    $('#loading-spinner').css('display', 'none');

                    if (response.success) {
                        $('#codefield').css('display', 'block');
                        $('#message').html('<div class="alert alert-success" role="alert">Confirmation code sent to your email</div>');
                        setTimeout(function () {
                            $('#message').empty(); // Remove the content of the message element
                        }, 5000);
                        $('#countdown-timer').css('display', 'block');
                        // Start the countdown
                        updateCountdown();

                    } else {
                        $('#loading-spinner').css('display', 'none');
                        $('#send-token-button').prop('disabled', false);
                        $('#message').html('<div class="alert alert-danger" role="alert">Error: ' + response.error + '</div>');
                        setTimeout(function () {
                            $('#message').empty(); // Remove the content of the message element
                        }, 5000);
                    }
                },
                error: function () {
                    $('#loading-spinner').css('display', 'none');
                    $('#send-token-button').prop('disabled', false);
                    $('#message').html('<div class="alert alert-danger" role="alert">Failed to send Confirmation code. Please try again later.</div>');
                    setTimeout(function () {
                        $('#message').empty(); // Remove the content of the message element
                    }, 5000);
                }
            });
        }

        function verifyPasswordToken() {
            // Get the user's email from the input field
            var email = document.getElementById('email').value;
            var token = document.getElementById('token').value;

            // Make an AJAX request to your server to send the password reset token
            $.ajax({
                url: '/verify-token', // Adjust the URL
                method: 'POST',
                contentType: 'application/json',
                // data: { email: email },
                data: JSON.stringify({ email: email, token: token }),
                success: function (response) {
                    if (response.success) {
                        // Calculate the expiration time (10 minutes from now)
                        var expirationDate = new Date();
                        expirationDate.setTime(expirationDate.getTime() + 10 * 60 * 1000); // 10 minutes in milliseconds

                        // Set a cookie with the token and the calculated expiration time
                        document.cookie = 'email=' + email + '; expires=' + expirationDate.toUTCString() + '; path=/';
                        document.cookie = 'token=' + token + '; expires=' + expirationDate.toUTCString() + '; path=/';
                        window.location.href = '/reset-password';
                    } else {
                        $('#verifymessage').html('<div class="alert alert-danger" role="alert">Error: ' + response.error + '</div>');
                        setTimeout(function () {
                            $('#verifymessage').empty(); // Remove the content of the message element
                        }, 5000);
                    }
                },
                error: function () {
                    $('#verifymessage').html('<div class="alert alert-danger" role="alert">Failed to verify Confirmation code. Please try again later.</div>');
                    setTimeout(function () {
                        $('#verifymessage').empty(); // Remove the content of the message element
                    }, 5000);
                }
            });
        }

    </script>
</body>

</html>