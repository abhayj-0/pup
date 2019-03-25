<?php

$db = new PDO('mysql:host=localhost;dbname=pupa','root','');
session_start();
                      
if(isset($_POST['LZerod'])){
	$regno=$_POST['regno'];
	$comments=$_POST['comments'];
	$file1=basename($_FILES['files1']['name']);
	$file2=basename($_FILES['files2']['name']);
	$file3=basename($_FILES['files3']['name']);
	$file4=basename($_FILES['files4']['name']);
	$file5=basename($_FILES['files5']['name']);
	$file6=basename($_FILES['files6']['name']);
	$qry14=$db->prepare("SELECT digsignature FROM admin_logins where id=:uid");
                        $qry14->execute([
                            ':uid'=>$_SESSION['uid']
                          ]);
                        while($row123 = $qry14->fetch(PDO::FETCH_OBJ))
                        {
                          
                          $file1s=$row123->digsignature;
                          
                        }
	$cmd2 = $db->prepare("INSERT INTO main(regno,file1,file2,file3,file4,file5,file6,level,temp,comment,dlevel0) VALUES(:reg,:fil1,:fil2,:fil3,:fil4,:fil5,:fil6,:leve,:tem,:comm,:f1s)" );
	$cmd2->execute([
		':reg'=>$regno,
		':fil1'=>$file1,
		':fil2'=>$file2,
		':fil3'=>$file3,
		':fil4'=>$file4,
		':fil5'=>$file5,
		':fil6'=>$file6,
		':leve'=>'Level0',
		':tem'=>'Yes',
		':comm'=>$comments,
		':f1s'=>$file1s
	]);
	$cmd = $db->prepare("INSERT INTO level0details(regno,file1,file2,file3,file4,file5,file6,comment,level,temp) VALUES(:reg,:fil1,:fil2,:fil3,:fil4,:fil5,:fil6,:comm,:leve,:tem)" );
	$cmd->execute([
		':reg'=>$regno,
		':fil1'=>$file1,
		':fil2'=>$file2,
		':fil3'=>$file3,
		':fil4'=>$file4,
		':fil5'=>$file5,
		':fil6'=>$file6,
		':comm'=>$comments,
		':leve'=>'Level0',
		':tem'=>'Yes'
	]);
	$qry = $db->prepare("select regno from level0details where regno=:reg0" );
	$qry->execute([
		':reg0'=>$regno
		]);
	while($ruu = $qry->fetch(PDO::FETCH_OBJ))
	{
		$nal2=$ruu->regno;	
	}
	mkdir("Level0details/".$nal2."/", 0777);
	//move_uploaded_file($_FILES['$file1s']['tmp_name'],"Level0details/$nal2/".$file1s);//nahin chal rahi
	move_uploaded_file($_FILES['files1']['tmp_name'],"Level0details/$nal2/".$file1);
	move_uploaded_file($_FILES['files2']['tmp_name'],"Level0details/$nal2/".$file2);
	move_uploaded_file($_FILES['files3']['tmp_name'],"Level0details/$nal2/".$file3);
	move_uploaded_file($_FILES['files4']['tmp_name'],"Level0details/$nal2/".$file4);
	move_uploaded_file($_FILES['files5']['tmp_name'],"Level0details/$nal2/".$file5);
	move_uploaded_file($_FILES['files6']['tmp_name'],"Level0details/$nal2/".$file6);
	header("location:login_landing1.php?id=1000");	

}
if(isset($_POST['LZeroc'])){
	$cname=$_POST['name'];
	$cdigsig=basename($_FILES['ChangedDigSig']['name']);
	$cppic=basename($_FILES['changedprofile']['name']);
	
	$tt22=$db->prepare("SELECT profilepic,digsignature FROM admin_logins where id=:0do");
    $tt22->execute([
        ':0do'=>$_SESSION['uid']
    	]);
    while($row1245 = $tt22->fetch(PDO::FETCH_OBJ))
    {
    	$profilep1w=$row1245->profilepic;
        $digsigp1w=$row1245->digsignature;
    }
    //echo "profilep1w=".$profilep1w." digsigp1w=".$digsigp1w;
	$gg=$db->prepare("UPDATE admin_logins SET profilepic=:cpp,digsignature=:cdi,username=:cna where id=:uido" );
	$gg->execute([
			':cna'=>$cname,
			':cdi'=>$cdigsig,
			':cpp'=>$cppic,
			':uido'=>$_SESSION['uid']
		]);
	

	/*$ffg=$db->prepare("UPDATE admin_logins SET profilepic='',digsignature='' where id=:uidox" );
	$ffg->execute([
			':uidox'=>$_SESSION['uid']
		]);
	$qry2 = $db->prepare("select level from admin_logins where id=:uid" );
	$qry2->execute([
		':uid'=>$_SESSION['uid']
		]);
	while($ruu1 = $qry2->fetch(PDO::FETCH_OBJ))*/
	//{
		$nal1=$_SESSION['uid'];//$ruu1->level	
	//}
		
		$filename = "photos/" . $nal1. "/" ;//. "/"
		$delfile1 = "photos/" . $nal1. "/".$profilep1w;
		$delfile2 = "photos/" . $nal1. "/".$digsigp1w;
		//echo "delfile1=".$delfile1."delfile2=".$delfile2;//chal rehA HAUI
		if (file_exists('photos/')) {//file_exists
			if (!is_dir($filename)) { 
			mkdir("photos/".$nal1."/", 0777);
			move_uploaded_file($_FILES['ChangedDigSig']['tmp_name'],"photos/$nal1/".$cdigsig);
			move_uploaded_file($_FILES['changedprofile']['tmp_name'],"photos/$nal1/".$cppic);
			header("location:login_landing1.php?id=100");
			//echo "nope";
		}
		else{
			unlink($delfile1);
			unlink($delfile2);
			move_uploaded_file($_FILES['ChangedDigSig']['tmp_name'],"photos/$nal1/".$cdigsig);
			move_uploaded_file($_FILES['changedprofile']['tmp_name'],"photos/$nal1/".$cppic);
			//echo "did it";
			header("location:login_landing1.php?id=100");
		}
		}
		
	
	
	//move_uploaded_file($_FILES['ChangedDigSig']['tmp_name'],"photos/$nal1/".$cdigsig);
	//move_uploaded_file($_FILES['changedprofile']['tmp_name'],"photos/$nal1/".$cppic);
	//header("location:login_landing1.php?id=100");	
}

?>
