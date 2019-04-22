/*jshint esversion:6*/


window.addEventListener('load', function() {
  document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('img');
          img.src = URL.createObjectURL(this.files[0]);
          img.onload = imageIsLoaded;
      }
  });
});

function imageIsLoaded(e) { alert(e); }
