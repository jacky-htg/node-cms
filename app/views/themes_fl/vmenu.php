<body>
<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
        </div>
		<!--logo start-->
		<a href="index.html" class="logo" ><span><?php echo NAME_APPS;?> </span></a>
		<!--logo end-->
		<div class="top-nav ">
		    <ul class="nav pull-right top-menu">
			<!-- user login dropdown start-->
	            <li class="dropdown">
	                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
	                    <div id="clock"></div>
	                </a>
	            </li>
				<li class="dropdown">
				    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<!--<img alt="" src="<?php //echo base_url(); ?><?php //echo $this->session->userdata('photo'); ?>">-->
						<span class="username">
			                <?php echo $this->session->getValue('sessid')['email']; ?>
			            </span>
						<b class="caret"></b>
				    </a>
				    <ul class="dropdown-menu extended logout">
						<div class="log-arrow-up"></div>
						<li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
						<li><a href="#"><i class="icon-cog"></i> Settings</a></li>
						<li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
						<li><a href="<?php echo $this->uri->getBaseUri();?>login/do_logout"><i class="icon-key"></i> Logout</a></li>
				    </ul>
				</li>
			<!-- user login dropdown end -->
		    </ul>
		</div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
		<div id="sidebar"  class="nav-collapse ">
		    <!-- sidebar menu start-->
		    <ul class="sidebar-menu" id="nav-accordion">
				<?php echo $multilevel;?>
		    </ul>
		    <!-- sidebar menu end-->
		</div>
    </aside>
    <!--sidebar end-->
