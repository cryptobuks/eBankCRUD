<div class="widget widget-default">
    <header class="widget-header">
        Mutasi Rekening
    </header>
    <div class="widget-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Tanggal</th>
                <th>Mutasi</th>
                <th>Transaksi</th>
                <th>Nominal</th>
            </tr>
            </thead>
            <tbody>

            <?php $idx = 1; foreach ($dataHistory as $line){ ?>

                <tr>
                    <th scope="row"><?php echo $idx; ?></th>
                    <td><?php echo $line->id ?></td>
                    <td><?php echo $line->transact_date; ?></td>
                    <td><?php switch ($line->transact_type){case '0': echo 'Credit'; break; case '1': echo 'Debit';}; ?></td>
                    <td><?php echo $line->transact_name; ?></td>
                    <td><?php echo "Rp. ".number_format($line->transact_nominal).",-"; ?></td>
                </tr>

                <?php $idx += 1; } ?>

            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>Tanggal</th>
                <th>Mutasi</th>
                <th>Transaksi</th>
                <th>Nominal</th>
            </tr>
            </tfoot>
        </table>
        <form class='form-horizontal' target='_blank' method="post" action="<?php echo base_url('index.php/mutasi/makePDF')?>" style="padding-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 col-sm-offset-9 col-xs-4">
                    <button class="btn btn-transparent btn-sm pull-right" type='submit' name='print' >
                        <span class="fa fa-print"></span>
                        <span class="hidden-xs hidden-sm hidden-md">Print</span>
                    </button>
                </div>
                <div class="col-sm-1 col-xs-4">
                    <button class="btn btn-transparent btn-sm pull-right" type='submit' name='simpan' >
                        <span class="fa fa-download"></span>
                        <span class="hidden-xs hidden-sm hidden-md">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
