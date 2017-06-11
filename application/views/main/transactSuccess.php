<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CRUD BANK - Bukti Transaksi</title>
        <?php echo $cdn; ?>
    </head>
    <body>
        <?php echo $style; ?>
        <div class="wrapper">
            <div class="page-wrapper">

                <aside class="left-sidebar">
                    <?php echo $sidebar; ?>
                    
                </aside>

                <?php echo $header ?>

                <div class="content-wrapper">
                    <div class="content-dimmer"></div>
                    <div class="container-fluid">
                        <?php echo $basicInfo; ?>

                        <!--       Main Content Goes Here       -->

                        <?php echo $successForm; ?>


                        <!--       Main Content Ends Here       -->

                        <?php echo $footer; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php echo $bottom_cdn; ?>
    </body>
</html>
