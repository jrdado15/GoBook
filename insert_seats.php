<?php require_once 'includes/conn.php';

if(isset($_POST["submit"])){
   $scr = $_POST["insert"];

   //A
   $seat_column = 4;
   for($i = 0; $i < 2; $i++){
        $row = "A";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "A";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }   
   $seat_column = 12;
   for($i = 0; $i < 2; $i++){
        $row = "A";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }

   //B
   $seat_column = 3;
   for($i = 0; $i < 3; $i++){
        $row = "B";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "B";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 3; $i++){
        $row = "B";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }

   //C
   $seat_column = 2;
   for($i = 0; $i < 4; $i++){
        $row = "C";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "C";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 4; $i++){
        $row = "C";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   //D
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "D";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "D";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "D";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }

   //E
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "E";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "E";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "E";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   //F
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "F";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "F";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "F";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   //G
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "G";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "G";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "G";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   //H
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "H";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "H";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "H";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   //I
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "I";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "I";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "I";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   //J
   $seat_column = 1;
   for($i = 0; $i < 5; $i++){
        $row = "J";
        $seat_group = 1;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 6;
   for($i = 0; $i < 6; $i++){
        $row = "J";
        $seat_group = 2;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }
   $seat_column = 12;
   for($i = 0; $i < 5; $i++){
        $row = "J";
        $seat_group = 3;
        $query = "INSERT INTO seat_tbl (scr_id, row, seat_column, seat_group, status) VALUES ('$scr', '$row', '$seat_column', '$seat_group', 'available')";
        $seat_column += 1;
        mysqli_query($db, $query);
   }

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inserts_seats.php" method = "post">
        <input id = "insert" name = "insert" type="text">    

        <button type = "submit" name = "submit"> </button>
    </form>
</body>
</html>