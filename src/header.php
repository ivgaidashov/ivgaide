<?php

define("ROOT", __DIR__ ."/");
define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost/ivgaide/"
   : "http://ivgaide.club/"
);

?>

<div class="header"> 
    <nav>
        <a href="<?php echo HTTP;?>index.php"><img src="<?php echo HTTP;?>img/logo.svg" class='logo'></a>
        <ul>
            <li><a href="<?php echo HTTP;?>projects.php">Projects</a></li>
            <li><a href="<?php echo HTTP;?>experience.php">Experience</a></li>
            <li><a href="<?php echo HTTP;?>skills.php">Skills</a></li>
            <li><a href="<?php echo HTTP;?>contact_me.php">Contact<span class ='hide-for-mobile'> Me</span></a></li>
        </ul>
    </nav>
</div>