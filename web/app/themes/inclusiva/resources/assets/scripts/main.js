// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import templateDocumentos from './routes/templateDocumentos';
import templateDirectorios from './routes/templateDirectorios';
import direccionesZonales from './routes/direccionesZonales';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  // Page Template Documentos
  templateDocumentos,
  // Page Template Directorios
  templateDirectorios,
  // Page Direcciones Zonales
  direccionesZonales,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
