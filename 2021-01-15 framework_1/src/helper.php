<?php

function go($url, $message) {
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}

function back($message) {
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "history.back()";
    echo "</script>";
    exit;
}

function checkInput($response = "js") {
    foreach($_POST as $item) {
        if($item == "") {
            if($response === "js") back("모든 정보를 입력해 주세요!");
            else json_response();
        }
    }

    foreach($_FILES as $item) {
        if(!is_file($file["tmp_name"])) {
            if($response === "js") back("파일을 업로드해 주세요!");
            else json_response();
        }
    }
}

function user() {
    return isset($_SESSION["user"]) ? $_SESSION["user"] : false;
}