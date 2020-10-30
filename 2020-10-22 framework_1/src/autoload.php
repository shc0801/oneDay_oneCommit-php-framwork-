<?php

function classLoader($class) {
    require SRC."/$c.php";
}

spl_autoload_register("classLoader");