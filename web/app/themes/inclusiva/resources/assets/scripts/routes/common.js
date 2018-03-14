// Make sure we can use pseudo classes
fontawesome.config = { searchPseudoElements: true }

import fontawesome from '@fortawesome/fontawesome'

import faCamera from '@fortawesome/fontawesome-free-solid/faCamera'
import faCircle from '@fortawesome/fontawesome-free-solid/faCircle'
import faPlay from '@fortawesome/fontawesome-free-solid/faPlay'
import faSearch from '@fortawesome/fontawesome-free-solid/faSearch'
import faUser from '@fortawesome/fontawesome-free-solid/faUser'
import faVideo from '@fortawesome/fontawesome-free-solid/faVideo'

import faCalendar from '@fortawesome/fontawesome-free-regular/faCalendar'
import faClock from '@fortawesome/fontawesome-free-regular/faClock'
import faComment from '@fortawesome/fontawesome-free-regular/faComment'
import faEdit from '@fortawesome/fontawesome-free-regular/faEdit'
import faEnvelope from '@fortawesome/fontawesome-free-regular/faEnvelope'
import faFileExcel from '@fortawesome/fontawesome-free-regular/faFileExcel'
import faFilePdf from '@fortawesome/fontawesome-free-regular/faFilePdf'
import faFileWord from '@fortawesome/fontawesome-free-regular/faFileWord'
import faNewspaper from '@fortawesome/fontawesome-free-regular/faNewspaper'

import faFacebook from '@fortawesome/fontawesome-free-brands/faFacebook'

fontawesome.library.add(faCamera)
fontawesome.library.add(faPlay)
fontawesome.library.add(faSearch)
fontawesome.library.add(faUser)
fontawesome.library.add(faVideo)

fontawesome.library.add(faCalendar)
fontawesome.library.add(faCircle)
fontawesome.library.add(faClock)
fontawesome.library.add(faComment)
fontawesome.library.add(faEdit)
fontawesome.library.add(faEnvelope)
fontawesome.library.add(faFileExcel)
fontawesome.library.add(faFilePdf)
fontawesome.library.add(faFileWord)
fontawesome.library.add(faNewspaper)

fontawesome.library.add(faFacebook)

export default {
  init() {
    // JavaScript to be fired on all pages
    
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
