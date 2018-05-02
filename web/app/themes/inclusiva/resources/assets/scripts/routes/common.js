import fontawesome from '@fortawesome/fontawesome'
import brands from '@fortawesome/fontawesome-free-brands'
import solid from '@fortawesome/fontawesome-free-solid'
import regular from '@fortawesome/fontawesome-free-regular'

fontawesome.library.add(brands, solid, regular)

// Make sure we can use pseudo classes
// fontawesome.config = { 
//   searchPseudoElements: true,
//  }

import 'bootstrap-select';

export default {
  init() {
    // JavaScript to be fired on all pages

    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
      
      // $('.selectpicker').change(function(){
      //   console.log($('.selectpicker').val());
      // });

      $('.selectpicker').selectpicker({
        noneSelectedText: 'Buscar en...',
        selectAllText: 'Selec.',
        deselectAllText: 'Deselec.',
      });

      $('.selectpicker').selectpicker('selectAll');

      //OmniSearch Query
      let ajaxOmniSearch = $('.searchBox');
      let customPostTitle = '';
      let customPostExcerpt = '';

      function listResults(objectToSend) {
        $.ajax({
            url: wp.ajax_url,
            data: objectToSend,
            beforeSend: function() {
              // $('#txtKeyword').prop('disabled', true);
              // $('#optMonth').prop('disabled', true);
              // $('#optYear').prop('disabled', true);
              // $('#optPerPage').prop('disabled', true);
              // $("#btnDocumento").prop('disabled', true).html("<i class='fas fa-circle-notch fa-spin'></i> Filtrando...");
              // $("#btnLimpiar").prop('disabled', true).html("<i class='fas fa-sync fa-spin'></i> Limpiando...");
  
              // // Preloading
              // ajaxOmniSearch.find('.preloaded').removeClass('hidden');
              // ajaxOmniSearch.find('.hentry').addClass('hidden');
            },
            complete: function() {
                // $('#txtKeyword').prop('disabled', false);
                // $('#optMonth').prop('disabled', false);
                // $('#optYear').prop('disabled', false);
                // $('#optPerPage').prop('disabled', false);
                // $("#btnDocumento").prop('disabled', false).html("<i class='fas fa-filter'></i> Filtrar");
                // $("#btnLimpiar").prop('disabled', false).html("<i class='fas fa-sync'></i> Limpiar");
  
                // // Preloading
                // ajaxOmniSearch.find('.preloaded').addClass('hidden');
                // ajaxOmniSearch.find('.hentry').removeClass('hidden');
            },
            success: function(response) {
              objectToSend = response;
              
              ajaxOmniSearch.find(".search-result").empty();
              ajaxOmniSearch.find(".wp-pagenavi").empty();
  
              let errorMessage = objectToSend.vMensaje;
  
              if (objectToSend.bError) {
                objectToSend.vMensaje = '';
  
                objectToSend.vMensaje = '<article class="hentry documentos hidden">';
                objectToSend.vMensaje += '<div class="entry-container">';
                objectToSend.vMensaje += '<div class="entry-body">';
  
  
                objectToSend.vMensaje += '<h2 class="entry-title">';
                objectToSend.vMensaje += errorMessage;
                objectToSend.vMensaje += '</h2>';
                objectToSend.vMensaje += '<div class="entry-content">';
                objectToSend.vMensaje += '<p>Intente con otros parámetros de búsqueda...</p>';
                objectToSend.vMensaje += '</div>';
  
  
                objectToSend.vMensaje += '</div>';
                objectToSend.vMensaje += '</div>';
                objectToSend.vMensaje += '</article>';
                
                ajaxOmniSearch.find(".wp-pagenavi").addClass('hidden');
                ajaxOmniSearch.find(".search-result").append(objectToSend.vMensaje);
            } else {
              for (var i = 0; i < objectToSend.response.length; i++) {
  
                objectToSend.response[i].html = '';
                objectToSend.response[i].html += '<article class="post-' + objectToSend.response[i].id + ' status-publish hentry tipos-rde documentos hidden">';
                objectToSend.response[i].html += '<div class="entry-container">';
                objectToSend.response[i].html += '<div class="entry-body ">';
                customPostTitle = objectToSend.response[i].title;
                customPostExcerpt = objectToSend.response[i].excerpt;
  
                objectToSend.response[i].html += '<h2 class="entry-title">';
                objectToSend.response[i].html += '<a href="' + objectToSend.response[i].permalink + '">';
                objectToSend.response[i].html += objectToSend.txtKeyword.length >= 1 ? (customPostTitle.replace(new RegExp("(" + objectToSend.txtKeyword.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*") + ")", "gi"), "<mark>$1</mark>")).replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4") : customPostTitle;
                objectToSend.response[i].html += '</a>';
                objectToSend.response[i].html += '</h2>';
  
                objectToSend.response[i].html += '<div class="entry-content">';
                objectToSend.response[i].html += objectToSend.txtKeyword.length >= 1 ? (customPostExcerpt.replace(new RegExp("(" + objectToSend.txtKeyword.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*") + ")", "gi"), "<mark>$1</mark>")).replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4") : customPostExcerpt;
                objectToSend.response[i].html += '</div>';
  
  
                objectToSend.response[i].html += '<div class="post-meta">';
                objectToSend.response[i].html += '<div class="post-date">';
                objectToSend.response[i].html += '<time class="updated">' + objectToSend.response[i].date + '</time>';
                objectToSend.response[i].html += '</div>';

                objectToSend.response[i].html += '</div>';
                objectToSend.response[i].html += '</div>';
                objectToSend.response[i].html += '</div>';
                objectToSend.response[i].html += '</article>';
  
  
                ajaxOmniSearch.find(".search-result").append(objectToSend.response[i].html);
  
                if (ajaxOmniSearch.find(".wp-pagenavi").hasClass('hidden')) {
                    ajaxOmniSearch.find(".wp-pagenavi").removeClass('hidden');
                }
  
            }
  
              for (var j = 1; j <= objectToSend.max_num_pages; j++) {
                  var html = '<a href="page/' + j + '" class="page navi nav-link" data-id="' + j + '">' + j + '</a>';
  
                  if (objectToSend.paged === j) {
                      html = '<span class="current nav-link active">' + j + '</span>';
                  }
  
                    ajaxOmniSearch.find(".wp-pagenavi").append(html);
                }
              }
  
              /* eslint-disable no-console */
              console.log(objectToSend);
              /* eslint-enable no-console */
            },
            error: function(error) {
              /* eslint-disable no-console */
              console.log(error);
              /* eslint-disable no-console */
            },
        });
      }
      
      let objectToSend = {
          action: 'ajax_omni_search',
          postType: '',
          txtKeyword: '',
          max_num_pages: 0,
          response: [],
          bError: false,
          vMensaje: '',
          paged: 1,
      };

      $("#formSearch").keypress(function(e) {
        if (e.which === 13) {
          objectToSend.postType = ($(".selectpicker").val() !== null) ? ($(".selectpicker").val()).toString() : '';
          objectToSend.txtKeyword = $(this).val();
          objectToSend.paged = 1;
    
          if(objectToSend.txtKeyword !== ''){
            listResults(objectToSend);
          }
        }
      });

      $(".selectpicker").change(function() {
        objectToSend.txtKeyword = $("#formSearch").val();
        objectToSend.postType = ($(".selectpicker").val() !== null) ? ($(".selectpicker").val()).toString() : '';
        objectToSend.paged = 1;
        /* eslint-disable no-console */
        //console.log(objectToSend.txtKeyword);
        /* eslint-disable no-console */
        if(objectToSend.txtKeyword !== ''){
          listResults(objectToSend);
        }
      });
    })
    
    // Media Query event handler
    if (matchMedia) {
        const mq = window.matchMedia("(min-width: 768px)");
        mq.addListener(WidthChange);
        WidthChange(mq);
    }

    // Media Query change
    function WidthChange(mq) {
        if (mq.matches) {
            $('body').addClass('content-expanded');
            $('body').removeClass('content-collapsed');
        } else {
            $('body').removeClass('content-expanded');
            $('body').addClass('content-collapsed');
        }
    }

    // Show search form
    $('#showForm').click(function(e){
      e.preventDefault();

      $('body').toggleClass('with-searchform');
      $('#formSearch').focus();

      $("#formSearch").keypress(function(e) {
        if (e.which === 13) {
           e.preventDefault();
        }
      });
    });

    // Add class when user add content to input
    $('input.form-control').focus(function() {
      $(this).parents('.form-group').addClass('has-focus');
    }).blur(function(){
        let tmpval = $(this).val();
        $(this).parents('.form-group').removeClass('has-focus');
        
        (tmpval !== '') ? $(this).parents('.form-group').addClass('has-value') : $(this).parents('.form-group').removeClass('has-value');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('#showForm').on('click', function () {
      $(this)
        .find('[data-fa-i2svg]')
        .toggleClass('fa-search')
        .toggleClass('fa-times');
    });

    // Close search form if user click on [esc] key
    $('body').keyup(function(e){
      if($('body').hasClass('with-searchform')){
        if(e.which === 27){
          $('body').removeClass('with-searchform');
          $('#showForm')
          .find('[data-fa-i2svg]')
          .addClass('fa-search')
          .removeClass('fa-times');
        }
      }
    });
  },
};
