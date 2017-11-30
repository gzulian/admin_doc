
<style type="text/css" media="screen">
  .doc{
    cursor:pointer;
  }
      .nav-tabs li.disabled { color: grey; }
    .nav-tabs li.disabled a:hover { border-color: transparent; }





</style>
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/js/datepicker/timepicker.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('resources/js/jquery-ui/jquery-ui.min.css')?>">
<!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Documentos</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" status="0" id="pendingTab" role="tab" data-toggle="tab" aria-expanded="true">Pendientes <span class="badge" id="pendingLabel" ></span></a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" status="1" role="tab" id="okTab" data-toggle="tab" aria-expanded="false">Recepcionados <span class="badge" id="okLabel" ></span> </a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" status="2" role="tab" id="returnTab" data-toggle="tab" aria-expanded="false">En proceso de retorno <span class="badge"  id="returnLabel" ></span></a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content4" status="3" role="tab" id="digitalizedTab" data-toggle="tab" aria-expanded="false">Digitalizados <span id="digitalizedLabel"  class="badge"></span></a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <!-- DOCUMENTOS EN ESTADO PENDIENTES -->
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="pendingTab">
                        <div class="title_left">
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                            <div class="input-group">
                              <input id="" type="text" class="form-control filtro" placeholder="Buscar por...">
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-12" ></div>
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="pull-right input-group">
                              <button  id="receiveAction" data-target=".modalPending" data-toggle="modal" type="button" class="actionBtn btn btn-primary "><span class="glyphicon glyphicon-check"></span> <b>Recepcionar</b></button>
                            </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive" >
                          <table  class="documents table table-bordered jambo_table bulk_action  " id="documentsPending">
                            <thead>
                              <tr class="headings">
                                <th>  <input type="checkbox" id="check-all" class="check-all"></th>
                                <th class="column-title sortable">N° Orden <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Fecha <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title">Ver </th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- DOCUMENTOS EN ESTADO RECEPCIONADOS -->
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="okTab">
                        <div class="title_left">
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                            <div class="input-group">
                              <input id="" type="text" class="filtro form-control" placeholder="Buscar por...">
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-12" ></div>
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="pull-right input-group">
                              <button  id="radicacionAction" data-target=".modalPending" data-toggle="modal" type="button" class="actionBtn btn btn-primary "><span class="glyphicon glyphicon-send"></span> <b>Radicación</b></button>
                            </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                          <table class="documents table  jambo_table bulk_action  " id="documentsOk">
                            <thead>
                              <tr class="headings">
                                <th>  <input type="checkbox" id="check-all" class="check-all"></th>
                                <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Fecha documento <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Fecha recepción<span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title">Ver </th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- DOCUMENTOS EN ESTADO DE RETORNO -->
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="returnTab">
                        <div class="table-responsive">
                          <div class="title_left">
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                            <div class="input-group">
                              <input id="" type="text" class="filtro form-control" placeholder="Buscar por...">
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-12" ></div>
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="pull-right input-group">
                              <button  id="returnAction" data-target=".modalPending" data-toggle="modal" type="button" class="actionBtn btn btn-primary "><span class="glyphicon glyphicon-backward"></span> <b>Retorno</b></button>
                            </div>
                          </div>
                        </div>
                          <table class="documents table  jambo_table bulk_action  " id="documentsReturn">
                            <thead>
                              <tr class="headings">
                                <th>  <input type="checkbox" id="check-all" class="check-all"></th>
                                <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">N° Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Fecha <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Fecha radicación <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">F. Estimada radicación <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Ciudad <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Transportista <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--DOCUMENTOS EN ESTADO DE DIGITALZACIÓN -->
                      <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="digitalizedTab">
                        <table class="documents table  jambo_table bulk_action  " id="documentsdigitalized">
                          <thead>
                            <tr class="headings">
                              <th>  <input type="checkbox" id="check-all" class=""></th>
                              <th class="column-title sortable">N° Orden <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">N° Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                              <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Fecha <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
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
        <!-- VENTANAS MODALES-->
        <!-- MODAL PARA PENDIENTES-->
        <div  class="modal fade modalPending " tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Recepción de documentos </h4>
              </div>
              <div class="modal-body" >
                <div class="row">
                  <div class="col-md-4 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title"><b>Documentos seleccionados: <i class="label label-info" id="totalDocumentsSelected"></i> </b></div>
                      <div class="x_content" style=" height: 400px; overflow-y: scroll;" >
                        <ul  id="documentsAdd" class="list-group"></ul>
                      </div>
                      <div class="panel-footer">
                        <!--h6><span class="glyphicon glyphicon-exclamation-sign"></span>Click para visualizar el documento</h6-->
                        <h6><span class="glyphicon glyphicon-exclamation-sign"></span>
                        Doble click para deseleccionar el documento</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8  col-xs-12">
                    <div class="x_panel">
                      <div class="x_title"><b>Acciones generales</b></div>
                      <div class="x_content">
                        <ul class="nav nav-tabs ">
                          <li class="t active"><a id="refLevel1" href="#level1" data-toggle="tab">Recepción</a></li>
                          <li class="t " > <a id="refLevel2"  href="#level2" data-toggle="tab">Radicación</a></li>
                          <li class="t " > <a id="refLevel3"  href="#level3" data-toggle="tab">TLS</a></li>
                          <li class="t " > <a id="refLevel4"  href="#level4" data-toggle="tab">Digitalización</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="level1">
                            <br/>
                            <br/>
                            <form action="#" class="action" id="receiveForm" method="get" accept-charset="utf-8">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"> </span> Fecha de recepción</span>
                                <input required="required" name="dataForm[date]" type="text" class="form-control  datepicker" id="receiveDate" >
                              </div>
                              <div class="row">
                                  <div class="col-md-12" >
                                    <ul id="" class="nav-pills infoReceive">
                                    </ul>
                                  </div>
                              </div>
                              <button type="submit" id="receiveAction" class=" btn btn-primary"><span class="glyphicon-check glyphicon"></span> Recepcionar</button>
                            </form>
                          </div>
                          <!-- end reception -->

                          <!-- radicación -->
                          <div class="tab-pane" id="level2">
                            <div class="clearfix"></div>
                            <form action="#" id="radicacionForm" method="post" accept-charset="utf-8" class="action form-horizontal">
                              <table class="table  table-responsive" >
                                <thead>
                                  <tr>&nbsp;</tr>
                                </thead>
                                <tbody class="buscar">
                                  <tr>
                                    <th class="text-lefth th-title">Código de ciudad: </th>
                                    <td class="text-lefth">
                                      <select id="city" name="dataForm[city]" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="C01">C01</option>
                                        <option value="C02">C02</option>
                                        <option value="C03">C03</option>
                                        <option value="C04">C04</option>
                                        <option value="C05">C05</option>
                                        <option value="C06">C06</option>
                                        <option value="C07">C07</option>
                                        <option value="C08">C08</option>
                                        <option value="C09">C09</option>
                                        <option value="C10">C10</option>
                                        <option value="C11">C11</option>
                                        <option value="C12">C12</option>
                                        <option value="C13">C13</option>
                                        <option value="ISLA DE PASCUA">ISLA DE PASCUA</option>
                                        <option value="C16">C16</option>
                                      </select>
                                    </td>

                                  </tr>
                                  <tr>
                                      <th class="text-lefth th-title" >Se envía a radicación</th>
                                      <td class="text-lefth" >
                                        <input type="radio" class="radicacion" id="r1" value="SI" name="dataForm[send]">SI
                                        <input type="radio" class="radicacion" id="r2" value="NO" name="dataForm[send]">NO
                                      </td>
                                  </tr>
                                  <tr>
                                    <th class="text-lefth" >Fecha entrega a radicación</th>
                                    <td class="text-lefth" ><input readonly="readonly" type="text" class="datepicker form-control"  name="dataForm[date]" /></td>
                                  </tr>
                                  <tr>
                                    <th class="text-lefth">Transportista</th>
                                    <td class="text-right">
                                      <select name="dataForm[transport]"  class="form-control" >
                                        <option value="">SELECCIONE</option>
                                        <option value="FASTCO">FASTCO</option>
                                        <option value="TLS">TLS</option>
                                        <option value="EMAIL">EMAIL</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th class="text-lefth" >F. estimada radicación:</th>
                                    <td class="text-lefth" >
                                      <input type="text" readonly="readonly" class="form-control" value="" id="estimated" name="dataForm[estimated]">
                                    </td>
                                  </tr>
                                  <tr>
                                    <th class="text-lefth" >Observación SAC:</th>
                                    <td class="text-lefth" >
                                      <input type="text"  class="form-control" value="" id="obsSac" name="dataForm[obsSac]">
                                    </td>
                                  </tr>

                                  <tr>
                                    <th>&nbsp;</th>
                                    <td class="text-right" >
                                        <button class="receiveAction btn btn-primary"  type="submit"><span class="glyphicon-send glyphicon"></span> Enviar a radicación</button>
                                    </td>
                                  </tr>
                                  <!-- tr>
                                        <th class="text-lefth" >Fecha radicación factura:</th>
                                        <td class="text-lefth" ><input type="text" readonly="readonly"  class="form-control datepicker2" name="document[doc_dateradicacionfact]" /></td>
                                  </tr -->
                                </tbody>
                              </table>
                              <div class="row">
                                <div class="col-md-12" >
                                  <ul id="" class="nav-pills infoReceive">
                                  </ul>
                                </div>
                            </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="level3">
                            <form action="#" id="tlsForm" method="post" accept-charset="utf-8" class="action form-horizontal">
                            <div class="clearfix"></div>
                            <table class="table  table-responsive">
                              <thead>

                              </thead>
                              <tbody class="buscar">
                                <tr>
                                  <th class="">Fecha entrega TLS</th>
                                  <td class="text-right" >
                                    <input type="text" class="datepicker form-control"  name="formData[doc_ftls]" />
                                  </td>
                                </tr>
                                <tr>
                                  <th class="">Fecha estimada factura de TLS:</th>
                                  <td class="text-right" >
                                    <span id=""></span>
                                  </td>
                                </tr>
                                <tr>
                                  <th class="">Días de confirmación TLS:</th>
                                  <td class="text-right" >
                                    <span id=""></span>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="">Observación TLS 1</th>
                                  <td class="text-right" >
                                    <textarea class="form-control"  name="formData[doc_obstls1]"></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <th class="">Observación TLS 2</th>
                                  <td class="text-right" >
                                    <textarea class="form-control"  name="formData[doc_obstls2]" ></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <th class=""></th>
                                  <td class="text-right" >
                                    <button class="receiveAction btn btn-primary" type="submit" ><span class="glyphicon glyphicon-fast-backward "></span> Retornar</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            </form>
                          </div>
                          <div class="tab-pane" id="level4">
                            <form action="#" id="digiForm" method="post" accept-charset="utf-8" class="action form-horizontal">
                            <div class="clearfix"></div>
                            <table class="table  table-responsive">
                              <thead>

                              </thead>
                              <tbody class="buscar">
                                <tr>
                                  <th class="">Fecha digi. Factura Recepcionada por cliente: </th>
                                  <td class="text-right" >
                                    <input type="text" class="datepicker form-control"  name="formData[doc_ftls]" />
                                  </td>
                                </tr>
                                <tr>
                                  <th class="">Fecha digitalización guía:</th>
                                  <td class="text-right" >
                                    <span id=""></span>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
         <div  class="modal fade documentDetail " tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Visualizar documento </h4>
              </div>
              <div class="modal-body" >
                <div class="row">
                  <div class="col-md-12  col-xs-12">
                    <div class="x_panel">
                      <div class="x_title"><b>Documento: </b></div>
                      <div class="x_content">
                          <ul class="nav nav-tabs ">
                            <li class=" active" > <a id="processTab"  href="#process" data-toggle="tab">Datos</a></li>
                            <li class=" "><a id="generalTab" href="#general" data-toggle="tab">General</a></li>
                            <li class=" " ><a id="trazabilityTab"  href="#trazability" data-toggle="tab">Trazabilidad</a></li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="process">
                              <br/>
                              <br/>
                               <form action="#" id="recive" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label ">Se envía a radicación:</label>
                                    <input type="radio" class="radicacion" id="r1" value="SI" name="document[doc_radicacion]">SI
                                    <input type="radio" class="radicacion" id="r2" value="NO" name="document[doc_radicacion]">NO
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label">F. estimada radicación: </label>
                                    <input type="text" readonly="readonly" class="form-control" value="" name="document[doc_dateradicacion]">
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label">Fecha radicación factura: </label>
                                    <input type="text" readonly="readonly"  class="form-control datepicker2" name="document[doc_dateradicacionfact]" />
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label">Retorno</label>
                                    <input style="text-transform:uppercase"  maxlength="2"  type="text" name="document[doc_return]" class="form-control" />
                                  </div>
                                </div>
                                <br/>
                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label">Transportista: </label>
                                    <input type="text" name="document[doc_transport]"  class="form-control" />
                                  </div>
                                </div>
                                <br/>
                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label ">Fecha entrega logistica a SAC</label>
                                    <input readonly="readonly" type="text" class="datepicker2 form-control"  name="document[doc_fsac]" />
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label ">Fecha entrega a radicación</label>
                                    <input readonly="readonly" type="text" class="datepicker2 form-control"  name="document[doc_fradicacion]" />
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label ">Fecha digitalización guía </label>
                                    <input readonly="readonly" type="text" class="datepicker2 form-control"  name="document[doc_guidedate]" />
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label " style="font-size: 10px;">F. digi. factura recep. por cliente</label>
                                    <input readonly="readonly" type="text" class="datepicker2 form-control"  name="document[doc_facdate]" />
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
                                  <!--div class="col-md-12">
                                    <button type="submit" class="pull-right btn btn-green btn-lg"><i class="icon-save">  </i>Guardar</button>
                                  </div -->
                                </div>

                                 <input type="hidden" class=""  name="document[doc_pro_id]" />
                                 <input type="hidden" class=""  name="document[doc_id]" />
                                 <input type="hidden" class=""  name="document[doc_serial]" />
                            </form>
                            </div>
                            <div class="tab-pane" id="general">
                              <br/>
                              <br/>
                              <div class="row">
                              <div class="col-md-6">
                                <table class=" table table-bordered table-condensed">
                                  <tr>
                                    <td>Mes</td>
                                    <td><span id="doc_month"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Ciudad</td>
                                    <td><span id="doc_city"></span></td>
                                  </tr><tr>
                                    <td>Número de orden</td>
                                    <td><span id="doc_serial"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Tipo de orden</td>
                                    <td><span id="doc_ordertype"></span></td>
                                  </tr>

                                </table>

                              </div>
                              <div class="col-md-6">
                                <table class="table table-bordered table-condensed">
                                  <tr>
                                    <td><label class="control-label">Fecha estimada factura de log a sac: </label></td>
                                    <td><span id="doc_datelogtosac"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Días de retorno logistica: </label></td>
                                    <td><span id="doc_daylogic"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Status logistica: </label></td>
                                    <td><span id="doc_logicstatus"></span></td>
                                  </tr>
                                </table>

                              </div>
                            </div>
                            <br/>
                            <div class="row">
                              <div class="col-md-6">
                                <table class=" table table-bordered table-condensed">
                                  <tr>
                                    <td><label class="control-label">Nombre cliente 1: </label></td>
                                    <td><span id="doc_customer"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Nombre cliente 2: </label></td>
                                    <td><span id="doc_customerTwo"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Fecha</td>
                                    <td><span id="doc_documentdate"></span></td>
                                  </tr>
                                </table>
                              </div>
                               <div class="col-md-6">
                                <table class="table table-bordered table-condensed">

                                  <tr>
                                    <td><label class="control-label">Días de confirmación SETS: </label></td>
                                    <td><span id="doc_daysets"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Status SAC: </label></td>
                                    <td><span id="doc_statussac"></span></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            <br/>
                            <div class="row">
                              <div class="col-md-6">
                                <table class=" table-bordered table-condensed">
                                  <tr>
                                    <td><label class="control-label">N° de factura: </label></td>
                                    <td><span id="doc_facturenumber"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">N° de guía: </label></td>
                                    <td><span id="doc_guidenumber"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">N° Orden de compra: </label></td>
                                    <td><span id="doc_saleorder"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Ejecutivo: </label></td>
                                    <td><span id="doc_executive"></span></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table table-bordered table-condensed">
                                  <tr>
                                    <td><label class="control-label">Fecha estimada factura de TLS: </label></td>
                                    <td><span id="doc_datetls"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Días de confirmación TLS: </label></td>
                                    <td><span id="doc_daytls"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Status FASTCO: </label></td>
                                    <td><span id="doc_statusfastco"></span></td>
                                  </tr>
                                </table>
                                <!-- -->

                                <!-- -->
                              </div>
                            </div>
                            <br/>
                            <div class="row">
                              <div class="col-md-6">
                                <table class="table table-bordered table-condensed">
                                  <tr>
                                    <td><label class="control-label">Monto ($): </label></td>
                                    <td><span id="doc_monto"></span></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Monto (usd): </label></td>
                                    <td><span id="doc_montousd"></span></td>
                                  </tr>

                                  <tr>
                                    <td><label class="control-label">Almacen: </label></td>
                                    <td><span id="doc_depot"></span></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table table-bordered table-condensed">

                                  <tr>
                                    <td><label class="control-label">Fecha digitalazación factura cliente: </label></td>
                                    <td><span id="doc_datedigi"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Causal: </label></td>
                                    <td><span id="doc_causal"></span></td>
                                  </tr>
                                  <tr>
                                    <td><label class="control-label">Responsable: </label></td>
                                    <td><span id="doc_responsible"></span></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            </div>
                            <div class="tab-pane" id="trazability">
                              <table id="trazabilityTable" class="table  table-responsive">
                                <thead>
                                  <tr>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                  </tr>
                                </thead>
                                <tbody class="buscar">

                                </tbody>
                              </table>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>


        <!-- FIN MODALES -->
        <script src="<?=base_url('resources/js/jquery-ui/jquery-ui.js')?>"></script>
        <script src="<?=base_url('resources/js/sortElements.js')?>" type="text/javascript" charset="utf-8" ></script>
        <script src="<?=base_url('resources/js/moment/moment.min.js')?>"></script>
        <script src="<?=base_url('resources/js/datepicker/Timepicker.js')?>"></script>
        <script src="<?=base_url('resources/js/jquery-ui/spanish_language.js')?>"></script>
        <script>

          /*
            TABs
            pendingTab,okTab,returnTab,digitalizedTab
            TABS LABEL
            #pendingLabel,#okLabel,#returnLabel,#digitalizedLabel
          */
          $(function(){
            $('.datepicker').datepicker({
              locale:'es',
              language:'es',
              regional:'es',
              dateFormat: 'dd-mm-yy',
              beforeShow: function() {
                  setTimeout(function(){
                      $('.ui-datepicker').css('z-index', 99999999999999);
                  }, 0);
              }
            });

            $(".actionBtn").click(function(){
              var action = $(this).attr("id");
              var tab;
              switch(action){
                case 'receiveAction':
                    tab = 'refLevel1';
                break;
                case 'radicacionAction':
                    tab = 'refLevel2';
                break;
                case 'returnAction':
                    tab = 'refLevel3';
                break;
                case 'digitalizedAction':
                    tab = 'refLevel4';
                break;
              }
              $('#'+tab).attr("data-toggle","tab");
              $('#'+tab).trigger('click');
              $('.t').not('.active').find('a').removeAttr("data-toggle");
            });
            var documentsAdded = new Array();
            /*DETALLE DEL DOCUMENTO*/
            $(document).on('click','.viewDoscument',function(){
              var id = $(this).attr('doc');
              if(typeof id != 'undefined'){
                $(".doc").removeClass("selected");
                $("#doc"+id).addClass("selected");
                $.ajax({
                  'type':'GET',
                  'url':'<?=site_url('document/find')?>',
                  'dataType':'json',
                  'data':"serial="+id,
                  beforeSend:function(){
                      $("body").css("cursor",'wait');
                  },
                  success:function(response){
                    if(typeof response.document != 'undefined'){
                      $.each(response.document._columns, function (key, data) {
                        if(key == 'doc_radicacion'){
                          if(data == "SI"){
                            $("#r1").prop("checked",true);
                          }else if(data == "NO"){
                            $("#r2").prop("checked",true);
                          }
                        }else{
                          if(data == "0000-00-00"){
                          $("[name='document["+key+"]']").val("");
                          }else{
                            $("[name='document["+key+"]']").val(data);
                          }
                        }
                        var field = $("#"+key);
                        if(typeof field != 'undefined' && data != "0000-00-00"){
                          field.text(data);
                        }
                      })
                    }
                    $("#trazabilityTable tbody").empty();
                    if(typeof response.trazability != 'undefined'){
                      $.each(response.trazability, function (key, data) {
                        var tr = $("<tr>");
                        tr.append("<td>"+data.action+"</td>");
                        tr.append("<td>"+moment(data.date).format('DD-MM-YYYY HH:mm')+"</td>");
                        tr.append("<td>"+data.user+"</td>");
                        $("#trazabilityTable").append(tr);
                      });
                    }
                  },
                  complete:function(){
                     $("body").css("cursor",'default');
                  }
                });
              }
              return false;

            });
            $('.documentDetail').on('shown.bs.modal', function (e) {

            });
            /*FIND DETALLE*/

            /*RECEPCIONAR DOCUMENTO*/
            $('.modalPending').on('shown.bs.modal', function (e) {
                var documentsSelected = $("tr  input:checked") ;
                $(".infoReceive").empty();
                /*to actually disable clicking the bootstrap tab, as noticed in comments by user3067524*/
                //$('.t').not('.active').find('a').removeAttr("data-toggle");
                documentsAdded  = [];
                if(documentsSelected.length > 0){
                  /*salenumber type doc*/
                  $("#documentsAdd").empty();
                  $(documentsSelected).each(function(index,tag){
                    $("#documentsAdd").append("<li class='documentsAdded list-group-item' id='d"+tag.id+"' >&nbsp; Doc: "+tag.value+"<span title='Quitar' class='glyphicon glyphicon-remove pull-right' ></span></li>");
                      documentsAdded.push(tag.id);
                  });
                  $("#totalDocumentsSelected").text(documentsAdded.length);



                }else{
                  return false;
                }
            });
            //deseleccionar un documento
            $(document).on("dblclick",'.documentsAdded',function(){
              var removeItem = parseInt($(this).attr("id").replace("d",""));
              documentsAdded = jQuery.grep(documentsAdded, function(value) {
                return value != removeItem;
              });
              $(this).remove();
              $("#totalDocumentsSelected").text(documentsAdded.length);

            });

            $(".action"). submit(function(){
                var acept      = confirm("Conifimar acción");
                var documents  = documentsAdded;
                //documents.pop("_");
                var action     = $(this).attr("id");
                var dataForm   = $(this).serialize();

                documents.toString();
                if(acept && dataForm.length > 0 ){
                  $.ajax({
                      "type":"GET",
                      "dataType":"json",
                      "cache":false,
                      "data":{action:action ,documents: documents},
                      "url":"<?=site_url('Document/action?')?>"+dataForm,
                      beforeSend:function(){
                          $("body").css("cursor",'wait');
                          $(".infoReceive").empty();
                      },
                      success:function(data){

                        var success =  data.success;
                        var errors  =  data.errors;
                        if(success.length>0){
                          var ok  =  data.ok;
                          $(ok).each(function(index,value){
                            $("#doc"+value+"").remove();
                            /*
                            documentsAdded = jQuery.grep(documentsAdded, function(value) {
                                return value != value;
                            });*/
                          });
                          $(success).each(function(index,value){
                             $(".infoReceive").append("<p class='alert alert-success'>"+value+"</p>");
                          });
                          //$('#refLevel2').attr("data-toggle","tab");
                        }
                        if(errors.length >0){
                          $(errors).each(function(index,error){
                             $(".infoReceive").append("<p class='alert alert-danger'>"+error+"</p>");
                          });
                        }
                        //documentsAdded = [] ;

                      },
                      complete:function(){
                          $("body").css("cursor",'initial');

                      }
                  });

                }
                  return false;
            });
            /** fin recepción de documentos **/
            $('a[data-toggle="tab"]').on('click', function (e) {
                $(".infoReceive").empty();
                var table ;
                var tab = $(e.target).attr("status") // activated tab
                if(typeof tab != 'undefined'){
                  $.ajax({
                    "type":"POST",
                    "dataType":"json",
                    "data":{status:tab},
                    "url":"<?=site_url('Document/getByStatus')?>",
                    beforeSend:function(){
                        $("body").css("cursor",'wait');
                    },
                    success:function(data){
                        $(".documents tbody").empty();
                        switch(parseInt(tab)){
                            case 0: // Pendientes
                              table = $('#documentsPending');

                              $( data ).each(function( index,value ) {
                                var obj = JSON.parse(value);
                                var tr  = $("<tr style='cursor:pointer;' id='doc"+obj.doc_id+"' class='doc even pointer' doc='"+obj.doc_id+"' >");
                                tr.append('<td class="a-center"><input    type="checkbox" class="flat check" id="'+obj.doc_id+'"  value="'+obj.doc_salenumber+' | Tipo: '+obj.doc_ordertype+' "  name="table_records"></td>');
                                tr.append("<td class='selectDocument' >"+obj.doc_serial+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_documentdate+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                                tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button></td>");
                                table.append(tr);
                              });
                            break;
                            case 1: //recepcconados

                              table = $('#documentsOk');

                              //console.log(data);
                              $( data ).each(function( index,value ) {
                                var obj = JSON.parse(value);
                                var tr  = $("<tr style='cursor:pointer;' id='doc"+obj.doc_id+"' class='doc even pointer' doc='"+obj.doc_id+"' >");
                                tr.append('<td class="a-center"><input    type="checkbox" class="flat check" id="'+obj.doc_id+'"  value="'+obj.doc_salenumber+' | Tipo: '+obj.doc_ordertype+' "  name="table_records"></td>');
                                tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_documentdate+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_datelogtosac+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                                tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button></td>");
                                table.append(tr);
                              });
                            break;
                            case 2://en retorno
                              table = $('#documentsReturn');
                              $( data ).each(function( index,value ) {
                                var obj = JSON.parse(value);
                                var tr  = $("<tr style='cursor:pointer;' id='doc"+obj.doc_id+"' class='doc even pointer' doc='"+obj.doc_id+"' >");
                                tr.append('<td class="a-center"><input    type="checkbox" class="flat check" id="'+obj.doc_id+'"  value="'+obj.doc_salenumber+' | Tipo: '+obj.doc_ordertype+' "  name="table_records"></td>');
                                tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_documentdate+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_fradicacion+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_dateradicacion+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_city+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_transport+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                                table.append(tr);
                              });

                            break;
                            case 3://digitalizados
                              table = $('#documentsdigitalized');
                              $( data ).each(function( index,value ) {
                                var obj = JSON.parse(value);
                                var tr  = $("<tr style='cursor:pointer;' class='even pointer' doc='"+obj.doc_id+"' >");
                                tr.append('<td class="a-center"><input type="checkbox" class="flat check" value="'+obj.doc_id+'"  name="table_records"></td>');
                                tr.append("<td class='selectDocument' >"+obj.doc_serial+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_documentdate+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                                $("#documentsOk").append(tr);
                              });

                            break;


                        }

                    },
                    complete:function(){
                        $("body").css("cursor",'initial');

                    }
                  });
                }
            });
            $("#pendingTab").trigger('click');//

            $(document).on('click','.selectDocument',function(){
               var idDocument = $(this).parent().attr("doc");
               if($("#"+idDocument).is(':checked')){
                $("#"+idDocument).prop('checked',false);
               }else{
                $("#"+idDocument).prop('checked',true);
               }
               $(".even").removeClass("active");
               $(this).parent().addClass("active");
            });

               //fechas
            var diasRadicacion = {"C01":9,"C02":9,"C03":9,"C04":9,"C05":9,"C06":9,"C07":9,"C08":9,"C09":9,"C10":9,"C11":9,"C12":9,"C13":3,"ISLA DE PASCUA ISLA DE PASCUA":9,"C16":9};

            $(document).on('click','.radicacion',function(){
              var selected = $(this).attr("id");
              switch(selected){
                case "r1":
                  var code = $("#city").val();
                  if(typeof code != 'undefined' && typeof diasRadicacion[code] != 'undefined'  ){
                    var newDate = addWorkDays(new Date(),diasRadicacion[code]);
                    newDate = moment(newDate).format("DD-MM-YYYY");
                    $("#estimated").val(newDate);
                  }
                  //addWorkDays();
                break;
                case "r2":
                  var date  = $("#doc_documentdate").text();

                  if(typeof date != 'undefined'){
                    $("#estimated").val(date);
                  }

                break;
                default:
                  alert("Op inválida");
              }
            });
            $("#city").change(function(){
              $('.radicacion input:checked').trigger('click');
            });


            //filtros and check all
            (function ($) {
                $('.filtro').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('tbody tr').hide();
                    $('tbody tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
            //var all = false;
            $(".check-all").click(function(){

              if ($(this).is(":checked")) {
                $(".check").prop("checked",true);

              }else{
                $(".check").prop("checked",false);

              }
            });
            $('.sortable')
              .wrapInner('<span title="Ordenar columna"/>')
              .each(function(){
                var th = $(this),
                    thIndex = th.index(),
                    inverse = false;
                th.click(function(){
                    table.find('td').filter(function(){
                        return $(this).index() === thIndex;
                    }).sortElements(function(a, b){
                        if( $.text([a]) == $.text([b]) )
                            return 0;
                        return $.text([a]) > $.text([b]) ?
                            inverse ? -1 : 1
                            : inverse ? 1 : -1;
                    }, function(){
                        // parentNode is the element we want to move
                        return this.parentNode;
                    });
                    inverse = !inverse;
                });
              });
            });
            function addWorkDays(startDate, days) {
              // Get the day of the week as a number (0 = Sunday, 1 = Monday, .... 6 = Saturday)
              var dow = startDate.getDay();
              var daysToAdd = days;
              // If the current day is Sunday add one day
              if (dow == 0)
                  daysToAdd++;
              // If the start date plus the additional days falls on or after the closest Saturday calculate weekends
              if (dow + daysToAdd >= 6) {
                  //Subtract days in current working week from work days
                  var remainingWorkDays = daysToAdd - (5 - dow);
                  //Add current working week's weekend
                  daysToAdd += 2;
                  if (remainingWorkDays > 5) {
                      //Add two days for each working week by calculating how many weeks are included
                      daysToAdd += 2 * Math.floor(remainingWorkDays / 5);
                      //Exclude final weekend if remainingWorkDays resolves to an exact number of weeks
                      if (remainingWorkDays % 5 == 0)
                          daysToAdd -= 2;
                  }
              }
              startDate.setDate(startDate.getDate() + daysToAdd);
              return startDate;
            }
        </script>
