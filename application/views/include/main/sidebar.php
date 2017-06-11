<section class="sidebar-user-panel">
    <div id="user-panel-slide-toggleable" style="text-align: center;">
        <div class="profile">
            <img src="<?php echo base_url(); ?>assets/imgs/user.jpg" class="userImage" alt="Users">
        </div>
        <span class="user-panel-logged-in-text" style="color: #5bb982;">
                            <span class="fa fa-circle-o text-success user-panel-status-icon"></span>
                            Logged in as <strong><?php echo $fullname; ?></strong>
                        </span>
    </div>
</section>

<ul class="sidebar-nav">
    <li class="sidebar-nav-heading">Menu</li>

    <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "") {echo "active";} ?>  ">
        <a href="<?php if(($this->uri->segment(1)) == ""){echo "#";} else echo base_url('index.php/');  ?>">
            <span class="typcn typcn-home sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "") {echo "-active";} ?>"></span> Dashboard
        </a>
    </li>

    <?php if($admin != 1) {?>

        <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "transfer") {echo "active";} ?>">
            <a href="<?php if(($this->uri->segment(1)) == "transfer"){echo "#";} else echo base_url('index.php/transfer');  ?>">
                <span class="typcn typcn-arrow-forward sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "transfer") {echo "-active";} ?>"></span> Transfer
            </a>
        </li>

    <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "pembayaran") {echo "active";} ?>">
        <a href="<?php if(($this->uri->segment(1)) == "pembayaran"){echo "#";} else echo base_url('index.php/pembayaran');  ?>">
            <span class="typcn typcn-arrow-shuffle sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "pembayaran") {echo "-active";} ?>"></span> Pembayaran
        </a>
    </li>
    
    <li class="sidebar-nav-link sidebar-nav-link-group <?php if(($this->uri->segment(1)) == "rekening" || ($this->uri->segment(1)) == "mutasi") {echo "active open";} ?>">
        <a data-subnav-toggle>
            <span class="typcn typcn-info-large sidebar-nav-link-logo"></span> Informasi Rekening
            <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
            <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
        </a>
            <ul class="sidebar-nav">
                <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "rekening") {echo "active";} ?>">
                    <a href="<?php if(($this->uri->segment(1)) == "rekening"){echo "#";} else echo base_url('index.php/rekening');  ?>">
                        <span class="typcn typcn-sort-numerically sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "rekening") {echo "-active";} ?>"></span> Informasi Saldo
                    </a>
                </li>
                <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "mutasi") {echo "active";} ?>">
                    <a href="<?php if(($this->uri->segment(1)) == "mutasi"){echo "#";} else echo base_url('index.php/mutasi');  ?>">
                        <span class="typcn typcn-th-list sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "mutasi") {echo "-active";} ?>"></span> Mutasi Rekening
                    </a>
                </li>
            </ul>
    </li>
    
    <li class="sidebar-nav-link sidebar-nav-link-group <?php if(($this->uri->segment(1)) == "administrasi" || ($this->uri->segment(1)) == "administrasipin") {echo "active open";} ?>">
        <a data-subnav-toggle>
            <span class="typcn typcn-document sidebar-nav-link-logo"></span> Administrasi
            <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
            <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
        </a>
            <ul class="sidebar-nav">
                <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "administrasi") {echo "active";} ?>">
                    <a href="<?php if(($this->uri->segment(1)) == "administrasi"){echo "#";} else echo base_url('index.php/administrasi');  ?>">
                        <span class="typcn typcn-document-text sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "administrasi") {echo "-active";} ?>"></span> Ubah Email
                    </a>
                </li>
                <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "administrasipin") {echo "active";} ?>">
                    <a href="<?php if(($this->uri->segment(1)) == "administrasipin"){echo "#";} else echo base_url('index.php/administrasipin');  ?>">
                        <span class="typcn typcn-key sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "administrasi-pin") {echo "-active";} ?>"></span> Ubah Pin
                    </a>
                </li>
            </ul>
    </li>
    <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "history") {echo "active";} ?>">
        <a href="<?php if(($this->uri->segment(1)) == "history"){echo "#";} else echo base_url('index.php/history');  ?>">
            <span class="typcn typcn-time sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "history") {echo "-active";} ?>"></span> History
        </a>
    </li>
    <?php } else { ?>

    <li class="sidebar-nav-link <?php if(($this->uri->segment(1)) == "add") {echo "active";} ?>">
        <a href="<?php if(($this->uri->segment(1)) == "add"){echo "#";} else echo base_url('index.php/add');  ?>">
            <span class="typcn typcn-user-add sidebar-nav-link-logo<?php if(($this->uri->segment(1)) == "add") {echo "-active";} ?>"></span> Add User
        </a>
    </li>

    <?php } ?>
</ul>