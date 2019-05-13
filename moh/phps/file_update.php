<?php
// Include config file
require_once "config.php";

if(isset($_POST["file_no"]) && !empty(trim($_POST["file_no"])))
{
	$file_no=$_POST["file_no"];
	$scholarships=$_POST["scholarships"];
	$registration_letters=$_POST["registration_letters"];
	$controller_of_examination=$_POST["controller_of_examination"];
	$visiting_faculty_letters=$_POST["visiting_faculty_letters"];
	$establishment_branch=$_POST["establishment_branch"];
	$treasurer_office=$_POST["treasurer_office"];
	$vc_office_approvals=$_POST["vc_office_approvals"];
	
	
    $sql = "UPDATE file SET 
	scholarships='".$scholarships."',
	registration_letters='".$registration_letters."',
	controller_of_examination='".$controller_of_examination."',
	visiting_faculty_letters='".$visiting_faculty_letters."',
	establishment_branch='".$establishment_branch."',
	treasurer_office='".$treasurer_office."',
	vc_office_approvals='".$vc_office_approvals."',
	WHERE file_no=".$file_no;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		{			
			//echo $sql;
                //header("location: file_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.";
            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["file_no"]) && !empty(trim($_GET["file_no"]))){
	$sql = "SELECT * FROM file WHERE file_no = ".$_GET["file_no"];
	//echo $sql;-
			
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $fie_no=$row["file_no"];
	            $scholarships=$row["scholarships"];
				$registration_letters=$row["registration_letters"];
				$controller_of_examination=$row["controller_of_examination"];
	            $visiting_faculty_letters=$row["visiting_faculty_letters"];
	            $establishment_branch=$row["establishment_branch"];
				$treasurer_office=$row["treasurer_office"];
	            $vc_office_approvals=$row["vc_office_approvals"];
			
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: file_error.php");
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
                        <div class="form-group <?php echo (!empty($file_no_err)) ? 'has-error' : ''; ?>">
                            <label>File No</label>
                            <input type="text" name="file_no" class="form-control" value="<?php echo $file_no; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($scholarships_err)) ? 'has-error' : ''; ?>">
                            <label>Scholarships</label>
                            <input type="text" name="scholarships" class="form-control" value="<?php echo $scholarships; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($registration_letters_err)) ? 'has-error' : ''; ?>">
                            <label>Registration Letters</label>
                            <input type="text" name="registration_letters" class="form-control" value="<?php echo $registration_letterstion_; ?>">

                        </div>	
						<div class="form-group <?php echo (!empty($controller_of_examination_err)) ? 'has-error' : ''; ?>"> 
                            <label>Controller  Of Examination</label>
                            <input type="text" name="controller_of_examination" class="form-control" value="<?php echo $controller_of_examination; ?>">
                            <span class="help-block"><?php echo $controller_of_examination_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($visiting_faculty_letters_err)) ? 'has-error' : ''; ?>">
                            <label>Visiting Faculty Letters</label>
                            <textarea type="text" name="visiting_faculty_letters" class="form-control"><?php echo $visiting_faculty_letters; ?></textarea>

                        </div>
						<div class="form-group <?php echo (!empty($treasurer_office_err)) ? 'has-error' : ''; ?>">
                            <label>Establishment Branch</label>
                            <input type="text" name="treasurer_office" class="form-control" value="<?php echo $treasurer_office; ?>">

                        </div>
                        <div class="form-group <?php echo (!empty($vc_office_approvals_err)) ? 'has-error' : ''; ?>">
                            <label>VC Office Approvals</label>
                            <input type="text" name="vc_office_approvals" class="form-control" value="<?php echo $vc_office_approvals; ?>">

                        </div>
						
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="file_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
