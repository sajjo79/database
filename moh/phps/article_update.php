<?php
// Include config file
require_once "config.php";

if(isset($_POST["serial_no"]) && !empty(trim($_POST["serial_no"])))
{
	$serial_no=$_POST["serial_no"];
	$file_no=$_POST["file_no"];
	$article_date=$_POST["article_date"];
	$article_time=$_POST["article_time"];
	$article_subject=$_POST["article_subject"];
	$article_disposal=$_POST["article_disposal"];
	
	
    $sql = "UPDATE article SET 
	file_no='".$file_no."',
	article_date='".$article_date."',
	article_time='".$article_time."',
	article_subject='".$article_subject."',
	article_disposal='".$article_disposal."'
	WHERE serial_no=".$serial_no;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		{			
			//echo $sql;
                //header("location: article_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.";
            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["serial_no"]) && !empty(trim($_GET["serial_no"]))){
	$sql = "SELECT * FROM article WHERE serial_no = ".$_GET["serial_no"];
	//echo $sql;-
			
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $serial_no=$row["serial_no"];
	            $file_no=$row["file_no"];
				$article_date=$row["article_date"];
				$article_time=$row["article_time"];
				$article_subject=$row["article_subject"];
				$article_disposal=$row["article_disposal"];
				
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: article_error.php");
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
                        <div class="form-group <?php echo (!empty($serial_no_err)) ? 'has-error' : ''; ?>">
                            <label>Serial No</label>
                            <input type="text" name="serial_no" class="form-control" value="<?php echo $serial_no; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($file_no_err)) ? 'has-error' : ''; ?>">
                            <label>File No</label>
                            <input type="text" name="file_no" class="form-control" value="<?php echo $file_no; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($article_date_err)) ? 'has-error' : ''; ?>">
                            <label>Article Date</label>
                            <input type="text" name="article_date" class="form-control" value="<?php echo $article_date; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($article_time_err)) ? 'has-error' : ''; ?>">
                            <label>Article Time</label>
                            <input type="text" name="article_time" class="form-control" value="<?php echo $article_time; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($article_subject_err)) ? 'has-error' : ''; ?>">
                            <label>Article Subject</label>
                            <input type="text" name="article_subject" class="form-control" value="<?php echo $article _subject; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($article_disposal_err)) ? 'has-error' : ''; ?>">
                            <label>Article Disposal</label>
                            <input type="text" name="article_disposal" class="form-control" value="<?php echo $article_disposal; ?>">
                        </div>
					    						
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="article_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>
