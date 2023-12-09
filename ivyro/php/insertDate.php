<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	$date = $_POST["date"];
	$remark = $_POST["remark"];
    $name = $_POST["name"];

    $query = "INSERT INTO EVENT_DAY
                   (
                     NAME
                   , DATE
                   , REMARK
                   ) 
                   VALUES 
                   (
                     '$name'
                   , '$date'
                   , '$remark'
                   )
                ON DUPLICATE KEY
                UPDATE NAME = '$name'
                    , DATE = '$date'
                    , REMARK = '$remark'
                    , USE_YN = 'Y'; ";
    echo "$query";

    $result = mysqli_query($con, $query);

	if($result) {
		echo "success";
	} else {
		echo "fail";
	}
	mysqli_close($con);
?>