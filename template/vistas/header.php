<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <!-- Enlaces a Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>


    <title><?= isset($PageTitle) ? $PageTitle : "Default Title"?></title>
    <!-- Additional tags here -->
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    }?>
  </head>
  <body>