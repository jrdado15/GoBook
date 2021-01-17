<?php

require_once "conn.php";


if(isset($_POST["cinema"])){
    session_start();
    $mall_name = $_POST["cinema"];
    $movie_id = $_SESSION['movie_id'];

    $query = "SELECT * FROM screening_tbl WHERE movie_id = '$movie_id' AND mall_name = '$mall_name' ";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)){
    
    $output = '';
       $output .= ' <!-- TYPE -->
                <select class="form-control col-md-4 col-12 p-0 px-md-1" >
                <option value = "">Quality</option>';
                while($row = mysqli_fetch_array($result)){  
                    $output .= '<option value = "'.$row["quality"].'">'.$row["quality"].'</option>';
                }
                $output .=
                '</select> 
                <!-- **** -->
                <!-- DATE --><!-- TIME -->
                <select name = "date_opt" id = "date_opt"  class="form-control col-md-4 col-12 p-0 ml-5 px-md-1">
                    <option value = "sadasdas">Date - Time</option>
                    ';
                    $query = "SELECT * FROM screening_tbl WHERE movie_id = '$movie_id' AND mall_name = '$mall_name' ";
                    $result = mysqli_query($db, $query);                
                    while($row = mysqli_fetch_array($result)){  
                        $output .= '<option value = "'.$row["scr_id"].'">'.$row["date"].' - '.$row["time"].'</option>';
                    }
                    $output .='</select>';

    echo $output;
    }
}

if(isset($_POST["date_id"])){

    $scr_id = $_POST["date_id"];

    $output = '';

       $output .= '  <h2 class="mt-3">Choose your seats:</h2>
       <div class=" row col-12 mt-1 mx-auto">
           <div class="row col-4 p-0 mx-auto justify-content-center">
               <div class="seat available"></div>
               <label class="my-auto ml-1">Available</label>
           </div>
           <div class="row col-4 p-0 mx-auto justify-content-center">
               <div class="seat taken"></div>
               <label class="my-auto ml-1">Taken</label>
           </div>
           <div class="row col-4 p-0 mx-auto justify-content-center">
               <div class="seat selected"></div>
               <label class="my-auto ml-1">Selected</label>
           </div>
       </div>
       <!-- SCREEN -->
       <div class="screen col-md-10 col-12 mt-3 mx-auto"></div>

       <!-- SEATS -->
       <div class="row col-12 p-0 mt-5  mx-auto">
                   
           <!-- LOWER SEATS -->
           <div class="seats column justify-content-betwwen col-12 mt-1 p-0">
               <!-- A ROW -->
               <div class=" row col-12 p-0 gx-2 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">A</h3> 
                       <div class="seat invisible"></div>
                       <div class="seat invisible"></div>
                       <div class="seat invisible"></div>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'A' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'A' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'A' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <div class="seat invisible"></div>
                       <div class="seat invisible"></div>
                       <div class="seat invisible"></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">A</h3> 
                   </div>
               </div>
               <!-- B ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end"> 
                       <h3 class="m-0 p-0 mr-2 align-self-end">B</h3> 
                       <div class="seat invisible"></div>
                       <div class="seat invisible"></div>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'B' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'B' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'B' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <div class="seat invisible"></div>
                       <div class="seat invisible"></div>
                       <h3 class="m-0 p-0 ml-2 align-self-end">B</h3> 
                   </div>
               </div>
               <!-- C ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end"> 
                       <h3 class="m-0 p-0 align-self-end mr-2">C</h3> 
                       <div class="seat invisible"></div>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'C' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'C' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'C' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <div class="seat invisible"></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">C</h3>
                   </div>
               </div>
               <!-- D ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">D</h3> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">D</h3> 
                   </div>
               </div>
               <!-- E ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">E</h3> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">E</h3> 
                   </div>
               </div>

           </div>

           <!-- UPPER SEATS -->
           <div class="seats column justify-content-betwwen col-12 mt-3 p-0">
               <!-- F ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end"> 
                       <h3 class="m-0 p-0 align-self-end mr-2">F</h3>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">F</h3>
                   </div>
               </div>
               <!-- G ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">G</h3> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">G</h3>
                   </div>
               </div>
               <!-- H ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end"> 
                       <h3 class="m-0 p-0 align-self-end mr-2">H</h3>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">H</h3>
                   </div>
               </div>
               <!-- I ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">I</h3> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">I</h3>
                   </div>
               </div>
               <!-- J ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">J</h3>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat taken"></div>
                       <div class="seat taken"></div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <div class="seat "></div>
                       <h3 class="m-0 p-0 align-self-end ml-2">J</h3>
                   </div>
               </div>

               <!-- SEAT NUMBER -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <div class="num">01</div>
                       <div class="num">02</div>
                       <div class="num">03</div>
                       <div class="num">04</div>
                       <div class="num">05</div>
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center"> 
                       <div class="num">06</div>
                       <div class="num">07</div>
                       <div class="num">08</div>
                       <div class="num">09</div>
                       <div class="num">10</div>
                       <div class="num">11</div>
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start"> 
                       <div class="num">12</div>
                       <div class="num">13</div>
                       <div class="num">14</div>
                       <div class="num">15</div>
                       <div class="num">16</div>
                   </div>
               </div>

           </div>
       </div>  
<!-- ******* -->

<!-- PAYMENT -->
       <h2 class="mt-3">Choose your payment method:</h2>
       <div  class="pay_method col-12 mx-auto my-2 ">

           <div class="col-12 row mx-auto justify-content-center mt-0 px-2">
                   <div class="col-md-3 col-4 p-1 "><button class="btn pay_icon active"><img src="images/gcash.png" alt=""></button></div>
                   <div class="col-md-3 col-4 p-1" ><button class="btn pay_icon"><img src="images/paypal.png" alt=""></button></div>
                   <div class="col-md-3 col-4 p-1"><button class="btn pay_icon"><img src="images/master.png" alt=""></button></div>
           </div>
       
       </div>
       <div class="col-12 row  mt-2">
           <div class="form-group col-md-6  col-12 mx-auto p-1">
               <label>Account Name:</label>
               <input class="form-control form-control-md py-0 pay-info" type="text" placeholder="">    
           </div>
       
           <div class="form-group col-md-6 col-12 mx-auto p-1">
               <label>Account Number:</label>
               <input class="form-control form-control-md py-0 pay-info" type="text" placeholder="">    
           </div>

           <button class="btn btn-default col-12 mx-auto">Proceed</button>
       </div>
<!-- ********* -->
</div>
   
</div>
<!-- ********* -->




</div>';

    echo $output;
 }

if(isset($_POST["seat_id"])){
    // $reserved_seats = array();
    // $seats = $_POST["seat_id"];
    // $reserved_seats = array();
     
    // $count = 3;


    // for($i = 0; $i <= $count; $i++){
    //     $reserved_seats[$i] = $seats;
    // }
    
    // print_r($reserved_seats);
}

?>
