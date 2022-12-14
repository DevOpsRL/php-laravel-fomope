@extends('layouts.app', ['title' => 'addnew', 'activePage' => 'addfn'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('INGRESOS / REINGRESOS') }}</h4>
                            <p class="card-category">altas a nuevos trabajadores...</p>
                        </div>
                        <div class="card-body ">
                            <!-- form:begin -->
                            
                            <form method="POST" action="{{route('f_store')}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">MOVIMIENTO</span>
                                            </div>
                                                
                                            <input type="text" class="form-control col-md-2" value="{{$fmov->movto}}" name="movto" readonly>
                                            <input type="text" class="form-control" value="{{$fmov->descripcion}}" name="mov_descr" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ELABORACION</span>
                                            </div>
                                            <input type="text" class="form-control col-md-3" name="elaboracion" id="f_elab" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        DATOS DEL TRABAJADOR PROMOCIONADO
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <label for="sol_nombre" class="control-label col-sm-2 text-sm-right">
                                                        {{ __('Nombre') }}
                                            </label>
                                            <input id="sol_nombre" type="text" name="nombre" class="form-control"
                                                value="" placeholder="Nombre del solicitante" required readonly>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-outline-secondary" type="button" id="button-sol-name" 
                                                        data-toggle="modal" data-target="#modal-for-sol">
                                                         <span class="oi oi-credit-card">Buscar</span>
                                                        </button>
                                                        
                                                    </div>
                                               
                                          <!-- inpout -->
                                        </div> <!-- group:imput-->
                                    </div> <!-- form:grp --> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RFC</span>
                                            </div>
                                            
                                            <input id="info_rfc" type="text" class="form-control" value="" name="rfc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CURP</span>
                                            </div>
                                            <input id="info_curp" type="text" class="form-control" value="" name="curp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NOMBRE</span>
                                            </div>
                                            
                                            <input id="info_nombre" type="text" class="form-control" value="" name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CVE PRESUP</span>
                                            </div>
                                            
                                            <input id="info_clave_presupuestal" type="text" class="form-control" value="" name="clave_sustituto">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">INGGOB</span>
                                            </div>
                                            
                                            <input id="info_inggob" type="text" class="form-control" value="" name="inggob">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">INGSSA</span>
                                            </div>
                                            
                                            <input id="info_ingssa" type="text" class="form-control" value="" name="ingssa">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ADSCRIPCION</span>
                                            </div>
                                            
                                            <input id="info_cr" type="text" class="form-control" value="" name="cr_sustituto">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ESTRUCTURA</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="estructura_sustituto">
                                        </div>
                                    </div>                                   
                                </div>
                                <!-- xxxx -->
                                
                                <!-- xxxx -->
                                
                                <div class="row">
                                    <div class="col">
                                        DATOS LABORALES DEL SUSTITUIDO...
                                    </div>
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RFC (sustit)</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->rfc}}" name="rfc_sustituto" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CURP (sustit)</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->curp}}" name="curp_sustituto" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NOMBRE (sustit)</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->nombre}}" name="nombre_sustituto" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">MOTIVO DE LA BAJA</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="motivo">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CVE PRESP</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->clave_presupuestal}}" name="clave_presupuestal" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">FUNCION</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->estructura}}" name="estructura" required/>
                                        </div>
                                    </div>
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">EFECTOS DEL</span>
                                            </div>
                                            <input type="text" class="form-control" value="" name="efectos_del" id="efecdel" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ADSCRIPCION</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->cr}}" name="cr" required/>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- row end -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">HORARIO</span>
                                            </div>
                                            <select class="form-control" name="horas">
                                                
                                                <option value="8" selected>08 HORAS</option>
                                                <option value="7">07 HORAS</option>
                                                <option value="6">06 HORAS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">QUINQUENIO</span>
                                            </div>
                                            <input type="text" class="form-control" value=" " name="quinquenio"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col">
                                        VIGENCIAS Y OTROS DATOS
                                    </div>
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">VIGENCIA DEL</span>
                                            </div>
                                            <input type="text" class="form-control" name="vigencia_del" id="vigdel" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">VIGENCIA AL</span>
                                            </div>
                                            <input type="text" class="form-control" name="vigencia_al" id="vigal" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">EMPLEADO</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->empleado}}" name="empleado"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- row end -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">DOCTO</span>
                                            </div>
                                             <input type="text" class="form-control" value="{{$dato->docto}}" name="docto">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">LOTE</span>
                                            </div>
                                            <input type="text" class="form-control" value="" name="lote">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">QNA</span>
                                            </div>
                                            <select class="form-control" name="quincena" required>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                              
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">AÑO</span>
                                            </div>
                                            <select class="form-control" name="anio" required>
                                                <option value="2022" selected>2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="">---</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--- XXXXX -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">JUSTIFICACION</span>
                                            </div>
                                            <textarea
                                            rows="5" 
                                            cols="80" 
                                            name="justificacion"
                                            placeholder="Justificacion, si los hay...">
 
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- xxxx -->
                                <div class="input-group mb-3">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">GUARDAR</button>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <a href="{{route('r_search')}}"> CANCELAR</a>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- form:end -->
                            <!-- modal -->
                                <div id="modal-for-sol" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          
                                        </div>
                                        <div class="modal-body">
                                            <div id="custom-search-input1">
                                                <div class="input-group">
                                                    <input id="locsolname" name="locsolname" type="text" data-provide="typeahead" class="form-control typeahead " placeholder="AP AM NOMBRE"  autofocus/>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div><!-- end modal -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- rowend -->
        </div>
    </div>
    
<!- --------------------------------- ->
    <script type="text/javascript">
        $('#locsolname').typeahead({
        afterSelect: function(val) { 
            var obj = JSON.parse(val);
            $("#info_nombre").val (obj.nombre);
            $("#info_rfc").val (obj.rfc);
            $("#info_curp").val (obj.curp);
            $("#info_clave_presupuestal").val(obj.clave_presupuestal);
            $("#info_cr").val (obj.cr);
            $("#info_codigo").val (obj.codigo);
            $("#info_codigo_descr").val (obj.cod_descr);
            $("#info_adscripcion").val (obj.cr_descr);
            this.$element.val("Presione [ ESC ] o cerrar");
        },
            source:  function (term, process) {
                return $.get("/autocomplete", { term: term }, function (data) {
                    return process(data);
                })
            }
        
    });
    </script>
    
@endsection
