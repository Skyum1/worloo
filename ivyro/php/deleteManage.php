<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	$id = $_POST["id"];

    $query = "DELETE
                FROM MANAGER
               WHERE ID = '$id';  ";
    echo "$query";

    $result = mysqli_query($con, $query);

	if($result) {
		echo "success";
	} else {
		echo "fail";
	}
	mysqli_close($con);
?>