// var socket = io('http://127.0.0.1:8888/');
// $('button[name=submitMessage]').click(function()
// {
//     console.log('click')
//     var req = {nick: $('input[name=nick]').val(), message: $('input[name=message]').val()}
//     socket.emit('messageToServer', req);      
// });

// socket.on('messageToClient', function(resp)
// {
//     var text = '<p class="border-bottom border-light"><strong>'+resp.nick+'</strong>: '+resp.message+'</p>'
//     $('#cont').append(text)
// });

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

$('.input-easy').focus(function()
{
    let icon = $(this).parent().find('.input-icon-easy');    
    icon.css({'border-color':'#80bdff'}).find('span').css({'font-weight':'bold', 'color':'#80bdff'})
}).focusout(function()
{
    let icon = $(this).parent().find('.input-icon-easy');
    icon.css({'border-color':'#ced4da'}).find('span').css({'font-weight':'normal', 'color':'#495057'})
})
