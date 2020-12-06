<?php 
    session_start();
    include('includes/server.php');
    include('includes/update_email.php');

    if(!isset($_SESSION['userId'])){
         $_SESSION['usertype'] = 'member';
    }
    //restricts user to skip email verification
    if(isset($_SESSION['userId'])){
        if($_SESSION['verified'] == 0){
            header('location: verification-page.php');
            exit();
        } 
    }

    if(isset($_POST['new_email'])){
        if($_SESSION['verified'] == 0){
            $email = $_SESSION['email'];
            $token = $_SESSION['token'];
            sendVerificationEmail($email, $token);
            $_SESSION['new_email'] = false;
        } 
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoBook</title>
    <link rel = "icon" href="images/icons8-ticket-100.png" type = "image"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/home-stylesheet.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#change_email").submit(function(event){
                event.preventDefault();
                var email_update = $("#email_update").val();
                var password_update = $("#password_update").val();
                var update_email = $("#update_email").val();
                $(".cemail-message").load("includes/update_email.php", {
                    email_update: email_update,
                    password_update: password_update,
                    update_email: update_email
                });
            });
        });
    </script>
</head>
<body>
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: HEADER

    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-80" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown active menu-item-80 nav-item"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link" id="menu-item-dropdown-80"><i class="fa fa-bars"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-80" role="menu">
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1147" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-324 current_page_item active menu-item-1147 nav-item"><a title="Host a screening" href="https://www.thesocialdilemma.com/the-film/virtual-tour/host-a-screening/" class="dropdown-item">Host a screening</a></li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-490" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-490 nav-item"><a title="Contact" href="https://www.thesocialdilemma.com/contact/" class="dropdown-item">Contact</a></li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-1151" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1151 nav-item"><a title="Donate" href="https://www.denverfilm.org/social-dilemma/" class="dropdown-item">Donate</a></li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-125" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-125 nav-item"><a title="Press" href="https://www.thesocialdilemma.com/press/" class="dropdown-item">Press</a></li>
                            </ul>
                        </li>
-->

  
 
            <nav class="navbar navbar-expand-md navbar-dark">
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
                       
                        <li class="nav-item active">
                            <a href="#" class="nav-link">HOME</a>
                        </li>
                      
                        <li class="nav-item ">
                            <a href="#" class="nav-link">MY CART</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">TICKETS</a>
                        </li>
                        <!-- checks if session userId is empty-->
                        <?php if(isset($_SESSION['userId'])) : ?>
                                <!-- display users' username -->
                                <li class="nav-item text-uppercase d-flex"> <a data-toggle="modal" data-target=".demo-popup"class="nav-link"><?php echo $_SESSION['userId'];?></a></li>
                                <!-- display users' username -->
                        <?php else: ?> 
                            <li class="nav-item"> <a href="log-in.php" class="nav-link">LOG IN</a></li>';
                        <?php endif ?>
                         <!-- checks if session userId is empty-->
                    </ul>
                    
                </div>
                </div> 
                
            </nav>


<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: HEADER > CAROUSEL
    *MOVIE TITLE SHOULD NOT EXCEED INTO 15 CHARACTERS: .carousel-caption > .row > caption > h1
    *MOVIE SYNOPSYS SHOULD NOT EXCEED INTO 60 CHARACTERS: .carousel-caption > .row > caption > p

-->

    <div id="slides" class="carousel slide" data-ride="carousel">
 
        <ol class="carousel-indicators">   
            
            <li data-target="#slides" data-slide-to="0" class="active"></li>  
            <li data-target="#slides" data-slide-to="1"></li>  
           
        </ol>  
        <div class="carousel-inner">  
            <div class="carousel-item active">    
                <img src="images/header(2).jpg" alt="...." >  
                
                <div class="carousel-caption">
                    <div class="row  p-0 m-0 justify-content-center ">
                        <div  class="caption column align-self-start">
                            <h1 >Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia!</h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ullam magni facilis optio minus voluptate eveniet qui consequatur, eligendi dignissimos enim assumenda perferendis corporis eaque quam inventore eos distinctio cumque. Obcaecati esse, possimus ullam quos aperiam labore ut alias minus deserunt. Consectetur ipsam at vel autem optio delectus, cum nam, voluptatum deleniti repellat, cupiditate dolore.</p>
                        </div>
                        <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-play"></i> TRAILER</button>   
                        <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-plus"></i> ADD TO CART</button>                
                        <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-ticket"></i> CHECK OUT</button>
                        </div>
                </div>
            </div>
            <div class="carousel-item" style="width: 100%">  
                <img src="images/header(5).jpg" alt="....">
                    <div class="carousel-caption">
                        <div class="row  p-0 m-0 justify-content-center ">
                            <div  class="caption column align-self-start">
                                <h1 >Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia!</h1>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ullam magni facilis optio minus voluptate eveniet qui consequatur, eligendi dignissimos enim assumenda perferendis corporis eaque quam inventore eos distinctio cumque. Obcaecati esse, possimus ullam quos aperiam labore ut alias minus deserunt. Consectetur ipsam at vel autem optio delectus, cum nam, voluptatum deleniti repellat, cupiditate dolore.</p>
                            </div>
                            <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-play"></i> TRAILER</button>   
                            <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-plus"></i> ADD TO CART</button>                
                            <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-ticket"></i> CHECK OUT</button>
                        </div>
                    </div>
            </div>  
        </div> 
  
    </div>   
    

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: PRODUCT SLIDER


