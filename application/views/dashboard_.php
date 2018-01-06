<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    .table-condensed > thead > tr > th, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > tbody > tr > td, .table-condensed > tfoot > tr > td .a-right{
      text-align: right !important;
    }
    </style>
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Dashboard</h3>
    </div>
  </div>
  <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content ">
            <form action="#" method="post" accept-charset="utf-8" class=" fill-up">
                  <div class="row">
                    <div class="col-md-2"></div>
                    <!--div class="col-md-3">
                       <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del cliente"  class="" />
                    </div-->
                    <div class="col-md-2">
                      <select placeholder="AÑO" class="form-control "  name="filter[year]">
                          <option value=" " selected="selected" >AÑO</option>
                          <option value="2017" >2017</option>
                          <option value="2018" >2018</option>
                          <option value="2019" >2019</option>
                          <option value="2020" >2020</option>
                          <option value="2021" >2021</option>

                      </select>
                    </div>
                    <div class="col-md-2">
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
                     <div class="col-md-1">
                      <button title="Filtrar" type="submit" class="pull-right btn btn-primary"><i class="glyphicon glyphicon-filter"> </i></button>
                    </div>
                  </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4>Documentos por estado de digitalización</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="x_panel" style=" height:400px;" >
          <div class="x_title">
            <div class="title">Documentos por estado de digitalización</div>
          </div>
          <div class="x_content padded">
            <table class="table table-condensed  " style="font-size: 12px">
              <thead>
                <tr>
                  <th>Estado</th>
                  <th>Facturas</th>
                  <th>N. Crédito</th>
                  <th>N. Débito</th>
                  <th>Guías</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><b>Generados</b></td>
<?php

$totalFacturas = $docsByStatusDigi['Factura'][0]['total']+$docsByStatusDigi['Factura'][1]['total'];
$totalNc       = $docsByStatusDigi['Nota de Crédito'][0]['total']+$docsByStatusDigi['Nota de Crédito'][1]['total'];
$totalNd       = $docsByStatusDigi['Nota de Débito'][0]['total']+$docsByStatusDigi['Nota de Débito'][1]['total'];

?>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> <?=$totalFacturas?></a></b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> <?=$totalNc?></a></b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> <?=$totalNd?></a></b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                </tr>
                <tr>
                  <td><b>Digitalizadas</b></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Factura'][1]['total']?></a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Nota de Crédito'][1]['total']?></a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Nota de Débito'][1]['total']?></a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> 0</a></td>
                </tr>
                <tr>
                  <td><b>Pendientes</b></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Factura'][0]['total']?></a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Nota de Crédito'][0]['total']?></a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Nota de Débito'][0]['total']?></a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> 0</a></td>
                </tr>
                <tr>
                  <td><b>Vencidos</b></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> 0</a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> 0</a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> 0</a></td>
                  <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> 0</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="x_panel">
          <div class="x_title">
            <div class="title">Documentos por estado de digitalización</div>
          </div>
          <div class="x_content padded" style=" height:360px; ">
              <canvas id="canvas" style=""></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="x_panel" style=" height:400px; ">
          <div class="x_title">
            <div class="title">Documentos en Estado Pendientes y Vencidos de Digitalizar.</div>
          </div>
          <div class="x_content padded" >
            <table class="table table-condensed" style="font-size: 12px">
                <thead>
                  <tr>
                    <th align="center">Estado</th>
                    <th align="center">Facturas</th>
                    <th align="center">N. Crédito</th>
                    <th align="center">N. Débito</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-lefth"><b>Pendientes</b></td>
                      <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Factura'][0]['total']?></a></td>
                      <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Nota de Crédito'][0]['total']?></a></td>
                      <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=$docsByStatusDigi['Nota de Débito'][0]['total']?></a></td>
                  </tr>
                  <tr>
                    <td class="text-lefth"><b>Monto $</b></td>
                    <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=number_format($docsByStatusDigi['Factura'][0]['monto'], 0, ',', '.')?></a></td>
                    <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=number_format($docsByStatusDigi['Nota de Crédito'][0]['monto'], 0, ',', '.')?></a></td>
                    <td align="right" class="a-right a-right"><a href="<?=site_url('document/filter')?>"> <?=number_format($docsByStatusDigi['Nota de Débito'][0]['monto'], 0, ',', '.')?></a></td>
                  </tr>
                  <tr>
                    <td class="text-lefth"><b>Vencidos</b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                  </tr>
                  <tr>
                    <td><b>Monto $</b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                     <td align="right" class="a-right a-right" ><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                     <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 0</a></b></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="x_panel">
          <div class="x_title">
            <div class="title">Documentos en Estado Pendientes y Vencidos de Digitalizar.</div>
          </div>
          <div class="x_content padded" style=" height:360px; ">
              <canvas id="canvas2" ></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- documentos por montos -->
    <div class="row">
      <div class="col-md-12">
        <h4>Retorno de documentos</h4>
      </div>
    </div>
    <!-- fin doc monto -->
    <!-- Responsable -->
    <div class="row">
      <div class="col-md-3">
        <div class="x_panel" style=" height:300px; ">
          <div class="x_title">
            <div class="title">Documentos pendientes de retorno por responsable</div>
          </div>
          <div class="x_content padded">
          <table class="table table-condensed" style="font-size: 12px">
              <thead>
                <tr>
                  <th>Responsable</th>
                  <th>Facturas</th>
                  <th>N. Crédito</th>
                  <th>N. Débito</th>
                  <th>Guías</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-lefth"><b>TLS</b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 30</a></b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                    <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
                <tr>
                  <td class="text-lefth"><b>FASTCO</b></td>
                   <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 500</a></b></td>
                   <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 122</a></b></td>
                   <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 499</a></b></td>
                   <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 111</a></b></td>
                </tr>
                <tr>
                  <td class="text-lefth"><b>SAC</b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                  <td align="right" class="a-right a-right"><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="x_panel">
            <div class="x_title">
              <div class="title">Documentos  pendientes de retorno por responsable </div>
            </div>
            <div class="x_content padded" style=" height:260px; ">
              <canvas   id="retorno1"></canvas>
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="x_panel">
            <div class="x_title">
              <div class="title">% de cumplimiento del retorno de documentos </div>
            </div>
            <div class="x_content padded" style=" height:260px; ">
              <canvas   id="retorno2"></canvas>
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="x_panel">
            <div class="x_title">
              <div class="title">Promedio de días de retorno por tipo de documento ($) </div>
            </div>
            <div class="x_content padded" style=" height:260px; ">
              <canvas   id="retorno3"></canvas>
            </div>
        </div>
      </div>

    </div>
    <!-- fin responasble -->
  </div>
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" type="text/javascript" ></script>






