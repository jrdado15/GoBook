<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
    <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1587270922/datepicker/datedropper.css" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout-stylesheet.css">
</head>
<body>
<!--
    NOTES
    BY: RHEMA MIRANDA
    SCOPE: NAVIGATION BAR
-->

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
                <a data-toggle="modal" data-target=".demo-popup" class="nav-link">LOG IN</a>
            </li>
            
        </ul>
        
    </div>
    </div> 
    
</nav>


<!-- CONFIRMATION PAGE -->
    <div class="container-fluid col-md-10 col-12 py-3 px-lg-5 px-0 m-auto d-flex flex-column justify-content-center co-cont ">

    <h1 class="mx-auto" id="oc-t">Order Confirmation</h1>
    <!-- TICKET DIV  -->
        <div class=" col-md-10 col-8 p-1 row mb-auto mx-auto">
            <div class="col-xl-6  col-md-8 col-12 left-div p-0 row align-items-start mx-auto" id="cp" >
                <!-- MOVIE POSTER  -->
                <img src="images/poster(2).jpg" alt="..." class="post2 col-12 m-0 p-0">

                 <!-- MOVIE INFO DIV  -->
                <div class="info px-4 m-0 my-1 column">
                    <h1 class="text-left mt-2 mb-0">Captain Marvel</h1>
                    <h2 class="mb-0">SM Manila Cinema, Cinema 1</h2>
                    <h1 class="m-0">3D</h1>
                </div>
                <div class="row col-12 m-auto px-4">
                    <h3 class="p-0 m-0 col-6">Date: </h3>
                    <p class="m-0 col-6 text-right mb-2">Thurs, Oct 27,2021</p>
                </div>
                <div class="row col-12 m-auto px-4">
                    <h3 class="p-0 m-0 col-6">Seat: </h3>
                    <p class="m-0 col-6 text-right mb-2">A-10, A-9, A-8</p>
                </div>
                <div class="row col-12 m-auto px-4">
                    <h3 class="p-0 m-0 col-6">Time: </h3>
                    <p class="m-0 col-6 text-right mb-2">12:00 AM</p>
                </div>
                <div class="row col-12 m-auto px-4">
                    <h3 class="p-0 m-0 col-6"> Mode of Payment: </h3>
                    <p class="m-0 col-6 text-right mb-2">Gcash</p>
                </div>
                <div class="row col-12 m-auto px-4 ">
                    <h3 class="p-0 m-0 col-6"> Account Name: </h3>
                    <p class="m-0 col-6 text-right mb-2">José Protacio Rizal Mercado y Alonso Realonda</p>
                </div>
                <div class="row col-12 m-auto px-4">
                    <h3 class="p-0 m-0 col-6"> Account Number: </h3>
                    <p class="m-0 col-6 text-right">123467890291</p>
                </div>
                <!-- ********* -->                    
                <div class="line col-12 my-1 p-0 m-0 row"> 
                    <div class="dash col-12 align-self-center"></div>
                </div>

                <!-- PAYMENT INFO DIV  -->
                <div class="info col-12 px-4 mx-auto mb-1 mt-4 column">
                    <div class="row col-12 m-auto p-0 ">
                        <h3 class="p-0 m-0 col-4"> Ticket No.: </h3>
                        <p class="m-0 col-8 text-right">1234567907</p>
                    </div>
                    <div class="row col-12 m-auto p-0 ">
                        <h3 class="p-0 m-0 col-4"> Price: </h3>
                        <p class="m-0 col-8 text-right">P200.00</p>
                    </div>
                    <div class="row col-12 m-auto p-0 ">
                        <h3 class="p-0 m-0 col-4"> Quantity: </h3>
                        <p class="m-0 col-8 text-right">2</p>
                    </div>
                    <div class="row col-12 m-auto p-0 ">
                        <h3 class="p-0 m-0 col-4"> Total: </h3>
                        <p class="m-0 col-8 text-right">P400.00</p>
                    </div>
                    
                </div>
                <!-- ********* -->  
                <!-- BUTTONS  -->
                <button class="btn cancel mb-1 mx-auto col-10 p-1">cancel</button>
                <button class="btn btn-default  mb-4 mx-auto col-10 p-1" data-toggle="modal" data-target=".demo-popup">Place Order</button>
                <!-- ********* -->  
            </div>
        </div>
    <!-- ********* -->




    </div>
<!-- ********* -->

<!-- MODAL -->
<div class="modal demo-popup " tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content  d-flex justify-content-center p-5">
            <img src="images/icons8-ticket-confirmed-100 (1).png" alt="..." class="col-3 mx-auto p-0">
            <h1 class="mx-auto mt-4">You've successfully booked a movie!</h1>
            <p class="mx-auto">You'll be receiving an email with order details.</p>
            <div class="col-12 row mx-auto">
                <div class="col-6 p-1">
                    <button class="btn btn-default  col-12" >Back to Home</button>
                </div>
                <div class="col-6 p-1">
                    <button class="btn btn-default  col-12" >View Order</button>
                </div>
            </div>
        </div>

            
    </div>
</div>
<!-- ********* -->

<!-- FOOTER -->
<div class="footer container-fluid col-10 mx-auto">
    <div class="row justify-content-between p-5">
        <div class="block col-xl-4 col-lg-3 m-2">
        <h3>GoBooK</h3>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia exercitationem eum quis nostrum laborum ut illum reiciendis nihil velit odio aliquam neque laboriosam repellendus doloribus ducimus, officiis distinctio animi iusto.</p>
        </div>
        <div class="contact block col-xl-4 col-lg-3 m-2 ">
            <div class="column m-0 p-0">
            <h3>Contact us</h3>
            <div><i class="fa fa-phone mr-1"></i><span>+8802 2093</span></div>
            <div><i class="fa fa-envelope mr-1 "></i><span>gobook@mail.com</span></div>
            <div><i class="fa fa-map-marker mr-1 "><span>ABCD Bldg. 2 Ermita, Manila Philippines</span></i></div>
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
<!-- ********* -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>

    
</body>
</html>
