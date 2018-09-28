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

function prosseguir() {
  var termsOK = $('#terms').is(':checked');
  if (termsOK) {
    $('#enviar').css('display', 'block');
  }else {
    $('#enviar').css('display', 'none');
  }
}

$(document).ready(function() {
  $('#enviar').on('click', function() {
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
    console.log(dados);
    // dados['pathFile'] = getBase64($('[name=pathFile]')[0].files[0]);
    // $.ajax({
    //   url: '../controller/cadastrarPessoa.php',
    //   type: 'post',
    //   data: {dados : dados},
    //   success:function(res) {
    //     console.log(res)
    //   },
    //   error: function(erro){
    //     console.log(erro)
    //   }
    // });
  });
});