<script>

<!-- -->
$(function(){
<?php if (isset($filters)):?>

      $("[name='filter[year]']").val("<?=$filters['year']?>");
      $("[name='filter[month]']").val("<?=$filters['month']?>");
<?php endif?>
});
var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
var ctx = document.getElementById("canvas").getContext('2d');

var barChartData = {
  labels: ["Facturas", "N. Cŕedito", "N. Débito","G. Despacho"],
  datasets: [{
      label: 'Generados',
      backgroundColor: "rgba(82, 191, 61,0.4)",
      borderWidth: 1,
      data: [<?=$totalFacturas?>,<?=$totalNc?>,<?=$totalNd?>,0]
  }, {
      label: 'Digitalizados',
      backgroundColor: "rgba(247, 223, 2, 1)",
      borderWidth: 1,
      data: [<?=$docsByStatusDigi['Factura'][1]['total']?>,<?=$docsByStatusDigi['Nota de Crédito'][1]['total']?>,<?=$docsByStatusDigi['Nota de Débito'][1]['total']?>,0]
  },
  {
      label: 'Pendientes',
      backgroundColor: "rgba(247, 149, 2, 1)",
      borderWidth: 1,
      data: [<?=$docsByStatusDigi['Factura'][0]['total']?>,<?=$docsByStatusDigi['Nota de Crédito'][0]['total']?>,<?=$docsByStatusDigi['Nota de Débito'][0]['total']?>,0]
  },
  {
      label: 'Vencidos',
      backgroundColor: "rgba(247, 2, 2, 1)",
      borderWidth: 1,
      data: [0,0,0,0]
  },
  ]

  /*
  datasets: [{
  label: 'Digitalizados',
  backgroundColor: "rgba(82, 191, 61,0.4)",
    data: [50,60,100,120]
  }, {
  label: 'Pendientes',
  backgroundColor: "rgba(255, 0, 0,0.4)",
  data: [20,21,10,13]
  },

  ]*/

};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
                options: {
                    title:{
                        display:true,
                        text:"Estado de documentos"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,

                },

});
var ctx = document.getElementById("canvas2").getContext('2d');
var barChartData = {
        labels: ["Facturas", "N. Crédito", "N. Débito"],
        datasets: [
        /*{
            label: 'Digitalizados',
            backgroundColor: "rgba(247, 223, 2, 1)",
            data: [<?//=$docsByStatusDigi['Factura'][1]['monto']?>,<?//=$docsByStatusDigi['Nota de Crédito'][1]['monto']?>,<?//=$docsByStatusDigi['Nota de Débito'][1]['monto']?>]
        },*/ {
            label: 'Pendientes',
            data: [<?=$docsByStatusDigi['Factura'][0]['monto']?>,<?=$docsByStatusDigi['Nota de Crédito'][0]['monto']?>,<?=$docsByStatusDigi['Nota de Débito'][0]['monto']?>]
        }, {
            label: 'Vencidos',
            backgroundColor: "rgba(247, 2, 2, 1)",
            data: [0,0,0]
        }],
    };
