<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["person_id"]) && !empty(trim($_GET["person_id"]))){
    // Include config file
    require_once "config_main.php";
    
    // Prepare a select statement
	$person_id=$_GET["person_id"];
    $sql = "SELECT * FROM employee WHERE person_id = ".$person_id;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
		        $person_id = $row["person_id"];
                $person_name = $row["person_name"];
				$father_name = $row["father_name"];
				$dob = $row["dob"];
                $cnic = $row["cnic"];
				$picture = $row["picture"];
                $phone_no = $row["phone_no"];
				$department_id = $row["department_id"];
				$designation = $row["designation"];
				$person_address = $row["person_address"];
				$nationality = $row["nationality"];
				$email = $row["email"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: employee_error.php");
                exit();
            }
            
        
		
    // Close connection
    $conn->close();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employee Record</title>
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
                        <h1>View Employee Record</h1>
                    </div>
					<div class="form-group">
                        <label>id</label>
                        <p class="form-control-static"><?php echo $row["person_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["person_name"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Fther Name</label>
                        <p class="form-control-static"><?php echo $row["father_name"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>DOB</label>
                        <p class="form-control-static"><?php echo $row["dob"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>cnic</label>
                        <p class="form-control-static"><?php echo $row["cnic"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Picture</label>
                        <p class="form-control-static"><?php echo $row["picture"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Phone No</label>
                        <p class="form-control-static"><?php echo $row["phone_no"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Department id</label>
                        <p class="form-control-static"><?php echo $row["department_id"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Designation</label>
                        <p class="form-control-static"><?php echo $row["designation"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["person_address"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Nationality</label>
                        <p class="form-control-static"><?php echo $row["nationality"]; ?></p>
                    </div>
                    <p><a href="employee_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>