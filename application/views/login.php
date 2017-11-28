<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración| BAXTER </title>
    <link type="image/png" rel="icon" href="<?=base_url('resources/images/baxter_icon_32x32.png')?>" sizes="32x32">

    <!-- Bootstrap -->
    <link href="<?=base_url('resources/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('resources/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('resources/build/css/custom.min.css')?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?=site_url('login/index')?>" method="post">
              <h1>Bienvenido</h1>
              <div>
                <input type="text" name="user" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Clave" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Ingresar</button>
              </div>
<?php if (isset($error)):?>
                <i class="icon-warning-sign"><?=$error?></i>
<?php endif?>
              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> <img width="100px" src="<?=base_url('resources/images/logo.png')?>"></h1>
                  <p>Administración de documentos</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>