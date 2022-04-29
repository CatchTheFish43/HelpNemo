<?php 

session_start();

	include("connection.php");
	include("functions.php");
 $user_data=check_login($con);


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$hits=$_POST['hitts'];
    $name =  $user_data['user_name'];

			//Updata hits to database
			$user_id = random_num(20);
			$query = "UPDATE users SET hits = '$hits' WHERE user_name = '$name'";
		
			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		
	
			
		
		}
	

//________________




$tableName="users";
$columns= ['id', 'user_name','date','hits'];
$fetchData = fetch_data($con, $tableName, $columns);

function fetch_data($con, $tableName, $columns){
 if(empty($con)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY hits DESC";
$result = $con->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($con);
}
}
return $msg;
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel = "stylesheet" type = "text/css" href = "scores.css">
</head>
<body>
<h3 style="font-size: 30px;margin: 15px;color: red;  "> <a href="index.php"> let's PLAY</a> </h3>
<form>
  <div style="font-size: 30px;margin: 15px;color: white;  ">High Scores
<div class="container" >
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>ID</th>

         <th>User Name</th>
         <th>Date</th>
         <th>Score</th>
        
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['user_name']??''; ?></td>
      <td><?php echo $data['date']??''; ?></td>
      <td><?php echo $data['hits']??''; ?></td>
      
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</div>





</form>
	</div>
</body>
</html>