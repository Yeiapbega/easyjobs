$('.controls-profile').click(function()
{
  let u = $(this).attr('page');
  let i = $(this).attr('where');
  let t = $(this).find('p').text();
  includesAjaxButtonProfile(u, i, t);
})

function viewModal(id)
{
  $('#main-contain').css({'filter':'blur(3px)'})
  $('.loadModal').addClass('active')
  $('#modalProfileButton').modal(
  {
      keyboard: true,        
      backdrop: 'static',
      focus: true,
      show: false
  })

  setTimeout(function(){$('#'+id).modal('show');},1000)
  $('#'+id).on('shown.bs.modal', function (e) 
  {
    $('.loadModal').removeClass('active')
  })

  $('#'+id).on('hidden.bs.modal', function (e) 
  {
    $('#main-contain').css({'filter':'blur(0px)'})
  })
}

function includesAjaxButtonProfile(uri, id, title)
{  
  let a = $.ajax(
  {
    url: uri,
    method: "POST",
    type: 'JSON',
    beforeSend: function()
    {
      $('.controls-profile').addClass('disabled bg-light');
    },
    error: function(jqXHR, textStatus, errorThrown)
    { 
      $('.controls-profile').removeClass('disabled bg-light');       
      alert('ERRORS: ' + textStatus + " - " + errorThrown);
        // STOP LOADING SPINNER
    }
  }).done(function(data)
  {
    $('.controls-profile').removeClass('disabled bg-light');
    $('#modalProfileButton').find('#modalProfileButtonTitle').html(title);
    $('#modalProfileButton').find('.modal-body').html(data.form);
    viewModal('modalProfileButton')
    $('.input-easy').focus(function()
    {    
        let icon = $(this).parent().find('.input-icon-easy');    
        icon.css({'border-color':'#80bdff'}).find('i').css({'font-weight':'bold', 'color':'#80bdff'})
    }).focusout(function()
    {
        let icon = $(this).parent().find('.input-icon-easy');
        icon.css({'border-color':'#ced4da'}).find('i').css({'font-weight':'normal', 'color':'#495057'})    
    })
    $('[data-toggle="tooltip"]').tooltip();
  })
}

(function() {
 
  window.inputNumber = function(el) 
  {

    var min = el.attr('min') || false;
    var max = el.attr('max') || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function() 
    {
      init($(this));
    });

    function init(el) 
    {
      els.dec.on('click', decrement);
      els.inc.on('click', increment);

      function decrement() 
      {
        var value = el[0].value;
        value--;
        if(!min || value >= min) 
        {
          el[0].value = value;
        }
      }

      function increment() 
      {
        var value = el[0].value;
        value++;
        if(!max || value <= max) 
        {
          el[0].value = value++;
        }
      }
    }
  }
})();

inputNumber($('.input-number'));