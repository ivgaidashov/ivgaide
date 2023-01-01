<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power Bi Dashboard - My Projects</title>
    <link rel="stylesheet" href="../src/general.css">

</head>
<body>

<div class="container">
    <?php
        include '../src/header.php';
    ?>

    <div class="project-title">
        NYC Property Sales
    </div>

    <div class="s paragraph">
        <p>I downloaded a dataset from <a href="https://www.kaggle.com/datasets/new-york-city/nyc-property-sales" target="_blank">Kaggle</a>. It consists of one table which includes sales info from Sep 2016 to Aug 2017. First, I had to cleanse the data by getting rid of string variables in columns meant for numbers. I added a date table to have more details about the time of sale. Finally, a model was created.
        The dashboard allows filtering the sales by borough and month, it specifies the difference between the chosen period and its previous value.
        </p>
    </div>

    <div class="project-banner python-vid">
        <video poster="<?php echo HTTP;?>img/projects/power_bi/thumbnail.jpg" src="<?php echo HTTP;?>/img/projects/power_bi/dashboard.mp4" width autoplay muted loop></video>
    </div>

    <div class="project-banner graph svg">
       <a href="<?php echo HTTP;?>dashboard.pbix" target="_blank"><img src="<?php echo HTTP;?>img/projects/power_bi/Power_BI_Logo.svg"> Download the «New York Propert Sales» dashboard</a>
   </div>


</div>

</body>
</html>

