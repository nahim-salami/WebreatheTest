<?php

namespace WebreatheTest\skin;

require_once(dirname(__DIR__, 2) . '/view/interface-public-skin.php');

use WebreatheTest\app\interfaces\PublicSkin as Skin;

class WebreatheTestSignUp implements Skin
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
        <html lang="fr">
            <head>
                <title><?= $this->data->title ?> | WebreatheTest</title>
                <?php
                    $this->getMeta();
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
        ?>
            <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <h3>Vous êtes nouveau</h3>
                            <p>Rejoignez WEBREATHE</p>
                            <form action="<?=SITE_URL?>/control" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="johndoe@admin.com" required="" value="">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" required="" value="123456">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm password" required="" value="123456">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;J'accepte les termes et conditions</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Creer le compte</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Vous avez un compte? <a href="<?=SITE_URL?>/login">Connectez vous</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    public function getHeader()
    {
        ?>
            
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
                        libBaseSrc = '/webreathetest/lib',
                        production = location.hostname === 'docs.angularjs.org',
                        headEl = document.getElementsByTagName('head')[0],
                        sync = true;
                
                    addTag('base', {href: baseUrl});       
                    addTag('link', {rel: 'stylesheet', href: libBaseSrc + '/bootstrap/dist/css/bootstrap.min.css', type: 'text/css'});
                    addTag('link', {rel: 'stylesheet', href: libBaseSrc + '/bootstrap/dist/css/bootstrap.icon.css', type: 'text/css'});
                    addTag('link', {rel: 'stylesheet', href: baseSrc + '/css/default-skin.css', type: 'text/css'});
                    addTag('link', {rel: 'stylesheet', href: baseSrc + '/css/login.css', type: 'text/css'});
                    addTag('script', {src: libBaseSrc + '/jquery-3.6.0.js' }, sync);
                    addTag('script', {src: libBaseSrc + '/bootstrap/dist/js/bootstrap.min.js' }, sync);
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
}
