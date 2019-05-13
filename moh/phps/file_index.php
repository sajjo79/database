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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Files Details</h2>
                        <a href="file_create.php" class="btn btn-success pull-right">Add New Entity</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM file order by file_no";
					$res=$conn->query($sql);
					$tablestr="";
					if($res->num_rows>0) {  //$mystr=$mystr." world";
                            $tablestr.="<table class='table table-bordered table-striped'>";
                                $tablestr.= "<thead>";
                                    $tablestr.="<tr>";
                                        
                                        $tablestr.="<th>file_no</th>";
                                        $tablestr.="<th>scholarships</th>"; 
                                        $tablestr.="<th>registration_letters</th>";  
                                        $tablestr.="<th>controller_of_examination</th>";
									    $tablestr.="<th>visiting_faculty_letters</th>";
										$tablestr.="<th>establishment_branch</th>";
										$tablestr.="<th>treasurer_office</th>";
										$tablestr.="<th>vc_office_approvals</th>";
                                        $tablestr.="<th>Actions</th>";  									   
                                    $tablestr.="</tr>";
                                $tablestr.="</thead>";
                                $tablestr.="<tbody>";
                                while($row = $res->fetch_assoc()){
                                    $tablestr.= "<tr>";
									$tablestr.="<td>" . $row['file_no'] . "</td>";
                                        $tablestr.="<td>" . $row['scholarships'] . "</td>";
                                        $tablestr.= "<td>" . $row['registration_letters'] . "</td>";
                                        $tablestr.= "<td>" . $row['controller_of_examination'] . "</td>";
                                        $tablestr.= "<td>" . $row['visiting_faculty_letters'] . "</td>";
										$tablestr.= "<td>" . $row['establishment_branch'] . "</td>";
										$tablestr.= "<td>" . $row['treasurer_office'] . "</td>";
										$tablestr.= "<td>" . $row['vc_office_approvals'] . "</td>";
										
                                        $tablestr.="<td>";
                                            $tablestr.="<a href='file_read.php?file_no=". $row['file_no'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            $tablestr.= "<a href='file_update.php?file_no=". $row['file_no'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            $tablestr.= "<a href='file_delete.php?file_no=". $row['file_no'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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