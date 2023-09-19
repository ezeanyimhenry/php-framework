<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Multi-purpose admin dashboard template that especially build for programmers."
    />
    <title>
      Page not found! - <?= WEBSITE_NAME ?>
    </title>
    <link rel="shortcut icon" href="Public/images/favicon.png" />
    <link rel="stylesheet" href="Public/assets/css/style8a4f.css?v1.1.0" />
  </head>
  <body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
      <div class="nk-main">
        <div class="nk-wrap align-items-center justify-content-center">
          <div class="container">
            <div class="nk-block">
              <div class="nk-block-content wide-sm text-center mx-auto">
                <img src="Public/images/error/b.png" alt="" class="mb-5" />
                <h2 class="nk-error-title mb-2">OOPS! Page not found!</h2>
                <p class="nk-error-text">
                  We are very sorry for inconvenience. It looks like you’re try
                  to access a page that either has been deleted or never
                  existed.
                </p>
                <a href="<?= WEBSITE_URL ?>" class="btn btn-primary mt-1"
                  ><em class="icon ni ni-arrow-left"></em
                  ><span>Back To Home</span></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="Public/assets/js/bundle.js"></script>
  <script src="Public/assets/js/scripts.js"></script>
</html>
