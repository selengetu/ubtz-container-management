@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->

@endpush

        
@section('main_container')
  <div class="row">
    <div class="col-md-2" > <!-- XAILT-->
        <button class="btn btn-block" style="background-color: #a4294a; border-color:#a4294a;color:white" onclick="window.location='{{ url("chart") }}'"> {{ trans('messages.chart') }}</button>
        <button class="btn btn-block" style="background-color: #a4294a; border-color:#a4294a;color:white" onclick="window.location='{{ url("detail") }}'"> {{ trans('messages.report') }}</button>
        <button class="btn btn-block" style="background-color: #a4294a; border-color:#a4294a;color:white" onclick="window.location='{{ url("container") }}'"> Чингэлэг хайлт </button>
      <div class="panel" style="background-color:#3493ce; color: #ffffff; width: 100%;"  > 
               <div class="panel-heading">
                  <h4 class="panel-title accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear">
                     <a style="font-weight: bold;"> <i class="fa fa-search"> {{ trans('messages.search') }} </i> 
                     </a>
                  </h4>
               </div>
              <div class="panel-body">
                              <form method="post" action="search">
                                 <div class="form-group row">
                                    <div class="col-md-12 col-sm-4">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon">
                                             <input id="startDate" name="startDate" type="text" class="form-control" 
                                              value="{{$sdate}}" />
                                             
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
                                               <input id="endDate" name="endDate" type="text" class="form-control" 
                                                value="{{$fdate}}"/>
                                               <i class="fa fa-calendar-plus-o">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.enddate') }}
                                             </label>
                                            
                                             
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-12 col-sm-4">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                           <div class="input-icon">
                                              <select class="form-control" id="type" name="type">
                                            <option value= "0">{{ trans('messages.all') }}</option>
                                             <option value="1">ИМПОРТ</option>
                                            <option value="2">ТРАНЗИТ</option>
                                          </select>
                                             <i class="fa fa-train">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                              {{ trans('messages.typeofsend') }}
                                             </label>
                                           
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-4">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon">
                                             <input class="form-control" id="billno" name="billno" value="{{$bill}}" type="text"/>
                                              <i class="fa fa-pencil-square-o">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.billno') }}
                                             </label>
                                            
                                          </div>
                                       </div>
                                    </div>
                              
                                    <div class="col-md-12 col-sm-4">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <select class="js-example-basic-single" id="fromst" name="fromst" style="width: 100%">
                                            <option value= "0">{{ trans('messages.all') }}</option>
                                             @foreach($from as $froms)
                                             <option value= "{{$froms->fromstcode}}">{{$froms->fromstname}}</option>
                                             @endforeach
                                          </select>
                                          <i class="fa fa-road">
                                             </i>
                                          <label for="form_control_1">
                                         {{ trans('messages.fromst') }}
                                          </label>
                                          
                                          <span class="help-block">
                                          </span>
                                       </div>
                                     </div>
                                          <div class="col-md-12 col-sm-4">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <select class="js-example-basic-single" id="tost" name="tost" style="width: 100%">
                                            <option value= "0">{{ trans('messages.all') }}</option>
                                             @foreach($to as $tos)
                                             <option value= "{{$tos->tostcode}}">{{$tos->tostname}}</option>
                                             @endforeach
                                          </select>
                                           <i class="fa fa-road">
                                             </i>
                                          <label for="form_control_1">
                                         {{ trans('messages.tost') }}
                                          </label>
                                     
                                       </div>
                                    </div>
                                        <div class="col-md-12 col-sm-4">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                           <div class="input-icon">
                                             <input class="form-control" type="text" id="frieght" name="frieght" value="{{$wagno}}" type="text"/>
                                              <i class="fa fa-cog">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.frieghtname') }}
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

      <div>
 
      <!-- <div class="x_content hidden">
                          <div class="panel-group" id="accordion">
            <div class="panel" style="background-color: #3b5976; color: #ffffff"  > 
               <div class="panel-heading">
                  <h4 class="panel-title accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear">
                     <a style="font-weight: bold;"> <i class="fa fa-search"> {{ trans('messages.search') }} </i> 
                     </a>
                  </h4>
               </div>
               <div id="sear" class="panel-collapse collapse-in">
                  <div class="panel-body">
                    
                              <form method="post" action="search">
                                 <div class="form-group row">
                                    <div class="col-md-3">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon">
                                             <input id="startDate" name="startDate" type="text" class="form-control" 
                                               @if(\Cache::has('startDate'.Auth::id()))
                                                                value="{{\Cache::get('startDate'.Auth::id())}}" 
                                                                @else
                                                                 value="{{date( 'Y-m-d', strtotime( '-1 day' ) )}}" 
                                                                @endif />
                                             
                                              <i class="fa fa-calendar-plus-o" >
                                             </i>  <label style="font-size:12px;">

                                             {{ trans('messages.begdate') }}
                                             </label>
                                            
                                            
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-3 ">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon">
                                               <input id="endDate" name="endDate" type="text" class="form-control" 
                                                @if(\Cache::has('endDate'.Auth::id()))
                                                                value="{{\Cache::get('endDate'.Auth::id())}}" 
                                                                @else
                                                                 value="{{date( 'Y-m-d' )}}" 
                                                                @endif />
                                               <i class="fa fa-calendar-plus-o">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.enddate') }}
                                             </label>
                                            
                                             
                                          </div>
                                       </div>
                                    </div>
                                      <div class="col-md-3">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                           <div class="input-icon">
                                              <select class="form-control" id="type" name="type">
                                            <option value= "0">{{ trans('messages.all') }}</option>
                                             <option value="1">ИМПОРТ</option>
                                            <option value="2">ТРАНЗИТ</option>
                                          </select>
                                             <i class="fa fa-train">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                              {{ trans('messages.typeofsend') }}
                                             </label>
                                           
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon">
                                             <input class="form-control" id="billno" name="billno" value="{{\Cache::get('billno'.Auth::id())}}" type="text"/>
                                              <i class="fa fa-pencil-square-o">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.billno') }}
                                             </label>
                                            
                                          </div>
                                       </div>
                                    </div>
                              
                                    <div class="col-md-3">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <select class="js-example-basic-single" id="fromst" name="fromst" style="width: 100%">
                                            <option value= "0">{{ trans('messages.all') }}</option>
                                             @foreach($from as $froms)
                                             <option value= "{{$froms->fromstcode}}">{{$froms->fromstname}}</option>
                                             @endforeach
                                          </select>
                                          <i class="fa fa-road">
                                             </i>
                                          <label for="form_control_1">
                                         {{ trans('messages.fromst') }}
                                          </label>
                                          
                                          <span class="help-block">
                                          </span>
                                       </div>
                                     </div>
                                          <div class="col-md-3">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                          <select class="js-example-basic-single" id="tost" name="tost" style="width: 100%">
                                            <option value= "0">{{ trans('messages.all') }}</option>
                                             @foreach($to as $tos)
                                             <option value= "{{$tos->tostcode}}">{{$tos->tostname}}</option>
                                             @endforeach
                                          </select>
                                           <i class="fa fa-road">
                                             </i>
                                          <label for="form_control_1">
                                         {{ trans('messages.tost') }}
                                          </label>
                                     
                                       </div>
                                    </div>
                                        <div class="col-md-3 ">
                                       <div class="form-group form-md-line-input form-md-floating-label">
                                           <div class="input-icon">
                                             <input class="form-control" type="text" id="frieght" name="frieght" type="text"/>
                                              <i class="fa fa-cog">
                                             </i>
                                             <label for="form_control_1" style="font-size:12px;">
                                            {{ trans('messages.frieghtname') }}
                                             </label>
                                            
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <button class="btn btn-primary submit"><i class="fa fa-search"></i> {{ trans('messages.search') }}</button>
                                    </div>

                                 </div>
                              </form>
                           </div>
                        </div>
             
            </div>
         </div>
                  </div>-->

                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                     <img src="{{URL::asset('/images/10.jpg')}}" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                      <img src="{{URL::asset('/images/8.jpg')}}" width="100%" class="img-rounded" >
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                         <img src="{{URL::asset('/images/4.jpg')}}" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                       <img src="{{URL::asset('/images/5.jpg')}}" width="100%" class="img-rounded">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <img src="{{URL::asset('/images/6.jpg')}}" width="100%" class="img-rounded">
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                         <img src="{{URL::asset('/images/7.jpg')}}" width="100%" class="img-rounded">
                    </div>
                </div>
