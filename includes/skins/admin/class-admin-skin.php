<?php

namespace WebreatheTest\skin;

require_once(dirname(__DIR__, 3) . '/view/interface-admin.php');

use WebreatheTest\app\interfaces\InterfaceAdmin as Skin;

class WebreatheTestAdminSkin implements Skin
{
    private $data;

    public function setHeaderData($data)
    {
        $this->data = $data;
    }

    public function getContent()
    {
        ?>
        <?php
    }

    public function getHeader()
    {
        ?>
            <div class="main-body">
                <?php
                $this->navBar();
                switch ($this->data->title) {
                    case 'Dashboard':
                        $this->dashboard();
                        break;
                    case 'Module':
                        $this->module();
                        break;
                    case 'Manage':
                        echo 'Manage';
                        break;
                    case 'Account':
                        echo 'Account';
                        break;
                    default:
                        $this->dashboard();
                        break;
                }
                ?>

             </div>
        <?php
    }

    public function navBar()
    {
        global $json_data;
        $page = (array) $json_data->url->admin->page;
        $url  = (array) $json_data->url->admin->index;
        ?>
          <main>
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                    <a href="<?=SITE_URL?>/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">WEBREATHE TEST</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <?php
                        foreach ($page as $key => $screen) {
                            ?>
                                    <li class="nav-item">
                                        <a href="<?= SITE_URL . $key ?>" class="nav-link <?= ($screen->title === $this->data->title) ? 'active' : '' ?>" aria-current="<?= ($screen->title === $this->data->title) ? 'page' : '' ?>">
                                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#dashboard"></use></svg>
                                        <?= $screen->title ?>
                                        </a>
                                    </li>
                                <?php
                        }
                        ?>
                        
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://avatars.githubusercontent.com/u/28982089?s=70&v=20" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>&nbsp;&nbsp;&nbsp;Alamou</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </main>
        <?php
    }

    public function dashboard()
    {
        ?>
            <div class='main-content'>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Module</h6>
                                            <h2>1,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-award"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Délai d'actualisation 600ms</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Module en cours</h6>
                                            <h2>14</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-thumbs-up"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Délai d'actualisation 400ms</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Module inactif</h6>
                                            <h2>2</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-calendar"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Délai d'actualisation 800ms</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Santé</h6>
                                            <h2>2 erreurs</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-message-square"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Une action est recommandé</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-xl-4 col-md-6">
                        <div class="card latest-update-card">
                            <div class="card-header">
                                <h3>Latest Activity</h3>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                        <li><i class="ik ik-minus minimize-card"></i></li>
                                        <li><i class="ik ik-x close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="scroll-widget">
                                    <div class="latest-update-box">
                                        <div class="row pt-20 pb-30">
                                            <div class="col-auto text-right update-meta pr-0">
                                                <i class="b-primary update-icon ring"></i>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="#!"><h6>Devlopment &amp; Update</h6></a>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, <a href="#!" class="text-blue"> More</a></p>
                                            </div>
                                        </div>
                                        <div class="row pb-30">
                                            <div class="col-auto text-right update-meta pr-0">
                                                <i class="b-primary update-icon ring"></i>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="#!"><h6>Showcases</h6></a>
                                                <p class="text-muted mb-0">Lorem dolor sit amet, <a href="#!" class="text-blue"> More</a></p>
                                            </div>
                                        </div>
                                        <div class="row pb-30">
                                            <div class="col-auto text-right update-meta pr-0">
                                                <i class="b-success update-icon ring"></i>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="#!"><h6>Miscellaneous</h6></a>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit ipsum amet, <a href="#!" class="text-green"> More</a></p>
                                            </div>
                                        </div>
                                        <div class="row pb-30">
                                            <div class="col-auto text-right update-meta pr-0">
                                                <i class="b-primary update-icon ring"></i>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="#!"><h6>Showcases</h6></a>
                                                <p class="text-muted mb-0">Lorem dolor sit amet, <a href="#!" class="text-blue"> More</a></p>
                                            </div>
                                        </div>
                                        <div class="row pb-30">
                                            <div class="col-auto text-right update-meta pr-0">
                                                <i class="b-success update-icon ring"></i>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="#!"><h6>Miscellaneous</h6></a>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit ipsum amet, <a href="#!" class="text-green"> More</a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto text-right update-meta pr-0">
                                                <i class="b-danger update-icon ring"></i>
                                            </div>
                                            <div class="col pl-5">
                                                <a href="#!"><h6>Your Manager Posted.</h6></a>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, <a href="#!" class="text-red"> More</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    public function module()
    {
        ?>
            <div class='main-content'>
                <div class="container-fluid">
                <div class="col-xl-12 col-md-8">
                    <div class="card table-card">
                            <div class="card-header">
                                <h3>Liste des modules</h3>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                        <li><i class="ik ik-minus minimize-card"></i></li>
                                        <li><i class="ik ik-x close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nom du module</th>
                                                <th>Type de module</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Date de création</th>
                                                <th>Dernière utilisation</th>
                                                <th>Auteur</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>HeadPhone</td>
                                                <td><img src="../img/widget/p1.jpg" alt="" class="img-fluid img-20"></td>
                                                <td>
                                                    <div class="p-status bg-green"></div>
                                                </td>
                                                <td>$10</td>
                                                <td>
                                                    <a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Iphone 6</td>
                                                <td><img src="/lib/img/widget/p2.jpg" alt="" class="img-fluid img-20"></td>
                                                <td>
                                                    <div class="p-status bg-green"></div>
                                                </td>
                                                <td>$20</td>
                                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Jacket</td>
                                                <td><img src="../img/widget/p3.jpg" alt="" class="img-fluid img-20"></td>
                                                <td>
                                                    <div class="p-status bg-green"></div>
                                                </td>
                                                <td>$35</td>
                                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Sofa</td>
                                                <td><img src="../img/widget/p4.jpg" alt="" class="img-fluid img-20"></td>
                                                <td>
                                                    <div class="p-status bg-green"></div>
                                                </td>
                                                <td>$85</td>
                                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Iphone 6</td>
                                                <td><img src="../img/widget/p2.jpg" alt="" class="img-fluid img-20"></td>
                                                <td>
                                                    <div class="p-status bg-green"></div>
                                                </td>
                                                <td>$20</td>
                                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    public function getFooter()
    {
    }
}
