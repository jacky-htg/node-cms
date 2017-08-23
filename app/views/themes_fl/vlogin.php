<body class="login-body">
    
    <?php if($login->errorMessages()){?>
        <div class="alert alert-block alert-danger fade in">
            <?php echo $login->errorMessages(false, '<li>', '</li>'); ?>
        </div>
    <?php } ?>

    <div class="container">

        <form class="form-signin" action="/login/secure" method="post" enctype="multipart/form-data">

            <input type="hidden" name="<?php echo \Volnix\CSRF\CSRF::TOKEN_NAME ?>" value="<?php echo \Volnix\CSRF\CSRF::getToken() ?>"/>
            <input type="hidden" name="mode" value="signin"/>

            <h2 class="form-signin-heading"><?php echo NAME_APPS;?> login</h2>

            <div class="login-wrap">
                
                <input name="email" value="" type="text" class="form-control" placeholder="User ID" autofocus required>
                <input name="password" value="" type="password" class="form-control" placeholder="Password" required>
                <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
                
            </div>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                
                <div class="modal-dialog">
                    
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email_reset" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                        </div>
                        
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-success" type="button">Submit</button>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            <!-- modal -->

        </form>

    </div>
    
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo THEMES_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo THEMES_PATH; ?>js/bootstrap.min.js"></script>
    <?php //$this->output('ajax/alogin');?>
</body>