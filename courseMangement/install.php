<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">

<title>Lab 10</title>

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
        
        if (isset($_POST['install']) && $_POST['install'] == 'install') {
       echo 'connected';
      $query = "CREATE DATABASE 'studentsDB' WITH 
        OWNER = root
        ENCODING = 'UTF8'
        LC_COLLATE = 'English_United States.1252'
        LC_CTYPE = 'English_United States.1252'
        TABLESPACE = pg_default
        CONNECTION LIMIT = -1;";
       $result = pg_query($conn, $query);
        
        
        
     
        $sql =  "CREATE TABLE IF NOT EXISTS courses (
        crn integer NOT NULL PRIMARY KEY, 
        prefix varchar(4) NOT NULL,
        number integer NOT NULL,
        title varchar(255) NOT NULL,
        section integer NOT NULL,
        year integer NOT NULL
        );";

        $result = pg_query($conn, $sql);

        $sql = "INSERT INTO courses (crn, prefix, number, title, section, year) VALUES
      (948824123, 'ITWS', 6640, 'Data Science', 1, 2018),
      (958822123, 'ITWS', 2110, 'Web Systems Development', 1, 2018),
      (984512123, 'ITWS', 3456, 'XInfomatics', 1, 2019),
      (987765123, 'ITWS', 4500, 'Web Sys Development', 1, 2019);";

        $result = pg_query($conn, $sql);
            
            
            
        $sql =    "CREATE TABLE IF NOT EXISTS students (
        rin bigint NOT NULL PRIMARY KEY, 
        rcsID varchar(7) NOT NULL,
        first_name varchar(100) NOT NULL,
        last_name varchar(100) NOT NULL,
        alias varchar(100) NOT NULL,
        phone bigint NOT NULL,
        city varchar(100) DEFAULT NULL,
        state varchar(2) DEFAULT NULL,
        zip integer DEFAULT NULL,
        zipplusfour integer DEFAULT NULL
        );";

        $result = pg_query($conn, $sql);

        $sql = "INSERT INTO students(rin,rcsID,first_name,last_name,alias,phone,city,state,zip) VALUES (111111111, 'openffg', 'Graft', 'Openf', 'op', 1112223333,'Troy','NY',12180),
(111111112, 'closegr', 'Greft', 'Closeg', 'gc', 1112223332,'Troy','NY',12180),
(11111232, 'sarahft', 'Sarah', 'Fruit', 'sf', 1112223334,'Troy','NY',12180),
(11171232, 'deanmea', 'Dean', 'Mea', 'df', 1112223335,'Troy','NY',12180);";

        $result = pg_query($conn, $sql);
               
        $sql =    "CREATE TABLE IF NOT EXISTS grades (
        id SERIAL PRIMARY KEY, 
        crn integer REFERENCES  courses(crn),
        rin integer REFERENCES students(rin),
        grade integer NOT NULL);";

        $result = pg_query($conn, $sql);

        $sql = "INSERT INTO grades (crn, rin, grade) VALUES
    (  (SELECT crn from courses WHERE title='Web Systems Development'), (SELECT rin from students WHERE rcsID='sarahft'), 100 ),
     (  (SELECT crn from courses WHERE title='XInfomatics'), (SELECT rin from students WHERE rcsID='sarahft'), 100 ),
     (  (SELECT crn from courses WHERE title='Web Sys Development'), (SELECT rin from students WHERE rcsID='sarahft'), 95 ),
     (  (SELECT crn from courses WHERE title='Web Sys Development'), (SELECT rin from students WHERE rcsID='closegr'), 80),
     (  (SELECT crn from courses WHERE title='XInfomatics'), (SELECT rin from students WHERE rcsID='closegr'), 97 ),
     (  (SELECT crn from courses WHERE title='Data Science'), (SELECT rin from students WHERE rcsID='openffg'), 88 ),
     (  (SELECT crn from courses WHERE title='Web Systems Development'), (SELECT rin from students WHERE rcsID='openffg'), 75 ),
     (  (SELECT crn from courses WHERE title=' Data Science'), (SELECT rin from students WHERE rcsID='deanmea'), 73 ),
     (  (SELECT crn from courses WHERE title='XInfomatics'), (SELECT rin from students WHERE rcsID='deanmea'), 90 ),
     (  (SELECT crn from courses WHERE title='Web Systems Development'), (SELECT rin from students WHERE rcsID='deanmea'), 95);";

        $result = pg_query($conn, $sql);

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