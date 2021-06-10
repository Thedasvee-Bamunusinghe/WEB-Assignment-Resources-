<!DOCTYPE html>
<html>
<head>
<title>Application Form</title>
<!-- Link to external javascript file -->
<script src="Scripts.js"></script>
<!--Link to external stylesheet-->
<link rel="stylesheet" type="text/css" href="Form style.css">
<!--Connection to Bootrstrap Stylesheet -->	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!--This image will be the favicon-->
<link rel="shortcut icon" type="image/jpg" href="https://drive.google.com/uc?export=view&id=1nK2v00rKSLMzBJIgy0OmcTaJ7etAAgbL">
<!--Connection to Fontawesome icon library -->
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<!--Connection to external css stylesheet -->
<link rel="stylesheet" type="text/css" href="Form Style.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
<a class="navbar-logo" href=""><img src="https://drive.google.com/uc?export=view&id=1ZCKxb_a6yf4YS4A5d0l8SxAuONhmJZ9B" width="8%" height="8%"></a>
<a href="index.html"><button type="button" class="btn btn-primary btn-md"><i>< Back To Homepage</i></button></a>
</div>
</nav>
	
<!-- Link to php file (the file will fetch entered information) , the javascript file will exceute function validation once the form is submitted -->
<form name="details" method="post" action="Form Inner.php" onsubmit="validateForm()">
	<!-- Table containing fields for user input -->
	<h1> Enter Your Details </h1>
	
	<!--div class used to seperate fields of the form-->
	<div class="form-group">
	<!--i tags use the Fontawesome library to show various icons on the page, here it is used to show a user icon -->
	<label><i class="fa fa-user" aria-hidden="true"></i> First Name:</label><br>
		<!--Input box to recieve first name -->
		<input type="text" name="Fname">
	</div>
	
	<div class="form-group">
		<!--Fontawesome icon for a comment -->
		<label><i class="fa fa-comment" aria-hidden="true"></i> Last Name:</label><br>
		<!--Input box to recieve last name -->
		<input type="text" name="Lname">
	</div>
	
	<div class="form-group">
		<!--Fontawesome icon for an envelope -->
		<label><i class="fa fa-envelope" aria-hidden="true"></i> Email:</label><br>
		<!--Input box to recieve email-->
		<input type="email" name="email"><br>
	</div>
	
	<div class="form-group">
		<!--Button used to confirm information, it will send the information to the php file through the post method -->
		<input type="submit" name="done" value="Submit">
	</div>	
		

</form>
</body>
</html>
