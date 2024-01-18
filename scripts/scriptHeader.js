function myFunction() {
    var x = document.getElementById("myLinks");
    var y = document.getElementById("logoLink");
    if (x.style.display === "flex") {
      x.style.display = "none";
      y.style.display = "block";
    } else {
      x.style.display = "flex";
      y.style.display = "none";
    }
  }