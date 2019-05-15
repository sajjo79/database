<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'letter_tracking');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if($conn==false)
{
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE DATABASE if not exists ".DB_NAME;
if ($conn->query($sql) === TRUE) {
	echo "1. Database created successfully";
	echo "<br>";
} else {
	echo "Error creating database: " . $conn->error;
	die();
}

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_NAME);
if ($conn->query($sql) === TRUE) {
	echo "2. Connected to database successfully";
	echo "<br>";
} else {
	echo "Error connecting  database: " . $conn->error;
	die();
}


/////////////////////////////////////////////
function droptables(){
	//drop all tables
	$sql1="drop table tbl_employee_dispatch_info";
	$sql2="drop table tbl_employee_recieved_info";
	$sql3="drop table tbl_article_department";
	$sql4="drop table tbl_article_employee";
	$sql5="drop table tbl_recieved_info";
	$sql6="drop table tbl_dispatch_info";
	$sql7="drop table tbl_employee";
	$sql8="drop table tbl_article";
	$sql9="drop table tbl_department";
	$sql10="drop table tbl_file";

	$res=$conn->query($sql1);
	if($res==True)
		echo "Deleted Table:: tbl_employee_dispatch_info <br>";
	else 
		echo "error in deleting the table tbl_employee_dispatch_info. ".$conn->error."<br>";

	$res=$conn->query($sql2);
	if($res==True)
		echo "Deleted Table:: employee_received_info <br>";
	else 
		echo "error in deleting the table employee_recieved_info. ".$conn->error."<br>";
	$res=$conn->query($sql3);
	if($res==True)
		echo "Deleted Table:: article_department <br>";
	else 
		echo "error in deleting the table article_department. ".$conn->error."<br>";
	$res=$conn->query($sql4);
	if($res==True)
		echo "Deleted Table::  article_employee <br>";
	else 
		echo "error in deleting the table article_employee. ".$conn->error."<br>";
	$res=$conn->query($sql5);
	if($res==True)
		echo "Deleted Table:: recieved_info <br>";
	else 
		echo "error in deleting the table recieved_info. ".$conn->error."<br>";
	$res=$conn->query($sql6);
	if($res==True)
		echo "Deleted Table:: dispatch_info <br>";
	else 
		echo "error in deleting the table dispatch_info. ".$conn->error."<br>";
	$res=$conn->query($sql7);
	if($res==True)
		echo "Deleted Table:: employee <br>";
	else 
		echo "error in deleting the table employee. ".$conn->error."<br>";
	$res=$conn->query($sql8);
	if($res==True)
		echo "Deleted Table:: article  <br>";
	else 
		echo "error in deleting the table article . ".$conn->error."<br>";
	$res=$conn->query($sql9);
	if($res==True)
		echo "Deleted Table:: department  <br>";
	else 
		echo "error in deleting the table department . ".$conn->error."<br>";
	$res=$conn->query($sql10);
	if($res==True)
		echo "Deleted Table:: file  <br>";
	else 
		echo "error in deleting the table file . ".$conn->error."<br>";
}
///////////////////////////////////////////////////////////
function createtables(){
	$create_table_statement="CREATE TABLE if not exists tbl_file(
		file_no bigint,
		PRIMARY KEY(file_no),
		scholarships varchar(1000),
		registration_letters varchar(1000),
		controller_of_examination varchar(1000),
		visiting_faculty_letters varchar(1000),
		establishment_branch varchar(1000),
		treasurer_office varchar(1000),
		vc_office_approvals varchar(1000)
			
	) ENGINE=INNODB;";

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_file <br>";
	else	
		echo " failed to create table file.". $conn->error."<br>";

	//////////////////////////////////////////////////////////////////
	$create_table_statement="CREATE TABLE if not exists tbl_department(
		department_id bigint,
		PRIMARY KEY(department_id),
		department_name varchar(1000),
		description varchar(1000)
		
	
	) ENGINE=INNODB;";

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_department <br>";
	else	
		echo " failed to create table department.". $conn->error."<br>";
	///////////////////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_article(
		article_no bigint,
		PRIMARY KEY(article_no),
		article_date date,
		article_type varchar(100),
		article_subject varchar(1000),
		article_sender varchar(1000),
		article_receiver varchar(1000)
	) ENGINE=INNODB;";

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_article <br>";
	else	
		echo " failed to create table article.".$conn->error."<br>";
	////////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_employee(
		person_id bigint,
		PRIMARY KEY(person_id),
		person_name varchar(255),
		father_name varchar(255),
		dob date,
		person_address varchar(255),
		designation varchar(100),
		cnic char(15),
		phone_no char(11),
		email varchar(255),
		picture varchar(1000),
		nationality varchar(100),
		department_id bigint,
		
		FOREIGN KEY (department_id) REFERENCES tbl_department(department_id)
		
		
	) ENGINE=INNODB;";

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_employee <br>";
	else	
		echo " failed to create table employee.". $conn->error."<br>";
	//////////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_dispatch_info(
		dispatch_id bigint,
		PRIMARY KEY(dispatch_id),
		person_id bigint,
		dipatch_date date,
		dispatch_time datetime,
		dispatched_by varchar(500),
		
		FOREIGN KEY (person_id) REFERENCES tbl_employee(person_id)
	
			
	) ENGINE=INNODB;";

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_dispatch_info<br>";
	else	
		echo " failed to create table dispatch_info.". $conn->error."<br>";

	///////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_recieved_info(
		recieved_id bigint,
		PRIMARY KEY(recieved_id),
		person_id bigint,
		recieved_date date,
		recieved_time datetime,
		recieved_by varchar(500),
		FOREIGN KEY (person_id) REFERENCES tbl_employee(person_id)
	) ENGINE=INNODB;";

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_recieved_info <br>";
	else	
		echo " failed to create table recieved_info.". $conn->error."<br>";

	//////////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_article_employee(
		serial_no bigint,
		person_id bigint,
		remarks varchar(1000),
		description varchar(1000),
		
		FOREIGN KEY (person_id) REFERENCES tbl_employee(person_id),
		FOREIGN KEY (serial_no) REFERENCES tbl_article(serial_no)
	) ENGINE=INNODB;";	
	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_article_employee<br>";
	else	
		echo " failed to create table  article_employee.". $conn->error."<br>";

	//////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_article_department(
		serial_no bigint,
		department_id bigint,
		description varchar(1000),
		
		FOREIGN KEY (serial_no) REFERENCES tbl_article(serial_no),
		FOREIGN KEY (department_id) REFERENCES tbl_department(department_id)

	) ENGINE=INNODB;";
		
	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_article_department<br>";
	else	
		echo " failed to create table article_department.". $conn->error."<br>";

	//////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_employee_recieved_info(
		person_id bigint NOT NULL,
		recieved_id bigint NOT NULL,
		PRIMARY KEY (person_id,recieved_id),
		FOREIGN KEY (person_id) REFERENCES tbl_employee(person_id),
		FOREIGN KEY (recieved_id) REFERENCES tbl_recieved_info(recieved_id),
		UNIQUE(person_id,recieved_id)
	
	) ENGINE=INNODB;";
		

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_employee_received_info <br>";
	else	
		echo " failed to create table employee_received_info.". $conn->error."<br>";
	///////////////////////////////////////////////////////////////////////

	$create_table_statement="CREATE TABLE if not exists tbl_employee_dispatch_info(
		person_id bigint NOT NULL,
		dispatch_id bigint NOT NULL,
		
		PRIMARY KEY(person_id,dispatch_id),
		FOREIGN KEY (person_id) REFERENCES tbl_employee(person_id),
		FOREIGN KEY (dispatch_id) REFERENCES tbl_dispatch_info(dispatch_id),
		UNIQUE (person_id,dispatch_id) 
	) ENGINE=INNODB;";
		

	$result=$conn->query($create_table_statement);
	if($result==true) 
		echo "Created Table:: tbl_employee_dispatch_info <br>";
	else	
		echo " failed to create table employee_dispatch_info.". $conn->error."<br>";
	///////////////////////////////////////////////////////////////////////

}

droptables();
createtables();

?>