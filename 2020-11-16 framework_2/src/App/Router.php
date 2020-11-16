<?php

namespace App;

class Router {
    static $pages = [];
    static function __classStatic($name, $args) {
        if(strtolower($_SERVER["REQUEST_METHOD"]) == $name) {
            self::$pages[] = $args;
        }
    }

    static function start() {
        $currentURL = explode("?", $_SERVER["REQUEST_URI"])[0];
        foreach(self::$pages as $page) {
            $url = $page[0];
            $action = explode("@", $page[1]);
            $permission = isset($page[2]) ? $page[2] : null;

            $regex = preg_replace("/({[^\/]+})/", "([^/]+)");
            $regex = preg_replace("/\//", "\\/");

            if(preg_match("/^{$regex}$/", $currentURL, $actions)) {
                unset($actions[0]);

                if($permission) {
                    if($permission == "guest" && !user()) go("/", "크크루삥뿡");
                    if($permission == "user" && !user()) go("/", "크크루삥뿡");
                    if($permission == "company" && !user()) go("/", "크크루삥뿡");
                    if($permission == "admin" && !admin()) go("/", "크크루삥뿡");
                }
            }
        }
    }
}