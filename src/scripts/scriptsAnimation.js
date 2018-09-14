function typeEffect(element, speed) {
  var text = $(element).text();
  $(element).html('');

  var i = 0;
  var timer = setInterval(function() {
    if (i < text.length) {
      $(element).append(text.charAt(i));
      i++;
    } else {
      clearInterval(timer);
    }
  }, speed);
}

$( document ).ready(function() {
  var speed = 100;
  var delay = $('.title').text().length * speed + speed;
  typeEffect($('.title'), speed);
  setTimeout(function(){
    $('.subtitle').css('display', 'inline-block');
    typeEffect($('.subtitle'), speed);
  }, delay);
});
