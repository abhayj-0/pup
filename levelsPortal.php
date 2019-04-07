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
    <link rel="stylesheet" type="text/css" href="levels.css">
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
        
    </nav>
    <div class="login-form container">
      <form role="form" method="POST" action="login_deciding.php"> 
        <div class="form-group">         
          <label for="exampleInputEmail1">Username</label>
          <input type="name" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
          <!--<small id="emailHelp" class="form-text text-muted">Never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
           <label for="exampleFormControlSelect1">Select Level</label>
           <select class="form-control" name="level" id="exampleFormControlSelect1">
              <option value="Level0">Level 0(Clerk)</option>
              <option value="Level1">Level 1</option>
              <option value="Level2">Level 2</option>
              <option value="Level3">Level 3</option>
              <!--<option value="Level4">Level 4</option>
              <option value="Level5">Level 5</option>
              <option value="Level6">Level 6</option>-->
            </select>
        </div>
        <div> 
          <?php 
          if(@$_GET['id'])
          {
            $id=$_GET['id'];
            if(is_numeric($id)){
            ?>
            <p style="margin-left:120px;color:red;margin-top:-10px;"><?php echo "Wrong Username/Password/Level.";?></p>
            <?php
            }
          }
        ?></div>
         <!--<div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
         <label class="form-check-label" for="exampleCheck1">Keep me signed in?</label>
        </div>-->
        <input type="submit" class="btn btn-primary btn-block" id="btnaling" name="ss" value="Submit">
        <!--<button type="submit" class="btn btn-primary btn-block">Submit</button>-->
      </form>
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="main.js"></script>
  </body>
</html>