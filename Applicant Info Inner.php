<?php
/* These super global variables will grab the information input to the form and assign them to a local variable*/

$fname= $_POST["Fname"]; //This will fetch the first name//
$lname=$_POST["Lname"]; //This will fetch the last name//
$email=$_POST["email"]; //This will fetch the email//

/* These are redirect functions, if fields are empty it will use javascript to go back to the form page */

if($fname=="")
{
	echo '<script>
	window.location.href="Applicant Info.html"
	</script>';
}

if($lname=="")
{
	echo '<script>
	window.location.href="Applicant Info.html"
	</script>';
}

if($email=="")
{
	echo '<script>
	window.location.href="Applicant Info.html"
	</script>';
}

?>
