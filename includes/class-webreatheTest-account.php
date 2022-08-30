<?php
namespace WebreatheTest\app;

use WebreatheTest\app\WebreatheTestUser as User;

/**
 * WebreatheTest Account.
 */
class WebreatheTestAccount extends User
{
    private string $name;
    private string $username;

    public function getUsername()
    {
        return $this->username;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIpQdress()
    {
        return $this->ipAddress;
    }
}
