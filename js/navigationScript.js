$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("200");
  $(this).find("i.fa").toggleClass("fa-angle-up fa-angle-down");
});

$('.user-menu').hide();
$("#toggleMenu").click(function() {
  $('.user-menu').animate({width: "toggle"});
  $('#toggleMenu div').toggleClass("fa fa-align-left fa fa-times");
});

$('#login').click(function() {
  $('.modal').removeClass('hidden');
  $('.overlay').removeClass('hidden');
});

$('#close-modal').click(function() {
  $('.modal').addClass('hidden');
  $('.overlay').addClass('hidden');
});
