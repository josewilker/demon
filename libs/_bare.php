<?php

    class Bare {

        public function __construct($configSettings=false) {

            if ($configSettings && is_array($configSettings)) {

                foreach($configSettings as $k => $v) {
                    define(strtoupper($k),"$v");
                }

            }

        }

        public function load($type, $name, $classPath, $instanceClassNow=false) {

            $file = BASE_PATH.$classPath . ".php";

            if (file_exists($file)) {

                if (empty($this->{$type})) {
                    $this->{$type} = new stdClass;
                }

                include($file);

                if ($instanceClassNow) {
                    $this->{$type}->{$name} = new $name;
                } else {
                    $this->{$type}->{$name} = new stdClass;
                }

                return true;

            } else {

                return false;

            }

        }

        public function unload($type, $name) {
            unset($this->{$type}->{$name});
            if (empty($this->{$type}->{$name})) {
                return true;
            } else {
                return false;
            }
        }

    }

?>