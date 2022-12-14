@extends('layouts.app', ['title' => 'list', 'activePage' => 'cat_funciones'])
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Buscar') }}</h4>
                            <p class="card-category">{{ __('en  plantillas') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- formulario:begin -->
                            <form method="POST" action="{{route('p_search')}}">
                            @csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="input" name="subq-p" class="form-control" id="subq-p" placeholder="nombre a buscar" required>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            <!-- formulario:end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('PLANTILLA') }}</h4>
                            <p class="card-category">{{ __('de formalizados...') }}</p>

                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            <div class="table-full-width">
                                
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <th>RFC</th>
                                        <th>NOMBRE</th>
                                        <th>CLAVE PRESUPUESTAL</th>
                                        <th>CURP</th>
                                        <th>ACCION</th>
                                    </thead>
                                @forelse($search as $n)
                                    <tbody>
                                
                                    
                                    <tr>
                                        <td>{{$n->rfc}}</td>
                                        <td>{{$n->nombre}}</td>
                                        <td>{{$n->clave_presupuestal}}</td>
                                        <td>{{$n->curp}}</td>
                                        <td>
                                            <a class="btn btn-outline-light" role="button" 
                                             data-toggle="modal" data-target="#modal-for-data{{$n->rfc}}"
                                            onclick="">...</a>
                                            <div id="modal-for-data{{$n->rfc}}" class="modal fade" role="dialog"  @keydown.esc="modal-for-data{{$n->rfc}}" tabindex="0">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body" id="{{$n->rfc}}">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">MOVIMIENTO</span>
                                                                        </div>
                                                                        <select class="form-control" name="movto" id="sel_{{$n->rfc}}" onclick="getIDPair('{{$n->rfc}}')" required>
                                                                            <option>MOVIMIENTO?</option>
                                                                            @forelse ($fmov as $m)
                                                                                <option 
                                                                                value="{{$m->movto}}"> {{$m->movto}} - {{$m->descripcion}}
                                                                                </option>
                                                                            @empty
                                                                            @endforelse
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> <!-- row -->
                                                        </div>
                                                            <!-- xxxx -->
                                                        <div class="modal-footer">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <form method="GET" action="{{route('f_create')}}">
                                                                        @csrf     
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Aplicar</button>
                                                                        </div>
                                                                        <input class="form-control" value="{{$n->rfc}}" name="rfcid" id="{{$n->rfc}}">
                                                                        <input class="form-control" value="" name="movid" id="id_{{$n->rfc}}">
                                                                    </form>  
                                                                </div>
                                                                <div class="col-md-4">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="col-md-4">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                </div>
                                                                   
                                                            </div> <!-- row -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end modal -->
                                        </td> <!-- accion a reaalizar -->
                                    </tr>
                                    
                                @empty
                                    No se localizó ningún nombre con los parámetros especificados <br/>
                                    {{$q}}
                                    
                                   
                                @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- list:end -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- rowend -->
        </div>
    </div>
    <script>
    
        function getIDPair(cid){
            
            gid = "#id_"+ cid;
            param = $("#sel_"+cid).val();
            $(gid).val(param);
            
            console.log("El valor :" + param+ "para " + gid);
            
        }
          
    </script>
@endsection