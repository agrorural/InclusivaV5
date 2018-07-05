export default {
  init() {
    // JavaScript to be fired on the about us page
    (function($) {
      let ajaxDocsSearch = $('.content');
      let termPath = '';
      let customPostTitle = '';
      let customPostContent = '';
      let docPath = '/transparencia/documentos/';
    
      let objectToSend = {
          action: 'ajax_docs_search',
          postType: '',
          postTax: '',
          postTerm: '',
          txtKeyword: "",
          optMonth: 0,
          optYear: (new Date()).getFullYear(),
          optPerPage: 20,
          max_num_pages: 0,
          response: [],
          bError: false,
          vMensaje: '',
          paged: 1,
      };
    
      objectToSend.postType = wp.is_pt === '1' ? 'documentos' : 'post';
      objectToSend.postTax = wp.term ? wp.term.taxonomy : 'category';
      objectToSend.postTerm = wp.term ? wp.term.slug : 'agro-rural';
    
      function listarDocumentos(objectToSend) {
          $.ajax({
              url: wp.ajax_url,
              data: objectToSend,
              beforeSend: function() {
                $('#txtKeyword').prop('disabled', true);
                $('#optMonth').prop('disabled', true);
                $('#optYear').prop('disabled', true);
                $('#optPerPage').prop('disabled', true);
                $("#btnDocumento").prop('disabled', true).html("<i class='fas fa-circle-notch fa-spin'></i> Filtrando...");
                $("#btnLimpiar").prop('disabled', true).html("<i class='fas fa-sync fa-spin'></i> Limpiando...");
    
                // Preloading
                ajaxDocsSearch.find('.preloaded').removeClass('hidden');
                ajaxDocsSearch.find('.hentry').addClass('hidden');
              },
              complete: function() {
                  $('#txtKeyword').prop('disabled', false);
                  $('#optMonth').prop('disabled', false);
                  $('#optYear').prop('disabled', false);
                  $('#optPerPage').prop('disabled', false);
                  $("#btnDocumento").prop('disabled', false).html("<i class='fas fa-filter'></i> Filtrar");
                  $("#btnLimpiar").prop('disabled', false).html("<i class='fas fa-sync'></i> Limpiar");
    
                  // Preloading
                  ajaxDocsSearch.find('.preloaded').addClass('hidden');
                  ajaxDocsSearch.find('.hentry').removeClass('hidden');
              },
              success: function(response) {
                objectToSend = response;
                
                ajaxDocsSearch.find(".search-result").empty();
                ajaxDocsSearch.find(".wp-pagenavi").empty();
    
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
                  
                  ajaxDocsSearch.find(".wp-pagenavi").addClass('hidden');
                  ajaxDocsSearch.find(".search-result").append(objectToSend.vMensaje);
              } else {
                for (var i = 0; i < objectToSend.response.length; i++) {
    
                  objectToSend.response[i].html = '';
                  objectToSend.response[i].html += '<article class="' + objectToSend.response[i].post_class + ' hidden">';
                  
                  customPostTitle = objectToSend.postTerm === 'directivas' || objectToSend.postTerm === 'pac' ? objectToSend.response[i].doc_ane__nom : customPostTitle = objectToSend.response[i].title;
                  customPostContent = objectToSend.postTerm === 'directivas' || objectToSend.postTerm === 'pac' ? objectToSend.response[i].doc_ane__desc : customPostContent = objectToSend.response[i].content;
    
                  objectToSend.response[i].html += '<h4 class="entry-title">';
                  objectToSend.response[i].html += '<a href="' + objectToSend.response[i].permalink + '">';
                  objectToSend.response[i].html += objectToSend.txtKeyword.length >= 1 ? (customPostTitle.replace(new RegExp("(" + objectToSend.txtKeyword.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*") + ")", "gi"), "<mark>$1</mark>")).replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4") : customPostTitle;
                  objectToSend.response[i].html += '</a>';
                  objectToSend.response[i].html += '</h4>';

                  objectToSend.response[i].html += '<div class="post-meta">';
                  objectToSend.response[i].html += '<div class="post-date">';
                  objectToSend.response[i].html += '<time class="updated"><i class="far fa-clock"></i> ' + objectToSend.response[i].date + '</time>';
                  objectToSend.response[i].html += '</div>';
                  objectToSend.response[i].html += '<div class="post-comments">';
    
                  termPath = objectToSend.postTerm === 'directivas' ? 'rde' :
                      objectToSend.postTerm === 'ado' ? 'rde' :
                      objectToSend.postTerm === 'lfo' ? 'rde' :
                      objectToSend.postTerm === 'pac' ? 'rda' :
                      objectToSend.postTerm === 'cds' ? 'rda' :
                      objectToSend.postTerm;
                  /* eslint-disable no-console */
                  //console.log(objectToSend);
                  /* eslint-disable no-console */
    
                  if (objectToSend.response[i].doc_link === 'Publicado') {
                      objectToSend.response[i].html += '<a class="btn btn-link btn-sm" href="' + wp.upload_dir.baseurl + docPath + termPath.toLowerCase() + '/' + objectToSend.response[i].slug.toUpperCase() + '.PDF" target="_blank"><i class="far fa-file-pdf"></i> Descargar</a>';
                  } else {
                      objectToSend.response[i].html += 'No disponible';
                  }
    
                  objectToSend.response[i].html += '</div>';
                  objectToSend.response[i].html += '</div>';

                  objectToSend.response[i].html += '<div class="entry-body">';
    
                  objectToSend.response[i].html += objectToSend.txtKeyword.length >= 1 ? (customPostContent.replace(new RegExp("(" + objectToSend.txtKeyword.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*") + ")", "gi"), "<mark>$1</mark>")).replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4") : customPostContent;
    
                  objectToSend.response[i].html += '</div>';

                  objectToSend.response[i].html += '</article>';
    
    
                  ajaxDocsSearch.find(".search-result").append(objectToSend.response[i].html);
    
                  if (ajaxDocsSearch.find(".wp-pagenavi").hasClass('hidden')) {
                      ajaxDocsSearch.find(".wp-pagenavi").removeClass('hidden');
                  }
    
              }

              var html = '';
  
              for (var j = 1; j <= objectToSend.max_num_pages; j++) {
                  if( j === 1 && objectToSend.paged !== 1 ) {
                    html += '<a class="previouspostslink navi" rel="prev" href="page/' + ( objectToSend.paged -1 ) + '" data-id="' + ( objectToSend.paged -1 ) + '">«</a>';
                  }
                  if (objectToSend.paged === j) {
                      html += '<span class="current">' + j + '</span>';
                  }else{
                    html += '<a href="page/' + j + '" class="larger page navi" data-id="' + j + '">' + j + '</a>';
                  }

                  if( j === objectToSend.max_num_pages && objectToSend.paged < objectToSend.max_num_pages ) {
                    html += '<a class="nextpostslink navi" rel="next" href="page/' + ( objectToSend.paged + 1 ) + '" data-id="' + ( objectToSend.paged + 1 ) + '">»</a>';
                  }
                }
              }

              ajaxDocsSearch.find(".wp-pagenavi").append(html);
  
              /* eslint-disable no-console */
              //console.log(objectToSend);
              /* eslint-enable no-console */
            },
              error: function(error) {
                /* eslint-disable no-console */
                console.log(error);
                /* eslint-disable no-console */
              },
          });
      }
    
      listarDocumentos(objectToSend);
    
      function limpiarDocumentos(objectToSend) {
        ajaxDocsSearch.find('form').trigger("reset");
        objectToSend.txtKeyword = "";
        objectToSend.optMonth = 0;
        objectToSend.optYear = (new Date()).getFullYear();
        objectToSend.optPerPage = 20;
        objectToSend.max_num_pages = 0;
        objectToSend.paged = 1;
    
        listarDocumentos(objectToSend);
    }
    
    $("#txtKeyword").keypress(function(e) {
        if (e.which === 13) {
            objectToSend.txtKeyword = $(this).val();
            objectToSend.paged = 1;
    
            listarDocumentos(objectToSend);
        }
    });
    
    $("#optMonth").change(function() {
        objectToSend.txtKeyword = $("#txtKeyword").val();
        objectToSend.optMonth = $("#optMonth").val();
        objectToSend.paged = 1;
    
        listarDocumentos(objectToSend);
    });
    
    $("#optYear").change(function() {
        objectToSend.txtKeyword = $("#txtKeyword").val();
        objectToSend.optYear = $("#optYear").val();
        objectToSend.paged = 1;
    
        listarDocumentos(objectToSend);
    });
    
    $("#optPerPage").change(function() {
        objectToSend.txtKeyword = $("#txtKeyword").val();
        objectToSend.optPerPage = $("#optPerPage").val();
        objectToSend.paged = 1;
    
        listarDocumentos(objectToSend);
    });
    
    $("#btnDocumento").click(function(e) {
        e.preventDefault();
    
        objectToSend.txtKeyword = $("#txtKeyword").val();
        objectToSend.paged = 1;
    
        listarDocumentos(objectToSend);
    });
    
    $("#btnLimpiar").click(function(e) {
        e.preventDefault();
        limpiarDocumentos(objectToSend);
    });
    
    $(document).on('click', '.navi', function(e) {
        e.preventDefault();
    
        var page = $(this).data("id");
        objectToSend.paged = page;
        listarDocumentos(objectToSend);
    });
    
    })(jQuery);
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
