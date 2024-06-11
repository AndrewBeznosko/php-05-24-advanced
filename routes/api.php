<?php

use App\Conrollers\AuthController;
use App\Conrollers\V1\FoldersController;
use Core\Router;

Router::getInstance()
    ->put('/api/resource/{id:\d+}/update')->controller(AuthController::class)->action('index');

Router::post('api/auth/register')
    ->controller(AuthController::class)
    ->action('register');

Router::post('api/auth')
    ->controller(AuthController::class)
    ->action('auth');

Router::get('api/v1/folders')
    ->controller(FoldersController::class)
    ->action('index');

Router::get('api/v1/folders/{id:\d+}')
    ->controller(FoldersController::class)
    ->action('show');

Router::post('api/v1/folders/store')
    ->controller(FoldersController::class)
    ->action('store');

Router::put('api/v1/folders/{id:\d+}/update')
    ->controller(FoldersController::class)
    ->action('update');

Router::delete('api/v1/folders/{id:\d+}/delete')
    ->controller(FoldersController::class)
    ->action('delete');


