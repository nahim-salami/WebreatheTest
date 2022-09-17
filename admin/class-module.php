<?php

namespace WebreatheTest\app;

class WebreatheTestModule
{
    private $nom;
    private $data;
    private $db;


    public static function getTemperature()
    {
        $deg = random_int(-100, 100);
        return $deg - 33;
    }

    public static function getVitesse()
    {
        $deg = random_int(-100, 100);
        return abs($deg - 33);
    }

    public static function getTailleDonne()
    {
        $data = random_int(0, 1024);
        return abs((int) (self::getTemperature() * $data / 1024));
    }

    public function getModuleData()
    {
       
    }
}
