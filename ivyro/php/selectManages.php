<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");
    

	$result = mysqli_query($con, "SELECT ID
                                       , NAME
                                       , GRADE 
									FROM MANAGER");
										
	$returnVal = array();
	
	while($row = mysqli_fetch_array($result)){
        //echo $row['NAME']." ".$row['SCORE']." ".$row['INPUT_DT']."<br>";
		$t = new stdClass();
		$t->id = $row['ID'];
        $t->name = $row['NAME'];
        $t->grade = $row['GRADE'];
        $returnVal[] = $t;
        unset($t);
    }
	
	echo json_encode($returnVal);
	mysqli_close($con);
?>