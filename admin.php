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
    <div>
      <form class="needs-validation" id="formdiv" novalidate action="adminadd.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <!--<div class="col-md-12 mb-3">
      <label for="validationCustom01">Name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" required>
      <div class="invalid-feedback">
        Please fill a valid  Name
      </div>
    </div>-->
   </div> 
   <div class="form-row"> 
    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control"name="username" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom03">Designation</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="Designation" required>
      <div class="invalid-feedback">
        Please provide a valid designation.
      </div>
    </div>
    </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <div class="custom-file">
        <label class="custom-file-label" for="validatedCustomFile">Choose a profile picture</label>
        <input type="file" class="custom-file-input" id="validatedCustomFile" accept=".png,.jpg,.jpeg" required>    
        <div class="invalid-feedback">Type of file should only be png,jpg or jpeg.</div>
      </div>
    </div> 
  </div>   
  
  <input type="submit" class="btn btn-primary" id="btnaling" name="AAdDc" value="Add New User">
  <!--<button class="btn btn-primary" type="submit">Add New User</button>-->
</form>
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