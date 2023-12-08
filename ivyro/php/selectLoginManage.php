<?php
    $con = mysqli_connect("localhost", "rjftkd126", "1q2w3e4r5t^", "rjftkd126");

    $id = $_POST["id"];
    $pw = $_POST["pw"];
    // 비밀번호를 SHA2로 해싱
    $hashed_pw = hash('sha256', $pw);

	$result = mysqli_query($con, "SELECT ID
                                       , PW
                                       , GRADE
									FROM MANAGER
                                   WHERE ID = '$id'; ");
	/*
	while($row = mysqli_fetch_array($result)){
        //echo $row['NAME']." ".$row['SCORE']." ".$row['INPUT_DT']."<br>";
		$t = new stdClass();
		$t->id = $row['ID'];
        $t->name = $row['NAME'];
        $t->grade = $row['GRADE'];
        $returnVal[] = $t;
        unset($t);
    }*/

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $stored_pw = $row['PW'];
            $grade = $row['GRADE'];
            
            // 실제로는 저장된 비밀번호와 입력된 비밀번호를 해싱하여 비교해야 합니다.
            // 여기에서는 일치 여부만 확인하도록 간단하게 작성되었습니다.
            if ($hashed_pw === $stored_pw) {
                
                if($grade === "방장") echo "방장correct!";
                else echo "부방correct!";

            } else {
                echo "incorrect";
            }
        } else {
            echo "notFound";
        }
    } else {
        echo "Query failed";
    }

	mysqli_close($con);
?>