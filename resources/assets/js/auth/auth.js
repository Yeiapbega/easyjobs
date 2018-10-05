$('.select').niceSelect();
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
    // var data = 
    // {
    //     _token:  $('meta[name="csrf-token"]').attr('content'),
    //     dni: $("input[name='dni']").val(),
    //     remember: r,
    //     pass:  $("input[name='pass']").val()
    // }
    // console.log(data)    
    $.ajax(
    {
        url: "/login",
        method: "POST",
        data: {
            _token:  $('meta[name="csrf-token"]').attr('content'),
            dni: $("input[name='dni']").val(),
            remember: $('input[name=remember]').is(":checked"),
            pass:  $("input[name='pass']").val()
        },
        beforeSend: function()
        {
            $(".input-easy").attr('disabled', true)
            loadIcon('submitAuth', 'fa-sign-in-alt')
            $("input[name='dni']").removeClass('is-invalid')
            $(".dniInvalid").html('')
            $("input[name='pass']").removeClass('is-invalid')
            $(".passInvalid").html('')
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            notLoadIcon('submitAuth', 'fa-sign-in-alt')
            $(".input-easy").attr('disabled', false)
            $('button[name=submitAuth]').attr('disabled', false)
            alert('ERRORS: ' + textStatus + " - " + errorThrown);
            // STOP LOADING SPINNER
        }
    })
    .done(function(data)
    {
        $('button[name=submitAuth]').attr('disabled', false)
        $("errors > div.card").removeClass('bg-info').addClass('bg-danger')
        $(".input-easy").attr('disabled', true)
        notLoadIcon('submitAuth', 'fa-sign-in-alt')
        if(data.errors)
        {
            var text = '<ul class="mb-0 px-3 mx-0">';            
            if(data.errors.pass != null)
            {
                $("input[name='pass']").focus()
                text += '<li>'+data.errors.pass+'</li>'
            }
            if(data.errors.dni != null)
            {
                $("input[name='dni']").focus()
                text += '<li>'+data.errors.dni+'</li>'
            }
            $(".input-easy").attr('disabled', false)
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
            $(".input-easy").attr('disabled', false)
        }
        if(data.type == "check")
        {
            $("errors > div.card > .card-title").html('<i class="fa fa-check"></i> Info')
            $("errors > div.card").removeClass('bg-danger bg-info').addClass('bg-success')
            $("errors > div.card > .card-body").html(data.message).parent().addClass('animated fadeIn')
            $(".input-easy").attr('disabled', false)
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

$('button[name="submReg"]').click(function(e)
{
  e.preventDefault();
  // var form = $('form[name="formReg"]').serialize();
  $.ajax(
  {
      url: "/register",
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
          tyc:  $("input[name='tyc']").is(":checked"),
          rol:  $("select[name='rol']").val(),
          password:  $("input[name='password']").val(),
          password_conf: $("input[name='password_confirmation']").val(),
      },
      beforeSend: function()
      {
          $(".input-easy").attr('disabled', true)
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
          $(".input-easy").attr('disabled', false)
          $('button[name=submitAuth]').attr('disabled', false)
          alert('ERRORS: ' + textStatus + " - " + errorThrown);
          // STOP LOADING SPINNER
      }
  })
})
