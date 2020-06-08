<?php
require "conn.php";
session_start();
//login
if(isset($_POST['btn_login']))
{
	
	$email=$_POST['email'];
	$password=$_POST['pwd'];
	$qry="select * from user where email='$email' and pwd='$password' ";
	$ans=mysqli_query($con, $qry);
	//echo $ans;
	if(mysqli_num_rows($ans) > 0 )
	{
		$row=$ans->fetch_array();
		$_SESSION['email']=$row['email'];
		$_SESSION['user_name']=$row['user_name'];
		$_SESSION['user_type']=$row['user_type_id'];
		//echo $_SESSION['email'];
		if($_SESSION['user_type']=='1')
		{
			echo "<script>location.href='../admin/index.php';</script>";
			echo "admin panel";
		}
		elseif($_SESSION['user_type']=='2')
		{
			echo "<script>location.href='../index.php';</script>";
			echo "user panel";
		}
		else
		{
			echo "<script>alert('Something Went Wrong Try again')</script>";
			//echo "<script>location.href='index.php';</script>";

		}
		
	}
	else
	{
		echo "<script>location.href='../index.php';</script>";
	}

}