function loadCidades() {
  var id = $('#estado').val();
  var options = $('#cidade');
  $.ajax({
    url: '/controller/buscarCidades.php',
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

function prosseguir() {
  var termsOK = $('#terms').is(':checked');
  if (termsOK) {
    $('#enviar').css('display', 'block');
  }else {
    $('#enviar').css('display', 'none');
  }
}

$(document).ready(function() {
  $("input[name=cpf]").mask('000.000.000-00', {reverse: true});
  $("input[name=telefone]").mask('(00) 9 0000-0000');
  $("input[name=cpnj]").mask('00.000.000/0000-00', {reverse: true});
  $('#enviar').on('click', function() {
    var dataForm = new FormData();
    var dados = {};
    $('#formulario').each(function() {
      var formulario = $(this);
      formulario.find('input').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
      formulario.find('select').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
    });
    dataForm.append('dados',JSON.stringify(dados));
    dataForm.append('file',$('#id_photo')[0].files[0]);
    $.ajax({
      url: '../controller/cadastrarPessoa.php',
      type: 'POST',
      processData:false,
      contentType:false,
      data: dataForm
    })
    .done(function(res) {
      console.log(res);
      // location.reload();
    })
    .fail(function(res) {
      console.log("Error \n"+res);
    })
    .always(function() {
    });
  });
});
