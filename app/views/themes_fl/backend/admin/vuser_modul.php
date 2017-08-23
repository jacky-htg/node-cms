<link href="<?php echo THEMES_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
<link href="<?php echo THEMES_PATH; ?>assets/morris.js-0.4.3/morris.css" rel="stylesheet" />

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--header:start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <?php echo $title;?>
                        <div class="pull-right">
                            <button id="back-userlist" type="submit" class="btn btn-success btn-xs">Back</button>
                        </div>
                    </header>
                    <div class="panel-body">
                        <section class="panel">
                            <div class="bio-graph-heading">
                              User Info
                          </div>
                          <div class="panel-body bio-graph-info">
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Full Name </span>: <?php echo $user->first_name;?> <?php echo isset($user->last_name)?$user->last_name:'';?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Tgl Lahir</span>: <?php echo $user->tgl_lahir;?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Propinsi / Kota</span>: <?php echo $user->province_name;?> / <?php echo $user->district_name;?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: <?php echo $user->email;?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Alamat </span>: <?php echo $user->address;?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Phone </span>: <?php echo $user->phone;?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Kode Pos </span>: <?php echo $user->pos_code;?></p>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <section id="no-more-tables">
                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                      <th>Menu</th>
                                      <th>Permission</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach ($menu_parent as $row) { 
                                            $row_menu=$this->muser->userMenuByID($user->iduser,$row->idmenu);
                                    ?>
                                        <tr>
                                            <td data-title="Menu"><strong><?php echo $row->nama_menu;?></strong></td>
                                            <td data-title="Read">
                                                <input name="create_<?php echo $row->idmenu;?>" value="1" type="checkbox" <?php echo (isset($row_menu->menuid) && $row_menu->menuid == $row->idmenu)?'checked':'';?>>
                                            </td>
                                        </tr>  
                                        <?php 
                                            $menu_child = $this->muser->menuChild($row->idmenu);
                                            if($menu_child){ 
                                                foreach ($menu_child as $row_child) { ?>
                                                <tr>
                                                    <td data-title="Menu">++<?php echo $row_child->nama_menu;?></td>
                                                    <td data-title="Read"><input name="create_<?php echo $row->idmenu;?>" value="1" type="checkbox" <?php echo (isset($row_menu->menuid) && $row_menu->menuid == $row->idmenu)?'checked':'';?>> </td>
                                                </tr>  
                                            <?php } } ?>
                                    <?php } ?>  
                                  </tbody>
                              </table>
                              </section>
                    </div>
                    <!--header:end-->
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo THEMES_PATH; ?>js/jquery.js"></script>
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
$( "#back-userlist" ).click(function() {
  $(location).attr('href','<?php echo DOMAIN;?>user/');
});
</script>