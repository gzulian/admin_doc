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
            <form action="#" id="filter" method="post" accept-charset="utf-8" class=" fill-up">
              <ul class="separate-sections">
                <li class="input">
                  <input name="filter[folio]" type="number" class="form-control" placeholder="Número de factura"   />
                </li>
                <li class="input">
                  <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del proveedor"/>
                </li>
                <li class="input">
                   <select class="chzn-select" name="filter[datetype] ">
                      <option selected value=" " >Tipo de fecha</option>
                      <option value="doc_datelogtosac">Fecha Entrega logistica a SAC</option>
                      <option value="doc_dateradicacion">Fecha de entrega de radicación</option>
                      <option value="doc_datedigi">Fecha de digitalización Guía</option>
                      <option value="doc_datedigrecepcionfac">Fecha de digitalización factura recepcionada cliente</option>
                    </select>
                </li>
                <li class="input">
                  <div class="row">
                    <div class="col-md-5">
                      <input placeholder="DESDE" class="datepicker " type="text" name="filter[from]">
                    </div>
                    <div class="col-md-5">
                      <input placeholder="HASTA"  class="datepicker" type="text" name="filter[to]">
                    </div>
                    <div class="col-md-2">
                      <button title="Filtrar" type="submit" class="pull-right btn btn-blue"><i class="icon-filter"> </i></button>
                    </div>
                  </div>
                </li>
              </ul >
            </form>
             <div class="row">
              <div id="result" class="col-md-12" style="display: none; height: 500px;  overflow-y:scroll;" >
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
            <div class="title">Documento: <i id="sectionFolio"><input type="text"  disabled="disabled" name="document[doc_serial]"></i></div>
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
                    <div id="collapseTwo" class="accordion-body collapse ">
                      <div class="accordion-inner padded">
                        <form action="#" id="recive" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="form-group">
                              <label class="control-label col-lg-2">Retorno</label>
                              <div class="col-lg-4">
                                <input type="text" name="document[doc_return]" class="form-control" />
                              </div>
                              <label class="control-label col-lg-2">A radicación:</label>
                              <div class="col-lg-4">
                                <input type="radio" class="" id="r1" value="SI" name="document[doc_radicacion]">SI

                                <input type="radio" class="" id="r2" value="NO" name="document[doc_radicacion]">NO
                              </div>
                            </div>
                            <ul class="separate-sections">
                              <li class="input">
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
                                    <label class="control-label ">Fecha digi. factura recep. por cliente</label>
                                    <input readonly="readonly" type="text" class="datepicker2 form-control"  name="document[doc_facdate]" />
                                  </div>
                                </div>
                                
                              </li>
                            </ul>

                      
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

                             <input type="hidden" class=""  name="document[doc_pro_id]" />
                             <input type="hidden" class=""  name="document[doc_id]" />
                             <input type="hidden" class=""  name="document[doc_serial]" />
                             

                            
                          
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
                    <div id="collapseOne" class="accordion-body collapse ">
                      <div class="accordion-inner padded">
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Mes: </label>
                            <span id="doc_month"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Ciudad: </label>
                            <span id="doc_city"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Número de orden: </label>
                            <span id="doc_ordernumber"></span>
                          </div>
                           <div class="col-md-3">
                            <label class="control-label">Tipo de orden: </label>
                            <span id="doc_ordertype"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Nombre cliente 1: </label>
                            <span id="doc_customer"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Nombre cliente 2: </label>
                            <span id="doc_customerTwo"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Fecha: </label>
                            <span id="doc_documentdate"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">N° de factura: </label>
                            <span id="doc_facturenumber"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">N° de guía: </label>
                            <span id="doc_guidenumber"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">N° Orden de compra: </label>
                            <span id="doc_saleorder"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Ejecutivo: </label>
                            <span id="doc_executive"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                              <label class="control-label">Monto ($): </label>
                              <span id="doc_monto"></span>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Monto (usd): </label>
                              <span id="doc_montousd"></span>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Transportista: </label>
                              <span id="doc_transport"></span>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Almacen: </label>
                              <span id="doc_depot"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha estimada factura de log a sac: </label>
                            <span id="doc_datelogtosac"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Días de retorno logistica: </label>
                            <span id="doc_daylogic"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Status logistica: </label>
                            <span id="doc_logicstatus"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha estimada factura de TLS: </label>
                            <span id="doc_datetls"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Días de confirmación SETS: </label>
                            <span id="doc_daysets"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Status SAC: </label>
                            <span id="doc_statussac"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha estimada factura radicación: </label>
                            <span id="doc_dateradicacion"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Días de confirmación TLS: </label>
                            <span id="doc_daytls"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Status FASTCO: </label>
                            <span id="doc_statusfastco"></span>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label">Fecha radicación factura: </label>
                            <span id="doc_dateradicacionfact"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Fecha digitalazación factura cliente: </label>
                            <span id="doc_datedigi"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Causal: </label>
                            <span id="doc_causal"></span>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Responsable: </label>
                            <span id="doc_responsible"></span>
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
<div style="margin-left: 50%; margin-top: -100px !important; position: absolute;" id="loadingDiv">
    <img id="loading-image" src="<?=base_url('resources/images/ajax-loader.gif')?>" alt="Loading..." />
