$('.select').niceSelect()
$("button[name=submitAuth]").click(function(e)
{
    $(this).attr('disabled', true)
    $.ajaxSetup(
    {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var form = $("form[name=login]").serialize();
    $.ajax(
    {
        url: "/login",
        method: "POST",
        data: {
            _token:  $('meta[name="csrf-token"]').attr('content'),
            dni: $("input[name='dni']").val(),
            pass:  $("input[name='pass']").val()
        },
        beforeSend: function()
        {
            $(".form-auth-input").attr('disabled', true)
            loadIcon('submitAuth', 'paper-plane')
            $("input[name='dni']").removeClass('is-invalid')
            $(".dniInvalid").html('')
            $("input[name='pass']").removeClass('is-invalid')
            $(".passInvalid").html('')
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            notLoadIcon('submitAuth', 'send')
            $(".form-auth-input").attr('disabled', false)
            $('button[name=submitAuth]').attr('disabled', false)
            alert('ERRORS: ' + textStatus + " - " + errorThrown);
            // STOP LOADING SPINNER
        }
    })
    .done(function(data)
    {
        $('button[name=submitAuth]').attr('disabled', false)
        $("errors > div.card").removeClass('bg-info').addClass('bg-danger')
        $(".form-auth-input").attr('disabled', true)
        notLoadIcon('submitAuth', 'paper-plane')
        if(data.errors)
        {
            var text = '<ul class="mb-0 px-3 mx-0">';
            if(data.errors.dni != null)
            {
                $("input[name='dni']").addClass('is-invalid')
                text += '<li>'+data.errors.dni+'</li>'
            }
            if(data.errors.pass != null)
            {
                $("input[name='pass']").addClass('is-invalid')
                text += '<li>'+data.errors.pass+'</li>'
            }
            $(".form-auth-input").attr('disabled', false)
            text += '</ul>'
            $("errors > div.card > .card-body").html(text).parent().parent().addClass('animated fadeIn')
            $('errors').show()
        }
        if(data.type == "notCredential")
        {
            $("errors > div.card > .card-title").html('<i class="fa fa-info-circle"></i> Info')
            $("errors > div.card").removeClass('bg-danger').addClass('bg-info')
            $("errors > div.card > .card-body").html(data.message).parent().addClass('animated fadeIn')
            $('errors').show()
            $(".form-auth-input").attr('disabled', false)
        }
        if(data.type == "check")
        {
            $("errors > div.card > .card-title").html('<i class="fa fa-check"></i> Info')
            $("errors > div.card").removeClass('bg-danger bg-info').addClass('bg-success')
            $("errors > div.card > .card-body").html(data.message).parent().addClass('animated fadeIn')
            $(".form-auth-input").attr('disabled', false)
            $('errors').show()
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown)
    {
        if(errorThrown == 'Unprocessable Entity')
        {
         console.log('normal error')
        }
    })
})

$('button[name="submReg"]').click(function(e){
  var form = $('form[name="formReg"]').serialize();
  $.ajax(
  {
      url: "/login",
      method: "POST",
      data: {
          _token:  $('meta[name="csrf-token"]').attr('content'),
          dni: $("input[name='dni']").val(),
          name: $("input[name='name']").val(),
          sname: $("input[name='sname']").val(),
          flname: $("input[name='flname']").val(),
          slname: $("input[name='slname']").val(),
          phone: $("input[name='phone']").val(),
          email: $("input[name='email']").val(),
          tyc:  $("input[name='tyc']").val(),
          rol:  $("input[name='rol']").val(),
          password:  $("input[name='password']").val(),
          password_conf: $("input[name='password_confirmation']").val(),
      },
      beforeSend: function()
      {
          $(".form-auth-input").attr('disabled', true)
          loadIcon('submitAuth', 'paper-plane')
          $("input[name='dni']").removeClass('is-invalid')
          $(".dniInvalid").html('')
          $("input[name='pass']").removeClass('is-invalid')
          $(".passInvalid").html('')
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          notLoadIcon('submitAuth', 'send')
          $(".form-auth-input").attr('disabled', false)
          $('button[name=submitAuth]').attr('disabled', false)
          alert('ERRORS: ' + textStatus + " - " + errorThrown);
          // STOP LOADING SPINNER
      }
  })
})
