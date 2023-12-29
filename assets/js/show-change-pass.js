function myFunction() {
    var z = document.getElementById("npass");
        
        if (z.type === "password") {
        z.type = "text";
        } else {
        z.type = "password";
        }
  }