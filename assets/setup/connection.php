<?php
require 'env.php' ;
function createPdoConn()
{
   $host = DB_HOST;
   $user = DB_USERNAME;
   $password = DB_PASSWORD;
   $db = DB_DATABASE;
   $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

   try {
      $pdo = new PDO($dsn, $user, $password);
      if ($pdo) {
         return $pdo ;
      }else{
        die("faild to create PDO ") ;
      }
   } catch (PDOException $e) {
      echo $e->getMessage();
   }
}
function closePdoConn($pdo){
   $pdo = null ;
}


/*

function createConn()
{
   $conn = mysqli_connect($host, $user,$password,$db) or die("Unable to connect : " . mysqli_connect_errno());
   return $conn;
}
function closeConn($conn)
{
   mysqli_close($conn);
}

*/
?>