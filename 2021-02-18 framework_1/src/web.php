<?php

use App\Router;

Router::get("/", "MainController@indexPage");

Router::start();