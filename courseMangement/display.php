<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">



</head>
<body> 
<h1>Student Course Management Installation page</h1>
    
    

    <h>Install</h>
  <form method="post" action="install.php">
    <input name="install" type="submit" value="install" />
  </form>
    <h>Display</h>
    <form method="post" action="display.php">
    <input name="display" type="submit" value="display" />
  </form>

    

    
<?php

   // Menu
   //$menu=file_get_contents("menu.txt");
   $base=basename($_SERVER['PHP_SELF']);
//   $menu=preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu);
  // echo $menu;

   // Code for the lab

   //require 'config.php';

   // Part 1 Step 1: Create the database, if it does not exist
 
  $conn = pg_connect ("host=localhost port=5432 dbname=studentsDB user=root password=root");

    if($conn) {
        
        if (isset($_POST['display']) && $_POST['display'] == 'display') {
       //echo 'connected';
        echo '<div>STUDENTS</div>'  ; 
        $sql =  "SELECT * FROM students ;";
        $result = pg_query($conn, $sql);
        while($row=pg_fetch_row($result) ) {
        $field1 = $row[0];
        $field2 = $row[1];
        $field3 = $row[2];
        $field4 = $row[3];
        $field5 = $row[4];
        $field6 = $row[5];
        $field7 = $row[6];
        $field8 = $row[7];
        $field9 = $row[8];
          echo "
          <b>RCSID: </b> $field1<br/> 
          <b>First Name: </b> $field2<br>
          <b>Last Name:</b>$field3<br/>
          <b>Alias:</b> $field4<br/>
          <b>Phone:</b> $field5<br/>
          <b>City:</b> $field6<br/>
          <b>State</b> $field7<br/>
          <b>Zip:</b> $field8<br/>
          <b>Zip+4:</b> $field9<br/>
          <br>";
        }
            
            
        
            
        $sql =  "SELECT * FROM courses ;";
        $result = pg_query($conn, $sql);
           // echo $result.'<br/>';
            
        echo '<div>COURSES</div>'  ;  
        $result = pg_query($conn, $sql);
        while($row=pg_fetch_row($result) ){
        $field1 = $row[0];
        $field2 = $row[1];
        $field3 = $row[2];
        $field4 = $row[3];
        $field5 = $row[4];
        $field6 = $row[5];
          echo "
          <b>crn </b> $field1<br/> 
          <b>prefix </b> $field2<br>
          <b>number</b>$field3<br/>
          <b>name</b> $field4<br/>
          <b>section</b> $field5<br/>
          <b>year</b> $field6<br/>
          <br>";
        }
            
        $sql =  "SELECT * FROM grades ;";
        $result = pg_query($conn, $sql);
        echo '<div>GRADES</div>'   ;
        while($row=pg_fetch_row($result) ){
        $field1 = $row[1];
        $field2 = $row[2];
        $field3 = $row[3];
            
            
         
          echo "
          <b>crn: </b> $field1<br/> 
          <b>RIN:</b>$field2<br/>
          <b>grade:</b> $field3<br/><br>" ;
        }


        if (!$result) {
          echo "An error occurred.\n";
          exit;
        }
      }

    } else {
        echo 'there has been an error connecting';
    } 

?>

</body>
</html>