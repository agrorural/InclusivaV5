// Make sure we can use pseudo classes
fontawesome.config = { searchPseudoElements: true }

import fontawesome from '@fortawesome/fontawesome'
import brands from '@fortawesome/fontawesome-free-brands'
import solid from '@fortawesome/fontawesome-free-solid'
import regular from '@fortawesome/fontawesome-free-regular'

fontawesome.library.add(brands, solid, regular)

export default {
  init() {
    // JavaScript to be fired on all pages

    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
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

    // Close search form if user click on [esc] key
    $('body').keyup(function(e){
      if($('body').hasClass('with-searchform')){
        if(e.which === 27){
          $('body').removeClass('with-searchform');
        }
      }
    });

    // Add class when user add content to input
    $('input.form-control').focus(function() {
      $(this).parents('.form-group').addClass('has-focus');
    }).blur(function(){
        let tmpval = $(this).val();
        $(this).parents('.form-group').removeClass('has-focus');
        
        (tmpval !== '') ? $(this).parents('.form-group').addClass('has-value') : $(this).parents('.form-group').removeClass('has-value empty');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
