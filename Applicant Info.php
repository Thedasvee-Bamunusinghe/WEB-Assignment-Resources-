<!DOCTYPE html>
<html>
<head>
<title>Application Form</title>
<!-- Link to external javascript file -->
<script src="Scripts.js"></script>
<!--Link to external stylesheet-->
<link rel="stylesheet" type="text/css" href="Form style.css">
</head>
<body>

<!-- Link to php file (the file will fetch entered information) , the javascript file will exceute function validation once the form is submitted -->
<form name="details" method="post" action="Applicant Info Inner.php" onsubmit="validateForm()">
	<!-- Table containing fields for user input -->
	<h1> Enter Your Details </h1>
	<table>
		<tr><td>First Name:</td>
			<td><input type="text" name="Fname"></td>
		</tr>
		<tr><td>Last Name:</td>
			<td><input type="text" name="Lname"></td>
		</tr>
		<tr><td>Email:</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr><td><input type="submit" name="done" value="Submit"></td>
		</tr>
		
</table>
</form>
</body>
</html>
