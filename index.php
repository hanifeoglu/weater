<?php
date_default_timezone_set( "Europe/Istanbul");

function callAPI($city)
{

    $hash = "salih";
    define("app_id", MD5($hash));

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://volkansengul.com/havadurumu/?city='.$city.'&app_id='.app_id,
        CURLOPT_USERAGENT => 'GET CITY URL'
    ));

    $resp = curl_exec($curl);
    $resp = json_decode($resp);

    curl_close($curl);
    return $resp;


}




$arr = array("istanbul", "ankara", "kastamonu","izmir","Gümüşhane");
$arrlength = count($arr);


?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>weather forecast</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<main class="container">
    <div class="card-wrapper">
            <?php

            for($x = 0; $x < $arrlength; $x++) {
            $resp =  callAPI($arr[$x]);

            ?>
            <div class="card anim-flip" id=”header” onclick="location.href='http://weather.app/details.php?city=<?php echo $resp->id .'&city_name='. $resp->name;?>'" style=”cursor:pointer;”>
            <?php echo  "<header>";?>
            <h1 class="card-header"><?php echo $resp->name;?></h1>
            <?php echo  "</header>";?>

            <p class="card-temp box-highlight"><?php echo "<img src='http://openweathermap.org/img/w/" . $resp->weather[0]->icon.".png" ."'/ >" ,' '. round($resp->main->temp  - 272);?></p>

            <p class="card-info"><?php echo  $resp->weather[0]->main; ?></p>


            <p class="card-info"><?php echo gmdate("d/m/Y H:i", $resp->dt);?></p>

                <?php echo $resp->name;?>
            <?php echo "</div>";?>
            <?php };?>

    </div>
</main>



</body>

</html>

