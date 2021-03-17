<?php

use App\Router;

Router::get("/", "ViewController@indexPage");

Router::start();