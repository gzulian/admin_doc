<div class="main-content">
  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-file"></i>
            Facturas
          </h3>
          <h5>
            <span>
              Recepción
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
              <label class="control-label">Folio</label>
              <input name="filter[folio]" type="number" class="form-control" placeholder="5555555"   />
              <label class="control-label">Proveedor</label>
              <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del proveedor"/>
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
                  <div class="col-md-5">
                    <label class="control-label">Desde: </label>
                    <input class="datepicker" type="text" name="filter[from]">
                  </div>
                  <div class="col-md-5">
                    <label class="control-label">Hasta: </label>
                    <input class="datepicker" type="text" name="filter[to]">
                  </div>
                  <div class="col-md-2">
                    <br/> 
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
            <div class="title">Documento: <i id="sectionFolio"></i></div>
          </div>
          <div class="box-content padded">
           <div class="row">
              <div class="col-md-12">  
                <div class="accordion" id="accordion1">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Actualización de datos
                      </a>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse in">
                      <div class="accordion-inner padded">
                        <form action="#" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="form-group">
                              <label class="control-label col-lg-2">Retorno</label>
                              <div class="col-lg-4">
                                <input type="text" name="document[doc_return]" class="form-control" />
                              </div>
                              <label class="control-label col-lg-2">A radicación:</label>
                              <div class="col-lg-4">
                                <input type="radio" class="icheck" value="1" name="document[doc_radicacion]">SI
                                <input type="radio" class="icheck" value="0" name="document[doc_radicacion]">NO
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-3">Fecha entrega logistica a SAC</label>
                              <div class="col-lg-3">
                                <input type="text" class="datepicker form-control"  name="document[doc_fsac]" />
                              </div>
                              <label class="control-label col-lg-3">Fecha entrega a radicación</label>
                              <div class="col-lg-3">
                                <input type="text" class="datepicker form-control"  name="document[doc_fradicacion]" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-3">Fecha digitalización guía </label>
                              <div class="col-lg-3">
                                <input type="text" class="datepicker form-control"  name="document[doc_guidedate]" />
                              </div>
                              <label class="control-label col-lg-3">Fecha digitalización factura recepcionada por cliente</label>
                              <div class="col-lg-3">
                                <input type="text" class="datepicker form-control"  name="document[doc_facdate]" />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label class="control-label ">Observación  Bodega </label>
                                <textarea class="form-control"  name="document[doc_obsbodega]"></textarea>
                              </div>
                              <div class="col-md-6">
                                <label class="control-label ">Observación  SAC</label>
                                <textarea class="form-control"  name="document[doc_obssac]" ></textarea>
                              </div>
                            </div>
                            <br/>
                            <fieldset>
                              <legend><h5>TLS</h5></legend>
                            <div class="row">
                              <div class="col-md-3">
                              <label class="control-label">Fecha entrega TLS</label>
                              </div>
                              <div class="col-md-3">
                                <input type="text" class="datepicker form-control"  name="document[doc_ftls]" />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                
                                <label class="control-label ">Observación  TLS 1 </label>
                                <textarea class="form-control"  name="document[doc_obstls1]"></textarea>
                              </div>
                              <div class="col-md-6">
                                <label class="control-label ">Observación  TLS 2 </label>
                                <textarea class="form-control"  name="document[doc_obstls2]" ></textarea>
                              </div>
                            </div>
                            </fieldset>
                            <br/>
                            <div class="row">
                              <div class="col-md-12">
                                <button type="submit" class="pull-right btn btn-green btn-lg"><i class="icon-save">  </i>Guardar</button>
                              </div>
                            </div>

                            

                            
                          
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion" id="accordion2">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Datos generales
                      </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                      <div class="accordion-inner padded">
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Mes: </label>
                            <span id="month"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Ciudad: </label>
                            <span id="city"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Número de orden: </label>
                            <span id="ordernumber"></span>
                          </div>
                           <div class="col-md-3">
                            <label class="control-label">Tipo de orden: </label>
                            <span id="ordertype"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Nombre cliente 1: </label>
                            <span id="month"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Nombre cliente 2: </label>
                            <span id="city"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Fecha: </label>
                            <span id="documentdate"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">N° de factura: </label>
                            <span id="facturenumber"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">N° de guía: </label>
                            <span id=""></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">N° Orden de compra: </label>
                            <span id="saleorder"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Ejecutivo: </label>
                            <span id="executive"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                              <label class="control-label">Monto ($): </label>
                              <span id="monto"></span>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Monto (usd): </label>
                              <span id="montousd"></span>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Transportista: </label>
                              <span id="transport"></span>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Almacen: </label>
                              <span id="depot"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha estimada factura de log a sac: </label>
                            <span id="datelogtosac"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Días de retorno logistica: </label>
                            <span id="daylogic"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Status logistica: </label>
                            <span id="logicstatus"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha estimada factura de TLS: </label>
                            <span id="datetls"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Días de confirmación SETS: </label>
                            <span id="daysets"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Status SAC: </label>
                            <span id="statussac"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha estimada factura radicación: </label>
                            <span id="dateradicacion"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Días de confirmación TLS: </label>
                            <span id="daytls"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Status FASTCO: </label>
                            <span id="statusfastco"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha radicación factura: </label>
                            <span id="dateradicacionfact"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Fecha digitalazación factura cliente: </label>
                            <span id="datedigi"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Causal: </label>
                            <span id="causal"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Responsable: </label>
                            <span id="responsible"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

