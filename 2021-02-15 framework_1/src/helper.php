<?php

function go($url, $msg) {
    echo "<script>";
    echo "alert('$msg');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}

function back($msg) {
    echo "<script>";
    echo "alert('$msg');";
    echo "history.back();";
    echo "</script>";
    exit;
}

function view($name, $data = []) {
    extract($data);
    require VIEW."/header.php";
    require VIEW."/$name.php";
    require VIEW."/footer.php";
    exit;
}

function user() {
    return isset($_SESSION["user"]) ? $_SESSION["user"] : false;
}