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
<div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>

<div class="primary-sidebar">
  <!-- Main nav -->
  <ul class="nav navbar-collapse collapse navbar-collapse-primary">
    <li class="dashboard" id="dashboard" >
      <span class="glow"></span>
      <a href="<?=site_url('dashboard');?>">
          <i class="icon-dashboard icon-2x"></i>
          <span>Dashboard</span>
      </a>
    </li>
    <li class="dark-nav document1 document2  " id="documents"  >
      <span class="glow"></span>
      <a class="accordion-toggle collapsed " data-toggle="collapse" href="#4y7YSLHVqc">
        <i class="icon-file icon-2x"></i>
        <span>
          Documentos
          <i class="icon-caret-down"></i>
        </span>
      </a>
      <ul id="4y7YSLHVqc" class="in " >
        <li class="document1" id="index">
          <a href="<?=site_url('document/index');?>">
              <i class="icon-signin"></i> Recepción de facturas
          </a>
        </li>
        <li class="document2" >
          <a href="<?=site_url('document/upload');?>">
              <i class="icon-cloud-upload"></i> Carga masiva de facturas
          </a>
        </li>
      </ul>
      
    </li>
    <li class=" users" id="users">
      <span class="glow"></span>
      <a href="<?=site_url('user');?>">
          <i class="icon-group icon-2x"></i>
          <span>Usuarios</span>
      </a>
    </li>
  </ul>
</div>
