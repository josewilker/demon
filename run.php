#!/usr/bin/php

<?php

    set_time_limit(0);

    $env=(empty($argv[2])) ? true : false;
    $args=(!empty($argv[3])) ? $argv[3] : false;

    include("libs/config/setup.php");

    $script = $argv[1];

    if (empty($script)) {

        echo "Error: You don't set a script.";

    } else {

        require("scripts/$script.php");

        $arrayPathScript = explode("/",$script);

        $scriptName = $arrayPathScript[count($arrayPathScript)-1];
        $scriptClassName = "script_".$scriptName;

        $scriptClassObj = new $scriptClassName($__bare, $args);

    }

?>