<br>

          <ul class="nav nav-tabs" role="tablist">
              <li role="presentation">
                  <a href="#home" aria-controls="home" role="tab" data-toggle="tab">РЖД</a>     </li>
              <li role="presentation" class="active">
                  <a href="#office" aria-controls="profile" role="tab" data-toggle="tab">КЖД</a>
              </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane" id="home">
                  <div class="table-container">
                      <input type="text" name="fromstid" id="fromstid" value="{{$fromst}}" class="hidden">
                      <input type="text" name="tostid" id="tostid" value="{{$tost}}" class="hidden">
                      <input type="text" name="typeid" id="typeid" value="{{$type}}" class="hidden">
                      <div class="x_content">
                          @foreach($count as $counts)
                              <p>  {{ trans('messages.alldata') }}: {{$counts->cnt}}</p>
                          @endforeach
                      </div>

                      <table id="users" class="table  table-striped table-bordered" >
                          <thead>
                          <tr style="color: #fff;" bgcolor="#3493ce">
                              <th class= "hidden">ID</th>

                              <th>{{ trans('messages.billno') }}</th>
                              <th>{{ trans('messages.loaddate') }}</th>
                              <th>{{ trans('messages.fromst') }}</th>
                              <th>{{ trans('messages.tost') }}</th>
                              <th>{{ trans('messages.sender') }}</th>
                              <th>{{ trans('messages.senderAddress') }}</th>
                              <th>{{ trans('messages.reciever') }}</th>
                              <th>{{ trans('messages.frieghtname') }}</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($result as $results)
                              <tr>
                                  <td class= "hidden nr">{{$results->bid}}</td>
                                  <td ><b>{{$results->billno}}</b></td>
                                  <td>{{$results->loaddate}}</td>
                                  <td>{{$results->fromstcode ." ". $results->fromstname}}</td>
                                  <td>{{$results->tostcode ." ". $results->tostname}}</td>
                                  <td>{{$results->sendercode ." ". $results->sendername}}</td>
                                  <td>{{$results->senderaddress}}</td>
                                  <td>{{$results->recievercode ." ". $results->recievername}}</td>
                                  <td>{{$results->wagno}} </td>
                                  <td><a class="btn btn-small btn-default" href="{{ route('home.hyanalt', $results->bid) }}" ><span class="glyphicon glyphicon-file"></span></a></td>
                              </tr>

                          @endforeach
                          </tbody>
                      </table>

                  </div>
              </div>
              <div role="tabpanel" class="tab-pane active" id="office">
                  <div class="table-container">
                      <div class="x_content">
                          @foreach($kcount as $kcounts)
                              <p>  {{ trans('messages.alldata') }}: {{$kcounts->cnt}}</p>
                          @endforeach
                      </div>

                      <table id="users1" class="table  table-striped table-bordered" >
                          <thead>
                          <tr style="color: #fff;" bgcolor="#3493ce">
                              <th class= "hidden">ID</th>

                              <th>{{ trans('messages.billno') }}</th>
                              <th>{{ trans('messages.loaddate') }}</th>
                              <th>{{ trans('messages.fromst') }}</th>
                              <th>{{ trans('messages.tost') }}</th>
                              <th>{{ trans('messages.sender') }}</th>
                              <th>{{ trans('messages.senderAddress') }}</th>
                              <th>{{ trans('messages.reciever') }}</th>
                              <th>{{ trans('messages.frieghtname') }}</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($kresult as $kresults)
                              <tr>
                                  <td class= "hidden nr">{{$kresults->bid}}</td>
                                  <td ><b>{{$kresults->billno}}</b></td>
                                  <td>{{$kresults->loaddate}}</td>
                                  <td>{{$kresults->fromstcode ." ". $kresults->fromstname}}</td>
                                  <td>{{$kresults->tostcode ." ". $kresults->tostname}}</td>
                                  <td>{{$kresults->sendercode ." ". $kresults->sendername}}</td>
                                  <td>{{$kresults->senderaddress}}</td>
                                  <td>{{$kresults->recievercode ." ". $kresults->recievername}}</td>
                                  <td>{{$kresults->wagno}} </td>
                                  <td><a class="btn btn-small btn-default" href="{{ route('home.hyanalt', $kresults->bid) }}" ><span class="glyphicon glyphicon-file"></span></a></td>
                              </tr>

                          @endforeach
                          </tbody>
                      </table>

                  </div>
              </div>
          </div>

 


