export default {
  init() {
    // JavaScript to be fired on all pages
    $('.collapsible').collapsible({accordion: false});
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
