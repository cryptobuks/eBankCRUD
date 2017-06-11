function generateOTP(){
    $.ajax({url: "http://localhost/index.php/transfer/generateOTP"});
}

function checkOTP(){
    //get entered input otp code
    var entered = $("#inputOTP").val();
    $.post("http://localhost/index.php/transfer/checkOTP",
        {
            otp:entered
        },
        function(response,status){
            //if from controller response = 1 then validated.
            if(response=="1"){
                $("#validateOTPBtn").fadeOut(500);
                $("#validatingBtn").delay(500).fadeIn(500).delay(1500).fadeOut();
                $("#processTransferBtn").delay(3000).fadeIn(500);
            }else {
                alert("SALAH\n\nResponse : " + response);
            }
        });
}