function validarSenha(){
  var senha1 = $('#senha1').val();
  var senha2 = $('#senha2').val();
  if (senha1 != senha2) {
    alert('As senhas não se conferem.');
    return false;
  } else {
    return true;
  }
}


// function getBase64(file) {
//  var reader = new FileReader();
//  reader.readAsDataURL(file);
//  reader.onload = function () {
//      // console.log(reader.result);
//    };
//    reader.onerror = function (error) {
//      console.log('Error: ', error);
//    };
//    return reader;
//  }


 $(document).ready(function() {
  $('#enviar').on('click', function() {
    var data = $("input[name=data").val();
    alert(data);
    var dados = {};

    $('#formulario').each(function() {
      var formulario = $(this);
      formulario.find('input').each(function() {
        var name = $(this).attr('name');
        var atributo = $(formulario).find("input[name="+name+"]").val();
        dados[name] = atributo;
      });
    });
    // dados['pathFile'] = getBase64($('[name=pathFile]')[0].files[0]);

    console.log(dados);
    $.ajax({
      url: 'http://www.servicos-online.com.br/paginas/sendToDatabase.php',
      type: 'post',
      data: dados,
      success:function(res) {
        console.log(res)
      },
      error: function(erro){
        console.log(erro);
      }
    });
  });
});
