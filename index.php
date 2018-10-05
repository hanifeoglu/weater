<?php
date_default_timezone_set("Europe/Istanbul");
include('weather.php');
$weather = new Weather('salih');
$cities = array("istanbul", "ankara", "kastamonu", "izmir", "Gümüşhane");
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
<main class="container">
    <div class="card-wrapper">
        <?php
        foreach ($cities as $city){
        $cityWeather = $weather->GetCurrentWeather($city);
        ?>
        <div class="card anim-flip" id=”header”
             onclick="location.href='details.php?city=<?php echo $cityWeather->id . '&city_name=' . $cityWeather->name; ?>'">
            <?php echo "<header>"; ?>
            <h1 class="card-header"><?php echo $cityWeather->name; ?></h1>
            <?php echo "</header>"; ?>
            <p class="card-temp box-highlight"><?php echo "<img src='http://openweathermap.org/img/w/" . $cityWeather->weather[0]->icon . ".png" . "'/ >", ' ' . round($cityWeather->main->temp - 272); ?></p>
            <p class="card-info"><?php echo $cityWeather->weather[0]->main; ?></p>
            <p class="card-info"><?php echo gmdate("d/m/Y H:i", $cityWeather->dt); ?></p>
            <?php echo "</div>"; ?>
            <?php }; ?>
        </div>
</main>
</body>
</html>

