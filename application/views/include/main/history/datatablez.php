<div class="widget widget-default">
    <header class="widget-header">
        History Transaksi
    </header>
    <div class="widget-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Transaksi</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Rekening Tujuan</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php $idx = 1; foreach ($dataHistory as $line){ ?>

                <tr>
                    <th scope="row"><?php echo $idx; ?></th>
                    <td><?php echo $line->transact_date; ?></td>
                    <td><?php echo $line->transact_time; ?></td>
                    <td><?php echo $line->transact_name; ?></td>
                    <td><?php echo $line->transact_desc; ?></td>
                    <td><?php echo "Rp. ".number_format($line->transact_nominal).",-"; ?></td>
                    <td><?php echo $line->transact_rek; ?></td>
                    <td><?php switch ($line->transact_status){case '1': echo 'Success'; break; } ?></td>
                    <td class="text-right">
                        <form method='post' action="buktiTr">
                            <input type='hidden' name='reffid' value='<?php echo $line->id; ?>'>
                            <button class="btn btn-transparent btn-xs" type='submit' name='view'>
                                <span class="fa fa-pencil"></span>
                                <span class="hidden-xs hidden-sm hidden-md">View</span>
                            </button>
                        </form>
                    </td>
                </tr>

                <?php $idx += 1; } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Transaksi</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Rekening Tujuan</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
