<?php 

$con=mysqli_connect("localhost","root","","capital") OR header('Location:../con_failed.php');

// try{
//     $con=mysqli_connect("localhost","root","","bitweb") ;
// }catch(mysqli_sql_exception $e){
//    throw header('Location:../con_failed.php');
// }
    // try{
    //     $con= new PDO("mysql:host=localhost; dbname=bitweb;", "root", "");
    //     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }catch(PDOException $e){
    //     echo "<script>location.href='../con_failed.php'</script>";        
    // }
?>
