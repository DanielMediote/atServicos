$(document).ready(function() {
  navbar_actions();
  build_masks();
  form_submit();
});

function check_termos() {
  var termsOK = $('#termos').is(':checked');
  if (termsOK) {
    $('#btn_enviar').removeClass('disabled');
  }else {
    $('#btn_enviar').addClass('disabled');
  }
}

function form_clear() {
  var form = $(".formulario");
  form.find('input').each(function(index, el) {
    $(this).val("");
  });
}

function check_null_inputs() {
  var form = $(".formulario");
  var res = true;
  form.find('input').each(function(index, el) {
    var ipt_value = $(this).val();
    var ipt_name = $(this).attr('name');
    if (["nome","senha", "telefone", "email"].includes(ipt_name)) {
      if (ipt_value == "") {
        res = false;
      }
    }
  });
  return res;
}

function loadCidades() {
  var id = $('#estado').val();
  var options = $('#cidade');
  $.ajax({
    url: '/controller/buscarCidades.php',
    type: 'POST',
    data: {id : id}
  })
  .done(function(res) {
    options.html("<option value='' selected hidden>Selecionar...</option>");
    options.append(res);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
}

function build_masks() {
  $("input[name=cpf]").mask('000.000.000-00', {reverse: true});
  $("input[name=telefone]").mask('(00) 9 0000-0000');
  $("input[name=cpnj]").mask('00.000.000/0000-00', {reverse: true});
}

function navbar_actions() {
  $("#login_btn").click(function(event) {
    console.log("logar");
    var user = $('[name=user]').val();
    var pass = $("[name=pass]").val();
    var type = "LOGAR";
    $.ajax({
      url: '../controller/ajax_account_manager.php',
      type: 'POST',
      data: {"user":user,"pass":pass, "type":type}
    })
    .done(function(data) {
      if (data=='True') {
        location.reload();
      }else {
        form_clear();
      }
    })
    .fail(function() {
      console.log("error");
    });
  });

  $("#log_out").click(function(event) {
    /* Act on the event */
    var type = "DESLOGAR";
    $.ajax({
      url: '../controller/ajax_account_manager.php',
      type: 'POST',
      data: {"type":type}
    })
    .done(function(data) {
      if (data=='True') {
        location.reload();
      }else {
        form_clear();
      }
    })
    .fail(function() {
      console.log("error");
    });

  });
}

function form_submit() {
  $('#btn_enviar').on('click', function() {
    var dataForm = new FormData();
    var dados = {};
    if (check_null_inputs()) {
      $('.formulario').each(function() {
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
      dataForm.append('file',$('#file')[0].files[0]);
      $.ajax({
        url: '../controller/ajax_submit_form.php',
        type: 'POST',
        processData:false,
        contentType:false,
        data: dataForm
      })
      .done(function(res) {
        console.log("Okay");
        form_clear();
        // location.reload();
      })
      .fail(function(res) {
        console.log("Error \n"+res);
        show_alert_form("danger", "Erro: "+res);
      });
    }else {
      show_alert_form("warning", "Alguns campos estão nulos. Preencha-os corretamente.");
    }
  });
}

function show_alert_form(type, text) {
  var alert = $("<div class=\"alert alert-"+type+"\" role=\"alert\">"+text+
  "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"+
  "<span aria-hidden=\"true\">&times;</span></button></div>");
  $('.container').prepend(alert);
}
