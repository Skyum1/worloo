<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	$id = $_POST["id"];
	$pw = $_POST["pw"];
    $name = $_POST["name"];
    $grade = $_POST["grade"];
	
    // 비밀번호를 SHA2로 해싱
    $hashed_pw = hash('sha256', $pw);

    $query = "INSERT INTO MANAGER
                   (
                     ID
                   , PW
                   , NAME
                   , GRADE
                   , INPUT_DATE
                   ) 
                   VALUES 
                   (
                    '$id'
                   , '$hashed_pw'
                   , '$name'
                   , '$grade'
                   , NOW()
                   )
                ON DUPLICATE KEY
                UPDATE ID = '$id'
                    , PW = '$hashed_pw'
                    , NAME = '$name'
                    , GRADE = '$grade'
                    , INPUT_DATE = NOW(); ";
    echo "$query";

    $result = mysqli_query($con, $query);

	if($result) {
		echo "success";
	} else {
		echo "fail";
	}
	mysqli_close($con);
?>