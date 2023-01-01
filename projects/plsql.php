<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL to PL/SQL - My Projects</title>
    <link rel="stylesheet" href="../src/general.css">

</head>
<body>

<div class="container">
    <?php
        include '../src/header.php';
    ?>

    <div class="project-title">
        From SQL to PL/SQL
    </div>

    <div class="s paragraph plsql">
        <p>At the Bank I worked for there was a problem in which the piece of software responsible for charging a fee when a client withdraws funds from their cheque book didn't execute properly. The system has a 5-tier structure divided by the amount of money that one has withdrawn during a month, i.e. if you take out less than 500 000 ₽ you are to pay 1% of the sum. If during a month you've withdrawn more than 500 000 ₽ and with a new transaction you do not exceed 1 million Rubles, you shall pay 1.5% and so on and so forth. Not only does the SQL Query have to determine under which level the current transaction falls, it also has to consider all similar transactions carried out within a month to calculate the correct fee. The original solution was a huge SQL query with all conditions nested into one <span class ='key-words'>Case</span> statement. I’ve changed the titles of functions used both in the old SQL query and my optimized PL/SQL version. Here’s a snippet of the initial code: </p>
    </div>

    <div class="source-code">
        <br>
        <span class ='sql-words'>Select</span>
            <br>
            &emsp;<span class ='sql-words'>case</span> <br>
            &emsp;&emsp;<span class ='sql-words'>when</span>  <br>
            &emsp;&emsp;sum > 0 and package.get_attribute(account, currency)>0 <span class ='sql-words'>and</span> <br>
            &emsp;&emsp;package.GetLastCheckSum(&p1) + sum <= package.get_property(account, currency) <span class ='sql-words'>then</span> <br>
            &emsp;&emsp;sum * package.get_property(account, currency) /100<br>
            <br><br>
            &emsp;&emsp;<span class ='sql-words'>when</span> <br>
            &emsp;&emsp;sum > 0 <span class ='sql-words'>and</span> package.get_attribute(account, currency) <span class ='sql-words'>is null</span><br>
            &emsp;&emsp;<span class ='sql-words'>then</span><br>
            &emsp;&emsp;sum * util_dm2.get_acc_add_attr(ctrnaccd, ctrncur, 1014,dtrncreate,1)/100<br>
            <br><br>
        &emsp;&emsp;. . .  <br><br><br>
        <span class ='sql-words'>from</span> transactions
    </div>

    <div class="s paragraph plsql">
        <p>It goes further reaching <span class ='key-words'>184 lines of code</span>. The problem with this approach is the lack of flexibility. If you need to introduce a new tier or change the formula you have to through every condition and manually edit it or paste another <span class ='key-words'>when</span> clause making the code unreadable. The first thing I did was declare all variables.</p>
    </div>

    <div class="source-code">
        <br>
        &emsp;&emsp;<span class ='sql-words'>DECLARE</span>
        <br><br>
     &emsp;&emsp;trn_id <span class ='sql-words'>NUMBER</span> /*:p1*/;<br>
     &emsp;&emsp;trn_anum_id <span class ='sql-words'>NUMBER</span>;/*:p2*/<br>
     &emsp;&emsp;previous_sum <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;current_sum <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;fee <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;currency <span class ='sql-words'>VARCHAR2(3)</span>;<br>
     &emsp;&emsp;account_d <span class ='sql-words'>VARCHAR2(20)</span>;<br>
     &emsp;&emsp;trn_date <span class ='sql-words'>VARCHAR2(10)</span>;<br>
     <br><br>
     &emsp;&emsp;/*LEVELS*/<br>
     &emsp;&emsp;one_fee <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;one_threshold <span class ='sql-words'>NUMBER</span>;<br>
     
     &emsp;&emsp;two_fee <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;two_threshold <span class ='sql-words'>NUMBER</span>;<br>
     
     &emsp;&emsp;three_fee <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;three_threshold <span class ='sql-words'>NUMBER</span>;<br>
     
     &emsp;&emsp;four_fee <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;four_threshold <span class ='sql-words'>NUMBER</span>;<br>
          
     &emsp;&emsp;five_fee <span class ='sql-words'>NUMBER</span>;<br>
     &emsp;&emsp;five_threshold <span class ='sql-words'>NUMBER</span>;<br>

    </div>

    <div class="s paragraph plsql">
        <p>I finish the declaration section with two main functions. The first one calculates the fee if the client stays within one level, i.e. she has already withdrawn 400 000 ₽ previously and now she needs 50 000 ₽, hence the charge is 1% of the 50 000 ₽. The second one is used in case when a client leaps from one level to another with their new transaction. The client has withdrawn 450 000 ₽ and now they need 120 000 ₽. Therefore the Bank charges 1% of 50 000 ₽ (500 000 ₽ – 450 000 ₽) and 1.5% of the remaining 70 000 ₽.</p>
    </div>

    <div class="source-code">
    <br>
    &emsp;<span class ='sql-words'>FUNCTION</span> calculate_the_fee (current_sum <span class ='sql-words'>IN NUMBER</span>, cur_fee <span class ='sql-words'>IN NUMBER</span>) <br><span class ='sql-words'>&emsp;&emsp;RETURN NUMBER IS <br><br>
    &emsp;&emsp;BEGIN<br>
       &emsp;&emsp;&emsp;RETURN</span> (current_sum * cur_fee / 100);<br>
       <span class ='sql-words'>&emsp;&emsp;END</span>;<br><br><br><br>
       
       &emsp;<span class ='sql-words'>FUNCTION</span> fee_with_transition (current_threshold <span class ='sql-words'>IN NUMBER</span>, <br>&emsp;previous_sum <span class ='sql-words'>IN NUMBER</span>, current_fee <span class ='sql-words'>IN NUMBER</span>, current_sum <span class ='sql-words'>IN NUMBER</span>,<br>&emsp;next_level_fee <span class ='sql-words'>IN NUMBER</span>) <span class ='sql-words'><br>
       &emsp;&emsp;RETURN NUMBER IS<br><br>
       &emsp;&emsp;BEGIN<br>
       &emsp;&emsp;&emsp;RETURN</span> (((current_threshold - previous_sum) *<br>&emsp;&emsp;&emsp; current_fee + (current_sum + previous_sum - current_threshold) *<br>&emsp;&emsp;&emsp; next_level_fee) / 100);<br>
       <span class ='sql-words'>&emsp;&emsp;END</span>;


    </div>

    <div class="s paragraph plsql">
        <p>Now all that I have to do is to call these functions and pass the parameters of the sum, currency, date, etc.</p>
    </div>

    <div class="source-code">
    <br>&emsp;. . .  <br><br><br>
    &emsp;/*1ST LEVEL*/<br>
    &emsp;<span class ='sql-words'>IF</span> current_sum > 0 <span class ='sql-words'>AND</span> one_threshold >= 0 <span class ='sql-words'>AND</span> (previous_sum + current_sum) <= one_threshold <br>
    &emsp;&emsp;<span class ='sql-words'>THEN</span> <br>
    &emsp;&emsp;&emsp;fee:= calculate_the_fee(current_sum, one_fee);<br>
    &emsp;<span class ='sql-words'>END IF</span>;<br><br>     
     
    &emsp;/*1ST TO 2ND: the Client was in the 1st level but with the current transaction they have moved into the 2nd level*/<br>
    &emsp;<span class ='sql-words'>IF</span> (previous_sum + current_sum) >=  one_threshold <span class ='sql-words'>AND</span> previous_sum < one_threshold <span class ='sql-words'>AND</span> two_threshold > 0 <span class ='sql-words'>and</span> (previous_sum + current_sum) <= two_threshold<br>
    &emsp;&emsp;<span class ='sql-words'>THEN</span><br>
    &emsp;&emsp;&emsp;fee:= fee_with_transition(one_threshold, previous_sum, one_fee, current_sum, two_fee);<br><br>
    &emsp;<span class ='sql-words'>END IF</span>;<br><br>
    &emsp;. . .  <br><br><br>
    </div>

    <div class="s paragraph plsql">
        <p>As a result, some vexatious bugs were fixed, the code became flexible, and easier to read. Despite the fact that PL/SQL requires that you have to declare variables, functions, cursors, my code is only <span class ='key-words'>121 lines</span>, which is significantly less than that of the original one. Moreover, it is faster. When I compared two solutions the overall time it took for the original SQL query to execute ranged from 0.567 to a whopping 1.449s, whereas the PL/SQL code usually ran from 0.239s to 0.330s. </p>
    </div>

    <div class="project-banner graph">
        <img src="<?php echo HTTP;?>img/projects/plsql/graph.png">
    </div>

</div>

</body>
</html>

