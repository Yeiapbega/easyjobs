loc = location.protocol+'//'+location.hostname+':8888'+location.pathname;
var socket = io(loc);

socket.on('connect', function()
{
    console.log('connected to server')
})

socket.on('disconnect', function()
{
    console.log('disconnected to server')
})

$('button[name=submitMessage]').click(function()
{
    socket.emit('newMessage',
    {
        from: $('input[name=nick]').val(),
        text: $('input[name=message]').val()
    })
})

socket.on('wMessage', function(resp)
{
    var text = '<p class="border-bottom border-light"><strong>'+resp.from+'</strong>: '+resp.text+'</p>'
    $('#cont').append(text)
})

$('button[name=submitGEO]').click(function()
{
    console.log('geo')
    if(!navigator.geolocation)
    {
        alert('no soporta GEO tu pc')
    }

    navigator.geolocation.getCurrentPosition(function(position)
    {
        socket.emit('createLocationMessage', 
        {
            from: $('input[name=nick]').val(),
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        })
    }, function()
    {
        alert('no se pudo leer tu GEO')
    })
})

socket.on('newMessage', function(resp)
{
    var text = '<p class="border-bottom border-light"><strong>'+resp.from+'</strong>: '+resp.text+'</p>'
    $('#cont').append(text)
})

socket.on('createLocationMessage', function(resp)
{
    var text = '<p class="border-bottom border-light"><strong>'+resp.from+'</strong>: <a class="btn btn-outline-primary btn-sm" href="'+resp.url+'" target="_blank">posicion actual <i class="fa fa-map-marker"></i></a></p>'
    $('#cont').append(text)
})

$('[data-toggle="tooltip"]').tooltip();
$('.dropdown-toggle').dropdown();

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

$('.input-easy').focus(function()
{    
    let icon = $(this).parent().find('.input-icon-easy');    
    icon.css({'border-color':'#80bdff'}).find('i').css({'font-weight':'bold', 'color':'#80bdff'})
}).focusout(function()
{
    let icon = $(this).parent().find('.input-icon-easy');
    icon.css({'border-color':'#ced4da'}).find('i').css({'font-weight':'normal', 'color':'#495057'})    
})

$('.carusel-beta').owlCarousel(
{
    items:3,
    loop:true,
    margin: 30,
    dots: true,
    autoplayHoverPause: true,
    smartSpeed:150,         
    autoplay:true,    
    responsive: {
        0: {
            items: 1
        },
        480: {
            items: 1,
        },
        768: {
            items: 2,
        },
        961: {
            items: 2,
        }            
    }
});

$("#notificationLink").click(function()
{
    $("#notificationContainer").fadeToggle(300);
    $("#notification_count").fadeOut("slow");
    return false;
});

$(document).click(function()
{
    $("#notificationContainer").hide();
});

$("#notificationContainer").click(function()
{
    return false;
});

$('#fistLoginSocial').modal(
{
    keyboard: false,
    show: true,
    backdrop: 'static',
    focus: true
})
$('.input-easy').focus(function()
{    
    let icon = $(this).parent().find('.input-icon-easy');    
    icon.css({'border-color':'#80bdff'}).find('i').css({'font-weight':'bold', 'color':'#80bdff'})
}).focusout(function()
{
    let icon = $(this).parent().find('.input-icon-easy');
    icon.css({'border-color':'#ced4da'}).find('i').css({'font-weight':'normal', 'color':'#495057'})    
})