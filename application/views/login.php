<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>RRF</title>
  <link href="<?=base_url('resources/release_bs3/build/stylesheets/application.css')?> " media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Registro de recepción de Facturas</a>
  </div>
</nav>
<div class="container">
<div class="col-md-4 col-md-offset-4">
  <div class="padded">
    <div class="login box" style="margin-top: 80px;">
      <div class="box-header">
        <span class="title">Ingreso</span>
      </div>
      <div class="box-content padded">
        <form class="separate-sections" action="<?=site_url('login/index');?>" method="post">
          <div class="input-group addon-left">
            <span class="input-group-addon" >
              <i class="icon-user"></i>
            </span>
            <input type="text" name="user" placeholder="Su email: ejemplo@ejemplo.cl">
          </div>
          <div class="input-group addon-left">
            <span class="input-group-addon" >
              <i class="icon-key"></i>
            </span>
            <input type="password" name="password" placeholder="Su clave">
          </div>
          <div>
            <?php if(isset($error)): ?>
              <i class="icon-warning-sign"><?=$error?></i>
            <?php endif ?>
            <button type="submit" class="btn btn-blue btn-block">
                Ingresar <i class="icon-signin"></i>
            </button>
          </div>
        </form>
        <div>
          <!-- a href="sign_up.html">
              Don't have an account? <strong>Sign Up</strong>
          </a-- >
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
