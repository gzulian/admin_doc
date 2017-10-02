<div class="main-content">
  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-upload"></i>
            Carga masiva de facturas
          </h3>
          <h5>
            <span>
              Facturas
            </span>
          </h5>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <div class="box-header">
            <div class="title">Cargar Archivo <i id="sectionFolio"></i></div>
          </div>
          <div class="box-content padded">
              <form  id="form" name="form" action="<?=site_url('document/upload');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">  
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
                    
                    <!--div class="progress " style="height: 25px !important ">
                      <div  id="progressBar" class="progress-bar progress-blue tip bar" title="0" data-percent="0" style="width: 0%"><span class="sr-only percent"> 0% Complete</span></div>
                    </div-->
                    <div id="estado"></div>

                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box">
          <div class="box-header">
            <div class="title">Documentos cargados<i id="sectionFolio"></i></div>
          </div>
           <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">  
                <table class="dTable responsive">
                  <thead>
                    <tr>
                      <th>Folio</th>
                      <th>Nombre cliente</th>
                      <th>N° de orden</th>
                      <th>N° de guía</th>
                      <th>Tipo orden</th>
                      <th>Fecha</th>
                      <th>N° oden de compra</th>
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
<script src="<?=base_url('resources/jquery-form.js')?>" type="text/javascript" charset="utf-8" ></script>
 <script type="text/javascript">

    $(function() {

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#estado');
    $("#form").submit(function(){
      $("#sub").prop("disabled",true);

    });

    /*
    $('form').ajaxForm({

        beforeSend: function() {
          console.log("dsf");
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
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
        }
    });*/
}); 


</script>