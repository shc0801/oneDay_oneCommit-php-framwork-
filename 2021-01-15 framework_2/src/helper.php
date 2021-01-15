<?php

function go($url, $message = "") {
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "location.href=$url;";
    echo "</srcipt>";
}

function back($message = "") {
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "history.back();";
    echo "</srcipt>";
}

function checkInput($response = "js") {
    foreach($_POST as $item) {
        if($item == "") {
            if($response == "js") back("모든 정보를 입력해 주세요");
        }
    }

    foreach($_FILES as $file) {
        if(!is_file($file["tmp_name"])) {
            if($response == "js") back("파일을 업로드해 주세요");
        }
    }
}