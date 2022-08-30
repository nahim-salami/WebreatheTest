<?php

namespace WebreatheTest\app;

use WebreatheTest\app\WebreatheTestPersonne as Personne;

/**
 * WebreatheTest user.
 */
class WebreatheTestUser extends Personne
{
    private $password;
    private $username;
    private $userid;

    public function __construct($username, $password)
    {
        $this->setUserName($username);
        $this->setPassword($password);
    }

    public static function getPersonne()
    {
        return parent;
    }

    public function setUserName($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getName()
    {
        global $site_data;
        @$db = $site_data['db']->getDb();
        return $this->name;
    }

    public function getIpAdress()
    {
        return $this->ipAddress;
    }

    public function getUserId()
    {
        
    }

    private function setID()
    {

    }
}
