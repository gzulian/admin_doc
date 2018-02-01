<style type="text/css" media="screen">
  .doc{
    cursor:pointer;
  }
  .selecccionada{
    background-color: rgba(182, 99, 135, 0.11);
  }
  ul {
  list-style: none;
}

ul .item:before {
  content: '✓';
  padding-bottom: 10px;
}
</style>
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/js/datepicker/timepicker.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/js/jquery-ui/jquery-ui.min.css')?>">
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
    <h3>Mi perfil</h3>
    </div>
  </div>
  <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content padded">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-7">
                  <form id="form" method="post" action="<?=site_url('user/profile')?>" class="form-horizontal" autocomplete="off"> 
                    <div class="form-group">
                      <label class="col-md-2" for="name">Nombre:</label>
                      <i><?=$loged->get('use_name')?></i>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2" for="email">Email:</label>
                      <i><?=$loged->get('use_email')?></i>
                    </div>
                      
                    
                    <div class="form-group">
                      <label class="col-md-2" for="name">Estado: </label>
                      <var><?=$loged->getStatus()?></var>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2"  for="email">Perfiles: </label>
                          <ul class=" col-md-4" >
                      <?php foreach ($loged->getPermissionArray() as $value): ?>

                            <li class="item"><b><?=$value?></b></li>
                      <?php endforeach ?>
                          </ul>
                    </div>
                    <h4>* Cambiar clave</h4>
                    <div class="row">
                      <div class="col-md-2">
                          <label for="email">Nueva Clave </label>
                      </div>   
                      <div class="col-md-5">
                        <input  required="required" maxlength="10" autocomplete="off" type="password" id="pwd1" name="pwd1" class="form-control ">
                      </div>   
                    </div><br>
                    <div class="row">
                      <div class="col-md-2">
                        <label  for="email">Repita su nueva clave</label>  
                      </div>   
                      <div class="col-md-5">
                        <input  required="required" maxlength="10" utocomplete="off" type="password" name="pwd2" id="pwd2" class="form-control ">    
                      </div>   
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12" id="info">
                        <?php if (isset($response)): ?>
                          <?php foreach ($response as $value): ?>
                             <div class="alert-info alert">
                                <b><?= $value ?></b>
                              </div> 
                          <?php endforeach ?>
                        <?php endif ?> 
                      </div>
                    </div>
                    <button title="Guardar" type="submit" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
                  </form>
                </div>
                <div class="col-md-3"></div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
            

<script src="<?=base_url('resources/js/jquery-ui/jquery-ui.js')?>"></script>
<script src="<?=base_url('resources/js/jquery-ui/spanish_language.js')?>"></script>
<script src="<?=base_url('resources/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('resources/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
<script src="<?=base_url('resources/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('resources/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=base_url('resources/vendors/datatables.net-buttons/js/buttons.colVis.min.js')?>"></script>



<link rel="stylesheet" type="text/css" href="<?=base_url('resources/vendors/datatables.net-bs/DATATABLE.css')?>"/>

<script type="text/javascript" src="<?=base_url('resources/vendors/datatables.net-bs/DATATABLE.js')?>"></script>
<script>
  $(function(){
     
      $("#form").submit(function(){
          var pwd1 = $("#pwd1").val();
          var pwd2 = $("#pwd2").val();
          $("#info").html();
          if(pwd1  != pwd2 ){
            $("#info").append("<div class='alert alert-dismissable alert-danger' ><b>Las claves no coinciden</b></div>");
            return false;
          }
              ///var form  =  document.getElementById('form').reset();
        
        
      });
     
  });
</script>