<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Projects</title>
    <link rel="stylesheet" href="src/general.css">

</head>
<body>

<div class="container">
    <?php
        include './src/header.php';
        include_once './src/db_conn.php';

        $sql = "SELECT * FROM projects order by order_of_appearance";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        $rows;
        if ($resultCheck > 0) {
            while ($row=mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }

        $skills = ['Python','SQL','Adobe-Illustrator','Adobe-After-Effects','English','PHP','Javascript', 'CSS', 'Power-Bi'];
        $get_tag = isset($_GET['tag']) && in_array($_GET['tag'], $skills) ? $_GET['tag'] : null;            
    ?>

    <div class="tags">
        <div class="tag clicked-tag" data-filter='all'>All</div>
        <div class="tag" data-filter='Python'>Python</div>
        <div class="tag" data-filter='SQL'>SQL</div>
        <div class="tag" data-filter='Adobe-Illustrator'>Illustrator</div>
        <div class="tag" data-filter='Adobe-After-Effects'>After Effects</div>
        <div class="tag" data-filter='English'>English</div>
        <div class="tag" data-filter='PHP'>PHP</div>
        <div class="tag" data-filter='Javascript'>Javascript</div>
        <div class="tag" data-filter='CSS'>CSS</div>
        <div class="tag" data-filter='Power-Bi'>Power Bi</div>
    </div>

    <div class="cards">
        
            <?php foreach ($rows as $row) 
                {
                
                $separated = explode('*', $row['tags']);

                echo '<a href="'.$row['link'].'" class="pr-link'; 
                
                foreach ($separated as $value) {
                    echo ' '.$value;
                }
                
                echo '"><div class="card"">
                    <div class="pj-header">'.$row['header'].'</div>
                    <div class="pj-thumbnail"><img src="'.$row['thumbnail'].'"></div>
                    <div class="pj-dscr">'.$row['descr'].'</div>
                    <div class="pj-tags">';
                    
                    

                    foreach ($separated as $value) {
                        echo '<div class="tag-box">'.str_replace('-',' ', $value).'</div>';
                    }
                    echo '</div>
                </div></a>';                
                } 
            ?>    

        

        <!-- <div class="card">
            <div class="pj-header">Bank Website</div>
            <div class="pj-thumbnail"><img src="img/banner.jpg"></div>
            <div class="pj-dscr">A website concept for the Bank I've worked for. I used PHP / MySQL for Backend and JavaScript for Frontend.</div>
            <div class="pj-tags">
                <div class="tag-box">Website</div>
                <div class="tag-box">Python</div>
            </div>
        </div> -->

    </div>
</div>

<?php
        include './src/jquery.php';
?>

<script type='text/javascript'>
    $(document).ready(
        function(){
            $('.tag').click(
                function(){
                    const value = $(this).attr('data-filter');
                    if (value == 'all') {
                        $('.pr-link').show('1000');
                    }
                    else {
                        $('.pr-link').not('.'+value).hide('1000');
                        $('.pr-link').filter('.'+value).show('1000');
                    }
                }
            );
        
            $('.tag').click(function(){
                $(this).addClass('clicked-tag').siblings().removeClass('clicked-tag');
            });  

            const tag ="<?php echo $get_tag; ?>";

            if (tag)
            {
                    $('.pr-link').not('.'+tag).hide();
                    $('.pr-link').filter('.'+tag).show();
                    $('.tag').each(function(i, obj) {
                        if ($(this).attr('data-filter') == tag)
                        {
                            $(this).addClass('clicked-tag').siblings().removeClass('clicked-tag');
                        }
                    });
            }

        }
    )

</script>
    
</body>
</html>