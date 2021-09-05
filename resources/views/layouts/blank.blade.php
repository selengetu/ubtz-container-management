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

            </div>
        </div>



        @stack('scripts')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/mainjquery.js') }}"></script>
         <script src="{{ asset('js/jquerylast.js') }}"></script>
       <!-- jQuery -->
       
       <!-- Bootstrap -->
       <script src="{{ asset('js/bootstrap.min.js') }}"></script>
       <script src="{{ asset('js/moment.min.js') }}"></script>
       <script src="{{ asset('js/bootstrapvalidator.js') }}"></script>
       <!-- Custom Theme Scripts -->
       <script src="{{ asset('js/gentelella.min.js') }}"></script>
       <script src="{{ asset('js/datepicker.js') }}"></script>
       <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
       <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('js/jszip.min.js') }}"></script>
       <script src="{{ asset('js/pdfmake.min.js') }}"></script>
       <script src="{{ asset('js/vfs_fonts.js') }}"></script>
       <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('js/bootstrap-select.min.js')}}" type="text/javascript"></script>
       <script src="{{ asset('js/select2.js')}}" type="text/javascript"></script>

    </body>
</html>