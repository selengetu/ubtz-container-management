@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->

@endpush


@section('main_container')
    <div class="row">
        <div class="col-md-2" > <!-- XAILT-->
            <button class="btn btn-block" style="background-color: #a4294a; border-color:#a4294a;color:white" onclick="window.location='{{ url("home") }}'"> {{ trans('messages.home') }}</button>
            <button class="btn btn-block" style="background-color: #a4294a; border-color:#a4294a;color:white" onclick="window.location='{{ url("home") }}'"> Падаан бүртгэл </button>
          
        </div>
        <div class="col-md-9" style="background-color: #fff;height: 100%;"> <!-- TABLE-->
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title">Байгууллага бүртгэл </h3>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal" id="addproj">
                        <i class="fa fa-plus" style="color: rgb(255, 255, 255);"> Байгууллага нэмэх</i>
                    </button>
                </div>
            </div>
      
                    <table id="users" class="table  table-striped table-bordered" >
                        <thead>
                        <tr style="color: #fff;" bgcolor="#3493ce">
                            <th> №</th>
                            <th> Байгууллага</th>
                            <th> УБТЗ эсэх</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($dep as $results)
                            <tr>
                                <td>{{$no}}</td>
                     
                                <td ><b>{{$results->dep_name}}</b></td>
                                <td>@if($results->is_ubtz == 1) Тийм @else Үгүй @endif</td>
                                </tr>
                                <?php $no++; ?>
                        @endforeach
                        </tbody>
                    </table>
               
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Байгууллага бүртгэл</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="adddepartment" method="post">
                        {{ csrf_field() }}
                    <div class="modal-body">
                    
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Байгууллага:</label>
                          <input type="text" class="form-control" id="dep_name" name="dep_name">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">УБТЗ эсэх:</label>
                          <select class="form-control select2" id="is_ubtz" name="is_ubtz">
                            <option value= "1">Тийм</option>
                            <option value= "0">Үгүй</option>     
                        </select>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Хайх</button>
                      <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>    
        </div>  
@endsection
  <script src="{{ asset('js/jquerychart.js') }}"></script>
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