<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\PostController;

/** @var \Core\Http\Router $router */

$router->get('/', [HomeController::class, 'index']);
$router->get('/posts', [PostController::class, 'index']);
$router->get('/posts/create', [PostController::class, 'create']);
$router->post('/posts', [PostController::class, 'store']);
$router->get('/posts/{id}', [PostController::class, 'show']);
$router->get('/posts/{id}/edit', [PostController::class, 'edit']);
$router->post('/posts/{id}/update', [PostController::class, 'update']);
$router->post('/posts/{id}/delete', [PostController::class, 'destroy']);
