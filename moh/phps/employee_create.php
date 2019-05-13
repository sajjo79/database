<?php
// Include config file
//echo dirname(plugin_dir_path(__FILE__)) . '/config_main.php';
require_once "config_main.php";

 
// Define variables and initialize with empty values
$person_id = $person_name = $father_name = $dob = $cnic = $phone_no = $designation = $department_id = $nationality = $person_address = $picture = $email = "";
$person_id_err = $person_name_err = $father_name_err = $dob_err = $cnic_err = $phone_no_err = $designation_err = $department_id_err = $nationality_err= $person_address_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate person_id
    $input_person_id = trim($_POST["person_id"]);
    if(empty($input_person_id)){
        $person_id_err = "Please enter  id.";     
    } 
	//elseif(!filter_var($input_person_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $person_id_err = "Please enter a valid id.";
	//}
	else{
        $person_id = $input_person_id;
    }
	
    // Validate person_name
    $input_person_name = trim($_POST["person_name"]);
	
    if(empty($input_person_name)){
        $person_name_err = "Please enter a person name.";
    }
	//elseif(!filter_var($input_person_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $person_name_err = "Please enter a valid name.";
    //}
	else{
        $person_name = $input_person_name;
    }
	
	// Validate father_name
    $input_father_name = trim($_POST["father_name"]);
	
    if(empty($input_father_name)){
        $father_name_err = "Please enter a father name.";
    }
	//elseif(!filter_var($input_father_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $father_name_err = "Please enter a valid father name.";
    //}
	else{
        $father_name = $input_father_name;
    }
	
	// Validate dob
    $input_dob = trim($_POST["dob"]);
	
    if(empty($input_dob)){
        $dob_err = "Please enter dob.";
    }
	//elseif(!filter_var($input_dob_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $dob_err = "Please enter a valid dob.";
    //}
	else{
        $dob = $input_dob;
    }
    
    // Validate cnic
    $input_cnic = trim($_POST["cnic"]);
    if(empty($input_cnic)){
        $cnic_err = "Please enter a cnic.";     
    } 
	//elseif(!filter_var($input_cnic, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $cnic_err = "Please enter a valid cnic.";
	//}
	else{
        $cnic = $input_cnic;
    }
    
    // Validate phone_no 
    $input_phone_no = trim($_POST["phone_no"]);
    if(empty($input_phone_no)){
        $phone_no_err = "Please enter the phone_no.";     
    }elseif(!ctype_digit($input_phone_no)){
       $phone_no_err = "Please enter a positive integer value.";
    }
	else{
        $phone_no = $input_phone_no;
    }
	
	// Validate picture 
    $input_picture = trim($_POST["picture"]);
    if(empty($input_picture)){
        $picture_err = "Please enter the picture.";     
    }elseif(!ctype_digit($input_picture)){
       $picture_err = "Please enter a positive integer value.";
    }
	else{
        $picture = $input_picture;
    }
	
	    // Validate department_id
    $input_department_id = trim($_POST["department_id"]);
    if(empty($input_department_id)){
        $department_id_err = "Please enter the department id.";     
    }
	//elseif(!ctype_digit($input_department_id)){
      //  $department_id_err = "Please enter valid department id.";
    //} 
	else{
        $department_id = $input_department_id;
    }
	
	// Validate nationality
    $input_nationality = trim($_POST["nationality"]);
    if(empty($input_nationality)){
        $nationality_err = "Please enter the nationality.";     
    } 
	//elseif(!ctype_digit($input_nationality)){
     //  $nationality_err = "Please enter valid nationality.";
    //}
	else{
        $nationality = $input_nationality;
    }
	
	// Validate designation
    $input_designation = trim($_POST["designation"]);
    if(empty($input_designation)){
        $designation_err = "Please enter the designation.";     
    }
	//elseif(!ctype_digit($input_designation)){
      //  $designation_err = "Please enter valid designation.";
    //} 
	else{
        $designation = $input_designation;
    }
	
	
	// Validate address
    $input_person_address = trim($_POST["person_address"]);
    if(empty($input_person_address)){
        $person_address_err = "Please enter the address.";     
    } 
	//elseif(!ctype_digit($input_person_address)){
     //   $person_address_err = "Please enter valid address.";
    //}
	else{
        $person_address = $input_person_address;
    }
		
    
	// Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the email.";     
    } 
	//elseif(!ctype_digit($input_email)){
     //  $email_err = "Please enter valid email.";
    //}
	else{
        $email = $input_email;
    }
	
   // echo $person_id.$person_name.$father_name.$dob.$designation.$cnic.$picture.$phone_no.$department_id.$nationality.$person_address.$email;
	
    // Check input errors before inserting in database
    if(
	    empty($person_id_err) &&
		empty($person_name_err) && 
		empty($father_name_err) &&
		empty($dob_err) &&
		empty($designation_err) &&
		empty($cnic_err) &&
		empty($phone_no_err) && 
		empty($department_id_err) && 
		empty($nationality_err) &&
		empty($person_address_err) && 
		empty($email_err)
		){
        // Prepare an insert statement
        $sql = "INSERT INTO employee (person_id, person_name, father_name, dob, cnic, picture, phone_no,designation, department_id, nationality, person_address, email) 
		VALUES (".$person_id.",'".$person_name."','".$father_name."','".$dob."','".$cnic."','".$picture."','".$phone_no."','".$designation."',".$department_id.",
		        '".$nationality."','".$person_address."','".$email."')";
         echo $sql;
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: employee_index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.".$conn->error;
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
    <script src="..\scripts\includehtm.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        td
        {
            padding:0 15px 0 15px;
        }
        
</style>
    
</head>
<body>


    <div class="wrapper" style="background-color: MediumSeaGreen;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header" align="center">
                        <h2>Add Employee</h2>
                    </div>
                    <p align="center">Please fill this form and submit to add Employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <table>
                       
                       <div class="form-inline" <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>"> 
                        <tr>
                            <td><label>Employee id</label></td>
                            <td><input type="text" name="person_id"  class="form-control" value="<?php echo $person_id; ?>"></td>
                            <td><span class="help-block"><?php echo $person_id_err;?></span></td>
                        </tr>
                        </div>
                        
                        
                       <div class="form-inline" <?php echo (!empty($person_name_err)) ? 'has-error' : ''; ?>"> 
                        <tr>    <td><label>Name</label></td>
                            <td><input type="text" name="person_name" class="form-control" value="<?php echo $person_name; ?>"></td>
                            <td><span class="help-block"><?php echo $person_name_err;?></span></td>
                       </tr> </div>
                        
                        <div class="form-inline" <?php echo (!empty($father_name_err)) ? 'has-error' : ''; ?>"> 
                         <tr>
                            <td><label> Father Name</label></td>
                            <td><input type="text" name="father_name" class="form-control" value="<?php echo $father_name; ?>"></td>
                            <td><span class="help-block"><?php echo $father_name_err;?></span></td>
                        </tr>
                        </div>
                        <div class="form-inline" <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>"> 
                        <tr>
                            <td><label>DOB</label></td>
                            <td><input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>"></td>
                            </td><span class="help-block"><?php echo $dob_err;?></span></td>
                        </tr>
                        </div>
                        <div class="form-inline" <?php echo (!empty($cnic_err)) ? 'has-error' : ''; ?>">
                        <tr>
                            <td><label>cnic</label></td>
                            <td><input type="text" name="cnic" class="form-control" value="<?php echo $cnic; ?>"></td>
                            <td><span class="help-block"><?php echo $cnic_err;?></span></td>
                            </tr>
                        </div>
						<div class="form-inline">
                        <tr>
                        <td><label>Department Id</label></td>
                        <td><select name='department_id' class="form-control <?php echo (!empty($department_id_err)) ? 'has-error' : ''; ?>">
							<?php
							$sql="select department_id from department";
							$res=$conn->query($sql);
						     if ($res->num_rows > 0){			
							
							while ($row=$res->fetch_assoc())
							{
								?>
								<option value="<?php echo $row['department_id'];?>"><?php echo $row['department_id'];?></option>
							 <?php }
							 }else
								 echo "no rows found".$conn->error;
							 ?>
							</select>
							</td>
							
                            <td><span class="help-block"><?php echo $department_id_err;?></span></td>
							</tr>
                        </div>
                        <div class="form-inline" <?php echo (!empty($designation_err)) ? 'has-error' : ''; ?>">
                        <tr>
                        <td><label>Designation</label></td>
                        <td><input type="text" name="designation" class="form-control" value="<?php echo $designation; ?>"></td>
                        <td><span class="help-block"><?php echo $designation_err;?></span></td>
                            </tr>
                        </div>
                        <div class="form-inline" <?php echo (!empty($phone_no_err)) ? 'has-error' : ''; ?>">
                        <tr>
                        <td><label>Phone No.</label></td>
                        <td><input type="text" name="phone_no" class="form-control" value="<?php echo $phone_no; ?>"></td>
                        <td><span class="help-block"><?php echo $phone_no_err;?></span></td>
                        <tr>
                        </div>
						<div class="form-inline">
                        <tr>
                        <td><label>Picture</label></td>
                        <td><input type="file" name="picture" class="form-control" value="<?php echo $picture; ?>"></td>
                        <tr>
                        </div>
						
                        <div class="form-inline" <?php echo (!empty($person_address_err)) ? 'has-error' : ''; ?>">
                        <tr>
                        <td><label>Address</label></td>
                        <td><input type="text" name="person_address" class="form-control" value="<?php echo $person_address; ?>"></td>
                        <td> <span class="help-block"><?php echo $person_address_err;?></span></td>
                            </tr>
                        </div>
                        <div class="form-inline" <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <tr>
                        <td><label>email</label></td>
                        <td><input type="text" name="email" class="form-control" value="<?php echo $email; ?>"></td>
                        <td><span class="help-block"><?php echo $email_err;?></span></td>
                        <tr>
                        </div>
                        <div class="form-inline" <?php echo (!empty($nationality_err)) ? 'has-error' : ''; ?>">
                        <tr>
                        <td><label>Nationality</label></td>
                        <td><select name='nationality' class="form-control">
							    <option value="Pakistan"> Pakistan</option>
								<option value="India"> India</option>
								<option value="Iran"> Iran</option>
                                </select>
                            
							<!--
							<?php
							$sql="select nationality from tbl_nationality";
							$res=$conn->query($sql);
						     if ($res->num_rows > 0){
								 
							
							
							while ($row=$res->fetch_assoc())
							{
								?>
								<option value="<?php echo $row['nationality'];?>"><?php echo $row['nationality'];?></option>
							 <?php }
							 }else
								 echo "no rows found".$conn->error;
							 ?>
							</select> 
							-->
							</td>
							
                            <td><span class="help-block"><?php echo $nationality_err;?></span></td>
							<tr>
                        </div>
                        <tr>
                            <td></td>
                        <td><input type="submit" class="btn btn-primary" value="Submit" width="50%">
                        <a href="..\index.php?loggedin=true" class="btn btn-primary" width="50%">Back to Main</a></td>
                            </tr>
                            </table>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>