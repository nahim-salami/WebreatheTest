<?php
namespace WebreatheTest\app\interfaces;

interface Admin
{    
    public function getContent();
    public function getHeader();
    public function getFooter();
    public function initSkin();
    public function enqueueScript();
    public function enqueueStyle();
    public function displayStarts();
}