</div>
<script>
  $(function(){
    $( ".datepicker2" ).datepicker({ format: 'yyyy-mm-dd' });
    
     var loadingDiv = $("#loadingDiv");
     //console.log(loadingDiv);
      loadingDiv.hide();

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
      ///$("#dataTables_length").hide();
      
      $("#recive").submit(function(){
         var formData  = $(this).serialize();
          if(typeof formData != 'undefined'){
            $.ajax({  
              'type':'POST',
              'url':'<?=site_url('document/recive')?>',
              'dataType':'text',
              'data':formData,
              beforeSend:function(){
                 loadingDiv.show();
              },
              success:function(response){
                //alert(response);
               alert("Documento ingresado");
              },
              complete:function(){
                loadingDiv.hide();

              }
          }); 
        }
        return false;
      });
      $("#filter").submit(function(){
          var filter  = $(this).serialize();
          var cont = 0;
          $.each($(this).serializeArray(), function(i, field) {
              if(field.value.length > 1){
                cont++;
              }
          });
          if(typeof filter != 'undefined' && cont >= 1){
            $.ajax({  
              'type':'POST',
              'url':'<?=site_url('document/filter')?>',
              'dataType':'json',
              'data':filter,
              beforeSend:function(){
                 loadingDiv.show();
              },
              success:function(response){
                if(typeof response.errors != 'undefined'){
                  $.each(response.errors, function (key, data) {
                      $("#errors").append('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="icon-warning-sign "></span> '+data+'</div>');
                  })
                }
                if(typeof response.documents != 'undefined'){
                  table.fnClearTable();
                  $("#result").show();
                  $.each(response.documents, function (key, data) {
                     table.fnAddData( {
                        0:"<a href='' class='doc' doc='"+data.serial+"' >"+data.serial+"</a>",
                        1:"<a href='' class='doc' doc='"+data.serial+"' >"+data.customer+"</a>",
                        2:"<a href='' class='doc' doc='"+data.serial+"' >"+data.date+"</a>"
                    } );
                  })
                }
              },
              complete:function(){
                loadingDiv.hide();

              }
          }); 
        }
        return false;
      });

      $(document).on('click','.doc',function(){
          var id = $(this).attr('doc');
          if(typeof id != 'undefined'){
            $.ajax({  
              'type':'GET',
              'url':'<?=site_url('document/find')?>',
              'dataType':'json',
              'data':"serial="+id,
              beforeSend:function(){
                 loadingDiv.show();
              },
              success:function(response){
                 console.log(response);
                 if(typeof response.document != 'undefined'){
                    $('.collapse').collapse();
                    $.each(response.document._columns, function (key, data) {
                        if(data != "0000-00-00"){
                          $("[name='document["+key+"]']").val(data);
                        }
                       
                       if(key == 'doc_radicacion'){
                            console.log($("input[name='document[doc_radicacion]'][value=" + data + "]"));
                            $("input[name='document[doc_radicacion]'][value='" + data + "']").attr('checked', "checked");
                            
                          
                       }
                        var field = $("#"+key);
                        if(typeof field != 'undefined' && data != "0000-00-00"){
                          field.text(data);
                        }
                    })
                 }
              },
              complete:function(){
                loadingDiv.hide();

              }
          }); 
        }
        return false;
      });
  });
</script>