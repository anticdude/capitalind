<?php
require "conn.php";
session_start();
//login
if(isset($_POST['btn_login']))
{
	
	$u_name=$_POST['u_name'];
	$u_pwd=$_POST['u_pwd'];
	$qry="select * from user where u_name='$u_name' and u_pwd='$u_pwd' ";
	$ans=mysqli_query($con, $qry);
	if(mysqli_num_rows($ans) > 0 )
	{  
        $row=$ans->fetch_array();
        $_SESSION['u_name']=$row['u_name'];
		header("location:index.php");	
	}
	else
	{
        echo "<script> window.alert('Something went wrong')</script>";
        header("location:login.php");
	}

}