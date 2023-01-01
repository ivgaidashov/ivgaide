<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Gaidashov - Data Analyst</title>
    <link rel="stylesheet" href="src/general.css">

</head>
<body>
    
    <section class='Pose1'>
        <div class="main">  <!-- for the content of a section-->
            
            <?php
                include './src/header.php';
            ?>

            <div class="introduction">
                <div class="intro-text">
                    <h2>I'm Ivan</h2>
                    <h3>I Love <span class ='auto-input-general'></span> </h3>
                    <p>I am a detail-oriented hard-worker with a creative vision who is passionate about data. I enjoy translating numbers to words and presenting complex results to nontechnical stakeholders.</p>
                    <div class="cv">
                        <a href="cv_eng.pdf" class='eng-cv' target="_blank">Download My CV</a>
                        <a href="cv_rus.pdf" class='rus-cv' target="_blank">Скачать резюме</a>
                    </div>
                </div>
                <img src="img/Pose1_.png" class='pose-img'>
            </div>

        </div> <!-- main-->
    </section>

    <section class='Pose2'>
        <div class="main">  <!-- for the content of a section-->

            <div class="introduction">
                <div class="intro-text">
                    <h2><span class ='auto-input-sql'></span></h2>
                    <p>Some people wake up and drink coffee first thing in the morning, whilst I run to SQL to fetch information. For the past year SQL and I have been inseparable in my adventure with Oracle databases, which enabled me to learn <span class ='key-words'>PL/SQL</span> as well. The <span class ='key-words'>Join</span>, <span class ='key-words'>Union</span>, <span class ='key-words'>With()</span> clauses and subqueries are my best friends.</p>
                    <div class="cv">
                        <a href="#" class='btn btn-purple-bg'>My SQL Projects</a>
                    </div>
                </div>
                <img src="img/Pose2_.png" class='pose-img reveal'>
            </div>

        </div> <!-- main-->
    </section>

    <section class='Pose3'>
        <div class="main">  <!-- for the content of a section-->

            <div class="introduction">
                <div class="intro-text">
                    <h2>Python</h2>
                    <p>Its readability and vast collection of libraries for everything made me pick up this language to automate tasks in my job. I quickly developed a script which collected data from Google Sheets and used information from an <span class ='key-words'>API</span> to store these variables in the database. For fun I also created a PDF Editor to combine documents, rotate and delete pages, and convert files to DOCX.</p>
                    <div class="cv">
                        <a href="#" class='btn my-python'>My Python Projects</a>
                    </div>
                </div>
                <img src="img/Pose4_.png" class='pose-img reveal'>
            </div>

        </div> <!-- main-->
    </section>

    <section class='Pose4'>
        <div class="main">  <!-- for the content of a section-->

            <div class="introduction ">
                <div class="intro-text">
                    <h2><span class ='auto-input-graphics'></span></h2>
                    <p><span class ='hide-for-mobile'>No matter how well worked-out or impeccable your project may be, it is imperative to put just as much effort into presenting your work in an interactive and aesthetically pleasing way. </span>Preferably, I use Adobe Illustrator to create <span class ='key-words'>flat art</span>, Adobe Dimension is at my disposal for quick and stunning results in <span class ='key-words'>3D</span>, Blender is my current favorite tool for creating characters, PowerPoint is my go-to program to represent ideas and output in an elegant manner with the help of the <span class ='key-words'>morph</span> and <span class ='key-words'>zoom</span> features. </p>
                    <div class="cv">
                        <a href="#" class='btn btn-purple-bg my-art'>My Art</a>
                    </div>
                </div>
                <img src="img/Pose3_.png" class='pose-img reveal'>
            </div>

        </div> <!-- main-->
    </section>

    <section class='Pose5'>
        <div class="main">  <!-- for the content of a section-->

            <div class="introduction">
                <div class="intro-text">
                    <h2>English</h2>
                    <p><span class ='hide-for-mobile'>Nowadays having a foreign language in your resume doesn’t give an edge over other applicants, It's rather a necessity. </span>In 2019 I won third place in the «<span class ='key-words'>National Contest</span> in English for Engineering Students» at BMSTU. I translated <span class ='hide-for-mobile'>multiple</span> <span class ='key-words'>academic papers</span> from Russian to English for my department at university for publication. Moreover, as a student I participated in numerous <span class ='key-words'>international conferences</span> where my presentations covered various topics. <span class ='hide-for-mobile'>I enjoy working on field-specific English texts, be it in Law, Commerce, IT, etc. </span></p>
                    <div class="cv">
                        <a href="#" class='btn'>My Translations</a>
                    </div>
                </div>
                <img src="img/Pose5_.png" class='pose-img reveal'>
            </div>

        </div> <!-- main-->
    </section>

    <!-- Auto Typing Text Effect -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed_one = new Typed(".auto-input-general", {
            strings: ['Data Science', 'SQL', 'Python', 'Graphics', 'English'],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true
        })

        var typed_two = new Typed(".auto-input-sql", {
            strings: ['SQL', 'PL/SQL', 'Oracle'],
            typeSpeed: 100,
            backSpeed: 50,
            loop: true
        })

        var typed_two = new Typed(".auto-input-graphics", {
            strings: ['Blender', 'A:Illustrator', 'A:After Effects', 'A:Dimension', 'PowerPoint'],
            typeSpeed: 100,
            backSpeed: 50,
            smartBackspace: true,
            loop: true
        })

        window.addEventListener('scroll', reveal)
        const revealBorder = 100;

        function reveal(){
            const reveals = document.querySelectorAll('.reveal');

            reveals.forEach(function (element, _) {
            const windowHeight = window.innerHeight;
            const top = element.getBoundingClientRect().top;
            
            if (top < windowHeight - revealBorder) {
                element.classList.add('active');
            }
            else {
                element.classList.remove('active');
            }

            });

        }
    </script>
</body>
</html>