<!--  -->
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>App FOMOPES</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/bootstrap3-typeahead.js')}}"></script>
        <!-- CSS Files -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
        <!-- -->

    </head>

    <body>
        <div class="wrapper">
            
            @include('layouts.navbars.sidebar')
            <div class="main-panel">
                
                @yield('content')
                
            </div>
            @include('layouts.footer.nav')
           
        </div>
       


    </body>
        <!--   Core JS Files   -->
    
    <script src="{{asset('js/app.js')}}"></script>
    <!-- -->
    <script type="text/javascript">
        $(function() {
            $("#f_elab").datepicker({
                dateFormat:"yy-mm-dd"
            });
            $("#vigdel").datepicker({
                dateFormat:"yy-mm-dd"
            });
            $("#vigal").datepicker({
                dateFormat:"yy-mm-dd"
            });
            $("#efecdel").datepicker({
                dateFormat:"yy-mm-dd"
            });
            $("#efecal").datepicker({
                dateFormat:"yy-mm-dd"
            });
            $("#info_inggob").datepicker({
                dateFormat:"yy-mm-dd"
            });
            $("#info_ingssa").datepicker({
                dateFormat:"yy-mm-dd"
            });
        })
    

</script>
</html>