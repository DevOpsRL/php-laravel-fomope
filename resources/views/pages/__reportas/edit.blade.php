@extends('layouts.app', ['title' => 'delegaciones', 'activePage' => 'delegaciones'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Editar delegaciones') }}</h4>
                            <p class="card-category">{{ __('modificar los datos')}} </p>
                            
                        </div>
                        <div class="card-body ">
                            <!-- form:begin -->
                            <form action="{{route('crs.update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- -->
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DELEGACION</span>
                                    </div>
                                    <input type="text" id="" class="form-control" value="{{$f->descr}}" name="new_descr">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">SECCION</span>
                                    </div>
                                    <select class="form-control" name="new_seccion">
                                        <option value="0"> -- SELECCIONE --</option>
                                    @forelse ($s as $sec)
                                        <option value="{{$sec->seccion}}">{{$sec->seccion}} - {{$sec->descr}}</option>
                                    @empty
                                        <input type="text" class="form-control" value="{{$f->seccion}}" name="new_seccion">
                                    @endforelse
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="id" value="{{$f->id}}">
                                <!-- buton group -->
                                <div class="input-group mb-3">
                                    
                                    <div class="input-group mb-3">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary" type="submit" id="button-addon2">ACTUALIZAR</button>
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