<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

	$host = 'localhost';
	$user = 'songchan';
	$pw = '1234';
	$dbName = 'test';
	$mysqli = new mysqli($host, $user, $pw, $dbName);

	$food_title = $_POST['title'];
	$food_title = addslashes($food_title);
    $food_data = $_POST['data'];
    $food_data = addslashes($food_data);
    

	$sql = "insert into food (
			food_title,
			food_data
	)";
	
	$sql = $sql. "values (
			'$food_title',
			'$food_data'
	)";

	if($mysqli->query($sql)){ 
	  echo '<script>alert("success inserting")</script>'; 
	}else{ 
	  echo '<script>alert("fail to insert sql")</script>';
	}

	mysqli_close($mysqli);
  
?>

<script>
	location.href = "admin.html";
</script>
</html>