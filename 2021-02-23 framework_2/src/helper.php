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

function pagenation($data) {
    define("LIST_LENGTH", 10);
    define("BLICK_LENGTH", 5);
    define("SPACING", 4);

    $page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] >= 1 ? $_GET["page"] : 1;

    $totalPage = ceil(count($data) / LIST_LENGTH);

    $startPage = floor($page / BLOCK_LENGTH) * BLOCK_LENGTH + 1;
    
    $endPage = $startPage + SPACING > $totalPage ? $totalPage : $startPage + SPACING;
    
}