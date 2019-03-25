<?php 
$db =new PDO('mysql:host=localhost;dbname=pupa','root','');
/*$con=mysqli_connect("localhost","root","","pupa");*/
    session_start();
    //echo "aproval page";chal raha hai
if(isset($_POST['approve'])){
	$rno=$_POST['rno'];
	$lo=$_SESSION['levell'];
	//echo $lo;chal raha hai
	//echo $rno;chal raha hai
	//to update temp into no showing it had been approved
	$gdg=$db->prepare("UPDATE main SET temp=:y where regno=:rido" );
	$gdg->execute([
			':y'=>'No',
			':rido'=>$rno
		]);
	/*$gdg="UPDATE main SET temp='No' where regno='".$rno."'";
	mysqli_query($con,$gdg);*/
	//to update approve amd level to the level jisne kar diya
	
	$bb=$db->prepare("UPDATE main SET level=:lido,approve=:yp where regno=:ridoz" );
	$bb->execute([
			':yp'=>'Yes',
			':lido'=>$lo,
			':ridoz'=>$rno
		]);
	/*$bb="UPDATE main SET level='".$lo."',approve='Yes' where regno='".$rno."'";
	mysqli_query($con,$bb);*/
	//when tempvariable for another level needed to be changed
	$tempagayes=$db->prepare("UPDATE main SET temp=:yo where regno=:ridozr" );
	$tempagayes->execute([
			':yo'=>'Yes',
			':ridozr'=>$rno
		]);

	$qry14=$db->prepare("SELECT digsignature FROM admin_logins where id=:uid");
    $qry14->execute([
        ':uid'=>$_SESSION['uid']
    ]);
    while($row123 = $qry14->fetch(PDO::FETCH_OBJ))
     	{
			$file1s=$row123->digsignature;
   		}
   		// echo $file1s;
   		//echo $lo;
   	if($lo=='Level1'){
   		//echo "Level1";
   		$tempagayes=$db->prepare("UPDATE main SET dlevel1=:dl where regno=:rizr" );
		$tempagayes->execute([
			':dl'=>$file1s,
			':rizr'=>$rno
		]);
   	}
   	if($lo=='Level2'){
   		//echo "Level2";
   		$tempagayes=$db->prepare("UPDATE main SET dlevel2=:dl where regno=:rizr" );
		$tempagayes->execute([
			':dl'=>$file1s,
			':rizr'=>$rno
		]);
   	}
   	if($lo=='Level3'){
   		//echo "Level3";
   		$tempagayes=$db->prepare("UPDATE main SET dlevel3=:dl where regno=:rizr" );
		$tempagayes->execute([
			':dl'=>$file1s,
			':rizr'=>$rno
		]);
   	}
   	if($lo=='Level4'){
   		//echo "Level4";
   		$tempagayes=$db->prepare("UPDATE main SET dlevel4=:dl where regno=:rizr" );
		$tempagayes->execute([
			':dl'=>$file1s,
			':rizr'=>$rno
		]);
   	}

	/*$tempagayes="UPDATE main SET temp='yes' where regno='".$rno."'";
	mysqli_query($con,$tempagayes);*/
	header("location:login-landing_others.php");
}
if(isset($_POST['disapprove'])){
	$rno=$_POST['rno'];
	$lo=$_SESSION['levell'];
	$bb1="UPDATE main SET level='".$lo."',disapprove='Yes' where regno='".$rno."'";
	mysqli_query($con,$bb1);
}
?>