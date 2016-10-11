<?php
	 $trial_time = isset($_POST['trial_time']) ? $_POST["trial_time"] : "100";
	 $participant_id = isset($_POST['participant_id']) ? $_POST["participant_id"] : "001";
	 $early_clicks = isset($_POST['early_clicks']) ? $_POST["early_clicks"] : "0";
	 $trial_type = isset($_POST['trial_type']) ? $_POST["trial_type"] : "Test" ;
	 $trial_name = isset($_POST['trial_name']) ? $_POST["trial_name"] : "data_test";
	 $date = date("Y/m/d H:i:s");

	$con = mysqli_connect("csmysql.cs.cf.ac.uk", "c0919382","xjD2RmSH", "c0919382");

		 $insert_string = "INSERT INTO PVT_results (participant_id,trial_time_ms,early_clicks,date,trial_type,trial_name) VALUES ('".$participant_id."',".$trial_time.",".$early_clicks.",'".$date."','".$trial_type."','".$trial_name."');";
	     
	     $result = mysqli_query($con,$insert_string);

    mysqli_close($con); 

     if($result)
     {
     	echo '1';
     }
     else
     {
     	echo '0';
     }		

?>
