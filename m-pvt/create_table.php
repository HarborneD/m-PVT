<?php
	$con = mysqli_connect("csmysql.cs.cf.ac.uk", "c0919382","xjD2RmSH", "c0919382");

		$create_string = "CREATE TABLE `PVT_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participant_id` varchar(45) NOT NULL,
  `trial_time_ms` int(11) NOT NULL,
  `early_clicks` int(11) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `trial_type` varchar(45) DEFAULT NULL,
  `trial_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
)";
		
		$table_created = mysqli_query($con, $create_string);

	mysqli_close($con); 

	if($table_created)
	{
		echo'Table Created';
	}   
	else
	{
		echo'There was an error creating the table';
	}
?>



