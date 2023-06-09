<?php

$host = 'localhost';
$user = 'songchan';
$pw = '1234';
$dbName = 'test';
$con = new mysqli($host, $user, $pw, $dbName);

$id = $_POST['id']; // 아이디
$pw = $_POST['pw']; // 패스워드

if(empty($id) || empty($pw)){ // 입력값이 공백인 경우
    echo "<script> alert('아이디와 패스워드를 모두 입력해주세요.'); </script>";
    echo "<script> location.href = 'Login.html'; </script>";
    exit(); // 코드 실행 중지
}

$query = "select * from login_tb where member_email='$id' and member_pw_1='$pw'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if($id==$row['member_email'] && $pw==$row['member_pw_1']){ // id와 pw가 맞다면 login

	echo "<script> alert('로그인 성공'); </script>";
	echo "<script> location.href = 'test.html'; </script>";

}else{ // id 또는 pw가 다르다면 admin_login 폼으로

   echo "<script> alert('로그인 실패'); </script>";
   echo "<script> location.href = 'Login.html'; </script>";

}

?>