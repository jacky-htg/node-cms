<?php if ( ! error_reporting() ) exit(1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>500</title>

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

  <body class="body-500">

    <div class="container">

      <section class="error-wrapper">
            <i class="icon-500"></i>
            <h1>Ouch! </h1>
            <h2>500#sida</h2>
            
            <p class="page-500"><strong>Error message</strong>: <?php echo $message; ?></p>
            
            <?php if( $file ): ?>
            <h2>
                <p class="page-500"><strong>Error in file</strong>:</p>
                <pre><?php echo $file; ?> Line: <?php echo $line; ?></pre>
                <p class="page-500"><strong>Source Code</strong></p>
                <pre>
                    <?php foreach($code as $code): ?>
                        <?php echo $code;?>
                    <?php endforeach; ?>
                </pre>
            </h2>    
            <?php endif; ?>
            
            <p class="page-500"><strong>Debug Trace</strong></p>
            <?php if ($trace): ?>
                <pre>
                    <?php echo str_replace(array('<pre>', '</pre>'), '',$trace) ?>
                </pre>
            <?php endif; ?>
            
      </section>

    </div>

  </body>
</html>