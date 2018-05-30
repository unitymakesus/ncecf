import Clipboard from 'clipboard';
import M from 'materialize-css';

export default {
  init() {
    // Expandable sections
    $('.expandable .closed').on('click', '.expandable-body', function() {
      $(this).closest('.group').removeClass('closed');
    });

    /**
     * Set aria labels for current navigation items
     */
    // Main navigation in header and footer
    $('.menu-primary-menu-container .menu-item').each(function() {
      if ($(this).hasClass('current-page-ancestor')) {
        $(this).children('a').attr('aria-current', 'true');
      }
      if ($(this).hasClass('current-menu-item')) {
        $(this).children('a').attr('aria-current', 'page');
      }
    });
    // Sidebar navigation
    $('.widget_nav_menu .menu-item').each(function() {
      if ($(this).hasClass('current-page-ancestor')) {
        $(this).children('a').attr('aria-current', 'true');
      }
      if ($(this).hasClass('current-menu-item')) {
        $(this).children('a').attr('aria-current', 'page');
      }
    });
  },
  finalize() {
    // Copy links to clipboard
    const copyLink = new Clipboard('.copy-link');

    copyLink.on('success', function() {
      M.toast({html: 'Copied!'});
    });

    // Media query
    const mDown = window.matchMedia( "(max-width: 992px)" );

    // Show mobile nav
    function showMobileNav() {
      $('body').addClass('mobilenav-active');
      $('#menu-trigger + label i').attr('aria-label', 'Hide navigation menu');

      // Enable focus of nav items using tabindex
      $('.navbar-menu').each(function() {
        var el = $(this);
        $('a', el).attr('tabindex', '0');
      });
    }

    // Hide mobile nav
    function hideMobileNav() {
      $('body').removeClass('mobilenav-active');
      $('#menu-trigger + label i').attr('aria-label', 'Show navigation menu');

      // Disable focus of nav items using tabindex
      $('.navbar-menu').each(function() {
        var el = $(this);
        $('a', el).attr('tabindex', '-1');
      });
    }

    // Toggle mobile nav
    $('#menu-trigger').on('change focusout', function() {
      if ($(this).prop('checked')) {
        console.log('show1');
        showMobileNav();
      } else {
        console.log('hide1');
        hideMobileNav();
      }
    });

    // Only show mobile nav if an element inside is receiving focus
    $('.navbar-menu').each(function () {
      var el = $(this);

      $('a', el).on('focus', function() {
        $(this).parents('li').addClass('hover');
      }).on('focusout', function() {
        $(this).parents('li').removeClass('hover');

        if (mDown.matches) {
          setTimeout(function () {
            if ($(':focus').closest('#menu-main-menu').length == 0) {
              $('#menu-trigger').prop('checked', false);
              console.log('hide2');
              hideMobileNav();
            }
          }, 200);
        }
      });
    });

  },
};
