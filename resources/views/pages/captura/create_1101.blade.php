@extends('layouts.app', ['title' => 'addnew', 'activePage' => 'addfn'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Fomope') }}</h4>
                            <p class="card-category">nueva funcion...</p>
                        </div>
                        <div class="card-body ">
                            <!-- form:begin -->
                            
                            <form method="POST" action="#">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RFC</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->rfc}}" name="rfc" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">CURP</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->curp}}" name="curp" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">nombre</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->nombre}}" name="nombre" readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- xxxx -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">calle</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->calle}}" name="calle">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">numero_ext</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->numero_ext}}" name="numero_ext">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">numero_int</span>
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
                                                <span class="input-group-text">colonia</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->colonia}}" name="colonia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">codigo_postal</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->codigo_postal}}" name="codigo_postal">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">municipio</span>
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
                                                <span class="input-group-text">estado</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->estado}}" name="estado">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">telefono</span>
                                            </div>
                                            
                                            <input type="text" class="form-control" value="{{$dato->telefono}}" name="telefonol">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">cuenta</span>
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
                                                    <option value="{{$g->id}}">{{$g->descr}}</option>
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
                                                <span class="input-group-text">hijos</span>
                                            </div>
                                            
                                             <select class="form-control" name="hijos">
                                                <option value="1">SI</option>
                                                <option value="2">NO</option>
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
                                            <input type="text" class="form-control" value="{{$dato->clave_presupuestal}}" name="clave_presupuestal"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">FUNCION</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->funcion}}" name="funcion"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- row end -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">D</span>
                                            </div>
                                             <input type="text" class="form-control" value="{{$dato->D}}" name="D">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            
                                        </div>
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
                                            <input type="text" class="form-control" value="{{$dato->vigencia_del}}" name="vigencia_del"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">DOCTO</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->vigencia_al}}" name="vigencia_al"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">EMPLEADO</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->vigencia_al}}" name="vigencia_al"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- row end -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">VIGENCIA  AL</span>
                                            </div>
                                             <input type="text" class="form-control" value="{{$dato->D}}" name="D">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">LOTE</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->x}}" name="x">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">QUINCENA</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$dato->x}}" name="x">
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
                                            <textarea class="form-control" cols="4" name="justificacion"> </textarea>
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