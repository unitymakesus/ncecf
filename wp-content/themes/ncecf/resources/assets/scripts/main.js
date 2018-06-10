// import external dependencies
import 'jquery';
import 'materialize-css';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import archiveNcecfResourceData from './routes/resources';

/**
 * Web Font Loader
 */
var WebFont = require('webfontloader');

WebFont.load({
 google: {
   families: ['Libre+Franklin:700,900', 'Open+Sans:400,400i,600', 'Material+Icons'],
 },
});

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  archiveNcecfResourceData,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());


// Footnotes toggle
$('.footnotes .footnoteshow').click(function(){
  let e = $(event.target);

  e.text(function(i, v){
    return v === 'Hide footnotes' ? 'Show footnotes' : 'Hide footnotes'
  })

  e.closest('.footnotes').find('ol').slideToggle();
})
