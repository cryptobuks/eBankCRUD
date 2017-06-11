<form class="form-horizontal" action="<?php echo base_url('index.php/administrasi/changeEmail'); ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Informasi Email
                </div>
                <div class="panel-body">
                    <p>Alamat email digunakan untuk mengirim bukti transaksi setelah anda melakukan transaksi</p>
                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Email Lama</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="email" name="oldEmail" id="oldEmail" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group margin-top-15">
                        <label class="col-sm-2 col-xs-12 control-label">Email Baru</label>
                        <div class="col-sm-10 col-xs-12">
                            <input type="email" name="newEmail" class="form-control" required>
                        </div>
                    </div>
                    <?php
                        if($flagEmail == 0){
                            echo "
                             <span  class='col-sm-12 col-xs-12 text-center' style='padding-bottom: 20px;'>
                            <h4 style='color: #5bb982;'>
                                <i class='fa fa-exclamation-triangle' aria-hidden='true'>&nbsp</i>
                                Email Lama yang di masukan Salah&nbsp
                                <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                            </h4>
                        </span>
                            ";
                        }else if($flagEmail == 1){
                            echo "
                                <span  class='col-sm-12 col-xs-12 text-center' style='padding-bottom: 20px;'>
                                    <h4 style='color: #5bb982;'>
                                     <i class='fa fa-info-circle' aria-hidden='true'>&nbsp</i>
                                     Email Berhasil Diubah&nbsp
                                    <i class='fa fa-info-circle' aria-hidden='true'></i>
                                    </h4>
                                </span>";
                        }
                    ?>


                    <div class=" text-right">
                        <button type="submit" class="btn btn-transparent btn-transparent-primary"><span class="fa fa-share"></span> Update email</button>
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
                    <p align="justify">Pastikan anda selalu mengingat email anda yang telah anda ubah. Emali berfungsi sebagai pengiriman bukti transaksi yang anda lakukan.</p>
                </div>
            </div>
        </div>

    </div>
</form>