<style type="text/css" media="screen">
  .doc{
    cursor:pointer;
  }
  .selecccionada{
    background-color: rgba(182, 99, 135, 0.11);
  }
</style>
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Estado de retorno de documentos</h3>
    </div>
  </div>
  <div class="clearfix"></div>


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h3 class="title">Filtros</h3>
          </div>
          <div class="x_content padded">
            <div id="errors">

            </div>
            <form action="#" id="filter" method="post" accept-charset="utf-8" class=" fill-up">
              <div class="row">
                <div class="col-md-2"><input name="filter[folio]" type="number" class="form-control" placeholder="Número de factura"   /> </div>
                <div class="col-md-2"><input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del cliente"/> </div>
                <div class="col-md-1">
                   <select placeholder="AÑO" class="form-control "  name="filter[year]">
                      <option value=" " selected="selected" >AÑO</option>
                      <option value="2017" >2017</option>
                      <option value="2018" >2018</option>
                      <option value="2019" >2019</option>
                      <option value="2020" >2020</option>
                      <option value="2021" >2021</option>

                    </select>
                </div>
                <div class="col-md-1">
                  <select placeholder="AÑO" class="form-control "  name="filter[month]">
                    <option value=" " selected="selected">MES</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-filter"></span></button>
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
                  <table class="table table-responsive"  id="dataTables">
                    <thead>
                      <tr>
                        <th>N° Documento</th>
                        <th>Mes</th>
                        <th>Cliente</th>
                        <th>Tipo de documento</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha Término</th>
                        <th>Tiempo ciclo</th>
                      </tr>
                    </thead>
                    <tbody>
<?php foreach ($documents as $document):?>
<tr>

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

<script>
  $(function(){
    //console.log(loadingDiv);


      var table  = $("#dataTables").DataTable( {"oLanguage": {
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
      },iDisplayLength: 5,
        bJQueryUI: false,
        bAutoWidth: false,
        bDeferRender: true,
        sPaginationType: "full_numbers",

        sDom: "<\"table-header\"fl>t<\"table-footer\"ip>",
        sScrollY:        "200px",
        sScrollCollapse: true,


      });
  })
</script>