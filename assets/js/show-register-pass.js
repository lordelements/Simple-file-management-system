function myFunction() {
    var x = document.getElementById("pass");
    var y = document.getElementById("cpass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
  }