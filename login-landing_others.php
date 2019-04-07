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
    /*elseif ($_SESSION['levell']=='Level4') {
     $o='Level3';
    }*/

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
                  <a class="nav-link" href="levelsPortal.html">HOME</a>
              </li>              
              <li class="nav-item">
                  <a class="nav-link" href="search.html">SEARCH</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">NOTICES</a>
              </li>              
          </ul>
        </div>
        <div><a href="logou.php" class="btn btn-primary">Log Out</a></div>
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
                <?php if($_SESSION['levell']=='Level2'){?>
                <a class="nav-link side-link" id="v-pills-syno-tab" data-toggle="pill" href="#v-pills-syno" role="tab" aria-controls="v-pills-syno" aria-selected="false">Synopsis</a>
                <?php }?>
                <a class="nav-link side-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link side-link" id="v-pills-previous-entry-tab" data-toggle="pill" href="#v-pills-previous-entry" role="tab" aria-controls="v-pills-previous-entry" aria-selected="false">Previously Approved</a>
                <?php if($_SESSION['levell']=='Level1'){?>
                <a class="nav-link side-link" id="v-pills-print-tab" data-toggle="pill" href="#v-pills-print" role="tab" aria-controls="v-pills-print" aria-selected="false">Print</a>
                <?php }?>
                
                <a class="nav-link side-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                <?php if($_SESSION['levell']=='Level1'){?>
                <a class="nav-link side-link" id="v-pills-difform-tab" data-toggle="pill" href="#v-pills-difform" role="tab" aria-controls="v-pills-difform" aria-selected="false">Extra Form</a>
                <?php }?>
                <?php if($_SESSION['levell']=='Level1'){?>
                <a class="nav-link side-link" id="v-pills-addnew-tab" data-toggle="pill" href="#v-pills-addnew" role="tab" aria-controls="v-pills-addnew" aria-selected="false">Add New Clerk</a>
                <?php }?>
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
                         <th scope="col">Description</th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                      <tbody>
                        <?php if($_SESSION['levell']=='Level3'){
                          $lovelnew=$_SESSION['levell'];
                          $qry15new = $db->prepare("select level from main where temp=:tr" );
                          $qry15new->execute([
                              ':tr'=>'Yes'
                              ]);
                          while($ruu15new = $qry15new->fetch(PDO::FETCH_OBJ))
                          {
                            $rouynew=$ruu15new->level;  
                          }
                          $qrynew = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment,datef,type_of_examination from main where temp=:tro124 AND level=:o4 AND type_of_examination=:yotm" );
                        $qrynew->execute([
                          ':tro124'=>'Yes',
                          ':o4'=>'Level1',
                          ':yotm'=>'synopsis'
                          ]);
                        while($ruu16new = $qrynew->fetch(PDO::FETCH_OBJ))
                        {
                            $rnew=$ruu16new->regno;
                            $f1new=$ruu16new->file1;
                            $f2new=$ruu16new->file2;
                            $f3new=$ruu16new->file3;
                            $f4new=$ruu16new->file4;
                            $f5new=$ruu16new->file5;
                            $f6new=$ruu16new->file6;
                            $commnew=$ruu16new->comment;
                            $darnew=$ruu16new->datef;
                            $dtoenew=$ruu16new->type_of_examination;
                       /*ethon udaya*/
                       ?>
                        <tr>
                           
                           <td><?php echo $darnew;?></td>
                           <td><?php echo $rnew;?></td>
                           <td><?php echo $dtoenew;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $rnew;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#examplelevel3" class="btn btn-primary">View</a></td>
                          </tr>
                          
                       <?php
                            }
                            ?>
                           <div class="modal fade" id="examplelevel3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $rnew;?></h6>
                                  <?php
                        $qry17 = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment from level0details where regno=:ror" );
                        $qry17->execute([
                          ':ror'=>$rnew
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
                                     <label for="exampleFormControlFile1">Document 1 : </label><?php echo ' '.$f1new;?>
                                     <?php if(!empty(@$f1new)){?> 
                                      <img src="Level0details/<?php echo $rnew;?>/<?php echo $f1new;?>" class="img-fluid img-profie">
                                     <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 2 : </label><?php echo ' '.$f2new;?>
                                      <?php if(!empty(@$f2new)){?> 
                                     <img src="Level0details/<?php echo $r;?>/<?php echo $f2new;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 3 : </label><?php echo ' '.$f3new;?>
                                     <?php if(!empty(@$f3new)){?> 
                                     <img src="Level0details/<?php echo $r;?>/<?php echo $f3new;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 4 : </label><?php echo ' '.$f4new;?>
                                    <?php if(!empty(@$f4new)){?> 
                                    <img src="Level0details/<?php echo $r;?>/<?php echo $f4new;?>" class="img-fluid img-profie">
                                    <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 5 : </label><?php echo ' '.$f5new;?>
                                    <?php if(!empty(@$f5new)){?> 
                                    <img src="Level0details/<?php echo $r;?>/<?php echo $f5new;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 6 : </label><?php echo ' '.$f6new;?>
                                     <?php if(!empty(@$f6new)){?> 
                                     <img src="Level0details/<?php echo $r;?>/<?php echo $f6new;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Comments (if any)</label>
                                      <textarea class="form-control" placeholder="<?php echo $commnew;?>" id="exampleFormControlTextarea1" rows="3" name="comments" disabled></textarea>
                                   </div>
                                  
                                  </p>
                                  <?php
                                    }
                                   
                           
                                    ?>
                                    <form role="form" method="POST" action="approvalll.php"> 
                                    <input type="hidden" name="rno" value="<?php echo $rnew?>">
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
                             
                           </div>
                         </div>
                       </div>
                     </div>
                            <?php
                        }
                        
                          
                      if($_SESSION['levell']=='Level2'){
                          $lovelnew1=$_SESSION['levell'];
                          $qry15nj = $db->prepare("select level,type_of_examination from main where temp=:tr AND level=:pk" );
                        $qry15nj->execute([
                          ':tr'=>'Yes',
                          ':pk'=>'Level1'
                          ]);
                        while($ruu15nj = $qry15nj->fetch(PDO::FETCH_OBJ))
                        {
                          $rouylnj=$ruu15nj->level;
                          $rouytnj=$ruu15nj->type_of_examination;  
                        }
                          if($rouylnj=='Level1' AND $rouytnj=='synopsis'){
                            //continue;
                          }
                          else{
                            
                        $qry16nj = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment,datef,type_of_examination  from main where temp=:tro AND level=:o AND type_of_examination IN ('Seminar','PreSubmissionThesis')" );
                        $qry16nj->execute([
                          ':tro'=>'Yes',
                          ':o'=>$o
                          ]);

                        while($ruu16nj = $qry16nj->fetch(PDO::FETCH_OBJ))
                        {
                            $rnj=$ruu16nj->regno;
                            $f1nj=$ruu16nj->file1;
                            $f2nj=$ruu16nj->file2;
                            $f3nj=$ruu16nj->file3;
                            $f4nj=$ruu16nj->file4;
                            $f5nj=$ruu16nj->file5;
                            $f6nj=$ruu16nj->file6;
                            $commnj=$ruu16nj->comment;
                            $darnj=$ruu16nj->datef;
                            $dtoenj=$ruu16nj->type_of_examination;
                       /*ethon udaya*/

                        ?>
                          <tr>
                           
                           <td><?php echo $darnj;?></td>
                           <td><?php echo $rnj;?></td>
                           <td><?php echo $dtoenj;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $rnj;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#example" class="btn btn-primary">View</a></td>
                          </tr>                       
                        
                         <?php 
                       }                            
                          }
                        

                        
                      }
                      if($_SESSION['levell']=='Level1'){
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
                     }
                       
                          ?>
                         
                        <?php 
                         
                        ?>
                        </tbody>
                      
                   </table>
                   
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
                    
                     <!--Sare levels ke liye view modal except level3-->
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
                    $qry21 = $db->prepare("select file1,file2,file3,file4,file5,file6,comment,regno from main where level=:l");
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
                     <h6 class="card-subtitle mb-2 text-muted"><?php if(!empty($re)){echo $re;}else{echo"None";} ?></h6>
                     <p class="card-text">
                     <form>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 1 :</label><?php echo ' '.@$f1;?>
                        <?php if(!empty(@$f1)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f1;?>" class="img-fluid img-profie">
                        <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 2 :</label><?php echo ' '.@$f2;?>
                        <?php if(!empty(@$f2)){?> 
                         <img src="Level0details/<?php echo $re;?>/<?php echo $f2;?>" class="img-fluid img-profie">
                          <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 3 :</label><?php echo ' '.@$f3;?>
                        <?php if(!empty(@$f3)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f3;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 4 :</label><?php echo ' '.@$f4;?>
                        <?php if(!empty(@$f4)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f4;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 5 :</label><?php echo ' '.@$f5;?>
                        <?php if(!empty(@$f5)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f5;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 6 :</label><?php echo ' '.@$f6;?>
                        <?php if(!empty(@$f6)){?> 
                        <img src="Level0details/<?php echo $re;?>/<?php echo $f6;?>" class="img-fluid img-profie">
                         <?php }else{echo"None";}?>
                      </div>
                       <div class="form-group">
                         <label for="exampleFormControlTextarea1">Comments (if any)</label>
                         <textarea class="form-control" placeholder="<?php echo @$comm;?>" id="exampleFormControlTextarea1" rows="3" name="comments" disabled></textarea>
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
                    <div class="tab-pane fade" id="v-pills-syno" role="tabpanel" aria-labelledby="v-pills-syno-tab-tab">
                      <div>
                      <table class="table table-striped">
                       <thead>
                         <tr>
                          
                           <th scope="col">Date</th>
                           <th scope="col">Registration Number</th>
                           <th scope="col">Description</th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                         </tr>
                       </thead>
                      <tbody>
                        <?php
                        $lovelf=$_SESSION['levell'];
                       $qry15fc = $db->prepare("select level from main where temp=:tr" );
                        $qry15fc->execute([
                          ':tr'=>'Yes'
                          ]);
                        while($ruu15fc = $qry15fc->fetch(PDO::FETCH_OBJ))
                        {
                          $rouyfc=$ruu15fc->level;  
                        }


                        $qry1nj = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment,datef,type_of_examination  from main where temp=:tro AND level=:o AND type_of_examination=:lnpu" );
                        $qry1nj->execute([
                          ':tro'=>'Yes',
                          ':o'=>'Level3',
                          ':lnpu'=>'synopsis'
                          ]);
                        while($ruu1nj = $qry1nj->fetch(PDO::FETCH_OBJ))
                        {
                            $rec=$ruu1nj->regno;
                            /*$file1p=$ruu1nj->file1;
                            $file2p=$ruu1nj->file2;
                            $file3p=$ruu1nj->file3;
                            $file4p=$ruu1nj->file4;
                            $file5p=$ruu1nj->file5;
                            $f6nlp=$ruu1nj->file6;
                            $commput=$ruu1nj->comment;*/
                            $darmkp=$ruu1nj->datef;
                            $dtoemkp=$ruu1nj->type_of_examination;
                       /*ethon udaya*/

                        ?>
                          <tr>
                           
                           <td><?php echo $darmkp;?></td>
                           <td><?php echo $rec;?></td>
                           <td><?php echo $dtoemkp;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $rec;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#examplehj" class="btn btn-primary">View</a></td>
                          </tr>                       
                        
                         <?php 
                       }             
                       ?>
                      </tbody>
                   </table>
                   <div class="modal fade" id="examplehj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $rec;?></h6>
                                  <?php
                        $ry17 = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment from level0details where regno=:ror" );
                        $ry17->execute([
                          ':ror'=>$rec
                          ]);
                        while($uu17 = $ry17->fetch(PDO::FETCH_OBJ))
                        {
                            $gfile1r=$uu17->file1;
                            $gfile2r=$uu17->file2;
                            $gfile3r=$uu17->file3;
                            $gfile4r=$uu17->file4;
                            $gfile5r=$uu17->file5;
                            $gfile6r=$uu17->file6;
                            $gcommr=$uu17->comment;
/*ethon no2 udaya*/
                                  ?>

                                  <p class="card-text">
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 1 : </label><?php echo ' '.$gfile1r;?>
                                     <?php if(!empty(@$gfile1r)){?> 
                                      <img src="Level0details/<?php echo $rec;?>/<?php echo $gfile1r;?>" class="img-fluid img-profie">
                                     <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 2 : </label><?php echo ' '.$gfile2r;?>
                                      <?php if(!empty(@$gfile2r)){?> 
                                     <img src="Level0details/<?php echo $rec;?>/<?php echo $gfile2r;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 3 : </label><?php echo ' '.$gfile3r;?>
                                     <?php if(!empty(@$gfile3r)){?> 
                                     <img src="Level0details/<?php echo $rec;?>/<?php echo $gfile3r;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 4 : </label><?php echo ' '.$gfile4r;?>
                                    <?php if(!empty(@$gfile4r)){?> 
                                    <img src="Level0details/<?php echo $rec;?>/<?php echo $gfile4r;?>" class="img-fluid img-profie">
                                    <?php }else{echo"None";}?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 5 : </label><?php echo ' '.$gfile5r;?>
                                    <?php if(!empty(@$gfile5r)){?> 
                                    <img src="Level0details/<?php echo $rec;?>/<?php echo $gfile5r;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 6 : </label><?php echo ' '.$gfile6r;?>
                                     <?php if(!empty(@$gfile6r)){?> 
                                     <img src="Level0details/<?php echo $rec;?>/<?php echo $gfile6r;?>" class="img-fluid img-profie">
                                      <?php }else{echo"None";}?> 
                                   </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Comments (if any)</label>
                                      <textarea class="form-control" placeholder="<?php echo $gcommr;?>" id="exampleFormControlTextarea1" rows="3" name="comments" disabled></textarea>
                                   </div>
                                  
                                  </p>
                                  <?php
                                    }
                                   
                           
                                    ?>
                                    <form role="form" method="POST" action="approvalll.php"> 
                                    <input type="hidden" name="rno" value="<?php echo $rec?>">
                                    <input type="submit" class="btn btn-primary" id="approve" name="approve" value="Approve">
                                    <input type="submit" class="btn btn-primary" id="disapprove" name="disapprove" value="Disapprove">

                                  </form>
                                </div>
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
                    <div class="tab-pane fade" id="v-pills-addnew" role="tabpanel" aria-labelledby="v-pills-addnew-tab-tab">
                        <form class="needs-validation" id="formdiv" novalidate action="landingzero.php" method="post"  enctype="multipart/form-data">
                             <div class="form-row">
                               <div class="col-md-12 mb-3">
                                 <label for="validationCustom01">Name</label>
                                 <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="nme" required>
                                 <div class="invalid-feedback">
                                   Please fill a valid  Name
                                 </div>
                               </div>
                              </div> 
                              
                             <div class="form-row">
                               <div class="col-md-12 mb-3">
                                 <label for="validationCustom03">Password</label>
                                 <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="passw">
                                 <div class="invalid-feedback">
                                   Please provide a valid password.
                                 </div>
                               </div>
                               </div>
                             <div class="form-row">
                               <div class="col-md-12 mb-3">
                                 <div class="custom-file">
                                   <label class="custom-file-label" for="validatedCustomFile">Choose a profile picture</label>
                                   <input type="file" class="custom-file-input" name="newpp" id="validatedCustomFile" accept=".png,.jpg,.jpeg" required>    
                                   <div class="invalid-feedback">Type of file should onlt be png,jpg or jpeg.</div>
                                 </div>
                               </div> 
                             </div>   
                             <div class="form-row">
                               <div class="col-md-12 mb-3">
                                 <div class="custom-file">
                                   <label class="custom-file-label" for="validatedCustomFile">Choose a file containing your digital signature</label>
                                   <input type="file" class="custom-file-input" id="validatedCustomFile" name="newdsig" accept=".png,.jpg,.jpeg" required>    
                                   <div class="invalid-feedback">Type of file should onlt be png,jpg or jpeg.</div>
                                 </div>
                               </div> 
                             </div>   
  
                            <input type="submit" class="btn btn-primary btn-block" id="btnaling" name="LZd" value="Add new user">
                             <!--<button class="btn btn-primary" type="submit">Add new user</button>-->
                           </form>

                    </div>
                    <div class="tab-pane fade" id="v-pills-difform" role="tabpanel" aria-labelledby="v-pills-diffform-tab">
                       <form class="searchregno" action="login-landing_others.php" method="post">
                          <div class="form-group">
                             <div class="form-row">
                              
                              <div class="col-sm-4">
                                  <input type="text" name="ffg" class="form-control" placeholder="Registration Number">
                              </div>
                                <div class="col">
                                  <input type="submit" class="btn btn-primary" name="sb" value="Submit">
                                   <!--<button type="submit" class="btn btn-primary mb-2">Submit</button>-->
                                </div>
                              </form>
                              <?php
                                if(isset($_POST['sb'])){
                                $refno=@$_POST['ffg'];
                                
                                $ooo02 = $db->prepare("select name from candidate_info where regno=:lop1");
                                $ooo02->execute([
                                ':lop1'=>$refno
                                 ]);
                              while($f5g6 = $ooo02->fetch(PDO::FETCH_OBJ))
                              {
                                  $roe=$f5g6->name;
                                  
                              }
                                $qry21 = $db->prepare("select faculty,department from registration_info where uni_reg_no=:l1");
                                $qry21->execute([
                                ':l1'=>$refno
                                 ]);
                              while($ruu21 = $qry21->fetch(PDO::FETCH_OBJ))
                              {
                                  $rw=$ruu21->faculty;
                                  $rw1=$ruu21->department;
                              }
                            }
                                    ?>
                               </div>
                          </div>
                     <form action="lastli.php" method="post">
                        <div id="printdoc">
                          <input type="hidden" id="custId" name="regn" value="<?php echo $refno;?>">
                         <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">1. ਉਮੀਦਵਾਰ ਦਾ ਨਾਂ</label>
                            <div class="col-sm-10"><input type="text" placeholder="<?php echo @$roe;?>" name="name" value="<?php echo @$roe;?>" class="form-control" id="formGroupExampleInput" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">2. ਡਿਗਰੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ph" placeholder="phd" value="phd" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">3. ਵਿਭਾਗ</label>
                            <div class="col-sm-10"><input type="text" class="form-control"name="dept" value="<?php echo @$rw1;?>"  placeholder="<?php echo @$rw1;?>" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">4. ਫੈਕਲਟੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="facul" value="<?php echo @$rw;?>" placeholder="<?php echo @$rw;?>" id="formGroupExampleInput2" ></div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">5. ਪਾਤਰਤਾ ਸਲਿੱਪ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="patrta" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">6. ਅਲਾਟਮੈਂਟ ਦੀ ਪ੍ਰਵਾਨਗੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="alotdip" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">7. ਨਿਗਰਾਨ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="nigran" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">8. ਸਹਾਇਕ ਨਿਗਰਾਨ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="helper" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">9. ਰਜਿਸਟਰੇਸ਼ਨ ਫਾਰਮ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="regform" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">10. ਰਜਿਸਟਰੇਸ਼ਨ ਫੀਸ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="regfees" id="formGroupExampleInput2" ></div>
                          </div>
                         <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">11. ਵਿਭਾਗੀ ਰਿਸਰਚ ਬੋਰਡ ਲਈ ਡੀਨ, ਅਕਾਦਮਿਕ ਮਾਮਲਿਆਂ ਵਲੋ ਨਾਮਜ਼ਦ ਪ੍ਰੋਫ਼ੈਸਰ</label>
                            <div class="col-sm-10"><input type="text" class="form-control"name="prof"  id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">12. ਵਿਭਾਗੀ ਰਿਸਰਚ ਬੋਰਡ ਦੀ ਇਕਤਰਤਾ ਦੀ ਕਾਰਵਾਈ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="karwahi" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">13. ਨਿਗਰਾਨ ਦੀ ਟਿੱਪਣੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="tip" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">14. ਸਹਾਇਕ ਨਿਗਰਾਨ ਲਈ </label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="help" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">15. NOC</label>
                            <div class="col-sm-10"><input type="text" class="form-control"name="noc"  id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">16. ਕੋਰਸ ਵਰਕ ਦਾ ਨਤੀਜਾ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="res" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">17. ਪਲੈਜਿਰੀਜਮ ਸੰਬੰਧਿਤ  ਸਰਟੀਫਿਕੇਟ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="plag" id="formGroupExampleInput2" ></div>
                          </div>
                          <div class="form-group row">
                            <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">18. ਅੈਥੀਕਲ ਕਮੇਟੀ ਦੀ ਪ੍ਰਵਾਨਗੀ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ethical" id="formGroupExampleInput2" ></div>
                          </div>
                          </div>
                          <input type="submit" class="btn btn-primary" name="sp3" value="Send to Level 3">
                          <button type="button" class="btn btn-primary" id="print" onclick="printDiv('printdoc')">Print</button>
                          </form> 
                             
                        
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-print" role="tabpanel" aria-labelledby="v-pills-print-tab">
                     <table class="table table-striped">
                     <thead>
                       <tr>
                        
                         <th scope="col">Date</th>
                         <th scope="col">Registration Number</th>
                         <th scope="col">Description</th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                      <tbody>
                        <?php 
                          $qry1689 = $db->prepare("select regno,file1,file2,file3,file4,file5,file6,comment,datef,type_of_examination from main where temp=:tro AND level=:o" );
                          $qry1689->execute([
                            ':tro'=>'Yes',
                            ':o'=>'Level2'
                            ]);
                        while($ruu1689 = $qry1689->fetch(PDO::FETCH_OBJ))
                        {
                            $r24=$ruu1689->regno;
                            $f124=$ruu1689->file1;
                            $f224=$ruu1689->file2;
                            $f324=$ruu1689->file3;
                            $f424=$ruu1689->file4;
                            $f524=$ruu1689->file5;
                            $f624=$ruu1689->file6;
                            $comm24=$ruu1689->comment;
                            $dar24=$ruu1689->datef;
                            $dtoe24=$ruu1689->type_of_examination;
                        ?>
                          <tr>
                           <td><?php echo $dar24;?></td>
                           <td><?php echo $r24;?></td>
                           <td><?php echo $dtoe24;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $r24;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#exampleModal1" class="btn btn-primary">View</a></td>
                           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Print</button></td>
                          </tr>                       
                           
                         <?php 
                          }
                         ?>
                         <?php 
                          $qry19 = $db->prepare("select regno from synop where temp=:tro AND level=:o" );
                          $qry19->execute([
                            ':tro'=>'Yes',
                            ':o'=>'Level2'
                            ]);
                        while($ru19 = $qry19->fetch(PDO::FETCH_OBJ))
                        {
                            $r224=$ru19->regno;
                        }
                        $qry20 = $db->prepare("select datef,type_of_examination from main where regno=:rot" );
                          $qry20->execute([
                            ':rot'=>$r224
                            ]);
                        while($ru20 = $qry20->fetch(PDO::FETCH_OBJ))
                        {
                            $ra20=$ru20->datef;
                            $rad20=$ru20->type_of_examination;
                        
                        ?>
                          <tr>
                           <td><?php echo $dar224;?></td>
                           <td><?php echo $r224;?></td>
                           <td><?php echo $dtoe224;?></td>
                           <td><a type="button" href="login-landing_others.php?id=<?php echo $r224;?>" class="btn btn-primary">Click To Generate Id</a></td>
                           <td><a data-toggle="modal" style="color:#fff;" data-target="#exampleModal1" class="btn btn-primary">View</a></td>
                           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Print</button></td>
                          </tr>                       
                           
                         <?php 
                          }
                         ?>
                        </tbody>
                      
                   </table>
                   <!-- Modal -->
                     <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <?php 
                                    $f8g8 = $db->prepare("select file1,file2,file3,file4,file5,file6,dlevel0,dlevel1,dlevel2,dlevel3,zerid from main where regno=:roar" );
                                      $f8g8->execute([
                                        ':roar'=>$r
                                        ]);
                                      while($rola17 = $f8g8->fetch(PDO::FETCH_OBJ))
                                      {
                                          $fa1=$rola17->file1;
                                          /*$fa2=$rola17->file2;
                                          $fa3=$rola17->file3;
                                          $fa4=$rola17->file4;
                                          $fa5=$rola17->file5;
                                          $fa6=$rola17->file6;*/
                                          $fa7=$rola17->dlevel0;
                                          $fa8=$rola17->dlevel1;
                                          $fa9=$rola17->dlevel2;
                                          $fa10=$rola17->dlevel3;
                                          $zid=$rola17->zerid;
                                        }
                                        
                                    ?>
                                      <div class="documentimage"><img width="100" src="Level0details/<?php echo $r;?>/<?php echo $fa1;?>"></div>
                                  <div class="row sigcontainer">
                                    <div class="col signature">
                                      <?php if(!empty(@$fa7)){?>  
                                        <img src="photos/<?php echo $zid;?>/<?php echo $fa7;?>">
                                      <?php }else{echo"Not Approved By Level 0";}?> 
                                    </div>
                                    <div class="col signature">
                                      <?php if(!empty(@$fa8)){?> 
                                        <img src="photos/2/<?php echo $fa8;?>">
                                      <?php }else{echo"Not Approved By Level 1";}?> 
                                    </div>
                                    <div class="col signature">
                                      <?php if(!empty(@$fa9)){?> 
                                        <img src="photos/5/<?php echo $fa9;?>">
                                      <?php }else{echo"Not Approved By Level 2";}?> 
                                    </div>
                                    <div class="col signature">
                                      <?php if(!empty(@$fa10)){?> 
                                        <img src="photos/3/<?php echo $fa10;?>"></div>
                                      <?php }else{echo"Not Approved By Level 3";}?> 
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