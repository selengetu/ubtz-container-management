@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->

@endpush

        
@section('main_container')
  
      <div class="right_col" role="main" >
          <button type='button' class="btn btn-default pull-right" onclick="printDiv('printableArea')"><i class="glyphicon glyphicon-print" ></i>  {{ trans('messages.print') }}</button>
          @foreach($hyanalt as $hyanalts)
        
           @endforeach
           <div id="printarea" style="width: 83%" class="col-md-offset-1">
              <table class="table table-bordered1 table-hover" border='1' cellpadding="0" cellspacing="0">
              
              <tr>
            
                         <td colspan="11"> 
                          <b style="font-size: 80%"> Лист приёма груза (для договорного перевозчика)  <br>   Ачаа хүлээн авах хуудас (гэрээт тээвэрлэгчид үлдэнэ)</b>
           
          </td>

           
          <td colspan="7" >
            <small> 29 Отправка №/ Илгээлт №</small>

            <small><b>
             {{$hyanalts->billno}}
            </b></small>
          </td>
      
     </tr>
         
      <tr>
                  <td rowspan="3" width="40">
               <small>
                  Накаладная СМГС/ОАХХ-Падаан АО-УБЖД УБТЗ/ХНН 
               </small>
                           
                    
               
          </td>
          <td colspan="9" >
            <small>
              1.Отправител / Илгээгч

            </small>
              <small style="margin-left: 20px">
              <b>
              {{$hyanalts->sendercode}}
            </b>
          </small>
            <br>
              <div class="clearfix"> </div>
            <small >
               <b >
              {{$hyanalts->sendername}}  , {{$hyanalts->senderaddress}}
            </b>
            </small>
             
          
       
          </td>
          <td colspan="8" >
              <small>
               2.Станция отправления / Илгээх өртөө
              </small>
            <small style="margin-left: 20px">
              <b>
              {{$hyanalts->fromstcode}}
            </b>
          </small>
           <br>
       <div class="clearfix"> </div>

            <small style="margin-top: 20px">
               <b>
              {{$hyanalts->fromstname}} {{$hyanalts->fromrailname}}
            </b>
            </small>
          </td>
          
     </tr>
      <tr>
                  <td colspan="9"> 
                      <small>
                       Подпись / Гарын үсэг
                      </small>
                  
            <small style="margin-left: 20px">
               <b>
              {{$hyanalts->sendersign}}  
            </b>
            </small>
     
          </td>
          <td colspan="8" rowspan="3">
              <small>
                3. Заявления отправителя / Илгээгчийн мэдээлэл
              </small>
         <br>
         <br>
             <small>
        <b>
           {{$hyanalts->specname}} 
        </b>
             
          
            </small>
          </td>
        
     </tr>

      <tr>
                  <td colspan="9" > 
                      <small>
                       4. Получатель / Хүлээн авагч
                      </small>
         <small style="margin-left: 20px">
              <b>
              {{$hyanalts->recievercode}}
            </b>
          </small>
        
            <br>
                 <div class="clearfix"> </div>
            <small>
            <b>
               {{$hyanalts->recievername}}  , {{$hyanalts->recieveraddress}}
            </b>
             
         
            </small>
          </td>
         
         
     </tr>
      <tr>
                  <td colspan="10" rowspan="2" > 
                      <small>
                        5. Станция назначения / Хүрэх өртөө
                      </small>
          <small style="margin-left: 100px;" >
              <b>
              {{$hyanalts->tostcode}}
            </b>
          </small>
           <br>
                 <div class="clearfix"> </div>
            <small>
               <b>
             
               @foreach($railway as $name)

                   @if ($hyanalts->torailcode==$name->rcode)
                  
                       {{ $name->rabbr}}
                 
                  @endif
 
                @endforeach
                 {{$hyanalts->tostname}}  
            </b>
            </small>
          </td>
        </tr>
         
 
     
                        <tr>
                  <td colspan="8"> 
                      <small style="line-height: 1.2">
                        8.Вагон предоставлен / Вагон олгосон 9.Грузоподьёмность / Даац 10. Оси / Гол 11. Масса тары / Вагоны жин 12. Тип цистерны / Цистерний төрөл
                      </small>
       
          </td>
        
     </tr>
          <tr>
                  <td colspan="6" rowspan="5" width="305"> 
                      <small>
                      6. Пограничние станций переходов / Дамжин өнгөрөх хилийн өртөө
                      </small>
                      <br>
                           <div class="clearfix"> </div>
                        @foreach($stlimit1 as $stlimits1)
                          <small>
                            <b>
                                {{ $stlimits1->stname }} - {{ $stlimits1->rabbr }} - {{ $stlimits1->stcode }}
                            </b>

                            
                          </small>
                          <br>
                                
            
                         @endforeach
       
          </td>
          <td colspan="4">
            <small>
             7. Вагон
            </small>
         
          </td>
          <td width="40">
            <small>
               8
            </small>
        
          </td>
          <td width="40">
       <small>
               9
            </smal>
          </td>
          <td width="40">
         <small>
              10
            </small>
          </td>
          <td width="40">
       <small>
               11
            </small>
          </td>
          <td width="40">
      <small>
              12
            </small>
          </td >
          <td colspan="3" rowspan="2" >
           <small>
                После перегрузки / Шилжүүлэн ачилтын дараа
              </small>
          
          </td>
         
         
     </tr>

      <tr>
                  <td colspan="4"> 
      <small>
        @if (count($wagon) < 2)
 @foreach($wagon as $wagons)
     
             {{ $wagons->wagno}} - {{ $wagons->privcompname }}
       
                @endforeach
  @else
                Смотри прилагаемую ведомость
                @endif

            
            </small>
          </td>
          <td>
        <small>
                 @if (count($wagon) < 2)
                  @foreach($wagon as $wagons)
     
             {{ $wagons->privwho}}
       
                @endforeach

                @endif
            
            </small>
          </td>
          <td>
         <small>
           @if (count($wagon) < 2)

             @foreach($wagon as $wagons)
     
             {{ $wagons->weight}}
       
                @endforeach
                @endif
             
            </small>
          </td>
          <td >
         <small>
           @if (count($wagon) < 2)
              @foreach($wagon as $wagons)
     
             {{ $wagons->axes}}
       
                @endforeach

                @endif
               
            </small>
          </td>
          <td>
        <small>
           @if (count($wagon) < 2)
             @foreach($wagon as $wagons)
     
             {{ $wagons->tara}}
       
                @endforeach

                @endif
               
            </small>
          </td>
          <td >
     <small>
              
            </small>
          </td>
        
     </tr>

      <tr>
                <td colspan="4"> 
      <small>
            
            </small>
          </td>
          <td>
        <small>
            
            </small>
          </td>
          <td>
         <small>
              
            </small>
          </td>
          <td >
         <small>
               
            </small>
          </td>
          <td>
        <small>
               
            </small>
          </td>
          <td >
     <small>
              
            </small>
          </td>
          <td colspan="2" width="140">
            <small style="line-height: 1.1; font-size: 50%">
              13. Масса груза / Ачааны жин 
            </small>
         
          </td>
          <td width="60">
            <small style="line-height: 1.1; font-size: 50%">
             14. К-во мест / Байрын тоо
            </small>
         
          </td>
          
     </tr>
      <tr>
                  <td colspan="4" > 
        <small>
               
            </small>
          </td>
          <td>
        <small>
              
            </small>
          </td>
          <td>
          <small>
               
            </small>
          </td>
          <td>
          <small>
              
            </small>
          </td>
          <td>
          <small>
              
            </small>
          </td>
          <td >
        <small>
       
            </small>
          </td>
          <td colspan="2">
        <small>
         
            </small>
          </td>
          <td>
         <small>
          
            </small>
          </td>
         
     </tr>

                   <tr>
                  <td colspan="4" > 
       <small>
               
            </small>
          </td>
          <td>
        <small>
            
            </small>
          </td>
          <td>
         <small>
             
            </small>
          </td>
          <td>
          <small>
              
            </small>
          </td>
          <td>
         <small>
            
            </small>
          </td>
          <td>
        <small>
              
            </small>
          </td>
          <td colspan="2">
        <small>
              
            </small>
          </td>
          <td>
         <small>
             
            </small>
          </td>
       
     </tr>
          <tr>
                  <td  rowspan="13" colspan="8" width="2500" > 
                      <small>
                       15.Найменование груза / Ачааны нэр
                       <br>
                       <br>
                      </small>
                       @foreach($frieght as $frieghts)
                        <b><small >
                          <br>
                   
           
                             {{ $frieghts->frieghtgngname }}  {{ $frieghts->frieghtetname }} 
                        </small>
                      
                       </b>
              <br>
           @endforeach
                      
        <small style="margin-bottom: 5px">  
          <br><br><br>
         @foreach($wagon as $wagons)
     
            <b>{{ $wagons->cnnum}}   {{ $wagons->cntype}}</b> 
       
                @endforeach</small>
          </td>
          <td rowspan="11" colspan="2">
              <small>
                16. Род упаковки / Баглаа боодлын төрөл
                <br>
              </small>
  @foreach($frieght as $frieghts)
                        <b><small>
                          <br>
                
                             {{ $frieghts->packagename }}
                        </small>
                      
                       </b>
              <br>
           @endforeach
          </td>
          <td rowspan="11" colspan="2">
              <small>
               17. Количество мест/ Байрын тоо
              </small>
                 
          </td>
          <td td rowspan="11" colspan="2">
              <small >
                18. Масса (в кг) / Жин (кг-аар)
              </small>
            @foreach($frieght as $frieghts)
                        <b><small>
                          <br>
                          <br>
                             {{ $frieghts->brutto }}
                        </small>
                      
                       </b>
         
            
           @endforeach
             <br><br>
           @if (count($frieght) > 1)

       <small> <b>Итого: {{ $frieghtsum }}</b> </small>
            @endif
          </td>
          <td colspan="4">
              <small>
                19.Пломбы / Ломбо
              </small>
          
          </td>
        
     </tr>
     
        
  
         
      <tr>
                  <td> 
                      <small>
                       к-во / тоо
                      </small>
       
          </td>
          <td colspan="3">
              <small>
               знаки / тэмдэгтүүд
              </small>
         
          </td>
       
     </tr>
    
      
    
 
       
         

         <tr>
                
                  <td> 
        <small>
               @if (count($wagon) < 2)
  @foreach($lombo as $lombos)
       @if ($loop->first)
        {{ $lombos->wagordno}} 
    @endif
              @endforeach
  @else
                Смотри прилагаемую ведомость
                @endif
   
            </small>
          </td>
          <td colspan="3">
         <small>
            @if (count($wagon) < 2)
  @foreach($lombo as $lombos)
       @if ($loop->first)
        {{ $lombos->lombono}} 
    @endif
              @endforeach

                @endif
            
            </small>
          </td>
       
         
         
     </tr>
     




        <tr >
    
                  <td> 
        <small>
             @if (count($wagon) < 2)

               @foreach($lombo as $lombos)
       @if ($loop->index==1)
        {{ $lombos->wagordno}} 
    @endif
              @endforeach
                @endif
             
            </small>
          </td>
          <td colspan="3">
         <small>
             @if (count($wagon) < 2)
 @foreach($lombo as $lombos)
       @if ($loop->index==1)
        {{ $lombos->lombono}} 
    @endif
              @endforeach

                @endif
             
            </small>
          </td>

     </tr>
  <tr >
    
                  <td> 
        <small>
             @if (count($wagon) < 2)

               @foreach($lombo as $lombos)
       @if ($loop->index==2)
        {{ $lombos->wagordno}} 
    @endif
              @endforeach
                @endif
             
            </small>
          </td>
          <td colspan="3">
         <small>
             @if (count($wagon) < 2)
               @foreach($lombo as $lombos)
       @if ($loop->index==2)
        {{ $lombos->lombono}} 
    @endif
              @endforeach

                @endif
             
            </small>
          </td>

     </tr>
      <tr>
                
                  <td> 
        <small>
   
            </small>
          </td>
          <td colspan="3">
         <small>
          
            </small>
          </td>
       
         
         
     </tr>
 <tr>
                
                  <td> 
        <small>
    
            </small>
          </td>
          <td colspan="3">
         <small>
            
            </small>
          </td>
       
         
  <tr>
                
                  <td> 
        <small>
    
            </small>
          </td>
          <td colspan="3">
         <small>
           
            </small>
          </td>
       
         
         
     </tr>
       <tr>
                
                  <td> 
        <small>
  
            </small>
          </td>
          <td colspan="3">
         <small>
            
            </small>
          </td>
       
         
         
     </tr>

      <tr>
                  <td colspan="4"> 
                      <small>
                       20. Погружено / Ачсан
                      </small>
              
          </td>
          </tr>
           <tr>
                  <td colspan="4"> 
                      <small>
                       21. Способ определения массы / Ачааны жин тодорхойлсон арга
                      </small>
                                @foreach($frieght as $frieghts)
                        <b><small>
                          <br>
                      
                             {{ $frieghts->poolname }}
                        </small>
                      
                       </b>
           @endforeach
        
          </td>
         
     </tr>
         <tr>
                  <td colspan="3"> 
      <small>
               22. Перевозчики / Тээвэрлэгчид
            </small>
          </td>
          
          <td colspan="5">
              <small>
               участки(от/до) / хэсэг(ээс/хүртэл)
              </small>
          
          </td>
          <td colspan="2">
              <small>
               Коды станций / Өртөөний код
              </small>
          
          </td>
        
        
     </tr>
          <tr>
                  <td rowspan="2" colspan="3"> 
       <small>
                  @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==0)
           {{ $stlimits->rabbr }}
      @endif
                             
                            </b>
                         @endforeach
       
            </small> 
          </td>
          <td rowspan="2" colspan="5">
         <small>
             @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==0)
           {{ $stlimits->stname  }}
      @endif
                     
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==1)
           {{ $stlimits->stname }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td colspan= "2" rowspan="2">
        <small>
               @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==0)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==1)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach

            </small>
          </td>
         </tr>
      <tr>
                  <td rowspan="7" colspan="8"> 
                      <small>
                        23. Уплата провозных платежей / Тээврийн төлбөр тооцоо
                      </small>
         <br>
                           <div class="clearfix"> </div>
                        @foreach($zuuch as $zuuchs)
                          <small>
                            <b>
                                {{ $zuuchs->zuuchsname }} - {{ $zuuchs->zuuchname }} - {{ $zuuchs->zuuchcode }}
                            </b>

                            
                          </small>
                          <br>
                                
            
                         @endforeach
          </td>

     </tr>
     


           <tr>
                  <td rowspan="2" colspan="3"> 
       <small>
           @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==2)
           {{ $stlimits->rabbr }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td rowspan="2" colspan="5">
           <small>
             @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==2)
           {{ $stlimits->stname  }}
      @endif
                     
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==3)
           {{ $stlimits->stname }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td colspan="2" rowspan="2">
       <small>
               @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==2)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==3)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach

            </small>
          </td>
         
     </tr>

      <tr >
     
        
     </tr>
      
        <tr>
                  <td rowspan="2" colspan="3"> 
       <small>
           @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==4)
           {{ $stlimits->rabbr }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td rowspan="2" colspan="5">
           <small>
             @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==4)
           {{ $stlimits->stname  }}
      @endif
                     
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==5)
           {{ $stlimits->stname }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td colspan="2" rowspan="2">
       <small>
               @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==4)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==5)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach

            </small>
          </td>
         
     </tr>
       <tr >
                 
         
     </tr>
       <tr>
                  <td rowspan="2" colspan="3"> 
       <small>
           @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==6)
           {{ $stlimits->rabbr }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td rowspan="2" colspan="5">
           <small>
             @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==6)
           {{ $stlimits->stname  }}
      @endif
                     
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==7)
           {{ $stlimits->stname }}
      @endif
                             
                            </b>
                         @endforeach
            </small>
          </td>
          <td colspan="2" rowspan="2">
       <small>
               @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==6)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach
                         <br>
                          @foreach($stlimit as $stlimits)
                        
                            <b>
                                  @if ($loop->index==7)
           {{ $stlimits->stcode }}
      @endif
                             
                            </b>
                         @endforeach

            </small>
          </td>
         
     </tr>
