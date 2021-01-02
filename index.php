<?php 
    session_start();
    include('includes/server.php');
    include('includes/update_username.php');
    include('includes/update_password.php');
    

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

    <!-- for change username -->
    <script>
        $(document).ready(function(){
            $("#change_username").submit(function(event){
                event.preventDefault();
                var username_update = $("#username_update").val();
                var password_forusername = $("#password_forusername").val();
                var update_username = $("#update_username").val();
                $(".cusername-message").load("includes/update_username.php", {
                    username_update: username_update,
                    password_forusername: password_forusername,
                    update_username: update_username
                });
            });
        });
    </script>
    <!-- for change password-->
     <script>
        $(document).ready(function(){
            $("#change_password").submit(function(event){
                event.preventDefault();
                var password_update = $("#password_update").val();
                var password1_update = $("#password1_update").val();
                var password2_update = $("#password2_update").val();
                var update_password = $("#update_password").val();
                $(".cpassword-message").load("includes/update_password.php", {
                    password_update: password_update,
                    password1_update: password1_update,
                    password2_update: password2_update,
                    update_password: update_password
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
                        <a href="index.php">
                            <img class="navbar-brand align-middle mr-3" src="images/gobook_logo-01.png"  alt="GOBOOK"/> 
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle Navigation" >
                    <span  class="fa fa-bars" ></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    
                    
                    <ul class="navbar-nav align-middle ml-auto">
                       
                        <li class="nav-item active">
                            <a href="index.php" class="nav-link">HOME</a>
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
                <div>
                <ol class="carousel-indicators">  
                <?php
                    require_once 'includes/conn.php';
                    $query = "SELECT * FROM `movie_tbl` WHERE `carousel` = 1";
                    $query_run = mysqli_query($db, $query);
                    $active = "active";
                    $count = 0;
                    $active = "active";
                    while($row = mysqli_fetch_array($query_run))
                        {
                ?>
                            <li data-target="#slides" data-slide-to = <?php echo $count; ?> class="<?php echo $active; ?>"></li> 
                <?php
                    $count++; 
                    $active = "";
                    }
                ?>
                </ol> 
                </div>

                    <!-- 
               
                -->
            <!-- fetch and display movies that has a value of 1(true) from carousel column in database -->
            <div class="carousel-inner">  
                <?php 
                    require_once 'includes/conn.php';
                    $query = "SELECT * FROM `movie_tbl` WHERE `carousel` = 1";
                    $query_run = mysqli_query($db, $query);
                    $active = "active";
                    while($row = mysqli_fetch_array($query_run))
                        {
                    ?>    
                        <div class="carousel-item <?php echo $active;?>">    
                            <?php echo '<img src="data:image;base64,' .base64_encode($row['banner']).' ">'; ?>         
                            <div class="carousel-caption active">
                                <div class="row  p-0 m-0 justify-content-center ">
                                    <div  class="caption column align-self-start">
                                        <h1 ><?php echo $row['movie_name']; ?></h1>
                                        <p><?php echo $row['movie_desc']; ?></p>
                                    </div>
                                    <button id = '<?php echo $row["movie_id"]?>' type="button" data-toggle="modal" data-target=".product-overview-1" class="movie_trailer  btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-play"></i> TRAILER</button>   
                                    <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-plus"></i> ADD TO CART</button>                
                                    <button type="button" class="btn btn-outline-secondary m-1 col-lg-3 col-md-12 "><i class="fa fa-ticket"></i> CHECK OUT</button>
                                </div>
                            </div>
                        </div>
                    <?php
                        $active = ""; 
                        } 
                    ?>
                <!-- end -->
            </div> 
        </div>
    

<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: PRODUCT SLIDER


-->
<div class="product container my-3">

    <div class="d-flex flex-sm-row flex-column justify-content-between">
            <?php if(!isset($_POST['search-btn'])): ?>
                <div class="dropdown p-0">
                    <button class=" btn btn-lg dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Now Showing
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item disabled" href="#">Now Showing</a>
                    <a class="dropdown-item" href="#">Coming Soon</a>
                    </div>
                </div>
            <?php else:?>
                <h3>
                    Result movie search
                </h3>
            <?php endif; ?>
        <div class="ml-auto search form-inline justify-content-center">
            <form method = "post" action="">
                <input name = "search-keyword" class= "form-control col-10 " type="search" placeholder="Search" aria-label="Search">
                <button name = "search-btn" class="btn btn-outline-secondary col-2 " type="submit"> <i class="mr-md-3 fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <!--fetch/display movie description from database-->
    <?php if(!isset($_POST['search-btn'])) :?>
        <div class=" mov-list my-3">
                <div class="row justify-content-md-start justify-content-xs-center ">
                    <?php 
                    require_once 'includes/conn.php';

                    $query = "SELECT * FROM `movie_tbl`";
                    $query_run = mysqli_query($db, $query);

                    while($row = mysqli_fetch_array($query_run))
                        {
                    ?>                 
                    <div id = '<?php echo $row["movie_id"]?>' data-dismiss="modal" data-toggle="modal" data-target=".product-overview" class="movie_trailer view_data cont col-xl-3 col-lg-2 col-md-4 col-sm-4 col-xs-2 p-1">
                        <div class=" thumbnail d-flex flex-column justify-content-left">
                            <div class="overlay-effect d-flex justify-content-center align-items-center p-1"> 
                                <i class="fa fa-ticket fa-3x"></i>
                            </div>
                            <div class="poster">
                                <?php echo '<img class="post col-12 p-0" src="data:image;base64,' .base64_encode($row['movie_poster']).' ">'; ?>
                            </div>
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
    <?php endif; ?>      
    <!--end-->

    <!-- displays movies according to user keyword input -->
    <?php if(isset($_POST['search-btn'])) :?>
        <div class=" mov-list my-3">
                <div class="row justify-content-md-start justify-content-xs-center ">
                    <?php 
                    require_once 'includes/conn.php';

                    $str = $_POST['search-keyword'];

                    $query = "SELECT * FROM `movie_tbl` WHERE `movie_name` LIKE '%{$str}%'";

                    $query_run = mysqli_query($db, $query);
                    $count = mysqli_num_rows($query_run);

                    //checks if entered keyword is existing in the database
                    if($count == 0){
                        ?>
                            <p class="not-found-mes">Sorry, no movie matched the keyword "<?php echo $str;?>"</p>
                        <?php
                    }
                    else{
                        while($row = mysqli_fetch_array($query_run))
                            {
                        ?>                 
                        <div id = '<?php echo $row["movie_id"]?>' data-dismiss="modal" data-toggle="modal" data-target=".product-overview" class="movie_trailer view_data cont col-xl-3 col-lg-2 col-md-4 col-sm-4 col-xs-2 p-1">
                            <div class=" thumbnail d-flex flex-column justify-content-left">
                                <div class="overlay-effect d-flex justify-content-center align-items-center p-1"> 
                                    <i class="fa fa-ticket fa-3x"></i>
                                </div>
                                <div class="poster">
                                    <?php echo '<img class="post col-12 p-0" src="data:image;base64,' .base64_encode($row['movie_poster']).' ">'; ?>
                                </div>
                                    <b class="title mx-4"> <?php echo $row['movie_name'];?> </b>
                                    <div class="rate d-flex flex-row justify-content-between mx-2 mb-2">
                                        <b class="ml-1 float-left"> <i class="fa fa-star mt-1"></i> 3.4</b>
                                        <b class="align-self-center"> P<?php echo $row['movie_price']; ?></b>
                                    </div> 
                                </div>
                            </div>
                            <?php
                            }    
                        }  
                        ?>
                    </div>
                </div> 
        </div>
    <?php endif; ?>  
    <!--end-->

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
                <div><i class="fa fa-envelope mr-1 "></i><a>gobook.scrum@gmail.com</a> </div>
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
                    <a class="text-center edit" data-dismiss="modal" data-toggle="modal" data-target=".demo-popup7" href="#">edit</a>
                </div>
                   
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
    SCOPE: MODAL/ CHANGE USERNAME
-->
<div class="modal demo-popup7 " tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div3 p-2">
           
            <div class="d-flex justify-content-end col-12 mt-2">
                <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
            </div>
            <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">
                <h1 class="mb-2 mt-2 p-0">CHANGE USERNAME</h1>
                <div  class="d-flex justify-content-center">
                    <img class="pic " src="images/062d93bab28c32b51220eecbc5392ce9.png" alt="">
                <!-- display users' username -->
                <p class="m-0">Your current username is</p>
                    <?php if(isset($_SESSION['userId'])) : ?>
                                <p class="email m-0"><?php echo $_SESSION['userId'];?></p>
                    <?php endif ?>
                </div>
                <!-- kinukuha lamang ng username field for new username -->
                    <form class="mx-auto mt-2  col-lg-10 col-12">
                        <label>Enter new Username</label>
                        <input type="text" class="form-control field mt-1 " placeholder="new username" id="username_update" name="username_update">
                        
                    </form>
                <!-- kinukuha password -->
                <div class="mx-auto mt-2 col-lg-10 col-12">
                    <label>Enter Password</label>
                    <input id = "password_forusername" name = "password_forusername" type="password" class="form-control field mt-1 " placeholder="password" value = "">
                    <b class = "cusername-message"></b>
                </div>
                    <form id = "change_username" method = "post" action = "">    
                    <div class="mx-auto mt-3 mb-5 col-lg-10 col-12">
                        <button class="btn btn-default m-0 col-12"  id = "update_username" name = "update_username" type ="submit" >SAVE CHANGES</button>
                    </div>
                </form>
            </div>
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
                        <input type="password" class="form-control field mt-1 " placeholder="password" id= "password_update" name ="password_update">
                        
                    </form>
                    <form class="mx-auto mt-2  col-lg-10 col-12">
                        <label>Enter new Password</label>
                        <input type="password" class="form-control field mt-1 " placeholder="new password" id="password1_update" name="password1_update">
                        
                    </form>
                    <form class="mx-auto mt-1 col-lg-10 col-12">
                        <label>Re-enter new Password</label>
                        <input type="password" class="form-control field mt-1 " placeholder="re-enter password" id="password2_update" name="password2_update">
                        <b class = "cpassword-message"></b>
                    </form>
                    <form id = "change_password" method = "post" action = "">    
                    <div class="mx-auto mt-3 mb-5 col-lg-10 col-12">
                        <button class="btn btn-default m-0 col-12"  id = "update_password" name = "update_password" type ="submit">SAVE CHANGES</button>
                    </div>
                    </form>
                    <!-- data-dismiss="modal" data-toggle="modal" data-target=".demo-popup5"  -->
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
    SCOPE: MODAL/ PRODUCT OVERVIEW
-->
<div class="modal fade product-overview mdl" id="overview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
            <!-- displays movie_details from movie detail id, defined in product_overview.php -->
            <div id = "movie_detail" class="modal-content  d-flex flex-lg-row justify-content-center  div4 ">
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
        <!-- displays movie trailer from movie-content id, defined in product_overview.php -->
        <div class="modal-content  d-flex flex-lg-row justify-content-center  div4 mt-0 ">
            <div id = "trailer" class="videowrapper col-12 no-gutters">
                
            </div>
        </div>
    </div>
</div>   
    
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: MODAL/ CHANGE PICTURE
-->
<div class="modal demo-popup8 " tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center div3 p-2">
            <div class="d-flex justify-content-end col-12 mt-2">
                <i class="fa fa-close pr-3" data-dismiss="modal" aria-hidden="true"></i>
            </div>
                <div class="top d-flex flex-column justify-content-center col-lg-8 col-12 mx-auto p-0">
                    <h1 class="mb-2 mt-2 p-0">CHANGE PICTURE</h1>
                </div>
                  <div class = "container">
                      <div class ="row col-12 mx-auto" >
                          <div class ="col-12 form-div ">
                              <form action ="index.php" method ="post" enctype ="multipart/form-data" class="col-12 mx-auto ">
                                      <div class="form-group column col-12 mx-auto justify-content-center">
                                          <div  class="d-flex justify-content-center">
                                              <img  id="profileDisplay" src="images/sign-up-bg.jpg" alt="">
                                          </div>
                                          <label for="profileImage" class="text-center col-12 mx-auto mt-2 ">Profile Image</label>
                                          <input type ="file" name='profileImage' id="profileImage" style="display: none;">
                                          <button type ="submit" name="save-user" class="btn mx-auto mt-3 col-12">Save Changes</button>
                                      </div>
                                       
                              </form>
                          </div>
                      </div>
                  </div>
        </div>
    </div>
  </div>
  

<!--END-->
<!--END-->
<!--END-->
    
    <!-- fetch and display product overview -->
    <script>
        $(document).ready(function(){
            $('.view_data').click(function(){
                var movie_id = $(this).attr("id");
                $.ajax({
                    url: "includes/product_overview.php",
                    method: "post",
                    data: {movie_id: movie_id},
                    success:function(data){
                        $('#movie_detail').html(data);
                    }
                });
            });
        });
    </script>

    <!-- fetch and display product overview movie trailer-->
    <script>
        $(document).ready(function(){
            $('.movie_trailer').click(function(){
                var movie_id1 = $(this).attr("id");
                $.ajax({
                    url: "includes/product_overview.php",
                    method: "post",
                    data: {movie_id1: movie_id1},
                    success:function(data){
                        $('#trailer').html(data);
                    }
                });
            });
        });
    </script>

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
