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
    <h3>Mantenedor de motivos</h3>
    </div>
  </div>
  <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content padded">
              <div class="row">
                <div class="col-md-12">
                <button  data-target='#viewUser' data-toggle='modal' type="button" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo motivo</button>
<table class="table table-responsive"  id="dataTables">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php foreach ($motives as $motive):?>

                        <tr>
                          <td><?=$motive->mot_id?></td>
                          <td><?=$motive->mot_name?></td>
                          <td><button data-target='#viewUser' data-toggle='modal' type="button" class="edit btn btn-xs btn-info" id="<?=$motive->mot_id?>"><span class="glyphicon glyphicon-edit"></span></button></td>
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
                <h4 class="modal-title" id="myModalLabel">Motivos </h4>
              </div>
              <div class="modal-body" >
                  <form method="post" id="form"> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="col-md-2" for="name">Descripción</label>
                          <input class="form-control" type="text" name="motData[mot_name]" id="name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-2" for="name">Estado</label>
                          <select name="motData[mot_status]" id="status" class="form-control">
                            <option value="0">INHABILITADO</option>
                            <option value="1">HABILITADO</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" id="info">

                      </div>
                    </div>
                    <!-- button title="Reset" type="button" id="reset" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-repeat"></span> Reinicar clave</button -->
                    <button title="Guardar" type="submit" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></button>
                    <input id="id" type="hidden" name="motData[mot_id]" value="">
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
            url:'<?=site_url("contingency/saveMotive")?>/',
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
            url:'<?=site_url("contingency/findMotive")?>/'+id,
            beforeSend:function(){
               $("body").css("cursor",'wait');
            },
            success:function(data){
              
              $("#name").val(data.motive.mot_name);
              $("#id").val(data.motive.mot_id);
              $("#status option[value='"+data.motive.mot_status+"'] ").prop('selected',true);
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