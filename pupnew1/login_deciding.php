<?php

$db =new PDO('mysql:host=localhost;dbname=pupa','root','');
session_start();
if(isset($_POST['ss']))
{
	$uname=$_POST['username'];
	$upassword=$_POST['password'];
	$level=$_POST['level'];
	$qry=$db->prepare("SELECT id,username,password,level FROM admin_logins where username=:uname AND password=:pass AND level=:lev");
	$qry->execute([
		':uname'=>$uname,
		':pass'=>$upassword,
		':lev'=>$level
	]);
	$row = $qry->fetch(PDO::FETCH_OBJ);	
	if($qry->rowCount()>0){
		
		$_SESSION['uid']=$row->id;
		$_SESSION['levell']=$row->level;
		echo "uid=".$row->id."levell=".$row->level;
		if($_SESSION['levell']=="Level0"){
			//echo "L0";
			header("location:login_landing1.php");	
		}		
		else{
			//echo "L1";
			header("location:login-landing_others.php");
		}			
	}
	else{
		//echo "else working";
		header("location:levelsPortal.php?id=1000");
	}
}

/*
$con=mysqli_connect("localhost","root","","pupa");
session_start();
if(isset($_POST['ss']))
{
	$uname=$_POST['username'];
	$upassword=$_POST['password'];
	$level=$_POST['level'];
	
	$qry="select username,password,level from admin_logins where username='$uname' AND password='$upassword' AND level='$level'";
	$data=mysqli_query($con,$qry);
	$counter=mysqli_num_rows($data);
						
						if($counter>0)
						{
							$row=mysqli_fetch_array($data);
							$_SESSION['uid']=$row[0];
							$_SESSION['levell']=$row[2];
							//echo $_SESSION['levell'];
							if($_SESSION['levell']=="Level0"){
								//echo "L0";
								header("location:login_landing1.php");	
							}		
							else{
								//echo "L1";
								header("location:login-landing_others.php");
							}
						}
						else
						{
							header("location:levelsPortal.php?id=1000");
						}
}*/

?>