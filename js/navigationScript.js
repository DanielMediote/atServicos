$(document).ready(function() {

  // Dropdowns Menus da Barra de Navegação
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

  // Configurações do Modal com evento de abrir e fechar
  $('#open-modal').click(function() {
    $('.modal').removeClass('hidden');
    $('.overlay').removeClass('hidden');
  });
  $('#close-modal').click(function() {
    $('.modal').addClass('hidden');
    $('.overlay').addClass('hidden');
  });
});


// funções para logar Pessoa e Deslogar Pessoa

$(document).ready(function() {
  var cookie = {};
  var user =  $('#userLogin');
  var pass =  $('#passLogin');
  $('#logarPessoa').click(function() {
    cookie['username'] = user.val();
    cookie['password'] = pass.val();
    cookie['sessao'] = "online";
    $.ajax({
      url: '../controller/session-config.php',
      type: 'post',
      data: {cookie : cookie}
    })
    .done(function(res) {
      if (res == 'True') {
        location.reload();
        console.log(res);
      }else {
        user.css('border-color', 'red');
        pass.css('border-color', 'red');
        console.log(res);
      }
    })
    .fail(function() {
      console.log("error");
    });
  });

  $('#logoffPessoa').click(function() {
    cookie['sessao'] = "offline";
    $.ajax({
      url: '../controller/session-config.php',
      type: 'post',
      data: {cookie : cookie}
    })
    .done(function(res) {
      location.reload();
      console.log(res);
      console.log(cookie['sessao']);
    })
    .fail(function() {
      console.log("error");
    });
  });
});
