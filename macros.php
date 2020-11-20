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
   
      <h2> Calculate my Macros </h2>
      <div class = "input">
         <table>
            <tr>
               <th> Age: </th>
               <th> Gender: </th>
               <th> Height: </th>
               <th> Weight: </th>
               <th> Activity Level (in Days/Week): </th>
            </tr>
            <tr>
               <td><input type = "text" id = "age" size = "3" value = "24"></td>
               <td>
                  <p>
                  <input type = "radio" name = "gender" id = "gender" value = "1" checked = "checked" >M
                  <input type = "radio" name = "gender" id = "gender" value = "2" >F
                  </p>
               </td>
               <td><input type = "text" id = "height" size = "3" value = "6.0" ></td>
               <td><input type = "text" id = "weight" size = "3" value = "200" ></td>
               <td>
                  <p>
                  <input type = "radio" name = "activity" id = "activity" value = "1.2" checked = "checked" >0
                  <input type = "radio" name = "activity" id = "activity" value = "1.375" >1-3
                  <input type = "radio" name = "activity" id = "activity" value = "1.55" >3-5
                  <input type = "radio" name = "activity" id = "activity" value = "1.725" >6-7
                  </p>
               </td>
            </tr>
            <tr>
               <td colspan = "5" align = "center">
                  <button onclick="macroCalc()">Calculate my Macros</button>
               </td>
            </tr>
         </table>
      </div>
      <div>
         <p> Total Calories Needed: </p>
         <p id = "output"></p>
      </div>

   <script type = "text/javascript">
      function macroCalc(){
         //read in the values entered by the user.
         double age = document.getElementById("age").value;
         alert(document.getElementById("age").value);
         boolean isMale;
         int gender = document.getElementById("gender").value;
         if (gender == 1) {
            isMale = true;
         }
         else {
            isMale = false;
         }
         double height = document.getElementById("height").value;
         double weight = document.getElementById("weight").value;
         double activity = document.getElementById("activity").value;
         
         //use algorithm to find macros
         double Bmr;
         if (isMale) {
            Bmr = 66 + (6.3 * weight) + (12.9 * height) - (6.8 * age);
         }
         else {
            Bmr = 65 + (4.3 * weight) + (4.7 * height) - (4.7 * age);
         }
         double FinalCals = Bmr * activity;
         
         //print macros on page
         document.getElementById("output").innerHTML = FinalCals;
      }
   </script>
   <?php
      //read printed macros
      //store macros in macro table
   ?>
</body>
</html>