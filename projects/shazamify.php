<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next.js: Shazamify - My Projects</title>
    <link rel="stylesheet" href="../src/general.css">

</head>
<body>

<div class="container">
    <?php
        include '../src/header.php';
    ?>

    <div class="project-title">
        Next.js: Shazam API
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/shazamify/1.png">
        <div class="see-live">
            <a href="https://ig-shazamify.vercel.app/" target="_blank">See The Live Version</a>
        </div>
    </div>


    <div class="s paragraph">
        <p> The project involves two APIs. The first one extracts data from the <a href="https://rapidapi.com/tipsters/api/shazam-core/" target="_blank">Shazam Core API</a>, which provides data for the world chart displayed on the main page. A user can jump into the song profile or add it to their favourite songs right away. At the top left corner, you can see the link to your list of favourite songs.</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/shazamify/2.png">
        <div class="see-live">
            <a href="https://ig-shazamify.vercel.app/" target="_blank">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>The list is stored in the browser using <span class ='key-words'>localStorage</span>, and the <span class ='key-words'>useEffect</span>, <span class ='key-words'>useState</span> hooks. Instead of employing vanilla CSS I looked up multiple CSS libraries and decided to pick up <span class ='key-words'>Chakra UI</span> to make the user interface pretty and easy to develop.</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/shazamify/3.png">
        <div class="see-live">
            <a href="https://ig-shazamify.vercel.app/" target="_blank">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>There's also a feature to see the charts of various contries, e.g. Russia, the UK, China, Sweden, Brazil, etc. By pressing on the corresponding flag the positions will appear below the icons. I used the <a href="https://www.npmjs.com/package/react-country-flag" target="_blank">react-country-flag</a> package to fetch country flags.</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/shazamify/4.png">
        <div class="see-live">
            <a href="https://ig-shazamify.vercel.app/" target="_blank">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>The second API is the<a href="https://rapidapi.com/Snowflake107/api/simple-youtube-search/" target="_blank">Simple Youtube Search</a>. It receives the song title along with the artist name to pull search results from Youtube. On the song profile page a user is able to read the lyrics.</p>
    </div>

    <div class="project-banner graph svg">
       <a href="https://github.com/ivgaidashov/ig_shazamify" target="_blank"><img src="<?php echo HTTP;?>img/github-mark.svg">      View the Source Code on Github</a>
   </div>

</div>

</body>
</html>

