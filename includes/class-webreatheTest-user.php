<?php

namespace WebreatheTest\app;

use WebreatheTest\app\WebreatheTestPersonne as Personne;
use WebreatheTest\app\WebreatheTestSession as ISession;

/**
 * WebreatheTest user.
 */
class WebreatheTestUser extends Personne
{
    private $password;
    private $username;
    private $userid;
    public $db;
    public $url = SITE_URL . '/login';
    private $error;
    private $connect = false;

    public function __construct($username, $password, $req = "register")
    {
        global $site_data;
        $this->db = $site_data['db']->getDb();
        $errorMsg = '';

        if ('register' === $req) {
            if ($this->verifyString($username, 24) && $this->verifyString($password, 64)) {
                if (!$this->checkUserExist($username)) {
                    $queryuser = 'INSERT INTO users(nom) VALUES(:nom)';
                    $requestuser = $this->db->prepare($queryuser);
        
                    $requestuser->execute([
                        ':nom' => $username
                    ]);
        
                    $query = 'INSERT INTO account(account_type, username, user_password, date_creation, users_id) 
                    VALUES(:account_type, :username, :user_password, :date_creation, :users_id)';
                    $request = $this->db->prepare($query);
        
                    $request->execute([
                        ':account_type' => 'simple',
                        ':username' => $username,
                        ':user_password' => md5($password),
                        ':date_creation' => date("Y-m-d"),
                        ':users_id' => $this->db->lastInsertId()
                    ]);
        
                    $this->setID($this->db->lastInsertId());
                    $this->setUserName($username);
                    $this->setPassword($password);
                    ISession::set('accountid', $username, 2);
                    ISession::set('accountKey', $password, 2);
                    $this->url = SITE_URL . '/dashboard';
                    $this->connect = true;
                } else {
                    $errorMsg = "L'utilisateur existe déjà. veuillez vous connecter";
                }
            } else {
                $errorMsg = "Size exiced";
            }
        } else {
            if ($this->checkUserExist($username)) {
                $request = 'SELECT * from account WHERE user_password = ?';
                $request = $this->db->prepare($request);
                $request->execute([md5($password)]);
                $result = $request->fetchAll();
                if (count($result) > 0) {
                    ISession::set('accountid', $username, 2);
                    ISession::set('accountKey', $password, 2);
                    ISession::set('accountSession', 'start', 2);
                    $this->url = SITE_URL . '/dashboard';
                    $this->connect = true;
                }
            }
        }
    
        $this->error = $errorMsg;
    }

    public function isLogin() {
        return $this->connect;
    }

    public function getErrorMsg()
    {
        return $this->error;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function checkUserExist($username)
    {
        $request = 'SELECT * from account WHERE username = ?';
        $request = $this->db->prepare($request);
        $request->execute([$username]);
        $result = $request->fetchAll();
        return (count($result) > 1) ? true : false ;
    }

    public function generate_id()
    {
        $id = '';
        for ($i = 0; $i < 6; $i++) {
            $id .= random_int(0, 9);
        }
        return (int) $id;
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
        return $this->id;
    }

    private function setID($id)
    {
        $this->id = $id;
    }
}
