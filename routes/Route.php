<?php
use Steampixel\Route; 

/**
 * Example View
 * PHP version 7.0
 */

Route::add('/([a-z-0-9-]*)', function () {
    include 'views/index.html';
  });