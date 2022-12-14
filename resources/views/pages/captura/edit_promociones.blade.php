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
                            <h4 class="card-title">{{ __('EDITAR') }}</h4>
                            <p class="card-category">datos existentes...</p>
                        </div>
                        <div class="card-body ">
                            <!-- form:begin -->
                            
                            <form method="POST" action="{{route('f_update')}}">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">MOVIMIENTO</span>
                                            </div>
                                                
                                            <input type="text" class="form-control col-md-2" value="{{$dato->movimiento}}" name="movimiento" readonly>
                                            <input type="text" class="form-control" value="{{$fmov->descripcion}}" name="mov_descr" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ELABORACION</span>
                                            </div>
                                            <input type="text" class="form-control col-md-3" name="elaboracion" id="f_elab" value="{{$dato->elaboracion}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RFC</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->rfc}}" name="rfc" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CURP</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->curp}}" name="curp" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NOMBRE</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->nombre}}" name="nombre" required>
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
                                            
                                            <input type="text" class="form-control" value="{{$dato->calle}}" name="calle">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NUM EXT</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->numero_ext}}" name="numero_ext">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NUM INT</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->numero_int}}" name="numero_int">
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
                                            
                                            <input type="text" class="form-control" value="{{$dato->colonia}}" name="colonia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">C.P.</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->codigo_postal}}" name="codigo_postal">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">MUNICIPIO</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->municipio}}" name="municipio">
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
                                            
                                            <input type="text" class="form-control" value="{{$dato->estado}}" name="estado">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">TELEFONO</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->telefono}}" name="telefono">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CTA BANC</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->cuenta}}" name="cuenta">
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
                                                @php
                                                    $sel= ($g->descr == $dato->genero)?"selected":"";
                                                @endphp
                                                    
                                                    <option value="{{$g->descr}}" {{$sel}}>{{$g->descr}}</option>
                                                @empty
                                                    <option value="MASCULINO">MASCULINO</option>
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
                                                    @php

                                                        $sel1= ($c->id == $dato->civil)?"selected":"";
                                                    @endphp
                                                    <option value="{{$c->id}}" {{$sel1}}>{{$c->descr}}</option>
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
                                                @php

                                                    $sel3= (1 == $dato->civil)?"selected":"";
                                                @endphp
                                                <option value="0" {{$sel3}}>SI</option>
                                                @php

                                                    $sel3= (0 == $dato->civil)?"selected":"";
                                                @endphp
                                                <option value="1" {{$sel3}}>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        DATOS LABORALES
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
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ADSCRIPCION</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->cr}}" name="cr" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">DESCRIPCION</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$cr->descr}}" name="cr_descr"/>
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
                                                @php
                                                    for($i = 6; $i <= 8; $i++){
                                                        $selh = $i == intval($dato->horas)?"selected":"";
                                                        echo "<option value='$i'".$selh.">0$i HORAS</option>";

                                                    }
                                                @endphp
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
                                            <input type="text" class="form-control" name="vigencia_del" id="vigdel" value="{{$dato->vigencia_del}}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">VIGENCIA AL</span>
                                            </div>
                                            <input type="text" class="form-control" name="vigencia_al" value ="{{$dato->vigencia_al}}" id="vigal" />
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
                                                @php
                                                    for($i = 1; $i <= 24; $i++){
                                                        $selh = $i == intval($dato->quincena)?"selected":"";
                                                        echo "<option value='$i'".$selh.">$i</option>";

                                                    }
                                                @endphp

                                              
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">AÑO</span>
                                            </div>
                                            <select class="form-control" name="anio" required>
                                                @php
                                                    for($i = 2021; $i <= 2025; $i++){
                                                        $selh = $i == intval($dato->anio)?"selected":"";
                                                        echo "<option value='$i'".$selh.">$i</option>";

                                                    }
                                                @endphp
                                                
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
                                            value="{{$dato->justificacion}}"
                                            placeholder="Justificacion, si los hay..."></textarea>
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
