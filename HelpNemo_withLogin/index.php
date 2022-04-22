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
  <meta charset="utf-8" />
  <style>

    h1{
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: absolute;
      margin-left: 9em;
      text-shadow: 3px 3px 40px #0d1fe4;
      font-size: 2.5em;

    }
    h2{
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin-left: 5em;
      text-shadow: 6px 6px 40px blue;
      font-size: 1em;

    }
    h3{
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin-left: 70em;
      position: left;
      text-shadow: 5px 5px 40px blue;
      font-size: 1em;

    }

    /*
    style the paly agin button 
    https://www.w3schools.com/css/css3_buttons.asp */
    
    .button {
      display:inline-block;
      padding: 15px 25px;
      font-size: 25px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      color: #fff;
      background-color: #0d1fe4;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
    
      /* Center an button Exactly In The Center 
      https://css-tricks.com/quick-css-trick-how-to-center-an-object-exactly-in-the-center/*/

      position: fixed;
      top: 50%;
      left: 50%;
      margin-top: -50px;
      margin-left: -100px;
    }
    .button:hover {background-color: #000b5b}

    .button:active {
      background-color: #0d1fe4;;
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }
/* 
    canvas {
        display: block;
      }  */
  
  </style>
</head>

<body>

  <!--  Game Score
    https://codepen.io/murilopolese/pen/xVaoQr -->


    <div class="heading ">
    <h1 id="Score">  (Game Score) <span id="hits">0</span> times.</h1>
    <br>
	 <h2> Hello, <?php echo $user_data['user_name']; ?> </h2>
   <h3> <a href="logout.php"> Logout</a> </h3>
    <button class="button" onClick="refreshPage()">play agin</button>
    </div>
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
      hits++;
      renderHits();
    }
    // show the result 
    var renderHits = function () {
      hitElement.innerHTML = hits;
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