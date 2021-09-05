@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->

@endpush

<style>
    .alert {
    position: relative;
    padding: 1rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
.alert-primary {
    color: #084298;
    background-color: #cfe2ff;
    border-color: #b6d4fe;
}
</style>
@section('main_container')
    <div class="row">
        <div class="col-md-2" > <!-- XAILT-->
            <button class="btn btn-block" style="background-color: #a4294a; border-color:#a4294a;color:white" onclick="window.location='{{ url("home") }}'"> {{ trans('messages.home') }}</button>
            <div class="panel" style="background-color:#3493ce; color: #ffffff; width: 100%;"  >
                <div class="panel-heading">
                    <h4 class="panel-title accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear">
                        <a style="font-weight: bold;"> <i class="fa fa-search"> {{ trans('messages.search') }} </i>
                        </a>
                    </h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="container">
                        <div class="form-group row">


                            <div class="col-md-12 col-sm-4">

                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                        <input id="pContMark" name="pContMark" type="text" class="form-control" value="{{$pContMark}}"  placeholder="TGHU"
                                               />

                                        <i class="fa fa-calendar-plus-o" >
                                        </i>  <label style="font-size:12px;">

                                         Чингэлэг сери
                                        </label>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                        <input id="pContNumber" name="pContNumber" type="text" class="form-control" value="{{$pContNumber}}" placeholder="9344299"
                                            />
                                        <i class="fa fa-calendar-plus-o">
                                        </i>
                                        <label for="form_control_1" style="font-size:12px;">
                                        Чингэлэг №
                                        </label>


                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button class="btn submit btn-block" style="background-color: #2975a4; border-color:#246690"><i class="fa fa-search"></i> {{ trans('messages.search') }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>



        </div>
        <div class="col-md-9" style="background-color: #fff;height: 100%;"> <!-- TABLE-->
        <h1 style="color:#0b449e"><b><center>ЧИНГЭЛЭГ ХАЙЛТ /УБТЗ ХНН/</center></b></h1>
        <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                     <img src="http://localhost:8000/images/c1.jpg" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                      <img src="http://localhost:8000/images/c2.jpg" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                         <img src="http://localhost:8000/images/c3.jpg" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                       <img src="http://localhost:8000/images/c4.png" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <img src="http://localhost:8000/images/c5.jpg" width="100%" class="img-rounded">
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                         <img src="http://localhost:8000/images/c6.jpg" width="100%" class="img-rounded">
                    </div>
                </div>
            <div class="row">
         
            <div class="alert alert-primary" role="alert">
        СҮҮЛИЙН 7 ХОНОГИЙН ХУГАЦААНД ХАМААРАХ ГАЛТ ТЭРЭГНИЙ ХӨДӨЛГӨӨНИЙ ТҮҮХЭЭС ХАЙЛТЫГ ХИЙЖ БАЙГАА БОЛНО
            </div>
                    <table id="users" class="table  table-striped table-bordered" >
                        <thead>
                        <tr style="color: #fff;" bgcolor="#3493ce">
                            <th> Галт тэрэгний №</th>
                            <th> Илгээсэн огноо</th>
                            <th> Хүлээн авсан огноо</th>
                            <th> Чиглэл</th>
                            <th> Вагон №</th>
                            <th> Падаан дугаар</th>
                            <th>Ачааны нэр төрөл</th>
                            <th>Ачааны жин тн.</th>
                            <th>Чингэлэг №</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rep as $p)
                              <tr>
                                  <td >{{$p->train_no}}</td>
                                  <td >{{$p->send_date}}</td>
                                  <td >{{$p->receive_date}}</td>
                                  <td >{{$p->from_stname}} - {{$p->to_stname}}</td>
                                  <td >{{$p->wno}}</td>
                                  <td >{{$p->bill_no}}</td>
                                  <td >{{$p->fname}} </td>
                                  <td >{{$p->fweight}}</td>
                                  <td >{{$p->cont_numbers}}</td>
                                   </tr>

                          @endforeach
                     
                        </tbody>
                    </table>
                   
            </div>
            </div>

            <div>

@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>
 <script src="{{ asset('js/mainjquery.js') }}"></script>
  <script src="{{ asset('js/jquerylast.js') }}"></script>
                <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
                <script src="{{ asset('js/bootstrapvalidator.js') }}"></script>
                <script src="{{ asset('js/moment.min.js') }}"></script>
                <script src="{{ asset('js/datepicker.js') }}"></script>
                <script src="{{ asset('js/select2.js')}}" type="text/javascript"></script>
 
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('#users').DataTable(
            {
                "pageLength": 20,
                "language": {
                    "search": "{{ trans('messages.search') }}",
                    "processing": "",
                    "lengthMenu": "",
                    "zeroRecords": "{{ trans('messages.zeroRecords') }}",
                    "info": " {{ trans('messages.info') }}",
                    "infoEmpty": "{{ trans('messages.zeroRecords') }}",
                    "infoFiltered": "{{ trans('messages.max') }}",
                    "oPaginate": {
                        "sFirst": "{{ trans('messages.first') }}", // This is the link to the first page
                        "sPrevious": "{{ trans('messages.previous') }}", // This is the link to the previous page
                        "sNext": "{{ trans('messages.next') }}", // This is the link to the next page
                        "sLast": "{{ trans('messages.last') }}" // This is the link to the last page
                    }
                },
            }
        );
       
     
    });


</script>



<style type="text/css">
    th { font-size: 12px; }
    td { font-size: 11px; }
    .right_col1{padding:10px 20px;margin-left:70px;z-index:2}
    @media screen {
        #printSection {
            display: none;
        }
    }

    @media print {

        @page    {
            size: auto;
            margin: 0;
            height: 99%;

        }
        body * {
            visibility:hidden;
            margin:15px 20px 15px 20px;
            height: auto;

        }

        #printSection, #printSection * {
            visibility:visible;
        }
        #printSection {
            position:absolute;
            left:0;
            top:0;
        }
        #btnPrint {
            visibility:hidden;
        }
        #btnicon {
            visibility:hidden;
        }
        #garchig{
            visibility: visible;
        }
    }
    .update{
        cursor:pointer;
    }

</style>