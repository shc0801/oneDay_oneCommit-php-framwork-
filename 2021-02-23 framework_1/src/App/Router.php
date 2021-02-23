<?php

namespace App;

class Router {
    static $pages = null;

    static function __callStatic($name, $args) {
        if(strtolower($_SERVER["REQUEST_METHOD"]) == $name) {
            self::$pages[] = $args;
        }
    }

    static function start() {
        $url = explode("?", $_SERVER["REQUEST_URI"])[0];

        foreach(self::$pages as $page) {
            if($url == $page[0]) {
                $action = explode("@", $page[1]);
                $conName = "Controller\\{$action[1]}";
                $con = new $conName();
                $con->{$action[1]}();
                exit;
            }
        }
    }
}