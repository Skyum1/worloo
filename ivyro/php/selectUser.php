<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    
	/*
    $result = mysqli_query($con, "SELECT @ROWNUM := @ROWNUM+1 AS ROWNUM
									   , A.*
									FROM (SELECT RESULT_CNT
											   , NAME
											   , MAIN_IMG
											FROM DOG_MEMBERS
										   ORDER BY RESULT_CNT DESC
										   LIMIT 1000) A
									   , (SELECT @ROWNUM := 0) R");
	*/
	$result = mysqli_query($con, "SELECT NAME
										, SEX
										, AGE
										, WORK_TIME
										, WORK_NAME
										, WORK_CATEGORY
										, AREA
										, BIRTH
										, USE_YN
										, REMARK 
									FROM USER
								   WHERE USE_YN != 'N'");
										
	$returnVal = array();
	
	while($row = mysqli_fetch_array($result)){
        //echo $row['NAME']." ".$row['SCORE']." ".$row['INPUT_DT']."<br>";
		$t = new stdClass();
		$t->name = $row['NAME'];
        $t->age = $row['AGE'];
        $t->sex = $row['SEX'];
		$t->work_time = $row['WORK_TIME'];
		$t->work_name = $row['WORK_NAME'];
		$t->work_category = $row['WORK_CATEGORY'];
		$t->area = $row['AREA'];
		$t->birth = $row['BIRTH'];
		$t->remark = $row['REMARK'];
        $returnVal[] = $t;
        unset($t);
    }
	
	echo json_encode($returnVal);
	mysqli_close($con);
?>