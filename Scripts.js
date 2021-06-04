
function validateForm() 
{
  // This will fetch the First name value from the form and assign it to variable x. If First name is empty an alert will be shown //
  var x = document.forms["details"]["Fname"].value;
  if (x == "") {
    alert("First Name must be filled out");
  }
    // This will fetch the Last name value from the form and assign it to variable y. If Last name is empty an alert will be shown //
  var y = document.forms["details"]["Lname"].value;
  if (y == "") {
    alert("Last Name must be filled out");
  }  
   // This will fetch the Email value from the form and assign it to variable z. If Email is empty an alert will be shown //
  var z = document.forms["details"]["email"].value;
  if (z == "") {
  alert("Email is empty");
  return false;
}

}

