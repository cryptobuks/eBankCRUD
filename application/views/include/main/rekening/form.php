<div class="row">


</div>

<div class="row" style="padding-top:50px;">
    <div class="col-sm-12 col-lg-8 col-lg-offset-2 ">
        <div class="widget widget-statistic widget-primary">
            <header class="widget-statistic-header">Nomor Rekening :  <?php echo $detailID; ?> </header>
            <div class="widget-statistic-body">
                <span class="widget-statistic-value">Rp. <?php 
                    echo (number_format( $balance+=0, 0 , '' , '.' ) . ',-'); ?></span>
                <span class="widget-statistic-description">Jenis Rekening : <strong><?php switch ($card_type) { case "1" : echo 'Platinum';break; case "2": echo 'Gold';break; case "3": echo 'Silver';break; case "4": echo 'Tabunganku';break; } ?></strong></span>
                <span class="widget-statistic-icon fa fa-credit-card-alt"></span>
            </div>
        </div>
    </div>
</div>