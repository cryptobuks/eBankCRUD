<!-- Form Selection -->
<div id='spacetop' class='space' style='padding-top: 10vh; transition: 0.4s; transition-timing-function: ease-in;'></div>


<!-- Form Transaksi Status-->
<div class='row'>
    <div class='col-lg-6 col-lg-offset-3 col-xs-12'>
                <!-- Form Bukti Transaksi -->
        <div class='widget widget-default'>
            <header class='widget-header'>Transaksi Suskes - Bukti Transaksi</header>
            <div class='widget-body'>
                <form class='form-horizontal' target='_blank' method="post" action="<?php echo base_url('index.php/buktiTr/makePDF');?>" >
                    <p>Catat Nomor Referensi Sebagai Bukti Transaksi Anda</p>
                    <div class='form-group'>
                        <label class='col-sm-5 col-xs-6 control-label'><b>Tanggal:</b></label>
                        <div class='col-sm-7' col-xs-6>
                            <p class='form-control-static' id='tgl'><?php echo $dataHistory->transact_date; ?></p>
                        </div>

                        <label class='col-sm-5 col-xs-6 control-label'><b>Jam:</b></label>
                        <div class='col-sm-7' col-xs-6>
                            <p class='form-control-static' id='jam'><?php echo $dataHistory->transact_time; ?></p>
                        </div>

                        <label class='col-sm-5 col-xs-6 control-label'><b>Nomor Referensi:</b></label>
                        <div class='col-sm-7' col-xs-6>
                            <p class='form-control-static' id='noreff'><?php echo $dataHistory->id; ?></p>
                        </div>

                        <label class='col-sm-5 col-xs-6 control-label'><b>Transfer ke Rekening:</b></label>
                        <div class='col-sm-7 col-xs-6'>
                            <p class='form-control-static' id='accountNumberTo'><?php echo $dataHistory->transact_rek; ?></p>
                        </div>

                        <label class='col-sm-5 col-xs-6 control-label'><?php if($exist == 2){echo "Pembayaran: ";} else echo "Nama Penerima:"; ?></label>
                        <div class='col-sm-7 col-xs-6'>
                            <p class='form-control-static' id='ownNumberTo'>
                                <?php
                                if($exist == 1){
                                    echo $dataHistory->first_name . ' ' . $dataHistory->last_name;
                                }else if($exist == 2){
                                    echo $type;
                                } else{
                                    echo "Rekening Bank Lain";
                                }
                                ?>
                            </p>
                        </div>

                        <label class='col-sm-5 col-xs-6 control-label'>Jumlah Pembayaran:</label>
                        <div class='col-sm-7 col-xs-6'>
                            <p class='form-control-static' id='nominalTo'>Rp. <?php echo $dataHistory->transact_nominal; ?></p>
                        </div>

                        <?php if($exist != 2){ echo " ?>
                        <label class='col-sm-5 col-xs-6 control-label'>Berita:</label>
                        <div class='col-sm-7 col-xs-6'>
                            <p class='form-control-static' id='descriptionTo'><?php echo $dataHistory->transact_desc; ?></p>
                        </div>
                        <?php ";} ?>

                        <label class='col-sm-5 col-xs-6 control-label'>Status:</label>
                        <div class='col-sm-7 col-xs-6'>
                            <p class='form-control-static' id='status'><?php echo $dataHistory->transact_status; ?></p>
                        </div>
                    </div>
                    <input type='hidden' name='reffid' value='<?php echo $dataHistory->id; ?>'>

                    <div class="col-sm-12 col-xs-12">
                        <div class="col-sm-2 col-xs-4">
                            <a href="<?php echo base_url() . 'index.php/history' ?>" class="btn btn-transparent btn-sm" type='button' >
                                <span class="fa fa-chevron-left"></span>
                                <span class="hidden-xs hidden-sm hidden-md">Kembali</span>
                            </a>
                        </div>
                        <div class="col-sm-2  col-sm-offset-6 col-xs-4">
                            <button class="btn btn-transparent btn-sm pull-right" type='submit' name='print' >
                                <span class="fa fa-print"></span>
                                <span class="hidden-xs hidden-sm hidden-md">Print</span>
                            </button>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                            <button class="btn btn-transparent btn-sm pull-right" type='submit' name='simpan' >
                                <span class="fa fa-download"></span>
                                <span class="hidden-xs hidden-sm hidden-md">Simpan</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>