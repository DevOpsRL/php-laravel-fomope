@extends('layouts.app', ['title' => 'plantilla', 'activePage' => 'captura'])
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
                            	
	                            <table class="table table-striped table-hover">
	                            	<thead class="table-dark">
	                            		<th>RFC</th>
	                            		<th>NOMBRE</th>
	                            		<th>CLAVE PRESUPUESTAL</th>
	                            		<th>CURP</th>
	                            	</thead>
                                @forelse($datos as $n)
	                            	<tbody>
	                            
	                            	
	                            	<tr>
	                            		<td>{{$n->rfc}}</td>
	                            		<td>{{$n->nombre}}</td>
	                            		<td>{{$n->clave_presupuestal}}</td>
	                            		<td>{{$n->curp}}</td>
                                        <td></td>
	                            	</tr>
	                            	
	                            @empty
	                            	Datos nulos<br/>
	                            	<a href="#" >AGREGAR REGISTRO</a>
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