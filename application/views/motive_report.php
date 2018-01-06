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
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h3 class="title">Causal de documentos</h3>
          </div>
          <div class="x_content padded">
            <div id="errors">

            </div>
            <form action="#" id="filter" method="post" accept-charset="utf-8" class=" fill-up">
              <div class="row">
                <div class="col-md-2"><input name="filter[number]" type="number" class="form-control" placeholder="N° de orden"   /> </div>
                <div class="col-md-3"><input name="filter[customer]" type="text" class="form-control" placeholder="Nombre del cliente"/> </div>
                <div class="col-md-2">
                   <input type="text" placeholder="Desde"  class="form-control datepicker" name="filter[from]" required="required">

                </div>
                <div class="col-md-2">
                  <input type="text" placeholder="Hasta"  class="form-control datepicker" name="filter[to]" required="required">

                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-filter "></span></button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content padded">
              <div class="row">
                <div class="col-md-12">
<?php if (isset($filters)):?>
<table class="table table-responsive"  id="dataTables">
                    <thead>
                      <tr>
                        <th>Mes</th>
                        <th>N° Orden</th>
                        <th>N° Factura</th>
                        <th>N° Guía</th>
                        <th>Cliente</th>
                        <th>Tipo de documento</th>
                        <th>Responsable</th>
                        <th>Motivo</th>
                        <th>Etapa</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
<?php foreach ($documents as $document):?>
                        <tr>
                          <td><?=$document->doc_month?></td>
                          <td><?=$document->doc_ordernumber?></td>
                          <td><?=$document->doc_salenumber?></td>
                          <td><?=$document->doc_guidenumber?></td>
                          <td><?=$document->doc_customer?></td>
                          <td><?=$document->doc_ordertype?></td>
                          <td><?=$document->res_name?></td>
                          <td><?=$document->mot_name?></td>
                          <td><?=$document->sta_name?></td>
                          <td><?=$document->con_date?></td>
                        </tr>
<?php endforeach?>
</tbody>
                  </table>
<?php endif?>
                </div>
              </div>
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
    //console.log(loadingDiv);

    $('.datepicker').datepicker({
              locale:'es',
              language:'es',
              regional:'es',
              dateFormat: 'dd-mm-yy',
              beforeShow: function() {
                  setTimeout(function(){
                      $('.ui-datepicker').css('z-index', 99999999999999);
                  }, 0);
              }
            });

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
<?php if (isset($filters)):?>

      $("[name='filter[number]']").val("<?=$filters['number']?>");
      $("[name='filter[customer]']").val("<?=$filters['customer']?>");


      $("[name='filter[to]']").val("<?=$filters['to']?>");
      $("[name='filter[from]']").val("<?=$filters['from']?>");
<?php endif?>

  })
</script>