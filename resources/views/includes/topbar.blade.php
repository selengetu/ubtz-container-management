<!-- top navigation -->

<div class="top_nav">
    <div class="nav_menu" id="navbar">
        <nav>
      
    
             
            <ul class="nav navbar-nav" style="width: 100%" >

             
              
                <li class="col-md-4 col-xs-4 col-lg-4"> 
                   <img src="{{URL::asset('/images/logo1.png')}}" >
 
   <img src="{{URL::asset('/images/logosbmta.png')}}">

</li>
            
   <li class="pull-right">

                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <img src="{{URL::asset('/images/user.png')}}" alt="Avatar of {{ Auth::user()->name }}">
                        {{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu pull-right">

                        <li><a href="{{ url('/profile') }}"><i class="fa fa-sign-out pull-right"></i> Нууц үг</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> {{ trans('messages.logout') }}</a></li>
                    </ul>
                </li>
                 <li class="dropdown pull-right">  
                     
                 @if ( Config::get('app.locale') == 'en')
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img id="imgNavSel" src="{{URL::asset('/images/Rus.png')}}" alt="..." class="img-thumbnail icon-medium">  <span id="lanNavSel"></span> <span class="caret"></span></a>


                @elseif ( Config::get('app.locale') == 'mon' )

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img id="imgNavSel" src="{{URL::asset('/images/Mon.png')}}" alt="..." class="img-thumbnail icon-medium">  <span id="lanNavSel"></span> <span class="caret"></span></a>

                @endif
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('setlocale/en')}}" id="navRus" class="language"> <img id="imgNavRus" src="{{URL::asset('/images/Rus.png')}}"  class="img-thumbnail icon-drop">   РУССКИЙ </a></li>
                        <li><a href="{{ url('setlocale/mon')}}" id="navMon" class="language"> <img id="imgNavMon" src="{{URL::asset('/images/Mon.png')}}"  class="img-thumbnail icon-drop">   МОНГОЛ ХЭЛ </a></li>
                       
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
    @section('cscript')
<script type="text/javascript">

    $(document).ready(function(){

        var rusImgLink = "{{URL::asset('/images/Rus.png')}}"
        var monImgLink = "{{URL::asset('/images/Mon.png')}}"
        var imgNavSel = $('#imgNavSel');
        var imgNavRus = $('#imgNavRus');
        var imgNavMon = $('#imgNavMon');
        var spanNavSel = $('#lanNavSel');
        imgNavRus.attr("src",rusImgLink);
        imgNavMon.attr("src",monImgLink);
        

        $( ".language" ).on( "click", function( event ) {
            var currentId = $(this).attr('id');
            if(currentId == "navRus") {
                imgNavSel.attr("src",rusImgLink);
               
            } else if (currentId == "navMon") {
                imgNavSel.attr("src",monImgLink);
             
            } 

        });
});
</script>
@endsection
<style type="text/css">
    .icon-drop
{
    height:30px;
    margin:0;
    padding:0;
    border:0;
}

.icon-medium
{
    height:30px;
    margin:0;
    padding:0;
    background-color: #EDEDED;
    border:0;
}
</style>