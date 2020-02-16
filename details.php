<?php
date_default_timezone_set('Europe/Istanbul');
$city_code = $_GET['city'];
$city_name = $_GET['city_name'];
include('weather.php');
$weather = new Weather();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>weather forecast</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="card-temp"><?php echo $city_name //$resp['city']['name'] ;?> </div>
<main class="container">
    <div class="card-wrapper">
        <?php
        $listItems = $weather->GetDetailedWeather($city_code);
        $old = null;
        foreach ($listItems->list as $mydata)
        {
        if ($old != date('d/m/Y', $mydata->dt)) {
        ?>
        </p>
        </section>

        <section class="card anim-flip">
            <header>
                <h1 class="card-header"><?php echo date("l", $mydata->dt); ?></h1>
            </header>
            <p class="card-info">
                <?php } ?>
                <?php echo date("H:i", $mydata->dt); ?>
                <?php echo round($mydata->main->temp); ?>
                <sup>o</sup>
                <img src="http://openweathermap.org/img/w/<?php echo $mydata->weather[0]->icon ?>.png"
                     style="vertical-align:middle"/>
                <br/>
                <?php $old = date('d/m/Y', $mydata->dt);
                } ?>
    </div>
</main>
</body>
</html>
