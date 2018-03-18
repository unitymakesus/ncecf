export default {
  finalize() {
    $(document).on('facetwp-loaded', function() {
      // Add labels above each facet
      $('.facetwp-facet').each(function() {
        let facet_icon = '';
        let facet_name = $(this).attr('data-name');
        // eslint-disable-next-line no-undef
        let facet_label = FWP.settings.labels[facet_name];
        if ($('.facet-label[data-for="' + facet_name + '"]').length < 1) {
          switch (facet_name) {
            case "resource_type": {
              facet_icon = '<i class="material-icons" aria-hidden="true">library_books</i>';
              break;
            }
            case "resource_issue": {
              facet_icon = '<i class="material-icons" aria-hidden="true">attach_file</i>';
              break;
            }
            case "resource_initiative": {
              facet_icon = '<i class="material-icons" aria-hidden="true">lightbulb_outline</i>';
              break;
            }
            case "resource_year": {
              facet_icon = '<i class="material-icons" aria-hidden="true">date_range</i>';
              break;
            }
          }
          $(this).before('<div class="h4 facet-label" data-for="' + facet_name + '">' + facet_icon + facet_label + '</div>');
        }
      });
    });
  },
};
