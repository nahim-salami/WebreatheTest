<?php

namespace WebreatheTest\skin;

require_once(dirname(__DIR__, 3) . '/view/interface-public-skin.php');

use WebreatheTest\app\interfaces\PublicSkin as Skin;

class DefaultSkin implements Skin
{
    private $header;

    public function setHeaderData($data)
    {
        $this->header = $data;
    }

    public function initSkin()
    {
        global $site_data;

        ob_start();
        ?>
        <html>
            <head>
                <title><?= $this->header->title ?> | WebreatheTest</title>
            </head>
            <body>
                <ul>
                    <li>
                        <a href="<?=SITE_URL?>">Home</a>
                    </li>
                    <li>
                        <a href="<?=SITE_URL?>/login">Login</a>
                    </li>
                    <li>
                        <a href="<?=SITE_URL?>/help">Help</a>
                    </li>
                </ul>
            </body>
        </html>
        <?php
        echo ob_get_clean();
    }

    public function getContent()
    {
    }

    public function getHeader()
    {
    }

    public function getFooter()
    {
    }

    public function enqueueScript()
    {
    }

    public function enqueueStyle()
    {
    }
}
