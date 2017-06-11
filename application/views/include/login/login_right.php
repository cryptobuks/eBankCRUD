<div class="col-md-4 right">
    <div class="col-md-12">
        <div id="loginForm" class="muli">
            <form action="<?php echo base_url('index.php/Login/go'); ?>" method="post">
                <p class="loginText white">Loggin to your Account</p>
                <hr>

                <span class="input input--jiro">
                                        <input class="input__field input__field--jiro" type="text" required name="userid"/>
					                    <label class="input__label input__label--jiro">
						                    <span class="input__label-content input__label-content--jiro">User ID</span>
					                    </label>
                                    </span>

                <span class="input input--jiro">
					                    <input class="input__field input__field--jiro" type="password" required name="password"/>
					                    <label class="input__label input__label--jiro">
						                    <span class="input__label-content input__label-content--jiro" data-content="Password">Password</span>
                                        </label>
				                    </span>

                <div class="loginButtonContainer">
                    <button type="submit" name="submit" class="loginButton"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp&nbsp;LOGIN</button>
                    <span class="smaller" style="padding-left: 10px;"><a href="#" class="aForgot">Forgot Password?</a></span>
                    <?php
                    if($flags == "0"){
                        echo "<p class='wrongIdAlert'>Wrong userid or password</p>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <div id="bottomForm">
        <img src="<?php echo base_url(); ?>assets/imgs/digicert.png" class="certificate">
        <img src="<?php echo base_url(); ?>assets/imgs/norton.png"   class="certificate">
    </div>
</div>