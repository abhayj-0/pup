<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!--Date Picker css-->
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!--Main css-->
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="login_landing1.css">
    <title>Pup Research Branch</title>
  </head>
  <body>
    <?php 
    $db =new PDO('mysql:host=localhost;dbname=pupa','root','');
    session_start();
    if($_SESSION['levell']=='Level1'){
      $o='Level0';
    }
    elseif ($_SESSION['levell']=='Level2') {
     $o='Level1';
    }
    elseif ($_SESSION['levell']=='Level3') {
     $o='Level2';
    }
    elseif ($_SESSION['levell']=='Level4') {
     $o='Level3';
    }

    if(@$_GET['id']==""){
    $qry=$db->prepare("SELECT * FROM main where temp=:te AND level=:pa");
    $qry->execute([
      ':te'=>'Yes',
      ':pa'=>$o
    ]);
    $row = $qry->fetch(PDO::FETCH_OBJ); 
    if($qry->rowCount()>0){
      $message = 'You Have New Notifications';
      echo "<SCRIPT>
      alert('$message');
      </SCRIPT>";
    }
  }
  if(@$_GET['id'])
          {
            @$id1=@$_GET['id'];
            if(is_numeric(@$id1)&&@$id1==100){
            ?>
            <script type='text/javascript'>alert("Your Credentials Changed");</script>
            <?php
            }
          }

    ?>
    <nav class="navbar navbar-light bg-light">
       <a class="navbar-brand" href="#">
       <img src="index_01.gif"  alt="">
       </a>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="#">PREFRENCES</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link" href="#">CANDIDATES</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">FACULTY</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">DEPARTMENT</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">SUPERVISOR</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">ENROLLMENT</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="search.html">SEARCH</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">NOTICES</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">BACKUP</a>
              </li>
          </ul>
        </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
          <div class="col-3 side-bar">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="nav-link profile">
                  <?php 
                  $qry21=$db->prepare("SELECT profilepic FROM admin_logins where id=:0do");
                        $qry21->execute([
                            ':0do'=>$_SESSION['uid']
                          ]);
                        while($row1245 = $qry21->fetch(PDO::FETCH_OBJ))
                        {
                          $profilepic1w=$row1245->profilepic;
                        }
                  ?>
                   <img src="photos/<?php echo $_SESSION['uid']?>/<?php echo $profilepic1w;?>" class="img-fluid img-profie">
                </div>
                <a class="nav-link side-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link side-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link side-link" id="v-pills-previous-entry-tab" data-toggle="pill" href="#v-pills-previous-entry" role="tab" aria-controls="v-pills-previous-entry" aria-selected="false">Previously Approved</a>
                <a class="nav-link side-link" id="v-pills-print-tab" data-toggle="pill" href="#v-pills-print" role="tab" aria-controls="v-pills-print" aria-selected="false">Print</a>
                <a class="nav-link side-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                <a class="nav-link side-link" id="v-pills-difform-tab" data-toggle="pill" href="#v-pills-difform" role="tab" aria-controls="v-pills-difform" aria-selected="false">Extra Form</a>
              </div>
          </div>
          <div class="col-9 main">
              <div class="tab-content" id="v-pills-tabContent">
                 <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <h3>Welcome</h3>
                    <div>
                      <table class="table table-striped">
                     <thead>
                       <tr>
                        
                         <th scope="col">Date</th>
                         <th scope="col">Registration Number</th>
                         <th scope="col">Type of Examination</th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                      <tbody>
                       <?php
                       $lovel=$_SESSION['levell'];
                       $qry15 = $db->prepare("select level from main where temp=:tr" );
                        $qry15->execute([
                          ':tr'=>'Yes'
                          ]);
                        while($ruu15 = $qry15->fetch(PDO::FETCH_OBJ))
                        {
                          $rouy=$ruu15->level;  
                        }


                        $qry16 = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment,datef,type_of_examination  from main where temp=:tro AND level=:o" );
                        $qry16->execute([
                          ':tro'=>'Yes',
                          ':o'=>$o
                          ]);
                        while($ruu16 = $qry16->fetch(PDO::FETCH_OBJ))
                        {
                            $r=$ruu16->regno;
                            $f1=$ruu16->file1;
                            $f2=$ruu16->file2;
                            $f3=$ruu16->file3;
                            $f4=$ruu16->file4;
                            $f5=$ruu16->file5;
                            $f6=$ruu16->file6;
                            $comm=$ruu16->comment;
                            $dar=$ruu16->datef;
                            $dtoe=$ruu16->type_of_examination;
                       /*ethon udaya*/

                        ?>
                          <tr>
                           
                           <td><?php echo $dar;?></td>
                           <td><?php echo $r;?></td>
                           <td><?php echo $dtoe;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $r;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#example" class="btn btn-primary">View</a></td>
                          </tr>                       
                        
                         <?php 
                       }
                          $qry186 = $db->prepare("select regno from main where id=:tro11" );
                          $qry186->execute([
                            ':tro11'=>$_SESSION['uid']
                            ]);
                          while($ruu146 = $qry186->fetch(PDO::FETCH_OBJ))
                          {
                            $rp=$ruu146->regno;
                          }
                          $qry1867 = $db->prepare("select level from main where regno=:tro11" );
                          $qry1867->execute([
                            ':tro11'=>$rp
                            ]);
                          while($ruu167 = $qry1867->fetch(PDO::FETCH_OBJ))
                          {
                            $lrp=$ruu167->level;
                          }
                          if($_SESSION['levell']=='Level1'&&$lrp=='Level2')
                          {
                          ?>
                         <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Print</button></td>
                        <?php 
                          }
                        ?>
                        </tbody>
                      
                   </table>
                   <!--
                      <ol class="breadcrumb">
                        <!<form action="login-landing_others.php?id=<?php// echo $r;?>">>
                        <li class="breadcrumb-item active" aria-current="page"><?php //echo $r;?></li>
                        
                        <li class="view"><a type="button" href="login-landing_others.php?id=<?php// echo $r;?>" class="btn btn-primary">Click</a></li>

                        <li class="view"><a data-toggle="modal" style="color:#fff;" data-target="#example" class="btn btn-primary">View</a></li>
                        <!<li class="view"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example">View</button></li>>
                        <!</form>>
                      </ol>-->
                      <?php
                        if(@isset($_GET['id']))
                        {
                          $iddd=$_GET['id'];
                          if(is_numeric($iddd)){
                          $r=$_GET['id'];
                          ?>
                        
                          <?php
                          }//inside if
                        }//if di hai
                         //while loop di hai
                        //}//if di han sabton ute wali
                          //echo $r;//last wala a reha hamesha
                          //$gdg="update admin_logins SET 'temp'='No'";
                          //mysqli_query($con,$gdg);
                        ?> 

                    </div>
                    <!-- Modal -->
                     <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                              <div class="card" style="width: 50rem;">
                                <div class="card-body">
                                  <h5 class="card-title">Registration Number</h5>
                                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $r;?></h6>
                                  <?php
                        $qry17 = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment from level0details where regno=:ror" );
                        $qry17->execute([
                          ':ror'=>$r
                          ]);
                        while($ruu17 = $qry17->fetch(PDO::FETCH_OBJ))
                        {
                            $f1=$ruu17->file1;
                            $f2=$ruu17->file2;
                            $f3=$ruu17->file3;
                            $f4=$ruu17->file4;
                            $f5=$ruu17->file5;
                            $f6=$ruu17->file6;
                            $comm=$ruu17->comment;
/*ethon no2 udaya*/
                                  ?>

                                  <p class="card-text">
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 1 : </label><?php echo ' '.$f1;?>
                                     <?php if(!empty(@$f1)){?> 
                                      <img src="Level0details/<?php echo $r;?>/<?php echo $f1;?>" class="img-fluid img-profie">
                                     <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 2 : </label><?php echo ' '.$f2;?>
                                      <?php if(!empty(@$f2)){?> 
                                     <img src="Level0details/<?php echo $r;?>/<?php echo $f2;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 3 : </label><?php echo ' '.$f3;?>
                                     <?php if(!empty(@$f3)){?> 
                                     <img src="Level0details/<?php echo $r;?>/<?php echo $f3;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 4 : </label><?php echo ' '.$f4;?>
                                    <?php if(!empty(@$f4)){?> 
                                    <img src="Level0details/<?php echo $r;?>/<?php echo $f4;?>" class="img-fluid img-profie">
                                    <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 5 : </label><?php echo ' '.$f5;?>
                                    <?php if(!empty(@$f5)){?> 
                                    <img src="Level0details/<?php echo $r;?>/<?php echo $f5;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 6 : </label><?php echo ' '.$f6;?>
                                     <?php if(!empty(@$f6)){?> 
                                     <img src="Level0details/<?php echo $r;?>/<?php echo $f6;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Comments (if any)</label>
                                      <textarea class="form-control" placeholder="<?php echo $comm;?>" id="exampleFormControlTextarea1" rows="3" name="comments" disabled></textarea>
                                   </div>
                                  
                                  </p>
                                  <?php
                                    }
                                   
                           
                                    ?>
                                    <form role="form" method="POST" action="approvalll.php"> 
                                    <input type="hidden" name="rno" value="<?php echo $r?>">
                                    <input type="submit" class="btn btn-primary" id="approve" name="approve" value="Approve">
                                    <input type="submit" class="btn btn-primary" id="disapprove" name="disapprove" value="Disapprove">

                                    <!--<input type="submit" class="btn btn-primary" id="disapprove" name="disapprove" value="Disapprove">
                                  <button  type="button" class="btn btn-primary" id="approve" name="approve">Approve</button><?php //echo $_SESSION['levell'];?>
                                  <button  type="button" class="btn btn-primary" id="disapprove" name="disapprove">Disapprove</button>-->
                                  </form>
                                </div>
                                </div>
                               </div>
                               
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content" style="width: 50rem;">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel" style="width: 50rem;">Print</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                              <div class="card" style="width: 50rem;">
                                <div class="card-body">
                                  <div id="printdoc">
                                      <div class="documentimage"><img src=""></div>
                                      <div class="row sigcontainer">
                                          <div class="col signature"><img src="download.png"></div>
                                          <div class="col signature"><img src="download.png"></div>
                                          <div class="col signature"><img src="download.png"></div>
                                          <div class="col signature"><img src="download.png"></div>
                                          <div class="col signature"><img src="download.png"></div>
                                          <div class="col signature"><img src="download.png"></div>
                                      </div>
                                      </div>
                                      
                                </div>
                                </div>
                               </div>
                           <div class="modal-footer">
                             
                             <button type="button" class="btn btn-primary" id="print" onclick="printDiv('printdoc')">Print</button>
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           </div>
                         </div>
                       </div>
                     </div>
                   <!--<button type="button" class="btn btn-outline-info" name="addDom">Add new Student</button>-->
                 </div>
                 <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <?php 
                  
                        $qry20=$db->prepare("SELECT username,digsignature,profilepic FROM admin_logins where id=:uid");
                        $qry20->execute([
                            ':uid'=>$_SESSION['uid']
                          ]);
                        while($row144 = $qry20->fetch(PDO::FETCH_OBJ))
                        {
                          
                          $name12=$row144->username;
                          $file1s=$row144->digsignature;
                          $profilepic1s=$row144->profilepic;
                          
                        }
                      ?>
                    <div class="profile">
                      <img src="photos/<?php echo $_SESSION['uid']?>/<?php echo $profilepic1s;?>" class="img-fluid img-profie">
                    </div>
                    <div>
                     <form>
                       <div class="form-group">
                         <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" disabled value="<?php echo $name12;?>">
                       </div>
                       <div class="form-group">
                         <label for="exampleFormControlFile1">Digital Signature</label>
                         <img src="photos/<?php echo $_SESSION['uid']?>/<?php echo $file1s;?>" class="img-fluid img-profie">
                       </div>
                     </form>
                   </div>
                   </div>                 
                   <div class="tab-pane fade previously" id="v-pills-previous-entry" role="tabpanel" aria-labelledby="v-pills-previous-entry-tab">
                    The previously entered students with their details
                      <div class="card" style="width: 50rem;">
                   <div class="card-body">
                    <?php
                    $qry21 = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment from main where level=:l");
                        $qry21->execute([
                        ':l'=>$_SESSION['levell']
                      ]);
                        while($ruu21 = $qry21->fetch(PDO::FETCH_OBJ))
                        {
                            $re=$ruu21->regno;
                            $f1=$ruu21->file1;
                            $f2=$ruu21->file2;
                            $f3=$ruu21->file3;
                            $f4=$ruu21->file4;
                            $f5=$ruu21->file5;
                            $f6=$ruu21->file6;
                            $comm=$ruu21->comment;
/*ethon no3 udaya*/}
                                  ?>
                    
                     <h5 class="card-title">Registration Number</h5>
                     <h6 class="card-subtitle mb-2 text-muted"><?php if(!empty(@$re)){echo $re;}else{echo"None";} ?></h6>
                     <p class="card-text">
                     <form>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 1 :</label><?php echo ' '.$f1;?>
                        <?php if(!empty(@$f1)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f1;?>" class="img-fluid img-profie">
                        <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 2 :</label><?php echo ' '.$f2;?>
                        <?php if(!empty(@$f2)){?> 
                         <img src="Level0details/<?php echo $re;?>/<?php echo $f2;?>" class="img-fluid img-profie">
                          <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 3 :</label><?php echo ' '.$f3;?>
                        <?php if(!empty(@$f3)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f3;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 4 :</label><?php echo ' '.$f4;?>
                        <?php if(!empty(@$f4)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f4;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 5 :</label><?php echo ' '.$f5;?>
                        <?php if(!empty(@$f5)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f5;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 6 :</label><?php echo ' '.$f6;?>
                        <?php if(!empty(@$f6)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f6;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                       <div class="form-group">
                         <label for="exampleFormControlTextarea1">Comments (if any)</label>
                         <textarea class="form-control" placeholder="<?php echo $comm;?>" id="exampleFormControlTextarea1" rows="3" name="comments" disabled></textarea>
                      </div>
                       </form>
                       
                     </p>
                     <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Check Progress</button>
                     <!-- Modal -->
                       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalCenterTitle">Status</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body">
                               Approved by:-
                                <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked disabled>
                                   <label class="form-check-label" for="inlineCheckbox1">Level 1</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked disabled>
                                   <label class="form-check-label" for="inlineCheckbox2">Level 2 </label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                                   <label class="form-check-label" for="inlineCheckbox3">Level 3</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4" disabled>
                                   <label class="form-check-label" for="inlineCheckbox4">Level 4</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5" disabled>
                                   <label class="form-check-label" for="inlineCheckbox5">Level 5</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6" disabled>
                                   <label class="form-check-label" for="inlineCheckbox6">Level 6 </label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7" disabled>
                                   <label class="form-check-label" for="inlineCheckbox7">Level 7</label>
                                 </div>
                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                             
                             </div>
                           </div>
                         </div>
                       </div>
                    </div>
                 </div>                   
                   </div>
                   <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                   <form action="landingother.php" method="post"  enctype="multipart/form-data">
                     <div class="form-group">
                       <label for="ChangeName">Changed Name</label>
                       <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <label for="changedDigitalSignature">Choose New Digital Signature</label>
                        <input type="file" class="form-control-file" id="changedDigitalSignature" name="CDigSig">
                      </div>
                      <div class="form-group">
                        <label for="changedprofile">Choose New Profile Picture</label>
                        <input type="file" class="form-control-file" id="changedprofile" name="Cprofile">
                      </div>
                      <input type="submit" class="btn btn-primary btn-lg btn-block" id="btnaling" name="changesb" value="Done">
                      <!--<button type="submit" id="changesbutton" class="btn btn-primary btn-lg btn-block" name="changesbutton">Done</button>-->
                    </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-difform" role="tabpanel" aria-labelledby="v-pills-diffform-tab">
                       <form class="searchregno">
                          <div class="form-group">
                             <div class="form-row">
                              <div class="col-sm-4">
                                  <input type="search" class="form-control" placeholder="Registration Number">
                              </div>
                                <div class="col">
                                   <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>
                               </div>
                          </div>
                       </form>
                       <form>
                        <div id="printdoc">
                         <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ਉਮੀਦਵਾਰ ਦਾ ਨਾਂ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਵਿਭਾਗ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></div>
                          </div>
                          </div>  
                             <button type="button" class="btn btn-primary" id="print" onclick="printDiv('printdoc')">Print</button>
                          </form>
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-print" role="tabpanel" aria-labelledby="v-pills-print-tab">
                     <table class="table table-striped">
                     <table class="table table-striped">
                     <thead>
                       <tr>
                        
                         <th scope="col">Date</th>
                         <th scope="col">Registration Number</th>
                         <th scope="col">Type of Examination</th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                      <tbody>
                       
                          <tr>
                           
                           <td><?php echo $dar;?></td>
                           <td><?php echo $r;?></td>
                           <td><?php echo $dtoe;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $r;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#example" class="btn btn-primary">View</a></td>
                           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Print</button></td>
                          </tr>                       
                           
                         
                        </tbody>
                      
                   </table>
                    </div>
              </div>
          </div>
      </div>
    </div>
  
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="login-landing1.js"></script>
  </body>
</html>