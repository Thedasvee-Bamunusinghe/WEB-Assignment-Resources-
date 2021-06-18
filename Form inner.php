<?php
/*This will establish a connection to the MySQL database and assign it to variable $mysqli*/
/*This database will allow creating, updating, reading and deleting records */

/*This will establish a connection to the localhost*/
$mysqli=new mysqli('localhost','root') or die(mysqli_error($mysqli));
/*A database will be created if does not already exist */
$mysqli->query("CREATE DATABASE IF NOT EXISTS CRUD") or die(mysqli_error($mysqli));
/*This will open the created database named CRUD*/
$mysqli->query("USE CRUD") or die(mysqli_error($mysqli));
/*The table named data will be created here, ID will act as the primary key*/
$mysqli->query("CREATE TABLE IF NOT EXISTS data(ID INT(11) AUTO_INCREMENT PRIMARY KEY,FName VARCHAR(150),LName VARCHAR(150),Email VARCHAR(200) )") or die(mysqli_error($mysqli));
/*This will now connect to the created database */
$mysqli = new mysqli('localhost','root','','CRUD') or die(mysqli_error($mysqli));

?>

<html>
<head>
	<link rel="shortcut icon" type="image/jpg" href="https://drive.google.com/uc?export=view&id=1Yf0M30wl0l17_nbd40v_WINbGRs4v-Rc">
	<!--Connection to the bootstrap stylesheet -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!--Internal css used to style the webpage body-->
	<style type="text/css">
		body {
			background: rgb(17,16,16);
            background: linear-gradient(90deg, rgba(17,16,16,1) 0%, rgba(54,54,55,1) 100%);
			color: white;
		     }
	</style>
</head>	
<title>Database</title>
<!--Bootstrap class that will add padding to the elements within it-->
<div class="container">

<?php 

/*Update value to allow the update fields to be hidden, it will become true once the edit button is clicked*/
$update= false;
/*Values are intially kept null */
$fname="";
$lname="";
$email="";

/*The isset function checks if a certain variable has been set, in this case it will check whether the submit button has been pressed in the form*/
if (isset($_POST['done'])){
	/*If it detects that the submit button has been pressed it will fetch the data entered into the form*/
	$id=$_POST['ID'];
    $fname=$_POST['Fname'];
    $lname=$_POST['Lname'];
    $email=$_POST['email'];
    /*This query will insert the fetched data into the Mysql database*/
	$mysqli -> query("INSERT INTO data (FName,LName,Email) VALUES ('$fname', '$lname', '$email')") or die($mysqli->error);
/*This will redirect back to the form page*/
header("location: Form.php");
}

/*The isset function will execute the deletion query if the delete button is clicked*/
if (isset($_GET['delete'])){
	/*The id will correspond to the relevant field of information*/
	$id=$_GET['delete'];
	/*This will delete all the rows related to the relevant id */
	$mysqli-> query("DELETE FROM data WHERE ID=$id") or die($mysqli->error());
/*This will redirect back to the database page*/
header("location: Form inner.php");
}
/*The isset function will check if the edit button is clicked */
if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	/*Setting update to true will allow the update form to be visible */
	$update = true;
	/*This will select all the rows relevant to the ID and display them in the update form below the database*/
	$result = $mysqli->query("SELECT * FROM data WHERE ID=$id") or die($mysqli->error());
	/*This will check if the rows related to the ID exists and display them if count returns 1*/
	if (count(array($result))==1){
		$row = $result->fetch_array();
		$fname= $row['FName'];
		$lname= $row['LName'];
		$email= $row['Email'];	
	}
}   
    /*This will execute once the update button is pressed*/
	if (isset($_POST['update'])){
		$id = $_POST['id'];
		/*Fields are updated and assigned from the internal form to the main variables*/
		$fname = $_POST['fname2'];
		$lname = $_POST['lname2'];
		$email = $_POST['email2'];
		/*The relevant fields within the database are changed based on the new information*/
		$mysqli->query("UPDATE data SET FName='$fname', LName='$lname', Email='$email' WHERE ID=$id") or die($mysqli->error);
	}

/*The result variable will be used in fetching array values for displaying in the update form and database*/
$result= $mysqli -> query("SELECT * FROM data") or die($mysqli->error);
?>

<body>
<!--Bootstrap table class-->	
<div class="row justify-content-center">
 <table class="table">
 	<thead>
 		<tr>
 			<th>ID</th>
 			<th>First Name</th>
 			<th>Last Name</th>
 			<th>Email</th>
 			<!--This table head will take up 2 columns, it is for the edit and delete buttons-->
 			<th colspan="2">Action</th>
 		</tr>	
 	</thead>

<?php 
/*This will use $result to fetch all database values and return an array*/
while($row = $result->fetch_assoc()) { ?>
<tr> 
	<!--Fetched values will be displayed as table elements-->
	<td><?php echo $row['ID'] ?></td>
	<td><?php echo $row['FName'] ?></td>
	<td><?php echo $row['LName'] ?></td>
	<td><?php echo $row['Email'] ?></td>
	<td> 
		<!--This will create the delete button and edit buttons and assign the relevant row ID to it -->
		<a href="Form inner.php?edit=<?php echo $row['ID'];?>"
			class="btn btn-info">Edit</a>

		<a href="Form inner.php?delete=<?php echo $row['ID'];?>"
		class="btn btn-danger" onclick="a()">Delete</a>	
		
				
	</td>	
</tr>
<?php } ?>
</table>
</div>
</div>
<center>

<?php 
/*This will show the form below the database if the edit button is clicked, if not the form will be hidden*/
if ($update == true):
?>
<table>	
<!--$_SERVER['PHP_SELF'] will use the post method to retrieve information from this php file itself-->	
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">	
<tr>		
<td>First Name:</td>
<!--The use of value="" will use the fetched data from the edit function to fill out the fields of the form to be updated-->
<!--Placeholder="" will keep the initial form values empty-->
<td><input type="text" name=fname2 value="<?php echo $fname; ?>" placeholder="" style="width: 118%; border-radius: 10px;"></td></tr>
<tr><td>
Last Name:</td>
<td><input type="text" name=lname2 value="<?php echo $lname; ?>" placeholder="" style="width: 118%; border-radius: 10px;">
</td></tr>
<tr><td>
E-Mail:</td>
<td><input type="email" name=email2 value="<?php echo $email; ?>" placeholder="" style="width: 118%; border-radius: 10px;">
</td></tr>
<tr><td>
<input type="submit" name="update" value="Update" style="margin: 10px; padding: 10px; border-radius: 20px; background-color: lime; border: 0px;">
</tr></td>

<?php else: ?>
<input type="hidden">
<!--This will end the if statement-->
<?php endif; ?>
</table>
</form>
</center>
</div>
<center>
	<!--Inline css is used to style the hr tag-->
	<hr style="border-top: 1px solid whitesmoke;">
	<!--These buttons are linked to the main form and homepage respectively-->
	<a href="Form.php"><button class="b1">Back To Form</button></a>
	<a href="index.html"><button class="b2">Back To Homepage</button></a>
	<!--Internal CSS used to give special styling to the buttons-->
	<style>
	button{

		padding: 10px;
		/*This will add curvature to button borders*/
		border-radius: 20px;
		border: 0px;
	}
	/*Color gradients are used as the background of these buttons */
	.b1{
		background-color: #F4D03F;
        background-image: linear-gradient(328deg, #F4D03F 0%, #16A085 100%);
       }
    .b2{
        background-color: #FF9A8B;
        background-image: linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%);
       }
    </style>


</center>
</body>
</html>


