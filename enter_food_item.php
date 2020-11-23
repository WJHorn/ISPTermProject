<!-- Written by Todd White -->
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
    ?>
   <div class = "container">
      <div class = "macro">
         <h3> Store New Food Item: </h3>
         
         <form method = "post" action = "http://localhost/isp/prj/enter_food_item.php">
            <br>
            <p>Name of Food:</p>
            <input type = "text" name = "food_name" id = "food_name" placeholder="Ex: Klondike Bar"></input>
            <p>Category:</p>
            <select name="category" id="category">
            <option value="Fruits">Fruits</option>
            <option value="Proteins">Proteins</option>
            <option value="Fats">Fats</option>
            </select>
            <p>Net Carbs Per Serving:</p>
            <input type = "text" name = "net_carbs" id = "net_carbs" placeholder="28"></input>
            <p>Fat Per Serving:</p>
            <input type = "text" name = "fat" id = "fat" placeholder="14"></input>
            <p>Protein Per Serving:</p>
            <input type = "text" name = "protein" id = "protein" placeholder="3"></input>
            <p>Description of Serving Size:</p>
            <input type = "text" name = "serving_description" id = "serving_description" placeholder="Ex: 1 Bar"></input>
            <br><br><input class = "button" type = "submit" name="enter_food" id="enter_food" value = "Store Food Item"></input><br>
         </form>
         <button class = "button" onclick="document.location='prj.php'">Return to Food Log</button>
      </div>
        
   </div>
   
   <!--Here the php logic is used to save the user's new food item into the foods_database table-->
   <!--Basically, variables are created from info entered above and entered and saved to foods_database table-->
   <?php
      //Begin php statement when Enter Food Item button (name is enter_food) is pressed  
      if(isset($_POST['enter_food'])){
         $food_name=$_POST['food_name'];
         $category=$_POST['category'];
	 $carbs=$_POST['net_carbs'];
         $fat=$_POST['fat'];
	 $protein=$_POST['protein'];
         $serving=$_POST['serving_description'];
         $query="insert into foods_database (food_name,category,net_carbs,fat,protein,serving_size) values ('$food_name','$category','$carbs','$fat','$protein','$serving')"; 
         $runquery=mysqli_query($con,$query);
         if($runquery){
            echo'<script>alert("Food item has been stored!")</script>';
         }
      }
   ?>
</body>
</html>