<?php
/**
 * Contacte la class root.
 *
 * @author Nahim SALAMI <nahim.salami@outlook.fr>
 */

define("SITE_DIRECTORY_NAME", "WebreatheTest");
define("COOKIE_DOMAIN", "WebreatheTest");
define("SITE_DOMAIN", "WebreatheTest");
define("SITE_URL", "/webreathetest");
define("DISPLAY_ERROR", true);
define("DIR_SEPARATOR", "/");
define("COOKIEPATH", '/');

// Database require informations.
define("DATABASE_NAME", "WebreatheTest");
define("DATABASE_HOST", "localhost");
define("DATABASE_PASSWORD", "root");
define("DATABASE_USERNAME", "root");

require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'require-file.php';
use WebreatheTest\WebreatheTestRoot as Root;

try {
    $remote_data = array(
        'host'       => filter_input(INPUT_SERVER, 'HTTP_HOST'),
        'url'        => filter_input(INPUT_SERVER, 'REQUEST_URI'),
        'ip'         => filter_input(INPUT_SERVER, 'REMOTE_ADDR'),
        'query'      => filter_input(INPUT_SERVER, 'QUERY_STRING'),
        'method'     => filter_input(INPUT_SERVER, 'REQUEST_METHOD'),
        'plateforme' => filter_input(INPUT_SERVER, 'HTTP_SEC_CH_UA_PLATFORM'),
    );

    $json_file = __DIR__ . '/WebreatheTest.json';

    global $json_data;

    $json_data = getJsonFileData($json_file);

    if ($json_data) {
        $root = new Root($json_data->name, $json_data->version);
    } else {
        $root = new Root('WebreatheTest', '1.0');
    }

    $root->parseServerData($remote_data, $json_data);

    $root::start();
} catch (\Throwable $th) {
    $logs_src = __DIR__ . "/errorlogs.breathe";
    if (DISPLAY_ERROR) {
        trigger_error("Une erreur s'est produite. Contacter l'administrateur du site. " . $th);
    }

    $error_time = date("y-m-d H:i:s");
    $file_data = file_get_contents($logs_src);
    
    if (!empty($file_data)) {
        $file_data .= "\n\n";
    }

    $file_data .= $error_time . "  " . $th;
    file_put_contents($logs_src, $file_data);
    exit;
}
