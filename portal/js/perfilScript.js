

$(document).ready(function() {
  $('#atualizarDados').hide();
  $('#atualizarDados').on('click', function() {
    var dados = {};
    $('#tabela').each(function() {
      $(this).find('input').each(function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        dados[name] = value;
      });
    });
    console.log(dados);
    $.ajax({
      url: '../controller/atualizarDados.php',
      type: 'POST',
      data: {dados:dados}
    })
    .done(function(res) {
      console.log(res);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  });
  $('#habilitar').on('click', function() {
    var input = $('.campo');
    $(input).each(function() {
      if ($(this).attr('disabled')) {
        $(this).removeAttr('disabled');
      } else {
        $(this).attr({
          'disabled': 'disabled'
        });
      }
    });
    if (input.is(':disabled')) {
      $(this).text('Habilitar Edição');
      $('#atualizarDados').hide();
    }else {
      $(this).text('Desabilitar Edição');
      $('#atualizarDados').show();
    }
  });
});
