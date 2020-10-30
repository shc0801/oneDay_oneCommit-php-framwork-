<?php

namespace App;

class DB {
    static $conn = null;
    static function getConnection() {
        if(self::$conn == null) {
            self::$conn = new \PDO("mqsql:host=localhost;dbname=dbname;charset=utf8mb4", "root", "", [
                19 => 5,
                3 => 2
            ]);
        }

        return self::$conn;
    }

    static function query($sql, $data = []) {
        $q = self::getConnection()->prepare($sql);
        $q->execute($data);
        return $q;
    }

    static function fetch($sql, $data = []) {
        return self::query($sql, $data)->fetch();
    }

    static function fetchAll($sql, $data = []) {
        return self::query($sql, $data)->fetchAll();
    }
    
    static function lastInsertId() {
        return self::getConnection()->lastInsertId();
    }
    
    static function find($table, $id) {
        return self::fetch("SELECT * FROM `$table` WHERE id = ?", [$id]);
    }

    static function who($user_email) {
        return self::fetch("SELECT * FROM users WHERE user_email = ?", [$user_email]);
    }

}