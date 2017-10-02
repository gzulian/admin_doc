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
              Facturas
            </span>
          </h5>
        </div>
        <ul class="list-inline pull-right sparkline-box">
          <li class="sparkline-row">
            <h4 class="blue"><span>Pendientes</span> 847</h4>
            <div class="sparkline big" data-color="blue"><!--25,11,5,28,25,19,27,6,4,23,20,6--></div>
          </li>
          <li class="sparkline-row">
            <h4 class="green"><span>Recepcionadas</span> 223</h4>
            <div class="sparkline big" data-color="green"><!--28,26,13,18,8,6,24,19,3,6,19,6--></div>
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
              <label class="control-label">Proveedor</label>
              <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del proveedor"  class="" />
              <label class="control-label">Fecha</label>
              <select class="chzn-select" name="filter[datetype] " >
                <option value="f1">Fecha Entrega logistica a SAC</option>
                <option value="f2">Fecha de entrega de radicación</option>
                <option value="f3">Fecha de digitalización Guía</option>
                <option value="f4">Fecha de digitalización factura recepcionada cliente</option>
              </select>
              <br/>
              <br/>
              <div class="row">
                  <div class="col-md-1">
                    <label class="control-label">Desde: </label>
                  </div>
                  <div class="col-md-4">
                    <input class="datepicker" type="text" name="filter[from]">
                  </div>
                  <div class="col-md-1">
                    <label class="control-label">Hasta: </label>
                  </div>
                  <div class="col-md-4">
                    <input class="datepicker" type="text" name="filter[to]">
                  </div>
                  <div class="col-md-2">
                    <button title="Filtrar" type="submit" class="pull-right btn btn-blue"><i class="icon-filter"> </i></button>
                  </div>
                  
              </div>

            </form>
          </div>
          <div class="row">
            <div class="padded">
              <div class="col-md-12" style="height: 500px;  overflow-y:scroll;" >
                <table id="dataTables" class="dTable responsive ">
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
            <div class="title">Facturas por período</div>
          </div>

          <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">
                <div class="spark-composite"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <div class="title">Facturas recibidas vs ingresadas por día </div>
          </div>

          <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">
                <div class="xcharts-bar" style="width: 100%; height: 300px"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <div class="title">Facturas recibidas vs ingresadas </div>
          </div>

          <div class="box-content padded">
            <div class="row">
              <div class="col-md-12">
                <div class="spark-pie"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
