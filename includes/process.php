<?php

require_once "conn.php";

$count = array();
$reserved_seats = array();

$reserved_seats = array();
$_SESSION['reserved_seats'] = $reserved_seats;

//** Display and select movie screening time and date*/
if(isset($_POST["cinema"])){
    session_start();

   
  
    $mall_name = $_POST["cinema"];
    $movie_id = $_SESSION['movie_id'];

    unset($_SESSION["scr_id"] );
    unset($_SESSION['reserved_seats']);
    unset($_SESSION['count']);
    $_SESSION['count'] = 0;

    $query = "SELECT * FROM screening_tbl WHERE movie_id = '$movie_id' AND mall_name = '$mall_name' ";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)){
    
    $output = '';
       $output .= '<!-- DATE --><!-- TIME -->
                <select name = "date_opt" id = "date_opt" style="width: 100%;"  class="form-control">
                    <option value = "sadasdas">Date - Time - Quality</option>
                    ';
                    $query = "SELECT * FROM screening_tbl WHERE movie_id = '$movie_id' AND mall_name = '$mall_name' ";
                    $result = mysqli_query($db, $query);                
                    while($row = mysqli_fetch_array($result)){  
                        $output .= '<option value = "'.$row["scr_id"].'">'.$row["date"].' - '.$row["time"].' - '.$row["quality"].'</option>';
                    }
                    $output .='</select>';

    echo $output;
    }
}
//********* */

//** Display seats according to screening date and time that was selected and select seats*/
if(isset($_POST["date_id"])){

    session_start();
    $scr_id = $_POST["date_id"];
    $_SESSION["scr_id"] = $_POST["date_id"];

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
                       ';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'D' AND seat_group = '1'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'D' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'D' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <h3 class="m-0 p-0 align-self-end ml-2">D</h3> 
                   </div>
               </div>
               <!-- E ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">E</h3>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'E' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'E' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'E' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <h3 class="m-0 p-0 align-self-end ml-2">E</h3> 
                   </div>
               </div>

           </div>

           <!-- UPPER SEATS -->
           <div class="seats column justify-content-betwwen col-12 mt-3 p-0">
               <!-- F ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end"> 
                       <h3 class="m-0 p-0 align-self-end mr-2">F</h3>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'F' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'F' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'F' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <h3 class="m-0 p-0 align-self-end ml-2">F</h3>
                   </div>
               </div>
               <!-- G ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">G</h3>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'G' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'G' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'G' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <h3 class="m-0 p-0 align-self-end ml-2">G</h3>
                   </div>
               </div>
               <!-- H ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end"> 
                       <h3 class="m-0 p-0 align-self-end mr-2">H</h3>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'H' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'H' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'H' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <h3 class="m-0 p-0 align-self-end ml-2">H</h3>
                   </div>
               </div>
               <!-- I ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">I</h3>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'I' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'I' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'I' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                       <h3 class="m-0 p-0 align-self-end ml-2">I</h3>
                   </div>
               </div>
               <!-- J ROW -->
               <div class=" row col-12 p-0 gx-2 mt-1 mx-auto">
                   <div class="side row col-4 ll p-0  mx-auto justify-content-end">
                       <h3 class="m-0 p-0 align-self-end mr-2">J</h3>';
                       $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'J' AND seat_group = '1'";
                       $result = mysqli_query($db, $query);
                       while($row = mysqli_fetch_array($result)){
                   
                       $output .='
                       <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                       }
                       $output .='
                   </div>

                   <div class="side row col-4 rr p-0 mx-auto justify-content-center">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'J' AND seat_group = '2'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
                   </div>
                   
                   <div class="side row col-4 ll p-0 mx-auto justify-content-start">';
                        $query = "SELECT * FROM seat_tbl WHERE scr_id = '$scr_id' AND row = 'J' AND seat_group = '3'";
                        $result = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($result)){
                    
                        $output .='
                        <div class="seat'; if($row['status'] == "available"){$output .=' status"';} else{$output .=' taken"';} $output .='id = "'.$row['seat_id'].'"></div>';
                        }
                        $output .='
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
                   <div class="col-md-3 col-4 p-1 "><button id = "gcash" class="pm btn pay_icon"><img src="images/gcash.png" alt=""></button></div>
                   <div class="col-md-3 col-4 p-1" ><button id = "paypal" class="pm btn pay_icon"><img src="images/paypal.png" alt=""></button></div>
                   <div class="col-md-3 col-4 p-1"><button id = "mastercard" class="pm btn pay_icon"><img src="images/master.png" alt=""></button></div>
           </div>
       </div>
       <div class="col-12 row  mt-2">
           <div class="form-group col-md-6  col-12 mx-auto p-1">
               <label>Account Name:</label>
               <input id = "acc_name" name = "acc_name" class="form-control form-control-md py-0 pay-info" type="text" placeholder="">    
           </div>
       
           <div class="form-group col-md-6 col-12 mx-auto p-1">
               <label>Account Number:</label>
               <input id = "acc_num" name = "acc_num" class="form-control form-control-md py-0 pay-info" type="text" placeholder="">    
           </div>
           <div class = "pb-3" id = "message">
           </div>
            <form id = "proceed_btn" name = "proceed_btn" class="btn-default btn col-12 mx-auto">
                <button class = "btn-default btn col-12 mx-auto" type = "submit" >Proceed</button>
            </form>
       </div>
