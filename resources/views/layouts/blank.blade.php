<!DOCTYPE>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
     

        <title>УБТЗ ХНН СБМТА</title>

        <!-- Bootstrap -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset('css/gentelella.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datatables-button.css') }}" rel="stylesheet">
         <link href="{{ asset('css/datepicker.css')}}" rel="stylesheet">
          <link href="{{ asset('css/bootstrapvalidator.css') }}" rel="stylesheet">
           <link href="{{ asset('css/gentelella.min.css') }}" rel="stylesheet">
           <link href="{{ asset('css/select2.css') }}" rel="stylesheet">

    </head>

    <body style="background-color: #fff">
        <div class="container body" >
            <div class="main_container" style="background-color: #fff">

                

                @include('includes/topbar')





                @yield('main_container')

                @include('includes/footer')

            </div>
        </div>



        @stack('scripts')

   

    </body>
</html>