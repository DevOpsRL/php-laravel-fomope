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

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('CAT_GEN') }}</h4>
                            <p class="card-category">{{ __('...') }}</p>

                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            <div>
                            	
	                            <table class="table table-md table-hover table-bordered">
	                            	<thead class="table-dark">
	                            		<th>ID</th>
	                            		<th>GENERO</th>
	                            		<th>ACCION</th>
	                            	</thead>
                                @forelse($genero as $n)
	                            	<tbody>
	                            
	                            	
	                            	<tr>
	                            		<td>{{$n->id}}</td>
	                            		<td>{{$n->descr}}</td>
	                            		
                                        <td>
                                            <a href="#">
                                                <i class="nc-icon "></i>
                                                <p>{{ __("E") }}</p>
                                            </a>
                                            |
                                            <a href="#">
                                                <i class="nc-icon "></i>
                                                <p>{{ __("X") }}</p>
                                            </a>
                                        </td>
	                            	</tr>
	                            	
	                            @empty
	                            	Datos nulos<br/>
	                            	
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
            <div class="row">
                <div class="input-group mb-3">
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <a href="{{route('g_create')}}">AGREGAR</a>

                    </div>
                    
                    <div class="col-md-3">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection