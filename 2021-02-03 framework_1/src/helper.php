<?php

function view($name, $data = []) {
    extract($data);

    require View."/header.php";
    require View."/$name.php";
    require View."/footer.php";
    exit;
}

function back($msg) {
    echo "<script>";
    echo "alert('$msg');";
    echo "history.back();";
    echo "</script>";
    exit;
}

function go($msg, $url) {
    echo "<script>";
    echo "alert('$msg');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}

function user() {
    return isset($_SESSION["user"]) ? $_SESSION["user"] : false;
}

function admin() {
    return user() && user()->user_email == "admin" ? user() : false;
}