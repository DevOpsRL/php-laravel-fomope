@extends('layouts.app', ['title' => 'constancia', 'activePage' => 'exportar'])
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
                            <h4 class="card-title">{{ __('Relacion') }}</h4>
                            <p class="card-category">{{ __('para Operacion y Pagos') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- list:begin -->
                            
                            <!-- form:begin -->
                            
                            <form method="POST" action="{{route('n_export')}}">
                             @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">QUINCENA</span>
                                            </div>
                                            
                                            <select class="form-control" name="quincena">
                                                <option value="24">24</option>
                                                <option value="23">23</option>
                                                <option value="22">22</option>
                                                <option value="21">21</option>
                                                <option value="20">20</option>
                                                <option value="19">19</option>
                                                <option value="18">18</option>
                                                <option value="17">17</option>
                                                <option value="16">16</option>
                                                <option value="15">15</option>
                                                <option value="14">14</option>
                                                <option value="13">13</option>
                                                <option value="11">11</option>
                                                <option value="10">10</option>
                                                <option value="09">09</option>
                                                <option value="08">08</option>
                                                <option value="07">07</option>
                                                <option value="06">06</option>
                                                <option value="05">05</option>
                                                <option value="04">04</option>
                                                <option value="03">03</option>
                                                <option value="02">02</option>
                                                <option value="01">01</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <!-- xxxx -->
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">AÑO</span>
                                            </div>
                                            <select class="form-control" name="anio">
                                                <option value="2021">2021</option>
                                                <option value="2022" selected>2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- xxxx -->
                                <div class="input-group mb-3">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">GENERAR CONSTANCIA</button>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <a href="#"> CANCELAR</a>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- form:end -->
                            
                            <!-- list:end -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- rowend -->
        </div>
    </div>
@endsection