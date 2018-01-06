
<style type="text/css" media="screen">
  .doc{
    cursor:pointer;
  }
      .nav-tabs li.disabled { color: grey; }
    .nav-tabs li.disabled a:hover { border-color: transparent; }

.glyphicon {
    font-size: 16px;
}

td{
  color: #000;
}

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
                      <li role="presentation" class="active"><a href="#tab_content1" status="0" id="pendingTab" role="tab" data-toggle="tab" aria-expanded="true">Emitidos <span class="badge" id="pendingLabel" ></span></a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" status="1" role="tab" id="okTab" data-toggle="tab" aria-expanded="false">Recepcionados <span class="badge" id="okLabel" ></span> </a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" status="2" role="tab" id="returnTab" data-toggle="tab" aria-expanded="false">Pendiente de retorno <span class="badge"  id="returnLabel" ></span></a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content4" status="3" role="tab" id="digitalizedTab" data-toggle="tab" aria-expanded="false">En proceso de digitalización <span id="digitalizedLabel"  class="badge"></span></a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content5"  status="4" role="tab" id="historicTab" data-toggle="tab" aria-expanded="false">Digitalizados <span id="historicLabel"  class="badge"></span></a>
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
<?php if (isAsistant()):?>
<button  id="receiveAction" data-target=".modalPending" data-toggle="modal" type="button" class="pull-right actionBtn btn btn-primary "><span class="glyphicon glyphicon-check"></span> <b>Recepcionar</b></button>
<?php endif?>
</div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive" >
                          <table  class="documents table table-bordered jambo_table bulk_action  " id="documentsPending">
                            <thead>
                              <tr class="headings">
                                <th>  <input type="checkbox" id="check-all" class="check-all"></th>
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
<?php if (isAsistant()):?>
<button  id="radicacionAction" data-target=".modalPending" data-toggle="modal" type="button" class="actionBtn btn btn-primary "><span class="glyphicon glyphicon-send"></span> <b>Radicación</b></button>
<?php endif?>
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
<?php if (isAsistant()):?>
<button  id="returnAction" data-target=".modalPending" data-toggle="modal" type="button" class="actionBtn btn btn-primary "><span class="glyphicon glyphicon-repeat"></span> <b>Retornar</b></button>
<?php endif?>
</div>
                          </div>
                        </div>
                          <table class="documents table  jambo_table bulk_action  " id="documentsReturn">
                            <thead>
                              <tr class="headings">
                                <th>  <input type="checkbox" id="check-all" class="check-all"></th>
                                <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Fecha radicación <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">F. Estimada radicación <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Ciudad <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Transportista <span class="glyphicon glyphicon-sort"></span></th>
                                <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
                                <th class="column-title ">Ver </th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--DOCUMENTOS EN ESTADO DE DIGITALZACIÓN -->
                      <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="digitalizedTab">
                         <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                            <div class="input-group">
                              <input id="" type="text" class="form-control filtro" placeholder="Buscar por...">
                            </div>
                          </div>
                        <div class="pull-right input-group">
                          <div class="col-md-2 col-sm-2 col-xs-12" ></div>
