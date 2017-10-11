<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
<div class="main-content">
  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Dashboard
          </h3>
          <h5>
            <span>
              Documentos
            </span>
          </h5>
        </div>
        <ul class="list-inline pull-right sparkline-box">
          <li class="sparkline-row">
            <h4 class="blue"><span>Pendientes</span> 847</h4>
            <div class="sparkline big" data-color="blue"><!--25,11,5,28,25--></div>
          </li>
          <li class="sparkline-row">
            <h4 class="green"><span>Recepcionadas</span> 223</h4>
            <div class="sparkline big" data-color="green"><!-- a 28,26,13,18,8,6,24,19,3,6,19,6--></div>
          </li>
          <li class="sparkline-row">
            <h4 class="red"><span>Totales</span> 7930</h4>
            <div class="sparkline big"><!--16,23,28,8,12,9,25,11,16,16,17,13--></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <div class="box-header">
            <div class="title">Filtros</div>
          </div>
          <div class="box-content padded">
            <form action="#" method="post" accept-charset="utf-8" class=" fill-up">
              <ul class="separate-sections">
                <li class="input">
                  <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del proveedor"  class="" />
                </li>
                <li class="input">
                  <select class="chzn-select" name="filter[datetype] " >
                    <option value="f1">Fecha Entrega logistica a SAC</option>
                    <option value="f2">Fecha de entrega de radicación</option>
                    <option value="f3">Fecha de digitalización Guía</option>
                    <option value="f4">Fecha de digitalización factura recepcionada cliente</option>
                  </select>
                </li>
                <li>
                  <div class="row">
                    <div class="col-md-5">
                      <input class="datepicker" placeholder="DESDE" type="text" name="filter[from]">
                    </div>
                    <div class="col-md-5">
                      <input class="datepicker"  placeholder="HASTA" type="text" name="filter[to]">
                    </div>
                    <div class="col-md-2">
                      <button title="Filtrar" type="submit" class="pull-right btn btn-blue"><i class="icon-filter"> </i></button>
                    </div>

                  </div>
                </li>

              </ul>

            </form>
            <div class="row">
         
              <div class="col-md-12" style="height: 500px;  overflow-y:scroll;" >
                <table id="dataTables" class=" responsive ">
                   <thead>
                     <th>Folio</th>   
                     <th>Proveedor</th>   
                     <th>Fecha</th>   
                   </thead>
                   
                </table>
              </div>
           
          </div>
          </div>
          
        </div>
      </div>

      <div class="col-md-8">
        <div class="box">
          <div class="box-header">
            <div class="title">Documentos digitalizados y pendientes por mes (Últimos tres meses) </div>
          </div>

          <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">
                <canvas id="canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <div class="title">Promedio de días de retorno </div>
          </div>

          <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">
                <canvas id="canvas3"></canvas>
              </div>
            </div>
          </div>
        </div>
         <div class="box">
          <div class="box-header">
            <div class="title">Documentos pendientes por digitalizar </div>
          </div>

          <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" type="text/javascript" ></script>

<script>
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
        sPaginationType: "full_numbers",
        sDom: "<\"table-header\"fl>t<\"table-footer\"ip>"});

var ctx = document.getElementById("canvas").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php  ksort($months); echo implode(",", $months) ?>],
        datasets: [

        {
            label: '#Facturas digitalizadas',
            data: [<?php echo  implode(",", $facturas) ?>],
            backgroundColor: "rgba(0,255,0,0.3)",
            borderWidth: 1,
        },
        {
            label: '#Facturas pendientes de digitalizar',
            data: [<?php echo implode(",", $facturasPendientes) ?>],
            backgroundColor: "rgba(255,0,0,0.3)",
                      borderWidth: 1
        },
        {
            label: '#Guías digitalizadas',
            data: [<?php echo implode(",", $guias) ?>],
             backgroundColor: "rgba(192,192,192,0.3)",
            borderWidth: 1
        },
        {
            label: '#Guías pendientes de digitalizar',
            data: [<?php echo implode(",", $guiasPendientes) ?>],
             backgroundColor: "rgba(255,0,0,0.6)",
             
            borderWidth: 1
        },


      ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx3 = document.getElementById("canvas3").getContext('2d');
var myChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: [<?php echo implode(",", $dataRetorno['dias']) ?>],
        datasets: [

        {
            label: '#Días de retorno',
            data: [<?php echo implode(",", $dataRetorno['prom']) ?>],
           
            borderWidth: 1
        }


      ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script> 
