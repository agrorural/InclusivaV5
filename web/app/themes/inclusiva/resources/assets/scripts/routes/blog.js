// SimplebarJS
import SimpleBar from 'simplebar';

export default {
  init() {
    // JavaScript to be fired on the about us page
    new SimpleBar(document.getElementById('simpleBarCategories'), { 
      scrollbarMinSize: 100,
    });
  },
};
