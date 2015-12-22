<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url() ?>">
    <title><?php echo $template['title']; ?></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="themes/admin/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="themes/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="themes/admin/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="themes/admin/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="themes/admin/assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
    <link href="themes/admin/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="themes/admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="themes/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css">
    <link href="themes/admin/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.css" rel="stylesheet" type="text/css">
    <link href="themes/admin/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="themes/admin/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen">
    <link href="themes/admin/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css">
    <link href="themes/admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css">
    <link href="themes/admin/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen"/>


    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="themes/admin/assets/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
</head>
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <!-- BEGIN NAVIGATION HEADER -->
        <div class="header-seperation">
            <!-- BEGIN MOBILE HEADER -->
            <ul class="nav pull-left notifcation-center visible-xs visible-sm">
                <li class="dropdown">
                    <a href="#main-menu" data-webarch="toggle-left-side">
                        <div class="iconset top-menu-toggle-white"></div>
                    </a>
                </li>
            </ul>
            <!-- END MOBILE HEADER -->
            <!-- BEGIN LOGO -->
            <a href=javascript:;>
                <img src="themes/admin/assets/img/logo.png" class="logo" alt="" data-src="themes/admin/assets/img/logo.png" data-src-retina="themes/admin/assets/img/logo2x.png"  height="21" />
            </a>
            <!-- END LOGO -->

        </div>
        <!-- END NAVIGATION HEADER -->
        <!-- BEGIN CONTENT HEADER -->
        <div class="header-quick-nav">
            <!-- BEGIN HEADER LEFT SIDE SECTION -->
            <div class="pull-left">
                <!-- BEGIN SLIM NAVIGATION TOGGLE -->
                <ul class="nav quick-section">
                    <li class="quicklinks">
                        <a href="javascript:;" class="" id="layout-condensed-toggle">
                            <div class="iconset top-menu-toggle-dark"></div>
                        </a>
                    </li>
                </ul>
                <!-- END SLIM NAVIGATION TOGGLE -->

            </div>
            <!-- END HEADER LEFT SIDE SECTION -->

        </div>
        <!-- END CONTENT HEADER -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <!-- BEGIN MENU -->
    <?php include 'navigation.php'?>
    <!-- BEGIN SCROLL UP HOVER -->
    <a href=javascript:; class="scrollup">Scroll</a><?php ?>
    <!-- END SCROLL UP HOVER -->
    <!-- END MENU -->
    <!-- BEGIN SIDEBAR FOOTER WIDGET -->
    <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
            <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar"></div>
        </div>
        <div class="pull-right">
            <div class="details-status">
                <span data-animation-duration="560" data-value="86" class="animate-number"></span>%
            </div>
            <a href=javascript:;><i class="fa fa-power-off"></i></a>
        </div>
    </div>
    <!-- END SIDEBAR FOOTER WIDGET -->
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="content">
            <?php echo $template['body']; ?>
        </div>
    </div>
    <!-- END PAGE CONTAINER -->

</div>
<!-- END CONTENT -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="themes/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="themes/admin/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/typeahead.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="themes/admin/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="themes/admin/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="themes/admin/assets/plugins/dropzone/dropzone.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="themes/admin/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>




<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="themes/admin/assets/webarch/js/webarch.js" type="text/javascript"></script>
<script src="themes/admin/assets/js/main.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->

<?php echo $template['metadata']; ?>

</body>
</html>