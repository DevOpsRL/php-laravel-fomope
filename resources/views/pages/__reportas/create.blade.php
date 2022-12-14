@extends('layouts.app', ['title' => 'delegaciones', 'activePage' => 'delegaciones'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Delegaciones') }}</h4>
                            <p class="card-category">{{ __('modificar identificador')}} </p>
                            <h4>{{$reporta}}, seccion: {{$seccion}}</h4>
                        </div>
                        <div class="card-body ">
                            <!-- form:begin -->
                            <form action="{{route('crs.filtro_update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <select id="id_reporta" name="id_reporta" class="form-control">
                                    @forelse($reportas as $r)
                                    <option value="{{$r->id}}">{{$r->id}} - {{$r->descr}}</option>
                                    @empty
                                    <option value="0">SIN CONCIDENCIAS</option>
                                    @endforelse
                                </select>
                                <input type="hidden" id="id_descr" name="id_descr" value="{{$reporta}}"/>
                                <input type="hidden" id="seccion" name="seccion" value="{{$seccion}}"/>
                                <div class="input-group mb-3">
                                    
                                    <div class="input-group mb-3">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary" type="submit" id="button-addon2">ASIGNAR</button>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('capt.filtro')}}"> CANCELAR</a>
                                        </div>
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