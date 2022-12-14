@extends('layouts.app', ['title' => 'filtro', 'activePage' => 'filtro'])
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
                            <h4 class="card-title">{{ __('Delegaciones') }}</h4>
                            <p class="card-category">{{ __('relacion de pendientes por homogeneizar') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            
                            <table class="table table-condensed table-hover">
                            	<thead>
                            		<th>CENTRO QUE REPORTA</th>
                                    <th>SECCION SINDICAL</th>
                            		<th></th>
                            	</thead>
                            @foreach($grp as $g)
                            	<tr>
                            		<td>{{$g->reporta}} ({{$g->cuantos}})</td>
                                    <td>{{$g->seccion}}</td>
                            		<td><a href="{{route('crs.create', ['reporta'=> $g->reporta, 'seccion' => $g->seccion] ) }}">CAMBIAR</a></td>
                            	</tr>
                            @endforeach	
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