-->
<div class="product container my-3">
    <div class="d-flex flex-sm-row flex-column justify-content-between">
        <div class="dropdown p-0">
            <button class=" btn btn-lg dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Now Showing
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item disabled" href="#">Now Showing</a>
            <a class="dropdown-item" href="#">Coming Soon</a>

            </div>
            
        </div>
        <div class="search form-inline justify-content-center">
            <input class=" form-control col-10 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary col-2 " type="submit"> <i class="mr-md-3 fa fa-search"></i></button>
        </div>
    </div>

    <!--fetch/display movie description from database-->
    <div class=" mov-list my-3">
            <div class="row justify-content-md-start justify-content-xs-center ">
                <?php 
                require_once 'includes/conn.php';

                $query = "SELECT * FROM `movie_tbl`";
                $query_run = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($query_run))
                    {
                ?>
                            
                <div class="cont col-xl-3 col-lg-2 col-md-4 col-sm-4 col-xs-2 p-1">
                    <div class=" thumbnail d-flex flex-column justify-content-left">
                        <div class="overlay-effect d-flex justify-content-center align-items-center p-1"> 
                            <i class="fa fa-ticket fa-3x"></i>
                        </div>
                            <?php echo '<img class="poster" src="data:image;base64,' .base64_encode($row['movie_poster']).' ">'; ?>
                            <b class="title mx-4"> <?php echo $row['movie_name'];?> </b>
                            <div class="rate d-flex flex-row justify-content-between mx-2 mb-2">
                                <b class="ml-1 float-left"> <i class="fa fa-star mt-1"></i> 3.4</b>
                                <b class="align-self-center"> P<?php echo $row['movie_price']; ?></b>
                            </div> 
                        </div>
                    </div>
                <?php
                     }      
                 ?>
            </div>
        </div> 
    </div>      
    <!--fetch/display movie description from database-->
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: FOOTER
-->  
    <div class="footer container-fluid ">
        <div class="row justify-content-between p-5">
            <div class="block col-xl-4 col-lg-3 m-2">
            <h3>GoBooK</h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia exercitationem eum quis nostrum laborum ut illum reiciendis nihil velit odio aliquam neque laboriosam repellendus doloribus ducimus, officiis distinctio animi iusto.</p>
            </div>
            <div class="contact block col-xl-4 col-lg-3 m-2 ">
                <div class="column m-0 p-0">
                <h3>Contact us</h3>
                <div><i class="fa fa-phone mr-1"></i><a>+8802 2093</a></div>
                <div><i class="fa fa-envelope mr-1 "></i><a>gobook@mail.com</a> </div>
                <div><i class="fa fa-map-marker mr-1 "></i> <a> ABCD Bldg. 2 Ermita, Manila Philippines</a> </div>
            </div>
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
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS 1, LOG OUT
-->
    <div class="modal fade demo-popup " tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered ">
            <div class="modal-content  d-flex justify-content-center div3 p-2">
               
                <div class="d-flex justify-content-end col-12 mt-2">
                    <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
                </div>
                <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">
                    <div  class="d-flex justify-content-center">
                      <img class="pic " src="images/062d93bab28c32b51220eecbc5392ce9.png" alt="">
                    </div>
                    <?php if(isset($_SESSION['userId'])) : ?>
                                <!-- display users' username -->
                                <h1 class="mb-0 mt-2 p-0"><?php echo $_SESSION['userId'];?></h1>
                    <?php endif ?>
                    
                    <a data-toggle="modal" data-target=".demo-popup2"class="m-0 p-0" href="#">Account Settings</a>
                </div>
                <form action="logout.php">
                    <div class="mx-auto mt-3 mb-5 col-lg-8 col-12">
                        <button class="btn btn-default m-0 col-12">LOG OUT</button>
                    </div>
                </form>  
            </div>

                
        </div>
        
    </div>
 <!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS 2, USER INFO
