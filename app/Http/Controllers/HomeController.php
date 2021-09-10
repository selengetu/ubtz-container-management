<?php

namespace App\Http\Controllers;

use Request;
use App\Bill;
use App\Wagon;
use App\Zuuch;
use App\Freight;
use App\User;
use App\Stlimit;
use App\Lombo;
use App\Transporters;
use Carbon\Carbon;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    

        $from = DB::select('select distinct fromstname, fromstcode from OZ_IDX_X_BILL t where t.FROMSTNAME is not null order by fromstname');
         $to= DB::select('select distinct  tostname, tostcode from OZ_IDX_X_BILL t where t.TOSTNAME is not null order by tostname');
        $query = "";
         $wagno= Request::input('frieght');
        $bill= Request::input('billno');
        $sdate= Carbon::today()->subDays(5)->format('Y/m/d');
        $fdate=  Carbon::today()->format('Y/m/d');
         $tost= 0;
        $fromst=0;
        $type= 0;

           
          if ($sdate !=0 && $sdate && $fdate !=0 && $fdate !=NULL) {
             $query.=" and LOADDATE between '".$sdate."' and '".$fdate."'";
      
         }
         else 
         {
             $query.=" and LOADDATE between '".date( "Y/m/d", strtotime( "-1 day" ) )."' and '".date( "Y/m/d", strtotime( "+1 day" ) )."'";
         }
     
        $result= DB::select("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where 1=1 ".$query. " and t.hostsender = 'GVCMPSRU' and rownum <= 4000 order by t.loaddate desc");
        $kresult= DB::select("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where 1=1 ".$query. " and t.hostsender = 'ITCMORCN' and rownum <= 4000 order by t.loaddate desc");
         $result1=("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where rownum <= 4000".$query. " and t.hostsender = 'GVCMPSRU' order by t.loaddate desc");
        $kresult1=("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where rownum <= 4000".$query. " and t.hostsender = 'ITCMORCN' order by t.loaddate desc");

          $count = DB::select('select count(*) as cnt from ( '.$result1.' ) ');
        $kcount = DB::select('select count(*) as cnt from ( '.$kresult1.' ) ');

        return view('home',['kresult'=> $kresult,'result'=> $result,'from'=> $from, 'to'=> $to, 'count' => $count, 'kcount' => $kcount, 'wagno' => $wagno, 'bill' => $bill, 'fdate' => $fdate, 'sdate' => $sdate, 'tost' => $tost, 'fromst' => $fromst, 'type' => $type]);
    }
     public function search()
    {    
         $from = DB::select('select distinct fromstname, fromstcode from OZ_IDX_X_BILL t  where t.FROMSTNAME is not null order by fromstname');
         $to= DB::select('select distinct  tostname, tostcode from OZ_IDX_X_BILL t  where t.TOSTNAME is not null order by tostname');
        $query = "";
        $wagno= Request::input('frieght');
        $bill= Request::input('billno');
        $fdate= Request::input('endDate');
        $sdate= Request::input('startDate');
         $tost= Request::input('tost');
        $fromst= Request::input('fromst');
        $type= Request::input('type');
        
      
         if ($bill!=NULL) {
             $query.=" and billno like '%".$bill."%'";
         }
         else 
         {
             $query.=" ";
         }
         if ($fromst !=0 && $fromst!=NULL) {
             $query.=" and fromstcode= '".$fromst."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($tost !=0 && $tost!=NULL) {
             $query.=" and tostcode= '".$tost."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($type == 1) {
             $query.=" and torailcode = 31";
         }
           if ($type == 2) {
             $query.=" and torailcode <> 31";
         }
         else 
         {
             $query.=" ";
         }
   
         if ($wagno!=NULL) {
             $query.=" and wagno LIKE '%".$wagno."%'";
         }
          else 
         {
             $query.=" ";
         }
         
         if ($sdate !=0 && $sdate && $fdate !=0 && $fdate !=NULL) {
             $query.=" and LOADDATE between '".$sdate."' and '".$fdate."'";
      
         }
         else 
         {

             $query.=" ";
         }

        $result= DB::select("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where 1=1 ".$query. " and t.hostsender = 'GVCMPSRU' and rownum <= 4000 order by t.loaddate desc");
        $kresult= DB::select("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where 1=1 ".$query. " and t.hostsender = 'ITCMORCN' and rownum <= 4000 order by t.loaddate desc");
        $result1=("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where rownum <= 4000".$query. " and t.hostsender = 'GVCMPSRU' order by t.loaddate desc");
        $kresult1=("select t.* , f.WAGNO from OZ_IDX_X_BILL t left join OZ_IDX_X_WAGON f on f.bid = t.bid where rownum <= 4000".$query. " and t.hostsender = 'ITCMORCN' order by t.loaddate desc");

        $count = DB::select('select count(*) as cnt from ( '.$result1.' ) ');
        $kcount = DB::select('select count(*) as cnt from ( '.$kresult1.' ) ');
    
        return view('home',['kresult'=> $kresult,'result'=> $result,'from'=> $from, 'to'=> $to, 'bill'=> $bill, 'kcount' => $kcount,'count' => $count, 'wagno' => $wagno, 'bill' => $bill, 'fdate' => $fdate, 'sdate' => $sdate, 'tost' => $tost, 'fromst' => $fromst, 'type' => $type]);
    }
      public function welcome()
    {
       
        return view('welcome');
    }
        public function hyanalt($id)
    {
       $hyanalt=Bill::where('bid', '=', $id)->get();
       $wagon=Wagon::where('bid', '=', $id)->get();
       $zuuch=Zuuch::where('bid', '=', $id)->get();
       $stlimit1=Stlimit::where('bid', '=', $id)->where('limittype', '=', 2)->get();
       $stlimit=Stlimit::where('bid', '=', $id)->get();
       $lombo=Lombo::where('bid', '=', $id)->get();
       $railway = DB::table('railway')->get();
       $frieght=Freight::where('bid', '=', $id)->get();
       $transporter=transporters::where('bid', '=', $id)->get();
     
       $frieghtsum = DB::table('OZ_IDX_X_FRIEGHT')
            ->where('bid', '=', $id)
            ->sum('brutto');
        
        return view('hyanalt',['hyanalt'=> $hyanalt,'wagon'=> $wagon,'zuuch'=> $zuuch,'frieght'=> $frieght,'frieghtsum'=> $frieghtsum,'lombo'=> $lombo,'stlimit'=> $stlimit,'stlimit1'=> $stlimit1,'transporter'=> $transporter,'railway'=> $railway]);
    }
    public function chart()
    {
        $query = "";
        $fidate= Request::input('endDate');
        $stdate= Request::input('startDate');
        $sdate= Carbon::today()->subDays(1)->format('Y-m-d');
        $fdate=  Carbon::today()->format('Y-m-d');

        if ($stdate !=0 && $stdate && $fidate !=0 && $fidate !=NULL) {
            $query.="and TO_DATE(LOADDATE, 'yyyy-mm-dd') between TO_DATE('".$stdate."', 'yyyy-mm-dd') and TO_DATE('".$fidate."', 'yyyy-mm-dd')";
            $sdate=$stdate;
            $fdate=$fidate;
        }
        else
        {
            $query.="and TO_DATE(LOADDATE, 'yyyy-mm-dd') between TO_DATE('".$sdate."', 'yyyy-mm-dd') and TO_DATE('".$fdate."', 'yyyy-mm-dd')";

        }

        $count  = DB::select("select case when t.HOSTSENDER = 'GVCMPSRU' then 'РЖД' else 'КЖД' end as HOSTSENDER,count(*) as niit,
                              sum(case when t.TORAILCODE = 31 then 1 else 0 end) as import,
                              sum(case when t.TORAILCODE != 31 then 1 else 0 end) as transit
                              from OZ_IDX_X_BILL t
                              where 1=1 ".$query."
                              group by t.HOSTSENDER ");
        $gng  = DB::select("
                        select  substr(t.FRIEGHTGNG,0,2) as frieghtgng, count(t.FRIEGHTGNG) as niit from OZ_IDX_X_FRIEGHT t, OZ_IDX_X_BILL b
                        where b.BID=t.BID  ".$query."
                        group by substr(t.FRIEGHTGNG,0,2)
                        order by substr(t.FRIEGHTGNG,0,2)
                       ");
        $gngtable  = DB::select("select * from gngcode order by gngid");

        return view('chart',['count'=> $count,'gng'=> $gng,'gngtable'=> $gngtable, 'fdate' => $fdate, 'sdate' => $sdate]);
    }
    public function detail()
    {
        $query = "";
        $fidate= Request::input('endDate');
        $stdate= Request::input('startDate');
        $sdate= Carbon::today()->subDays(1)->format('Y-m-d');
        $fdate=  Carbon::today()->format('Y-m-d');

        if ($stdate !=0 && $stdate && $fidate !=0 && $fidate !=NULL) {
            $query.="and TO_DATE(LOADDATE, 'yyyy-mm-dd') between TO_DATE('".$stdate."', 'yyyy-mm-dd') and TO_DATE('".$fidate."', 'yyyy-mm-dd')";
            $sdate=$stdate;
            $fdate=$fidate;
        }
        else
        {
            $query.="and TO_DATE(LOADDATE, 'yyyy-mm-dd') between TO_DATE('".$sdate."', 'yyyy-mm-dd') and TO_DATE('".$fdate."', 'yyyy-mm-dd')";

        }

        $loaddate  = DB::select("select t.HOSTSENDER, t.LOADDATE, count(t.LOADDATE) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t ,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                              where t.BID=f.BID and w.BID=t.BID ".$query."
                              group by  t.LOADDATE,t.HOSTSENDER  
                              order by t.HOSTSENDER ,t.LOADDATE
                             ");
        $sendercode  = DB::select("select t.HOSTSENDER, t.SENDERCODE, t.SENDERNAME ,count(t.LOADDATE) as loaddate, count(t.LOADDATE) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                                  where t.BID=f.BID and w.BID=t.BID ".$query."
                                  group by  t.HOSTSENDER,t.SENDERCODE , t.SENDERNAME
                                      order by t.HOSTSENDER , t.SENDERNAME
                             ");
        $recievercode  = DB::select("select t.HOSTSENDER, t.RECIEVERCODE, t.RECIEVERNAME ,count(t.LOADDATE) as loaddate, count(t.LOADDATE) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                                   where t.BID=f.BID and w.BID=t.BID ".$query."
                                    group by  t.HOSTSENDER,t.RECIEVERCODE, t.RECIEVERNAME
                                        order by t.HOSTSENDER ,t.RECIEVERNAME
                             ");
        $senderst  = DB::select("select t.HOSTSENDER,t.FROMSTCODE, t.FROMSTNAME ,count(w.WAGNO) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t ,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                                where t.BID=f.BID and w.BID=t.BID  ".$query."
                                group by  t.HOSTSENDER,t.FROMSTCODE, t.FROMSTNAME
                                   order by t.HOSTSENDER , t.FROMSTNAME
                             ");
        $recieverst  = DB::select("select t.HOSTSENDER,t.TOSTCODE, t.TOSTNAME ,count(w.WAGNO) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t ,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                                    where t.BID=f.BID and w.BID=t.BID  ".$query."
                                    group by  t.HOSTSENDER,t.TOSTCODE, t.TOSTNAME
                                       order by t.HOSTSENDER ,t.TOSTNAME 
                             ");
        $senderrail  = DB::select("select t.HOSTSENDER,t.FROMRAILCODE ,count(w.WAGNO) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                                    where t.BID=f.BID and w.BID=t.BID ".$query."
                                    group by  t.HOSTSENDER,t.FROMRAILCODE
                                      order by t.HOSTSENDER ,t.FROMRAILCODE 
                             ");
        $recieverrail  = DB::select("select t.HOSTSENDER,t.TORAILCODE ,count(w.WAGNO) as wagcount, sum(f.BRUTTO) as brutto from OZ_IDX_X_BILL t ,  OZ_IDX_X_FRIEGHT f, OZ_IDX_X_WAGON w
                                    where t.BID=f.BID and w.BID=t.BID ".$query."
                                    group by  t.HOSTSENDER,t.TORAILCODE
                                      order by t.HOSTSENDER ,t.TORAILCODE 
                             ");
        return view('detail',['loaddate'=> $loaddate,'sendercode'=> $sendercode,'recievercode'=> $recievercode, 'fdate' => $fdate, 'sdate' => $sdate
                                    , 'senderst' => $senderst, 'recieverst' => $recieverst, 'senderrail' => $senderrail, 'recieverrail' => $recieverrail]);
    }

    public function container()
    {
        //dd('asd');
        $query = "";
       /* $pContNumber= Request::input('pContNumber');
        $pContMark= Request::input('pContMark');*/
        $pContNumber= 'TKRU';
        $pContMark='4425482';
        if((Request::input('pContNumber')!=null)) {
            $pContNumber= Request::input('pContNumber');
        }
        if((Request::input('pContMark')!=null)) {
            $pContMark= Request::input('pContMark');
        }
       
        $bindings = [
            'pcontnumber'  =>   $pContNumber,
            'pcontmark'  =>  $pContMark,
            ];
            $rep = DB::executeProcedureWithCursor('EDIWEB.GET_TRACKING', $bindings);
           
        //    dd($rep);
        return view('container',['rep'=> $rep, 'pContNumber' => $pContNumber, 'pContMark' => $pContMark]);
    }

}
