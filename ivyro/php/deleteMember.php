<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	$name = $_POST["name"];

    $query = "UPDATE USER
                 SET USE_YN = 'N'
               WHERE NAME = '$name';  ";
    echo "$query";

    $result = mysqli_query($con, $query);

	if($result) {
		echo "success";
	} else {
		echo "fail";
	}
	mysqli_close($con);
?>