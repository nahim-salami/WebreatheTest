<?php
namespace WebreatheTest\app\interfaces;

interface InterfaceLogin
{
    public function getContent();
    public function getHeader();
    public function getFooter();
    public function initSkin();
    public function enqueueScript();
    public function enqueueStyle();
}
