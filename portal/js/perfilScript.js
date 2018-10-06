
function loadCidades() {
  var id = $('#estado').val();
  var options = $('#cidade');
  $.ajax({
    url: '../controller/buscarCidades.php',
    type: 'POST',
    data: {id : id}
  })
  .done(function(res) {
    options.html("<option value='' selected disabled hidden>Selecionar Cidade...</option>");
    options.append(res);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
}


$(document).ready(function() {
  $("input[name=cpf]").mask('000.000.000-00', {reverse: true});
  $("input[name=telefone]").mask('(00) 9 0000-0000');
  $("input[name=cpnj]").mask('00.000.000/0000-00', {reverse: true});
  $('#atualizarDados').hide();

  $('#atualizarDados').on('click', function() {
    var dados = {};
    $('#tabela').each(function() {
      $(this).find('input').each(function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        dados[name] = value;
      });
      $(this).find('select').each(function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        dados[name] = value;
      });
    });
    // console.log(dados);
    $.ajax({
      url: '../controller/atualizarDados.php',
      type: 'POST',
      data: {dados:dados}
    })
    .done(function(res) {
      location.reload();
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
      // $(this).show();
    }else {
      $(this).text('Desabilitar Edição');
      // $(this).hide();
      $('#atualizarDados').show();
    }
  });

  $('#deletarConta').on('click', function(event) {
    event.preventDefault();
    $.ajax({
      url: '/controller/deletarConta.php',
      type: 'POST',
    })
    .done(function(res) {
      location.reload();
      console.log(res);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });
});
