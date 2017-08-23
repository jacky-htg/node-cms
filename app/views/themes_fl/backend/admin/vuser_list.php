<link href="<?php echo THEMES_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
<link href="<?php echo THEMES_PATH; ?>assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
<script src="<?php echo THEMES_PATH; ?>js/jquery.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--formsearch:start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Filter by :
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                    </header>
                    <div class="panel-body">
                        <?php echo (isset($validation['message']))?$validation['message']:''; ?>

                        <form enctype="multipart/form-data" method="post" action="<?php echo DOMAIN; ?>user" class="form-horizontal" role="form">
                            <input type="hidden" name="<?php echo \Volnix\CSRF\CSRF::TOKEN_NAME ?>" value="<?php echo \Volnix\CSRF\CSRF::getToken() ?>"/>
                            <input type="hidden" name="mode" value="filter"/>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-4">
                                    <input name="email" value="<?php echo (isset($validation['post']['email']))?$validation['post']['email']:'';?>" type="text" class="form-control" required/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Filter</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!--formsearch:end-->

        <!--header:start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <?php echo $title;?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <button id="user-create" class="btn btn-success">
                                        Add New <i class="icon-plus"></i>
                                    </button>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <section id="no-more-tables">
                            <table class="table table-bordered table-striped table-condensed cf">
                                <thead class="cf">
                                    <tr>
                                        <th>Email / Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user_list as $row) { ?>
                                        <tr>
                                            <td data-title="Email / Login"><?php echo $row->email ?></td>
                                            <td data-title="Action">
                                                <a href="<?php echo DOMAIN;?>user/edit/<?php echo $row->iduser;?>" class="btn btn-success btn-xs">
                                                    <i class="fa fa-edit "></i> edit
                                                </a>
                                                <a href="<?php echo DOMAIN;?>user/modul/<?php echo $this->crypt->encrypt($row->iduser);?>" class="btn btn-success btn-xs">
                                                    <i class="fa fa-anchor "></i> modul
                                                </a>
                                                <button id="user-delete-<?php echo $row->iduser;?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash-o "></i> delete
                                                </button>
                                                <script>
                                                    $("#user-delete-<?php echo $row->iduser;?>").on( "click",function() {
                                                        if (confirm("Confirm Delete <?php echo $row->email;?>?")) {
                                                            $.ajax({
                                                                method: "POST",
                                                                url: "<?php echo DOMAIN; ?>user/delete/",
                                                                data: { iduser: "<?php echo $row->iduser;?>"},
                                                                dataType: 'json',
                                                                cache: false,
                                                                async: false,
                                                                success: function(data){
                                                                            window.location.reload();
                                                                        }
                                                        });
                                                        }
                                                    });
                                                </script>   
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </section>    
                            <?php if($links):?>
                                <ul class="pagination pagination-sm">
                                    <?php foreach($links as $page): $cssClass = [null, 'active']; ?>
                                            <li class="<?=$cssClass[(int) $page['active']]?>">
                                                <a href="<?=$page['link']?>"><?=$page['value']?></a>
                                            </li>
                                    <?php endforeach?>    
                                </ul>
                            <?php endif;?><br>  
                            Found <?php echo $user_list_count;?> records
                        </div>
                    </div>
                    <!--header:end-->
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->

<!-- js placed at the end of the document so the pages load faster -->

<script src="<?php echo THEMES_PATH; ?>js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo THEMES_PATH; ?>js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/jquery.scrollTo.min.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo THEMES_PATH; ?>js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo THEMES_PATH; ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/owl.carousel.js" ></script>
<script src="<?php echo THEMES_PATH; ?>js/jquery.customSelect.min.js" ></script>
<script src="<?php echo THEMES_PATH; ?>js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="<?php echo THEMES_PATH; ?>js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?php echo THEMES_PATH; ?>assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
<script src="<?php echo THEMES_PATH; ?>assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo THEMES_PATH; ?>js/sparkline-chart.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/easy-pie-chart.js"></script>
<script src="<?php echo THEMES_PATH; ?>js/count.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

<!--this page  script only-->
<script type="text/javascript" src="<?php echo THEMES_PATH; ?>js/advanced-form-components.js"></script>

<script>
$( "#user-create" ).click(function() {
  $(location).attr('href','<?php echo DOMAIN;?>user/create/');
});

$( "#user-edit" ).click(function() {
  $(location).attr('href','<?php echo DOMAIN;?>user/edit/');
});
</script>