<!-- Form Selection -->
<div id="spacetop" class="space" style="padding-top: 10vh; transition: 0.4s; transition-timing-function: ease-in;"></div>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-xs-12">
        <div class="widget widget-default" id="formSelectOption">
            <header class="widget-header">
                Pilih Jenis Transfer
            </header>
            <div class="widget-body">
                <form>
                    <div class="form-group">
                        <select id="valueselect" class="form-control" >
                            <option value="N/A">N/A</option>
                            <option value="Transfer ke Rekening CRUD">Transfer ke Rekening CRUD</option>
                            <option value="Transfer ke Rekening Bank Lain">Transfer ke Rekening Bank Lain</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Form Nominal & OTP-->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-xs-12">
        <form id="ehe" class="form-horizontal" action="<?php echo base_url('index.php/transactSuccess'); ?>" method="post">

            <!-- Form Nominal -->
            <div class="widget widget-default" id="formNominal">
                <header class="widget-header">
                    <span id="headerSelected">Jquery In Action</span>
                    <input type="hidden" value="" id="hiddenType" name="transactType">
                </header>
                <div class="widget-body">
                    <div class="form-group">
                        <label class="col-sm-12 control-label" style="text-align: left">Silahkan pilih Rekening Tujuan</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Pihak Ketiga</label>
                        <div class="col-sm-9">
                            <input type="text" id="accountNumber" name="creditNumber" class="form-control" placeholder="Masukan Nomor Rekening Pihak Ketiga" required maxlength="10">
                            <div style="text-align: right;">
                                <label class="icheck-label">
                                    <input type="checkbox" name="checkSaveNumber" id="checkSaveAccount"> &nbspSimpan ke daftar pembayaran
                                </label>
                            </div>
                        </div>
                        <span id="textWarningNumber" class="col-sm-12 col-xs-12 text-center" style="padding-bottom: 20px;">
                            <h5 style="color: #5bb982;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true">&nbsp</i>
                                Account Number not exist&nbsp
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            </h5>
                        </span>
                        <span id="textWarningNumberNot" class="col-sm-12 col-xs-12 text-center" style="padding-bottom: 20px;">
                            <h5 style="color: #5bb982;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true">&nbsp</i>
                                Pilih Menu: Transfer ke Rekening CRUD Untuk Transfer Ke sesama Rekening CRUD&nbsp
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            </h5>
                        </span>
                        <span id="textWarningItself" class="col-sm-12 col-xs-12 text-center" style="padding-bottom: 20px;">
                            <h5 style="color: #5bb982;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true">&nbsp</i>
                                Tidak dapat melakukan transaksi ke nomor rekening sendiri&nbsp
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            </h5>
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Daftar Pembayaran</label>
                        <div   class="col-sm-1" style="margin-top: 6px;">
                            <input id="checkDaftar" type="checkbox">
                        </div>
                        <div class="col-sm-8">
                            <select name="selectedNumber" id="valueselectdaftar" class="form-control" disabled>
                                <option value='N/A'>N/A</option>
                                <?php foreach ($save as $line){
                                    echo "<option value='$line->target_account'>$line->target_account</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="text" id="nominal" name="nominal" class="form-control nominals" placeholder="Masukan Nominal yang akan dibayar" required="true" maxlength="7">
                        </div>
                        <span id="balanceWarning" class="col-sm-12 col-xs-12 text-center" style="padding-bottom: 20px;">
                            <h5 style="color: #5bb982;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true">&nbsp</i>
                                Saldo Tidak Cukup&nbsp
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            </h5>
                        </span>


                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Berita</label>
                        <div class="col-sm-9">
                            <input type="text" id="description" name="description" class="form-control" placeholder="Masukan keterangan transfer" maxlength="30">
                        </div>
                    </div>
                    <span id="textWarning" class="col-sm-12 col-xs-12 text-center" style="padding-bottom: 20px;">
                        <h4 style="color: #5bb982;">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true">&nbsp</i>
                            Mohon lengkapi form yang kosong&nbsp
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        </h4>
                    </span>
                    <div class="col-sm-6 col-xs-6" style="text-align: left">
                        <button type="button" id="backtoOptionBtn" class="btn btn-transparent btn-transparent">
                            <i class="fa fa-chevron-left" aria-hidden="true">&nbsp</i>Kembali
                        </button>
                    </div>
                    <div class="col-sm-6 col-xs-6" style="text-align: right">
                        <button type="button" id="checkNominalBtn" class="btn btn-transparent btn-transparent">
                           Lanjutkan&nbsp<i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="formOTP_Confirmation">
                <!-- Form Konfirmasi -->
                <div class="widget widget-default">
                    <header class="widget-header">Konfirmasi Transfer</header>
                    <div class="widget-body">
                        <form class="form-horizontal">
                            <p>Konfirmasi Data Transfer Anda</p>
                            <div class="form-group">
                                <label class="col-sm-5 col-xs-6 control-label"><b>Dari Rekening:</b></label>
                                <div class="col-sm-7" col-xs-6>
                                    <p class="form-control-static" id="fromNumber"><?php echo $detailID; ?></p>
                                </div>
                                <label class="col-sm-5 col-xs-6 control-label"><b>Transfer ke Rekening:</b></label>
                                <div class="col-sm-7 col-xs-6">
                                    <p class="form-control-static" id="accountNumberTo"></p>
                                </div>
                                <label class="col-sm-5 col-xs-6 control-label">Nama Penerima:</label>
                                <div class="col-sm-7 col-xs-6">
                                    <p class="form-control-static" id="ownNumberTo">Tommy Miyazaki</p>
                                </div>
                                <label class="col-sm-5 col-xs-6 control-label">Jumlah Pembayaran:</label>
                                <div class="col-sm-7 col-xs-6">
                                    <p class="form-control-static" id="nominalTo">Rp. 400000</p>
                                </div>
                                <label class="col-sm-5 col-xs-6 control-label">Berita:</label>
                                <div class="col-sm-7 col-xs-6">
                                    <p class="form-control-static" id="descriptionTo">Pembayaran konser Young Lex</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Form OTP-->
                <div class="widget widget-default" style="height: 180px;">
                    <header class="widget-header">
                        One Time Password
                    </header>
                    <div class="widget-body col-sm-12 col-xs-12" >
                        <div class="col-sm-3 col-xs-6">
                            <!-- calling ajax -->
                            <button id="otpBtn" type="button" class="btn btn-transparent btn-transparent" style="transition: 1s; transition-timing-function: ease-in;"
                                    onclick="generateOTP();">
                                <i class="fa fa-paper-plane" aria-hidden="true">&nbsp</i>Send OTP
                            </button>
                        </div>
                        <div class="col-sm-9 col-xs-6">
                            <input type="password" id="inputOTP" class="form-control" name="otpCode" placeholder="Press Send OTP Button" maxlength="5" required onkeydown="return false">
                        </div>
                    </div>
                    <div class="widget-body col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-sm-6 col-xs-6" style="text-align: left;">
                            <button id="backToNominalBtn" type="button" class="btn btn-transparent btn-transparent">
                                <i class="fa fa-chevron-left" aria-hidden="true">&nbsp</i>Kembali
                            </button>
                        </div>
                        <div class="col-sm-6 col-xs-6" style="text-align: right;">
                            <!-- calling ajax -->
                            <button type="button" id="validateOTPBtn" onclick="checkOTP();" class="btn btn-transparent btn-transparent">
                                Validate&nbsp<i class="fa fa-key" aria-hidden="true"></i>
                            </button>

                            <button type="button" id="validatingBtn" class="btn btn-transparent btn-transparent" readonly>
                                Validating&nbsp<i class="fa fa-refresh fa-spin fa-fw"" aria-hidden="true"></i>
                            </button>

                            <button type="submit" id="processTransferBtn" class="btn btn-transparent btn-transparent">
                                    Process&nbsp<i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>