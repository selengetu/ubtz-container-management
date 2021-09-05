<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" id="left_col" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"> <img src="{{asset('images/logo1.png')}}" style="width: 100%; margin-top: 5px"></a>
        </div>
        
        <div class="clearfix"></div>
        

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
      
                <ul class="nav side-menu">
                 
                      <li class="active">
                        <a href="#">
                          <img class="myImg" src="{{asset('images/wagon.jpg')}}" style="width:200px">
                        </a>
                    </li>
                   <li>
                       <a href="#">
                          <img class="myImg" src="{{asset('images/1.jpg')}}" style="width:200px">
                        </a>
                    </li>
                      <li>
                   
                          <a href="#">
                          <img class="myImg" src="{{asset('images/2.png')}}" style="width:200px">
                        </a>
                     
                    </li>
                      <li>
                       <a href="#">
                          <img class="myImg" src="{{asset('images/3.jpg')}}" style="width:200px">
                        </a>
                    </li>
                      <li>
                        <a href="#">
                        <img class="myImg" src="{{asset('images/6.jpg')}}" style="width:200px">
                        </a>
                    </li>
          <li>
                        <a href="#">
                        <img class="myImg" src="{{asset('images/4.jpg')}}" style="width:200px">
                        </a>
                    </li>
                      <li>
                        <a href="#">
                        <img class="myImg" src="{{asset('images/5.jpg')}}" style="width:200px">
                        </a>
                    </li>
                  
                  
                </ul>
            </div>
            
        
        </div>
        
    </div>
</div>
<div id="myModal" class="modalgallery"> 

  <!-- The Close Button -->
  <span class="close1" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content1" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
<style type="text/css">
  .myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modalgallery {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content1 {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content1, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close1 {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close1:hover,
.close1:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content1 {
        width: 100%;
    }
}
</style>
<script type="text/javascript">
  // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = $('.myImg');
var modalImg = $("#img01");
var captionText = document.getElementById("caption");
$('.myImg').click(function(){
  document.getElementById("myModal").style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal

</script>