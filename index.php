<?php 
    session_start();
    include('includes/server.php');

    if(!isset($_SESSION['userId'])){
         $_SESSION['usertype'] = 'member';
    }
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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/home-stylesheet.css">
    
  

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
                        <?php if(isset($_SESSION['userId'])) : ?>
                                    <li class="nav-item text-uppercase d-flex"> <a href="#" class="nav-link"><?php echo $_SESSION['userId'];?></a></li>
                                    <li class="nav-item"> <a href="logout.php" class="nav-link">LOG OUT</a></li> 
                        <?php else: ?> 
                            <li class="nav-item"> <a href="log-in.php" class="nav-link">LOG IN</a></li>';
                            <li class="nav-item"> <a href="sign-up.php" class="nav-link">SIGN UP</a></li>';
                        <?php endif ?>
                        
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
