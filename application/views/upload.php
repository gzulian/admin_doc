<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Carga masiva</h3>
    </div>
  </div>
  <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-3">
        <div class="x_panel">
          <div class="x_title">
            <div class="title">Cargar Archivo <i id="sectionFolio"></i></div>
          </div>
          <div class="x_content padded">

<?php if (isset($errors)):?>
              <?php foreach ($errors as $key => $value):?>
                  <div class="alert alert-info"><span class="icon-warning-sign "></span><?=$value?></div>
<?php endforeach?>
              <?php endif?>
              <form  id="form" name="form" action="<?=site_url('document/uploadAjax');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-12">
                     <label class="control-label">Archivo</label>
                      <input accept=".xls,.xlsx,.csv" type="file" class="file" name="file">
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-md-9">
                      <button  id="sub" class="pull-right  btn btn-green" type="submit"><i class="icon-upload"></i> Cargar</button>
                  </div>
                  <div class="col-md-3">

                    <div class="progress " style="height: 25px !important ">
                      <div  id="progressBar" class="progress-bar progress-blue tip bar" title="0" data-percent="0" style="width: 0%"><span class="sr-only percent"> 0% Complete</span></div>
                    </div>
                    <div id="estado"></div>

                  </div>
                </div>
              </form>
              <div id="errors">
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="x_panel">
          <div class="x_title">
            <div class="title">Documentos cargados<i id="sectionFolio"></i></div>
          </div>
           <div class="x_content padded">
            <div class="row">
              <div class="col-md-12">
                <table id="table" class=" table-striped table table-responsive">
                  <thead>
                    <tr>
                      <th>Folio</th>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>N°orden</th>
                      <th>Tipo orden</th>
                      <th>N° guía</th>
                      <th>N° orden de compra</th>
                      <th>Monto ($)</th>
                      <th>Monto (USD)</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="margin-left: 50%" id="loadingDiv">
    <img id="loading-image" src="<?=base_url('resources/images/ajax-loader.gif')?>" alt="Loading..." />
</div>
<script src="<?=base_url('resources/jquery-form.js')?>" type="text/javascript" charset="utf-8" ></script>
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
        "sSearch":"Buscar",
        "oPaginate": {
        "sFirst":      "Primera",
        "sLast":       "Última",
        "sNext":       "Sig",
        "sPrevious":   "Anteriror"
        }
      },iDisplayLength: 20,
        bJQueryUI: false,
        bAutoWidth: false,
        sPaginationType: "full_numbers",
        sDom: "<\"table-header\"fl>t<\"table-footer\"ip>"});


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
                    6:data._columns.doc_saleorder,
                    7:data._columns.doc_monto,
                    8:data._columns.doc_montousd,
                } );
              })
            }
            loadingDiv.hide();
            status.html("100% cargado");
        }
    });
    $(".alert-info").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-info").slideUp(500);
});
});


</script>