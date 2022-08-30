<?php

/**
 * Gestion des sessions de l'application.
 *
 * @author Nahim SALAMI <nahim.salami@outlook.fr>
 * @link http://app.WebreatheTest
 * @version 1.0.0
 * @package WebreatheTest
 * @subpackage WebreatheTest/Session
 */

namespace WebreatheTest\app;

if (!defined("WEBREATHE_TEST_SESSION_PUBLIC_KEY")) {
    define("WEBREATHE_TEST_SESSION_PUBLIC_KEY", sha1("WebreatheTest-session-public"));
}

if (!defined("WEBREATHE_TEST_SESSION_ADMIN_KEY")) {
    define("WEBREATHE_TEST_SESSION_ADMIN_KEY", sha1("WebreatheTest-session-admin"));
}

if (!defined("WEBREATHE_TEST_SESSION_SERVICE_KEY")) {
    define("WEBREATHE_TEST_SESSION_SERVICE_KEY", sha1("WebreatheTest-session-service"));
}

class WebreatheTestSession
{
    
    public static function init()
    {
        if (session_status() !== 2) {
            session_start();
        }

        $_SESSION[WEBREATHE_TEST_SESSION_PUBLIC_KEY]  = array();
        $_SESSION[WEBREATHE_TEST_SESSION_ADMIN_KEY]   = array();
        $_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY] = array();

        $_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY][md5("session-start")] = true;
    }

    /**
     * Get session value.
     *
     * @param string|int $key
     * @param integer $level
     * @return bool|array|string|int|float
     */
    public static function get($key, $level = 0)
    {
        self::start();
        $owner = self::getLevelValue($level);
        return (isset($_SESSION[$owner][md5($key)])) ? unserialize($_SESSION[$owner][md5($key)]) : false;
    }

    private static function getLevelValue($level)
    {
        switch ($level) {
            case 0:
                $value = WEBREATHE_TEST_SESSION_PUBLIC_KEY;
                break;
            case 1:
                $value = WEBREATHE_TEST_SESSION_ADMIN_KEY;
                break;
            case 2:
                $value = WEBREATHE_TEST_SESSION_SERVICE_KEY;
                break;
            default:
                $value = WEBREATHE_TEST_SESSION_PUBLIC_KEY;
                break;
        }

        return $value;
    }

    /**
     * Set session value
     *
     * @param string|int $key
     * @param bool|array|string|int|float $value
     * @param integer $level
     * @return void
     */
    public static function set($key, $value, $level = 0)
    {
        self::start();
        $owner = self::getLevelValue($level);
        $_SESSION[$owner][md5($key)] = serialize($value);
    }

    /**
     * Start session.
     *
     * @return void
     */
    public static function start()
    {
        if (session_status() !== 2) {
            session_start();
        }

        if (!isset($_SESSION[WEBREATHE_TEST_SESSION_PUBLIC_KEY])) {
            $_SESSION[WEBREATHE_TEST_SESSION_PUBLIC_KEY] = array();
        }

        if (!isset($_SESSION[WEBREATHE_TEST_SESSION_ADMIN_KEY])) {
            $_SESSION[WEBREATHE_TEST_SESSION_ADMIN_KEY] = array();
        }

        if (!isset($_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY])) {
            $_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY] = array();
        }

        $_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY][md5("session-start")] = true;
    }

    /**
     * Stop all session
     *
     * @return void
     */
    public static function stopAll()
    {
        if (session_status() === 2) {
            $_SESSION[WEBREATHE_TEST_SESSION_PUBLIC_KEY]  = array();
            $_SESSION[WEBREATHE_TEST_SESSION_ADMIN_KEY]   = array();
            $_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY] = array();
            session_destroy();
        }
    }

    /**
     * Stop session.
     *
     * @param string|int $key
     * @param integer $level
     * @return void
     */
    public static function stop($key, $level = 0)
    {
        self::start();
        $owner = self::getLevelValue($level);
        unset($_SESSION[$owner][$key]);
        $_SESSION[WEBREATHE_TEST_SESSION_SERVICE_KEY][md5("session-start")] = false;
    }

    /**
     * Get if session is start.
     *
     * @param string|integer $key
     * @param integer $level
     * @return boolean
     */
    public static function isStart($key, $level = 0)
    {
        self::start();
        $owner = self::getLevelValue($level);
        return (isset($_SESSION[$owner][md5($key)])) ? true : false;
    }
}
