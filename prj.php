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
         <li><a href = "prj.html"> HOME </a></li>
			<li><a href = "macros.php"> CALCULATE MACROS </a></li>
			<li><a href = "documentation.html"> DOCUMENTATION </a></li>
         <li><a href = "help.html"> HELP </a></li>
		</nav>
	</div>
</header>
<body>

   <?php
      //Establish the connection with PHP database - some code may be redundant
      $con=mysqli_connect("localhost", "root", "") or die ("unable to connect");
      mysqli_select_db($con,"keto_tracker");
      $username = "root"; 
      $password = ""; 
      $db = "keto_tracker"; 
      $mysqli = new mysqli("localhost", $username, $password, $db); 
      
      //Create a query to show the categories of food items so users can narrow down what food item they are looking for
      $resultSet = $mysqli->query("SELECT DISTINCT category FROM foods_database");
   ?>

   <!--Section allows user to enter foods they ate-->
   <br>
   <div class = "block">
      <h2>Keto Macro Tracker</h2>
      <h4>Enter Food to Eat</h4>
      
      <!--Create a form to allow users to log a food item they ate-->
      <form method="post" action="prj.php">
         Categories:
      
         <!--When they change the category, reload the page-->
         <select name="categories" onchange='this.form.submit()'>
         <option value='choose'>Choose food category</option>
   
         <?php
            //Populate the foods selectbox with all the foods from foods_database of a given category
            while($rows = $resultSet->fetch_assoc())
            {
               $category = $rows['category'];
               echo "<option value='$category'>$category</option>";
            }
         ?>
         </select>
         <noscript><input type="submit" value="Submit"></noscript>
      </form>
   
      <!--Create a new form so that after they have selected a food category, they can choose a food item-->
      <form method="post" enctype="multipart/form-data">
         Foods:
         <select name="foods">
         <?php
            $selectOption = $_POST['categories'];
            $resultSet2 = $mysqli->query("SELECT food_name, serving_size FROM foods_database WHERE category='$selectOption'");
            while($rows = $resultSet2->fetch_assoc())
            {
               $food_name = $rows['food_name'];
               $serving_size = $rows['serving_size'];
               echo "<option value='$food_name'>$food_name, $serving_size</option>";
            }
         ?>
         </select>
         <br><br>
   
         <!--Here the user enters how many servings of a food they ate-->
         Servings: <input type="text" name="servings" placeholder="Enter Servings Eaten"><br><br>
         <input class = "button" type="submit" name="eat_food" value="Press to Eat Food!"><br>
      </form>
      <p>Don't see your food item? Store a new food item <a href="enter_food_item.php">here.</a></p>
   </div>
   <!--Here the php logic is used to save the user's food item eaten into the foods_cosumed table-->
   <!--Basically, variables are created from users food and servings entered and saved to foods_consumed-->
   <?php
      //Begin php statement when Press to Eat Food! button (name is eat_food) is pressed  
      if(isset($_POST['eat_food'])){
         $food_name=$_POST['foods'];
         $servings_eaten=$_POST['servings'];
         $grabquery = $mysqli->query("SELECT serving_size, net_carbs,fat,protein FROM foods_database WHERE food_name='$food_name'");
         $row = mysqli_fetch_row($grabquery);
         $carbs=$row[1]*$servings_eaten;
         $fat=$row[2]*$servings_eaten;
         $protein=$row[3]*$servings_eaten;
         $query3="insert into foods_consumed (food_name,servings_eaten,serving_size,net_carbs,fat,protein,time_consumed) values ('$food_name','$servings_eaten','$row[0]','$carbs','$fat','$protein',now())"; 
         $runquery3=mysqli_query($con,$query3);
         if($runquery3){
            echo'<script>alert("Food item has been eaten!")</script>';
         }
      }
   ?>

   <?php //I just wanted to hang onto this datetime format
      //$dt = new DateTime();
      //echo $dt->format('Y-m-d H:i:s');
   ?>
   <div class = "container">
      <div class = "macro">
         <!--Here today's macros will be displayed-->
         <!--Javascript will be used to display today's date-->
         <h3>Today's Macro Tracker</h3><br>
         Date:
         <script> 
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear(); 
            
            today = mm + '/' + dd + '/' + yyyy;
            document.write(today);
         </script><br><br>
         
         <?php
            //Create PHP variables with MySQL queries to get today_carbs, today_fat, and today_protein from foods_consumed db
            $grabquery2 = $mysqli->query("SELECT sum(net_carbs) as today_carbs FROM foods_consumed WHERE day(time_consumed)=day(now())");
            $row2=mysqli_fetch_row($grabquery2);
            $today_carbs=$row2[0];
            $grabquery3 = $mysqli->query("SELECT sum(fat) as today_carbs FROM foods_consumed WHERE day(time_consumed)=day(now())");
            $row3=mysqli_fetch_row($grabquery3);
            $today_fat=$row3[0];
            $grabquery4 = $mysqli->query("SELECT sum(protein) as today_carbs FROM foods_consumed WHERE day(time_consumed)=day(now())");
            $row4=mysqli_fetch_row($grabquery4);
            $today_protein=$row4[0];
         ?>
         
         <!--Display output of PHP variables to show carbs, fat, and protein for the day-->
         Net Carbs:<br><input type="text" id = "carbT" name="net_carbs" value="<?php echo $today_carbs ?>"><br>
         Fat Consumed:<br><input type="text" id = "fatT" name="fat" value="<?php echo $today_fat ?>"><br>
         Protein Consumed:<br><input type="text" id = "protT" name="protein" value="<?php echo $today_protein ?>"><br><br>
      </div>
      <div class = "macro">
         <!--Here goal macros will be displayed-->
         <!--Javascript will be used to display today's date-->
         <h3>Goal Macros</h3><br>
         Date:
         <script> 
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear(); 
            
            today = mm + '/' + dd + '/' + yyyy;
            document.write(today);
         </script><br><br>
         
         <?php
            //Create PHP variables with MySQL queries to get goal_carbs, goal_fat, and goal_protein from macroVars
            $grabquery2 = $mysqli->query("SELECT NetCarbs FROM macroVars ORDER BY primary_key DESC LIMIT 1");
            $row2=mysqli_fetch_row($grabquery2);
            $goal_carbs=$row2[0];
            $grabquery3 = $mysqli->query("SELECT Fats FROM macroVars ORDER BY primary_key DESC LIMIT 1");
            $row3=mysqli_fetch_row($grabquery3);
            $goal_fat=$row3[0];
            $grabquery4 = $mysqli->query("SELECT Proteins FROM macroVars ORDER BY primary_key DESC LIMIT 1");
            $row4=mysqli_fetch_row($grabquery4);
            $goal_protein=$row4[0];
         ?>
         
         <!--Display output of PHP variables to show goal carbs, fat, and protein -->
         Net Carbs:<br><input type="text" id = "carbG" name="net_carbs" value="<?php echo $goal_carbs ?? "0"?>"><br>
         Fat Consumed:<br><input type="text" id = "fatG" name="fat" value="<?php echo $goal_fat ?? "0"?>"><br>
         Protein Consumed:<br><input type="text" id = "protG" name="protein" value="<?php echo $goal_protein ?? "0"?>"><br><br>
         <button class = "button" onclick="document.location='display_food_log.php'">Review Today's Food Log</button>
      </div>
      <div class = "macro">
         <!--Here today's macros will be displayed-->
         <!--Javascript will be used to display today's date-->
         <h3>Remaining Macros</h3><br>
         Date:
         <script> 
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear(); 
            
            today = mm + '/' + dd + '/' + yyyy;
            document.write(today);
         </script><br><br>
         
         <!--Display output of javascript calculation to show carbs, fat, and protein for the day-->
         Net Carbs:<br><input type="text" id = "carbS" name="net_carbs"><br>
         Fat Consumed:<br><input type="text" id = "fatS" name="fat"></br>
         Protein Consumed:<br><input type="text" id = "protS" name="protein"><br><br>
         
         <script>
            var finalCarbs = (document.getElementById("carbG").value - document.getElementById("carbT").value);
            var finalFats = (document.getElementById("fatG").value - document.getElementById("fatT").value);
            var finalProteins = (document.getElementById("protG").value - document.getElementById("protT").value);
            
            document.getElementById("carbS").value = finalCarbs;
            document.getElementById("fatS").value = finalFats;
            document.getElementById("protS").value = finalProteins;
         </script>
         
      </div>
      <div class = "clear"></div>
   </div>
</body>
</html>

