$('.controls-profile').click(function()
{
  let u = $(this).attr('page');
  let i = $(this).attr('where');
  let t = $(this).find('p').text()+ ' <strong> • EasyJobs</strong>';
  includesAjaxButtonProfile(u, i, t);
})

$('#modalProfileButton').modal(
{
    keyboard: true,        
    backdrop: 'static',
    focus: true,
    show: false
})

function viewModal(id)
{
  $('#main-contain').css({'filter':'blur(3px)'}).addClass('animated fadeIn') 

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

function hideModal(id)
{
  $('#'+id).modal('hide');
}

function inputNumber(el) 
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

let editor;
function ckEdit(id)
{    
    ClassicEditor
    .create( document.querySelector('#'+id), 
    {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
        heading: {
            options: [
                { model: 'paragraph', title: 'parrafo', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Titulo 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Titulo 2', class: 'ck-heading_heading2' }
            ]
        },
        language: 'es'
    } )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.log( error );
    } );
}

function sendFromProfile(form_, uri)
{
  $('form[name='+form_+']').on("submit", function(e)
  {
    e.preventDefault();    
    var editorData = editor.getData(); 
    $('#textJob').text(editorData);  
    let d = $(this).serialize();    
    $.ajax(
    {
      url: uri,
      data: d,
      method: 'POST',
      beforeSend: function()
      {
        loadIcon('modalProfileButton', 'check-circle')
        $(".input-easy").addClass('disabled')
        $('.ck.ck-editor__main > div').addClass('disabled')
        $('button[name=modalProfileButton]').attr('disabled', true)
      },
      error: function(jqXHR, textStatus, errorThrown)
      { 
        $(".input-easy").removeClass('disabled')
        $('.ck.ck-editor__main > div').removeClass('disabled')
        $('button[name=modalProfileButton]').attr('disabled', false)
        notLoadIcon('modalProfileButton', 'check-circle')
        alert('ERRORS: ' + textStatus + " - " + errorThrown);
          // STOP LOADING SPINNER
      }
    }).done(function(data)
    {
      $(".input-easy").removeClass('disabled')
      $('.ck.ck-editor__main > div').removeClass('disabled')
      $('button[name=modalProfileButton]').attr('disabled', false)
      notLoadIcon('modalProfileButton', 'check-circle')
      if(data.errors)
      { 
        ///////// NUEVA FUNCION ERRORES
        var text = showErrors(data.errors)
        $("#modalProfileButton .modal-body > div.data errors > div.card > .card-body").html(text).parent().parent().addClass('animated fadeIn')
        $('#modalProfileButton .modal-body > div.data errors').show()
        $('#modalProfileButton .modal-body > div.data errors > div.card').removeClass('bg-success bg-info').addClass('animated fadeIn bg-danger').show()        
      }
      if(data.type == "check")
      {
        hideModal('modalProfileButton');
        swal(
        {
          text: ''+data.message,
          type: 'success'
        })
      }
    })
  }); 
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
      loading();
      $('.controls-profile').addClass('disabled bg-light');
    },
    error: function(jqXHR, textStatus, errorThrown)
    { 
      notLoading();
      $('.controls-profile').removeClass('disabled bg-light');       
      alert('ERRORS: ' + textStatus + " - " + errorThrown);
        // STOP LOADING SPINNER
    }
  }).done(function(data)
  {
    $('.controls-profile').removeClass('disabled bg-light');
    $('#modalProfileButton').find('#modalProfileButtonTitle').html(title);
    $('#modalProfileButton').find('button[name=modalProfileButton]').attr({'form':data.status,'url':uri+'/new'});
    $('#modalProfileButton').find('.modal-body div.data').html(data.form);
    ///////// CARGAR MODAL FUNCION (ID)
    viewModal('modalProfileButton')
    ///////// EDITOS DE TEXTO (ID)
    ckEdit('textJob')
    const form_ = $('button[name=modalProfileButton]').attr('form');
    sendFromProfile(form_, uri+'/new')
    inputNumber($('.input-number'));
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
    $('errors').click(function()
    {
      $(this).hide();
    })
  })
}

$('button[name=modalProfileButton]').click(function()
{
  let esta = $(this);
  let form = esta.attr('form');
  let uri = esta.attr('url');
  // let form_ = $('#modalProfileButton > div > div > div.modal-body > div.data').find('form[name='+form+']');     
  $('form[name='+form+']').submit();    
})

$('span.change-photo').click(function()
{
  $('input[type="file"]#photoUserUpdate').click();
})

$('input[type="file"]#photoUserUpdate').click(function()
{
  var $file = $(this)  
  $label = $('.profile-img');  
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
    if( fileName )
    {
      $label
        .attr('src', tmppath)
      // swal(
      // {
      //   type: 'success',
      //   text: 'si funco we'
      // })
      const image = document.getElementById('profile-img');      
      const cropper = new Cropper(image, 
      {
        aspectRatio: 1 / 1,
        crop(event) 
        {

        }
      });
      $('body').dblclick(function()
      {                
        var a = cropper.getCroppedCanvas();
        var b = a.toDataURL('image/png')        
        $label = $('.profile-img');
        $label
          .attr('src', b)
        cropper.destroy();        
      })
        cropper.getCroppedCanvas({          
          fillColor: '#fff',
          imageSmoothingEnabled: false,
          imageSmoothingQuality: 'high',
        });
    }
    else
    {
      swal(
      {
        type: 'error',
        text: 'Error al cambiar imagen, intente nuevamente'
      })
    }
  });
});

