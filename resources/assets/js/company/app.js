$('.controls-profile').click(function()
{
  let u = $(this).attr('page');
  let i = $(this).attr('where');
  let t = $(this).find('p').text();
  includesAjaxButtonProfile(u, i, t);
})

$('#modalProfileButton').modal(
{
    keyboard: true,        
    backdrop: 'static',
    focus: true,
    show: false
})

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
    $('#modalProfileButton').modal('show');
  })
}