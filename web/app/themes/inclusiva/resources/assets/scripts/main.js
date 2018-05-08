// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import blog from './routes/blog';
import category from './routes/category';
import aboutUs from './routes/about';
import templateDocumentos from './routes/templateDocumentos';
import templateDirectorios from './routes/templateDirectorios';
import templateLanding from './routes/templateLanding';
import direccionesZonales from './routes/direccionesZonales';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Blog page
  blog,
  // Category page
  category,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  // Page Template Documentos
  templateDocumentos,
  // Page Template Directorios
  templateDirectorios,
  // Page Direcciones Zonales
  direccionesZonales,
  // Page Template Landing Page
  templateLanding,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
