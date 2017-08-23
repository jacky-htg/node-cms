<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>404</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo THEMES_PATH; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo THEMES_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo THEMES_PATH; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo THEMES_PATH; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo THEMES_PATH; ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="body-404">

    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404#sida</h1>
          <h2>page not found</h2>
          
            <?php if(error_reporting()): ?>
                <p class="page-404">Message: <?php echo $message;?></p>
            <?php else: ?>
                <p class="page-404">The requested URL <?php echo $_SERVER['REQUEST_URI'];?> was not found on this server.</p>
            <?php endif; ?>
      </section>

    </div>

  </body>
</html>