<!DOCTYPE HTML>
<html>
	<head>
		<title> InsertName </title>
		<link href="cw1css.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		
		<div class = "table">
		
			
				
			
			<?php
				echo "<link href=\"cw1css.css\" type=\"text/css\" rel=\"stylesheet\">";
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "csv_db";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				
				error_reporting(0);
			?>
			
			<table border=1>
			
			
			<div class="Tabs">
				<button class="tablink" onclick="showtab(event, 'City')">City</button>
				<button class="tablink" onclick="showtab(event, 'Country')">Country</button>
				<button class="tablink" onclick="showtab(event, 'Language')">Language</button>
			</div>
			
			<div id="City" class="tab">
			<h3>Input query on city table</h3>
			<ul>
				<li> To delete input: DELETE FROM table_name WHERE condition</li>
				<li> To dispaly input: SELECT*FROM table_name </li>
				<li> To insert input: INSERT INTO table_name VALUES(column1data, column2data...)</li>
				<li> To update input: UPDATE table_name SET column1 = new_value1, column2 = new_value2,... WHERE condition
			</ul>
				<form method="post" action="cw1.php">
				
					<textarea name="cityquery" rows="10" cols="30" ></textarea>
					<input type="submit" value="Query" name="submitcity">
					
				</form>
			</div>
			
			<div id="Country" class="tab">
				<h3>Input query on country table</h3>
				<ul>
					<li> To delete input: DELETE FROM table_name WHERE condition</li>
					<li> To dispaly input: SELECT*FROM table_name </li>
					<li> To insert input: INSERT INTO table_name VALUES(column1data, column2data...)</li>
					<li> To update input: UPDATE table_name SET column1 = new_value1, column2 = new_value2,... WHERE condition
				</ul>
				<form method="post" action="cw1.php">
				
					<textarea name="countryquery" rows="10" cols="30" ></textarea>
					<input type="submit" value="Query" name="submitcountry">
					
				</form>
			</div>
			
			<div id="Language" class="tab">
				<h3>Input query on language table</h3>
				<ul>
					<li> To delete input: DELETE FROM table_name WHERE condition</li>
					<li> To dispaly input: SELECT*FROM table_name </li>
					<li> To insert input: INSERT INTO table_name VALUES(column1data, column2data...)</li>
					<li> To update input: UPDATE table_name SET column1 = new_value1, column2 = new_value2,... WHERE condition
				</ul>
				<form method="post" action="cw1.php">
				
					<textarea name="langquery" rows="10" cols="30" ></textarea>
					<input type="submit" value="Query" name="submitlang">
					
				</form>
			</div>
			
			<?php
			
				function selectcity(mysqli $conn){
					
					mysqli_set_charset($conn,"UTF8");
					
					$result = mysqli_query($conn,$_POST["cityquery"]);
					
					echo $_POST["cityquery"];
					
					echo "<thead><tr><th>ID</th><th>City</th><th>CountryCode</th><th>State</th><th>Population</th></thead>";
					
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   //Creates a loop to loop through results
						echo "<tbody><tr><td>" . $row['ID'] . "</td><td>" . $row['City'] . "</td><td>" . $row['CountryCode'] . "</td><td>" . $row['State'] . "</td><td>" . $row['Population'] . "</td></tr></tbody>";  //$row['index'] the index here is a field name
					}
				}
				
				if (isset($_POST['cityquery'])){
					selectcity($conn);
				}
				
				function selectcountry(mysqli $conn){
					
					mysqli_set_charset($conn,"UTF8");
					
					$result = mysqli_query($conn,$_POST["countryquery"]);
					
					echo $_POST["cityquery"];
					
					echo "<thead><tr><th>CountryCode</th><th>CountryName</th><th>Continent</th><th>Region</th><th>Area</th><th>Independence</th><th>Population</th><th>LifeExpectancy</th><th>GNP</th><th>GNPOld</th><th>Pronunciation</th><th>TypeOfPoliticalPower</th><th>President</th><th>Capital</th><th>InternetDomainCode</th></thead>";
					
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo "<tbody><tr><td>" . $row['CountryCode'] . "</td><td>" . $row['CountryName'] . "</td><td>" . $row['Continent'] . "</td><td>" . $row['Region'] . "</td><td>" . $row['Area'] . "</td><td>" . $row['independence'] . "</td><td>" . $row['population'] . "</td><td>" . $row['LifeExpectancy'] . "</td><td>" . $row['GNP'] . "</td><td>" . $row['GNPOld'] . "</td><td>" . $row['Pronunciation'] . "</td><td>" . $row['TypeOfPoliticalPower'] . "</td><td>" . $row['President'] . "</td><td>" . $row['Capital'] . "</td><td>" . $row['InternetDomainCode'] . "</td></tr></tbody>";
					}
				}
				
				if (isset($_POST['countryquery'])){
					selectcountry($conn);
				}
				
				function selectlang(mysqli $conn){
					
					mysqli_set_charset($conn,"UTF8");
					
					$result = mysqli_query($conn,$_POST["langquery"]);
					
					echo $_POST["cityquery"];
					
					echo "<thead><tr><th>Language</th><th>IsItOfficialLanguage</th><th>PercentageOfSpeakers</th></thead>";
					
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo "<tbody><tr><td>" . $row['Language'] . "</td><td>" . $row['IsItOfficialLanguage'] . "</td><td>" . $row['PercentageOfSpeakers'] . "</td><td>" . $row['Population'] . "</td><td>" . $row['State'] . "</td></tr></tbody>";
					}
				}
				
				if (isset($_POST['langquery'])){
					selectlang($conn);
				}
			
			?>
			
			</table>
		</div>	
	</body>
	<script>
		function showtab(evt, tableName) {
		  // Declare all variables
		  var i, tab, tablink;

		  // Get all elements with class="tabcontent" and hide them
		  tab = document.getElementsByClassName("tab");
		  for (i = 0; i < tab.length; i++) {
			tab[i].style.display = "none";
		  }

		  // Get all elements with class="tablinks" and remove the class "active"
		  tablink = document.getElementsByClassName("tablink");
		  for (i = 0; i < tablink.length; i++) {
			tablink[i].className = tablink[i].className.replace(" active", "");
		  }

		  // Show the current tab, and add an "active" class to the button that opened the tab
		  document.getElementById(tableName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
	</script>
</html>
