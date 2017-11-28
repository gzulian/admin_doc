<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración| BAXTER </title>
    <link type="image/png" rel="icon" href="<?=base_url('resources/images/baxter_icon_32x32.png')?>" sizes="32x32">
    <!-- Bootstrap -->
    <link href="<?=base_url('resources/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('resources/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('resources/build/css/custom.css');?>" rel="stylesheet">

    <link href="<?=base_url('resources/vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!-- iCheck -->



    <script src="<?=base_url('resources/vendors/fastclick/lib/fastclick.js')?>"></script>

    <!-- NProgress -->
    <script src="<?=base_url('resources/vendors/nprogress/nprogress.js')?>"></script>
    <script src="<?=base_url('resources/vendors/jquery/dist/jquery.js');?>"></script>
    <script src="<?=base_url('resources/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!--script src="<?//=base_url('resources/vendors/select2/src/js/jquery.select2.js');?>"></script-->



    <script src="<?=base_url('resources/vendors/iCheck/icheck.min.js');?>"></script>


    <script src="<?=base_url('resources/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('resources/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>" type="text/javascript" charset="utf-8" ></script>
  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img width="50px" src="<?=base_url('resources/images/logo.png')?>" alt=""></a>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?=site_url('Dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                  <li><a href="<?=site_url('Document')?>" ><i class="fa fa-edit"></i> Documentos</a></li>
                  <li><a><i class="fa fa-table"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child-menu" style="display:  none;">
                      <li><a href="<?=site_url('report/status')?>"> Estado de pago de documentos</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=site_url('report/motive')?>"> Causal de documentos pendientes</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=site_url('report/returnDoc')?>"> Retorno de documentos</a></li>
                      <li class="divider"></li>
                  </ul>
                  </li>
                  <li><a href="<?=site_url('document/upload');?>"><i class="fa fa-upload"></i> Carga masiva</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" href="<?=site_url('login/logout')?>" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- jQuery -->
        <!-- Custom Theme Scripts -->
        <!-- Bootstrap -->



        <!-- page content -->

        <!-- /page content -->

