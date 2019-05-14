<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letter Tracking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper" align="left">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Employee Details</h2>
                        <a href="employee_create.php" class="btn btn-success pull-right">Add New Entity</a>
                        <a href="../index.php" class="btn btn-success pull-right">Back to Main</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config_main.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employee order by person_id";
					$res=$conn->query($sql);
					$tablestr="";
					if($res->num_rows>0) {  //$mystr=$mystr." world";
                            $tablestr.="<table class='table table-bordered table-striped'>";
                                $tablestr.= "<thead>";
                                    $tablestr.="<tr>";
                           
                                        $tablestr.="<th>person_id</th>";
                                        $tablestr.="<th>person_name</th>";
										$tablestr.="<th>father_name</th>";
										$tablestr.="<th>dob</th>";
                                        $tablestr.="<th>cnic</th>"; 
										$tablestr.="<th>picture</th>";
										$tablestr.="<th>phone_no</th>"; 
										$tablestr.="<th>department_id</th>";
										$tablestr.="<th>designation</th>";
                                        $tablestr.="<th>person_address</th>"; 
                                        $tablestr.="<th>email</th>"; 
                                        $tablestr.="<th>nationality</th>";										
 										$tablestr.="<th>Actions</th>";
                                    $tablestr.="</tr>";
                                $tablestr.="</thead>";
                                $tablestr.="<tbody>";
                                while($row = $res->fetch_assoc()){
                                    $tablestr.= "<tr>";
                                        $tablestr.="<td>" .  $row['person_id'] . "</td>";
                                        $tablestr.= "<td>" . $row['person_name'] . "</td>";
										$tablestr.= "<td>" . $row['father_name'] . "</td>";
										$tablestr.= "<td>" . $row['dob'] . "</td>";
                                        $tablestr.= "<td>" . $row['cnic'] . "</td>";
										$tablestr.= "<td>" . $row['picture'] . "</td>";
										$tablestr.= "<td>" . $row['phone_no'] . "</td>";
										$tablestr.= "<td>" . $row['department_id'] . "</td>";
										$tablestr.= "<td>" . $row['designation'] . "</td>";
										$tablestr.= "<td>" . $row['person_address'] . "</td>";
										$tablestr.= "<td>" . $row['email'] . "</td>";
										$tablestr.= "<td>" . $row['nationality'] . "</td>";
                                        
                                        $tablestr.="<td>";
                                            $tablestr.="<a href='employee_read.php?person_id=". $row['person_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            $tablestr.= "<a href='employee_update.php?person_id=". $row['person_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            $tablestr.= "<a href='employee_delete.php?person_id=". $row['person_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        $tablestr.= "</td>";
                                    $tablestr.= "</tr>";
                                }
                                $tablestr.= "</tbody>";                            
                            $tablestr.= "</table>";
							echo $tablestr;	
							}
                    else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                    } 
                    // Close connection
                    $conn->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>