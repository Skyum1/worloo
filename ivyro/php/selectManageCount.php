<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
    //mysqli_query($con,'SET NAMES utf8');
    
    $result = mysqli_query($con, "SELECT COUNT(ID) AS NUM
                                    FROM MANAGER");
	
	$returnVal = array();
	
	while($row = mysqli_fetch_array($result)){
        //echo $row['NAME']." ".$row['SCORE']." ".$row['INPUT_DT']."<br>";
		$t = new stdClass();
		$t->rownum = $row['NUM'];
        $returnVal[] = $t;
        unset($t);
    }
	
	echo json_encode($returnVal);
	mysqli_close($con);
?>