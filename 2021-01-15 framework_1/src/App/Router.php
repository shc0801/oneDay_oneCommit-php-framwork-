<?php

namespace App;

class Router {
    static $pages = [];
    static function callStatic($name, $args) {
        if(strtolower($_REQUEST["METHOD"]) == $name) {
            self::$pages[] = $args;
        }
    }

    static function start() {
        $url = explode("?", $_REQUEST["REQUEST_URI"]);
        foreach(self::${strtolower($_SERVER["REQUEST_METHOD"])} as $page) {
            if($page[0] === $url) {
                $action = explode("@", $page[1]);
                $conName = "Controller\\{$action[0]}";
                $con = new $conName();
                $con->{$action[1]}();
                exit;
            }
        }
    }
}