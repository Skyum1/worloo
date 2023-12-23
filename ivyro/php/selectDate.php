<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");

	$result = mysqli_query($con, "SELECT NAME
                                       , DATE
                                       , REMARK 
                                       , USE_YN
									FROM EVENT_DAY 
                                   WHERE USE_YN = 'Y'; ");
										
	$returnVal = array();
	
	while($row = mysqli_fetch_array($result)){
        //echo $row['NAME']." ".$row['SCORE']." ".$row['INPUT_DT']."<br>";
		$t = new stdClass();
		$t->date = $row['DATE'];
        $t->name = $row['NAME'];
        $t->remark = $row['REMARK'];
        $t->useYn = $row['USE_YN'];
        $returnVal[] = $t;
        unset($t);
    }
	
	echo json_encode($returnVal);
	mysqli_close($con);
?>