<?php

    if (!function_exists('is_connected')) {

        function is_connected($host, $port=80) {

            $connected = @fsockopen($host, $port);

            if ($connected) {
                $is_conn = true;
                fclose($connected);
            } else {
                $is_conn = false;
            }

            return $is_conn;

        }

    }

    if (!function_exists('is_utf8')) {
        function is_utf8($str) {
            return (bool) preg_match('//u', $str);
        }
    }

    if (!function_exists('_convertUTF8')) {
        function _convertUTF8($content) {
            if((mb_detect_encoding($content) != 'UTF-8')
                OR !($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32'))) {

                $content = mb_convert_encoding($content, 'UTF-8');

                if (mb_detect_encoding($content) == 'UTF-8') {
                    // log('Converted to UTF-8');
                } else {
                    // log('Could not converted to UTF-8');
                }
            }
            return $content;
        }
    }

    if (!function_exists('get_social_meta_data')) {

        function get_social_meta_data($dd, $html, $arrayTags=false) {

            //print_r($html);

            //preg_match_all("^<meta\s+property=\s+content=\w+\/>$", $html, $matches, PREG_SET_ORDER);

            //var_dump($matches);

            @$dd->loadHTML($html);

            $arrayTags = (!$arrayTags) ? array('og:title', 'og:description', 'og:image', 'og:type') : $arrayTags;

            $arrayMetas = array();
            $i=0;
            foreach($dd->getElementsByTagName('meta') as $meta) {

                $keya = $meta->getAttribute('property');
                $keyb = $meta->getAttribute('name');

                if (in_array($keya, $arrayTags) || in_array($keyb, $arrayTags)) {
                    $key = (!empty($keya)) ? $keya : $keyb;
                    $arrayMetas[$key] = $meta->getAttribute('content');
                }

            }

            return $arrayMetas;

        }

    }

    if (!function_exists('get_data')) {

        function get_html_data($uri) {

            $ckfile = tempnam ("/tmp", "cookie-$uri");

            if (file_exists("/tmp/cookie-$uri")) {

                $ch = curl_init ($uri);
                curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
                $f1 = curl_exec ($ch);

            }

            if (!function_exists('curl_init')){
                die('Curl is not installed!');
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $uri);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $output = curl_exec($ch);
            curl_close($ch);

            /*
            $furi = str_replace("http://","",$uri);
            $furi = str_replace("https://","",$furi);

            exec("wget -o $furi $uri");

            $output = false;
            if (file_exists($furi)) {
                $output = file_get_contents($furi);
                unlink($furi);
            }

            print_r($output);
            exit;
            */
            //$output = file_get_contents($uri);
            //print_r($output);
            //exit;
            return $output;

        }

    }

    // get shell color
    if (!function_exists('getShellColor')) {

        function getShellColor($color) {

            switch($color) {
                case "red":
                    $r[0] = "\033[31m";
                break;
                case "green":
                    $r[0] = "\033[32m";
                break;
                case "blue":
                    $r[0] = "\033[36m";
                break;
                case "cyan":
                    $r[0] = "\033[35m";
                break;
                case "yellow":
                    $r[0] = "\033[33m";
                break;
                case "lgray":
                    $r[0] = "\033[37m";
                break;
            }

            $r[1] = "\033[0m";

            return $r;

        }

    }

    if (!function_exists('echoColor')) {
        function echoColor($msg, $color="green", $break="\n") {

            $color = getShellColor($color);
            echo $color[0] . "$msg" . $break . $color[1];

        }
    }

    if (!function_exists('echoDefault')) {
        function echoDefault($msg, $break="\n") {
            echoColor($msg,"lgray", $break);
        }
    }

?>
