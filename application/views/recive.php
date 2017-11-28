<style type="text/css" media="screen">
  .doc{
    cursor:pointer;
  }
  .selecccionada{
    background-color: rgba(182, 99, 135, 0.11);
  }
</style>
<div class="main-content">
  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-file"></i>
            Dcumentos
          </h3>
          <h5>
            <span>
              Registro
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
            <div id="errors">

            </div>
            <form action="#" id="filter" method="post" accept-charset="utf-8" class=" fill-up">
              <ul class="separate-sections">
                <li class="input">
                  <input name="filter[folio]" type="number" class="form-control" placeholder="Número de factura"   />
                </li>
                <li class="input">
                  <input name="filter[provider]" type="text" class="form-control" placeholder="Nombre del cliente"/>
                </li>
                <!--li class="input">
                   <select class="chzn-select" name="filter[datetype]">
                      <option selected value=" " >Tipo de fecha</option>
                      <option value="0">Fecha Entrega logistica a SAC</option>
                      <option value="1">Fecha de entrega de radicación</option>
                      <option value="2">Fecha de digitalización Guía</option>
                      <option value="3">Fecha de digitalización factura recepcionada cliente</option>
                    </select>
                </li-->
                <li class="input">
                  <div class="row">
                    <div class="col-md-5">
                      <select placeholder="AÑO" class="chzn-select "  name="filter[year]">
                          <option value=" " selected="selected" >AÑO</option>
                          <option value="2017" >2017</option>
                          <option value="2018" >2018</option>
                          <option value="2019" >2019</option>
                          <option value="2020" >2020</option>
                          <option value="2021" >2021</option>

                      </select>
                    </div>
                    <div class="col-md-5">
                      <select placeholder="AÑO" class="chzn-select "  name="filter[month]">
                          <option value=" " selected="selected">MES</option>}
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
                    <div class="col-md-2">
                      <button title="Filtrar" type="submit" class="pull-right btn btn-blue"><i class="icon-filter"> </i></button>
                    </div>
                  </div>
                </li>
              </ul >
            </form>
             <div class="row">

              <div id="result" class="col-md-12" style="display: none; height: 500px; overflow-y: scroll;" >
                <table id="tableTest" class="table  table-condensed ">
                   <thead>
                     <th>Folio</th>
                     <th>Cliente</th>
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
            <ul class="nav nav-tabs nav-tabs-left">
              <li class="active"><a href="#detail" data-toggle="tab"><i class="icon-file"></i> <span>Detalle de documento</span></a></li>
              <li><a href="#trazability" data-toggle="tab"><i class="icon-cog"></i> <span>Trazabilidad</span></a></li>
            </ul>
            <div class="title">Documento: <i id="sectionFolio"><input type="text"  disabled="disabled" name="document[doc_serial]"></i></div>
          </div>
          <div class="box-content padded">
            <div class="tab-content ">
              <div class="tab-pane active" id="detail">
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
                                <ul class="separate-sections">
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

                                  </li>
                                </ul>
                                <ul class="separate-sections">
                                  <li class="input">
                                    <div class="row">
                                      <div class="col-md-3">
                                        <label class="control-label">Transportista: </label>
                                        <input type="text" name="document[doc_transport]"  class="form-control" />
                                      </div>

                                    </div>
                                  </li>
                                </ul>
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
                                        <label class="control-label ">F. digi. factura recep. por cliente</label>
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
                            <br/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="trazability">
                <div class="box-header">

                </div>
                <div class="box-content padded">
                 <table  class="table table-responsive table-hover">
                   <caption>Historial de estados</caption>
                   <thead>
                     <tr>
                       <th>Fecha</th>
                       <th>Evento</th>
                       <th>Usuario</th>
                     </tr>
                   </thead>
                   <tbody id="trazabilityTable">

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

<script>
  $(function(){
    $( ".datepicker2" ).datepicker({ format: 'yyyy-mm-dd' });

     var loadingDiv = $("#loadingDiv");
     //console.log(loadingDiv);
      loadingDiv.hide();

      $("#recive").submit(function(){
         var formData  = $(this).serialize();
         console.log(formData);
          if(typeof formData != 'undefined'){
            $.ajax({
              'type':'GET',
              'url':'<?=site_url('document/recive')?>',
              'dataType':'text',
              'data':formData,
              beforeSend:function(){
                 loadingDiv.show();
              },
              success:function(response){
                console.log(response);
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
                $("#errors").empty();
                if(typeof response.errors != 'undefined'){
                  $.each(response.errors, function (key, data) {

                      $("#errors").append('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="icon-warning-sign "></span> '+data+'</div>');
                  })
                }
                if(typeof response.documents != 'undefined'){
                  //table.fnClearTable();
                  $("#result").show();
                  $.each(response.documents, function (key, data) {
                     $("#tableTest").append("<tr class='doc' doc='"+data.serial+"'><td>"+data.serial+"</td><td>"+data.customer+"</td><td>"+data.date+"</td></tr>");
                     /*table.fnAddData( {
                        0:"<a href='' class='doc' doc='"+data.serial+"' >"+data.serial+"</a>",
                        1:"<a href='' class='doc' doc='"+data.serial+"' >"+data.customer+"</a>",
                        2:"<a href='' class='doc' doc='"+data.serial+"' >"+data.date+"</a>"
                    } );*/
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
            $(".doc").removeClass("selecccionada");
            $(this).addClass("selecccionada");

            $.ajax({
              'type':'GET',
              'url':'<?=site_url('document/find')?>',
              'dataType':'json',
              'data':"serial="+id,
              beforeSend:function(){
                 loadingDiv.show();
              },
              success:function(response){
                 if(typeof response.document != 'undefined'){
                    $('.collapse').collapse();
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
                 $("#trazabilityTable").empty();
                 if(typeof response.trazability != 'undefined'){
                    $.each(response.trazability, function (key, data) {
                      var tr = $("<tr>");
                      tr.append("<td>"+moment(data.date).format('DD-MM-YYYY HH:mm')+"</td>");
                      tr.append("<td>"+data.action+"</td>");
                      tr.append("<td>"+data.user+"</td>");
                      $("#trazabilityTable").append(tr);
                    });

                 }
              },
              complete:function(){
                loadingDiv.hide();
              }
          });
        }
        return false;
      });
      //fechas
      var diasRadicacion = {"C01":9,"C02":9,"C03":9,"C04":9,"C05":9,"C06":9,"C07":9,"C08":9,"C09":9,"C10":9,"C11":9,"C12":9,"C13":3,"ISLA DE PASCUA ISLA DE PASCUA":9,"C16":9};

      $(document).on('click','.radicacion',function(){
        var selected = $(this).attr("id");
        //$(".radicacion").attr("name","");
        //$(this).attr("name","document[doc_dateradicacion]");
        switch(selected){
          case "r1":
            var code = $("#doc_city").text();
            if(typeof code != 'undefined' && typeof diasRadicacion[code] != 'undefined'  ){
              var newDate = addWorkDays(new Date(),diasRadicacion[code]);
              newDate = moment(newDate).format("YYYY-MM-DD");
              $("[name='document[doc_dateradicacion]']").val(newDate);
            }
            //addWorkDays();
          break;
          case "r2":
            var date  = $("#doc_documentdate").text();

            if(typeof date != 'undefined'){
              $("[name='document[doc_dateradicacion]']").val(date);
            }

          break;
          default:
            alert("Op inválida");
        }
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