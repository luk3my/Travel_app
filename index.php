<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Travel map</title>
  <link  href="css/style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Roboto" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
</head>
<style>
  body {
    font-family: 'Merriweather Sans', sans-serif;
  }

  .country1 {
    fill: #d3d3d3;
    stroke: #000000;
    stroke-width: 0.3
  }

  .selected {
    fill: yellow;
  }

  arc.text {
    font: 10px Arial, Georgia, sans-serif;
    text-anchor: middle;
  }

  .arc path {
    stroke: #ffffff;
  }

  #DonutChart {

    position: absolute;
    top: 20px;
    right: 20px;
  }

  #map {
    display: flex;
    align-items: center;
  }

  h1 {

    text-align: center;
  }

  .top-right {
    position: absolute;
    top: 20px;
    right: 20px;
  }

  .button {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
  }

  .button:hover {
    background-color: lightgrey;
    color: black;
  }
</style>

<body>
  <!--<img src="" alt="Global travel logo" height="100" width="120">-->
  <span><h1>Global Travel</h1></span>
  <!--World map div-->
  <div id="map"></div>
  <!--Donut chart div-->
  <div id="DonutChart"></div>
  <a class="button top-right" href="login.php">Login</a>

  

    <h1>Leaderboard</h1>

    <?php
      require_once("php/connect.php");
    ?>


    <?php

    $query = "SELECT FirstName, LastName, Country1, Country2, Country3 ,Country4, Country5, Rank
              FROM users INNER JOIN countries ON users.UserName = countries.UserName ORDER BY Rank";
  
		$results = mysqli_query($conn, $query);
			
		if(!$results) {
			
			echo ("Query error:" .mysqli_error($conn));
			
		}	
	
	
	
		else {
			
			// fetch and display results
			
  	  
 		echo "<table class='leaderboard'>
	  	
  			<tr>
				
			  <th>Traveller</th>		
			  <th></th>		  				  	
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th></th>
			  <th>Rank</th>
			  			
  			</tr>";
	  	
	  		while ($row =mysqli_fetch_array($results)) {
			
			
			echo "<tr>";
	  		
			echo "<td>" .$row['FirstName']. "</td>";
			echo "<td>" .$row['LastName']. "</td>";
	  	echo "<td>" .$row['Country1']. "</td>";
			echo "<td>" .$row['Country2']. "</td>";	
			echo "<td>" .$row['Country3']. "</td>";
			echo "<td>" .$row['Country4']. "</td>";
	  	echo "<td>" .$row['Country5']. "</td>";
      echo "<td>" .$row['Rank']. "</td>";
				

			echo "</div>";
	
			echo "</tr>";
	  	
			}
	  	
			echo "</table>";
			
		}
		
?>
     

  <marquee class="scrollbox">
    <ul class="marquee">

     <li class="weather">London</li>
     <li id="LonWeather"></li>
     <li id="LonTemp"></li>

     <li class="weather">Tokyo</li>
     <li id="TokWeather"></li>
     <li id="TokTemp"></li>

     <li class="weather">New York</li>
     <li id="NyWeather"></li>
     <li id="NyTemp"></li>

     <li class="weather">Sydney</li>
     <li id="SydWeather"></li>
     <li id="SydTemp"></li>

 
</ul>
    </marquee>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
<!--<script type="text/javascript">
$(function(){
    $('.marquee').marquee({
    showSpeed:100, //speed of drop down animation
    scrollSpeed: 1, //lower is faster
    yScroll: 'bottom',  // scroll direction on y-axis 'top' for down or 'bottom' for up
    direction: 'left', //scroll direction 'left' or 'right'
    pauseSpeed: 1000, // pause before scroll start in milliseconds
    duplicated: true  //continuous true or false
    });
}); 
</script> -->

  <!-- Add D3 library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.2.2/d3.min.js"></script>
  <!-- Add Topojson library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.0/topojson.js"></script>
  <!-- Add the js file for the visualisation -->
  <script src="js/vis.js"></script>
  <!-- Add the css -->
  <script src="css/style.css"></script>
</body>

</html>