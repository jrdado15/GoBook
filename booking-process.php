<?php 
require_once 'includes/conn.php';
include('includes/process.php');


if(isset($_GET['movie_id'])){
    $movie_id = $_GET['movie_id'];
    session_start();
    //decrypt id
    $movie_id -= 100123;

    $_SESSION['movie_id'] = $movie_id;
    unset($_SESSION['reserved_seats']);
    unset($_SESSION['account_name']);
    unset($_SESSION["paymethod"]);
    unset($_SESSION['account_num']);
    unset($_SESSION['count']);

    $_SESSION['count'] = 0;
    
    $query = "SELECT * FROM movie_tbl WHERE movie_id = '$movie_id' ";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)){
        $movie = mysqli_fetch_assoc($result);
        $movie_name =  $movie['movie_name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out • <?php echo $movie_name; ?></title>
    <link rel = "icon" href="images/icons8-ticket-100.png" type = "image"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" /> -->
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1587270922/datepicker/datedropper.css" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout-stylesheet.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-md navbar-dark ">
    <div class="container-fluid mx-5">
        <div class="row ">
            <img class="navbar-brand align-middle mr-3" src="images/gobook_logo-01.png"  alt="GOBOOK"/>
               
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle Navigation" >
        <span  class="fa fa-bars" ></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
        
        
        <ul class="navbar-nav align-middle ml-auto">
           
            <li class="nav-item">
                <a href="index.php" class="nav-link">HOME</a>
            </li>
          
            <li class="nav-item ">
                <a href="#" class="nav-link">MY CART</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">TICKETS</a>
            </li>            
        </ul>
        
    </div>
    </div> 
    
</nav>
<!-- ********* -->

<!-- BOOKING PROCESS -->
    <div class="container-fluid col-md-10 col-12 py-3 px-lg-5 px-0 m-auto  flex-column justify-content-center co-cont " id="co-cont-id">
        <!-- BOTTOM DIV -->
            <div class="col-md-8 col-12  py-1 column mx-auto mb-auto">
                <div class="col-12 right-div justify-content-center" >

                    <h1 class="text-center text-md-left">Check Out</h1>
                    <h4 class="text-uppercase text-center text-md-left"><?php echo $movie_name; ?></h4>   
                    <div>

            </div>

        <!-- 1ST ROW -->
                        <div class="form-group col-12  p-0">
                            <select name = "cinema" id = "cinema" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="">Select Cinema</option>
                                <option value="SM Manila" class="opt">SM Manila</option>
                                <option value="SM San Lazaro" class="opt">SM San Lazaro</option>
                                <option value="SM Muntinlupa" class="opt">SM Muntinlupa</option>
                                <option value="Festival Mall" class="opt">Festival Mall</option>
                            </select>  
                        </div>
        <!-- ******* -->
        <!-- ******* -->
        <!-- 2ND ROW -->
                        <!-- selection for movie type, time, and date -->
                        <div class="row col-12 p-0 mx-auto" id = "screening_info">
                            
                        </div>

                        <div id = "re">
                        </div>

                        <div id = "wa">
                        </div>
                        
        <!-- ******* -->

        <!-- CINEMA -->
        <div id = "ch_seat" class = "ch_seat">
                   
        </div>

    <!-- FOOTER -->
    <div class="footer container-fluid col-10 mx-auto">
        <div class="row justify-content-between p-5">
            <div class="block col-xl-4 col-lg-3 m-2">
                <h3>GoBooK</h3>
                <p>GOBOOK brings you the fastest and easiest way to book your movie tickets for all the upcoming movies in the theatres nearby you.</p>
            </div>
            <div class="contact block col-xl-4 col-lg-3 m-2 ">
                <div class="column m-0 p-0">
                <h3>Contact us</h3>
                <div><i class="fa fa-phone mr-1"></i><span>+8802 2093</span></div>
                <div><i class="fa fa-envelope mr-1 "></i><span>gobook@mail.com</span></div>
                <div><i class="fa fa-map-marker mr-1 "><span>ABCD Bldg. 2 Ermita, Manila Philippines</span></i></div>
            </div>
            
            <div class="block col-xl-3 col-lg-3 m-2">
                <h3>Follow Us</h3>
                <div class="sns row m-0">
                    <i class="fa fa-facebook my-1 mx-2 "></i>
                    <i class="fa fa-twitter my-1 mx-2"></i>
                    <i class="fa fa-instagram my-1 mx-2"></i>
                
                </div>
            </div>
        </div>
    </div>

    <!--pass mall id and on success display date and time selection -->
    <script>
        $(document).ready(function(){
            $('#cinema').change(function(){
                var cinema = $(this).val();
                $.ajax({
                    url: "includes/process.php",
                    method: "post",
                    data: {cinema: cinema},
                    success:function(data){
                        $('#screening_info').html(data);
                        // if($("#cinema").hasClass("error")){
                        //     $('#ch_seat').hide();
                        //     $("#cinema").removeClass("error");
                        // }
                    }
                });
            });
        });
    </script>
    <!-- ***** -->

    <!-- pass date and time id and  on success display seats selection -->
    <script>
        $(document).ready(function(){
            $(document).on('change', '[id^="date_opt"]', function () {
                var date_id = $(this).val();
                $.ajax({
                    url: "includes/process.php",
                    method: "post",
                    data: {date_id: date_id},
                    success:function(data){
                        // if($("#cinema").hasClass("error")){
                        //     $('#ch_seat').show(data);
                        //     $("#cinema").addClass("error");
                        // }
                        // else{
                        //     $('#ch_seat').html(data);
                        //     $("#cinema").addClass("error");
                        // }
                        $('#ch_seat').html(data);
                    }
                });
            });
        });
    </script>

    <!-- pass seats id and on success, change seats status to selected -->
    <script>
        $(document).ready(function(){
            $(document).on('click', ".status", function () {
                var seat_id = $(this).attr("id");
                $.ajax({
                    url: "includes/process.php",
                    method: "post",
                    data: {seat_id: seat_id},
                    success:function(data){
                        if($("#" + seat_id).hasClass("selected")){
                            $("#" + seat_id).removeClass("selected");
                        }
                        else{
                            $("#" + seat_id).addClass("selected");
                        }
                        // $("#" + seat_id).addClass("selected");  
                        // $('#re').html(data);
                    }
                });
            });
        });
    </script>
    <!-- ***** -->

    <!-- selects payment method -->
    <script>
        $(document).ready(function(){
            $(document).on('click', ".pm", function () {
                var paymethod = $(this).attr("id");    
                $.ajax({
                    url: "includes/process.php",
                    method: "post",
                    data: {paymethod: paymethod},
                    success:function(data){ 
                        if($("#" + paymethod).hasClass("active")){
                            $("#" + paymethod).removeClass("active");
                        }
                        else{
                            $("#" + paymethod).addClass("active");
                        }
                        // $('#message').html(data);
                    }
                });
            });
        });
    </script>
     <!-- ***** -->

    <!-- validated account name and account number-->
    <script>
        $(document).ready(function(){
            $(document).on('submit', '[id^="proceed_btn"]', '.pm', function (event) {
                event.preventDefault();
                var proceed_id = $('#proceed_btn').val();
                var account_name = $('[id^="acc_name"]').val();
                var account_number = $('[id^="acc_num"]').val();
                $.ajax({
                    url: "includes/process.php",
                    method: "post",
                    data: {proceed_id: proceed_id, account_name: account_name, account_number: account_number},
                    success:function(data){
                        //alert("success");
                        $('#message').html(data);
                    }
                });
            });
        });
    </script>
    <!-- ***** -->


    
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.select2').select2({
        closeOnSelect: false
        });
        });
        $("#test").select2({
            dropdownCssClass : 'no-search'
        }); 
    </script>
  
    
</body>
</html>
