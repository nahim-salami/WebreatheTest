<?php

namespace WebreatheTest\app;

abstract class WebreatheTestTable
{
    /**
     * Objet PDO (Base de donnée).
     *
     * @var object
     */
    private $db;

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function initTable()
    {
        $user = "CREATE TABLE IF NOT EXISTS users (
            users_id int(6) NOT NULL,
            prenom varchar(24) NOT NULL,
            nom varchar(24) NOT NULL,
            adresse varchar(64) NULL,
            mail varchar(64) NOT NULL,
            tel varchar(14) NOT NULL,
            date_naissance DATE NOT NULL,
            account_id int(10) NULL,
            card_id int(24),
            user_ifu int(32),
            PRIMARY KEY (users_id)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci";

        $db = $this->db;
        try {
            // if (method_exists($db, "query")) {
            //     $db->query($client);
            // }
        } catch (\Throwable $th) {
            $logs_src = dirname(__DIR__, 2) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . '/errorlogs.imo';
            if (DISPLAY_ERROR) {
                trigger_error("Une erreur s'est produite. Contacter l'administrateur du site. " . $th);
            }
        
            $error_time = date("y-m-d H:i:s");
            $file_data = file_get_contents($logs_src);
            file_put_contents($logs_src, $file_data . "  " . $error_time . "  " . $th);
        }

    }

    public function getUserTable()
    {
    }

    public function getProductTable()
    {
    }

    public function getServiceTable()
    {
    }
}
