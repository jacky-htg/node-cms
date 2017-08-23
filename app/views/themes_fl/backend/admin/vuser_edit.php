<link href="<?php echo THEMES_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
<link href="<?php echo THEMES_PATH; ?>assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
<script src="<?php echo THEMES_PATH; ?>js/jquery.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <?php echo $title;?>
                        <div class="pull-right">
                            <button id="back-userlist" type="submit" class="btn btn-success btn-xs">Back</button>
                        </div>
                    </header>
                </section>
            </div> 
        </div> 
        
        <?php echo (isset($validation['message']))?$validation['message']:''; ?>
        <form role="form" action="/user/edit/" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="<?php echo \Volnix\CSRF\CSRF::TOKEN_NAME ?>" value="<?php echo \Volnix\CSRF\CSRF::getToken() ?>"/>
            <input type="hidden" name="iduser" value="<?php echo $iduser;?>"/>
        
        
        <div class="row">
            
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading alert alert-info">
                        <label>Account System Information</label>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label><font color="red">Nomor Anggota</font></label>
                            <input name="nik" value="<?php echo (isset($validation['post']['nik']))?$validation['post']['nik']:$user_data->nik;?>" type="text" placeholder="NIK..." class="form-control">
                            <span class="label label-danger">NOTE!</span>
                            <span class="help-inline"><i>- wajib diisi</i></span>
                        </div>
                            
                        <div class="form-group">
                                <label><font color="red">Email</font></label>
                                <input name="email" value="<?php echo (isset($validation['post']['email']))?$validation['post']['email']:$user_data->email;?>" type="text" placeholder="Email..." class="form-control">
                                <span class="label label-danger">NOTE!</span>
                                <span class="help-inline"><i>- wajib diisi</i></span>
                            </div>
                        <div class="form-group">
                            <label><font color="red">Password</font></label>
                            <input name="password" value="<?php echo (isset($validation['post']['password']))?$validation['post']['password']:$user_data->password;?>" type="password" placeholder="Password..." class="form-control">
                            <span class="label label-danger">NOTE!</span>
                            <span class="help-inline"><i>- wajib diisi</i></span>
                        </div>
                            
                        <div class="form-group">
                            <label><font color="red">Re Password</font></label>
                            <input name="repassword" value="<?php echo (isset($validation['post']['repassword']))?$validation['post']['repassword']:$user_data->password;?>" type="password" placeholder="Re Password..." class="form-control">
                            <span class="label label-danger">NOTE!</span>
                            <span class="help-inline"><i>- wajib diisi</i></span>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src=<?php echo isset($user_data->image)?"'".DOMAIN.$user_data->image."'":'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';?> alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input name="my_file" type="file" class="default" />
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                            <span class="label label-danger">NOTE!</span>
                            <span>
                                <i>- Extension : .jpeg, .jpg, .png</i>
                                <br>
                                <i>- Attached image thumbnail is supported in Latest Firefox, Chrome, Opera,Safari and Internet Explorer 10 only</i>
                            </span>
                        </div>

                    </div>

                </section>

            </div>
            
        </div> 
        
        <div class="row">
            <div class="col-lg-12">
             <section class="panel">
              <div class="panel-body">
                    <button id="submit" type="submit" name="button" value="submit" class="btn btn-success">Submit</button>    
                </div>
             </section>
            </div>
        </div>
        
    </form> 
        
          
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!-- js placed at the end of the document so the pages load faster -->

<script src="<?php echo THEMES_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/jquery.scrollTo.min.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="<?php echo THEMES_PATH; ?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo THEMES_PATH; ?>js/jquery.dcjqaccordion.2.7.js"></script>

<!--custom switch-->
<script src="<?php echo THEMES_PATH; ?>js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="<?php echo THEMES_PATH; ?>js/jquery.tagsinput.js"></script>
<!--custom checkbox & radio-->
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>js/ga.js"></script>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/respond.min.js" ></script>


<!--common script for all pages-->
<script src="<?php echo THEMES_PATH; ?>js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?php echo THEMES_PATH; ?>js/form-component.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/advanced-form-components.js"></script>

<script>
$( "#back-userlist" ).click(function() {
  $(location).attr('href','<?php echo DOMAIN?>user');
});


$(function(){
   
        
});

</script>