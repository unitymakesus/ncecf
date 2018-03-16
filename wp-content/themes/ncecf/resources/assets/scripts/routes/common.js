import Clipboard from 'clipboard';
import M from 'materialize-css';

export default {
  init() {
    // Expandable sections
    $('.expandable .closed').on('click', '.expandable-body', function() {
      $(this).closest('.group').removeClass('closed');
    });
  },
  finalize() {
    // Copy links to clipboard
    const copyLink = new Clipboard('.copy-link');

    copyLink.on('success', function() {
      M.toast({html: 'Copied!'});
    });
  },
};
