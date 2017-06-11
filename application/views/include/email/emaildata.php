<tr>
    <td align="left" valign="top" style="padding-top: 23px; padding-right: 30px; background-color: #f7f7f7; padding-bottom: 0; padding-left: 30px; font-size:26px ; line-height: 34px; text-transform: uppercase; color:#1f2122; font-family: Helvetica,sans-serif; ">
        Halo, <?php echo $fullName."!" ?>
    </td>
</tr>
<tr>
    <td align="left" valign="top" style="padding-top: 4px; background-color: #f7f7f7; padding-right: 30px; padding-bottom: 0; padding-left: 30px; font-size:16px ; color:#999b9e; font-family: Arial,sans-serif; line-height: 24px; ">
        Terimakasih telah menggunakan layanan e-banking CRUD BANK.<br>
        Berikut detail transaksi Anda:  <br><br>
        <b>Nomor Referensi:         </b> <?php echo $refid ?><br>
        <b>Tanggal:         </b>         <?php echo $date ?><br>
        <b>Jam:</b>                      <?php echo $time ?><br>
        <b>Transfer ke Rekening:</b>     <?php echo $numberTo ?><br>
        <b>Nama Penerima:</b>            <?php echo $ownTo ?><br>
        <b>Jumlah Pembayaran:</b>        <?php echo "Rp. ".$nominal.",-" ?><br>
        <b>Berita:</b>                   <?php echo $desc ?><br>
    </td>
</tr>