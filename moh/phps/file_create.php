<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$file_no = $scholarships = $registration_letters = $controller_of_examination = $visiting_faculty_letters = $establishment_branch = $treasurer_office = $vc_office_approvals = "";
$file_no_err = $scholarships_err = $registration_letters_err = $controller_of_examination_err = $visiting_faculty_letters_err = $establishment_branch_err = $treasurer_office_err = $vc_office_approvals_err = "";
$query_error = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate file_no
    $input_file_no = trim($_POST["file_no"]);
    if(empty($input_file_no)){
        $file_no_err = "Please enter file no.";     
    } 
	//elseif(!filter_var($input_file_no, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $file_no_err = "Please enter a file no.";
	//}
	else{
        $file_no = $input_file_no;
    }
	
    // Validate scholarships
    $input_scholarships = trim($_POST["scholarships"]);
	
    if(empty($input_scholarships)){
        $scholarships_err = "Please enter a scholarships.";
    }
	//elseif(!filter_var($input_scholarships, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $scholarships_err = "Please enter a valid scholarships.";
    //}
	else{
        $scholarships = $input_scholarships;
    }
	
	// Validate registration_letters
	$input_registration_letters = trim($_POST["registration_letters"]);
	
    if(empty($input_registration_letters)){
        $registration_letters_err = "Please enter a registration letters.";
    }
	//elseif(!filter_var($input_registration_letters, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $registration_letters_err = "Please enter a valid registration letters.";
    //}
	else{
        $registration_letters = $input_registration_letters;
    }
	
	// Validate controller_of_examination
	$input_controller_of_examination = trim($_POST["controller_of_examination"]);
	
    if(empty($input_controller_of_examination)){
        $controller_of_examination_err = "Please enter a controller of examination.";
    }
	//elseif(!filter_var($input_controller_of_examination, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $controller_of_examination_err = "Please enter a valid controller of examination.";
    //}
	else{
        $controller_of_examination = $input_controller_of_examination;
    }
	
	// Validate visiting_faculty_letters
	$input_visiting_faculty_letters = trim($_POST["visiting_faculty_letters"]);
	
    if(empty($input_visiting_faculty_letters)){
        $visiting_faculty_letters_err = "Please enter a visiting faculty letters.";
    }
	//elseif(!filter_var($input_visiting_faculty_letters, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $visiting_faculty_letters_err = "Please enter a valid visiting faculty letters.";
    //}
	else{
        $visiting_faculty_letters = $input_visiting_faculty_letters;
    }
	
	// Validate establishment_branch
	$input_establishment_branch = trim($_POST["establishment_branch"]);
	
    if(empty($input_establishment_branch)){
        $establishment_branch_err = "Please enter a visiting establishment branch.";
    }
	//elseif(!filter_var($input_establishment_branch, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $establishment_branch_err = "Please enter a valid establishment branch.";
    //}
	else{
        $establishment_branch = $input_establishment_branch;
    }
	
	// Validate treasurer_office
	$input_treasurer_office = trim($_POST["treasurer_office"]);
	
    if(empty($input_treasurer_office)){
        $treasurer_office_err = "Please enter a visiting treasurer office.";
    }
	//elseif(!filter_var($input_treasurer_office, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $treasurer_office_err = "Please enter a valid treasurer office.";
    //}
	else{
        $treasurer_office = $input_treasurer_office;
    }
	
	// Validate treasurer_office
	$input_treasurer_office = trim($_POST["treasurer_office"]);
	
    if(empty($input_treasurer_office)){
        $treasurer_office_err = "Please enter a visiting treasurer office.";
    }
	//elseif(!filter_var($input_treasurer_office, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $treasurer_office_err = "Please enter a valid treasurer office.";
    //}
	else{
        $treasurer_office = $input_treasurer_office;
    }
	
	// Validate vc_office_approvals
	$input_vc_office_approvals = trim($_POST["vc_office_approvals"]);
	
    if(empty($input_vc_office_approvals)){
        $vc_office_approvals_err = "Please enter a visiting vc office approvals.";
    }
	//elseif(!filter_var($input_vc_office_approvals, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $vc_office_approvals_err = "Please enter a valid vc office approvals.";
    //}
	else{
        $vc_office_approvals = $input_vc_office_approvals;
    }
	
	
	
	
	
    // Check input errors before inserting in database
    if(
	    empty($file_no_err) &&
		empty($scholarships_err) &&
		empty($registration_letters_err)&&
		empty($controller_of_examination_err)&&
		empty($visiting_faculty_letters_err)&&
		empty($establishment_branch_err)&&
		empty($treasurer_office)&&
		empty($vc_office_approvals)
		){
         //Prepare an insert statement
        $sql = "INSERT INTO file (file_no, scholarships, registration_letters, controller_of_examination, visiting_faculty_letters, establishment_branch, treasurer_office, vc_office_approvals) 
				VALUES (".$file_no.",'".$scholarships."','".$registration_letters."','".$controller_of_examination."','".$visiting_faculty_letters."','".$establishment_branch."','".$treasurer_office."','".$vc_office_approvals."')";
        echo  "data entered";
		// $conn->query($sql);
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
				 echo  "data entered";
               // header("location: file_index.php");
               //exit();
            } else{
                $query_error = "Something went wrong. Please try again later.".$conn->error;
            }
			
        }
         
        // Close statement
        $conn->close();
   }
    
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add File record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="form-group <?php echo (!empty($file_no_err)) ? 'has-error' : ''; ?>"> 
                            <label>File No</label>
                            <input type="text" name="file_no" class="form-control" value="<?php echo $file_no; ?>">
                            <span class="help-block"><?php echo $file_no_err;?></span>
                        </div>
						
					   <div class="form-group <?php echo (!empty($scholarships_err)) ? 'has-error' : ''; ?>"> 
                            <label>Scholarships</label>
                            <input type="text" name="scholarships" class="form-control" value="<?php echo $scholarships; ?>">
                            <span class="help-block"><?php echo $scholarships_err;?></span>
                        </div>
						
						 <div class="form-group <?php echo (!empty($registration_letters_err)) ? 'has-error' : ''; ?>"> 
                            <label>Registration Letters</label>
                            <input type="text" name="registration_letters" class="form-control" value="<?php echo $registration_letters; ?>">
                            <span class="help-block"><?php echo $registration_letters_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($controller_of_examination_err)) ? 'has-error' : ''; ?>"> 
                            <label>Controller Of Examination</label>
                            <input type="text" name="controller_of_examination" class="form-control" value="<?php echo $controller_of_examination; ?>">
                            <span class="help-block"><?php echo $controller_of_examination_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($visiting_faculty_letters_err)) ? 'has-error' : ''; ?>"> 
                            <label>Visiting Faculty Letters</label>
                            <input type="text" name="visiting_faculty_letters" class="form-control" value="<?php echo $visiting_faculty_letters; ?>">
                            <span class="help-block"><?php echo $visiting_faculty_letters_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($establishment_branch_err)) ? 'has-error' : ''; ?>"> 
                            <label>Establishment Branch</label>
                            <input type="text" name="establishment_branch" class="form-control" value="<?php echo $establishment_branch; ?>">
                            <span class="help-block"><?php echo $establishment_branch_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($treasurer_office_err)) ? 'has-error' : ''; ?>"> 
                            <label>Treasurer Office</label>
                            <input type="text" name="treasurer_office" class="form-control" value="<?php echo $treasurer_office; ?>">
                            <span class="help-block"><?php echo $treasurer_office_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($vc_office_approvals_err)) ? 'has-error' : ''; ?>"> 
                            <label>VC Office Approvals</label>
                            <input type="text" name="vc_office_approvals" class="form-control" value="<?php echo $vc_office_approvals; ?>">
                            <span class="help-block"><?php echo $vc_office_approvals_err;?></span>
                        </div>
						
					
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="file_index.php" class="btn btn-default">Back to Index</a>
						<div class="form-group"	>
							<?php echo $query_error;?>
						
						</div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>