-->
    <div class="modal demo-popup2 " tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered ">
            <div class="modal-content  d-flex justify-content-center div3 p-2">
               
                <div class="d-flex justify-content-end col-12 mt-2">
                    <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
                </div>
                <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">
                    <h1 class="mb-2 mt-2 p-0">ACCOUNT SETTINGS</h1>
                        <div  class="d-flex justify-content-center">
                        <img class="pic " src="images/062d93bab28c32b51220eecbc5392ce9.png" alt="">
                        </div>
                     <?php if(isset($_SESSION['userId'])) : ?>
                                <!-- display users' username -->
                                <h1 class="mb-0 mt-2 p-0"><?php echo $_SESSION['userId'];?></h1>
                    <?php endif ?>
                    <a class="text-center edit" href="#">edit</a>
                </div>
                   
            
                <form class="mx-auto mt-2 col-lg-8 col-12">
                    <label>Your Email</label>
                    <?php if(isset($_SESSION['email'])) : ?>
                                <!-- display users' email -->
                                <input type="text" class="form-control field mt-1" readonly value=<?php echo $_SESSION['email'];?>>
                    <?php endif ?>
                    <a class="float-right" data-dismiss="modal" data-toggle="modal" data-target=".demo-popup4"  href="#">change</a>
                </form>
                <form class="mx-auto mt-2 mb-5 col-lg-8 col-12">
                    <label>Your Password</label>
                    <?php if(isset($_SESSION['password'])) : ?>
                                <!-- display users' password -->
                                <input type="password" class="form-control field mt-1" readonly value=<?php echo $_SESSION['password'];?>>
                    <?php endif ?>
                    <a class="float-right" data-dismiss="modal" data-toggle="modal" data-target=".demo-popup3"  href="#">change</a>
                </form>
            </div>
        </div>
    </div>

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS 1, CHANGE PASSWORD
-->
    <div class="modal demo-popup3 " tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered ">
            <div class="modal-content  d-flex justify-content-center div3 p-2">
                
                <div class="d-flex justify-content-end col-12 mt-2">
                    <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
                </div>
                <h1 class="mb-2 mt-2 p-0">CHANGE YOUR PASSWORD</h1>
                    <form class="mx-auto mt-2 col-lg-10 col-12">
                        <label>Enter Password</label>
                        <input type="password" class="form-control field mt-1 " placeholder="password">
                        <b>You've enter a wrong password</b>
                    </form>
                    <form class="mx-auto mt-2  col-lg-10 col-12">
                        <label>Enter new Password</label>
                        <input type="password" class="form-control field mt-1 " placeholder="new password">
                        <b>Must have at least one uppercase or lower case</b>
                    </form>
                    <form class="mx-auto mt-1 col-lg-10 col-12">
                        <label>Re-enter new Password</label>
                        <input type="password" class="form-control field mt-1 " placeholder="re-enter password">
                        <b>Password did not match</b>
                    </form>
                    <div class="mx-auto mt-3 mb-5 col-lg-10 col-12">
                        <button class="btn btn-default m-0 col-12" data-dismiss="modal" data-toggle="modal" data-target=".demo-popup5">SAVE CHANGES</button>
                    </div>
            </div>
        </div>
    </div>

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS 1, CHANGE EMAIL
-->
<div class="modal demo-popup4 " tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop = "static">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div3 p-2">
            
            <div class="d-flex justify-content-end col-12 mt-2">
                <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
            </div>

            
            <h1 class="mb-2 mt-2 p-0">CHANGE YOUR EMAIL ADDRESS</h1>

            <p class="m-0">Your current email address is</p>
            <?php if(isset($_SESSION['email'])) : ?>
                                <!-- display users' username -->
                                <p class="email m-0"><?php echo $_SESSION['email'];?></p>
                    <?php endif ?>


        <form id = "change_email" method = "post" action = "">     
            <!-- kinukuha yung laman ng email field -->
                <div class="mx-auto mt-2 col-lg-10 col-12">
                    <label>Enter new email address</label>
                    <input id = "email_update" name= "email_update" type="email" class="form-control field mt-1 " placeholder="email address" value = "">
                    <span class = "email-update-error"></span>
                </div>
             <!-- kinukuha yung laman ng password field -->    
                <div class="mx-auto mt-2 col-lg-10 col-12">
                    <label>Enter Password</label>
                    <input id = "password_update" name = "password_update" type="password" class="form-control field mt-1 " placeholder="password" value = "">
                    <b class = "cemail-message"></b>
                    <span class = "email-success"></span>
                </div>
               
                <div class="mx-auto mt-3 mb-5 col-lg-10 col-12">
                    
                    <button type = "submit"  class="btn btn-default m-0 col-12" id = "update_email" name = "update_email">SAVE CHANGES</button>
                    <!-- data-dismiss="modal"  data-toggle="modal" data-target=".demo-popup6" -->
                </div>
            </form>
        </div>
    </div>
