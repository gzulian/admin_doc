<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    th{
      text-align: left !important;
    }
    canvas{

    }
    .number{
      text-align: right !important ;
    }
    </style>

<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h4>Documentos en proceso de radicación: <span class="badge  bg-blue ">  <?=$totalDocEnRadicacion?></span></h4>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row top_tiles">
    <!--  backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'], -->
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats ">
          <div style="margin-right: 4px;" class="pull-right">
            <span class="chart" data-percent="<?=calculate($totalDocEnRadicacion, $docsByStatus['Factura'][2]['total'])?>">
              <span class="percent"><?=calculate($totalDocEnRadicacion, $docsByStatus['Factura'][2]['total'])?></span>
            </span>
          </div>
        <div class="count"><?=number_format($docsByStatus['Factura'][2]['total'], 0, ',', '.')?></div>
        <h3>Facturas</h3>
        <p>$ <?=number_format($docsByStatus['Factura'][2]['monto'], 0, ',', '.')?></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
         <div style="margin-right: 4px;" class="pull-right">
            <span class="chart" data-percent="<?=calculate($totalDocEnRadicacion, $docsByStatus['G. Despacho'][2]['total'])?>">
              <span class="percent"><?=calculate($totalDocEnRadicacion, $docsByStatus['G. Despacho'][2]['total'])?></span>
            </span>
          </div>
        <div class="count"><?=number_format($docsByStatus['G. Despacho'][2]['total'], 0, ',', '.')?></div>
        <h3>G. despacho</h3>
        <p>$ <?=number_format($docsByStatus['G. Despacho'][2]['monto'], 0, ',', '.')?></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
         <div style="margin-right: 4px;" class="pull-right">
            <span class="chart" data-percent="<?=calculate($totalDocEnRadicacion, $docsByStatus['Nota de Débito'][2]['total'])?>">
              <span class="percent"><?=calculate($totalDocEnRadicacion, $docsByStatus['Nota de Débito'][2]['total'])?></span>
            </span>
          </div>
        <div class="count"><?=number_format($docsByStatus['Nota de Débito'][2]['total'], 0, ',', '.')?></div>
        <h3>N. Débito</h3>
        <p>$ <?=number_format($docsByStatus['Nota de Débito'][2]['monto'], 0, ',', '.')?></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
          <div style="margin-right: 4px;" class="pull-right">
            <span class="chart" data-percent="<?=calculate($totalDocEnRadicacion, $docsByStatus['Nota de Crédito'][2]['total'])?>">
              <span class="percent"><?=calculate($totalDocEnRadicacion, $docsByStatus['Nota de Crédito'][2]['total'])?></span>
            </span>
          </div>
        <div class="count"><?=number_format($docsByStatus['Nota de Crédito'][2]['total'], 0, ',', '.')?></div>
        <h3>N. Crédito</h3>
        <p>$ <?=number_format($docsByStatus['Nota de Crédito'][2]['monto']*-1, 0, ',', '.')?></p>
      </div>
    </div>
  </div>
  <div class="x_panel">
    <div class="x_content">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content2" status="1" role="tab" id="okTab" data-toggle="tab" aria-expanded="false">Estado de documentos <span class="badge" id="okLabel" ></span> </a>
          </li>
          <li role="presentation" ><a href="#tab_content1" status="0" id="pendingTab" role="tab" data-toggle="tab" aria-expanded="true">Retorno de documentos <span class="badge" id="pendingLabel" ></span></a>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <!-- graficos de retorno -->
          <div role="tabpanel" class="tab-pane fade " id="tab_content1" aria-labelledby="pendingTab">
              <div class="row">
                <div class="col-md-4 col-xs-12">
                  <div class="x_panel" style=" height:300px;" >
                    <div class="x_title">
                      <div class="title">Documentos pendientes por operador</div>
                    </div>
                    <div class="x_content padded">
                      <table class="table table-condensed  " >
                        <thead>
                          <tr>
                            <th>Responsable</th>
                            <th>TLS</th>
                            <th>FASTCO</th>
                            <th>SAC</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <th>Facturas</th>
                              <td class="number"><?=number_format($docsByResponsable['Factura']['TLS'], 0, ',', '.')?></td>
                              <td class="number"><?=number_format($docsByResponsable['Factura']['FASTCO'], 0, ',', '.')?></td>
                              <td class="number"><?=number_format($docsByResponsable['Factura']['SAC'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th>G. Despacho</th>
                              <td class="number"><?=number_format($docsByResponsable['G. Despacho']['TLS'], 0, ',', '.')?></td>
                              <td class="number"> <?=number_format($docsByResponsable['G. Despacho']['FASTCO'], 0, ',', '.')?></td>
                              <td class="number"> <?=number_format($docsByResponsable['G. Despacho']['SAC'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th>N. Crédito</th>
                              <td class="number"><?=number_format($docsByResponsable['Nota de Crédito']['TLS'], 0, ',', '.')?></td>
                              <td class="number"> <?=number_format($docsByResponsable['Nota de Crédito']['FASTCO'], 0, ',', '.')?></td>
                              <td class="number"> <?=number_format($docsByResponsable['Nota de Crédito']['SAC'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th>N. Débito</th>
                              <td class="number"><?=number_format($docsByResponsable['Nota de Débito']['TLS'], 0, ',', '.')?></td>
                              <td class="number"> <?=number_format($docsByResponsable['Nota de Débito']['FASTCO'], 0, ',', '.')?></td>
                              <td class="number"> <?=number_format($docsByResponsable['Nota de Débito']['SAC'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th class="number">TOTAL</th>
                              <th class="number"><?=number_format($totalTLS, 0, ',', '.')?></th>
                              <th class="number"><?=number_format($totalFASTCO, 0, ',', '.')?></th>
                              <th class="number"><?=number_format($totalSAC, 0, ',', '.')?></th>
                            </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-xs-12">
                  <div class="x_panel" style=" height:300px;">
                    <div class="x_title">

                    </div>
                    <div class="x_content padded" >


                        <canvas id="g9"  height="100px">

                        </canvas>
                    </div>
                  </div>

                </div>
              </div>
              <!-- div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel" style=" height:300px;" >
                    <div class="x_title">
                      <div class="title">Promedio de días de retorno</div>
                    </div>
                    <div class="x_content padded">
                      <table class="table table-condensed  " >
                        <thead>
                          <tr>
                            <th>Documento</th>
                            <th>Promedio de retorno</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <th>Facturas</th>
                              <td class="number"><?//=number_format($docsByResponsable['Factura']['TLS'], 0, ',', '.')?></td>
                              <td class="number"><?//=number_format($docsByResponsable['Factura']['TLS'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th>G. Despacho</th>
                              <td class="number"><?//=number_format($docsByResponsable['G. Despacho']['TLS'], 0, ',', '.')?></td>
                              <td class="number"><?//=number_format($docsByResponsable['G. Despacho']['TLS'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th>N. Crédito</th>
                              <td class="number"><?//=number_format($docsByResponsable['G. Despacho']['TLS'], 0, ',', '.')?></td>
                              <td class="number"><?//=number_format($docsByResponsable['Nota de Crédito']['TLS'], 0, ',', '.')?></td>
                            </tr>
                            <tr>
                              <th>N. Débito</th>
                              <td class="number"><?//=number_format($docsByResponsable['G. Despacho']['TLS'], 0, ',', '.')?></td>
                              <td class="number"><?//=number_format($docsByResponsable['Nota de Débito']['TLS'], 0, ',', '.')?></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12">
                  <div class="x_panel" style=" height:300px;">
                    <div class="x_title">

                    </div>
                    <div class="x_content padded" >


                        <canvas id="g10"  height="100px">

                        </canvas>
                    </div>
                  </div>

                </div>
              </div -->
               <div class="row">
                <div class="col-md-4 col-xs-12">
                  <div class="x_panel" style=" height:300px;" >
                    <div class="x_title">
                      <div class="title">% de cumplimiento de retorno</div>
                    </div>
                    <div class="x_content padded">
                      <table class="table table-condensed  " >
                        <thead>
                          <tr>
                            <th>Documento</th>
                            <th>Cantidad de retorno</th>
                            <th>Total</th>
                            <th>% de cumplimiento </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <th>Facturas</th>
                              <td class="number"><?=number_format($docsByStatus['Factura'][3]['total']+$docsByStatus['Factura'][5]['total'], 0, ',', '.')?></td>
                              <td class="number"><?=number_format($totalFacturaEnProcesoDeRetorno, 0, ',', '.')?></td>
                              <td class="number"><?=calculate($totalFacturaEnProcesoDeRetorno, $docsByStatus['Factura'][3]['total']+$docsByStatus['Factura'][5]['total'])?> %</td>
                            </tr>
                            <tr>
                              <th>G. Despacho</th>
                              <td class="number"><?=number_format($docsByStatus['G. Despacho'][3]['total']+$docsByStatus['G. Despacho'][5]['total'], 0, ',', '.')?></td>
                              <td class="number"><?=number_format($totalGuiaEnProcesoDeRetorno, 0, ',', '.')?></td>
                              <td class="number"><?=calculate($totalGuiaEnProcesoDeRetorno, $docsByStatus['G. Despacho'][3]['total']+$docsByStatus['G. Despacho'][5]['total'])?> %</td>

                            </tr>
                            <tr>
                              <th>N. Crédito</th>
                              <td class="number"><?=number_format($docsByStatus['Nota de Crédito'][3]['total']+$docsByStatus['Nota de Crédito'][5]['total'], 0, ',', '.')?></td>
                              <td class="number"><?=number_format($totalNCEnProcesoDeRetorno, 0, ',', '.')?></td>

                              <td class="number"><?=calculate($totalNCEnProcesoDeRetorno, $docsByStatus['Nota de Crédito'][3]['total']+$docsByStatus['Nota de Crédito'][5]['total'])?> %</td>
                            </tr>
                            <tr>
                              <th>N. Débito</th>
                              <td class="number"><?=number_format($docsByStatus['Nota de Débito'][3]['total']+$docsByStatus['Nota de Débito'][5]['total'], 0, ',', '.')?></td>
                              <td class="number"><?=number_format($totalNDEnProcesoDeRetorno, 0, ',', '.')?></td>
                              <td class="number"><?=calculate($totalNDEnProcesoDeRetorno, $docsByStatus['Nota de Débito'][3]['total']+$docsByStatus['Nota de Débito'][5]['total'])?> %</td>
                            </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-xs-12">
                  <div class="x_panel" style=" height:300px;">
                    <div class="x_title">

                    </div>
                    <div class="x_content padded" >
                       <h4>Factura</h4>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?=calculate($totalFacturaEnProcesoDeRetorno, $docsByStatus['Factura'][3]['total']+$docsByStatus['Factura'][5]['total'])?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=calculate($totalFacturaEnProcesoDeRetorno, $docsByStatus['Factura'][3]['total']+$docsByStatus['Factura'][5]['total'])?>%;">
                            <span class="sr-only"><?=calculate($totalFacturaEnProcesoDeRetorno, $docsByStatus['Factura'][3]['total']+$docsByStatus['Factura'][5]['total'])?> % Retornado</span>
                          </div>
                        </div>
                      </div>
                       <h4>G. Despacho</h4>

                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?=calculate($totalGuiaEnProcesoDeRetorno, $docsByStatus['G. Despacho'][3]['total']+$docsByStatus['G. Despacho'][5]['total'])?>%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                       <h4>Nota de Crédito</h4>

                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=calculate($totalNCEnProcesoDeRetorno, $docsByStatus['Nota de Crédito'][3]['total']+$docsByStatus['Nota de Crédito'][5]['total'])?>%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                       <h4>Nota de Débito</h4>

                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=calculate($totalNDEnProcesoDeRetorno, $docsByStatus['Nota de Débito'][3]['total']+$docsByStatus['Nota de Débito'][5]['total'])?>%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

          </div>
          <!-- DOCUMENTOS EN ESTADO -->
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="okTab">
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title">
                    <div class="title"></div>
                  </div>
                  <div class="x_content padded">
                    <table class="table table-condensed  " >
                      <thead>
                        <tr>
                          <th>Documento</th>
                          <th>Pendientes </th>
                          <th>Monto ($)</th>
                        </tr>
                      </thead>
                      <tbody>
                           <tr>
                            <th>Facturas</th>
                            <td class="number"><?=number_format($docsByStatus['Factura'][3]['total'], 0, ',', '.')?></td>
                            <td class="number"><?=number_format($docsByStatus['Factura'][3]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>G. Despacho</th>
                            <td class="number"><?=number_format($docsByStatus['G. Despacho'][3]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['G. Despacho'][3]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Crédito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Crédito'][3]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Crédito'][3]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Débito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Débito'][3]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Débito'][3]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                          <th class="number">TOTAL</th>
                          <th class="number"><?=number_format($totalDocPenDigitalizados, 0, ',', '.')?></th>
                          <th class="number">$ <?=number_format($montoDocPenDigitalizados, 0, ',', '.')?></th>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Documentos  pendientes de digitalizar</h4></div>
                  <div class="x_content ">
                  <canvas id="g5">

                  </canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Distribución de montos por documentos  pendientes de digitalizar ($)</h4></div>
                  <div class="x_content ">
                  <canvas id="g6">

                  </canvas>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title">
                    <div class="title"></div>
                  </div>
                  <div class="x_content padded">
                    <table class="table table-condensed  " >
                      <thead>
                        <tr>
                          <th>Documento</th>
                          <th>Vencidos</th>
                          <th>Monto ($)</th>
                        </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <th>Facturas</th>
                            <td class="number"><?=number_format($docsByStatus['Factura'][5]['total'], 0, ',', '.')?></td>
                            <td class="number"><?=number_format($docsByStatus['Factura'][5]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>G. Despacho</th>
                            <td class="number"><?=number_format($docsByStatus['G. Despacho'][5]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['G. Despacho'][5]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Crédito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Crédito'][5]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Crédito'][5]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Débito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Débito'][5]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Débito'][5]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                          <th class="number">TOTAL</th>
                          <th class="number"><?=number_format($totalDocPenVenDigitalizados, 0, ',', '.')?></th>
                          <th class="number">$ <?=number_format($montoDocPenVenDigitalizados, 0, ',', '.')?></th>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Documentos vencidos pendientes de digitalizar</h4></div>
                  <div class="x_content ">
                  <canvas id="g7">

                  </canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Distribución de montos por documentos vencidos pendientes de digitalizar ($)</h4></div>
                  <div class="x_content ">
                  <canvas id="g8">

                  </canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title">
                    <div class="title"></div>
                  </div>
                  <div class="x_content padded">
                    <table class="table table-condensed  " >
                      <thead>
                        <tr>
                          <th>Documento</th>
                          <th>Emitidos</th>
                          <th>Monto ($)</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <th>Facturas</th>
                            <td class="number"><?=number_format($docsByStatus['Factura'][0]['total'], 0, ',', '.')?></td>
                            <td class="number"><?=number_format($docsByStatus['Factura'][0]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>G. Despacho</th>
                            <td class="number"><?=number_format($docsByStatus['G. Despacho'][0]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['G. Despacho'][0]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Crédito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Crédito'][0]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Crédito'][0]['monto']*-1, 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Débito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Débito'][0]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Débito'][0]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                          <th class="number">TOTAL</th>
                          <th class="number"><?=number_format($totalDocEmitidos, 0, ',', '.')?></th>
                          <th class="number">$ <?=number_format($montoDocEmitidos, 0, ',', '.')?></th>
                          </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Distribución de documentos emitidos</h4></div>
                  <div class="x_content ">
                    <canvas id="g1">

                    </canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Distribución de montos por documentos emitidos ($)</h4></div>
                  <div class="x_content ">
                  <canvas id="g2">

                  </canvas>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title">
                    <div class="title"></div>
                  </div>
                  <div class="x_content padded">
                    <table class="table table-condensed  " >
                      <thead>
                        <tr>
                          <th>Documento</th>
                          <th>Digitalizados OK</th>
                          <th>Monto ($)</th>
                        </tr>
                      </thead>
                      <tbody>
                           <tr>
                            <th>Facturas</th>
                            <td class="number"><?=number_format($docsByStatus['Factura'][4]['total'], 0, ',', '.')?></td>
                            <td class="number"><?=number_format($docsByStatus['Factura'][4]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>G. Despacho</th>
                            <td class="number"><?=number_format($docsByStatus['G. Despacho'][4]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['G. Despacho'][4]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Crédito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Crédito'][4]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Crédito'][4]['monto']*-1, 0, ',', '.')?></td>
                          </tr>
                          <tr>
                            <th>N. Débito</th>
                            <td class="number"><?=number_format($docsByStatus['Nota de Débito'][4]['total'], 0, ',', '.')?></td>
                            <td class="number"> <?=number_format($docsByStatus['Nota de Débito'][4]['monto'], 0, ',', '.')?></td>
                          </tr>
                          <tr>
                          <th class="number">TOTAL</th>
                          <th class="number"><?=number_format($totalDocDigitalizados, 0, ',', '.')?></th>
                          <th class="number">$ <?=number_format($montoDocDigitalizados, 0, ',', '.')?></th>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Distribución de documentos digitalizados</h4></div>
                  <div class="x_content ">
                  <canvas id="g3">

                  </canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel" style=" height:300px;" >
                  <div class="x_title"><h4>Distribución de montos por documentos digitalizados ($)</h4></div>
                  <div class="x_content ">
                  <canvas id="g4">

                  </canvas>
                  </div>
                </div>
              </div>
            </div>


            <br/>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" type="text/javascript" ></script>
      <!-- easy-pie-chart -->
    <script src="<?=base_url('resources/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')?>"></script>
    <!-- bootstrap-progressbar -->

    <script src="<?=base_url('resources/vendors/nprogress/nprogress.js')?>"></script>
    <script type="text/javascript"  src="<?=base_url('resources/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <script>
      $(function() {
        $('.chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 2000,
          barColor: '#26B99A',
          trackColor: '#fff',
          scaleColor: false,
          lineWidth: 12,
          trackWidth: 1,
          lineCap: 'butt',

        });

      });
    </script>
   <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    /* G 1 */
    var ctx1 = document.getElementById("g1").getContext("2d");
    var g1 = new Chart(ctx1,{
        type: 'pie',
        data: {
            datasets: [{
                data: [<?=$docsByStatus['Factura'][0]['total']?>,<?=$docsByStatus['G. Despacho'][0]['total']?>,<?=$docsByStatus['Nota de Crédito'][0]['total']?>,<?=$docsByStatus['Nota de Débito'][0]['total']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E',],
                label: 'Dataset 1'
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"]
        },
        options: {responsive:true,legend: {position: 'right', },
        }
    });


    /* FIN G1*/
    /*G2*/
    var ctx2 = document.getElementById("g2").getContext("2d");
    var g2 = new Chart(ctx2,{
        type: 'pie',
        data: {
            datasets: [{
               data: [<?=$docsByStatus['Factura'][0]['monto']?>,<?=$docsByStatus['G. Despacho'][0]['monto']?>,<?=$docsByStatus['Nota de Crédito'][0]['monto']*-1?>,<?=$docsByStatus['Nota de Débito'][0]['monto']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"]
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G2*/
    /*G3*/
    var ctx3 = document.getElementById("g3").getContext("2d");
    var g3 = new Chart(ctx3,{
        type: 'pie',
        data: {
            datasets: [{
                data: [<?=$docsByStatus['Factura'][4]['total']?>,<?=$docsByStatus['G. Despacho'][4]['total']?>,<?=$docsByStatus['Nota de Crédito'][4]['total']?>,<?=$docsByStatus['Nota de Débito'][4]['total']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"]
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G3*/
     /*G4*/
    var ctx4 = document.getElementById("g4").getContext("2d");
    var g4 = new Chart(ctx4,{
        type: 'pie',
        data: {
            datasets: [{
                data: [<?=$docsByStatus['Factura'][4]['monto']?>,<?=$docsByStatus['G. Despacho'][4]['monto']?>,<?=$docsByStatus['Nota de Crédito'][4]['monto']?>,<?=$docsByStatus['Nota de Débito'][4]['monto']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"],
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G4*/
    /*G5*/
    var ctx5 = document.getElementById("g5").getContext("2d");
    var g5 = new Chart(ctx5,{
        type: 'pie',
        data: {
            datasets: [{
                data: [<?=$docsByStatus['Factura'][3]['total']?>,<?=$docsByStatus['G. Despacho'][3]['total']?>,<?=$docsByStatus['Nota de Crédito'][3]['total']?>,<?=$docsByStatus['Nota de Débito'][3]['total']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"],
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G5*/
     /*G6*/
    var ctx6 = document.getElementById("g6").getContext("2d");
    var g6 = new Chart(ctx6,{
        type: 'pie',
        data: {
            datasets: [{
                data: [<?=$docsByStatus['Factura'][3]['monto']?>,<?=$docsByStatus['G. Despacho'][3]['monto']?>,<?=$docsByStatus['Nota de Crédito'][3]['monto']?>,<?=$docsByStatus['Nota de Débito'][3]['monto']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"],
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G6*/
     /*G7*/
    var ctx7 = document.getElementById("g7").getContext("2d");
    var g7 = new Chart(ctx7,{
        type: 'pie',
        data: {
            datasets: [{
                data: [<?=$docsByStatus['Factura'][5]['total']?>,<?=$docsByStatus['G. Despacho'][5]['total']?>,<?=$docsByStatus['Nota de Crédito'][5]['total']?>,<?=$docsByStatus['Nota de Débito'][5]['total']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"],
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G7*/
    /*G8*/
    var ctx8 = document.getElementById("g8").getContext("2d");
    var g8 = new Chart(ctx8,{
        type: 'pie',
        data: {
           datasets: [{
                data: [<?=$docsByStatus['Factura'][5]['monto']?>,<?=$docsByStatus['G. Despacho'][5]['monto']?>,<?=$docsByStatus['Nota de Crédito'][5]['monto']?>,<?=$docsByStatus['Nota de Débito'][5]['monto']?>],
                backgroundColor: ['#58D68D','#CACFD2','#FAD7A0','#85929E'],
            }],
            labels: ["Facturas","N. Crédito","N. Débito","G. Despacho"],
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G8*/
    /*G9*/
    var ctx9 = document.getElementById("g9").getContext("2d");
    var g9 = new Chart(ctx9,{
        type: 'bar',
        data: {
           labels: ["TLS","FASTCO","SAC"],
           datasets: [{
                label: 'Facturas',
                backgroundColor:"#58D68D",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['Factura']['TLS']?>,
<?=$docsByResponsable['Factura']['FASTCO']?>,
<?=$docsByResponsable['Factura']['SAC']?>
]
            }, {
                label: 'G. Despacho',
                backgroundColor: "#CACFD2",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['G. Despacho']['TLS']?>,
<?=$docsByResponsable['G. Despacho']['FASTCO']?>,
<?=$docsByResponsable['G. Despacho']['SAC']?>
]
            },
             {
                label: 'N. Crédito',
                backgroundColor: "#FAD7A0",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['Nota de Crédito']['TLS']?>,
<?=$docsByResponsable['Nota de Crédito']['FASTCO']?>,
<?=$docsByResponsable['Nota de Crédito']['SAC']?>
]
            },
            {
                label: 'N. de Débito',
                backgroundColor: "#85929E",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['Nota de Débito']['TLS']?>,
<?=$docsByResponsable['Nota de Débito']['FASTCO']?>,
<?=$docsByResponsable['Nota de Débito']['SAC']?>
]
            }]
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });

    /*FIN G9*/

    /*G10*/
   /*
    var ctx10 = document.getElementById("g10").getContext("2d");
    var g10 = new Chart(ctx10,{
        type: 'bar',
        data: {
           labels: ["Promedio de días"],
           datasets: [{
                label: 'Factura',
                backgroundColor:"#58D68D",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['Factura']['TLS']?>,
]
            }, {
                label: 'G. Despacho',
                backgroundColor: "#CACFD2",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['G. Despacho']['TLS']?>,
]
            },
             {
                label: 'N. Crédito',
                backgroundColor: "#FAD7A0",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['Nota de Crédito']['TLS']?>,
]
            },
            {
                label: 'N. de Débito',
                backgroundColor: "#85929E",
                borderWidth: 1,
                data: [
<?=$docsByResponsable['Nota de Débito']['TLS']?>,

                ]
            }]
        },
        options: {
        responsive:true,
        animation: false,
        scaleLabel:function(label){return  '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
        legend: {position: 'right', },

        }
    });
*/
    /*FIN G8*/
// Define a plugin to provide data labels

//function labels (ctx){

//}

</script>