<?php if (isAsistant()):?>
<button  id="digiAction" data-target=".modalPending" data-toggle="modal" type="button" class="actionBtn btn btn-primary "><span class="glyphicon glyphicon-info-sign"></span> <b>Digitalizar</b></button>
<?php endif?>
</div>
                        <table class="documents table  jambo_table bulk_action  " id="documentsdigitalized">
                          <thead>
                            <tr class="headings">
                              <th>  <input type="checkbox" id="check-all" class="check-all"></th>
                              <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                              <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Fecha de retorno <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
                              <th class="column-title">Ver</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane fade"  id="tab_content5" aria-labelledby="historicTab" >
                          <!-- filtro -->
                          <form action="#" id="filter" method="post" accept-charset="utf-8" class=" fill-up">
                            <div class="row">
                              <div class="col-md-3"><input name="filter[customer]" type="text" class="form-control" placeholder="Nombre del cliente"/> </div>
                              <div class="col-md-2">
                                 <input type="text" placeholder="Digitalizados Desde"  class="form-control datepicker" name="filter[from]" required="required">

                              </div>
                              <div class="col-md-2">
                                <input type="text" placeholder="Digitalizados  Hasta"  class="form-control datepicker" name="filter[to]" required="required">

                              </div>
                              <div class="col-md-2">
                                  <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-filter "></span></button>
                                </div>
                            </div>
                          </form>
                          <!-- fin filtros -->
                          <div class="clearfix"></div>
                          <table class="documents table  jambo_table bulk_action  " id="documentsHistoric" style="display: none">
                          <thead>
                            <tr class="headings">
                              <th class="column-title sortable">N° Factura <span class="glyphicon glyphicon-sort"></span> </th>
                              <th class="column-title sortable">N° Guía <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Tipo  <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Fecha  <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Fecha de digitalización <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Fecha radicación <span class="glyphicon glyphicon-sort"></span></th>
                              <th class="column-title sortable">Cliente <span class="glyphicon glyphicon-sort"></span> </th>
                              <th class="column-title">Ver</th>
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
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="font-size: 20px;" class="closeModal close glyphicon glyphicon-remove "></span>
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
                                <table class="table  table-responsive" >
                                <tbody class="buscar">
                                  <tr>
                                      <th class="text-lefth th-title" >Entrega de logística a sac:</th>
                                      <td class="text-lefth" >
                                        <input required="required" readonly="readonly" name="dataForm[date]" type="text" class="form-control  datepicker" id="receiveDate" >
                                      </td>
                                      <td><span class=" glyphicon glyphicon-calendar"></span></td>
                                  </tr>
                                  </tbody>
                                  </table>
                                  <div class="row">
                                      <div class="col-md-12" >
                                        <ul id="" class="nav-pills infoReceive">
                                        </ul>
                                      </div>
                                  </div>
                                  <button type="submit" id="receiveAction" class=" pull-right btn btn-primary"><span class="glyphicon-check glyphicon"></span> Recepcionar</button>
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
                                    <th class="text-lefth th-title" >Se envía a radicación</th>
                                    <td class="text-lefth" >
                                      <input type="radio" class="radicacion"  required="required" value="SI" name="dataForm[send]">SI
                                      <input type="radio" class="radicacion"  required="required" value="NO" name="dataForm[send]">NO
                                    </td>
                                  </tr>
                                  <tr>
                                    <th class="text-lefth" >Entrega a radicación</th>
                                    <td class="text-lefth" ><input required="required" readonly="readonly" type="text" class="datepicker form-control"  name="dataForm[date]" /></td>
                                    <td><span class=" glyphicon glyphicon-calendar"></span></td>
                                  </tr>
                                  <tr>
                                    <th class="text-lefth">Transportista</th>
                                    <td class="text-right">
                                      <select name="dataForm[doc_transport]"  class="form-control" >
                                        <option value="">SELECCIONE</option>
                                        <option value="FASTCO">FASTCO</option>
                                        <option value="TLS">TLS</option>
                                        <option value="EMAIL">EMAIL</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <!--tr>
                                    <th class="text-lefth" >F. estimada radicación:</th>
                                    <td class="text-lefth" >
                                      <input type="text" readonly="readonly" class="form-control" value="" id="estimated" name="dataForm[estimated]">
                                    </td>
                                  </tr -->
                                  <tr>
                                    <th class="text-lefth" >Observación SAC:</th>
                                    <td class="text-lefth" >
                                      <input type="text"  class="form-control" value="" id="obsSac" name="dataForm[obsSac]">
                                    </td>
                                  </tr>

                                  <tr>
                                    <th>&nbsp;</th>
                                    <td class="text-right" >
                                        <button class="receiveAction btn btn-primary"  type="submit"><span class="glyphicon-send glyphicon"></span> Radicación</button>
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
                                  <th class="">Entrega a transportista</th>
                                  <td class="text-right" >
                                    <input type="text" class="datepicker form-control"   required="required" name="dataForm[ftls]" />
                                  </td>
                                  <td><span class=" glyphicon glyphicon-calendar"></span></td>
                                </tr>
                                <!-- tr>
                                  <th class="">Fecha estimada factura de TLS:</th>
                                  <td class="text-right" >
                                    <span id=""></span>
                                  </td>
                                </tr -->
                                <!-- tr>
                                  <th class="">Días de confirmación Tr:</th>
                                  <td class="text-right" >
                                    <span id=""></span>
                                  </td>
                                </tr -->

                                <tr>
                                  <th class="">Observación de retorno</th>
                                  <td class="text-right" >
                                    <textarea class="form-control"  name="dataForm[obstls1]"></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <th class="">Observación de retorno 2</th>
                                  <td class="text-right" >
                                    <textarea class="form-control"  name="dataForm[obstls2]" ></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <th class=""></th>
                                  <td class="text-right" >
                                    <button class="receiveAction btn btn-primary" type="submit" ><span class="glyphicon glyphicon-repeat "></span> Retornar</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            </form>
                            <div class="row">
                                <div class="col-md-12" >
                                  <ul id="" class="nav-pills infoReceive">
                                  </ul>
                                </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="level4">
                            <form action="#" id="digiForm" method="post" accept-charset="utf-8" class="action form-horizontal">
                            <div class="clearfix"></div>
                            <table class="table  table-responsive">
                              <thead>

                              </thead>
                              <tbody class="buscar">
                                <tr>
                                  <th class="">Digitalización documento: </th>
                                  <td class="text-right" >
                                    <input type="text" class="datepicker form-control"  name="dataForm[datedigrecepcionfac]" />
                                  </td>
                                  <td><span class=" glyphicon glyphicon-calendar"></span></td>
                                </tr>
                                <tr>
                                  <th class="">Fecha radicación factura:</th>
                                  <td class="text-right" >
                                    <input type="text" class="datepicker form-control"  name="dataForm[dateradicacionfact]" />
                                  </td>
                                  <td><span class=" glyphicon glyphicon-calendar"></span></td>
                                </tr>
                                <tr>
                                  <th class=""></th>
                                  <td class="text-right" >
                                    <button class="receiveAction btn btn-primary" type="submit" ><span class="glyphicon glyphicon-info-sign "></span> Digitalizar</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            </form>
                            <div class="row">
                              <div class="col-md-12" >
                                <ul id="" class="nav-pills infoReceive">
                                </ul>
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

        <!--  : catchAction -->
        <div  class="modal fade catchModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="font-size: 20px;" class="closeModal close glyphicon glyphicon-remove "></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Motivos y responsables de contingencia</h4>
              </div>
              <div class="modal-body" >

                    <div class="x_panel">
                      <div class="x_title"></div>
                      <div class="x_content">
                        <form action="#" id="catchForm" method="post" accept-charset="utf-8">
                          <div class="row">
                            <div class="col-md-5">
                              <label class="control-label ">Motivo:</label>
                              <select name="catchData[motive]" class="form-control " >
                                <option value="">Seleccione</option>
