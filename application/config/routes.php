<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */


$route['edificios'] = 'edificios/index';
$route['edificios/dispositivos/(:any)'] = 'edificios/dispositivos/$1';

$route['estados'] = 'estados/index';
$route['estados/criar'] = 'estados/criar';
$route['estados/actualizar'] = 'estados/actualizar';
$route['estados/dispositivos/(:any)'] = 'estados/dispositivos/$1';

$route['categorias'] = 'categorias/index';
$route['categorias/criar'] = 'categorias/criar';
$route['categorias/actualizar'] = 'categorias/actualizar';
$route['categorias/dispositivos/(:any)'] = 'categorias/dispositivos/$1';

$route['dispositivos/pesquisar'] = 'dispositivos/pesquisar';
$route['dispositivos/ver_dispositivos_no_mapa'] = 'dispositivos/ver_dispositivos_no_mapa';
$route['dispositivos/cancelar'] = 'dispositivos/index';
$route['dispositivos/index'] = 'dispositivos/index';
$route['dispositivos/criar'] = 'dispositivos/criar';
$route['dispositivos/actualizar'] = 'dispositivos/actualizar';
$route['dispositivos/(:any)'] = 'dispositivos/ver/$1';
$route['dispositivos'] = 'dispositivos/index';

$route['default_controller'] = 'dispositivos/index';
$route['(:any)'] = 'mapas/view/$1'; // $1 representa um placeholder
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
