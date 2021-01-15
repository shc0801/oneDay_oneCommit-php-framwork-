<?php

namespace App;

class Router {
    static $pages = [];

    static function callStatic($name, $args) {
        if(strtolower($_SERVER["REQUEST_METHOD"]) == $name) {
            self::$pages[] = $args;
        }
    }

    static function start() {
        $url = explode("?", $_SESSION["REQUEST_URI"]);
        foreach($pages as $page) {
            if($page[0] == $url) {
                $action = explode("@", $page[1]);
                $conName = "Controller\\{$action[0]}";
                $con = new $conName();
                $con->{$ation[1]}();
                exit;
            }            
        }
    }
}