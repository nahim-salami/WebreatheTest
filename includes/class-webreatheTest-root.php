<?php

namespace WebreatheTest;

require dirname(__DIR__) . '/admin/class-webreatheTest-admin.php';
require dirname(__DIR__) . '/public/class-webreatheTest-public.php';

use WebreatheTest\WebreatheTestError as IError;
use WebreatheTest\app\WebreatheTestSession as ISession;
use WebreatheTest\app\WebreatheTestDatabase as IDatabase;
use WebreatheTest\view\WebreatheTestPublic as PublicFront;
use WebreatheTest\view\WebreatheTestAdmin as AdminFront;

/**
 * Gestion du GET et et des différents pages correspondant.
 *
 * @link  http://app.WebreatheTest/
 * @since 1.0.0
 *
 * @package    WebreatheTest
 * @subpackage WebreatheTest/root
 */
class WebreatheTestRoot
{
    public $url;
    protected $plateforme;
    protected $ip;
    private $version;
    private $id;
/**
     * He is the contructor
     *
     * @param  string $id      Page web id.
     * @param  string $version Page web version.
     * @return void;
     */
    public function __construct($id, $version)
    {
        $this->id      = $id;
        $this->version = $version;
    }

    /**
     * Parse and save server data.
     *
     * @param  array $server_data
     * @return void
     */
    public function parseServerData($server_data, $data)
    {
        global $screen, $site_data;
        $site_data = $server_data;
        if (isset($server_data['url'])) {
            $base_url = preg_replace("/localhost\//", "", $server_data['url']);
            $base_url = preg_replace(SITE_URL . "/", "", $base_url);
            $base_url = preg_replace("/\/\//", "/", $base_url);
            
            $base_url = explode($data->index, $base_url);
            if (isset($base_url[0])) {
                $base_url = $base_url[0];
            }

            if (strlen($base_url) > 1) {
                $base_url = preg_replace("[/$]", "", $base_url);
            }

            // Affichage des documents html, css, js, ts, xml.
            if (1 === preg_match('/.js|.css|.html|.ts|.xml$/', $base_url)) {
                $fileUrl = dirname(__DIR__, 1) . $base_url;
                if (file_exists($fileUrl)) {
                    echo file_get_contents($fileUrl);
                    return;
                }
            }
        
            $base_url = preg_replace("/" . $server_data['query'] . "/", "", $base_url);
            $base_url = preg_replace("/[?&,!*`+²@<>$^#%)(\"_°]/", "", $base_url);
            $base_url = preg_replace("/^\//", "", $base_url);

            if(isset($_POST) && isset($_POST['nonce_field'])) {
                var_dump($_POST);
            }

            if (in_array($base_url, $data->url->public->index, true)) {
                $page   = (array) $data->url->public->page;
                if (!isset($page[ $base_url ])) {
                    $base_url = '/';
                }
                $screen = new PublicFront($page[ $base_url ]->title, $page[ $base_url ]);
            } elseif (in_array($base_url, $data->url->admin->index, true)) {
                $page   = (array) $data->url->admin->page;
                if (!isset($page[ $base_url ])) {
                    $base_url = '/';
                }

                if (!ISession::get('session-start')) {
                    $screen = new AdminFront($page[ $base_url ]->title, $page[ $base_url ]);
                } else {
                    header("location:". SITE_URL . '/login');
                }
            } else {
                echo IError::triggerError("404");
            }

            $this->setUrl($server_data['url']);
            if (isset($server_data['plateforme']) && ! empty($server_data['plateforme'])) {
                $this->setPlateforme($server_data['plateforme']);
            } else {
                $this->setPlateforme(false);
            }
        } else {
            $this->setUrl(false);
        }
    }

    public static function start()
    {
        global $screen, $site_data;
        ISession::init();
        $db = new IDatabase();
        $site_data['db'] = $db;

        if (!$db->initDb()) {
            IError::triggerError("bd");
        } elseif (method_exists($screen, "initSkin")) {
            $screen->initSkin();
        }

        session_write_close();
    }

    /**
     * Set url path.
     *
     * @param  string $url
     * @return void
     */
    private function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Set plateforme name.
     *
     * @param  string $plateforme
     * @return void
     */
    private function setPlateforme($plateforme)
    {
        $this->plateforme = $plateforme;
    }

    /**
     * Get web site version.
     *
     * @param  void
     * @return string $version
     */
    public function getVersion()
    {
        return $this->version;
    }
}
