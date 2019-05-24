<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Doctor Pannel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo(base_url());?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- noUISlider Css -->
    <link href="<?php echo(base_url());?>assets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="<?php echo(base_url());?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo(base_url());?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="<?php echo(base_url());?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?php echo(base_url());?>assets/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?php echo(base_url());?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    
    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php echo(base_url());?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo(base_url());?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    

    <!-- Morris Chart Css-->
    <link href="<?php echo(base_url());?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo(base_url());?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo(base_url());?>assets/css/themes/all-themes.css" rel="stylesheet" />

    
    

    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: 10px !important;
            margin-left: -1px;
            padding: 10px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo(base_url());?>dashboard">PMS</a>

            </div>            
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
                 <ul class="nav navbar-nav mr-auto">
                  
        <?php  if(sizeof($leftmenu)>0)
		{
			//pre($leftmenu);
			foreach($leftmenu as $firstlevel)
			{
				if(sizeof($firstlevel['secondLevelMenu'])>0)
				{ ?>
					
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $firstlevel['FirstLevelMenuData']->menu_name; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php 
							foreach($firstlevel['secondLevelMenu'] as $second_lvl)
							{
								if(sizeof($second_lvl['thirdLevelMenu'])>0){	
						    ?>

                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $second_lvl['secondLevelMenuData']->menu_name; ?></a>
                                <ul class="dropdown-menu">
                                    <?php 
                                        foreach($second_lvl['thirdLevelMenu'] as $third_lvl){ 
                                    ?>                                    
                                        <li><a href="<?php echo base_url().$third_lvl['thirdLevelMenuData']->menu_link; ?>"><?php echo $third_lvl['thirdLevelMenuData']->menu_name; ?></a></li>
                                    <?php 
                                         }
                                    ?>
                                </ul>                            
                            </li>

                            <?php 
								}else{
									echo '<li><a href="'.base_url().$second_lvl['secondLevelMenuData']->menu_link.'">'.$second_lvl['secondLevelMenuData']->menu_name.'</a></li>';
								}
							}
						?>

                        </ul>
                    </li>                       
						
						
						
			<?php
						
				}
				else
				{
					echo '<li><a href="'.base_url().$firstlevel['FirstLevelMenuData']->menu_link.'">'.$firstlevel['FirstLevelMenuData']->menu_name.'</a></li>';
				}
				
			}
		}
		
		?>
        </ul> 
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                  
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       


        <!-- #END# Left Sidebar -->



        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>


              <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<?php 
			if($bodyview)  :
			$this->load->view($bodyview);
			endif; 
		?>
  
  </div>



    <!-- Jquery Core Js -->
    <script src="<?php echo(base_url());?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/node-waves/waves.js"></script>

     <!-- Autosize Plugin Js -->
     <script src="<?php echo(base_url());?>assets/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/momentjs/moment.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo(base_url());?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo(base_url());?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo(base_url());?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo(base_url());?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo(base_url());?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo(base_url());?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

     <!-- Dropzone Plugin Js -->
     <script src="<?php echo(base_url());?>assets/plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/multi-select/js/jquery.multi-select.js"></script>

    
    <!-- noUISlider Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/nouislider/nouislider.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo(base_url());?>assets/js/admin.js"></script>
    <script src="<?php echo(base_url());?>assets/js/pages/index.js"></script>
    <script src="<?php echo(base_url());?>assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="<?php echo(base_url());?>assets/js/pages/forms/advanced-form-elements.js"></script>

    
    

    <!-- Demo Js -->
    <script src="<?php echo(base_url());?>assets/js/demo.js"></script>
</body>

</html>
