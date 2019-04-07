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
    <div> 
          <?php 
          $db = new PDO('mysql:host=localhost;dbname=pupa','root','');
          session_start();
          
          if(@$_GET['id'])
          {
            $id=$_GET['id'];//==1000
            if(is_numeric($id)&&$id==10000){
            ?>
            <script type='text/javascript'>alert("New User Added");</script>
            <?php
            }
          }
          if(@$_GET['id'])
          {
            $id=$_GET['id'];//==1000
            if(is_numeric($id)&&$id==1000){
            ?>
            <script type='text/javascript'>alert("Your Data Added");</script>
            <?php
            }
          }
        ?></div>
        <?php 
          if(@$_GET['id'])
          {
            $id1=$_GET['id'];
            if(is_numeric($id)&&$id==100){
            ?>
            <script type='text/javascript'>alert("Your Credentials Changed");</script>
            <?php
            }
          }
        ?></div>
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
                  $tt22=$db->prepare("SELECT profilepic FROM admin_logins where id=:0do");
                        $tt22->execute([
                            ':0do'=>$_SESSION['uid']
                          ]);
                        while($row1245 = $tt22->fetch(PDO::FETCH_OBJ))
                        {
                          $profilep1w=$row1245->profilepic;
                        }
                        

                  ?>
                   <img src="photos/<?php echo $_SESSION['uid']?>/<?php echo $profilep1w;?>" class="img-fluid img-profie">
                </div>
                <a class="nav-link side-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link side-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link side-link" id="v-pills-previous-entry-tab" data-toggle="pill" href="#v-pills-previous-entry" role="tab" aria-controls="v-pills-previous-entry" aria-selected="false">Previous Entry</a>
                <a class="nav-link side-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                
              </div>
          </div>
          <div class="col-9 main">
              <div class="tab-content" id="v-pills-tabContent">
                 <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <h3>Welcome Level Zero</h3>
                  <form action="landingzero.php" method="post" enctype="multipart/form-data">
                     <div class="form-group row">
                      <div class="col-3">
                       <label for="reg-no">Registration Number</label>
                       <input type="text" class="form-control" id="reg-no" name="regno" placeholder="Registration Number">
                     </div>
                     <div class="col-3">
                       <label for="reg-no">Description</label>
                       <select class="form-control" id="exampleFormControlSelect1" name="toe">
                          <option value="synopsis">Registration/Synopsis</option>
                          <option value="Seminar">Annual Report/Seminar</option>
                          <option value="PreSubmissionThesis">PreSubmission/Thesis</option>
                       </select>
                       <!--<input type="text" class="form-control" id="toe" name="toe" placeholder="Type of Examination">-->
                     </div>
                     <div class="col-3">
                       <label for="Date Picker">Date</label>
                       <input type="date" class="form-control" name="date">
                     </div>
                     </div>
                     <div class="form-group">
                        <label for="exampleFormControlFile1">Document 1</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="files1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 2</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile2" name="files2">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 3</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile3" name="files3">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 4</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile4" name="files4">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 5</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile5" name="files5">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 6</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile6" name="files6">
                      </div>
                      <div class="form-group">
                         <label for="exampleFormControlTextarea1">Comments (if any)</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
                      </div>
                      <input type="submit" class="btn btn-primary btn-block" id="btnaling" name="LZerod" value="Add New Student Entry For Process">
                      <!--<button type="submit" id="newstubtn" name="newstubtn" class="btn btn-primary btn-lg btn-block">Add New Student Entry For Process</button>-->

                  </form>

                   <!--<button type="button" class="btn btn-outline-info" name="addDom">Add new Student</button>-->
                 </div>
                 <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <?php 
                  
                        $qry14=$db->prepare("SELECT username,digsignature,profilepic FROM admin_logins where id=:uid");
                        $qry14->execute([
                            ':uid'=>$_SESSION['uid']
                          ]);
                        while($row123 = $qry14->fetch(PDO::FETCH_OBJ))
                        {
                          
                          $name12=$row123->username;
                          $file1s=$row123->digsignature;
                          $profilepic1s=$row123->profilepic;
                          
                        }
                      ?>
                    <div class="profile">
                      <img src="photos/<?php echo $_SESSION['uid']?>/<?php echo $profilepic1s;?>" class="img-fluid img-profie">
                    </div>
                    <div>
                     <form>
                      
                       <div class="form-group">
                         <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name12;?>">
                       </div>
                       <div class="form-group">
                        <label for="exampleFormControlFile1">Digital Signature</label>
                        <img src="photos/<?php echo $_SESSION['uid']?>/<?php echo $file1s;?>" class="img-fluid img-profie">
                         <!--
                         <input type="file" class="form-control-file" id="exampleFormControlFile1" name="DigSig">-->
                       </div>
                     </form>
                   </div>
                   </div>                 
                   <div class="tab-pane fade previously" id="v-pills-previous-entry" role="tabpanel" aria-labelledby="v-pills-previous-entry-tab">
                    The previously entered students with their details
                      <div class="card" style="width: 50rem;">
                   <div class="card-body">
                    <?php
                    
                    $qry1=$db->prepare("SELECT regno,file1,file2,file3,file4,file5,file6,comment FROM main where level=:l");
                    $qry1->execute([
                        ':l'=>$_SESSION['levell']
                      ]);
                    while($row = $qry1->fetch(PDO::FETCH_OBJ))
                    {
                      $regnos=$row->regno;
                      $file1s=$row->file1;
                      $file2s=$row->file2;
                      $file3s=$row->file3;
                      $file4s=$row->file4;
                      $file5s=$row->file5;
                      $file6s=$row->file6;
                      $commentss=$row->comment;
                    }
                    /*$row = $qry1->fetch(PDO::FETCH_OBJ);
                    if($qry1->rowCount()>0){
                            $regnos=$row->regno;
                            $file1s=$row->file1;
                            $file2s=$row->file2;
                            $file3s=$row->file3;
                            $file4s=$row->file4;
                            $file5s=$row->file5;
                            $file6s=$row->file6;
                            $commentss=$row->comment;
                    }*/
                    ?>
                     <h5 class="card-title">Registration Number</h5>
                     <h6 class="card-subtitle mb-2 text-muted"><?php echo $regnos;?></h6>
                     <p class="card-text">
                       <form>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 1</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file1" value=""><?php echo $file1s;?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 2</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile2" name="file2"><?php echo $file2s;?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 3</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile3" name="file3"><?php echo $file3s;?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 4</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile4" name="file4"><?php echo $file4s;?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 5</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile5" name="file5"><?php echo $file5s;?>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Document 6</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile6" name="file6"><?php echo $file6s;?>
                      </div>
                       <div class="form-group">
                         <label for="exampleFormControlTextarea1">Comments (if any)</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" disabled placeholder="<?php echo $commentss;?>" rows="3" name="comments"></textarea>
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
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked>
                                   <label class="form-check-label" for="inlineCheckbox1">Level 1</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" disabled>
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
                   <form action="landingzero.php" method="post"  enctype="multipart/form-data">
                     <div class="form-group">
                       <label for="ChangeName">Changed Name</label>
                       <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <label for="changedDigitalSignature">Choose New Digital Signature</label>
                        <input type="file" class="form-control-file" id="changedDigitalSignature" name="ChangedDigSig">
                      </div>
                      <div class="form-group">
                        <label for="changedprofile">Choose New Profile Picture</label>
                        <input type="file" class="form-control-file" id="changedprofile" name="changedprofile">
                      </div>
                      <input type="submit" class="btn btn-primary btn-block" id="btnaling" name="LZeroc" value="Done">
                      <!--<button type="submit" id="changesbutton" class="btn btn-primary btn-lg btn-block" name="changesbutton">Done</button>-->
                    </form>
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