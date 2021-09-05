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
                <div class="col-md-6">
                    <canvas id="gngchart" width="800"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="detailchart" width="800"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="bar-chart" width="800" height="800"></canvas>
                </div>
                <div class="col-md-6">
                    <table id="users" class="table  table-striped table-bordered" >
                        <thead>
                        <tr style="color: #fff;" bgcolor="#3493ce">
                            <th>  {{ trans('messages.gngcode') }}</th>
                            <th>  {{ trans('messages.gngname') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($gngtable as $results)
                            <tr>
                                <td>{{$results->gngid}}</td>
                                <td ><b>{{$results->gngname}}</b></td>
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
                <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
                <script src="{{ asset('js/bootstrapvalidator.js') }}"></script>
                <script src="{{ asset('js/moment.min.js') }}"></script>
                <script src="{{ asset('js/datepicker.js') }}"></script>
                <script src="{{ asset('js/select2.js')}}" type="text/javascript"></script>
  <script src="{{ asset('js/chart.js')}}" type="text/javascript"></script>
                <?php
                $sendername = array();
                $import = array();
                $transit = array();
                $gngcode = array();
                $gngniit = array();
                foreach($count as $c)
                {array_push($sendername,$c->hostsender); array_push($import,$c->import);array_push($transit,$c->transit);}
                foreach($gng as $g)
                { array_push($gngniit,$g->niit); array_push($gngcode,$g->frieghtgng);}
                ?>
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
        drawchart(44);
        var bindDateRangeValidation = function (f, s, e) {
            if(!(f instanceof jQuery)){
                console.log("Not passing a jQuery object");
            }

            var jqForm = f,
                startDateId = s,
                endDateId = e;

            var checkDateRange = function (startDate, endDate) {
                var isValid = (startDate != "" && endDate != "") ? startDate <= endDate : true;
                return isValid;
            }

            var bindValidator = function () {
                var bstpValidate = jqForm.data('bootstrapValidator');
                var validateFields = {
                    startDate: {
                        validators: {
                            notEmpty: { message: 'This field is required.' },
                            callback: {
                                message: 'Start Date must less than or equal to End Date.',
                                callback: function (startDate, validator, $field) {
                                    return checkDateRange(startDate, $('#' + endDateId).val())
                                }
                            }
                        }
                    },
                    endDate: {
                        validators: {
                            notEmpty: { message: 'This field is required.' },
                            callback: {
                                message: 'End Date must greater than or equal to Start Date.',
                                callback: function (endDate, validator, $field) {
                                    return checkDateRange($('#' + startDateId).val(), endDate);
                                }
                            }
                        }
                    },
                    customize: {
                        validators: {
                            customize: { message: 'customize.' }
                        }
                    }
                }
                if (!bstpValidate) {
                    jqForm.bootstrapValidator({
                        excluded: [':disabled'],
                    })
                }

                jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
                jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);

            };

            var hookValidatorEvt = function () {
                var dateBlur = function (e, bundleDateId, action) {
                    jqForm.bootstrapValidator('revalidateField', e.target.id);
                }

                $('#' + startDateId).on("dp.change dp.update blur", function (e) {
                    $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
                    dateBlur(e, endDateId);
                });

                $('#' + endDateId).on("dp.change dp.update blur", function (e) {
                    $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
                    dateBlur(e, startDateId);
                });
            }

            bindValidator();
            hookValidatorEvt();
        };


        $(function () {
            var sd = new Date(), ed = new Date();

            $('#startDate').datetimepicker({
                pickTime: false,
                format: "YYYY-MM-DD",

            });

            $('#endDate').datetimepicker({
                pickTime: false,
                format: "YYYY-MM-DD",

            });

            //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
            bindDateRangeValidation($("#form"), 'startDate', 'endDate');
        });
        $('#tost').val($('#tostid').val()).trigger('change');
        $('#fromst').val($('#fromstid').val()).trigger('change');
        $('#type').val($('#typeid').val()).trigger('change');

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold',
            autoSkip: false
        }
        var options = {
            animation : {
                onComplete : function(){
                    URI = pieChart.toBase64Image();
                }
            }
        };
        var mode = 'index'
        var intersect = true

        var $salesChart = $('#bar-chart')
        var sendername = <?php echo json_encode($sendername); ?>;
        var transit = <?php echo json_encode($transit); ?>;
        var iimport = <?php echo json_encode($import); ?>;
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            scaleOverride : true,
            scaleSteps : 10,
            scaleStepWidth : 50,
            scaleStartValue : 0,
            data: {
                labels:  sendername,
                datasets: [{
                    label:'Импорт',
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: iimport
                },
                    {
                        label:'Транзит',
                        backgroundColor: '#ce7d78',
                        borderColor: '#ce7d78',
                        data: transit
                    },
                ]
            },
            options: {
                title: {
                    display: true,
                    text: '  {{ trans('messages.niitmedee') }}'
                },
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        display: true,
                        ticks: ticksStyle
                    }]
                }
            }
        })

        var vschart = $('#gngchart')
        var gngniit = <?php echo json_encode($gngniit); ?>;
        var gngcode = <?php echo json_encode($gngcode); ?>;
        var Vschart = new Chart(vschart, {
            data: {
                labels: gngcode,
                datasets: [{
                    type: 'line',
                    data: gngniit,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',

                },
                ]
            },
            options: {
                title: {
                    display: true,
                    text: '{{ trans('messages.medeeachaa') }}'
                },
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: $.extend({
                            beginAtZero: true,
                            suggestedMax: 110
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
        $("#gngchart").click(function(e) {

            var activePoints = Vschart.getElementAtEvent(e);
            console.log(activePoints);
            if(activePoints.length > 0)
            {

                //get the internal index of slice in pie chart
                var clickedElementindex = activePoints[0]["_index"];
                console.log(clickedElementindex);
                //get specific label by index
                var label = Vschart.data.labels[clickedElementindex];
                console.log(label);

                drawchart(label);
                /* other stuff that requires slice's label and value */

            }

        });
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold',
            autoSkip: false
        }
        var options = {
            animation : {
                onComplete : function(){
                    URI = pieChart.toBase64Image();
                }
            }
        };
        var detailchart = null;
        function drawchart($id) {
            var gngdetailchart = $('#detailchart')
            if(detailchart!=null){
                detailchart.destroy();
            }
            var gngcode=[];
            var gngniit=[];

            var sdate='{{$sdate}}';
            var fdate='{{$fdate}}';
            $.get('chartfill/'+$id+'/'+sdate+'/'+fdate,function(data){
                $.each(data,function(i,qwe){
                    gngcode.push(qwe.frieghtgng);
                    gngniit.push(qwe.niit);
                });
                  detailchart = new Chart(gngdetailchart, {
                    type: 'bar',
                      backgroundColor: 'transparent',
                      borderColor: '#007bff',
                      pointBorderColor: '#007bff',
                      pointBackgroundColor: '#007bff',
                    data: {
                        labels: gngcode,
                        datasets: [
                            {

                                backgroundColor: '#007bff',
                                borderColor: '#007bff',
                                data: gngniit,

                            },

                        ]
                    },
                      options: {
                          title: {
                              display: true,
                              text:  '{{ trans('messages.medeeachaadet') }}'
                          },

                          legend: {
                              display: false
                          },
                          scales: {
                              yAxes: [{
                                  ticks: $.extend({
                                      beginAtZero: true,
                                      suggestedMax: 110
                                  }, ticksStyle)
                              }],

                          }
                      },
                      animation: {
                          "duration": 1,
                          "onComplete": function() {
                              var chartInstance = this.chart,
                                  ctx = chartInstance.ctx;

                              ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                              ctx.textAlign = 'center';
                              ctx.textBaseline = 'bottom';

                              this.data.datasets.forEach(function(dataset, i) {
                                  var meta = chartInstance.controller.getDatasetMeta(i);
                                  meta.data.forEach(function(bar, index) {
                                      var data = dataset.data[index];
                                      ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                  });
                              });
                          }
                      },
                      legend: {
                          "display": true
                      },
                      tooltips: {
                          "enabled": true
                      },

                })

            });

        }
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