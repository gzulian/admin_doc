
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Carga masiva</h3>
    </div>
  </div>
  <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="title">Cargar Archivo <i id="sectionFolio"></i></div>
          </div>
          <div class="x_content padded">
              <form  id="" name="form" action="#" enctype="multipart/form-data" method="post" >
                <div class="row">
                  <div class="col-md-3">
                     <label class="control-label">Archivo</label>
                      <input accept=".xls,.xlsx,.csv" type="file" required="required" class="file" name="file">
                      
                  </div>

                 
                  <div class="col-md-2">
                      
                      <button  id="sub" class="pull-left  btn btn-primary" type="submit"><span class="glyphicon glyphicon-upload "></span> Cargar</button>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <?php if (isset($response)): ?>
                    <?php if (isset($response['success'])): ?>
                        <div class="alert-success alert alert-dismissable">
                          <?=$response['success']?>
                        </div>
                    <?php endif ?>
                    <?php if (isset($response['errors'])): ?>
                      <?php foreach ($response['errors'] as $value): ?>
                        <div class="alert-danger alert alert-dismissable">
                          <?=$value?>
                        </div>
                      <?php endforeach ?>
                    <?php endif ?>
                  <?php endif ?>

                  <div id="errors"></div>
                </div>
              </form>

          </div>
        </div>
      </div>
      </div>
      <br>
      <div class="row">
      <div class="col-md-12">
        <?php   if (isset($response['documents'])):?>
        <div class="x_panel">
          <div class="x_title">
            <div class="title">Documentos cargados<i id=""></i></div>
          </div>
           <div class="x_content padded">
            <div class="row">
              <div class="col-md-12"  id="">
                <table id="table" class=" table-striped table table-responsive" >
                  <thead>
                    <tr>
                      <th>N° de orden</th>
                      <th>Tipo orden</th>
                      <th>N° Legal</th>
                      <th>Guías</th>
                      <th>Fecha documento</th>
                      <th>Cliente</th>
                      <th>Monto ($)</th>
                      <th>Monto (USD)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($response['documents'] as $doc): ?>
                      <tr>
                        <td><?=$doc->get('doc_ordernumber')?></td>
                        <td><?=$doc->get('doc_ordertype')?></td>
                        <td><?=$doc->get('doc_salenumber')?></td>
                        <td><?=$doc->get('doc_guidenumber')?></td>
                        <td><?=$doc->get('doc_facdate')?></td>
                        <td><?=$doc->get('doc_customer')?></td>
                        <td><?=$doc->get('doc_monto')?></td>
                        <td><?=$doc->get('doc_montousd')?></td>
                      </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
        </div>
        <?php endif ?>

      </div>
    </div>
  </div>
</div>
<div style="margin-left: 50%" id="loadingDiv">
    <img id="loading-image" src="<?=base_url('resources/images/ajax-loader.gif')?>" alt="Loading..." />
</div>
<script src="<?=base_url('resources/jquery-form.js')?>" type="text/javascript" charset="utf-8" ></script>



<script src="<?=base_url('resources/js/jquery-ui/jquery-ui.js')?>"></script>
<script src="<?=base_url('resources/js/jquery-ui/spanish_language.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/vendors/datatables.net-bs/DATATABLE.css')?>"/>

<script type="text/javascript" src="<?=base_url('resources/vendors/datatables.net-bs/DATATABLE.js')?>"></script>


 <script type="text/javascript">


    $(function() {
      
      var loadingDiv = $("#loadingDiv");
      loadingDiv.hide();

      var bar = $('.bar');
      var percent = $('.percent');
      var status = $('#estado');
      /*
      $("#form").submit(function(){
        $("#sub").prop("disabled",true);
      });
      */
    var table  = $("#table").DataTable( {"oLanguage": {
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
      }
      });

/*/
    $('form').ajaxForm({

        beforeSend: function() {
          loadingDiv.show();
          status.empty();
          var percentVal = '0%';
          bar.width(percentVal);
          percent.html(percentVal);

        },
        uploadProgress: function(event, position, total, percentComplete) {
           // console.log(event);
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            //bar.attr("data-percent",percentVal);
           // percent.html(percentVal);
        },
        complete: function(xhr) {
           console.log(xhr.responseText);
           try {
              var obj = $.parseJSON(xhr.responseText);
              if(typeof obj.errors != 'undefined'){
                $.each(obj.errors, function (key, data) {
                    $("#errors").append('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="icon-warning-sign "></span> '+data+'</div>');
                })
              }
              if(typeof obj.documents != 'undefined'){
                $.each(obj.documents, function (key, data) {
                   table.fnAddData( {
                      0:data._columns.doc_serial,
                      1:data._columns.doc_documentdate,
                      2:data._columns.doc_customer,
                      3:data._columns.doc_ordernumber,
                      4:data._columns.doc_ordertype,
                      5:data._columns.doc_guidenumber,
                      6:data._columns.doc_monto,
                  } );
                })
              }
            }
          catch (err) {
            // Do something about the exception here
          }
            loadingDiv.hide();
            status.html("100% cargado");
        }
    });
    $(".alert-info").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-info").slideUp(500);
});
*/
});


</script>