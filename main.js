/*jshint esversion:6*/
function deactivate() {
    activeIMG.style.display='none';
    //console.log(document.getElementsByClassName("delBut"));
    $(".delBut").remove();
  }

  $(".delBut").on('tap', deletePic);
  function deletePic(){
    console.log("kaiperse");
  }

$(document).ready(function(){
  $('#list').css({'background-color':'#202020', 'border':'2px solid #202020', 'width':'80vw'});
  $('.list-element').css({'list-style-type':'none'});
  $('img').css({'width':'20vw'});
  // on load annab suure pildi ette kohe
  /*let selectedPic = $('img.active').attr('src');
  $('li.list-element').html('<img src="' + selectedPic + '">');
  $('ul img').css({'width': '80vw'});
  console.log(selectedPic);*/
  let activeIMG = document.getElementById('activeIMG');
  let btn = document.createElement("BUTTON");







  $('img').click(function(){
    let currentPic = $('img.active');
    $(this).addClass('active');
    currentPic.removeClass('active');
    selectedPic = $(this).parent().find('.active').attr('src');


    $('li.list-element').html('<img src="' + selectedPic + '">').hide().fadeIn(2000);
    $('ul img').css({'width': '80vw', 'height':'80vh', 'margin-left':'7.5%'});

    let activeIMG = document.getElementById('activeIMG');
    let btn = document.createElement("BUTTON");
    btn.innerHTML = "Kustuta pilt";

    document.body.appendChild(btn);
    $("BUTTON").addClass("delBut");
    $('.delBut').click(function(){
      console.log("eieieieiei");
      //siia pildi kustutamine
      //document.getElementsByClassName("active");
      //console.log(document.getElementsByClassName("active"));
      $(".active").remove();
      deactivate();

    });


  });
});
