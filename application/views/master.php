<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>BAXTER | Registro documental</title>
  <link href="<?=base_url('resources/release_bs3/build/stylesheets/application.css')?> " media="screen" rel="stylesheet" type="text/css" />
  <script src="<?=base_url('resources/release_bs3/build/javascripts/application.js')?>" type="text/javascript" charset="utf-8"></script>


  <script type="application/javascript">
  

  $(document).ready(function(){
      <?php if (isset($active)): ?>
      $(".<?=$active?>").addClass("active");
    <?php endif ?>
  });
    
  
</script>

</head>
<body>
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Registro documental</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
      <span class="sr-only">Toggle Side Navigation</span>
      <i class="icon-th-list"></i>
    </button>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
      <span class="sr-only">Toggle Top Navigation</span>
      <i class="icon-align-justify"></i>
    </button>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-collapse-top">
    <ul class=" nav navbar-nav navbar-left">
      <li class="cdrop active">&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li class="cdrop "><a href="<?=site_url('Dashboard')?>"><span class="icon-dashboard icon-1x"></span> Dashboard</a></li>
      <li><a href="<?=site_url('document/index')?>" class=""><span class="icon-file icon-1x"></span> Documentos</b></a></li>      
      <li class="dropdown cdrop">
         <a href="#" class="dropdown-toggle dropdown-avatar " data-toggle="dropdown"><span class="glyphicon-filter icon-2x"></span>Reportes<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?=site_url('report/status')?>"> Estado de pago de documentos</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url('report/motive')?>"> Causal de documentos pendientes</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url('report/returnDoc')?>"> Retorno de documentos</a></li>
            <li class="divider"></li>
        </ul>
      </li>
      <!--li class=""><a href="<?//=site_url('user/index')?>"><span class="icon-group icon-1x"></span> Usuarios</a></li-->  
    </ul>
    <div class="navbar-right">
      <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
          
          <a href="#" class="dropdown-toggle dropdown-avatar " data-toggle="dropdown">
          <span class="icon-user icon-2x"></span>
          <span >
             <span><?=$user['name']?><i class="icon-caret-down"></i></span>
          </span>
          </a>
          <ul class="dropdown-menu">
            <!-- the first element is the one with the big avatar, add a with-image class to it -->

            <li class="with-image">
              <div class="avatar">
                <span class="icon-user"></span>
              </div>
              <span><?=$user['name']?></span>
            </li>

            <li class="divider"></li>
            <!-- li><a href=""><i class="icon-user"></i> <span>Mi cuenta</span></a></li-->
            <li><a href="<?=site_url('login/logout');?>"><i class="icon-off"></i> <span>Cerrar sesión</span></a></li>
          </ul>
      	</li>
      </ul>
    </div>
  </div><!-- /.navbar-collapse -->
</nav>
