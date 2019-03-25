<?php 
$db = new PDO('mysql:host=localhost;dbname=pupa','root','');
session_start();

if(isset($_POST['changesb'])){
	$zname=$_POST['name'];
	$digsig=basename($_FILES['CDigSig']['name']);
	$pp=basename($_FILES['Cprofile']['name']);
	$oops=$db->prepare("SELECT profilepic,digsignature FROM admin_logins where id=:0do");
    $oops->execute([
        ':0do'=>$_SESSION['uid']
    	]);
    while($oopus34 = $oops->fetch(PDO::FETCH_OBJ))
    {
    	$profilep1sw=$oopus34->profilepic;
        $digsigp1sw=$oopus34->digsignature;
    }
	$gg1=$db->prepare("UPDATE admin_logins SET profilepic=:pp,digsignature=:ds,username=:un where id=:udo" );
	$gg1->execute([
			':un'=>$zname,
			':ds'=>$digsig,
			':pp'=>$pp,
			':udo'=>$_SESSION['uid']
		]);

	/*$gg1=$db->prepare("UPDATE admin_logins SET profilepic='',digsignature='' where id=:udo1" );
	$gg1->execute([
			':udo1'=>$_SESSION['uid']
		]);
	$qry21 = $db->prepare("select id from admin_logins where id=:uiod" );
	$qry21->execute([
		':uiod'=>$_SESSION['uid']
		]);
	while($rt1 = $qry21->fetch(PDO::FETCH_OBJ))
	{*/
		$nalt1=$_SESSION['uid'];/*$rt1->level*/
	//}
		$filename = "photos/" . $nalt1. "/" ;//. "/"
		$delfile1 = "photos/" . $nalt1. "/".$profilep1sw;
		$delfile2 = "photos/" . $nalt1. "/".$digsigp1sw;
		//echo "delfile1=".$delfile1."delfile2=".$delfile2;//chal rehA HAUI
		if (file_exists('photos/')) {//file_exists
		if (!is_dir($filename)) { 
			mkdir("photos/".$nalt1."/", 0777);
			move_uploaded_file($_FILES['CDigSig']['tmp_name'],"photos/$nalt1/".$digsig);
			move_uploaded_file($_FILES['Cprofile']['tmp_name'],"photos/$nalt1/".$pp);
			//header("location:login_landing1.php?id=100");
			//echo "nope";
		}
		else{
			unlink($delfile1);
			unlink($delfile2);
			move_uploaded_file($_FILES['CDigSig']['tmp_name'],"photos/$nalt1/".$digsig);
			move_uploaded_file($_FILES['Cprofile']['tmp_name'],"photos/$nalt1/".$pp);
			//echo "did it";
			//header("location:login_landing1.php?id=100");
		}
		}
		
		
}
?>