$('.select').niceSelect();
$.ajaxSetup(
{
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("button[name=submitAuth]").click(function(e)
{

    $(this).attr('disabled', true)    
    e.preventDefault();  
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
            loadIcon('submitAuth', 'sign-in')
            $("input[name='dni']").removeClass('is-invalid')
            $(".dniInvalid").html('')
            $("input[name='pass']").removeClass('is-invalid')
            $(".passInvalid").html('')
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            notLoadIcon('submitAuth', 'sign-in')
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
        notLoadIcon('submitAuth', 'sign-in')
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
            let i = 4;
            let counter = setInterval(function()
            {
              i--;
              $('strong.counter').html(i)
              if(i == 0)
              {                
                clearInterval(counter)
                location.reload();
              }              
            }, 1000)
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown)
    {
        if(errorThrown == 'Unprocessable Entity')
        {
         console.log('normal error')
        }
    })
});

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
          $("select[name='rol']").parent().find('.nice-select').addClass('disabled')
          loadIcon('submReg', 'paper-plane')
          $("input[name='dni']").removeClass('is-invalid')
          $(".dniInvalid").html('')
          $("input[name='pass']").removeClass('is-invalid')
          $(".passInvalid").html('')
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          notLoadIcon('submReg', 'paper-plane')
          $(".input-easy").attr('disabled', false)
          $("select[name='rol']").parent().find('.nice-select').removeClass('disabled')
          $('button[name=submitAuth]').attr('disabled', false)
          alert('ERRORS: ' + textStatus + " - " + errorThrown);
          // STOP LOADING SPINNER
      }
  }).done(function(data)
  {
    $(".input-easy").attr('disabled', false)
    $("select[name='rol']").parent().find('.nice-select').removeClass('disabled')
    notLoadIcon('submReg', 'paper-plane')
    if(data.errors)
    {
        $('.auth__wrapper').animate({ scrollTop: ($('errors').offset().top)}, 500, 'linear');        
        var text = '<ul class="mb-0 px-3 mx-0">';            
        $.each(data.errors, function( key, value ) 
        {
          text += '<li>'+value+'</li>'
        });        
        $(".input-easy").attr('disabled', false)
        text += '</ul>'
        $("errors > div.card > .card-body").html(text).parent().parent().addClass('animated fadeIn')
        $('errors').show()
        $('errors > div.card').removeClass('bg-success bg-info').addClass('animated fadeIn bg-danger').show()
    }
    if(data.type == "check")
    {
        $("errors > div.card > .card-title").html('<i class="fa fa-check"></i> Info')
        $("errors > div.card").removeClass('bg-danger bg-info').addClass('bg-success')
        $("errors > div.card > .card-body").html(data.message).parent().addClass('animated fadeIn')
        $(".input-easy").attr('disabled', false)
        $('.auth__wrapper').animate({ scrollTop: ($('errors').offset().top)}, 500, 'linear');        
        $('errors').show()
        $('errors > div.card').addClass('animated fadeIn').show()
        let i = e;
        let counter = setInterval(function()
        {
          i--;
          if(i == 0)
          {            
            clearInterval(counter)
            location.replace('/login');            
          }          
        }, 1000)        
    }
  })
});

$('errors').click(function()
{
  $(this).hide();
})

let width = $(window).width();
if(width <= 330)
{
  $('.auth__wrapper').removeClass('px-5').addClass('px-4')
}

$('button.btn_handler').click(function()
{
  let h = $(this).attr('handler');
  $('button.btn_handler, button.btn_handlerC').addClass('disabled');  
  $(".input-easy").attr('disabled', true)
  location.replace('https://easyjobs.uk/auth/'+h);
})

$('button.btn_handlerC').click(function()
{
  let h = $(this).attr('handler');
  $('button.btn_handler, button.btn_handlerC').addClass('disabled');  
  $(".input-easy").attr('disabled', true)
  location.replace('https://easyjobs.uk/auth/'+h+'/call');
})

$("button[name=firstSocialLogin]").click(function()
{
  $.ajax(
  {
      url: "/firstLoginForm",
      method: "POST",
      data: 
      {
          _token:  $('meta[name="csrf-token"]').attr('content'),
          dni: $("form[name=firstSocialLogin] input[name='dni']").val(),
          phone: $("form[name=firstSocialLogin] input[name='phone']").val(),
          rol:  $("form[name=firstSocialLogin] select[name='rol']").val(),
          tyc:  $("form[name=firstSocialLogin] input[name='tyc']").is(":checked"),
          email: $("form[name=firstSocialLogin] input[name='email']").val()
      },
      beforeSend: function()
      {
          $("select[name='rol']").parent().find('.nice-select').addClass('disabled')
          $(".input-easy").attr('disabled', true)
          loadIcon('firstSocialLogin', 'check-circle')          
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          notLoadIcon('firstSocialLogin', 'check-circle')
          $("select[name='rol']").parent().find('.nice-select').removeClass('disabled')
          $(".input-easy").attr('disabled', false)
          $('button[name=submitAuth]').attr('disabled', false)
          alert('ERRORS: ' + textStatus + " - " + errorThrown);
          // STOP LOADING SPINNER
      }
  })
  .done(function(data)
  {
    notLoadIcon('firstSocialLogin', 'check-circle')
    $(".input-easy").attr('disabled', false)
    $("select[name='rol']").parent().find('.nice-select').removeClass('disabled')    
    if(data.errors)
    {            
        var text = '<ul class="mb-0 px-3 mx-0">';            
        $.each(data.errors, function( key, value ) 
        {
          text += '<li>'+value+'</li>'
        });                
        text += '</ul>'
        $("#fistLoginSocial .modal-body errors > div.card > .card-body").html(text).parent().parent().addClass('animated fadeIn')
        $('#fistLoginSocial .modal-body errors').show()
        $('#fistLoginSocial .modal-body errors > div.card').removeClass('bg-success bg-info').addClass('animated fadeIn bg-danger').show()
    }
    if(data.type == "check")
    {
        $("#fistLoginSocial .modal-body  errors > div.card > .card-title").html('<i class="fa fa-check"></i> Info')
        $("#fistLoginSocial .modal-body  errors > div.card").removeClass('bg-danger bg-info').addClass('bg-success')
        $("#fistLoginSocial .modal-body  errors > div.card > .card-body").html(data.message).parent().addClass('animated fadeIn')                
        $('#fistLoginSocial .modal-body errors').show()
        $('#fistLoginSocial .modal-body errors > div.card').addClass('animated fadeIn').show()
        $('#fistLoginSocial').modal('hide');  
        $('.dashboard').attr('href', data.url)      
    }
  })  
})