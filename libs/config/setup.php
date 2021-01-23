<?php

if (!$env) { $rpath="../"; } else { $rpath = ""; };

# config vars
$config = json_decode(file_get_contents($rpath.'settings.json', true), true);

# Basic Rapid Environment
require_once($rpath."libs/_bare.php");
$__bare = new Bare($config);

# snippets
require_once($rpath."libs/helpers/snippets.php");

if (!file_exists($rpath.'settings.json')) { exit("Please! Create your settings file."); }

# load plugins
$__bare->load('plugins', 'colors', $rpath.'libs/plugins/colors', true);
$__bare->load('plugins', 'logs', $rpath.'libs/plugins/logs', true);
$__bare->load('plugins', 'processes', $rpath.'libs/plugins/processes', true);

# libraries
$__bare->extended = new stdClass;

# -- ENCODING
require_once($rpath."libs/extended/encoding.php");
$__bare->extended->encoding = new Encoding();

# -- SIMPLE HTML DOM
require_once($rpath."libs/extended/simple_html_dom.php");

# -- SMART
if (defined('SMART_API_USER')) {

    define('API_USER', SMART_API_USER);
    define('API_KEY', SMART_API_KEY);
    define('API_SCHEMA', SMART_API_SCHEMA);
    define('API_APP', SMART_API_APP);
    define('URL_BASE', SMART_API_URL_BASE);
    define('API_URL', SMART_API_URL);

    require_once($rpath."libs/extended/smartapi.php");
    $__bare->extended->smartapi = new SMARTAPI();

}

?>
