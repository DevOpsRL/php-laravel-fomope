@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Inicio', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div> <!-- error box-->
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-8">

                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Importar') }}</h4>
                            <p class="card-category">{{ __('vacantes en TXT') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- formulario:begin -->
                            <form method="POST" action="{{ route('archivos.store') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Quincena</label>
                                    </div>
                                    <select class="custom-select" name="quincena" id="inputGroupSelect01" required>
                                        <option selected>Quincena a procesar...</option>
                                    @for($q=1; $q <= 24; $q++)
                                        <option value="{{$q}}">
                                        @if ($q < 10)
                                            0{{$q}}
                                        @else
                                            {{$q}}
                                        @endif
                                        </option>
                                    @endfor

                                    </select>
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Año</label>
                                    </div>
                                    <select class="custom-select" name="anio" id="inputGroupSelect02" required>
                                        <option selected>Año... </option>
                                        @for($a=2018; $a <= 2025; $a++)
                                        <option value="{{$a}}">
                                        {{$a}}

                                        </option>
                                        @endfor

                                    </select>
                                </div>  
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="vacantes" class="form-control" id="vacantes" required>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Procesar</button>
                                    </div>
                                </div>
                            </form>
                            <!-- formulario:end -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Estadisticas') }}</h4>
                            <p class="card-category">{{ __('Por definir') }}</p>
                        </div>
                        <div class="card-body ">
                            
                        </div>
                        <div class="card-footer ">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- rowend -->
        </div>
    </div>
@endsection