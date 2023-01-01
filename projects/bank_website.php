<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Website - My Projects</title>
    <link rel="stylesheet" href="../src/general.css">

</head>
<body>

<div class="container">
    <?php
        include '../src/header.php';
    ?>

    <div class="project-title">
        Bank Website
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/bank_website/1.png">
        <div class="see-live">
            <a href="">See The Live Version</a>
        </div>
    </div>

    <div class="project-star">
        <div class="s">
            <h2>Situation</h2>
            <p>I landed an entry-level position on my new job at the bank and during the probation period I didn't want to spend time just reading a bunch of documents. The manager suggested that I redesign their official website. </p>
        </div>

        <div class="t">
            <h2>Task</h2>
            <p>The <a href="http://www.tkpb.ru" target="_blank">existing Joomla-based website</a> was built more than a decade ago, didn't look appealing to customers, and didn't have a user-frendly interface. The task was a total overhaul and a new design concept without removing the content. </p>
        </div>

        <div class="a">
            <h2>Action</h2>
            <p>Having no prior knowledge of website development, I quickly started studying the concepts of Backend and Frontend. I devised a plan according to which I outlined sections, page content, and a database structure.</p>
        </div>

        <div class="r">
            <h2>Result</h2>
            <p>Due to technical obstacles and a lack of support from the department I alone wasn't able to deploy my website on the server of the bank considering that I also had to fullfill my other duties. Instead it is now <a href="http://www.tkpb.ru" target="_blank">available</a> on a free hosting service.</p>
        </div>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/bank_website/2.png">
        <div class="see-live">
            <a href="">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>Overall, I am proud of the work that I've done. I went from knowing nothing about <span class ='key-words'>PHP</span>, <span class ='key-words'>Javascript</span>, and <span class ='key-words'>CSS</span> to developing a fuly-fledged and flexible website with a database connection. On top of that, <span class ='key-words'>90%</span> of the images and videos which you can see on the live version were designed by me as well. </p>
    </div>

    <div class="project-banner">
        <video src="<?php echo HTTP;?>/img/projects/bank_website/debit_card.mp4" width autoplay muted loop></video>
        <div class="see-live">
            <a href="">See The Live Version</a>
        </div>
    </div>

    <div class="s paragraph">
        <p>Moreover, I learnt how to use <span class ='key-words'>API</span> services. In this case there was a need for updating currency exchange rates. I used <a href="https://www.cbr-xml-daily.ru/" target="_blank">the Bank Of Russia API</a> which conveniently provides a <span class ='key-words'>JSON file</span>. The file is readable, hence with the help of <span class ='key-words'>Python</span> I was able to extract rates and upload them to the database.</p>
    </div>

    <div class="project-banner">
        <img src="<?php echo HTTP;?>img/projects/bank_website/3.jpg">
        <div class="see-live">
            <a href="">See The Live Version</a>
        </div>
    </div>

</div>

</body>
</html>

