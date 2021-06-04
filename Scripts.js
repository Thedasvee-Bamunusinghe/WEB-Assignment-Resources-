
function validateForm() 
{
  var x = document.forms["details"]["Fname"].value;
  if (x == "") {
    alert("First Name must be filled out");
  }
  var y = document.forms["details"]["Lname"].value;
  if (y == "") {
    alert("Last Name must be filled out");
  }  
  var z = document.forms["details"]["email"].value;
  if (z == "") {
  alert("Email is empty");
  return false;
}

}

