<?php

try {
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'error.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'includes/class-webreatheTest-session.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'admin/class-module.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'includes/functions.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'includes/class-webreatheTest-table.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'includes/class-webreatheTest-database.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'includes/class-webreatheTest-form-control.php';
    require dirname(__DIR__) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . 'includes/class-webreatheTest-root.php';
} catch (\Exception $th) {
    $logs_src = __DIR__ . "/errorlogs.breathe";
    if (DISPLAY_ERROR) {
        trigger_error("Une erreur s'est produite. Contacter l'administrateur du site. " . $th);
    }

    $error_time = date("y-m-d H:i:s");
    $file_data = file_get_contents($logs_src);
    file_put_contents($logs_src, $file_data . "  " . $error_time . "  " . $th);
    exit;
}
