<div class="page-logo" style="width: 220px;">
    <a href="<?php echo base_url("assets/dist/") ?>#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
        <img src="<?php echo base_url("assets/dist/") ?>img/logo.png" style="width: 40px" alt="SmartAdmin WebApp" aria-roledescription="logo">
        <span class="page-logo-text mr-1">IoT WebApp</span>
        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
    </a>
</div>
<!-- BEGIN PRIMARY NAVIGATION -->
<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="<?php echo base_url("assets/dist/") ?>#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="info-card">
        <img src="<?php echo base_url("assets/dist/") ?>img/avatars/<?php echo $this->session->userdata('foto') ?>" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
        <div class="info-card-text">
            <a href="<?php echo base_url("assets/dist/") ?>#" class="d-flex align-items-center text-white">
                <span class="text-truncate text-truncate-sm d-inline-block">
                <?php echo $this->session->userdata('nama') ?>
                </span>
            </a>
            <span class="d-inline-block text-truncate text-truncate-sm"><?php echo $this->session->userdata('position') ?></span>
        </div>
        <img src="<?php echo base_url("assets/dist/") ?>img/card-backgrounds/cover.jpg" width="250" class="cover" alt="cover">
        <a href="<?php echo base_url("assets/dist/") ?>#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
            <i class="fal fa-angle-down"></i>
        </a>
    </div>
    <ul id="js-nav-menu" class="nav-menu">
        <li class="nav-title">Home</li>
        <li>
            <a href="<?php echo base_url("dashboard") ?>" title="" data-filter-tags="">
                <i class="fal fa-window"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()."location-list" ?>" title="" data-filter-tags="">
                <i class="fal fa-map"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Location List</span>
            </a>
        </li>
        
        <li class="nav-title">Main Menu</li>
        <li>
            <a href="#" title="UI Components" data-filter-tags="ui components">
                <i class="fal fa-filter"></i>
                <span class="nav-link-text" data-i18n="nav.ui_components">Jabodetabek</span>
            </a>
            <ul>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >DKI Jakarta</span>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo base_url("dkiallchart") ?>" title="Alerts">
                                <span class="nav-link-text">All Chart</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("assets/dist/") ?>" title="Alerts">
                                <span class="nav-link-text">Jakarta Pusat</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("assets/dist/") ?>" title="Alerts">
                                <span class="nav-link-text">Jakarta Barat</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("assets/dist/") ?>" title="Alerts">
                                <span class="nav-link-text">Jakarta Selatan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("assets/dist/") ?>" title="Alerts">
                                <span class="nav-link-text">Jakarta Timur</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >Bogor</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >Depok</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >Tanggerang</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" title="UI Components" data-filter-tags="ui components">
                <i class="fal fa-bullseye"></i>
                <span class="nav-link-text" data-i18n="nav.ui_components">Sumatra Barat</span>
            </a>
            <ul>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >DKI Jakarta</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >Bogor</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" title="UI Components" data-filter-tags="ui components">
                <i class="fal fa-flask"></i>
                <span class="nav-link-text" data-i18n="nav.ui_components">Jawa Barat</span>
            </a>
            <ul>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >DKI Jakarta</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Alerts">
                        <span class="nav-link-text" >Bogor</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-title">Settings</li>
        <li>
            <a href="#" title="UI Components" data-filter-tags="ui components">
                <i class="fal fa-id-card"></i>
                <span class="nav-link-text" data-i18n="nav.ui_components">Manage Access</span>
            </a>
        </li>
        <li>
            <a href="#" title="UI Components" data-filter-tags="ui components">
                <i class="fal fa-user"></i>
                <span class="nav-link-text" data-i18n="nav.ui_components">Profile</span>
            </a>
        </li>
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
<!-- END PRIMARY NAVIGATION -->
<!-- NAV FOOTER -->
<div class="nav-footer">
    <a href="<?php echo base_url("assets/dist/") ?>#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
        <i class="ni ni-chevron-right"></i>
        <i class="ni ni-chevron-right"></i>
    </a>
    <ul class="list-table nav-footer-buttons fixed-bottom" style="padding-left: 60px;">
        <li>
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                <i class="fal fa-comments"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                <i class="fal fa-life-ring"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                <i class="fal fa-phone"></i>
            </a>
        </li>
    </ul>
</div> <!-- END NAV FOOTER -->