<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'songchan';
		$pw = '1234';
		$dbName = 'test';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$member_email = $_POST['email'];
	    $member_name = $_POST['name'];
		$member_pw_1 = $_POST['pw_1'];
		$member_pw_2 = $_POST['pw_2'];

		$sql = "insert into login_tb (
				member_email,
				member_name,
				member_pw_1,
				member_pw_2
		)";
		
		$sql = $sql. "values (
				'$member_email',
				'$member_name',
				'$member_pw_1',
				'$member_pw_2'
		)";

		// 이메일 중복 체크
		$check_query = "SELECT * FROM login_tb WHERE member_email='$member_email'";
		$check_result = $mysqli->query($check_query);
		if ($check_result->num_rows > 0) {
			echo '<script>alert("이미 존재하는 이메일 주소입니다. 다른 이메일을 사용해주세요.");</script>';
			echo '<script>location.href = "login_create.html";</script>';
			exit;
		}

		if ($member_pw_1 !== $member_pw_2) {
			echo '<script>alert("비밀번호가 일치하지 않습니다. 다시 입력해주세요.");</script>';
			echo '<script>location.href = "login_create.html";</script>';
			exit;
		}
		
		if($mysqli->query($sql)){ 
		  echo '<script>alert("회원가입이 완료되었습니다.")</script>'; 
		  echo '<script>location.href = "Login.html";</script>';
		}else{ 
		  echo '<script>alert("회원가입에 오류가 발생했습니다.")</script>';
		  echo '<script>location.href = "login_create.html";</script>';

		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "login_create.html";
</script>

</html>