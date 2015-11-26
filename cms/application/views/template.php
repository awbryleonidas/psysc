<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo asset_url('images/favicon.png'); ?>">
    <title><?=$this->config->item('application_name')?> - <?=$page_heading?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    <link href="<?php echo asset_url('plugins/jquery-ui/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset_url('css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset_url('css/skin-blue.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset_url('plugins/dropzone/dropzone.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset_url('plugins/alertify/css/alertify-bootstrap-3.css'); ?>" rel="stylesheet" type="text/css" />


    <?php echo $_styles; // loads additional css files ?>

    <style><?php echo $styles; // loads the module specific css ?></style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo asset_url('css/styles.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">

<div class="wrapper">

    <header class="main-header">

		<a href="javascript:;" class="logo"><?=$this->config->item('application_name')?></a>

        <nav class="navbar navbar-static-top" role="navigation">

            <a href="#" class="sidebar-toggle hide" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--<img src="<?/*=profile_pic($this->session->userdata('user_image'))*/?>" class="user-image img-circle" alt="Image" />-->
                            <strong><span class="hidden-xs">Hello, <?php echo $this->session->userdata('user_firstname')?> <?php echo $this->session->userdata('user_lastname')?>! </span></strong>
                        </a>
                        <ul class="dropdown-menu"  style="width: 15px">
                            <!-- User image -->
                            <!--<li class="user-header">
									<img src="<?/*=profile_pic($this->session->userdata('user_image'))*/?>" class="img-circle" alt="Image" />
									<p>
										<?php /*echo $this->session->userdata('user_firstname')*/?> <?php /*echo $this->session->userdata('user_lastname')*/?>
										<small><?php /*echo $this->session->userdata('user_email')*/?></small>
									</p>
								</li>-->
                            <!-- Menu Body -->
                            <!--<li class="user-body">
									<div class="col-xs-4 text-center">
									   <a href="<?php /*echo site_url('users/profile'); */?>" data-toggle="modal" data-target="#modal">Profile</a>
									</div>
									<div class="col-xs-4 text-center">
									   <a href="<?php /*echo site_url('users/password'); */?>" data-toggle="modal" data-target="#modal">Password</a>
									</div>
									<div class="col-xs-4 text-center">
									   <a href="<?php /*echo site_url('users/picture'); */?>" data-toggle="modal" data-target="#modal">Picture</a>
									</div>
								</li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="row">
                                    <div class="col-xs-6 text-center">
                                        <a href="<?php echo site_url('users/password'); ?>" data-toggle="modal" data-target="#modal">Password</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="<?php echo site_url('users/logout'); ?>" class="">Sign out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Logo -->
			<img src="<?php echo asset_url('images/cms-logo.png'); ?>" alt="Logo" width="100%" style=""/>
            <!--<div  style="background-color: rgb(0, 157, 48); height: 130px; width: 100%; position: absolute; top: 0px; left: 0px"></div>-->
            <br><br>
            <?php echo $this->app_menu->show(); ?>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $page_heading; ?>
                <small><?php echo $page_subhead; ?></small>
            </h1>
            <?php echo $this->breadcrumbs->show(); ?>
        </section>

        <!-- Main content -->
        <section class="content">

            <?php echo $content; ?>

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    <footer class="main-footer hide">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <?=$this->config->item('application_name')?></strong> All rights reserved.
    </footer>
</div><!-- ./wrapper -->


<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?=lang('button_close')?></span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?=lang('loading')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=asset_url('images/loading3.gif')?>" alt="<?=lang('loading')?>" />
                    <p><?=lang('loading')?></p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?=lang('button_close')?></span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?=lang('loading')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=asset_url('images/loading3.gif')?>" alt="<?=lang('loading')?>" />
                    <p><?=lang('loading')?></p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="modal_restricted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?=lang('button_close')?></span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?=lang('title_restricted')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div id="message" class="callout callout-danger callout-dismissable">
                        <?=lang('error_page_restricted')?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times"></i> <?=lang('button_close')?>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-processing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?=lang('button_close')?></span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?=lang('processing')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=asset_url('images/loading3.gif')?>" alt="<?=lang('processing')?>" />
                    <p><?=lang('processing')?></p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?=lang('button_close')?></span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?=lang('loading')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=asset_url('images/loading3.gif')?>" alt="<?=lang('loading')?>" />
                    <p><?=lang('loading')?></p>
                </div>
            </div>

        </div>
    </div>
</div>


<script>site_url = '<?php echo site_url(); ?>';</script>

<script src="<?php echo asset_url('plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script src="<?php echo asset_url('plugins/jquery-ui/jquery-ui.min.js'); ?>" type="text/javascript"></script>

<script>
    /*** Handle jQuery plugin naming conflict between jQuery UI and Bootstrap ***/
    $.widget.bridge('uibutton', $.ui.button);
    $.widget.bridge('uitooltip', $.ui.tooltip);
</script>

<script src="<?php echo asset_url('plugins/flot/excanvas.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/flot/jquery.flot.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/flot/jquery.flot.categories.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
<script src="<?php echo asset_url('js/app.min.js'); ?>" type="text/javascript"></script>

<script src="<?php echo asset_url('plugins/alertify/js/alertify.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/dropzone/dropzone.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('js/scripts.js'); ?>" type="text/javascript"></script>

<?php echo $_scripts; // loads additional js files ?>
<!--script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script-->
<?php if (isset($scripts)) echo '<script type="text/javascript">' . $scripts . '</script>'; // loads the module specific scripts ?>
<?php if (isset($module_scripts)) echo '<script type="text/javascript">' . $module_scripts . '</script>'; // loads the dependent or imported module scripts ?>

<?php if (isset($error_message)): ?>
    <script>alertify.error("<?php echo $this->session->flashdata('flash_error'); ?>");</script>
<?php endif; ?>

<?php if (NULL != $this->session->flashdata('flash_message')): ?>
    <script>alertify.success("<?php echo $this->session->flashdata('flash_message'); ?>");</script>
<?php endif; ?>

<?php if (NULL != $this->session->flashdata('flash_error')): ?>
    <script>alertify.error("<?php echo $this->session->flashdata('flash_error'); ?>");</script>
<?php endif; ?>
</body>
</html>