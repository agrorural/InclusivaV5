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
            jQuery('body').addClass('content-expanded');
            jQuery('body').removeClass('content-collapsed');
        } else {
            jQuery('body').removeClass('content-expanded');
            jQuery('body').addClass('content-collapsed');
        }
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
