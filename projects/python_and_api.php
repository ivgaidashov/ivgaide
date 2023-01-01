<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python and API - My Projects</title>
    <link rel="stylesheet" href="../src/general.css">

</head>
<body>

<div class="container">
    <?php
        include '../src/header.php';
    ?>

    <div class="project-title">
    Python and API
    </div>

    <div class="s paragraph plsql">
        <p>For my <a href="<?php echo HTTP;?>projects/bank_website.php" target="_blank">Bank Website</a> project there was a challenge of updating daily exchange rates that are shown on the landing page. The left section represents rates at which bank clients can purchase or sell their funds in Dollars, Euros, or Yuans. The right-hand side division displays the rates of the Bank or Russia.  </p>
    </div>

    <div class="project-banner graph">
        <img src="<?php echo HTTP;?>img/projects/python/1.png">
        <div class="see-live">
            <a href="<?php echo HTTP;?>projects/bank_website.php" target="_blank">Check Out The Bank Website Project</a>
        </div>
    </div>

    <div class="s paragraph plsql">
        <p>As for the Bank's rates I created a <span class ='key-words'>Google Sheet</span> document in which an employee would input relevant information. Once launched, the Python script, equipped with a handful of libraries, fetches these numbers and upload them to the database. The script starts off by calling two functions, passing the parameters of the type of transaction (ask or bid), and the table of the database to which they will be uploaded. </p>
    </div>

    <div class="source-code">
        <br>           
            &emsp;<span class ='sql-words'>if</span> __name__ == '__main__':<br><br>
	        
            &emsp;&emsp;get_from_spreadsheet(2, 'sell', 'rates') <span class ='comments'>#2 for SELL </span><br>
            &emsp;&emsp;get_from_spreadsheet(3, 'buy', 'rates') <span class ='comments'>#3 for BUY</span><br><br>
            
            &emsp;&emsp;update_rates('cb_rates', get_cb_rates(1), 'previous')<br>
            &emsp;&emsp;update_rates('cb_rates', get_cb_rates(2), 'current')<br>
               
    </div>

    <div class="s paragraph plsql">
        <p>The function connects to the <span class ='key-words'>gspread</span> Python API passing my credentials as well as the title of the Google Sheet page. Then it uses two lists which store current rates and the ones that were uploaded previously, it is done so that the client later could see whether the rates have gone up or down. After that I execute a loop which goes through every line and column of the Google Sheet page to collect the bid and ask prices. Subsequently, we connect to the database to receive the previously uploaded rates. And now we are off to the next function</p>
    </div>

    <div class="source-code">
        <br>
        &emsp;<span class ='sql-words'>def get_from_spreadsheet</span>(column, operation, table):<br><br>

        &emsp;&emsp;<span class ='comments'>#authorize the clientsheet</span><br>
        &emsp;&emsp;client = gspread.authorize(creds)<br><br>

        &emsp;&emsp;sheet = client.open("rates").sheet1 <br><br>

        &emsp;&emsp;dummyList = [] <span class ='comments'>#it stores current rates from Google Sheets</span><br>
        &emsp;&emsp;prevList=[] <span class ='comments'>#It stores current rates from the DB </span><br><br>

        &emsp;&emsp;<span class ='scomments'>#fetch new rates from Google Spreadsheets</span><br>
        &emsp;&emsp;<span class ='sql-words'>for</span> i <span class ='sql-words'>in</span> range(2,5): <span class ='comments'>#it starts at row 1 and ends at row 6</span><br>
        &emsp;&emsp;&emsp;value=(sheet.cell(i, 1).value, sheet.cell(i, column).value) <span class ='comments'>#('dollar_ask', 70.11)</span><br>
        &emsp;&emsp;&emsp;dummyList.append(value)<br>
        &emsp;&emsp;<span class ='sql-words'>print</span>(dummyList)<br><br>

        &emsp;<span class ='comments'>#fetch rates from the last update</span><br>
        &emsp;db_config = read_db_config()<br><br>

        &emsp;&emsp;<span class ='sql-words'>try</span>:<br>
        &emsp;&emsp;&emsp;conn=MySQLConnection(**db_config)<br>
        &emsp;&emsp;&emsp;cursor=conn.cursor()<br>
        &emsp;&emsp;&emsp;cursor.execute(f"SELECT currency, {operation}_cur from {table}")<br>
        &emsp;&emsp;&emsp;rows=cursor.fetchall()<br>
        &emsp;&emsp;<span class ='sql-words'>except</span> Error <span class ='sql-words'>as</span> error:<br>
        &emsp;&emsp;&emsp;<span class ='sql-words'>print</span>(error)<br>
        &emsp;&emsp;<span class ='sql-words'>finally</span>:<br>
        &emsp;&emsp;&emsp;cursor.close()<br>
        &emsp;&emsp;&emsp;conn.close()<br><br>

        &emsp;&emsp;<span class ='sql-words'>for</span> row <span class ='sql-words'>in</span> rows:<br>
        &emsp;&emsp;&emsp;value= (row[0], row[1])<br>
        &emsp;&emsp;&emsp;prevList.append(value)<br><br>

        &emsp;&emsp;update_rates(table, prevList, f"{operation}_prev")<br>
        &emsp;&emsp;update_rates(table, dummyList, f"{operation}_cur")<br><br>

        &emsp;&emsp;date_added_tkpb = sheet.cell(5,2).value <span class ='comments'>#when the rates were uploaded</span><br>
        &emsp;&emsp;update_date(date_added_tkpb, 'rates')<br>

    </div>

    <div class="s paragraph plsql">
        <p>The list ends up in the <span class ='key-words'>update_rates</span> function which receives the table, rates, and . We simply connect to the database, prepare a select statement to avoid <span class ='key-words'>SQL injections</span>, and execute at last.</p>
    </div>

    <div class="source-code">
        <br>
        &emsp;<span class ='sql-words'>def update_rates</span>(table, data, column_db):<br>
        &emsp;&emsp;db_config = read_db_config()<br><br>

        &emsp;&emsp;<span class ='sql-words'>print</span>(table,column_db)<br>
        &emsp;&emsp;<span class ='sql-words'>print</span>(data)<br><br>

        &emsp;&emsp;<span class ='sql-words'>for</span> key, value <span class ='sql-words'>in</span> data:<br>
            &emsp;&emsp;&emsp;sql = f"UPDATE {table} SET {column_db} = %s WHERE currency = %s"<br>
            &emsp;&emsp;&emsp;val = (value, key)<br>

        &emsp;&emsp;<span class ='sql-words'>try</span>:<br>
            &emsp;&emsp;&emsp;conn=MySQLConnection(**db_config)<br>
            &emsp;&emsp;&emsp;cursor=conn.cursor()<br>
            &emsp;&emsp;&emsp;cursor.execute(sql, val)<br>
            &emsp;&emsp;&emsp;conn.commit()<br>
            &emsp;&emsp;&emsp;print(f"The date has been updated in the {table} table")<br>
        &emsp;&emsp;<span class ='sql-words'>except</span> Error <span class ='sql-words'>as</span> error:<br>
            &emsp;&emsp;&emsp;print(error)<br>
        &emsp;&emsp;<span class ='sql-words'>finally</span>:<br>
            &emsp;&emsp;&emsp;cursor.close()<br>
            &emsp;&emsp;&emsp;conn.close()
        </div>

    <div class="s paragraph plsql">
        <p>
        Last but not least is the get_cb_rates which send a request to an API and receives the current rates of the Bank of Russia. The algorithm is similar to that of the get_from_spreadsheet function, where one list fetches previously uploaded rates and another one stores new ones. 
        </p>
    </div>

    <div class="source-code">
    &emsp;<span class ='sql-words'>def get_cb_rates</span>(operation):<br>
	&emsp;&emsp;prevList=[]<br>
	&emsp;&emsp;rows=[]<br><br>

	&emsp;&emsp;<span class ='sql-words'>if</span> (operation==1): <span class ='comments'>#fetch current rates from the DB to write them as previous results</span><br>
    &emsp;&emsp;&emsp;db_config = read_db_config()<br><br>
		
	&emsp;&emsp;&emsp;<span class ='sql-words'>try</span>:<br>
	&emsp;&emsp;&emsp;&emsp;conn=MySQLConnection(**db_config)<br>
	&emsp;&emsp;&emsp;&emsp;cursor=conn.cursor()<br>
	&emsp;&emsp;&emsp;&emsp;cursor.execute(f"SELECT currency, current from cb_rates")<br>
	&emsp;&emsp;&emsp;&emsp;rows = cursor.fetchall()<br>
	&emsp;&emsp;&emsp;<span class ='sql-words'>except</span> Error <span class ='sql-words'>as</span> error:<br>
	&emsp;&emsp;&emsp;&emsp;print(error)<br>
    &emsp;&emsp;&emsp;<span class ='sql-words'>finally</span>:<br>
	&emsp;&emsp;&emsp;&emsp;cursor.close()<br>
	&emsp;&emsp;&emsp;&emsp;conn.close()<br><br>
	

	&emsp;&emsp;&emsp;<span class ='sql-words'>for</span> row <span class ='sql-words'>in</span> rows:<br>
	&emsp;&emsp;&emsp;&emsp;value= (row[0], row[1])<br>
	&emsp;&emsp;&emsp;&emsp;prevList.append(value)<br><br>

	&emsp;<span class ='sql-words'>return</span> prevList<br><br>
	
	&emsp;<span class ='sql-words'>if</span> (operation==2):<br>
	&emsp;&emsp;url = 'https://www.cbr-xml-daily.ru/daily_json.js'<br>
	&emsp;&emsp;response = requests.get(url)<br>
	&emsp;&emsp;data = response.json()<br>
	&emsp;&emsp;currencies = ['USD', 'EUR', 'CNY']<br>
	&emsp;&emsp;rates_cb=[]<br><br>

	&emsp;&emsp;<span class ='sql-words'>for</span> val <span class ='sql-words'>in</span> currencies:<br>
	&emsp;&emsp;&emsp;value = (val, round(response.json()['Valute'][val]['Value'], 2))<br>
	&emsp;&emsp;&emsp;rates_cb.append(value)<br><br>

	&emsp;&emsp;update_date((response.json()['Timestamp'])[:10], 'cb_rates')<br>
	&emsp;&emsp;<span class ='sql-words'>return</span> rates_cb<br>
    </div>

    <div class="s paragraph plsql">
        <p>All there is left to do is update the upload date and launch the script, and the result can be seen on the landing page. I know there's room for optimization as there is a need for a separate function which ensures the opening and closing of a database connection but it is only a matter of time </p>
    </div>

    <div class="project-banner python-vid">
        <video src="<?php echo HTTP;?>/img/projects/python/ae.mp4" width autoplay muted loop></video>
    </div>

</div>

</body>
</html>

