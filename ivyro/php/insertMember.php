<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	$name = $_POST["name"];
	$age = $_POST["age"];
    $sex = $_POST["sex"];
    $workTime = $_POST["workTime"];
    $workName = $_POST["workName"];
    $workCategory = $_POST["workCategory"];
    $area = $_POST["area"];
    $birth = $_POST["birth"];
    $remark = $_POST["remark"];
	
    // 비밀번호를 SHA2로 해싱
    $hashed_pw = hash('sha256', $pw);

    $query = "INSERT INTO USER
                   (
                     NAME
                   , AGE
                   , SEX
                   , WORK_TIME
                   , WORK_NAME
                   , WORK_CATEGORY
                   , AREA
                   , BIRTH
                   , USE_YN
                   , REMARK
                   ) 
                   VALUES 
                   (
                     '$name'
                   , '$age'
                   , '$sex'
                   , '$workTime'
                   , '$workName'
                   , '$workCategory'
                   , '$area'
                   , '$birth'
                   , 'Y'
                   , '$remark'
                   )
                ON DUPLICATE KEY
                UPDATE NAME = '$name'
                     , AGE = '$age'
                     , SEX = '$sex'
                     , WORK_TIME = '$workTime'
                     , WORK_NAME = '$workName'
                     , WORK_CATEGORY = '$workCategory'
                     , AREA = '$area'
                     , BIRTH = '$birth'
                     , REMARK = '$remark'; ";
    echo "$query";

    $result = mysqli_query($con, $query);

	if($result) {
		echo "success";
	} else {
		echo "fail";
	}
	mysqli_close($con);
?>