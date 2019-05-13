<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["file_no"]) && !empty(trim($_GET["file_no"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$file_no=$_GET["file_no"];
    $sql = "SELECT * FROM file WHERE file_no = ".$file_no;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
		        $file_no = $row["file_no"];
                $scholarships = $row["scholarships"];
				$registration_letters = $row["registration_letters"];
				$visiting_faculty_letters = $row["visiting_faculty_letters"];
				$controller_of_examination = $row["controller_of_examination"];
				$establishment_branch = $row["establishment_branch"];
				$treasurer_office = $row["treasurer_office"];
				$vc_office_approvals = $row["vc_office_approvals"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: file_error.php");
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
    <title>View Record</title>
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
                        <h1>View Record</h1>
                    </div>
					<div class="form-group">
                        <label>File No</label>
                        <p class="form-control-static"><?php echo $row["file_no"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Scholarships </label>
                        <p class="form-control-static"><?php echo $row["scholarships"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Registration Letters</label>
                        <p class="form-control-static"><?php echo $row["registration_letters"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Visiting Faculty Letters</label>
                        <p class="form-control-static"><?php echo $row["visiting_faculty_letters"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Controller Of Examination</label>
                        <p class="form-control-static"><?php echo $row["controller_of_examination"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Establishment Branch</label>
                        <p class="form-control-static"><?php echo $row["establishment_branch"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Treasurer Office</label>
                        <p class="form-control-static"><?php echo $row["treasurer_office"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>VC Office Approvals</label>
                        <p class="form-control-static"><?php echo $row["vc_office_approvals"]; ?></p>
                    </div>
					
                    <p><a href="file_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>