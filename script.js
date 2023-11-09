function validate() {
  var username = document.getElementById("user").value;
  var password = document.getElementById("pass").value;

  // Admin credentials
  var LDUsername = "admin";
  var LDPassword = "admin";

  // Array of tenants with their usernames and passwords
  var tenants = [
    { username: "2a", password: "123", type: "tenant" },
    { username: "2b", password: "456", type: "tenant" },
    { username: "3a", password: "789", type: "tenant" },
    // Add more tenants as needed
  ];

  // Check if the provided username and password match the admin
  if (username === LDUsername && password === LDPassword) {
    window.location.href = "landlord.html";
    return false;
  }

  // Check if the provided username and password match any tenant
  var matchedTenant = tenants.find(function (tenant) {
    return tenant.username === username && tenant.password === password;
  });

  if (matchedTenant) {
    if (matchedTenant.type === "tenant") {
      window.location.href = "tenant.html";
    } else {
      window.location.href = "landlord.html";
    }
    return false;
  } else {
    alert("Login Failed");
    return false;
  }
}
function gotothelogin() {
  var newPageURL = "index.html";
  window.location.href = newPageURL;
  return false;
}
function togglePassword() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
