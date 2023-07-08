<?php
include 'Include/dbconnect.php';
if($id=$_GET['id'])
{
		$qry="delete from `cart` where `id`='$id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:checkout.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
?>