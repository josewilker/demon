<?php

    class processes {

        public function startAgain($namespace) {

            exec("cd " . BASE_PATH . "; php run.php '" . $namespace . "'");

        }

    }

?>