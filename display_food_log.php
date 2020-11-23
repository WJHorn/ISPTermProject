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
$database = "keto_tracker"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

//Select all data to display all results of foods_consumed table that have been entered today only
$query = "SELECT primary_key, food_name, servings_eaten, serving_size, time_consumed FROM foods_consumed WHERE day(time_consumed)=day(now())";

?>

<!--Output a form so the user can modify their food log-->
<div class = "block">
   <h2>Modify Your Food Entries for Today</h2>
   
   <form method="post" enctype="multipart/form-data">
      <p>What modification do you want to make?<br><br><!--Use radio buttons to let them choose-->
         <input type="radio" name="mod" value="Delete Record"><b>Delete Record -</b>   Enter ID of Record to Delete:<input type="text" name="toDelete"/><br><br>
         <input type="radio" name="mod" value="Change Serving Amount"><b>Change Serving Amount -</b>    Enter ID of Record to Change:<input type="text" name="servingsID"/>    Updated Servings:<input type="text" name="newServings"/><br><br>
         <input type="radio" name="mod" value="Display Updated Records"><b>Display Updated Records </b><br><br>
         <!--The button below is used to submit the form and modify the foods_consumed table-->
         <input class = "button" type="submit" name="execute" value="Make Change"><br>
      </p>
   </form>
   
   <!--This is a button to take the user back to the main interface-->
   <button class = "button" onclick="document.location='prj.php'">Return to Enter Foods</button>
</div>
<div class = "block">
   <h2>Log of Today's Food Entries</h2>
   <table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">ID</font> </td> 
          <td> <font face="Arial">Food Name</font> </td> 
          <td> <font face="Arial">Servings Eaten</font> </td> 
          <td> <font face="Arial">Serving Size</font> </td> 
          <td> <font face="Arial">Time Consumed</font> </td> 
      </tr>
      <?php
         //Run a loop to output all rows of the foods_consumed table
         if ($result = $mysqli->query($query)) {
         while ($row = $result->fetch_assoc()) {
            $field1name = $row["primary_key"];
            $field2name = $row["food_name"];
            $field3name = $row["servings_eaten"];
            $field4name = $row["serving_size"];
            $field5name = $row["time_consumed"];
            
            echo '<tr> 
                     <td>'.$field1name.'</td> 
                     <td>'.$field2name.'</td> 
                     <td>'.$field3name.'</td> 
                     <td>'.$field4name.'</td> 
                     <td>'.$field5name.'</td>                   
                  </tr>';
    }
    $result->free();
} 
?>
</div>
</body>
</html>

<?php
//When the user hits the Make Change button (name is execute), modify the foods_consumed database
if(isset($_POST['execute'])){

//Use a switch statement to determine how to modify the table based on the radio button
$function = $_POST['mod'];
    switch ($function) {
        case "Delete Record": 
             $delete_food=$_POST['toDelete'];
	     $query1="delete from foods_consumed where primary_key='$delete_food'";
	     $runquery1=mysqli_query($con,$query1);
	     if($runquery1){
	     echo'<script>alert("Record has been Deleted. Hit Display Updated Records to Show.")</script>';
             }           
            break;
        case "Change Serving Amount":
             $servingsID=$_POST['servingsID'];
	     $newServings=$_POST['newServings'];
             $query1="update foods_consumed set servings_eaten='$newServings' where primary_key='$servingsID'";
	     $runquery1=mysqli_query($con,$query1);
	     if($runquery1){
	     echo'<script>alert("Record has been updated. Hit Display Updated Records to Show.")</script>';
             }   
            break;
        case "Display Updated Records":
	    echo("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
            break;
            }

   }

?>