<!-- ********* -->
</div>
   
</div>
<!-- ********* -->

</div>';

    echo $output;
 }

//** ************ */
 
//** stores selected seats id in an array */
if(isset($_POST["seat_id"])){
    session_start();

    if(isset($_SESSION['reserved_seats'])){
       
        //search seat id if it is existing inside the array if not it will be stored in the array
        $key = array_search($_POST["seat_id"], $_SESSION['reserved_seats']);
        if($key !== false ){
            unset($_SESSION['reserved_seats'][$key]);
        } 
        else{
            $_SESSION['reserved_seats'][$_SESSION['count']] = $_POST["seat_id"];
            $_SESSION['count'] = $_SESSION['count'] +  1; 
        }
        //End
    }
    else{
        $_SESSION['reserved_seats'][$_SESSION['count']] = $_POST["seat_id"];
        $_SESSION['count'] = $_SESSION['count'] +  1;  
    }

    print_r($_SESSION['reserved_seats']);
}


//** ************ */

if(isset($_POST["paymethod"])){
    session_start();
    
    $_SESSION["paymethod"] = $_POST["paymethod"];
}

if(isset($_POST["proceed_id"])){
    session_start();

    if(isset($_SESSION["paymethod"])){
        //validate gcash account
        if($_SESSION["paymethod"] == "gcash"){
        if(empty($_POST["account_name"])){
                echo '<span class = "text-danger">Account name is required</span>';
            }
            elseif(empty($_POST["account_number"])){
                echo '<span class = "text-danger">Account number is required</span>';
            }
            elseif(!is_numeric($_POST["account_number"])){
                echo '<span class = "text-danger">Account number is invalid</span>';
            }
            elseif($_POST["account_number"][0] != "0" && $_POST["account_number"][1] != "9"){
                echo '<span class = "text-danger">Account number is invalid</span>';
            }
            elseif(strlen($_POST["account_number"]) != 11){
                echo '<span class = "text-danger">Account number must consist 11 digits</span>';
            }
            else{
                $_SESSION["account_name"] = $_POST["account_name"];
                $_SESSION["account_num"] = $_POST["account_number"];
            }
        }

        //validate paypal account
        elseif($_SESSION["paymethod"] == "paypal"){
            if(empty($_POST["account_name"])){
                echo '<span class = "text-danger">Account name is required</span>';
            }
            elseif(empty($_POST["account_number"])){
                echo '<span class = "text-danger">Account number is required</span>';
            }
            elseif(!filter_var($_POST["account_number"], FILTER_VALIDATE_EMAIL)){
                echo '<span class = "text-danger">Account email is invalid</span>';
            }
            else{
                    $_SESSION["account_name"] = $_POST["account_name"];
                    $_SESSION["account_num"] = $_POST["account_number"];
            }
        }

        //validate mastercard account
        elseif($_SESSION["paymethod"] == "mastercard"){
            if(empty($_POST["account_name"])){
                echo '<span class = "text-danger">Account name is required</span>';
            }
            elseif(empty($_POST["account_number"])){
                echo '<span class = "text-danger">Account number is required</span>';
            }
            elseif(!is_numeric($_POST["account_number"])){
                echo '<span class = "text-danger">Account number is invalid</span>';
            }
            elseif($_POST["account_number"][0] != "5"){
                echo '<span class = "text-danger">Account number is invalid</span>';
            }
            elseif(strlen($_POST["account_number"]) != 16){
                echo '<span class = "text-danger">Master Card account number must consist 16 digits</span>';
            }
            else{
                    $_SESSION["account_name"] = $_POST["account_name"];
                    $_SESSION["account_num"] = $_POST["account_number"];
            }
        }

        if(!empty($_SESSION['reserved_seats']) && isset($_SESSION["account_name"]) && isset($_SESSION["account_num"])){
            echo "<script>$(location).attr('href', 'confirmation-page.php');</script>";
        }
        else{
            echo '<span class = "text-danger">Please select your seat/s</span>';
        }
    }
    else{
        echo '<span class = "text-danger">Payment method is required</span>';
    }

}


if(isset($_POST["submit_btn"])){
    session_start();

    $username = $_SESSION['userId'];

    $query = "SELECT * FROM account_tbl WHERE username = '$username'";
    $results = mysqli_query($db, $query);

    if(mysqli_num_rows($results)){  
        $account = mysqli_fetch_assoc($results);
        $ticket_no = $_POST["ticket_no"];
        $scr_id = $_SESSION["scr_id"];
        $seat_code = $_POST["seat_code"];
        $account_id = $account["id"];

        echo $_POST["ticket_no"];
    
    
        $query = "INSERT INTO booking_tbl(booking_id, scr_id, account_id, seat_code) VALUES ('$ticket_no', '$scr_id', '$account_id', '$seat_code')";
        mysqli_query($db, $query);

        unset($_SESSION['reserved_seats']);
        unset($_SESSION['account_name']);
        unset($_SESSION["paymethod"]);
        unset($_SESSION['account_num']);
        unset($_SESSION['count']);
    }
}
?>
