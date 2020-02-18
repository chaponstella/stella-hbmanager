<?php

$router = $container->getRouter();
$router->setNamespace('App\Controller');

/**
 * Routes de base
 */
$router->get('', 'PagesController@index'); // Page d'accueil contenant entre autres la liste des rooms

/**
 * Routes ROOM
 */
$router->get('/rooms/(\d+)', 'RoomsController@show'); // Affichage de 1 room
$router->get('/rooms', 'RoomsController@index');

$router->get('/rooms/(\d+)/edit', 'RoomsController@edit');    // Formulaire Edit
$router->post('/rooms/(\d+)/edit', 'RoomsController@update'); // Traitement Edit

$router->get('/rooms/new', 'RoomsController@new');            // Formulaire Create
$router->post('/rooms', 'RoomsController@create');            // Traitement Create
$router->get('/rooms/(\d+)/delete', 'RoomsController@delete');

/**
 * Routes CLIENT
 */

$router->get('/clients', 'ClientsController@index');
$router->get('/clients/(\d+)', 'ClientsController@show');

$router->get('/clients/(\d+)/edit', 'ClientsController@edit');    // Formulaire Edit
$router->post('/clients/(\d+)/edit', 'ClientsController@update'); // Traitement Edit

$router->get('/clients/new', 'ClientsController@new');            // Formulaire Create
$router->post('/clients', 'ClientsController@create');            // Traitement Create
$router->get('/clients/(\d+)/delete', 'ClientsController@delete');


$router->run();
