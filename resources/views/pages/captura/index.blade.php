@extends('layouts.app', ['title' => 'list', 'activePage' => 'listado'])
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
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Buscar') }}</h4>
                            <p class="card-category">{{ __('en  fomopes') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- formulario:begin -->
                            <form method="POST" action="{{route('f_search')}}">
                            @csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="input" name="subq-f" class="form-control" id="subq-f" placeholder="nombre a buscar" required>
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
                            <h4 class="card-title">{{ __('fomopes') }}</h4>
                            <p class="card-category">{{ __('recientes...') }}</p>
                            
                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            <div class="table-full-width">
                            	@forelse($fmps as $n)
	                            <table class="table table-striped table-hover">
	                            	<thead class="">
	                            		<th>RFC</th>
	                            		<th>NOMBRE</th>
	                            		<th>MOVIMIENTO</th>
	                            		<th>VIGENCIA_DEL</th>
                                        <th>OPCS</th>
	                            	</thead>
	                            	<tbody>
	                            
	                            	
	                            	<tr>
	                            		<td>{{$n->rfc}}</td>
	                            		<td>{{$n->nombre}}</td>
	                            		<td>{{$n->movimiento}}</td>
	                            		<td>{{$n->vigencia_del}}</td>
                                        <td></td>
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
        </div>
    </div>
@endsection