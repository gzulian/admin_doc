<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración| Baxter </title>
    <link type="image/png" rel="icon" href="<?=base_url('resources/images/baxter_icon_32x32.png')?>" sizes="32x32">
    <!-- Bootstrap -->
    <link href="<?=base_url('resources/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('resources/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('resources/build/css/custom.css');?>" rel="stylesheet">

    <link href="<?=base_url('resources/vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!-- iCheck -->



    <script src="<?=base_url('resources/vendors/fastclick/lib/fastclick.js')?>"></script>

    <!-- NProgress -->
    <script src="<?=base_url('resources/vendors/nprogress/nprogress.js')?>"></script>
    <script src="<?=base_url('resources/vendors/jquery/dist/jquery.js');?>"></script>
    <script src="<?=base_url('resources/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!--script src="<?//=base_url('resources/vendors/select2/src/js/jquery.select2.js');?>"></script-->



    <script src="<?=base_url('resources/vendors/iCheck/icheck.min.js');?>"></script>


    <script src="<?=base_url('resources/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('resources/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>" type="text/javascript" charset="utf-8" >

    </script>
    <script src="<?=base_url('resources/js/moment/moment.min.js')?>"></script>

    <script type="text/javascript"  src="<?=base_url('resources/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <script src="<?=base_url('resources/vendors/nprogress/nprogress.js')?>"></script>
  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 1;">

              <a href="index.html" class="site_title"><img width="50px" src="<?=base_url('resources/images/logo.png')?>" alt=""></a>
            </div>
            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
<?php if (isAdmin()):?>
                  <li><a href="<?=site_url('Dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                  <li><a><i class="fa fa-table"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child-menu" style="display:  none;">
                      <li><a href="<?=site_url('report/status')?>"> Estado de pago de documentos</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=site_url('report/motive')?>"> Causal de documentos pendientes</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=site_url('report/returnDoc')?>"> Retorno de documentos</a></li>
                      <li class="divider"></li>
                  </ul>
                  </li>
                  <!-- Mantenedores -->
                  <li><a><i class="fa fa-pencil"></i> Mantenedores <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child-menu" style="display:  none;">
                      <li><a href="<?=site_url('user/index');?>"><i class="fa fa-user "></i> Usuarios</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=site_url('Contingency/motive');?>"><i class="fa fa-tags"></i> Motivos</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=site_url('Contingency/responsible');?>"><i class="fa fa-users"></i> Responsable</a></li>
                      <li class="divider"></li>
                      
                  </ul>
                  </li>
                   
<?php endif?>
<?php if (isSupervisor() || isAsistant()):?>
                  <li><a href="<?=site_url('Document')?>" ><i class="fa fa-edit"></i> Documentos</a></li>
<?php endif?>
<?php if (isSupervisor()):?>
  <li><a href="<?=site_url('document/upload');?>"><i class="fa fa-upload"></i> Carga masiva</a></li>
<?php endif?>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" href="<?=site_url('login/logout')?>" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
            <div class="title_right" style="margin-top:13px;">
                <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" id="param" placeholder="N° de orden o N° Factura">
                    <span class="input-group-btn">
                      <button  type='button' data-target='' id="viewDoscument" class=' btn btn-info btn-md '><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- jQuery -->
        <!-- Custom Theme Scripts -->
        <!-- Bootstrap -->



        <!-- page content -->

        <!-- /page content -->
                <div  class="modal fade documentDetail " tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="font-size: 20px;" class="closeModal close glyphicon glyphicon-remove "></span>
                </button>
                <h4 class="modal-title">Detalle de Documento: <span style="font-size: 16px;" class="label label-primary" id="doc_salenumber"></span> </h4>
              </div>
              <div class="modal-body" >
                <div class="row">
                  <div class="col-md-12  col-xs-12">
                    <div class="x_panel">

                      <div class="x_content">
                          <ul class="nav nav-tabs ">
                            <li class=" active" > <a id="processTab"  href="#process" data-toggle="tab">Datos</a></li>
                            <li class=" "><a id="generalTab" href="#general" data-toggle="tab">General</a></li>
                            <li class=" " ><a id="trazabilityTab"  href="#trazability" data-toggle="tab">Trazabilidad</a></li>
                            <li class=" " ><a id="catchTab"  href="#catch" data-toggle="tab">Faltas</a></li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="process">
                              <br/>
                              <br/>
                              <form action="#" id="recive" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label ">Se envía a radicación:</label>
                                    <input type="text" class="radicacion" id="doc_radicacion" value="SI" name="document[doc_radicacion]">
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
                                    </tr>
                                    <tr>
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
                                      <td><span id="doc_monto"></span></td>
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
                            <div class="tab-pane" id="catch">
                              <table id="catchTable" class="table  table-responsive">
                                <thead>
                                  <tr>
                                    <th>Responsable</th>
                                    <th>Motivo</th>
                                    <th>Etapa</th>
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
            </div>
          </div>
        </div>
        <script>
          $(function(){
              $(document).on('click','#viewDoscument',function(){
              var id = $("#param").val();
              if(typeof id != 'undefined'){

                $.ajax({
                  'type':'GET',
                  'url':'<?=site_url('document/findBySerial')?>',
                  'dataType':'json',
                  'data':"serial="+id,
                  beforeSend:function(){
                      $("body").css("cursor",'wait');
                  },
                  success:function(response){

                    if(typeof response.document != 'undefined'){
                      $('.documentDetail').modal('show');
                      $.each(response.document._columns, function (key, data) {

                        if(data == "0000-00-00"){
                        $("[name='document["+key+"]']").val("");
                        }else{
                          $("[name='document["+key+"]']").val(data);
                        }

                        var field = $("#"+key);
                        if(typeof field != 'undefined' && data != "0000-00-00"){
                          field.text(data);
                        }
                      })

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
                    }else{
                      alert("Documento: "+id+" no encontrado");
                      return false;
                    }
                  },
                  complete:function(){
                     $("body").css("cursor",'default');
                  }
                });
              }
              return false;

            });
          })
        </script>