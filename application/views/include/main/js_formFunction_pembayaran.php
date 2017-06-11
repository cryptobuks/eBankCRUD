<script>
//unrealBots.2017
    $(document).ready(function() {
        var selectOptionDaftar    = $("#valueselectdaftar");
        var optBtn                = $("#otpBtn");
        var otpInput              = $("#inputOTP");
        var inputAccountNumber    = $("#accountNumber");
        var checkSaveNumber       = $("#checkSaveAccount");
        var checkSaveNumberFlag   = 0;
        var checkDaftarPembayaran = $("#checkDaftar");

        var formSelectOption      = $("#formSelectOption");
        var formNominal           = $("#formNominal").hide();
        var flagWarningNumber     = 0; // if 0 can pass
        var flagWarningNumberNot  = 1; // if 0 can pass
        var flagBalanceWarning    = 1; //if 0 can pass
        var textWarningNumber     = $("#textWarningNumber").hide();
        var textWarningNumberNot  = $("#textWarningNumberNot").hide();
        var textWarning           = $("#textWarning").hide();
        var balanceWarning        = $("#balanceWarning").hide();
        var formOTP_Confirmation  = $("#formOTP_Confirmation").hide();
        var checkNominalBtn       = $("#checkNominalBtn");
        var backtoOptionBtn       = $("#backtoOptionBtn");
        var backToNominalBtn      = $("#backToNominalBtn");

        //disable validate button
        //if send otp button clicked will not disabled
        var validateOTPBtn        = $("#validateOTPBtn").prop('disabled', true);

        //validating button hiden, will reveal after validate butto finished
        var validatingBtn         = $("#validatingBtn").hide();

        //hide process transfer button in last form
        //if ajax response ok then this button will appear
        var processTransferBtn    = $("#processTransferBtn").hide();

        //logic if saveAccount or Not
        var updateCheckBox = function () {
            if (checkDaftarPembayaran.is(":checked")){
                inputAccountNumber.prop('disabled', 'disabled');
                checkSaveNumber.prop('disabled', 'disabled');
                selectOptionDaftar.prop('disabled', false);
                checkSaveNumber.prop('checked', false);
            } else {
                flagWarningNumber = 0;
                inputAccountNumber.prop('disabled', false);
                checkSaveNumber.prop('disabled', false);
                selectOptionDaftar.prop('disabled', 'disabled');
            }
        };
        checkDaftarPembayaran.change(updateCheckBox);


        var saveAccountChecked = function(){
            if(checkSaveNumber.is(":checked")){
                checkSaveNumberFlag = 1;
            }else {
                checkSaveNumberFlag = 0;
            }
        };
        checkSaveNumber.change(saveAccountChecked);


        //logic to open new form after select option
        $("#valueselect").change(function () {
            var selected = $("#valueselect option:selected").text();
            $("html, body").animate({ scrollTop: $("#footerInvisible").offset().top}, 1500);
            formSelectOption.fadeOut(500);
            formNominal.delay(500).fadeIn(500);
            $('#headerSelected').text(selected);
            $("#hiddenType").val(selected);

            //prevent alphabet-,. on input
            $(function(){$('#accountNumber').keypress(function(e){
                if( e.which == 48 ||
                    e.which == 49 ||
                    e.which == 50 ||
                    e.which == 51 ||
                    e.which == 52 ||
                    e.which == 53 ||
                    e.which == 54 ||
                    e.which == 55 ||
                    e.which == 56 ||
                    e.which == 57){
                } else return false;});
            });
            $(function(){$('#nominal').keypress(function(e){
                if( e.which == 48 ||
                    e.which == 49 ||
                    e.which == 50 ||
                    e.which == 51 ||
                    e.which == 52 ||
                    e.which == 53 ||
                    e.which == 54 ||
                    e.which == 55 ||
                    e.which == 56 ||
                    e.which == 57){
                } else return false;});
            });

            textWarning.hide();
        });

        $("#nominal").focusout(function () {
            var balance = $("#nominal").val();

            $.post("http://localhost/index.php/transfer/checkBalance",
                {
                    number:balance
                },
                function(response,status){
                    if(response == 0){
                        flagBalanceWarning = 1;
                        $("#balanceWarning").fadeIn(500);
                    } else {
                        flagBalanceWarning = 0;
                        $("#balanceWarning").fadeOut(500);
                    }
                });

        });

        //logic check must not transfer to itself
        //logic check transfer to crud Account,     account number must exist
        //logic check transfer not to crud Account, account number must not exist
        inputAccountNumber.focusout(function () {
            var selected = $("#valueselect option:selected").text();
            if((selected == "Pembayaran Internet" || selected == "Pembayaran Kartu Kredit" || selected == "Pembayaran Telepon") && (inputAccountNumber.val() != "") ){
                $.post("http://localhost/index.php/pembayaran/checkNumberExist",
                    {number:inputAccountNumber.val()},
                    function(response){
                        if(response=="1"){
                            textWarningNumberNot.delay(500).fadeIn(500);
                            flagWarningNumberNot = 1;
                        }else {
                            textWarningNumberNot.fadeOut(500);
                            flagWarningNumberNot = 0;
                        }
                    });
            }
        });

        //if checkbox daftar checked
        var daftarCheck = function(){
            if(checkDaftarPembayaran.is(":checked")){
                inputAccountNumber.val("");
                textWarningNumberNot.delay(200).fadeOut(500);
                textWarningNumber.delay(700).fadeIn(500);
                flagWarningNumber    = 1;
                flagWarningNumberNot = 0;
                textWarningNumberNot.fadeOut(500);
            }else {
                selectOptionDaftar.val("N/A");
                inputAccountNumber.val("");
                textWarningNumber.fadeOut(500);
                textWarningNumberNot.fadeOut(500);
            }
        };
        checkDaftarPembayaran.change(daftarCheck);


        //logic check if every option selected
        selectOptionDaftar.change(function (){
            $("#valueselectdaftar option[value='N/A']").remove();
            textWarningNumber.fadeOut(500);
            var selected = $("#valueselect option:selected").text();
            if((selected == "Pembayaran Internet" || selected == "Pembayaran Kartu Kredit" || selected == "Pembayaran Telepon")){
                $.post("http://localhost/index.php/pembayaran/checkNumberExist",
                    {number:selectOptionDaftar.val()},
                    function(response){
                        if(response=="1"){
                            textWarningNumberNot.delay(500).fadeIn(500);
                            flagWarningNumberNot = 1;
                        }else {
                            textWarningNumberNot.fadeOut(500);
                            flagWarningNumberNot = 0;
                            flagWarningNumber    = 0;
                        }
                    });

            }
    });

        //logic back button on nominal form clicked
        backtoOptionBtn.click(function () {
            //clear form if back to selection
            $("#accountNumber").val('');
            $("#nominal").val('');
            $("#valueselect").val("N/A");
            selectOptionDaftar.val("N/A");
            checkDaftarPembayaran.prop('checked', false);
            inputAccountNumber.prop('disabled', false);
            checkSaveNumber.prop('disabled', false);
            checkSaveNumber.prop('checked', false);
            selectOptionDaftar.prop('disabled', 'disabled');
            textWarningNumber.hide();
            textWarningNumberNot.hide();

            formNominal.fadeOut(500);
            formSelectOption.delay(500).fadeIn(500);
        });

        //logic lanjut button on nominal form clicked
        checkNominalBtn.click(function () {

            //determine which accountNumber selected
            var accountNumber ='';
            if (checkDaftarPembayaran.is(":checked")){
                     accountNumber    = $("#valueselectdaftar option:selected").text();
            } else   accountNumber    = $("#accountNumber").val();

            //refer to nominal form
            var nominal               = $("#nominal").val();

            //refer to confirmation form
            var accountNumberTo       = $("#accountNumberTo");
            var ownNumberTo           = $("#ownNumberTo");
            var nominalTo             = $("#nominalTo");
            var descriptionTo         = $("#descriptionTo");

            //ajax to get fullname
            //if to crud bank get fullname from ajax
            var selected = $("#valueselect option:selected").text();
            ownNumberTo.text(selected);

            //set confirmation input as user input
            accountNumberTo.text(accountNumber);
            nominalTo.text("Rp. "+ Number(nominal).toLocaleString()+",-");

            //logic if forms are empty OR accountNumberTo not exist OR transfer to itself then show warning
            if((selected == "Pembayaran Internet" || selected == "Pembayaran Kartu Kredit" || selected == "Pembayaran Telepon") && flagBalanceWarning == 1){
                balanceWarning.fadeTo('slow', 0.0).delay(200)
                    .fadeTo('slow', 1).delay(200)
                    .fadeTo('slow', 0.0).delay(200)
                    .fadeTo('slow', 1).delay(200);
            }else
            if((selected == "Pembayaran Internet" || selected == "Pembayaran Kartu Kredit" || selected == "Pembayaran Telepon") && (accountNumber == "" || nominal == "")){
                textWarning.fadeTo('slow', 0.0).delay(200)
                    .fadeTo('slow', 1).delay(200)
                    .fadeTo('slow', 0.0).delay(200)
                    .fadeTo('slow', 1).delay(200);
            }else
            if(accountNumber != "" && nominal != "" && flagWarningNumberNot == 1){
                textWarning.fadeOut(500);
                textWarningNumberNot.fadeTo('slow', 0.0).delay(200)
                    .fadeTo('slow', 1).delay(200)
                    .fadeTo('slow', 0.0).delay(200)
                    .fadeTo('slow', 1).delay(200);
            }else
            if((accountNumber != "" && nominal != "") && flagWarningNumber == 1){
                if(flagWarningNumber == 1){
                    textWarning.fadeOut(500);
                    textWarningNumber.fadeTo('slow', 0.0).delay(200)
                        .fadeTo('slow', 1).delay(200)
                        .fadeTo('slow', 0.0).delay(200)
                        .fadeTo('slow', 1).delay(200);
                }
            }
            else {
                formNominal.fadeOut(500);
                formOTP_Confirmation.delay(500).fadeIn(500);
            }
        });

        //logic back button on confirmation form clicked
        backToNominalBtn.click(function () {
            $("#valueselectdaftar option[value='N/A']").remove();
            formOTP_Confirmation.fadeOut(500);
            formNominal.delay(500).fadeIn(500);
            textWarning.hide();
        });

        //logic otp button clicked
        optBtn.click(function () {
            backToNominalBtn.prop('disabled', 'disabled');
            setTimeout(function () {
                optBtn.prop("disabled", true);
                optBtn.html("<i class='fa fa-clock-o'>&nbsp&nbsp</i>Send In 5");
            },200);
            setTimeout(function () {
                optBtn.html("<i class='fa fa-clock-o'>&nbsp&nbsp</i>Send In 4");
            },1000);
            setTimeout(function () {
                optBtn.html("<i class='fa fa-clock-o'>&nbsp&nbsp</i>Send In 3");
            },2000);
            setTimeout(function () {
                optBtn.html("<i class='fa fa-clock-o'>&nbsp&nbsp</i>Send In 2");
            },3000);
            setTimeout(function () {
                optBtn.html("<i class='fa fa-clock-o'>&nbsp&nbsp</i>Send In 1");
            },4000);

            setTimeout(function () {
                //after 5seconds
                //otp button text sent, input otp can keypressed
                //validate button not disabled, input otp change placeholder
                optBtn.html("<i class='fa fa-paper-plane'>&nbsp</i>OTP Sent !");
                $("#validateOTPBtn").prop('disabled', false);
                otpInput.attr('placeholder', 'Input 5 digit OTP code');
                otpInput.prop('onkeydown', true);
            },5000);
        });


        //save account number to db
        processTransferBtn.click(function () {
            if(checkSaveNumberFlag == 1){
                $.post("http://localhost/index.php/pembayaran/saveAccountNumber",
                    {number:inputAccountNumber.val()}
                );
            }
        });

    });
</script>