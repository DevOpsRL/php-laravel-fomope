@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Inicio', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Buscar') }}</h4>
                            <p class="card-category">{{ __('en  bases') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- formulario:begin -->
                            <form method="POST" action="#" enctype="">
                            @csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="input" name="subq" class="form-control" id="subq" placeholder="nombre a buscar" required>
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
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Estadisticas') }}</h4>
                            <p class="card-category">{{ __('En proceso') }}</p>
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