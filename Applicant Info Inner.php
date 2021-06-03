<?php
/* These super global variables will grab the information input to the form and assign them to a local variable*/
$fname= $_POST["Fname"];
$lname=$_POST["Lname"];
$email=$_POST["email"];

/* This is a redirect function, if fields are empty it shall go back to the form page */
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


?>
