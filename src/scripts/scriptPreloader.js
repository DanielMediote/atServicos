$(document).ready(function($) {
  var pagina = $('#pagina');
  var preload = $('#preload');
  var loading = 0;
  var id = setInterval(frame, 24);
  pagina.hide();
  function frame() {
    if (loading == 100) {
      clearInterval(id);
      pagina.show();
      preload.hide();
    }else {
      loading += 1;
      if (loading == 90) {
        preload.addClass('fadeOut');
      }
    }
  }
});
