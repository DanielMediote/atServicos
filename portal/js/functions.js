$(document).ready(function() {
  navbar_actions();
  build_masks();
  form_submit();
  profile_account();
  contratar_servico();
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
  $(".cpf").mask('000.000.000-00', {reverse: true});
  $(".telefone").mask('(00) 9 0000-0000');
  $(".cpnj").mask('00.000.000/0000-00', { reverse: true });
  $('.money').mask('000.000.00', {reverse: true});
}

function navbar_actions() {
  $("#login_btn").click(function(event) {
    var user = $('[name=user]').val();
    var pass = $("[name=pass]").val();
    var type = "LOGAR";
    $.ajax({
      url: '../controller/ajax_account_session.php',
      type: 'POST',
      data: {"user":user,"pass":pass, "type":type}
    })
    .done(function(data) {
      if (data=='True') {
        location.href = "/home";
      }else {
        show_modal("Usuário e Senha Incorretos");
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
      url: '../controller/ajax_account_session.php',
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
  var formulario = $('.formulario');

  formulario.each(function(index, el) {
    var $this = $(el);
    var servico_insert = $this.find('#add_servico');
    var perfil_update = $this.find('#update_all');
    var btn_enviar = $this.find('#btn_enviar');

    btn_enviar.click(function() {
      var dataForm = new FormData();
      var dados = {};
      var text = $(".title").text().split(" ");
      dados["categoria"] = text[2];
      if (check_null_inputs()) {
        $this.find('input').each(function() {
          var name = $(this).attr('name');
          var valor = $(this).val();
          dados[name] = valor;
        });
        $this.find('select').each(function() {
          var name = $(this).attr('name');
          var valor = $(this).val();
          dados[name] = valor;
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
          console.log(res);
          show_alert_form("success", "Cadastro efetuado com sucesso.");
          form_clear();
          setTimeout(function () {
            location.reload();
          }, 500);
        })
        .fail(function(res) {
          console.log("Error \n"+res);
          show_alert_form("danger", "Erro: "+res+".");
        });
      }else {
        show_alert_form("warning", "Alguns campos estão nulos. Preencha-os corretamente.");
      }


    });

    servico_insert.click(function() {
      var dados = {};
      $this.find('input').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
      $this.find('select').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
      $this.find('textarea').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
      $.ajax({
        url: '/controller/ajax_servico_insert.php',
        type: 'POST',
        data: dados
      })
      .done(function(data) {
        console.log(data);
        location.reload();
      })
      .fail(function() {
        console.log("error");
      });

    });

    perfil_update.click(function() {
      var dados = {};
      $this.find('input').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
      $this.find('select').each(function() {
        var name = $(this).attr('name');
        var valor = $(this).val();
        dados[name] = valor;
      });
      $.ajax({
        url: '../controller/ajax_account_update.php',
        type: 'POST',
        data: dados
      })
      .done(function(data_res) {
        console.log(data_res);
        location.reload()
      })
      .fail(function() {
        console.log("error");
      });
    });

  });
}

function show_alert_form(type, text) {
  var alert = $("<div class=\"alert mb-4 alert-"+type+"\" role=\"alert\">"+text+
  "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"+
  "<span aria-hidden=\"true\">&times;</span></button></div>");
  $('#cadastro-form').prepend(alert);
}

function profile_account(){
  var form_perfil = $(".input-row");
  var contrato = $('.contrato');
  var servico = $('.servico');

  form_perfil.each(function(index, el) {
    var btn_update = $(el).find("[name=update]");
    var btn_save = $(el).find('[name=save]');
    btn_update.click(function(event) {
      $(el).find('input').each(function(index, el) {
        var input = $(this);
        input.removeAttr('disabled');
        btn_save.removeAttr('disabled');
        btn_update.attr('disabled', 'true');
        btn_save.click(function(event) {
          input.attr('disabled', 'true');
          btn_save.attr('disabled', 'true');
          btn_update.removeAttr('disabled');
        });
      });
      $(el).find('select').each(function(index, el) {
        var select = $(this);
        select.removeAttr('disabled');
        btn_save.removeAttr('disabled');
        btn_update.attr('disabled', 'true');
        btn_save.click(function(event) {
          select.attr('disabled', 'true');
          btn_save.attr('disabled', 'true');
          btn_update.removeAttr('disabled');
        });
      });
    });

  });

  $("#delete_account").click(function(event) {
    /* Act on the event */
    $.ajax({
      url: '../controller/ajax_account_delete.php',
    })
    .done(function(data) {
      console.log(data);
    })
    .fail(function() {
      console.log("error");
    });
  });

  contrato.each(function(index, el) {
      var btn_cancelar_contrato = $(el).find('[name=contrato_delete]');
      btn_cancelar_contrato.click(function(event) {
        /* Act on the event */
        var dados = {};
        dados['id_contrato'] = $(el).find('[name=id_contrato]').text();
        $.ajax({
          url: '../controller/ajax_contrato_cancelar.php',
          type: 'POST',
          data: dados
        })
        .done(function(data) {
          // console.log(data);
          location.reload();
        })
        .fail(function() {
          console.log("error");
        });

      });
  });

  servico.each(function(index, el) {
      var btn_deletar_servico = $(el).find('[name=servico_delete]');
      btn_deletar_servico.click(function(event) {
        /* Act on the event */
        var dados = {};
        dados['id_servico'] = $(el).find('[name=id_servico]').text();
        $.ajax({
          url: '../controller/ajax_servico_delete.php',
          type: 'POST',
          data: dados
        })
        .done(function(data) {
          // console.log(data);
          location.reload();
        })
        .fail(function() {
          console.log("error");
        });

      });
  });

}

function show_modal(texto) {
  var modal = $("<div id=\"modal\" class=\"modal fade bd-example-modal-sm\" tabindex=\"-1\" role=\"dialog\""+
  "aria-labelledby=\"mySmallModalLabel\" aria-hidden=\"true\">"+
  "<div class=\"modal-dialog modal-sm\">"+
  "<div class=\"modal-content p-3\">"+texto+"</div></div></div>");
  $("body").append(modal);
  $('#modal').modal('toggle');
  setTimeout(function () {
    $('#modal').modal('hide');


  }, 1500);
}

function contratar_servico() {
  var servico = $(".servico");
  servico.each(function(index, el) {
    var btn_contratar = $(el).find('[name=contratar]');
    btn_contratar.click(function(event) {
      var dados = {};
      $(el).find('td').each(function(index, el) {
        var name = $(this).attr('name');
        var value = $(this).text();
        dados[name]= value;
      });
      btn_contratar.removeClass('btn-dark')
      btn_contratar.addClass('btn-success');
      btn_contratar.attr('disabled', 'true');
      btn_contratar.text('Contratado');
      $.ajax({
        url: '/controller/ajax_servico_contratar.php',
        type: 'POST',
        data: dados
      })
      .done(function(data) {
        console.log(data);
      })
      .fail(function() {
        console.log("error");
      });
    });
  });
}
