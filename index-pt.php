<?php 
    session_start();
    include('includes/validation-login.php');
    include('includes/server.php');
    if(!isset($_SESSION['userId'])){
         $_SESSION['usertype'] = 'member';
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
    <link  rel="stylesheet" href="css/lightslider.css">
  

</head>
<body>
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: HEADER
-->

  
 
            <nav class="navbar navbar-expand-lg navbar-dark p-sm-3">
                <div class="container">
                    <div class="row ">
                        <img class="navbar-brand align-middle mr-3" src="images/gobook_logo-01.png"  alt="GOBOOK"/>
                           
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle Navigation" >
                    <span  class="navbar-toggler-icon" ></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <i class="search-icon fa fa-search fa-1x"></i>
                    <input class="align-middle" type="text"  name="search" placeholder="Search.."> 
                    
                    <ul class="navbar-nav align-middle ml-auto">
                       
                        <li class="nav-item active">
                            <a href="#" class="nav-link">HOME</a>
                        </li>
                      
                        <li class="nav-item ">
                            <a href="#" class="nav-link">MY CART</a>
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

    *IT SHOULD HAVE AT LEAST 5 THUMBNAILS
    !!!!!!! FOR ADMIN
    <i class="admin fa fa-edit fa-5x"></i>
    !!!!!!! FOR CUSTOMER
    <i class="customer fa fa-ticket fa-5x"></i>
-->                    
    <div class="product-slider col-12 p-5">
        <div class="row justify-content-between">
        <h1>NOW SHOWING </h1>
        <?php if($_SESSION['usertype'] == 'admin') : ?>
            <button id="hideoncustomer" type="button"  class="btn btn-outline-primary"><i class="fa fa-plus"></i> ADD NEW</button>
        <?php else : ?> 
            <button id="hideoncustomer" type="button"  class="btn btn-outline-primary"><i class="fa fa-plus"></i> SEE ALL</button>
        <?php endif ?> 
        </div>
        <ul id="autoWidth" class="cs-hidden">
            <li class="item-a">
                <div class="box">
                    <!--IMAGE BOX-->
                    <div class="slide-img">
                        <img src="images/poster(1).jpg" alt="...">
                        <div class="overlay-effect"> 
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                    </div>
                    <!--DETAIL BOX-->
                    <div class="detail-box">
                        <!--TYPE-->
                        <div class="type col-10 m-0 p-0">
                            <!--DETAIL BOX-->
                            <a href="#">GODZILLA</a>
                        </div>
                        <div class="col-2 ">
                        <a href="#" class="price">P250</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>


        <div class="row justify-content-between">
            <h1>COMING SOON</h1>
            <?php if($_SESSION['usertype'] == 'admin') : ?>
            <button id="hideoncustomer" type="button"  class="btn btn-outline-primary"><i class="fa fa-plus"></i> ADD NEW</button>
            <?php else :?> 
                <button id="hideoncustomer" type="button"  class="btn btn-outline-primary"><i class="fa fa-plus"></i> SEE ALL</button>
            <?php endif ?> 
        
        </div>
        <ul id="autoWidth-2" class="cs-hidden">
            <li class="item-a">
                
                <div class="box">
                    <!--IMAGE BOX-->
                    <div class="slide-img">
                        <img src="images/poster(1).jpg" alt="...">
                        <div class="overlay-effect"> 
                            <i class="customer fa fa-ticket fa-5x"></i>
                        </div>
                    </div>
                    <!--DETAIL BOX-->
                    <div class="detail-box">
                        <!--TYPE-->
                        <div class="type col-10 m-0 p-0">
                            <!--DETAIL BOX-->
                            <a href="#">GODZILLA</a>
                        </div>
                        <div class="col-2 ">
                        <a href="#" class="price">P250</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="item-b">
                
                <div class="box">
                    <!--IMAGE BOX-->
                    <div class="slide-img">
                        <img src="images/poster(2).jpg" alt="...">
                        <div class="overlay-effect"> 
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                    </div>
                    <!--DETAIL BOX-->
                    <div class="detail-box">
                        <!--TYPE-->
                        <div class="type col-10 m-0 p-0">
                            <!--DETAIL BOX-->
                            <a href="#">GODZILLA</a>
                        </div>
                        <div class="col-2 ">
                        <a href="#" class="price">P250</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="item-c">
                
                <div class="box">
                    <!--IMAGE BOX-->
                    <div class="slide-img">
                        <img src="images/poster(3).jpg" alt="...">
                        <div class="overlay-effect"> 
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                    </div>
                    <!--DETAIL BOX-->
                    <div class="detail-box">
                        <!--TYPE-->
                        <div class="type col-10 m-0 p-0">
                            <!--DETAIL BOX-->
                            <a href="#">GODZILLA</a>
                        </div>
                        <div class="col-2 ">
                        <a href="#" class="price">P250</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="item-d">
                
                <div class="box">
                    <!--IMAGE BOX-->
                    <div class="slide-img">
                        <img src="images/poster(4).jpg" alt="...">
                        <div class="overlay-effect"> 
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                    </div>
                    <!--DETAIL BOX-->
                    <div class="detail-box">
                        <!--TYPE-->
                        <div class="type col-10 m-0 p-0">
                            <!--DETAIL BOX-->
                            <a href="#">GODZILLA</a>
                        </div>
                        <div class="col-2 ">
                        <a href="#" class="price">P250</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="item-e">
                
                <div class="box">
                    <!--IMAGE BOX-->
                    <div class="slide-img">
                        <img src="images/poster(5).jpg" alt="...">
                        <div class="overlay-effect"> 
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                    </div>
                    <!--DETAIL BOX-->
                    <div class="detail-box">
                        <!--TYPE-->
                        <div class="type col-10 m-0 p-0">
                            <!--DETAIL BOX-->
                            <a href="#">GODZILLA</a>
                        </div>
                        <div class="col-2 ">
                        <a href="#" class="price">P250</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
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
    <script>
        $(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        });
            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }
    </script>

</body>
</html>