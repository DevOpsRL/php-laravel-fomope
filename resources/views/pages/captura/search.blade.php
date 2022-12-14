@extends('layouts.app', ['title' => 'capturax', 'activePage' => 'reportes'])
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
                            <h4 class="card-title">{{ __('PROCESADOS') }}</h4>
                            <p class="card-category">{{ __('fomopes...') }}</p>

                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            <div class="table-full-width">
                                
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <th>RFC</th>
                                        <th>NOMBRE</th>
                                        <th>MOVIMIENTO</th>
                                        <th>QUINCENA</th>
                                        <th>ANIO</th>
                                        <th></th>
                                    </thead>
                                @forelse($search as $n)
                                    <tbody>
                                
                                    
                                    <tr>
                                        <td>{{$n->rfc}}</td>
                                        <td>{{$n->nombre}}</td>
                                        <td>{{$n->movimiento}}</td>
                                        <td>{{$n->quincena}}</td>
                                        <td>{{$n->anio}}</td>
                                        <td>
                                        	<div class="col-md-3">
                                                <a class="btn btn-info" href="{{route('r_list', ['quincena'=>$n->quincena, 'anio'=>$n->anio])}}#{{$n->rfc}}" role="button">VER</a>
                                            </div>
                                        </td> <!-- accion a reaalizar -->
                                    </tr>
                                    
                                @empty
                                    No se localizó ningún nombre con los parámetros especificados <br/>
                                    
                                    
                                   
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