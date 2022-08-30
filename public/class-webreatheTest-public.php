<?php

namespace WebreatheTest\view;

require_once(dirname(__DIR__) . '/includes/skins/default/class-default-skin.php');
require_once(dirname(__DIR__) . '/includes/skins/class-login-skin.php');

use WebreatheTest\skin\DefaultSkin as Skin;
use WebreatheTest\skin\WebreatheTestLogin as ILogin;

class WebreatheTestPublic
{
    public $page;
    public $title;

    public function __construct($title, $page)
    {
        $this->setPage($page);
    }

    public function setPage($page)
    {
        if (is_object($page)) {
            $this->page = $page;
        }
    }

    public function getPage()
    {
        return $this->page;
    }

    public function initSkin()
    {
        switch (strtolower($this->getPage()->name)) {
            case 'login':
                $skin = new ILogin();
                break;
            
            default:
                $skin = new Skin();
                break;
        }
        $skin->setHeaderData($this->getPage());
        $skin->initSkin();
    }
}