<input type="text" name="text" id="text" class="hidden">
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
              <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                    	   <li role="presentation" class="active"><a href="#print" aria-controls="print" role="tab" data-toggle="tab">{{ trans('messages.general') }}</a>

                        </li>
                        <li role="presentation"><a href="#bill" aria-controls="bill" role="tab" data-toggle="tab">{{ trans('messages.bill') }}</a>

                        </li>
                        <li role="presentation"><a href="#achaa" aria-controls="achaa" role="tab" data-toggle="tab">{{ trans('messages.frieght') }}</a>

                        </li>
                         <li role="presentation"><a href="#transporter" aria-controls="transporter" role="tab" data-toggle="tab">{{ trans('messages.transporters') }}</a>

                        </li>
                         <li role="presentation"><a href="#wagon" aria-controls="wagon" role="tab" data-toggle="tab">{{ trans('messages.wagon') }}</a>

                        </li>
                         <li role="presentation"><a href="#zuuch" aria-controls="zuuch" role="tab" data-toggle="tab">{{ trans('messages.zuuch') }}</a>

                        </li>
                       
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane " id="bill">
                                <div class="col-md-11"> 
                
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                
                          <th><b>{{ trans('messages.billno') }}</b></th>
                        <td name="billnumber" id="billnumber"></td>
                      </tr>
                      <tr><th><b>{{ trans('messages.loaddate') }}</b></th>
                        <td name="loaddatee" id="loaddatee"></td></tr>
                         <tr><th><b>{{ trans('messages.sender') }}</b></th>
                        <td name="sendernamee" id="sendernamee"></td></tr>
                        <tr> <th><b>{{ trans('messages.fromst') }}</b></th>
                        <td name="fromstt" id="fromstt"></td></tr>
                         <tr><th><b>{{ trans('messages.senderAddress') }}</b></th>
                        <td name="senderaddresss" id="senderaddresss"></td></tr>          
                            <tr> <th><b>{{ trans('messages.reciever') }}</b></th>
                        <td name="recievernamee" id="recievernamee"></td></tr>
                         <tr>  <th><b>{{ trans('messages.tost') }}</b></th>
                        <td name="tostt" id="tostt"></td></tr>
                             <tr> <th><b>{{ trans('messages.recieverAddress') }}</b></th>
                        <td name="recieveraddresss" id="recieveraddresss"></td></tr>
                              <tr><th><b>{{ trans('messages.zuuch') }}</b></th>
                        <td name="specname" id="specname"></td></tr>
                               <tr> <th><b>{{ trans('messages.sendertype') }}</b></th>
                        <td id="sendertype" name="sendertype"></td></tr>
                    </tbody>
                  </table>
                 
                </div>
                        </div>
                              <div role="tabpanel" class="tab-pane" id="achaa">
                                                <div class="col-md-8 "> 
         
                <table class="table table-user-information">
                   
                    <tbody>
                      <tr>
                        <td><b>{{ trans('messages.frieghtcode') }}</b></td>
                     <td id="frieghtgng" name="frieghtgng"></td>
                      </tr>
                      <tr>
                        <td><b>{{ trans('messages.frieghtname') }}</b></td>
                     <td id="frieghtgngname" name="frieghtgngname"></td>
                      </tr>
             
                      <tr> <td><b>{{ trans('messages.frieghtweight') }}</b></td>
                      <td id="brutto" name="brutto"></td></tr>
                       <tr>
                      <td><b>{{ trans('messages.frieghtpack') }}</b></td>
                     <td id="packagename" name="packagename"></td>
                      </tr>
                      <tr><td><b>{{ trans('messages.dangergoods') }}</b></td>
                      <td id="dangergoods" name="dangergoods"></td></tr>
                       <tr><td><b>{{ trans('messages.dangergoodsextra') }}</b></td>
                      <td id="dangergoodsextra" name="dangergoodsextra"></td></tr>
                    </tbody>
                  </table>
                  
                 
                </div>
                        </div>
                                       <div role="tabpanel" class="tab-pane" id="transporter">
                                                <div class="col-md-6 "> 
                
                  <table id='rail' class="table table-user-information">
                    <thead>
                      <tr>
                        <th>№</th>
                        <th>{{ trans('messages.transporter') }}</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                     
                      
                    </tbody>
                  </table>
                  
                 
                </div>
                        </div>
                                       <div role="tabpanel" class="tab-pane" id="wagon">
                            <div class="col-md-11 "> 
                    
                  <table id='wagon' class="table table-user-information">
                    <thead>
                      <tr>
                        <th>{{ trans('messages.wagno') }}</th>
                        <th>{{ trans('messages.isEmpty') }}</th>
                        <th>{{ trans('messages.tara') }}</th>
                        <th>{{ trans('messages.weight') }}</th>
                        <th>{{ trans('messages.axe') }}</th>
                        <th>{{ trans('messages.privcountry') }}</th>
                        <th>{{ trans('messages.privcompany') }}</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                     
                      
                    </tbody>
                  </table>
                  
                 
                </div>
                        </div>
                                       <div role="tabpanel" class="tab-pane" id="zuuch">
                       <div class="col-md-7 "> 
                    
                  <table id='zuuch' class="table table-user-information">
                    <thead>
                      <tr>
                        <th>{{ trans('messages.zuuchcode') }}</th>
                        <th>{{ trans('messages.zuuchname') }}</th>
                        <th>{{ trans('messages.rail') }}</th>
                       
                      </tr>
                      
                    </thead>
                    <tbody>
           
                      
                    </tbody>
                  </table>
                  
                 
                </div>
                        </div>
                                   <div role="tabpanel" class="tab-pane active" id="print">
                       <div class="col-md-12 " id="printarea"> 
                       	<label id="garchig" style="display: none"><h4>УБТЗ ХНН - Статистик бүртгэл, мэдээллийн технологийн алба</h4> <h5 class="pull-right">{{Carbon\Carbon::today()->toDateString()}}</h5></label>
                       	<br>
                       	<label>{{ trans('messages.bill') }}</label>
                           <table class="table table-borderedbo">
                    <tbody>
                      <tr>
                
                          <th><b>{{ trans('messages.billno') }}</b></th>
                        <td name="billnumber1" id="billnumber1"></td>
                        <th><b>{{ trans('messages.loaddate') }}</b></th>
                        <td name="loaddatee1" id="loaddatee1"></td>
                      </tr>
                   
                        <tr><th><b>{{ trans('messages.sender') }}</b></th>
                        <td name="sendernamee1" id="sendernamee1"></td> 
                        <th><b>{{ trans('messages.reciever') }}</b></th>
                        <td name="recievernamee1" id="recievernamee1"></td>
                    </tr>
                        
                          <tr>
                          	<th><b>{{ trans('messages.fromst') }}</b></th>
                        <td name="fromstt1" id="fromstt1"></td>
                        <th><b>{{ trans('messages.tost') }}</b></th>
                        <td name="tostt1" id="tostt1"></td>
                    </tr>
                          
                           
                             
                              <tr><th ><b>{{ trans('messages.senderAddress') }}</b></th>
                        <td style="width:300px" name="specname1" id="specname1"></td>
                    <th><b>{{ trans('messages.sendertype') }}</b></th>
                        <td id="sendertype1" name="sendertype1"></td></tr>
                    </tbody>
                  </table>
                  <label>Вагон</label>
                     <table id='wagon' class="table table-bordered">
                    <thead>
                      <tr>
                        <th>{{ trans('messages.wagno') }}</th>
                        <th>{{ trans('messages.isEmpty') }}</th>
                        <th>{{ trans('messages.tara') }}</th>
                        <th>{{ trans('messages.weight') }}</th>
                        <th>{{ trans('messages.axe') }}</th>
                        <th>{{ trans('messages.privcountry') }}</th>
                        <th>{{ trans('messages.privcompany') }}</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                     
                      
                    </tbody>
                  </table>
                       	<label>{{ trans('messages.frieght') }}</label>
             <table id='achaa' class="table table-bordered">
                   
                    <tbody>
                      <tr>
                      <td style = "width:120px"><b>{{ trans('messages.frieghtcode') }}</b></td>
                     <td id="frieghtgng1" name="frieghtgng1" style = "width:300px"></td>
                      <td ><b>{{ trans('messages.frieghtname') }}</b></td>
                     <td id="frieghtgngname1" name="frieghtgngname1" style = "width:300px"></td>
                      </tr>
                     
                   
                      <tr> <td ><b>{{ trans('messages.frieghtweight') }}</b></td>
                      <td style = "width:300px" id="brutto1" name="brutto1"></td>
                      <td><b>{{ trans('messages.frieghtpack') }}</b></td>
                     <td style = "width:300px" id="packagename1" name="packagename1"></td>
                  </tr>
                      <tr>
                      	<td><b>{{ trans('messages.dangergoods') }}</b></td>
                      <td id="dangergoods1" name="dangergoods1"></td>
                      <td><b>{{ trans('messages.dangergoodsextra') }}</b></td>
                      <td id="dangergoodsextra1" name="dangergoodsextra1"></td>
                      </tr>
                    </tbody>
                  </table>

                  <label>{{ trans('messages.transporters') }}</label>

                 <table id='rail' class="table table-bordered">
                    <thead>
                      <tr>
                        <th>№</th>
                        <th>{{ trans('messages.transporter') }}</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                     
                      
                    </tbody>
                  </table>
                  
                  <label>{{ trans('messages.zuuch') }}</label>
                  <table id='zuuch' class="table table-bordered">
                    <thead>
                      <tr>
                        <th>{{ trans('messages.zuuchcode') }}</th>
                        <th>{{ trans('messages.zuuchname') }}</th>
                        <th>{{ trans('messages.rail') }}</th>
                       
                      </tr>
                      
                    </thead>
                    <tbody>
           
                      
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-default pull-right" id="btnPrint">{{ trans('messages.print') }} </button>
              
                </div>

                        </div>
 
                    </div>
                </div>
                      <div class="row">
              
          
               
          
               
               
     
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.close') }}</button>
      </div>
    </div>

  </div>
