<?php
$db = new PDO('mysql:host=localhost;dbname=pupa','root','');
if(isset($_POST['ss']))
{
	$regno=$_POST['reg_no'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$category=$_POST['category'];
	$freign_stu_cat=$_POST['freign_stu_cat'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$p_nationality=$_POST['p_nationality'];
	$p_state=$_POST['p_state'];
	$p_city=$_POST['p_city'];
	$p_district=$_POST['p_district'];
	$p_country=$_POST['p_country'];
	$p_pincode=$_POST['p_pincode'];
	$p_address=$_POST['p_address'];
	$c_nationality=$_POST['c_nationality'];
	$c_state=$_POST['c_state'];
	$c_city=$_POST['c_city'];
	$c_district=$_POST['c_district'];
	$c_country=$_POST['c_country'];
	$c_pincode=$_POST['c_pincode'];
	$c_address=$_POST['c_address'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$is_punj_examin_passed=$_POST['is_punj_examin_passed'];
	$level_of_punj_examin=$_POST['level_of_punj_examin'];
	$date=$_POST['dob'];
	$dob = date('Y-m-d', strtotime($date));
	$email=$_POST['email'];
	$profile_pic=basename($_FILES['profile_pic']['name']);
	$cmd2w = $db->prepare("INSERT INTO candidate_info(regno,name,gender,category,foreign_student_cat,father_name,mother_name,p_nationality,p_state,p_city,
		p_district,p_country,p_pincode,p_address,c_nationality,c_state,c_city,c_district,c_country,c_pincode,
		c_address,phone,mobile,is_punj_examamin_passed,level_of_punj_examin,dob,email,profilepicture) VALUES(:fq1,:fq2,:fq3,:fq4,:fq5,:fq6,:fq7,:fq8,:fq9,:fq10,:fq11,:fq12,:fq13,:fq14,:fq15,:fq16,:fq17,:fq18,:fq19,:fq20,:fq21,:fq22,:fq23,:fq24,:fq25,:fq26,:fq27,:fq28)" );
	$cmd2w->execute([
		':fq1'=>$regno,
		':fq2'=>$name,
		':fq3'=>$gender,
		':fq4'=>$category,
		':fq5'=>$freign_stu_cat,
		':fq6'=>$fname,
		':fq7'=>$mname,
		':fq8'=>$p_nationality,
		':fq9'=>$p_state,
		':fq10'=>$p_city,
		':fq11'=>$p_district,
		':fq12'=>$p_country,
		':fq13'=>$p_pincode,
		':fq14'=>$p_address,
		':fq15'=>$p_nationality,
		':fq16'=>$p_state,
		':fq17'=>$p_city,
		':fq18'=>$p_district,
		':fq19'=>$p_country,
		':fq20'=>$p_pincode,
		':fq21'=>$p_address,
		':fq22'=>$phone,
		':fq23'=>$mobile,
		':fq24'=>$is_punj_examin_passed,
		':fq25'=>$level_of_punj_examin,
		':fq26'=>$dob,
		':fq27'=>$email,
		':fq28'=>$profile_pic
	]);
	$q21 = $db->prepare("select regno from candidate_info where regno=:lop1");
    $q21->execute([
    	':lop1'=>$regno
	]);
    while($rkpu21 = $q21->fetch(PDO::FETCH_OBJ))
    {
    	$nalui=$rkpu21->regno;
    }
	
	mkdir("profilepicture/".$nalui."/", 0777);
	move_uploaded_file($_FILES['profile_pic']['tmp_name'],"profilepicture/$nalui/".$profile_pic);
	//move_uploaded_file($_FILES['profile_pic']['tmp_name'],"profilepicture/".$profile_pic);
	header("location:index.php");
}
if(isset($_POST['ss1']))
{
	$faculty=$_POST['faculty'];
	$depart=$_POST['depart'];
	$extempted_from_fee=$_POST['extempted_from_fee'];
	$jrf_holder=$_POST['jrf_holder'];
	$supervisor=$_POST['supervisor'];
	$co_supervisor=$_POST['co_supervisor'];
	$mode_of_phd=$_POST['mode_of_phd'];
	$course_work=$_POST['course_work'];
	$uni_reg_no=$_POST['uni_reg_no'];
	$fellowship_id=$_POST['fellowship_id'];
	$research_titles=$_POST['research_titles'];
	$cmw = $db->prepare("INSERT INTO registration_info(uni_reg_no,faculty,department,exemptedfromfee,jrf_holder,supervisor,co_supervisor,mode_of_phd,is_course_w_done,
		fellowship_id,researchtitle) VALUES(:f8q1,:f8q2,:f8q3,:f8q4,:f8q5,:f8q6,:f8q7,:f8q8,:f8q9,:f8q10,:f8q11)" );
	$cmw->execute([
		':f8q1'=>$faculty,
		':f8q2'=>$depart,
		':f8q3'=>$extempted_from_fee,
		':f8q4'=>$jrf_holder,
		':f8q5'=>$supervisor,
		':f8q6'=>$co_supervisor,
		':f8q7'=>$mode_of_phd,
		':f8q8'=>$course_work,
		':f8q9'=>$uni_reg_no,
		':f8q10'=>$fellowship_id,
		':f8q11'=>$research_titles
		
	]);
	header("location:index.php");
}
if (isset($_POST['ss2'])) {
	$regno=$_POST['reg_no'];
	$uni_name=$_POST['uni_name'];
	$department_place=$_POST['department_place'];
	$name_of_research=$_POST['name_of_research'];
	$guide_name=$_POST['guide_name'];
	$type_of_degree=$_POST['type_of_degree'];
	$dobee=$_POST['awarded_date'];
	$awarded_date = date('Y-m-d', strtotime($dobee));
	$completed_date=$_POST['completed_date'];

	$cmw1 = $db->prepare("INSERT INTO upload_thesis(uni_reg_no,uni_name,dept_place,name_of_researcher,name_of_guide,type_of_degree,dob,awarded_date,completed_date) VALUES(:fq71,:fq72,:fq73,:fq74,:fq75,:fq76,:fq77,:fq78,:fq79)" );
	$cmw1->execute([
		':fq71'=>$regno,
		':fq72'=>$uni_name,
		':fq73'=>$department_place,
		':fq74'=>$name_of_research,
		':fq75'=>$guide_name,
		':fq76'=>$type_of_degree,
		':fq77'=>$dobee,
		':fq78'=>$awarded_date,
		':fq79'=>$completed_date
		
	]);
	header("location:index.php");
}

if(isset($_POST['ss3']))
{
	$regno=$_POST['reg_no'];
	$title=$_POST['title'];
	$abstract=$_POST['abstract'];
	$first_level_of_subject=$_POST['first_level_of_subject'];
	$second_level_of_subject=$_POST['second_level_of_subject'];
	$third_level_of_subject=$_POST['third_level_of_subject'];
	$language=$_POST['language'];
	$submitted_by=$_POST['submitted_by'];
	$copyrights=$_POST['copyrights'];
	$file1=basename($_FILES['files1']['name']);
	$file2=basename($_FILES['files2']['name']);
	$file3=basename($_FILES['files3']['name']);
	$file4=basename($_FILES['files4']['name']);
	$file5=basename($_FILES['files5']['name']);
	$file6=basename($_FILES['files6']['name']);
	$file7=basename($_FILES['files7']['name']);
	$file8=basename($_FILES['files8']['name']);
	$file9=basename($_FILES['files9']['name']);
	$file10=basename($_FILES['files10']['name']);
	$file11=basename($_FILES['files11']['name']);
	$file12=basename($_FILES['files12']['name']);
	$file13=basename($_FILES['files13']['name']);
	$file14=basename($_FILES['files14']['name']);

	$kk = $db->prepare("INSERT INTO thesis_detail(uni_reg_no,title,abstract,levelone,leveltwo,levelthree,language,submitted_by,copyrights,files1,
		files2,files3,files4,files5,files6,files7,files8,files9,files10,files11,
		files12,files13,files14) VALUES(:fq01,:fq02,:fq03,:fq04,:fq05,:fq06,:fq07,:fq08,:fq09,:fq010,:fq011,:fq012,:fq013,:fq014,:fq015,:fq016,:fq017,:fq018,:fq019,:fq020,:fq021,:fq022,:fq023)" );
	$kk->execute([
		':fq01'=>$regno,
		':fq02'=>$title,
		':fq03'=>$abstract,
		':fq04'=>$first_level_of_subject,
		':fq05'=>$second_level_of_subject,
		':fq06'=>$third_level_of_subject,
		':fq07'=>$language,
		':fq08'=>$submitted_by,
		':fq09'=>$copyrights,
		':fq010'=>$file1,
		':fq011'=>$file2,
		':fq012'=>$file3,
		':fq013'=>$file4,
		':fq014'=>$file5,
		':fq015'=>$file6,
		':fq016'=>$file7,
		':fq017'=>$file8,
		':fq018'=>$file9,
		':fq019'=>$file10,
		':fq020'=>$file11,
		':fq021'=>$file12,
		':fq022'=>$file13,
		':fq023'=>$file14
	]);
$qry21 = $db->prepare("select uni_reg_no from thesis_detail where uni_reg_no=:lo1");
                                $qry21->execute([
                                ':lo1'=>$regno
                                 ]);
                                while($ruu21 = $qry21->fetch(PDO::FETCH_OBJ))
                              {
                              	$nal=$ruu21->uni_reg_no;
                              }

	
	mkdir("thesis/".$nal."/", 0777);
	move_uploaded_file($_FILES['files1']['tmp_name'],"thesis/$nal/".$file1);
	move_uploaded_file($_FILES['files2']['tmp_name'],"thesis/$nal/".$file2);
	move_uploaded_file($_FILES['files3']['tmp_name'],"thesis/$nal/".$file3);
	move_uploaded_file($_FILES['files4']['tmp_name'],"thesis/$nal/".$file4);
	move_uploaded_file($_FILES['files5']['tmp_name'],"thesis/$nal/".$file5);
	move_uploaded_file($_FILES['files6']['tmp_name'],"thesis/$nal/".$file6);
	move_uploaded_file($_FILES['files7']['tmp_name'],"thesis/$nal/".$file7);
	move_uploaded_file($_FILES['files8']['tmp_name'],"thesis/$nal/".$file8);
	move_uploaded_file($_FILES['files9']['tmp_name'],"thesis/$nal/".$file9);
header("location:index.php");
}