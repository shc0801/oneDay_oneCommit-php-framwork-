<?php

namespace Controller;

class ActionController {
    function upload() {
        $image = $_FILES["image"];
        $filename = time() . "-" . $image["name"];
        move_uploaded_file($image["tmp_name"], UPLOAD."/$filename");
    }
}