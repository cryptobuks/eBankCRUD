<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
    <head>
        <title>CRUD Bank - Login Page</title>

        <?php echo $cdn; ?>
        <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
        <?php echo $style_login; ?>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <?php echo $login_left ?>
                    <?php echo $login_right ?>

                </div>
            </div>
        </div>
        <?php echo $login_script ?>
    </body>
</html>
