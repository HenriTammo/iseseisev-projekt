/*jshint esversion:6*/
$(document).ready(function(){
  $('#list').css({'background-color':'white', 'border':'2px solid white', 'width':'80vw'});

  $('.list-element').css({'list-style-type':'none'});

  $('img').css({'width':'20vw'});

  let selectedPic = $('img.active').attr('src');
  $('li.list-element').html('<img src="' + selectedPic + '">');
  $('ul img').css({'width': '80vw'});
  console.log(selectedPic);

  $('img').click(function(){
    let currentPic = $('img.active');
    $(this).addClass('active');
    currentPic.removeClass('active');
    selectedPic = $(this).parent().find('.active').attr('src');

    $('li.list-element').html('<img src="' + selectedPic + '">').hide().fadeIn(2000);
    $('ul img').css({'width': '80vw'});
  });
});