<?php foreach ($motive as $m):?>
                                  <option value="<?=$m->get('mot_id')?>"><?=$m->get('mot_name')?></option>
<?php endforeach;?>
</select>
                            </div>
                            <div class="col-md-5">
                              <label class="control-label">Responsable </label>
                              <select name="catchData[responsable]" class="form-control " >
                                <option value="">Seleccione</option>
<?php foreach ($responsable as $r):?>
                                  <option value="<?=$r->get('res_id')?>"><?=$r->get('res_name')?></option>
<?php endforeach;?>
                              </select>
                            </div>
                          </div>
                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                              <label class="control-label">Observación: </label>
                              <textarea class="form-control" name="catchData[obs]" ></textarea>
                            </div>
                          </div>
                          <br/>
                          <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-warning pull-right" type="submit"><span class="glyphicon glyphicon-warning-sign"></span> Ingresar</button>
                            </div>
                          </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12" id="catchMessage"></div>
                          </div>
                      </div>
                    </div>

              </div>
              <br/>
            </div>
          </div>

        </div>

        <!-- FIN MODALES -->
        <script src="<?=base_url('resources/js/jquery-ui/jquery-ui.js')?>"></script>
        <script src="<?=base_url('resources/js/sortElements.js')?>" type="text/javascript" charset="utf-8" ></script>

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

            $(document).on('click',".actionBtn",function(){
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
                case 'digiAction':
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
                    $("#catchTable tbody").empty();
                    if(typeof response.catch != 'undefined'){
                      $.each(response.catch, function (key, data) {
                        var tr = $("<tr>");
                        tr.append("<td>"+data.responsable+"</td>");
                        tr.append("<td>"+data.motive+"</td>");
                        tr.append("<td>"+data.status+"</td>");
                        tr.append("<td>"+moment(data.date).format('DD-MM-YYYY HH:mm')+"</td>");
                        tr.append("<td>"+data.user+"</td>");
                        $("#catchTable tbody").append(tr);
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
                var documentsSelected = $(".documents td   input[type=checkbox]:checked") ;

                $(".infoReceive").empty()
                $('.t').not('.active').find('a').removeAttr("data-toggle");
                documentsAdded  = new Array();
                //console.log(documentsAdded);
                $("#documentsAdd").empty();
                if(documentsSelected.length > 0){
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
                var validate   = true;
                $.each($('input', $(this) ),function(k){

                    if($(this).val().trim().length == 0){
                      validate  = false;
                      $(this).attr('placeholder',"Requerido")
                    }

                })
                var dataForm   = $(this).serialize();



                if(acept && validate ){
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
              var table ;
            $('a[data-toggle="tab"]').on('click', function (e) {
                $(".infoReceive").empty();
                var tab = $(e.target).attr("status") // activated tab
                if(typeof tab != 'undefined'){
                  $.ajax({
                    "type":"GET",
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
                              //tr.append("<td class='selectDocument' >"+obj.doc_serial+"</td>");
                              tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                              tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                              tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                              tr.append("<td class='selectDocument' >"+obj.doc_documentdate+"</td>");
                              tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                              tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button> <?php if (isSupervisor()):?> <button type='button' data-target='.catchModal' data-toggle='modal' class='btn btn-warning btn-xs catchAction' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-warning-sign' ></span></button><?php endif?></td>");
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
                                tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button> <?php if (isSupervisor()):?> <button type='button' data-target='.catchModal' data-toggle='modal' class='btn btn-warning btn-xs catchAction' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-warning-sign' ></span></button><?php endif;?></td>");
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
                                tr.append("<td class='selectDocument' >"+obj.doc_fradicacion+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_dateradicacion+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_city+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_carrier+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                                tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button> <?php if (isSupervisor()):?> <button type='button' data-target='.catchModal' data-toggle='modal' class='btn btn-warning btn-xs catchAction' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-warning-sign' ></span></button><?php endif;?></td>");
                                table.append(tr);

                                table.append(tr);
                              });

                            break;
                            case 3://digitalizados
                              table = $('#documentsdigitalized');
                              $( data ).each(function( index,value ) {
                                var obj = JSON.parse(value);
                                var tr  = $("<tr style='cursor:pointer;' id='doc"+obj.doc_id+"' class='doc even pointer' doc='"+obj.doc_id+"' >");
                                tr.append('<td class="a-center"><input    type="checkbox" class="flat check" id="'+obj.doc_id+'"  value="'+obj.doc_salenumber+' | Tipo: '+obj.doc_ordertype+' "  name="table_records"></td>');
                                tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_ftls+"</td>");
                                tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                                tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button> <?php if (isSupervisor()):?> <button type='button' data-target='.catchModal' data-toggle='modal' class='btn btn-warning btn-xs catchAction' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-warning-sign' ></span></button><?php endif;?></td>");
                                table.append(tr);

                                //table.append(tr);

                              });
                              break;
                            case 4:
                              $("#filter").trigger('submit');

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
            var doc;
            $(document).on('click','.catchAction',function(){
              doc = $(this).attr('doc');
            });

            $("#catchForm").submit(function(){
              var dataForm   = $(this).serialize();

              $.ajax({
                "type":"GET",
                "dataType":"json",
                "cache":false,
                "data":{documents: doc},
                "url":"<?=site_url('Contingency/create?')?>"+dataForm,
                beforeSend:function(){
                    $("body").css("cursor",'wait');
                    $(".infoReceive").empty();
                },
                success:function(data){
                  var success =  data.success;
                  var errors  =  data.errors;
                  if(typeof success != 'undefined' ){
                      $("#catchMessage").html("<p class='alert alert-success'>"+success+"</p>");
                  }
                  if(typeof errors != 'undefined' ){
                    $("#catchMessage").html("<p class='alert alert-danger'>"+errors+"</p>");
                  }
                },
                complete:function(){
                    $("body").css("cursor",'initial');

                }
              });
              return false;
            });

            $("#filter").submit(function(){
              var dataForm = $(this).serialize();
              table = $('#documentsHistoric');
              $.ajax({
                type:"get",
                dataType:"json",
                url:'<?=site_url("Document/historicDocuments")?>',
                data:dataForm,
                beforeSend:function(){
                  $("body").css("cursor",'wait');
                  $('#documentsHistoric tbody').empty();
                },
                success:function(data){

                  if(typeof data != 'undefined'){
                     table.show();

                      $( data.documents ).each(function( index,obj ) {

                        //var obj = JSON.parse(value);
                        var tr  = $("<tr style='cursor:pointer;' id='doc"+obj.doc_id+"' class='doc even pointer' doc='"+obj.doc_id+"' >");
                        tr.append("<td class='selectDocument' >"+obj.doc_salenumber+"</td>");
                        tr.append("<td class='selectDocument' >"+obj.doc_guidenumber+"</td>");
                        tr.append("<td class='selectDocument' >"+obj.doc_ordertype+"</td>");
                        tr.append("<td class='selectDocument' >"+obj.doc_documentdate+"</td>");
                        tr.append("<td class='selectDocument' >"+obj.doc_datedigrecepcionfac+"</td>");
                        tr.append("<td class='selectDocument' >"+obj.doc_dateradicacionfact+"</td>");
                        tr.append("<td class='selectDocument' >"+obj.doc_customer+"</td>");
                        tr.append("<td class=''><button type='button' data-target='.documentDetail' data-toggle='modal' class='btn btn-info btn-xs viewDoscument' doc='"+obj.doc_id+"'><span class='glyphicon glyphicon-search' ></span></button> </td>");
                        table.append(tr);
                    });
                  }else{
                     table.hide();

                  }

                },
                complete:function(){
                  $("body").css("cursor",'default');
                }

              });
              return  false;
            });

            //$("#filter").trigget
               //fechas
            var diasRadicacion = {"C01":9,"C02":9,"C03":9,"C04":9,"C05":9,"C06":9,"C07":9,"C08":9,"C09":9,"C10":9,"C11":9,"C12":9,"C13":3,"ISLA DE PASCUA ISLA DE PASCUA":9,"C16":9};

            /* SE EVALUARÁ  INCORPORAR
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
            */

            //filtros and check all
            (function ($) {
                $('.filtro').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.documents tbody tr').hide();
                    $('.documents tbody tr').filter(function () {
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
              .wrapInner('<span style="cursor:ns-resize" title="Ordenar columna"/>')
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
