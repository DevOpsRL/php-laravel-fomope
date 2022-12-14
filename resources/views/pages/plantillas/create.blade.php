@extends('layouts.app', ['title' => 'addnew', 'activePage' => 'addfn'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Agregar') }}</h4>
                            <p class="card-category">nueva funcion...</p>
                        </div>
                        <div class="card-body ">
                            <!-- form:begin -->
                            
                            <form method="POST" action="">
                            @csrf
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">TIPO</span>
                                    </div>
                                    
                                    <input type="text" class="form-control" value="" name="new_seccion">
                                </div>
                                <!-- xxxx -->
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">CARGO</span>
                                    </div>
                                    <input type="text" class="form-control" value="" name="new_descr">
                                </div>
                                <!-- xxxx -->
                                <div class="input-group mb-3">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">GUARDAR</button>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <a href="#"> CANCELAR</a>
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