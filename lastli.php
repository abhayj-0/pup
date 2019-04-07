
<?php
$db = new PDO('mysql:host=localhost;dbname=pupa','root','');

if(isset($_POST['sp3'])){
    $regno=$_POST['regn'];
    $alt13=$_POST['name'];
    $alt14=$_POST['ph'];
    $alt15=$_POST['dept'];
    $alt16=$_POST['facul'];
    $pat=$_POST['patrta'];
    $alt=$_POST['alotdip'];
    $alt1=$_POST['nigran'];
    $alt2=$_POST['helper'];
    $alt3=$_POST['regform'];
    $alt4=$_POST['regfees'];
    $alt5=$_POST['prof'];
    $alt6=$_POST['karwahi'];
    $alt7=$_POST['tip'];
    $alt8=$_POST['help'];
    $alt9=$_POST['noc'];
    $alt10=$_POST['res'];
    $alt11=$_POST['plag'];
    $alt12=$_POST['ethical'];
    
    $cmd2w = $db->prepare("INSERT INTO synop(regno,name,degree,dept,faculty,patrta,allotment,nigran,helper,reg_form,
    reg_fees,prof,karwahi,tip,help,noc,res,plang,ethical,temp,level) VALUES(:fq1,:fq2,:fq3,:fq4,:fq5,:fq6,:fq7,:fq8,:fq9,:fq10,:fq11,:fq12,:fq13,:fq14,:fq15,:fq16,:fq17,:fq18,:fq19,:fq20,:fq21)" );
  $cmd2w->execute([
    ':fq1'=>$regno,
    ':fq2'=>$alt13,
    ':fq3'=>$alt14,
    ':fq4'=>$alt15,
    ':fq5'=>$alt16,
    ':fq6'=>$pat,
    ':fq7'=>$alt,
    ':fq8'=>$alt1,
    ':fq9'=>$alt2,
    ':fq10'=>$alt3,
    ':fq11'=>$alt4,
    ':fq12'=>$alt5,
    ':fq13'=>$alt6,
    ':fq14'=>$alt7,
    ':fq15'=>$alt8,
    ':fq16'=>$alt9,
    ':fq17'=>$alt10,
    ':fq18'=>$alt11,
    ':fq19'=>$alt12,
    ':fq20'=>'Yes',
    ':fq21'=>'Level2'
  ]);

header("location:login-landing_others.php");    
}