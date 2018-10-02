<?php
date_default_timezone_set('Europe/Istanbul');
$city_code = $_GET['city'];
$city_name = $_GET['city_name'];

function callAPI($city)
{

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://volkansengul.com/havadurumu/detay.php?city_id='.$city.'&app_id=544936f56df1cb0f4864148e5b13f240',
        CURLOPT_USERAGENT => 'GET CITY URL'
    ));

    $resp = curl_exec($curl);
    $resp = json_decode($resp, true);

    curl_close($curl);
    return $resp;


}


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
        <div class="card-temp"><?php echo $city_name //$resp['city']['name'] ;?> </div>
<main class="container">



    <div class="card-wrapper">



        <?php
        $listItems =  callAPI($city_code);

        foreach($listItems['list'] as $mydata)
        {
        if($old != date('d/m/Y', $mydata['dt'])) {

        ?>
        </p>

        </section>

        <section class="card anim-flip">
            <header>
                <h1 class="card-header"><?php  echo date("l", $mydata['dt']); ?></h1>
            </header>


            <p class="card-info">
                <?php }?>
                <?php  echo date("H:i", $mydata['dt']).' '. round($mydata['main']['temp'] -273.15)." ". "<sup>o</sup>"." <img src='http://openweathermap.org/img/w/" . $mydata[weather][0][icon].".png" ."' style='vertical-align: middle' /><br />";?>

                <?php $old = date('d/m/Y', $mydata['dt']);?>

                <?php } ?>




    </div>
</main>


</body>

</html>
