var counter = 1;
setInterval(function () {
  document.getElementById("radiob" + counter).checked = true;
  counter++;
  if (counter > 3) {
    counter = 1;
  }
}, 4000);
