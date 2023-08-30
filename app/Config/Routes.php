<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('/home/tampil-tugas', 'home::tampilTugas');

$routes->post('/home/tampil-tugas', 'home::tampilTugas');
$routes->post('/home/tambah-tugas', 'home::tambahTugas');
$routes->post('/home/edit-tugas', 'home::editTugas');
$routes->post('/home/delete-tugas', 'home::deleteTugas');