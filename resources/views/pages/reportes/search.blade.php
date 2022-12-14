@extends('layouts.app', ['title' => 'capturax', 'activePage' => 'listado'])
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

                <div class="col-md-9">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('LISTADO') }}</h4>
                            <p class="card-category">{{ __('de capturas...') }}</p>
                            <div class="col-md-9">
                                <!-- formulario:begin -->
                                <form method="POST" action="{{route('c_search')}}">
                                @csrf
                                    <div class="input-group mb-6">
                                        <div class="custom-file">
                                            <input type="input" name="subq-capt" class="form-control" id="subq-c" placeholder="nombre a buscar" required>
                                        </div>
                                        <div class="input-group-append mb-3">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- formulario:end -->
                            </div>
                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            <div class="table-full-width">
                                
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <th>QUINCENA</th>
                                        <th>AÑO</th>
                                        <th>NUMERO DE MOVIMIENTOS</th>
                                        <th></th>
                                        <th>VISUALIZAR</th>
                                    </thead>
                                @forelse($search as $n)
                                    <tbody>
                                
                                    
                                    <tr>
                                        <td>{{$n->quincena}}</td>
                                        <td>{{$n->anio}}</td>
                                        <td><strong>{{$n->numeral}}</strong> MOVIMIENTOS REALIZADOS</td>
                                        <td></td>
                                        
                                        <td>
                                        	<div class="col-md-3">
                                                <a class="btn btn-info" href="{{route('r_list', ['quincena'=>$n->quincena, 'anio'=>$n->anio])}}" role="button">VER</a>
                                            </div>
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
    
@endsection