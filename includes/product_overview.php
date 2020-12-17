<?php

require_once 'conn.php';

//display product overview throgh view_data class
if(isset($_POST["movie_id"])){
    $output = '';
    
    $query = "SELECT * FROM movie_tbl WHERE movie_id = '".$_POST["movie_id"]."'";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_array($result)){
        $output .= '<div class="d-flex justify-content-center col-lg-4 col-12 p-0 m-0 mv-pstr no-gutters">
                        <img class="col-12 imgs" src="data:image;base64,' .base64_encode($row['movie_poster']).'">;
                    </div>
                    <div class="prd-inf d-flex flex-column justify-content-start  col-lg-8 col-12 no-gutters mx-auto p-4">
                        <div class="mv-info col-12 p-0">  
                                <div class="prd-info">
                                    <h1 class="mb-1 ">'.$row['movie_name'].'</h1>
                                    <p class="m-0 rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                    <h2 class="mt-1 mb-0">₱'.$row['movie_price'].'</h2>
                                    <p class="mt-3 ">'.$row['movie_desc'].'</p>
                                </div>
                                <button type="button" class= "btn btn-outline-secondary m-1 col-12 "data-toggle="modal" data-target=".product-overview-1"><i class="fa fa-play"></i> TRAILER</button>   
                                <button type="button" class="btn btn-outline-secondary m-1 col-12"><i class="fa fa-plus"></i> ADD TO CART</button>                
                                <button type="button" class="btn btn-outline-secondary m-1 col-12"><i class="fa fa-ticket"></i> CHECK OUT</button>
                        </div>  
                    </div>';
    }
    echo $output;
}

//display trailer throgh movie_trailer class
if(isset($_POST["movie_id1"])){
    $trailer = '';
    
    $query = "SELECT * FROM movie_tbl WHERE movie_id = '".$_POST["movie_id1"]."'";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_array($result)){
        $trailer .= '<iframe src="'.$row['trailer'].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
    echo $trailer;
}
?>