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

      
    </div>
    <br>
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
                  <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del cliente"  class="" />
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
          </div>
        </div>  
         <div class="box">
          <div class="box-header">
            <div class="title">Estado Documentos</div>
          </div>
          <div class="box-content padded">
            <table class="table table-responsive">
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
                  <td><b>Generadas</b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 30</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
                <tr>
                  <td><b>Digitalizadas</b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 30</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
                <tr>
                  <td><b>Pendientes</b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 30</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
                <tr>
                  <td><b>Vencidos</b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 30</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>  
        <div class="box">
          <div class="box-header">
            <div class="title">Consulta de documentos</div>
          </div>
          <div class="box-content ">
          <table class="table table-responsive">
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
                  <td><b>Pendientes</b></td>
                    <td><b><a href="<?=site_url('document/filter')?>"> 30</a></b></td>
                    <td><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                    <td><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                    <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
                <tr>
                  <td><b>Monto $</b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 500</a></b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                   
                  
                </tr>
                <tr>
                  <td><b>Vencidos</b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 31</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 34</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 35</a></b></td>
                </tr>
                <tr>
                  <td><b>Monto $</b></td>
                  <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                   <td><b><a href="<?=site_url('document/filter')?>"> 33.333.111</a></b></td>
                </tr>
              </tbody>
            </table>
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
