<style type="text/css" media="screen">
  .doc{
    cursor:pointer;
  }
  .selecccionada{
    background-color: rgba(182, 99, 135, 0.11);
  }
</style>
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/js/datepicker/timepicker.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/js/jquery-ui/jquery-ui.min.css')?>">
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
    <h3>Mantenedor de usuarios</h3>
    </div>
  </div>
  <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content padded">
              <div class="row">
                <div class="col-md-12">
                <button  data-target='#viewUser' data-toggle='modal' type="button" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo usuario</button>
<table class="table table-responsive"  id="dataTables">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Perfiles</th>
                        <th>Estado</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <tbody>
<?php foreach ($users as $user):?>

                        <tr>
                          <td><?=$user->get('use_name')?></td>
                          <td><?=$user->get('use_email')?></td>
                          <td><?=implode(",",$user->getPermissionArray())?></td>
                          <td><?=$user->getStatus()?></td>
                          <td><button data-target='#viewUser' data-toggle='modal' type="button" class="edit btn btn-xs btn-info" id="<?=$user->get('use_id')?>"><span class="glyphicon glyphicon-edit"></span></button></td>
                        </tr>
<?php endforeach?>
</tbody>
                  </table>

                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <div  class="modal fade  " id="viewUser" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="font-size: 20px;" class="closeModal close glyphicon glyphicon-remove "></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Recepción de documentos </h4>
              </div>
              <div class="modal-body" >
                  <form method="post" id="form"> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-2" for="name">Nombre</label>
                          <input class="form-control" type="text" name="userData[use_name]" id="name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-2" for="email">Email</label>
                          <input class="form-control " type="text" name="userData[use_email]" id="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-2" for="name">Estado</label>
                          <select name="userData[use_status]" id="status" class="form-control">
                            <option value="0">INHABILITADO</option>
                            <option value="1">HABILITADO</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Perfiles: </label><br>
                          Administrador
                          <input   class="check" type="checkbox" name="profile[]" id="p1" value="1">
                          Asistente
                          <input   class="check" type="checkbox" name="profile[]" id="p2" value="2">
                          Supervisor
                          <input   class="check" type="checkbox" name="profile[]" id="p3" value="3">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" id="info">

                      </div>
                    </div>
                    <!-- button title="Reset" type="button" id="reset" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-repeat"></span> Reinicar clave</button -->
                    <i>*Clave por defecto : 123456</i>
                    <button title="Guardar" type="submit" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></button>
                    <input id="id" type="hidden" name="userData[use_id]" value="">
                  </form>
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
    //console.log(loadingDiv);

    
      var table  = $("#dataTables").DataTable( {"oLanguage": {
        "sLengthMenu": "Mostrar _MENU_ registros por página",
        "sZeroRecords": "Sin resultados",
        "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "sInfoEmpty": "",
        "sInfoFiltered": "(Filtrando from _MAX_ total registros)",
        "sSearch":"Buscar:  ",
        "oPaginate": {
        "sFirst":      "Primera",
        "sLast":       "Última",
        "sNext":       "Sig",
        "sPrevious":   "Anteriror"
        }
      },iDisplayLength: 22,
         "dom": 'Bfrtip',
                    "buttons": [
                {extend: 'excel', title: 'REPORTE POR ESTADO DE PAGO DE DOCUMENTOS'},
            ]



      });
      $("#form").submit(function(){
         var formData = $(this).serialize();
         $.ajax({
            type:'get',
            dataType:'json',
            url:'<?=site_url("user/save")?>/',
            data:formData,
            beforeSend:function(){
               $("body").css("cursor",'wait');
            },
            success:function(data){
              $("#info").empty();
              if(typeof data.errors != 'undefined'){
                $("#info").append("<div class='alert alert-dismissable alert-danger' >"+data.errors+"</div>");
              }
              if(typeof data.success != 'undefined'){
                $("#info").append("<div class='alert alert-dismissable alert-success' >"+data.success+"</div>");
                
              }
              ///var form  =  document.getElementById('form').reset();
              
            },
            complete:function(){
               $("body").css("cursor",'default');
            }
          });

         return false;
      });
      $(".edit").click(function(){
        var id = $(this).attr("id");
        if(typeof id != 'undefined'){
          $('.check').prop("checked",false); 
          $.ajax({
            type:'POST',
            dataType:'json',
            url:'<?=site_url("user/find")?>/'+id,
            beforeSend:function(){
               $("body").css("cursor",'wait');
            },
            success:function(data){
              
              $("#name").val(data.user._columns.use_name);
              $("#email").val(data.user._columns.use_email);
              $("#id").val(data.user._columns.use_id);
              $(data.profiles).each(function(i,value){
                  $("#p"+value).prop("checked",true);
              });
              $("#status option[value='"+data.user._columns.use_status+"'] ").prop('selected',true);
            },
            complete:function(){
               $("body").css("cursor",'default');
            }
          });
        }
      });
      $('#viewUser').on('hidden.bs.modal', function () {
           location.reload();
      })
      $("#reset").click(function(){

      })
  })
</script>