var myChart = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
                options: {
                    title:{
                        display:true,
                        text:"Montos ($) por estado de documentos"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                        // this callback is used to create the tooltip label
                        label: function(tooltipItem, data) {
                          // get the data label and data value to display
                          // convert the data value to local string so it uses a comma seperated number
                          var dataLabel = data.labels[tooltipItem.index];
                          var value = ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].toLocaleString();

                          // make this isn't a multi-line label (e.g. [["label 1 - line 1, "line 2, ], [etc...]])
                          if (Chart.helpers.isArray(dataLabel)) {
                            // show value on first line of multiline label
                            // need to clone because we are changing the value
                            dataLabel = dataLabel.slice();
                            dataLabel[0] += value;
                          } else {
                            dataLabel += value;
                          }

                          // return the text to display on the tooltip
                          return dataLabel;
                        },
                      }

                    },
                      scales: {
        xAxes: [{
          ticks: {}
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,

            // Return an empty string to draw the tick line but hide the tick label
            // Return `null` or `undefined` to hide the tick line entirely
            userCallback: function(value, index, values) {
                // Convert the number to a string and splite the string every 3 charaters from the end
                value = value.toString();
                value = value.split(/(?=(?:...)*$)/);

                // Convert the array to a string and format the output
                value = value.join('.');
                return '$' + value;
              }
          }
        }]
      },
                    responsive: true,

                },


});
/* retorno*/
var ctx = document.getElementById("retorno1").getContext('2d');
var barChartData = {
            labels: ["TLS", "FASTCO", "SAC"],
            datasets: [{
                label: 'Facturas',
                backgroundColor: "rgba(82, 191, 61,0.4)",
                data: [50,60,100,11]
            }, {
                label: 'N. Cŕedito',
                backgroundColor: "rgba(255, 0, 0,0.4)",
                data: [20,21,10,11]
            }, {
                label: 'N. Débito',
                backgroundColor: "rgba(164, 182, 99, 1)",
                data: [20,21,10,11]
            },
            {
                label: 'G. Despacho',
                backgroundColor: "rgba(111, 141, 1, 1)",
                data: [20,21,10,11]
            }
            ]

        };
var myChart = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
                options: {
                    title:{
                        display:true,
                        text:"Documentos pendientes de retorno por responsable"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,

                },

})

//

var retorno2 = document.getElementById("retorno2").getContext('2d');
var barChartData = {
            labels: ["Facturas", "N. Cŕedito", "N. Débito","G. Despacho"],
            datasets: [{
                label: 'Retornados',
                backgroundColor: "rgba(82, 191, 61,0.4)",
                data: [50,60,100,22]
            }, {
                label: 'Pendientes',
                backgroundColor: "rgba(255, 0, 0,0.4)",
                data: [20,21,10,20]
            }]

        };

var myChart = new Chart(retorno2, {
    type: 'horizontalBar',
    data: barChartData,
                options: {
                    title:{
                        display:true,
                        text:"Estado de retorno documentos"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                         callbacks: {
                        label: function(tooltipItem, data) {
                          //get the concerned dataset
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          //calculate the total of this data set
                          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                            return previousValue + currentValue;
                          });
                          //get the current items value
                          var currentValue = dataset.data[tooltipItem.index];
                          //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
                          var precentage = Math.floor(((currentValue/total) * 100)+0.5);

                          return precentage + "%";
                        }
                    }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scaleLabel: {
           display: true,
           labelString: "Percentage"
       }

                },

});
/* retorno tres*/
 var retorno2 = document.getElementById("retorno3").getContext('2d');
var barChartData = {
            labels: ["1","2","4","5","6","7","8","9","10","11","12","13"],
            datasets: [{
                label: 'Facturas',
                fill:false,
                backgroundColor: "rgba(82, 191, 61,0.4)",
                data: [50,60,100,11,50,60,100,11,50,60,100,11,5]
            }, {
                label: 'N. Cŕedito',
                fill:false,
                backgroundColor: "rgba(255, 0, 0,0.4)",
                data: [53,61,65,12,51,62,101,12,51,65,80,14,5]
            }, {
                label: 'N. Débito',
                fill:false,
                backgroundColor: "rgba(164, 182, 99, 1)",
                data: [53,61,25,20,52,64,102,11,50,0,60,12,6]
            },
            {
                label: 'G. Despacho',
                fill:false,
                backgroundColor: "rgba(111, 141, 1, 1)",
                data: [55,62,65,12,51,62,101,12,51,65,80,14,5]
            }
            ]
        };

var myChart = new Chart(retorno2, {
    type: 'line',
    data: barChartData,
          options: {
          responsive: true,
          maintainAspectRatio: false,
          tooltips: {
                    mode: 'index',
                    intersect: false,

                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Días de retorno'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Cantidad'
                        }
                    }]
                }
      }


});

 /* fiun de retorno*/

</script>
