<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	$id = $_POST["id"];
    $name = $_POST["name"];
    $grade = $_POST["grade"];
	
    // 비밀번호를 SHA2로 해싱
    $hashed_pw = hash('sha256', $pw);

    $query = "UPDATE MANAGER
                 SET NAME = '$name'
                   , GRADE = '$grade'
               WHERE ID = '$id'; "; 
    echo "$query";

    $result = mysqli_query($con, $query);

	if($result) {
		echo "success";
	} else {
		echo "fail";
	}
	mysqli_close($con);
?>