<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
 
?>
<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></script>
  <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "index.css">
  <meta charset="utf-8" />
  
</head>

<body>

  <!--  Game Score
    https://codepen.io/murilopolese/pen/xVaoQr -->


    <div class="heading ">
    <h1 id="Score">  (Game Score) <span id="hits">0</span> times.</h1>
    <br>
	 <h2> Hello, <?php echo $user_data['user_name']; ?> </h2>
   <h3> <a href="logout.php"> Logout</a> </h3>
   <h3> <a href="scores.php"> Show High Score</a> </h3>
    <button class="button" type="submit" onClick="refreshPage()">play agin</button>
    </div>
    <!-- --------------------show scores--------------------------------------- -->
    <form  method= "post" action="scores.php">
			<div id="box" style="font-size: 20px;margin: 20px;color: red;  ">please save your score <br>
			<input id="scores" type="text" name="hitts"> 
    	<input id="button"  type="submit" value="Save" > </div>
		</form>
    <script type="text/javascript">
    var hits = 0;
    var hitElement = document.getElementById('hits');
    document.body.onkeyup = function (e) {
      if (e.keyCode == 32) {
        addHit();
      }
    }
    // increment the hits 
    var addHit = function () {
      ++hits;
      renderHits();
    }

    // show the result 
    var renderHits = function () {
      hitElement.innerHTML = hits;
      document.getElementById('scores').value = hits;


    }

  
    </script>
    <!-- // Game Score -->

<!-- // play agin function(reload page ) 
      https://www.codegrepper.com/code-examples/javascript/javascript+refresh+button -->
    <script>
    function refreshPage(){
        window.location.reload();
    } 
    </script>
<!-- //  play agin  -->

  <script src="fish.js"></script>
  <script src="shark.js"></script>
  <script src="sketch.js"></script>
</body>

</html>