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
        $this->sidebar();
    }

    public function sidebar()
    {
        ?>
            <div class="main-body">
                <main>
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                        <a href="<?=SITE_URL?>/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                        <span class="fs-4">WEBREATHE TEST</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#dashboard"></use></svg>
                                Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                                Module
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                                Add module
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                                Settings
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                                Services
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                                Account
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                                Log out
                                </a>
                            </li>
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

                <div class='main-content'>
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Bookmarks</h6>
                                                <h2>1,410</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-award"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">6% higher than last month</small>
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
                                                <h6>Likes</h6>
                                                <h2>41,410</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-thumbs-up"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">61% higher than last month</small>
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
                                                <h6>Events</h6>
                                                <h2>410</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Events</small>
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
                                                <h6>Comments</h6>
                                                <h2>41,410</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-message-square"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Comments</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8 col-md-12">
                                                <h3 class="card-title">Visitors By Countries</h3>
                                                <div id="visitfromworld" style="width:100%; height:350px"></div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="row mb-15">
                                                    <div class="col-9">India</div>
                                                    <div class="col-3 text-right">28%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-green" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-15">
                                                    <div class="col-9"> UK</div>
                                                    <div class="col-3 text-right">21%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-aqua" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-15">
                                                    <div class="col-9"> USA</div>
                                                    <div class="col-3 text-right">18%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-purple" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-9">China</div>
                                                    <div class="col-3 text-right">12%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
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

    public function getFooter()
    {
    }
}
