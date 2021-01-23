<?php

    class logs {

        public function save($type, $msg, $print=false) {

            $dirFile = BASE_PATH."/logs/$type-".date("Ymd").".log";

            $string = "";
            if (file_exists($dirFile)) {
                $string = file_get_contents($dirFile);
            }

            $bstring = "[" . date("Y-m-d H:i:s")."] - " . "$msg" . "\n";
            $string .= $bstring;

            file_put_contents($dirFile, $string);

            if (is_object($dirFile)) {
                fclose($dirFile);
            }

            if ($print) {
                echo $bstring;
            }

        }

    }

?>