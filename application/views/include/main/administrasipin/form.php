<form class="form-horizontal" action="<?php echo base_url('index.php/administrasipin/changePassword'); ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Informasi PIN
                </div>
                <div class="panel-body">
                    <p>PIN digunakan untuk masuk kedalam CRUD BANK</p>
                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">PIN Lama</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="password" name="oldPassword" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">PIN Baru</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="password" name="newPassword" class="form-control" required>
                        </div>
                    </div>
                    <?php
                        if($flagPassword == 0){
                            echo "
                             <span  class='col-sm-12 col-xs-12 text-center' style='padding-bottom: 20px;'>
                            <h4 style='color: #5bb982;'>
                                <i class='fa fa-exclamation-triangle' aria-hidden='true'>&nbsp</i>
                                PIN Lama yang di masukan Salah&nbsp
                                <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                            </h4>
                        </span>
                            ";
                        }else if($flagPassword == 1){
                            echo "
                                <span  class='col-sm-12 col-xs-12 text-center' style='padding-bottom: 20px;'>
                                    <h4 style='color: #5bb982;'>
                                     <i class='fa fa-info-circle' aria-hidden='true'>&nbsp</i>
                                     PIN Berhasil Diubah&nbsp<script>setTimeout(function(){window.location.href = 'http://localhost/index.php/main/logout'}, 1500);</script>
                                    <i class='fa fa-info-circle' aria-hidden='true'></i>
                                    </h4>
                                </span>";
                        }
                    ?>


                    <div class=" text-right">
                        <button type="submit" class="btn btn-transparent btn-transparent-primary"><span class="fa fa-share"></span> Update PIN</button>
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
                    <p align="justify">Pastikan anda selalu mengingat PIN anda yang telah anda ubah. PIN berfungsi sebagai password untuk masuk kedalam CRUD BANK.</p>
                </div>
            </div>
        </div>

    </div>
</form>