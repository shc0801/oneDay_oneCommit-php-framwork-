<?php

use App\DB;

function user() {
    if(isset($_SESSION["user"])) {
        $user = DB::find('users', $_SESSION["user"]->id);

        if(!$user) {
            go("/logout", "회원 정보를 찾을 수 없어 로그아웃 되었습니다.");
        } else {
            $_SESSION["user"] = $user;
        }

        return $_SESSION["user"];
    } else return false;
}

function company() {
    return user() && user()->type == 'company';
}

function admin() {
    return user() && user()->type == 'admin';
}

function go($url, $message = "") {
    echo "<script>";
    echo "alert('$message');";
    echo "location.href='$url'";
    echo "</script>";
    exit;
}

function back($message = "") {
    echo "<script>";
    echo "alert('$message');";
    echo "history.back()";
    echo "</script>";
    exit;
}

function view($viewName, $data = []) {
    extract($data);
    require VIEW."/header.php";
    require VIEW."/$viewName.php";
    require VIEW."/footer.php";
    exit;
}