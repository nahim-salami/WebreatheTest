<?php
namespace WebreatheTest\view;

require_once(dirname(__DIR__) . '/includes/skins/admin/class-admin-skin.php');

use WebreatheTest\skin\WebreatheTestAdminSkin as Skin;

class WebreatheTestAdmin
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
        global $skin;
        $skin = new Skin();
        // switch (strtolower($this->getPage()->name)) {
        //     case 'dashboard':
        //         $skin = new ILogin();
        //         break;

        //     case 'services':
        //         $skin = new ISignUp();
        //         break;
            
        //     default:
        //        var_dump("in")
        //         break;
        // }
        $skin->setHeaderData($this->getPage());
        $this->getContent();
    }

    public function getHeader()
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
                        baseSrc = '/webreathetest/admin',
                        libBaseSrc = '/webreathetest/lib',
                        production = location.hostname === 'docs.angularjs.org',
                        headEl = document.getElementsByTagName('head')[0],
                        sync = true;
                
                    addTag('base', {href: baseUrl});       
                    addTag('link', {rel: 'stylesheet', href: libBaseSrc + '/bootstrap/dist/css/bootstrap.min.css', type: 'text/css'});
                    addTag('link', {rel: 'stylesheet', href: libBaseSrc + '/bootstrap/dist/css/bootstrap.icon.css', type: 'text/css'});
                    addTag('link', {rel: 'stylesheet', href: baseSrc + '/css/webreatheTest-admin.css', type: 'text/css'});
                    addTag('script', {src: libBaseSrc + '/jquery-3.6.0.js' }, sync);
                    addTag('script', {src: libBaseSrc + '/bootstrap/dist/js/bootstrap.min.js' }, sync);
                    addTag('script', {src: baseSrc + '/js/webreatheTest-admin.js' }, sync);
                
                
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

    public function getMeta()
    {
        ?>
            <link rel="icon" href="">
            <meta lang="fr">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Site web de monitoring de modules IOT." />
            <meta name="theme-color" content="white"/>
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
            <meta name="apple-mobile-web-app-title" content="">
            <meta name="msapplication-TileImage" content="">
            <meta name="msapplication-TileColor" content="#fff">   
        <?php
    }

    public function getContent()
    {
        global $skin;

        ob_start();
        ?>
        <html lang="fr">
            <head>
                <title><?= $this->getPage()->title ?> | WebreatheTest</title>
                <?php
                    $this->getMeta();
                    $this->enqueueScript();
                ?>
            </head>
            <body>
                <?php
                    $skin->getHeader();
                    $skin->getContent();
                    $skin->getFooter();
                ?>
            </body>
        </html>
        <?php
        echo ob_get_clean();
    }
}
