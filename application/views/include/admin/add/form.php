<form class="form-horizontal" action="<?php echo base_url('index.php/add/addUser'); ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Informasi Account
                </div>
                <div class="panel-body">
                    <p>Mohon isi data dengan sejujur jujurnya gar tidak terjadi kesalah pahaman</p>

                   <?php if($success == 1){ ?>
                                <span  class='col-sm-12 col-xs-12 text-center' style='padding-bottom: 23px;'>
                                    <h4 style='color: #5bb982;'>
                                     <i class='fa fa-info-circle' aria-hidden='true'>&nbsp</i>
                                     Penambahan User Berhasil &nbsp
                                    <i class='fa fa-info-circle' aria-hidden='true'></i>
                                    </h4>
                                </span>
                    <?php }?>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">User Account</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="userAccount" id="oldEmail" class="form-control" required placeholder="User Login">
                        </div>
                    </div>
                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">User Password</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="password" name="userPassword" class="form-control" required placeholder="User Password">
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">User Detail ID</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="userDetailId" class="form-control" required placeholder="Account ID/ Rekening">
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Informasi Pengguna
                </div>
                <div class="panel-body">
                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">First Name</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="firstName" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Last Name</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="lastName" class="form-control">
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Gender</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="gender" class="form-control" required maxlength="1" style="text-transform: uppercase;" placeholder="L/P">
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Date of Birth</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Phone</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="number" name="phone" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Email</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Address</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">City</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="text" name="city" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Card Type</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="number" name="cardType" class="form-control" required max="3" placeholder="1/2/3">
                        </div>
                    </div>

                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Balance</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="number" name="balance" class="form-control" required max="9999999">
                        </div>
                    </div>


                    <div class=" text-right">
                        <button type="submit" class="btn btn-transparent btn-transparent-primary"><span class="fa fa-user-plus"></span> Add User</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="title"><span class="fa fa-lightbulb-o"></span> Info</h4>
                </div>
                <div class="panel-body">
                    <p align="justify">Pastikan menambahkan user dengan jujur dan sebijak bijaknya.</p>
                </div>
            </div>
        </div>

    </div>
</form>