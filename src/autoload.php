<?php

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . "/Repository/",
        __DIR__ . "/Service/",
        __DIR__ . "/Entity/",
        __DIR__ . "/Abstract/",
        __DIR__ . "/Interface/",
        __DIR__ . "/Database/",
        __DIR__ . "/Exception/"
    ];

    foreach ($paths as $path) {
        $file = $path . $class . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
