<?php

function classLodaer($c) {
    require SRC."/$c.php";
}

spl_autoload_register("classLodaer")