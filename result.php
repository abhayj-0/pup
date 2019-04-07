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
    <title>Pup Research Branch</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
       <a class="navbar-brand" href="#">
       <img src="index_01.gif"  alt="">
       </a>
    </nav>
   <?php 
   $db = new PDO('mysql:host=localhost;dbname=pupa','root','');

    if(isset($_POST['ss'])){
    $reg_no=$_POST['reg_no'];
    }
  $oops=$db->prepare("select * from candidate_info where regno=:0do");
    $oops->execute([
        ':0do'=>$reg_no
      ]);
    while($oopus34 = $oops->fetch(PDO::FETCH_OBJ))
    {
    
    /*$cmd="select * from info where regno=$reg_no";
        $res=mysqli_query($con,$cmd);
        while($row=mysqli_fetch_array($res))
        {*/
   ?>
    <div class="container">
    
    <div id="reg-no">
        <div class="form-group row">
             <label for="inputregno" class="col-sm-2 col-form-label">Registration Number</label>
             <div class="col-sm-10">
                 <input type="text" value="<?php echo $oopus34->regno;?>"name="reg_no" disabled class="form-control" id="inputregno" placeholder="Registration Number">
             </div>
             <div class="invalid-feedback">
                Please choose a Registration Number.
            </div>
        </div>
       
      
    </div>
    <div id="candidate-info">
      <div>
        <div class="alert alert-dark" role="alert">
            <a href="#" class="alert-link">CANDIDATE INFORMATION</a>
        </div>
      </div>
      
        <div class="form-row">
             <div class="col-6 col-padding">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" disabled placeholder="Name" value="<?php echo $oopus34->name;?>">
             </div>
             <div class="col-6 col-padding">
                <label for="Gender">Gender</label>
                
                <input type="text" class="form-control" disabled placeholder="Gender" id="exampleFormControlSelect1" value="<?php echo $oopus34->gender;?>">
             
             </div>          
          </div>
          <div class="form-row">
            <div class="col-6 col-padding">
                <label for="Category">Category</label>
                
                <input type="text" class="form-control" disabled placeholder="Gender" id="exampleFormControlSelect1" value="<?php echo $oopus34->category;?>">
             
            </div>
            <div class="col-6 col-padding">
                <label for="Foreign Student Category">Foreign Student Category</label>
                <input type="text" class="form-control" disabled placeholder="Gender" id="exampleFormControlSelect1" value="<?php echo $oopus34->foreign_student_cat;?>">
                
             
             </div>
          </div>
          <div class="form-row">
            <div class="col-6 col-padding">
                <label for="Father Namer">Father Name</label>
                <input type="text" class="form-control" disabled placeholder="Father Name"value="<?php echo $oopus34->father_name;?>" name="fname">
            </div>
            <div class="col-6 col-padding">
                <label for="Mother Name">Mother Name</label>
                <input type="text" class="form-control" disabled placeholder="Mother Name"value="<?php echo $oopus34->mother_name;?>" name="mname">
             </div>
          </div>
          <div class="form-group" id="Permanent-Address">
              <label for="Permanent Address">Permanent Address</label>
              <div class="form-row">
                 <div class="col-4 col-padding">
                    <label for="Nationalityr">Nationality</label>
                    <input type="text" class="form-control" disabled placeholder="Nationality"value="<?php echo $oopus34->p_nationality;?>" name="p_nationality" id="p_nationality">
                 </div>
                 <div class="col-4 col-padding">
                    <label for="Stater">State</label>
                    <input type="text" class="form-control" disabled placeholder="State" value="<?php echo $oopus34->p_state;?>"name="p_state" id="p_state">
                 </div> 
                 <div class="col-4 col-padding">
                    <label for="City">City</label>
                    <input type="text" class="form-control" disabled placeholder="City"value="<?php echo $oopus34->p_city;?>" name="p_city" id="p_city">
                 </div>             
              </div>
              <div class="form-row">
                 <div class="col-4 col-padding">
                    <label for="District">District</label>
                    <input type="text" class="form-control" disabled placeholder="District" value="<?php echo $oopus34->p_district;?>"name="p_district" id="p_district">
                 </div>
                 <div class="col-4 col-padding">
                    <label for="Country">Country</label>
                    <input type="text" class="form-control" disabled placeholder="Country"value="<?php echo $oopus34->p_country;?>" name="p_country" id="p_country">
                 </div> 
                 <div class="col-4 col-padding">
                    <label for="Pincode">Pincode</label>
                    <input type="text" class="form-control" disabled placeholder="Pincode"value="<?php echo $oopus34->p_pincode;?>" name="p_pincode" id="p_pincode">
                 </div>             
              </div>
              <div class="col-12 col-padding">
                <label for="Address">Address</label>
                <input type="text" class="form-control" disabled placeholder="Address" value="<?php echo $oopus34->p_address;?>"name="p_address" id="p_address">
              </div>
          </div>
          <div class="form-group" id="Correspondance-Address">
              <div class="row">
                <div class="col-auto">
                  <label for="Correspondance Address">Correspondance Address</label>
                </div>
               
              </div>
              <div class="form-row">
                 <div class="col-4 col-padding">
                    <label for="Nationalityr">Nationality</label>
                    <input type="text" class="form-control" disabled placeholder="Nationality"value="<?php echo $oopus34->c_nationality;?>" name="c_nationality" id="c_nationality">
                 </div>
                 <div class="col-4 col-padding">
                    <label for="Stater">State</label>
                    <input type="text" class="form-control" disabled placeholder="State" value="<?php echo $oopus34->c_state;?>"name="c_state" id="c_state">
                 </div> 
                 <div class="col-4 col-padding">
                    <label for="City">City</label>
                    <input type="text" class="form-control" disabled placeholder="City"value="<?php echo $oopus34->c_city;?>" name="c_city" id="c_city">
                 </div>             
              </div>
              <div class="form-row">
                 <div class="col-4 col-padding">
                    <label for="District">District</label>
                    <input type="text" class="form-control" disabled placeholder="District" value="<?php echo $oopus34->c_district;?>"name="c_district" id="c_district">
                 </div>
                 <div class="col-4 col-padding">
                    <label for="Country">Country</label>
                    <input type="text" class="form-control" disabled placeholder="Country" value="<?php echo $oopus34->c_country;?>"name="c_country" id="c_country">
                 </div> 
                 <div class="col-4 col-padding">
                    <label for="Pincode">Pincode</label>
                    <input type="text" class="form-control" disabled placeholder="Pincode" value="<?php echo $oopus34->c_pincode;?>"name="c_pincode" id="c_pincode">
                 </div>             
              </div>
              <div class="col-12 col-padding">
                <label for="Address">Address</label>
                    <input type="text" class="form-control" disabled placeholder="Address" value="<?php echo $oopus34->c_address;?>"name="c_address" id="c_address">
              </div>
          </div>
           <div class="form-row">
                 <div class="col-6 col-padding">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" disabled placeholder="Phone" value="<?php echo $oopus34->phone;?>"name="phone">
                 </div>
                 <div class="col-6 col-padding">
                    <label for="Mobile">Mobile</label>
                    <input type="text" class="form-control" disabled placeholder="Mobile"value="<?php echo $oopus34->mobile;?>" name="mobile">
                 </div>             
          </div>
          <div class="form-row">
            <div class="form-group col-6">
             <label for="exampleFormControlSelect1">Is Punjabi Examination Passed</label>
             <input type="text" class="form-control" disabled placeholder="Mobile"value="<?php echo $oopus34->is_punj_examamin_passed;?>" name="mobile">
             
            </div>
            <div class="form-group col-6">
             <label for="exampleFormControlSelect1">Level of Punjabi Examination</label>
             <input type="text" class="form-control" disabled placeholder="Level of Punjabi Examination" value="<?php echo $oopus34->level_of_punj_examin;?>" name="mobile">
             
            </div>
          </div>
          <div class="form-row">
            <div class="col-6">
               <label for="Date Picker">Date of Birth</label>
               <input type="date" class="form-control"disabled value="<?php echo $oopus34->dob;?>" name="dob">
               <!--type="date" value="<?php //echo date("Y-m-d");?>"-->
            </div>
            <div class="form-group col-md-6">
               <label for="inputEmail4">Email</label>
               <input type="email" class="form-control" disabled value="<?php echo $oopus34->email;?>" id="inputEmail4" placeholder="Email" name="email">
            </div>
          </div>
          <div class="form-group">
             <label for="exampleFormControlFile1">Profile Picture</label>
             <!--<input type="file" name="slider">-->
             <img src="profilepicture/<?php echo $reg_no?>/<?php echo $oopus34->profilepicture;?>" class="img-fluid img-profie">
             <!--<input type="file" class="form-control-file" id="exampleFormControlFile1" name="profile_pic">-->
          </div>
        <?php } 
    $oops1=$db->prepare("select * from registration_info where uni_reg_no=:1do");
    $oops1->execute([
        ':1do'=>$reg_no
      ]);
    while($oop4 = $oops1->fetch(PDO::FETCH_OBJ))
    {
      $faculty= $oop4->faculty;
      $depart=$oop4->department;
      $extempted_from_fee=$oop4->exemptedfromfee;
      $jrf_holder=$oop4->jrf_holder;
      $supervisor=$oop4->supervisor;
      $co_supervisor=$oop4->co_supervisor;
      $mode_of_phd=$oop4->mode_of_phd;
      $course_work=$oop4->is_course_w_done;
      $uni_reg_no=$oop4->uni_reg_no;
      $fellowship_id=$oop4->fellowship_id;
      $research_titles=$oop4->researchtitle;
    }
        ?>
    </div>
  
  
    <div class="Registration-Information">
      <div>
        <div class="alert alert-dark" role="alert">
            <a href="#" class="alert-link">REGISTRATION INFORMATION</a>
           
        </div>
      </div>
    
      
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="Faculty">Faculty</label>
            <input type="text" class="form-control"disabled  value="<?php echo $faculty;?>" id="Faculty" placeholder="Faculty" name="faculty" >
         </div>
         <div class="form-group col-md-6">
            <label for="Department">Department</label>
            <input type="text" class="form-control" disabled value="<?php echo $depart;?>" id="Department" placeholder="Department" name="depart" >
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="Extempted from fee">Extempted from fee</label>
            <input type="text" class="form-control" disabled value="<?php echo $extempted_from_fee;?>" id="Extempted from fee" placeholder="Extempted from fee" name="extempted_from_fee" >
         </div>
         <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">JRF Holder</label>
            <input type="text" class="form-control" disabled value="<?php echo $faculty;?>" id="Faculty" placeholder="Faculty" name="jrf_holder">
         </div>
      </div> 
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="Supervisor">Supervisor</label>
            <input type="text" class="form-control" disabled value="<?php echo $supervisor;?>" id="Supervisor" placeholder="Supervisor" name="supervisor"  >
         </div>
         <div class="form-group col-md-6">
            <label for="Select Co-Supervisor">Select Co-Supervisor</label>
            <input type="text" class="form-control" disabled value="<?php echo $co_supervisor;?>" id="Select Co-Supervisor" placeholder="Select Co-Supervisor" name="co_supervisor" >
         </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Mode of Phd</label>
            <input type="text" class="form-control" disabled value="<?php echo $mode_of_phd;?>" id="Faculty" placeholder="Faculty" name="mode_of_phd">
          </div>
           <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Is course work done?</label>
            <input type="text" class="form-control" disabled value="<?php echo $course_work;?>" id="Supervisor" placeholder="Supervisor" name="course_work">
           </div>
      </div>
       <div class="form-row">
                 <div class="col-6 col-padding">
                    <label for="University Registration Number">University Registration Number</label>
                    <input type="text" class="form-control" disabled value="<?php echo $uni_reg_no;?>" placeholder="University Registration Number" name="uni_reg_no" >
                 </div>
                 <div class="col-6 col-padding">
                    <label for="Fellowship Id">Fellowship Id</label>
                    <input type="text" class="form-control" disabled value="<?php echo $fellowship_id;?>" placeholder="Fellowship Id" name="fellowship_id" >
                 </div>             
       </div>
       <div class="form-row">
          <div class="col-12 col-padding">
                    <label for="Research Title">Research Title</label>
                    <input type="text" class="form-control" disabled value="<?php echo $research_titles;?>" placeholder="Research Title" name="research_titles" >
          </div>           
       </div>
    </div>
    <div class="Upload Thesis">
      <div>
        <div class="alert alert-dark" role="alert">
            <a href="#" class="alert-link">Upload Thesis</a>
        </div>
      </div>
      <?php
      $oo1=$db->prepare("select * from upload_thesis where uni_reg_no=:2do");
    $oo1->execute([
        ':2do'=>$reg_no
      ]);
    while($oo4 = $oo1->fetch(PDO::FETCH_OBJ))
    {
      $regno=$oo4->uni_reg_no;
      $uni_name=$oo4->uni_name;
      $department_place=$oo4->dept_place;
      $name_of_research=$oo4->name_of_researcher;
      $guide_name=$oo4->name_of_guide;
      $type_of_degree=$oo4->type_of_degree;
      $dobee=$oo4->dob;
      $awarded_date = $oo4->awarded_date;
      $completed_date=$oo4->completed_date;
    }
        ?>
        <div class="form-row">
                 <div class="col-6 col-padding">
                    <label for="University Name">University Name</label>
                    <input type="text" class="form-control" disabled placeholder="Punjabi University,Patiala" value="Punjabi University,Patiala" name="uni_name" readonly >
                 </div>
                 <div class="col-6 col-padding">
                    <label for="Department/Place">Department/Place</label>
                    <input type="text" class="form-control" disabled placeholder="Department/Place" value="<?php echo $department_place;?>" name="department_place" >
                 </div>             
       </div>
       <div class="form-row">
                 <div class="col-6 col-padding">
                    <label for="Name of Researcher">Name of Researcher</label>
                    <input type="text" class="form-control" disabled value="<?php echo $name_of_research; ?>" name="name_of_research" >
                 </div>
                 <div class="col-6 col-padding">
                    <label for="Name of Guide">Name of Guide</label>
                    <input type="text" class="form-control" disabled value="<?php echo $guide_name; ?>" name="guide_name" >
                 </div>             
       </div>
        <div class="form-row">
                 <div class="col-6 col-padding">
                    <label for="Type of Degree">Type of Degree</label>
                    <input type="text" class="form-control" disabled value="Phd" readonly name="type_of_degree" >
                 </div>
                 <div class="col-6">
                   <label for="Date Picker">Date of Birth</label>
                   <input type="text" class="form-control" disabled value="<?php echo $dobee;?>" >
                   
                   
            </div>     
       </div>
        <div class="form-row">
                 <div class="col-6">
                    <label for="Date Picker">Awarded Date</label>
                    <input type="text" class="form-control" disabled name="awarded_date" value="<?php echo $awarded_date;?>" >
                    
                 </div>   
                 <div class="col-6 col-padding">
                    <label for="Completed date">Completed date</label>
                    <input type="text" class="form-control" disabled name="completed_date" value="<?php echo $completed_date;?>" >
                 </div>                           
       </div>
      
    </div>
    <div class="Thesis-Details">
      <?php
    $oo71=$db->prepare("select * from thesis_detail where uni_reg_no=:3do");
    $oo71->execute([
        ':3do'=>$reg_no
      ]);
    while($oo74 = $oo71->fetch(PDO::FETCH_OBJ))
    {
      $regno=$oo74->uni_reg_no;
      $title=$oo74->title;
      $abstract=$oo74->abstract;
      $first_level_of_subject=$oo74->levelone;
      $second_level_of_subject=$oo74->leveltwo;
      $third_level_of_subject=$oo74->levelthree;
      $language=$oo74->language;
      $submitted_by=$oo74->submitted_by;
      $copyrights=$oo74->copyrights;
      $file1=$oo74->files1;
      $file2=$oo74->files2;
      $file3=$oo74->files3;
      $file4=$oo74->files4;
      $file5=$oo74->files5;
      $file6=$oo74->files6;
      $file7=$oo74->files7;
      $file8=$oo74->files8;
      $file9=$oo74->files9;
      $file10=$oo74->files10;
      $file11=$oo74->files11;
      $file12=$oo74->files12;
      $file13=$oo74->files13;
      $file14=$oo74->files14;
    }
        ?>
      <div>
        <div class="alert alert-dark" role="alert">
            <a href="#" class="alert-link">Thesis Details</a>
        </div>
      </div>
       
       <div class="form-row">
          <div class="col-12 col-padding">
                    <label for="Title">Title (With Subtitle)</label>
                    <input type="text" class="form-control" disabled value="<?php echo $title;?>" name="title" >
          </div>           
       </div>
       <div class="form-group">
           <label for="exampleFormControlTextarea1">Abstract</label>
           <textarea class="form-control" id="Abstract" disabled placeholder="<?php echo $abstract;?>" rows="5" maxlength="2048" name="abstract" ></textarea>
           
       </div>
       <div class="form-group">
         <div class="form-row">
           <div class="col-12 col-padding">
             <label for="Keywords">Select Three levels of subject</label>
           </div>
          <div class="form-row">
             <div class="col-12 col-padding">
               <input type="text" class="form-control" disabled value="<?php echo $first_level_of_subject;?>" name="first_level_of_subject" >
             </div>            
          </div>
          <div class="form-row">
             <div class="col-12 col-padding">
               <input type="text" class="form-control" disabled value="<?php echo $second_level_of_subject;?>" name="second_level_of_subject" >
             </div>            
          </div>
          <div class="form-row">
             <div class="col-12 col-padding">
               <input type="text" class="form-control" disabled value="<?php echo $third_level_of_subject;?>" name="third_level_of_subject" >
             </div>            
          </div>
         </div>
         <div class="form-row">
           <label for="Language">Language</label>
           <input type="text" class="form-control" disabled value="<?php echo $language;?>" name="language" >
         </div>
         <div class="form-row">
           <label for="Submitted by:">Submitted by:</label>
           <input type="text" class="form-control" disabled value="<?php echo $submitted_by;?>" name="submitted_by" >
         </div>
         <div class="form-row">
           <label for="Copyrights:">Copyrights:</label>
           <input type="text" class="form-control" disabled value="<?php echo $copyrights;?>" name="copyrights" >
         </div>
       </div>       
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Upload Files:</label>
         </div>
       </div>
        <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files1 (Title):</label>
           <?php echo $file1;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files2 (Certificates):</label>
            <?php echo $file2;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files3 (Preliminary Pages):</label>
            <?php echo $file3;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files4 (Chapter1):</label>
            <?php echo $file4;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files5 (Chapter2):</label>
            <?php echo $file5;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files6 (Chapter3):</label>
           <?php echo $file6;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files7 (Chapter4):</label>
           <?php echo $file7;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files8 (Chapter5):</label>
           <?php echo $file8;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files9 (Chapter6):</label>
           <?php echo $file9;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files10 (Chapter7):</label>
           <?php echo $file10;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files11 (Chapter8):</label>
           <?php echo $file11;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files12 (Chapter9):</label>
           <?php echo $file12;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files13 (Chapter10):</label>
           <?php echo $file13;?>
         </div>
       </div>
       <div class="form-row">
         <div class="col-12 col-padding">
           <label for="Upload Files">Files14 (Chapter11):</label>
           <?php echo $file14;?>
         </div>
       </div>
    </div>

    <div class="clearfix"></div>
    
    
    <div class="form-group row">
            <div class="col-sm-12 text-center">
              <input type="submit" class="btn btn-primary btn-lg btn-block" id="print" name="print" value="Print" onclick="window.print();">
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
  </body>
</html>