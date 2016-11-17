<!DOCTYPE html>

<html>

	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>PVT Test Results</title>

	    <link rel="stylesheet" href="css/pvt_results.css" type="text/css">
	     <link rel="stylesheet" href="css/site.css" type="text/css">
	      <link rel="stylesheet" href="css/forms.css" type="text/css">

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>

	<body>

	    <div class="container body-content">
	   
	    	<div id="pvt_results_container">
		    	<h1>School of Psychology <img id="cardiff_logo" src="images/cardiff_logo.png"/></h1>
		    	<h2>Psychomotor Vigilance Task - Results</h2>
		    	 <a href="download_results.php">Download Results</a>
				<table>
					<tr>
						<th>Id</th>
						<th>Date</th>
						<th>Trial Name</th>
						<th>Particpant Id</th>
						<th>Trial Type</th>
						<th>Trial Time in Ms</th>
						<th>Early Clicks</th>
					</tr>

					<?php
						$con = mysqli_connect("csmysql.cs.cf.ac.uk", "c0919382","xjD2RmSH", "c0919382");
							$results_retrieve = "SELECT * FROM PVT_results;";
					      	
					      	$results = mysqli_query($con, $results_retrieve);
					        if (mysqli_num_rows($results) > 0) 
					            {
					                            
					                while($result_row = mysqli_fetch_assoc($results)) 
					                {	

					                	$id = $result_row["id"];
					                    $date = $result_row["date"];
					                    $trial_name = $result_row["trial_name"];
					                    $participant_id = $result_row["participant_id"];
					                    $trial_type = $result_row["trial_type"];
					                    $trial_time = $result_row["trial_time_ms"];
					                    $early_clicks = $result_row["early_clicks"];
					                    echo 
					                    '<tr>
								        <td>'.$id.'</td>
								        <td>'.$date.'</td>
								        <td>'.$trial_name.'</td>
								        <td>'.$participant_id.'</td>
								        <td>'.$trial_type.'</td>
								        <td>'.$trial_time.'</td>
										<td>'.$early_clicks.'</td>
								        </tr>';
					                }
					            }
					    mysqli_close($con);
					?>


				</table>
			</div>
		</div>

	</body>
</html>

<script src="scripts/jquery.js"></script> 
<script src="scripts/pvt_setup.js"></script> 