</div>
</div>
</div>
  </div>
    <!-- /page content -->
@endsection

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

<script type="text/javascript">
	$(document).ready(function() {
    $('.js-example-basic-single').select2();

    $('#tost').val($('#tostid').val()).trigger('change');
    $('#fromst').val($('#fromstid').val()).trigger('change');
    $('#type').val($('#typeid').val()).trigger('change');
});
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
      format: "YYYY/MM/DD", 
      defaultDate:  moment().subtract(2, 'days'),
      maxDate: ed 
    });
  
    $('#endDate').datetimepicker({ 
      pickTime: false, 
      format: "YYYY/MM/DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#form"), 'startDate', 'endDate');
});
</script>
      
      <script type="text/javascript">
        var rusImgLink = "{{URL::asset('/images/Rus.png')}}"
    	var monImgLink = "{{URL::asset('/images/Mon.png')}}"

		var imgNavSel = $('#imgNavSel');
		var imgNavRus = $('#imgNavRus');
		var imgNavMon = $('#imgNavMon');
	

		var spanNavSel = $('#lanNavSel');
		
		imgNavSel.attr("src",rusImgLink);
		imgNavRus.attr("src",rusImgLink);
		imgNavMon.attr("src",monImgLink);
         $(document).ready(function() {
         
    // DataTable
    var table =  $('#users').DataTable({
     
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
  }, dom: 'Bfrtip',
        buttons: [
      {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },
            'excelHtml5',
            'csvHtml5'
        ]  });
             var table =  $('#users1').DataTable({

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
                 }, dom: 'Bfrtip',
                 buttons: [
                     {
                         extend: 'pdfHtml5',
                         orientation: 'landscape',
                         pageSize: 'LEGAL'
                     },
                     'excelHtml5',
                     'csvHtml5'
                 ]  });
       $('.update').on('click',function(){
         
         var itag=$(this).attr('tag');
         alert(itag);
           $.get('freightfill/'+itag,function(data){
             $.each(data,function(i,qwe){
               
                 $('#packagename').text(qwe.packagename);
                  $('#frieghtgng').text(qwe.frieghtgng);
                $('#frieghtgngname').text(qwe.frieghtgngname);
                $('#sendercountry').text(qwe.sendercountry);
                $('#recievercountry').text(qwe.recievercountry);
                $('#brutto').text(qwe.brutto);
                $('#dangergoods').text(qwe.dangergoods);
                $('#dangergoodsextra').text(qwe.dangergoodsextra);
                 $('#packagename1').text(qwe.packagename);
                $('#frieghtgngname1').text(qwe.frieghtgngname);
                 $('#frieghtgng1').text(qwe.frieghtgng);
                $('#sendercountry1').text(qwe.sendercountry);
                $('#recievercountry1').text(qwe.recievercountry);
                $('#brutto1').text(qwe.brutto);
                $('#dangergoods1').text(qwe.dangergoods);
                $('#dangergoodsextra1').text(qwe.dangergoodsextra);

         });
         
          });
            $.get('billfill/'+itag,function(data){
             $.each(data,function(i,qwe){
                $('#specname').text(qwe.specname);
                $('#sendertype').text(qwe.sendertype);
                $('#billnumber').text(qwe.billno);
                $('#loaddatee').text(qwe.loaddate);
                $('#fromstt').text(qwe.fromstname);
                $('#tostt').text(qwe.tostname);
                $('#sendernamee').text(qwe.sendername);
                $('#recievernamee').text(qwe.recievername);
                $('#senderaddresss').text(qwe.senderaddress);
                $('#recieveraddresss').text(qwe.recieveraddress);
                $('#specname1').text(qwe.specname);
                $('#sendertype1').text(qwe.sendertype);
                $('#billnumber1').text(qwe.billno);
                $('#loaddatee1').text(qwe.loaddate);
                $('#fromstt1').text(qwe.fromstname);
                $('#tostt1').text(qwe.tostname);
                $('#sendernamee1').text(qwe.sendername);
                $('#recievernamee1').text(qwe.recievername);
                $('#senderaddresss1').text(qwe.senderaddress);
                $('#recieveraddresss1').text(qwe.recieveraddress);

         });
         
          });
              $.get('transportersfill/'+itag,function(data){
                 $('#rail tbody').empty();
             $.each(data,function(i,qwe){
                $('#rail tbody').append('<tr><td>'+qwe.railcode+'</td>'+'<td>'+qwe.railname+'</td></tr>');
         });
         
          });
                   $.get('wagonsfill/'+itag,function(data){
                 $('#wagon tbody').empty();
             $.each(data,function(i,qwe){
                $('#wagon tbody').append('<tr><td>'+qwe.wagno+'</td>'+'<td>'+qwe.isempty+'</td>'+'<td>'+qwe.tara+'</td>'+'<td>'+qwe.weight+'</td>'+'<td>'+qwe.axes+'</td>'+'<td>'+qwe.privcountry+'</td>'+'<td>'+qwe.privcompname+'</td></tr>');
         });
         
          });
                $.get('zuuchfill/'+itag,function(data){
                 $('#zuuch tbody').empty();
             $.each(data,function(i,qwe){
                $('#zuuch tbody').append('<tr><td>'+qwe.zuuchcode+'</td>'+'<td>'+qwe.zuuchsname+'</td>'+'<td>'+qwe.railcode+'</td></tr>');
         });
         
          });
    } );
document.getElementById("btnPrint").onclick = function() {
	document.getElementById("garchig").style.display = 'block';
    printElement(document.getElementById("print"));
    window.print();
}

function printElement(elem, append, delimiter) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    if (append !== true) {
        $printSection.innerHTML = "";
    }

    else if (append === true) {
        if (typeof(delimiter) === "string") {
            $printSection.innerHTML += delimiter;
        }
        else if (typeof(delimiter) === "object") {
            $printSection.appendChlid(delimiter);
        }
    }

    $printSection.appendChild(domClone);
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