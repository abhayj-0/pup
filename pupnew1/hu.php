<html>
<head>

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
<div class="modal-body">
                              <div class="card" style="width: 50rem;">
                                <div class="card-body">
                                  <h5 class="card-title">Registration Number</h5>
                                  <h6 class="card-subtitle mb-2 text-muted"><?php echo 125;?></h6>
                                  <?php
                                  $con=mysqli_connect("localhost","root","","pupa");
                                    $uu1="select regno,file1,file2,file3,file4,file5,file6,comment from level0details where regno='1245'";
                                    $ytu1=mysqli_query($con,$uu1);
                                    while($ruu1=mysqli_fetch_array($ytu1))
                                    {
                                      $f1=$ruu1[1];
                                      $f2=$ruu1[2];
                                      $f3=$ruu1[3];
                                      $f4=$ruu1[4];
                                      $f5=$ruu1[5];
                                      $f6=$ruu1[6];
                                      $comm=$ruu1[7];
                                      
                                  ?>

                                  <p class="card-text">
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 1</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file1" value=""><?php echo $f1;?>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 2</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile2" name="file2">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 3</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile3" name="file3">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 4</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile4" name="file4">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 5</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile5" name="file5">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlFile1">Document 6</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile6" name="file6">
                                   </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Comments (if any)</label>
                                      <textarea class="form-control" placeholder="<?php $r?>" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
                                   </div>
                                  
                                  </p>
                                  <?php
                                    }
                                    ?>
                                    <form role="form" method="POST" action="approvalll.php"> 
                                  <a class="btn btn-primary" id="approve" name="approve">Approve</a>
                                  <input type="submit" class="btn btn-primary" id="approve" name="approve" value="Approve">
                                  <button  type="button" class="btn btn-primary" id="disapprove" name="disapprove">Disapprove</button>
                                </div>
                            </form>
                                </div>
                               </div>
                               <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="login-landing1.js"></script>
</body>
</html>                              