<?php

use App\Enums\Http\Status;
use Core\Router;
use Dotenv\Dotenv;

define('BASE_DIR', dirname(__DIR__));

require_once BASE_DIR . '/vendor/autoload.php';

try {
    $dotenv = Dotenv::createImmutable(BASE_DIR);
    $dotenv->load();

    die(Router::getInstance()->dispatch());
} catch (Throwable $e) {
//    die(jsonResponse(Status::getBaseCode($e->getCode()), ['errors' => ['message' => $e->getMessage()]]));
    $status = Status::getBaseCode($e->getCode());
    die(jsonResponse($status, ['errors' => ['message' => $e->getMessage()]]));
}