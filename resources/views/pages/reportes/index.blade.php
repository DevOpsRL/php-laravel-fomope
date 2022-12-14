@extends('layouts.app', ['title' => 'filtro', 'activePage' => 'listado'])
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
                            <h4 class="card-title">{{ __('Reportes') }}</h4>
                            <p class="card-category">{{ __('fomopes') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            
                            <table class="table table-condensed table-hover">
                            	<thead>
                            		<th>...<th>
                                    <th>RFC</th>
                            		<th>NOMBRE</th>
                                    <th>MOVIMIENTO</th>
                                    <th>CR</th>
                                    <th>CLAVE PRESUP.</th>
                            		<th>QUINCENA</th>
                                    <th>ANIO<th>                            		
                                    <th>.</th>
                            	</thead>
                                <tbody>
                            @foreach($obj as $d)
                              <tr>
                                    <td>
                                        <a href="{{route('f_edit',['rfc' => $d->rfc, 
                                            'movimiento'=> $d->movimiento,
                                            'quincena'=>$d->quincena,
                                            'anio' => $d->anio
                                            ])}}" target="_blank" 
                                            class="btn btn-outline-secondary btn-sm " role="button" aria-pressed="true"> EDITAR                                
                                        </a>
                                    </td>
                            		<td id="{{$d->rfc}}">{{$d->rfc}}</td>
                            		<td>{{$d->nombre}}</td>
                                    <td class=
                                @switch( $d->tipo_movimiento)
                                    @case(1)
                                       'table-danger'
                                        @break
                                    @case(2)
                                        ''
                                        @break;
                                    @case(4)
                                        'table-success'
                                        @break
                                    @case(5)
                                        'table-info'
                                        @break
                                    @case(7)
                                        'table-secondary'
                                        @break
                                    @default
                                        'error'
                                        @break
                                @endswitch 
                                >
                                    {{$d->movimiento}}</td>
                                    <td>{{$d->cr}}</td>
                                    <td>{{$d->clave_presupuestal}}</td>
                                    <td>{{$d->quincena}}</td>
                            		<td>{{$d->anio}}</td>
                            		<td>
                                        <a href="{{route('r_show',['rfc' => $d->rfc, 
                                            'movimiento'=> $d->movimiento,
                                            'quincena'=>$d->quincena,
                                            'anio' => $d->anio
                                            ])}}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="nc-icon nc-cloud-download-93">IMPRIMIR</i>
                                            
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