</div>


<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS , CHANGE PASSWORD > NOTIFICATION
-->
<div class="modal demo-popup5 " tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div3 p-2">

            <h1 class="mb-2 mt-4 p-0">Password Changed!</h1>
            <p class="mx-5">Please login to GOBOOK using your new password.</p>
            
                <div class="mx-auto mt-3 mb-4 col-lg-10 col-12">
                    <button class="btn btn-default m-0 col-12">LOGIN</button>
                </div>
        </div>
    </div>
</div>


<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ ACCOUNT SETTINGS , CHANGE EMAIL > NOTIFICATION
-->
<div id = "changeEmail-success" class="modal demo-popup6 " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div3 p-2">
            <div class="d-flex justify-content-end col-12 mt-2">
                <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
            </div>
            <h1 class="mb-2 mt-4 p-0">Check your email</h1>
            <p class=" mx-2 px-2" >Please click the link that we sent in the email below to confirm this changes.</p>
            <p class="email m-0 px-2" id="notice">newemail.user12345@gmail.com</p> 
            <a class="mb-4 "href="#">Resend Email</a>
            <a class="mb-5 "href="#">Cancel Changes</a>
        </div>
    </div>
</div>
    
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ PRODUCT OVERVIEW
-->
<div class="modal fade product-overview mdl " id="overview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content  d-flex flex-lg-row justify-content-center  div4 ">

             <!--POSTER-->
            <div class="d-flex justify-content-center col-lg-4 col-12 p-0 m-0 mv-pstr  no-gutters">
                <img src="images/poster(10).jpg" alt="..." class="col-12 imgs">
            </div>
            
            <!--PRODUCT INFO-->
            <div class="prd-inf d-flex flex-column justify-content-start  col-lg-8 col-12 no-gutters mx-auto p-4">
                <div class="mv-info col-12 p-0">  
                        <div class="prd-info">
                        <h1 class="mb-1 ">CAPTAIN MARVEL</h1>
                        <p class="m-0 rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                        <h2 class="mt-1 mb-0">Price:P100.00</h2>
                        <p class="mt-3 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum rem quis ab laborum eligendi, quo repellat dolorem. Ipsa vero nemo obcaecati est velit reprehenderit molestias aspernatur modi, hic laudantium at nostrum autem explicabo deleniti repellat perspiciatis veniam ad sit eum?</p>
                        </div>
                        <button type="button" class="btn btn-outline-secondary m-1 col-12 "  data-toggle="modal" data-target=".product-overview-1"><i class="fa fa-play"></i> TRAILER</button>   
                        <button type="button" class="btn btn-outline-secondary m-1 col-12"><i class="fa fa-plus"></i> ADD TO CART</button>                
                        <button type="button" class="btn btn-outline-secondary m-1 col-12"><i class="fa fa-ticket"></i> CHECK OUT</button>
                </div>  
            </div>
        </div>
    </div>
</div>   

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ TRAILER
-->
<div class="modal product-overview-1 mdl "  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="d-flex justify-content-end col-12 mt-2">
        <i id="close" class="fa fa-close p-4" data-dismiss="modal" aria-hidden="true"></i>
    </div>
    <div class="modal-dialog modal-dialog-centered mt-0 ">
        
        <div class="modal-content  d-flex flex-lg-row justify-content-center  div4 mt-0 ">
            <div class="videowrapper col-12 no-gutters">
                <iframe src="https://www.youtube.com/embed/Z1BCujX3pw8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>   

<!--END-->
<!--END-->
<!--END-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="js/JQuery3.3.1.js"></script>
    <script src="js/lightslider.js"></script>
    <script>
        $(document).ready(function() {
        $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
        });
    </script>
    <script>
        $(document).ready(function() {
        $('#autoWidth-2').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
        });
    </script>
   
  
</body>
</html>
