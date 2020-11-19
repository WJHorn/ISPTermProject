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
			<li><a href="macros.html"> CALCULATE MACROS </a></li>
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
               <td><input type = "text" name = "age" size = "3" placeholder = "24" ></td>
               <td><input type = "text" name = "gender" size = "3" placeholder = "M" ></td>
               <td><input type = "text" name = "height" size = "3" placeholder = "6.0" ></td>
               <td><input type = "text" name = "weight" size = "3" placeholder = "200" ></td>
            </tr>
            <tr>
               <td colspan = "4" align = "center"><input type = "submit" value = "Calculate my Macros"></td>
            </tr>
         </table>
      </div>
   </form>
</body>
</html>