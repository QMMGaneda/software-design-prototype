function validate() {
  var username = document.getElementById("user").value;
  var password = document.getElementById("pass").value;

  // Replace these values with your desired username and password
  var LDUsername = "admin";
  var LDPassword = "admin";
  var TUsername = "2a";
  var TPassword = "123";

  if (username === LDUsername && password === LDPassword) {
    alert("Login Successful");
    window.location.href = "landlord.html";
    return false;
  } else if (username === TUsername && password === TPassword) {
    alert("Login Successful");
    window.location.href = "tenant.html";
    return false;
  } else {
    alert("Login Failed");
    return false;
  }
}
function togglePassword() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
