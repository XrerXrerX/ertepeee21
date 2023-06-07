window.addEventListener("load", function() {
document.querySelector("body").classList.add("loaded");
  if (!localStorage.getItem("loaded")) {
    document.querySelector("body").classList.add("loaded");
    localStorage.setItem("loaded", "true");
  }
});


//window.addEventListener("load", function() {
  //document.querySelector("body").classList.add("loaded");
//});