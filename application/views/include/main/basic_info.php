
    <div class="row">
        <div class="col-lg-4">
            <div class="widget widget-statistic widget-default">
                <header class="widget-statistic-header">Server Time</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value" id="clock"></span>
                    <span class="widget-statistic-description"><?php echo $current ?></span>
                    <span class="widget-statistic-icon fa fa-clock-o"></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="widget widget-statistic widget-primary">
                <header class="widget-statistic-header">Last Login</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value"><?php echo $day; ?></span>
                    <span class="widget-statistic-description"><?php echo "at ".$time; ?></span>
                    <span class="widget-statistic-icon fa fa-sign-in"></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="widget widget-statistic widget-faded-blue">
                <header class="widget-statistic-header">UserID</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value"><?php echo $userid; ?></span>
                    <span class="widget-statistic-description"><strong>Don't</strong> give your userID & password info</span>
                    <span class="widget-statistic-icon fa fa-user"></span>
                </div>
            </div>
        </div>
    </div>
