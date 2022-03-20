<?php
// Инициирует загрузку пирложения, все необходимые модули и прочее
require_once 'core/abstraction/model.php';
require_once 'core/abstraction/controller.php';
require_once 'core/abstraction/view.php';
require_once 'core/route.php';
Route::start();