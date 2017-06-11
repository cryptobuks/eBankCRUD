    <script src="<?php echo base_url(); ?>assets/js/varello-theme.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dropdown.js"></script>
        <script>
            var myVar = setInterval(function() {
                time();
            }, 1000);

            function time() {
                var d = new Date();
                document.getElementById("clock").innerHTML = d.toLocaleTimeString();
            }

            (function greeting(){
                var today = new Date()
                var curHr = today.getHours()

                if (curHr < 12) {
                    $("#greeting").html("Good Morning");
                } else if (curHr < 18) {
                    $("#greeting").html("Good Afternoon");
                } else {
                    $("#greeting").html("Good Night");
                }
            })();

        </script>