@extends('layouts.app', ['title' => 'filtro', 'activePage' => 'filtro'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (isset($success))
                    <div class="alert alert-success fade show">
                        {{$success}}
                    </div>
                    @endif 
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
                            <h4 class="card-title">{{ __('Delegaciones') }}</h4>
                            <p class="card-category">{{ __('relacion') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            
                            <table class="table table-condensed table-hover">
                            	<thead>
                            		<th>ID</th>
                            		<th>DESCRIPCION</th>
                                    <th>SECCION</th>
                            		<th>JURISDICCCION</th>
                            		
                                    <th>ACCION</th>
                            	</thead>
                                <tbody>
                            @foreach($all as $d)
                            	<tr>
                            		<td>{{$d->id}}</td>
                            		<td>{{$d->descr}}</td>
                                    <td>{{$d->seccion}}</td>
                                    <td>{{$d->jurisdiccion}}</td>
                            		
                            		<td>
                                        <a href="{{route('crs.edit',['id' => $d->id])}}">
                                            <i class="nc-icon nc-settings-90"></i>
                                        </a>
                                    </td>
                            	</tr>
                            @endforeach	
                                </tbody>
                            </table>
                            
                            <!-- list:end -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- rowend -->
        </div>
    </div>
@endsection