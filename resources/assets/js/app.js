console.log('%c Hello World ', 'font-size:25px;color:#fff;text-shadow:0 1px 0#ccc,0 2px 0  #c9c9c9 ,0 3px 0  #bbb ,0 4px 0  #b9b9b9 ,0 5px 0  #aaa ,0 6px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15);');
console.log("%c APP desarrollada por: %c A&Y ","background: #fff; padding: 2px auto; border-radius: 3px 0 0 3px;border:solid 1px #14141e; color: #14141e",'background:#14141e;color:#fff;padding: 2px auto; border-radius: 0 3px 3px 0;border:solid 1px #000;');
console.log("%c Laravel ","background:#fff; padding: 1px; color: #f5746f;border-radius:3px;border:solid 1px #f5746f;");
console.log("%c Jquery ","background:#fff ; padding: 1px; border-radius: 3px;  color: #2090c7;border:solid 1px #2090c7;");
function loadIcon(nameB, nameI)
{
    var i = $("button[name="+nameB+"]").find("i");
    $("button[name="+nameB+"]").addClass("disabled");
    i.removeClass("fa fa-"+nameI);
    i.addClass("fa fa-spinner fa-pulse");
}

function notLoadIcon(nameB, nameI)
{
    var i = $("button[name="+nameB+"]").find("i");
    $("button[name="+nameB+"]").removeClass("disabled");
    i.removeClass("fa fa-spinner fa-pulse");
    i.addClass("fa fa-"+nameI);
}

function isEmpty(nameForm)
{
    var text = ""
    var i = 0
    var k = 0      
    $(nameForm+" .validEmpty").each(function(index)
     {
        $(this).parent().css({"border":"solid transparent 1px"}) 
        k++;
        i++;
        var val = $(this).val();
        var cual = $(this).attr('placeholder')      
        if(val == "")
        {
            i--;     
            $(this).parent().css({"border":"solid red 1px"})                         
            //text += "Campo <b>"+cual+"</b> Vacio<br>";             
        }
     })
     if(i == k)
     {          
         return true;
     }
     else
     {
        toastr.error('el formulario contiene campos vacios', '', {"closeButton": true,"timeOut": "4000", "preventDuplicates": true})
     }
}

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
    // .fail(function(jqXHR, textStatus, errorThrown) 
    // {
    //     if(errorThrown == 'Unprocessable Entity')
    //     {
    //      console.log('normal error')
    //     }
    // })
})