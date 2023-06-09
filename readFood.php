<?php

    $host = 'localhost';
    $user = 'songchan';
    $pw = '1234';
    $dbName = 'test';
    $mysqli = new mysqli($host, $user, $pw, $dbName);

    $n = 1; // 가져오고 싶은 레코드의 순서

    $sql = "SELECT * FROM food ORDER BY food_no ASC LIMIT " . $n; // 순서에 해당하는 레코드를 가져옴
    $result = mysqli_query($mysqli, $sql);

    while($row = mysqli_fetch_assoc($result)) {

        $food_title = $row['food_title'];
        $food_data = $row['food_data'];
        $food_data = nl2br($food_data);


    }

    $Obj = new stdClass();

    $Obj->food_title = $food_title;
    $Obj->food_data = $food_data;

    $JSON = json_encode($Obj);

    echo $JSON;

?>