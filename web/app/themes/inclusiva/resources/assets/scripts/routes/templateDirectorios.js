export default {
  init() {
    // JavaScript to be fired on the about us page
    (function($) {
      let ajaxDirSearch = $('.directorio');
      // let termPath = '';
      // let customPostContent = '';
      // let docPath = '/transparencia/documentos/';
    
      let objectToSend = {
          action: 'ajax_dir_search',
          postTerm: '',
          txtKeyword: "",
          response: [],
          bError: false,
          vMensaje: '',
      };
    
      objectToSend.postTerm = wp.dir_grupos_id;
    
      function listarDirectorio(objectToSend) {
          $.ajax({
              url: wp.ajax_url,
              data: objectToSend,
              beforeSend: function() {
                $('#txtKeyword').prop('disabled', true);
                $('#optGrupos').prop('disabled', true);
                $("#btnBuscar").prop('disabled', true).html("<i class='fas fa-circle-notch fa-spin'></i> Filtrando...");
                $("#btnLimpiar").prop('disabled', true).html("<i class='fas fa-sync fa-spin'></i> Limpiando...");
    
                // Preloading
                ajaxDirSearch.find('.hentry').addClass('hidden');
                ajaxDirSearch.find('.preloaded').removeClass('hidden');
              },
              complete: function() {
                $('#txtKeyword').prop('disabled', false);
                $('#optGrupos').prop('disabled', false);
                $("#btnBuscar").prop('disabled', false).html("<i class='fas fa-filter'></i> Filtrar");
                $("#btnLimpiar").prop('disabled', false).html("<i class='fas fa-sync'></i> Limpiar");
  
                // Preloading
                ajaxDirSearch.find('.preloaded').addClass('hidden');
                ajaxDirSearch.find('.hentry').removeClass('hidden');
              },
              success: function(response) {
                objectToSend = response;

                 /* eslint-disable no-console */
                 console.log(objectToSend);
                 /* eslint-disable no-console */
                
                ajaxDirSearch.find(".search-result").empty();
    
                let errorMessage = objectToSend.vMensaje;
    
                if (objectToSend.bError) {
                  objectToSend.vMensaje = '';
    
                  objectToSend.vMensaje = '<article class="hentry directorios hidden">';
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

                  ajaxDirSearch.find(".search-result").append(objectToSend.vMensaje);
              } else {
                /* eslint-disable no-console */
                console.log(objectToSend);
                /* eslint-enable no-console */
                
                for (var i = 0; i < objectToSend.response.length; i++) {
                  objectToSend.response[i].html = '';
                  
                  if( objectToSend.response[i].isOpen === true ) {
                    objectToSend.response[i].html += '<h3 class="mt-3">';
                    objectToSend.response[i].html += objectToSend.response[i].loopTerm;
                    objectToSend.response[i].html += '</h3>';
                  }
       
                  objectToSend.response[i].html += '<article class="' + objectToSend.response[i].post_class + '">';
                  objectToSend.response[i].html += '<div class="media">';
                  objectToSend.response[i].html += '<img class="mr-3" src="' + objectToSend.response[i].dir_imagen + '" alt="' + objectToSend.response[i].dir_responsable + '" width="55" heigh="60" />';
                  objectToSend.response[i].html += '<div class="entry-body media-body">';
                  objectToSend.response[i].html += '<small>';
                  objectToSend.response[i].html += objectToSend.txtKeyword.length >= 1 ? (objectToSend.response[i].title.replace(new RegExp("(" + objectToSend.txtKeyword.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*") + ")", "gi"), "<mark>$1</mark>")).replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4") : objectToSend.response[i].title;
                  objectToSend.response[i].html += '</small>';
                  objectToSend.response[i].html += '<h5 class="entry-title">';
                  objectToSend.response[i].html += objectToSend.response[i].dir_responsable;
                  objectToSend.response[i].html += '</h5>';
                  objectToSend.response[i].html += '<li>';
                  objectToSend.response[i].html += objectToSend.response[i].dir_correo;
                  objectToSend.response[i].html += '</li>';
                  objectToSend.response[i].html += '<ul>';
                  objectToSend.response[i].html += '</ul>';
    
                  objectToSend.response[i].html += '</div>';
                  objectToSend.response[i].html += '</div>';
                  objectToSend.response[i].html += '</article>';

                  
    
                  ajaxDirSearch.find(".search-result").append(objectToSend.response[i].html);
    
                }
              }
    
                /* eslint-disable no-console */
                //console.log(objectToSend.vMensaje);
                /* eslint-enable no-console */
              },
              error: function(error) {
                /* eslint-disable no-console */
                console.log(error);
                /* eslint-disable no-console */
              },
          });
      }
    
      listarDirectorio(objectToSend);
    
    function limpiarDirectorio(objectToSend) {
        ajaxDirSearch.find('form').trigger("reset");
        objectToSend.txtKeyword = "";
        objectToSend.postTerm = wp.dir_grupos_id;
        listarDirectorio(objectToSend);
    }
    
    $("#txtKeyword").keypress(function(e) {
        if (e.which === 13) {
            objectToSend.txtKeyword = $(this).val();    
            listarDirectorio(objectToSend);
        }
    });
    
    $("#optGrupos").change(function() {
        objectToSend.txtKeyword = $("#txtKeyword").val();
        objectToSend.postTerm = ($("#optGrupos").val() == 0) ? wp.dir_grupos_id : $("#optGrupos").val();
        
        listarDirectorio(objectToSend);
    });
    
    
    $("#btnBuscar").click(function(e) {
        e.preventDefault();
    
        objectToSend.txtKeyword = $("#txtKeyword").val();    
        listarDirectorio(objectToSend);
    });
    
    $("#btnLimpiar").click(function(e) {
        e.preventDefault();
        limpiarDirectorio(objectToSend);
    });
    
    // $(document).on('click', '.navi', function(e) {
    //     e.preventDefault();
    
    //     var page = $(this).data("id");
    //     objectToSend.paged = page;
    //     listarDirectorio(objectToSend);
    // });
    
    })(jQuery);
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
