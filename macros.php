<!-- Written by William Horn -->
<html>
<head>
   <title> Keto Tracker </title>
   <style type = "text/css">
   td, th, table {border: thin solid black}
   </style>
   <link href="style.css" rel="stylesheet" type="text/css">
</head>
<header>
   <div class="menu">
      <nav>
         <li><a href="prj.html"> HOME </a></li>
			<li><a href="macros.php"> CALCULATE MACROS </a></li>
			<li><a> OTHER </a></li>			
		</nav>
	</div>
</header>
<body>
   <form action = "http://localhost/isp/TermProj/macros.php"
         method = "post">
      <h2> Calculate my Macros </h2>
      <div class = "input">
         <table>
            <tr>
               <th> Age: </th>
               <th> Gender: </th>
               <th> Height: </th>
               <th> Weight: </th>
            </tr>
            <tr>
               <td><input type = "text" name = "age" size = "3" value = "24"></td>
               <td>
                  <p>
                  <input type = "radio" name = "gender" value = "male" checked = "checked" >M
                  <input type = "radio" name = "gender" value = "female" >F
                  </p>
               </td>
               <td><input type = "text" name = "height" size = "3" value = "6.0" ></td>
               <td><input type = "text" name = "weight" size = "3" value = "200" ></td>
            </tr>
            <tr>
               <td colspan = "4" align = "center"><input type = "submit" name = "macros" value = "Calculate my Macros"></td>
            </tr>
         </table>
      </div>
   </form>
      <?php
      //get input data
         if(isset($_POST['macros'])) {
            $age = $_POST['age'];
            if ($_POST['gender'] == "male") {
               $gender = "M";
            }
            else if ($_POST['gender'] == "female") {
               $gender = "F";
            }
            else {
               $gender = "N";
            }
            $height = $_POST['height'];
            $weight = $_POST['weight'] ;
         }
         else {
            $age = 0;
            $gender = 'N';
            $height = '0.0';
            $weight = 0;
            $query = "";
            
         }
         $db = mysqli_connect("localhost", "root", "");
         if (!$db) {
            print "Error - Could not connect to MySQL";
            exit;
         }
         
         $er = mysqli_select_db($db, "keto_tracker");
         if(!$er) {
            print "Error - Could not select the database";
            exit;
         }
         
         if(strcmp($gender,'M') == 0) {
            echo "<div id = 'gender'>Male</div>";
            $query = "insert into macroVars(Age, Gender, Height, Weight) values('$age', '$gender', '$height', '$weight')";
         }
         else if (strcmp($gender,'F') == 0) {
            echo "<div id = 'gender'>Female</div>";
            $query = "insert into macroVars(Age, Gender, Height, Weight) values('$age', '$gender', '$height', '$weight')";
         }
         else {
            echo "<div id = 'gender'>n/a</div>";
         }
         
         
         
         if ($query != "") {
            $result = mysqli_query($db, $query);
            if (!$result) {
               print "Error - the query could not be executed";
               $error = mysqli_error($db);
               print "<p>" . $error . "</p>";
            }
         }
      ?>
      <script type = "text/javascript">
         if (document.getElementById("gender") == 'Male'){
            maleCalc();
         }
         else if (){
            
         }
         function maleCalc(){
            <?php echo "Male Funtion"?>
         }
         function femaleCalc(){
            
         }
      </script>
</body>
</html>