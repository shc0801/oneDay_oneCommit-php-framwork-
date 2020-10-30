<?php

function classLoader($class) {
    require SRC."/$class.php";
}

spl_autoload_register("classLoader");