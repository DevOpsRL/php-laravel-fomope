<div class="sidebar" data-color="red">
    <!--data-color="purple | blue | green | orange | red" , data-image tag -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                {{ __("FOMOPE") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('p_list')}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __("Inicio") }}</p>
                </a>
            </li>
           
            
            <li class="nav-item @if($activePage == 'captura') active @endif">
                <a class="nav-link" href="{{route('p_list')}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __("Captura...") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'listado') active @endif">
                <a class="nav-link" href="{{route('r_search')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __("Visualizar") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'filtrar') active @endif">
                <a class="nav-link" href="#">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __("...") }}</p>
                </a>
            </li>
            
        
            <li class="nav-item">
                <a class="nav-link" href="#">&nbsp;</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#">&nbsp;</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">&nbsp;</a>
            </li>
            
            <li class="nav-item @if($activePage == 'exportar') active @endif">
                <a class="nav-link" href="{{route('n_list')}}">
                    <i class="nc-icon nc-cloud-download-93"></i>
                    <p>{{ __("Relacion / Pagos") }}</p>
                </a>
            </li>
            
        </ul>
        @if (auth()->check() && request()->route()->getName() != null)
            @include('layouts.navbars.navs.auth')
        @else
            <br/>
        @endif
    </div>
</div>
