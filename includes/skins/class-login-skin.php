<?php

namespace WebreatheTest\skin;

require_once(dirname(__DIR__, 2) . '/view/interface-public-skin.php');

use WebreatheTest\app\interfaces\PublicSkin as Skin;

class WebreatheTestLogin implements Skin
{
    private $data;

    public function setHeaderData($data)
    {
        $this->data = $data;
    }

    public function initSkin()
    {
        global $site_data;

        ob_start();
        ?>
        <html>
            <head>
                <title><?= $this->data->title ?></title>
                <?php
                    $this->enqueueScript();
                ?>
            </head>
            <body>
                <?php
                    $this->getHeader();
                    $this->getContent();
                    $this->getFooter();
                ?>
            </body>
        </html>
        <?php
        echo ob_get_clean();
    }

    public function getMeta()
    {
        ?>
            <link rel="manifest" href="/manifest.json">
            <link rel="icon" href="img/n.png">
            <meta lang="fr">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />  
            <meta name="description" content="" />
            <meta name="theme-color" content="white"/>
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
            <meta name="apple-mobile-web-app-title" content="Dada">
            <meta name="msapplication-TileImage" content="img/n.png">
            <meta name="msapplication-TileColor" content="#fff">   
        <?php
    }

    public function getContent()
    {
        ?>
            <form action="" method="post">
                <div>
                    <label for="webreathetest-login">Login</label>
                    <input type="text" name="" id="webreathetest-login">
                </div>
                <div>
                    <label for="webreathetest-password">Password</label>
                    <input type="password" name="" id="webreathetest-password">
                </div>
            </form>
        <?php
    }

    public function getHeader()
    {
        ?>
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
        <?php
    }

    public function getFooter()
    {
    }

    public function enqueueScript()
    {
        ?>
            <script type="text/javascript">
                (function() {
                    var indexFile = (location.pathname.match(/\/(index[^\.]*\.html)/) || ['', ''])[1],
                        rUrl = /(#!\/|api|guide|misc|tutorial|error|index[^\.]*\.html).*$/,
                        baseUrl = location.href.replace(rUrl, indexFile),
                        baseSrc = '/webreathetest/includes/skins/default',
                        production = location.hostname === 'docs.angularjs.org',
                        headEl = document.getElementsByTagName('head')[0],
                        sync = true;
                
                    addTag('base', {href: baseUrl});       
                    addTag('link', {rel: 'stylesheet', href: baseSrc + '/css/default-skin.css', type: 'text/css'});
                    addTag('script', {src: baseSrc + '/js/default-skin.js' }, sync);
                
                
                    function addTag(name, attributes, sync) {
                        var el = document.createElement(name),
                            attrName;
                
                        for (attrName in attributes) {
                        el.setAttribute(attrName, attributes[attrName]);
                        }
                
                        sync ? document.write(outerHTML(el)) : headEl.appendChild(el);
                    }
                
                    function outerHTML(node){
                        return node.outerHTML || (
                            function(n){
                                var div = document.createElement('div'), h;
                                div.appendChild(n);
                                h = div.innerHTML;
                                div = null;
                                return h;
                            })(node);
                    }
                })();
            
            </script>

        <?php
    }

    public function enqueueStyle()
    {
        
    }
}
