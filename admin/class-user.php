<?php

namespace WebreatheTest\app;

define("SITE_DIRECTORY_NAME", "WebreatheTest");
define("DIR_SEPARATOR", "/");
require dirname(__DIR__, 2) . DIR_SEPARATOR . SITE_DIRECTORY_NAME . DIR_SEPARATOR . '/require-file.php';
abstract class WebreatheTestUser
{
    private $userId;
    private $name;
    private $firstname;
    private $username;
    private $email;
    private $addresse;
    private $school;
    private $orientation;
    private $sex;
    public function __construct($userId)
    {
        $this->setUserId($userId);
    }

    public function setUserId($id)
    {
        $this->userId = $id;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
