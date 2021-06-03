<?php

$fname= $_POST["Fname"];
$lname=$_POST["Lname"];
$email=$_POST["email"];

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
