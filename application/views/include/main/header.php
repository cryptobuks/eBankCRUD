<header class="top-header">
    <a href="<?php echo base_url(); ?>" class="top-header-logo">
        <img src="<?php echo base_url(); ?>assets/imgs/logo.png" style="width: 170px;">
    </a>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-sidebar-toggle" data-toggle-sidebar>
                    <span class="typcn typcn-arrow-left visible-sidebar-sm-open"></span>
                    <span class="typcn typcn-arrow-right visible-sidebar-sm-closed"></span>
                    <span class="typcn typcn-arrow-left visible-sidebar-md-open"></span>
                    <span class="typcn typcn-arrow-right visible-sidebar-md-closed"></span>
                </button>
            </div>
            <ul class="nav navbar-nav navbar-right" data-dropdown-in="flipInX" data-dropdown-out="zoomOut">
                <li class="hidden-sm hidden-xs hidden-md"><a href="#" >Welcome to <strong class="welcome">CRUD Bank</strong></a></li>
                <li><a href="<?php echo base_url('index.php/main/logout') ?>"><span class="typcn typcn-power"></span> <span class="hidden-sm hidden-xs">Log out</span></a></li>
            </ul>
        </div>
    </nav>
</header>