<tr style="max-height: 0px"></tr>
          <tr>
                  <td colspan="8" rowspan="5"> 
                      <small>
                       24. Документы, приложенные отправителем / Илгээгчийн хавсаргасан бичиг баримт
                      </small>
          
          </td>
        
     </tr>
      <tr>
                  <td rowspan="2" colspan="3"> 
         <small>
        @foreach($transporter as $transporters)
       @if ($loop->index==3)
        {{ $transporters->railname}} 
    @endif
              @endforeach
            </small>
          </td>
          <td rowspan="2" colspan="5">
         <small>
       
            </small>
          </td>
          <td colspan="2" rowspan="2">
          <small>
              
            </small>
          </td>
        
     </tr>
         <tr>
               
     </tr>
     <tr height="50">
                  <td colspan="10" rowspan="2"> 
                      <small>
                      25. Информация, не предназначенная для перевозчика / Тээвэрлэгчид үл хамаарах мэдээлэл, бараа нийлүүлэх гэрээний дугаар
                      </small>
        
          </td>
        
     </tr>
          <tr>
                 
     </tr>
     <tr >
                  <td colspan="4"> 
                      <small>
                        26. Дата заключения договора перевозки 
                      </small>
                      <br>
          <br>
                      <small><b>{{$hyanalts->hostgendate}}</b></small>
                     
        
          </td>

          <td colspan="4">
              <small>
              27. Дата прибытия / Ирсэн огноо
              </small>
          
          </td>
          <td colspan="10">
              <small>
                28. Отметки для выполнения таможенных и других административных формальностей / Гааль болон бусад захиргааны байгууллагын тэмдэглэл
              </small>
          
          </td>
         
     </tr>
        </table>
        <br><br>
           @if (count($wagon) > 1)
        <h5>Ведомость вагонов</h5>
         <table  class="table table-bordered1 table-hover" border='1' cellpadding="0" cellspacing="0" >
           <thead>
            <tr> 
              <th rowspan="2"><small> № п/п</small></th>
            <th colspan="6"><small>7.Вагон  8.Вагон предоставлен 9.Грузоподьемность 10.Оси 11.Масса тары 12.Тип цистерны</small></th>
           
            <th colspan="2"><small>Пломбы</small></th>
           




            <tr> 
            <th><small>7</small></th>
            <th><small>8</small></th>
            <th><small>9</small></th>
            <th><small>10</small></th>
            <th><small>11</small></th>
            <th><small>12</small></th>
           
            <th><small>К-во</small></th>
            <th><small>Знаки</small></th>
          </tr>
           </thead>
           <tbody>
             <?php $no = 1;?>
           @foreach($wagon as $wagons)
       
            <tr>
            <td><small>{{$no}}</small></td>
            <td><small>{{$wagons->wagno}}</small><br><small>{{$wagons->privcompname}}</small></td>
            <td><small>{{$wagons->privwho}}</small></td> 
            <td><small>{{$wagons->weight}}</small></td>
            <td><small>{{$wagons->axes}}</small></td>
            <td><small>{{$wagons->tara}}</small></td>
           
            <td><small></small></td>
            <td><small> 1</small></td>
            <td><small>

                @foreach($lombo as $lombos => $lom)

                   @if ($lom->wagordno==$wagons->wagordnum)
                  
                       {{ $lom->lombono}}<br>
                 
                  @endif
 
                @endforeach

            </small></td>
            </tr>
                 <?php $no++; ?>
              @endforeach
           </tbody>
         </table>
@endif
           </div>
             
 
   <br> <br>      

</div>

    <!-- /page content -->
@endsection


<script type="text/javascript">
 function printDiv(printarea) {
     var printContents = document.getElementById('printarea').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>


<style type="text/css">
@page {
  size: A4;
}
body{
  color: black;
}
.clearfix{
  margin-top: 5px
}
  @media print {
   #btn2, #btn, #navbar, .left_col{
        display: none;
    }

}  


</style>


