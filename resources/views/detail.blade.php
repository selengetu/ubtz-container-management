@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->

@endpush


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
                    <form method="post" action="chart">
                        <div class="form-group row">


                            <div class="col-md-12 col-sm-4">

                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                        <input id="startDate" name="startDate" type="text" class="form-control" value="{{$sdate}}"
                                        />

                                        <i class="fa fa-calendar-plus-o" >
                                        </i>  <label style="font-size:12px;">

                                            {{ trans('messages.begdate') }}
                                        </label>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-4">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                        <input id="endDate" name="endDate" type="text" class="form-control" value="{{$fdate}}"
                                        />
                                        <i class="fa fa-calendar-plus-o">
                                        </i>
                                        <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.enddate') }}
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
        <div class="col-md-10" style="background-color: #fff;height: 100%;"> <!-- TABLE-->
            <div class="row">
                <div class="col-md-3">
                 <table class="table table-bordered">
                     <thead style="background-color:#9CC2CB; ">
                     <tr>
                         <td>Төмөр зам</td>
                         <td>Илгээсэн огноо</td>
                         <td>Вагон тоо</td>
                         <td>Ачааны жин</td>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($loaddate as $results)
                         <tr>
                             <td ><b>{{$results->hostsender}}</b></td>
                             <td>{{$results->loaddate}}</td>
                             <td>{{$results->wagcount}}</td>
                             <td>{{number_format($results->brutto)}}</td>
                         </tr>

                     @endforeach
                     </tbody>
                 </table>
                    <br>
                    <table class="table table-bordered">
                        <thead style="background-color:#9CC2CB; ">
                        <tr>
                            <td>Төмөр зам</td>
                            <td>Илгээсэн өртөө</td>
                            <td>Вагон тоо</td>
                            <td>Ачааны жин</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($senderst as $results)
                            <tr>
                                <td ><b>{{$results->hostsender}}</b></td>
                                <td>{{$results->fromstname}}</td>
                                <td>{{$results->wagcount}}</td>
                                <td>{{number_format($results->brutto)}}</td>
                            </tr>

                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-bordered">
                        <thead style="background-color:#9CC2CB; ">
                        <tr>
                            <td>Төмөр зам</td>
                            <td>Хүлээн авах өртөө</td>
                            <td>Вагон тоо</td>
                            <td>Ачааны жин</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recieverst as $results)
                            <tr>
                                <td ><b>{{$results->hostsender}}</b></td>
                                <td>{{$results->tostname}}</td>
                                <td>{{$results->wagcount}}</td>
                                <td>{{number_format($results->brutto)}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table table-bordered">
                        <thead style="background-color:#9CC2CB; ">
                        <tr>
                            <td>Төмөр зам</td>
                            <td>Илгээгч</td>
                            <td>Вагон тоо</td>
                            <td>Ачааны жин</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sendercode as $results)
                            <tr>
                                <td ><b>{{$results->hostsender}}</b></td>
                                <td>{{$results->sendername}}</td>
                                <td>{{$results->wagcount}}</td>
                                <td>{{number_format($results->brutto)}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead style="background-color:#9CC2CB; ">
                        <tr>
                            <td>Төмөр зам</td>
                            <td>Ачаа хүлээн авагч</td>
                            <td>Вагон тоо</td>
                            <td>Ачааны жин</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recievercode as $results)
                            <tr>
                                <td ><b>{{$results->hostsender}}</b></td>
                                <td>{{$results->recievername}}</td>
                                <td>{{$results->wagcount}}</td>
                                <td>{{number_format($results->brutto)}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>

        </div>

        <div>

            @endsection
            <script src="{{ asset('js/jquerychart.js') }}"></script>
            <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

            <script src="{{ asset('js/bootstrapvalidator.js') }}"></script>
            <script src="{{ asset('js/moment.min.js') }}"></script>
            <script src="{{ asset('js/datepicker.js') }}"></script>
            <script src="{{ asset('js/select2.js')}}" type="text/javascript"></script>
            <script src="{{ asset('js/chart.js')}}" type="text/javascript"></script>

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