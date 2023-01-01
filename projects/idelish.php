<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React.js: Recipes - My Projects</title>
    <link rel="stylesheet" href="../src/general.css">

</head>
<body>

<div class="container">
    <?php
        include '../src/header.php';
    ?>

    <div class="project-title">
        React.js: Recipes
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/idelish/1.png">
        <div class="see-live">
            <a href="https://ig-idelish.netlify.app/" target="_blank">See The Live Version</a>
        </div>
    </div>


    <div class="s paragraph">
        <p> The website provides recipes from enthusiasts across the world via the <a href="https://rapidapi.com/apidojo/api/tasty" target="_blank">Tasty API</a>. A little caveat: the project may have some difficulties uploading data since it has a lot of requests from different developers. Patience!</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/idelish/2.png">
        <div class="see-live">
            <a href="https://ig-idelish.netlify.app/" target="_blank">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>Once you scroll down a bit you're provided with recipes tagged "Under 30 minutes" which are directly fetched from the API with the help of the <span class ='key-words'>useEffect</span> hook. The main page includes categories based on the list of the most popular tags. Click the recipe to view details.</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/idelish/3.png">
        <div class="see-live">
            <a href="https://ig-idelish.netlify.app/" target="_blank">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p> The recipe page gives you a list of tags related to it. Besides, if given, it has nutrition data, such as calories, fat, carbs and the number of servings. The instructions are implemented inside a carousel with the help of <span class ='key-words'>Material UI</span>.</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/idelish/4.png">
        <div class="see-live">
            <a href="https://ig-idelish.netlify.app/" target="_blank">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>Below the instructions are suggested videos provided by the <a href="https://rapidapi.com/Snowflake107/api/simple-youtube-search/" target="_blank">Simple Youtube Search</a>. It receives data from the recipe page and sends an API request.</p>
    </div>

    <div class="project-banner graph svg">
       <a href="https://github.com/ivgaidashov/ig-idelish" target="_blank"><img src="<?php echo HTTP;?>img/github-mark.svg">      View the Source Code on Github</a>
   </div>

</div>

</body>
</html>

