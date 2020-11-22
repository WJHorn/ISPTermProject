<!-- Written by William Horn -->
<html>
<head>
   <title> Keto Tracker </title>
   <link href="style.css" rel="stylesheet" type="text/css">
</head>
<header>
   <div class="menu">
      <nav>
         <li><a href = "prj.html"> HOME </a></li>
			<li><a href = "macros.php"> CALCULATE MACROS </a></li>
			<li><a href = "documentation.html"> DOCUMENTATION </a></li>
         <li><a href = "help.html"> HELP </a></li>
		</nav>
	</div>
</header>
<body>
   <div class = "input">
   <div class = "block">
      <h2> Calculate my Macros </h2>
   </div>
   <div class = "container">
      <table>
         <tr>
            <th> Age: </th>
            <th> Gender: </th>
            <th> Height(in inches): </th>
            <th> Weight: </th>
            <th> Activity Level (in Days/Week): </th>
         </tr>
         <tr>
            <td><input type = "number" id = "age" placeholder = "24"></td>
            <td>
               <p>
               <input type = "radio" name = "gender" id = "genderM" value = "1" checked = "checked" >M
               <input type = "radio" name = "gender" id = "genderF" value = "2" >F
               </p>
            </td>
            <td><input type = "number" id = "height" placeholder = "72" ></td>
            <td><input type = "number" id = "weight" placeholder = "200" ></td>
            <td>
               <p>
               <input type = "radio" name = "activity" id = "activity1" value = "1.2" checked = "checked" >0
               <input type = "radio" name = "activity" id = "activity2" value = "1.375" >1-3
               <input type = "radio" name = "activity" id = "activity3" value = "1.55" >3-5
               <input type = "radio" name = "activity" id = "activity4" value = "1.725" >6-7
               </p>
            </td>
         </tr>
         <tr>
            <td colspan = "5" align = "center">
               <button class = "button" onclick="macroCalc()">Calculate my Macros</button>
            </td>
         </tr>
      </table>
   </div>
   <div class = "container">
      <div class = "macro">
         <h3>Calculated Macros</h3>
         <p> Total Calories Needed: </p>
         <input type = "text" id = "finalCals"></input>
      
      <form method = "post" action = "http://localhost/isp/prj/macros.php">
         <br>
         <p>Grams of Net Carbs Needed:</p>
         <input type = "text" name = "netCarbs" id = "netCarbs"></input>
         <p>Grams of Fats Needed:</p>
         <input type = "text" name = "fats" id = "fats"></input>
         <p>Grams of Protein Needed:</p>
         <input type = "text" name = "proteins" id = "proteins"></input>
         <br><br><input class = "button" type = "submit" value = "Save Macros"></input>
      </div>
   </div>
   </form>
   <script type = "text/javascript">
      function macroCalc(){
         //read in the values entered by the user.
         var age = document.getElementById("age").value;
         var isMale;
         if (document.getElementById("genderM").checked) {
            isMale = true;
         }
         else if (document.getElementById("genderF").checked) {
            isMale = false;
         }
         var height = document.getElementById("height").value;
         var weight = document.getElementById("weight").value;
         var activity;
         if (document.getElementById("activity1").checked) {
            activity = document.getElementById("activity1").value;
         }
         else if (document.getElementById("activity2").checked) {
            activity = document.getElementById("activity2").value;
         }
         else if (document.getElementById("activity3").checked) {
            activity = document.getElementById("activity3").value;
         }
         else if (document.getElementById("activity4").checked) {
            activity = document.getElementById("activity4").value;
         }
         
         //use algorithm to find macros
         var Bmr;
         if (isMale) {
            Bmr = 66 + (6.3 * weight) + (12.9 * height) - (6.8 * age);
         }
         else {
            Bmr = 65 + (4.3 * weight) + (4.7 * height) - (4.7 * age);
         }
         var FinalCals = Bmr * activity;
         var carbs = 0.05 * FinalCals;
         var fat = 0.7 * FinalCals;
         var protein = 0.25 * FinalCals;
         
         var FinalCarbs = parseInt(carbs / 4);
         var FinalFats = parseInt(fat / 9);
         var FinalProtein = parseInt(protein / 4);
         
         //print macros on page
         document.getElementById("finalCals").value = parseInt(FinalCals);
         document.getElementById("netCarbs").value = FinalCarbs;
         document.getElementById("fats").value = FinalFats;
         document.getElementById("proteins").value = FinalProtein;
      }
   </script>
   <?php
      //read printed macros
      $netCarbs = $_POST['netCarbs'] ?? '';
      $fats = $_POST['fats'] ?? '';
      $proteins = $_POST['proteins'] ?? '';
      
      //store macros in macro table
      $db = mysqli_connect("localhost", "root", "");
      if (!$db) {
         print "Error - Could not connect to MySQL";
         exit;
      }
      $er = mysqli_select_db($db,"keto_tracker");
      if (!$er) {
         print "Error - Could not select the database";
         exit;
      }
      $query = "";
      if ($netCarbs != '' && $fats != '' && $proteins != '') {
         $query = "insert into macroVars (NetCarbs, Fats, Proteins) values('$netCarbs', '$fats', '$proteins')";
      }
      if ($query != "") {
         trim($query);
         
         $result = mysqli_query($db, $query);
         if (!$result) {
            print "Error - the query could not be executed";
            $error = mysqli_error($db);
            print "<p>" . $error . "</p>";
         }
      }
   ?>
</body>
</html>