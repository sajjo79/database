<?php
// Include config file
require_once "config.php";

if(isset($_POST["person_id"]) && !empty(trim($_POST["person_id"])))
{
	$person_id=$_POST["person_id"];
	$person_name=$_POST["person_name"];
	$father_name=$_POST["father_name"];
	$dob=$_POST["dob"];
	$phone_no=$_POST["phone_no"];
	$cnic=$_POST["cnic"];
	$picture=$_POST["picture"];
	$department_id=$_POST["department_id"];
	$designation=$_POST["designation"];
	$person_address=$_POST["person_address"];
	$email=$_POST["email"];
	$nationality=$_POST["nationality"];
	
    $sql = "UPDATE employee SET 
	cnic='".$cnic."',
	person_name='".$person_name."',
	father_name='".$father_name."',
	dob='".$dob."',
	phone_no='".$phone_no."',
	department_id='".$department_id."',
	designation='".$designation."',
	person_address='".$person_address."',
	picture='".$picture."',
	email='".$email."',
	nationality='".$nationality."'
	WHERE person_id=".$person_id;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		{			
			//echo $sql;
                //header("location: employee_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.$conn->error";
            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["person_id"]) && !empty(trim($_GET["person_id"]))){
	$sql = "SELECT * FROM employee WHERE person_id = ".$_GET["person_id"];
	//echo $sql;-
			
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $person_id=$row["person_id"];
	            $person_name=$row["person_name"];
				$father_name=$row["father_name"];
				$dob=$row["dob"];
	            $phone_no=$row["phone_no"];
	            $cnic=$row["cnic"];
				$picture=$row["picture"];
	            $department_id=$row["department_id"];
				$designation=$row["designation"];
	            $person_address=$row["person_address"];
				$nationality=$row["nationality"];
	            $email=$row["email"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: employee_error.php");
                exit();
            }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>">
                            <label>id</label>
                            <input type="text" name="person_id" class="form-control" value="<?php echo $person_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($person_name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="person_name" class="form-control" value="<?php echo $person_name; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($father_name_err)) ? 'has-error' : ''; ?>">
                            <label>Father Name</label>
                            <input type="text" name="father_name" class="form-control" value="<?php echo $father_name; ?>">

                        </div>	
						<div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>"> 
                            <label>DOB</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
                            <span class="help-block"><?php echo $dob;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cnic_err)) ? 'has-error' : ''; ?>">
                            <label>cnic</label>
                            <input type="text" name="cnic" class="form-control" value="<?php echo $cnic; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($picture_err)) ? 'has-error' : ''; ?>">
                            <label>Picture</label>
                            <input type="file" name="picture" class="form-control" value="<?php echo $picture; ?>">

                        </div>
                        <div class="form-group <?php echo (!empty($phone_no_err)) ? 'has-error' : ''; ?>">
                            <label>Phone No.</label>
                            <input type="text" name="phone_no" class="form-control" value="<?php echo $phone_no; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($department_id_err)) ? 'has-error' : ''; ?>">
                            <label>Department id</label>
                            <input type="text" name="department_id" class="form-control" value="<?php echo $department_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($designation_err)) ? 'has-error' : ''; ?>">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" value="<?php echo $designation; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($person_address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="person_address" class="form-control" value="<?php echo $person_address; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($nationality_err)) ? 'has-error' : ''; ?>">
                            <label>Nationality</label>							    
							<select name='nationality' class="form-control">
							    <option value="Pakistan"> Pakistan</option>
								<option value="India"> India</option>
								<option value="Iran"> Iran</option>
	                        <!--
							<?php
							$sql="select nationality from tbl_nationality";
							$res=$conn->query($sql);
							
							
							while ($row=$res->fetch_assoc())
							{
								?>
								<option value="<?php echo $row['nationality'];?>"><?php echo $row['nationality'];?></option>
						   <?php } ?>
							</select>
							-->
							
                            <span class="help-block"><?php echo $nationality_err;?>
							</span>
							
                        </div>
                   
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="employee_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
