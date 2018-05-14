export default {
  init() {
    // JavaScript to be fired on the about us page
    (function($) {
      let ajaxDirSearch = $('.directorio');
      let theHtml = '';
      let status = '';
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
                //console.log(objectToSend.html);
                /* eslint-enable no-console */
                
                for (var i = 0; i < objectToSend.response.length; i++) {
                  
                  objectToSend.response[i].html = '';

                  /* eslint-disable no-debugger */
                  //debugger;
                  /* eslint-enable no-debugger */

                  if( objectToSend.response[i].isClose ) {
                    objectToSend.response[i].html += '</div>';
                  }

                  if( objectToSend.response[i].isOpen === true ) {
                    objectToSend.response[i].html += '<h3 class="section-title">';
                    objectToSend.response[i].html += '<button class="btn btn-link btn-collapse" type="button">';
                    objectToSend.response[i].html += objectToSend.response[i].loopTerm;
                    objectToSend.response[i].html += '</h3>';
                    objectToSend.response[i].html += '</button>';
                    objectToSend.response[i].html += '<div class="collapse show">';
                  }


                  objectToSend.response[i].html += '<article class="' + objectToSend.response[i].post_class + '">';
                  objectToSend.response[i].html += '<div class="media">';
                  objectToSend.response[i].html += '<img class="card-img" src="' + objectToSend.response[i].dir_imagen + '" alt="' + objectToSend.response[i].dir_responsable + '" width="auto" heigh="80" />';
                  objectToSend.response[i].html += '<div class="entry-body media-body">';
                  objectToSend.response[i].html += '<small>';
                  
                  if(objectToSend.response[i].dir_situacion === "Encargado") {
                    status = ' (E)'
                  }else{
                    status = '';
                  }
                  
                  objectToSend.response[i].html += objectToSend.txtKeyword.length >= 1 ? (objectToSend.response[i].title.replace(new RegExp("(" + objectToSend.txtKeyword.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*") + ")", "gi"), "<mark>$1</mark>")).replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4") + status : objectToSend.response[i].title + status;
                  objectToSend.response[i].html += '</small>';
                  objectToSend.response[i].html += '<h5 class="entry-title">';
                  objectToSend.response[i].html += objectToSend.response[i].dir_responsable;
                  objectToSend.response[i].html += '</h5>';
                  objectToSend.response[i].html += '<ul class="nav">';
                  
                  if (objectToSend.response[i].dir_correo !== false) {
                    objectToSend.response[i].html += '<li class="nav-item">';
                    objectToSend.response[i].html += objectToSend.response[i].dir_correo;
                    objectToSend.response[i].html += '</li>';
                  }

                  if (objectToSend.response[i].phoneExt !== null || objectToSend.response[i].phoneLocal !== null || objectToSend.response[i].phoneLocal2 !== null || objectToSend.response[i].phoneDirect !== null) {
                    objectToSend.response[i].html += '<li class="nav-item phone">';
                    
                    if(objectToSend.response[i].phoneExt !== null){
                      objectToSend.response[i].html += objectToSend.response[i].phoneExt.html;
                    }
                    
                    if(objectToSend.response[i].phoneLocal !== null){
                      objectToSend.response[i].html += objectToSend.response[i].phoneLocal.html;
                    }

                    if(objectToSend.response[i].phoneLocal2 !== null){
                      objectToSend.response[i].html += objectToSend.response[i].phoneLocal2.html;
                    }

                    if(objectToSend.response[i].phoneDirect !== null){
                      objectToSend.response[i].html += objectToSend.response[i].phoneDirect.html;
                    }
                    
                    objectToSend.response[i].html += '</li>';
                  }

                  if (objectToSend.response[i].address !== null) {
                    objectToSend.response[i].html += '<li class="nav-item">';
                    objectToSend.response[i].html += objectToSend.response[i].address;
                    objectToSend.response[i].html += '</li>';
                  }

                  objectToSend.response[i].html += '</ul>';
    
                  objectToSend.response[i].html += '</div>';

                  objectToSend.response[i].html += '<div class="entry-details">';
                  objectToSend.response[i].html += '<h6>Información Adicional</h6>';
                  objectToSend.response[i].html += '<ul class="nav">';

                  if (objectToSend.response[i].dir_resolucion !== false) {
                    objectToSend.response[i].html += '<li class="nav-item">';
                    objectToSend.response[i].html += '<a href="' + objectToSend.response[i].dir_resolucion + '">';
                    objectToSend.response[i].html += 'Resolución';
                    objectToSend.response[i].html += '</a>';
                    objectToSend.response[i].html += '</li>';
                  }

                  if (objectToSend.response[i].dir_cv !== false) {
                    objectToSend.response[i].html += '<li class="nav-item">';
                    objectToSend.response[i].html += '<a href="' + objectToSend.response[i].dir_cv + '">';
                    objectToSend.response[i].html += 'Curriculum vitae';
                    objectToSend.response[i].html += '</a>';
                    objectToSend.response[i].html += '</li>';
                  }

                  if (objectToSend.response[i].dir_dji !== false) {
                    objectToSend.response[i].html += '<li class="nav-item">';
                    objectToSend.response[i].html += '<a href="' + objectToSend.response[i].dir_dji + '">';
                    objectToSend.response[i].html += 'Declaración Jurada de Incompatibilidades';
                    objectToSend.response[i].html += '</a>';
                    objectToSend.response[i].html += '</li>';
                  }

                  objectToSend.response[i].html += '</ul>';
                  objectToSend.response[i].html += '</div>';

                  objectToSend.response[i].html += '</div>';
                  objectToSend.response[i].html += '</article>';
                  

                  if(i === (objectToSend.response.length - 1) ) {
                    objectToSend.response[i].html += '</div>';
                  }

                  
    
                  
                  theHtml += objectToSend.response[i].html;
                }

                ajaxDirSearch.find(".search-result").append(theHtml);
                /* eslint-disable no-console */
                console.log(theHtml);
                /* eslint-enable no-console */

                theHtml = '';
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
    $(document).on("click", '.btn-collapse', function() { 
      $(this).parent().next().collapse('toggle');
    });
  },
};
