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
                                        DATOS DEL NUEVO TRABAJADOR
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RFC (nuevo)</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="rfc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CURP (nuevo)</span>
                                            </div>
                                            <input type="text" class="form-control" value="" name="curp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NOMBRE (nuevo)</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="nombre">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CALLE</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="calle">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NUM EXT</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="numero_ext">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NUM INT</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="numero_int">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">COLONIA</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="colonia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">C.P.</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="codigo_postal">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">MUNICIPIO</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="municipio">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ESTADO</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="estado">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">TELEFONO</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="telefono">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CTA BANC</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="" name="cuenta">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">GENERO</span>
                                            </div>
                                            <select class="form-control" name="genero">
                                                @forelse ($genero as $g)
                                                    <option value="{{$g->descr}}">{{$g->descr}}</option>
                                                @empty
                                                    <option value="MASCULINO">MASCULINO</option>
                                                    <option value="FEMENINO">FEMENINO</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">EDO CIVIL</span>
                                            </div>

                                            <select class="form-control" name="estado_civil">
                                                @forelse ($civil as $c)
                                                    <option value="{{$c->id}}">{{$c->descr}}</option>
                                                @empty
                                                    <option value="SOLTERO">SOLTERO</option>
                                                @endforelse
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">HIJOS</span>
                                            </div>
                                            
                                             <select class="form-control" name="hijos">
                                                <option value="1" selected>SI</option>
                                                <option value="2">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
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
                                                <span class="input-group-text">RFC (anterior)</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->rfc}}" name="rfc_sustituto" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CURP (anterior)</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->curp}}" name="curp_sustituto" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NOMBRE (anterior)</span>
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
                                            <input type="text" class="form-control" value="{{$dato->lote}}" name="lote">
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
                                        <a href="#"> CANCELAR</a>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- form:end -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- rowend -->
        </div>
    </div>
@endsection
